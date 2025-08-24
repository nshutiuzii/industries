<?php
session_start();

// Authentication Functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isStockManager() {
    return isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], ['admin', 'stock_manager']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireStockManager() {
    requireLogin();
    if (!isStockManager()) {
        header('Location: index.php');
        exit();
    }
}

// User Management Functions
function loginUser($email, $password) {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_email'] = $user['email'];
        return true;
    }
    return false;
}

function logoutUser() {
    session_destroy();
    header('Location: login.php');
    exit();
}

function registerUser($name, $email, $password, $role = 'user') {
    $pdo = getDB();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$name, $email, $hashedPassword, $role]);
}

// Stock Management Functions
function getStockItems($limit = null, $category = null, $location = null) {
    $pdo = getDB();
    $sql = "SELECT si.*, c.name as category_name, l.name as location_name 
            FROM stock_items si 
            LEFT JOIN categories c ON si.category_id = c.id 
            LEFT JOIN locations l ON si.location_id = l.id";
    
    $params = [];
    $conditions = [];
    
    if ($category) {
        $conditions[] = "si.category_id = ?";
        $params[] = $category;
    }
    
    if ($location) {
        $conditions[] = "si.location_id = ?";
        $params[] = $location;
    }
    
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    
    $sql .= " ORDER BY si.name";
    
    if ($limit) {
        $sql .= " LIMIT ?";
        $params[] = $limit;
    }
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getStockItemById($id) {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT si.*, c.name as category_name, l.name as location_name 
                           FROM stock_items si 
                           LEFT JOIN categories c ON si.category_id = c.id 
                           LEFT JOIN locations l ON si.location_id = l.id 
                           WHERE si.id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addStockItem($name, $description, $category_id, $location_id, $quantity, $unit_price, $reorder_level) {
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO stock_items (name, description, category_id, location_id, quantity, unit_price, reorder_level) VALUES (?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$name, $description, $category_id, $location_id, $quantity, $unit_price, $reorder_level]);
}

function updateStockQuantity($item_id, $quantity_change, $type = 'in') {
    $pdo = getDB();
    $sql = "UPDATE stock_items SET quantity = quantity " . ($type === 'in' ? '+' : '-') . " ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([abs($quantity_change), $item_id]);
}

function recordStockMovement($item_id, $type, $quantity, $reference, $notes = '') {
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO stock_movements (item_id, type, quantity, reference, notes, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    return $stmt->execute([$item_id, $type, $quantity, $reference, $notes]);
}

function getStockMovements($item_id = null, $type = null, $limit = 50) {
    $pdo = getDB();
    $sql = "SELECT sm.*, si.name as item_name, si.sku 
            FROM stock_movements sm 
            JOIN stock_items si ON sm.item_id = si.id";
    
    $params = [];
    $conditions = [];
    
    if ($item_id) {
        $conditions[] = "sm.item_id = ?";
        $params[] = $item_id;
    }
    
    if ($type) {
        $conditions[] = "sm.type = ?";
        $params[] = $type;
    }
    
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    
    $sql .= " ORDER BY sm.created_at DESC LIMIT ?";
    $params[] = $limit;
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getCategories() {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM categories ORDER BY name");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getLocations() {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM locations ORDER BY name");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getDashboardStats() {
    $pdo = getDB();
    
    // Total stock items
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_items FROM stock_items");
    $stmt->execute();
    $totalItems = $stmt->fetch()['total_items'];
    
    // Low stock items
    $stmt = $pdo->prepare("SELECT COUNT(*) as low_stock FROM stock_items WHERE quantity <= reorder_level");
    $stmt->execute();
    $lowStock = $stmt->fetch()['low_stock'];
    
    // Out of stock items
    $stmt = $pdo->prepare("SELECT COUNT(*) as out_of_stock FROM stock_items WHERE quantity = 0");
    $stmt->execute();
    $outOfStock = $stmt->fetch()['out_of_stock'];
    
    // Total stock value
    $stmt = $pdo->prepare("SELECT SUM(quantity * unit_price) as total_value FROM stock_items");
    $stmt->execute();
    $totalValue = $stmt->fetch()['total_value'] ?: 0;
    
    return [
        'total_items' => $totalItems,
        'low_stock' => $lowStock,
        'out_of_stock' => $outOfStock,
        'total_value' => $totalValue
    ];
}

function getLowStockAlerts() {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT si.*, c.name as category_name, l.name as location_name 
                           FROM stock_items si 
                           LEFT JOIN categories c ON si.category_id = c.id 
                           LEFT JOIN locations l ON si.location_id = l.id 
                           WHERE si.quantity <= si.reorder_level 
                           ORDER BY si.quantity ASC");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getRecentMovements($limit = 10) {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT sm.*, si.name as item_name, si.sku 
                           FROM stock_movements sm 
                           JOIN stock_items si ON sm.item_id = si.id 
                           ORDER BY sm.created_at DESC 
                           LIMIT ?");
    $stmt->execute([$limit]);
    return $stmt->fetchAll();
}

// Utility Functions
function formatCurrency($amount, $currency = 'RWF') {
    return $currency . ' ' . number_format($amount, 0, '.', ',');
}

function formatDate($date) {
    return date('M j, Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('M j, Y g:i A', strtotime($datetime));
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function generateSKU($prefix = 'SKU') {
    return $prefix . '-' . strtoupper(uniqid());
}

function calculateStockValue($quantity, $unit_price) {
    return $quantity * $unit_price;
}

function isLowStock($quantity, $reorder_level) {
    return $quantity <= $reorder_level;
}

function isCriticalStock($quantity, $critical_threshold = null) {
    if ($critical_threshold === null) {
        $critical_threshold = CRITICAL_STOCK_THRESHOLD;
    }
    return $quantity <= $critical_threshold;
}
?>
