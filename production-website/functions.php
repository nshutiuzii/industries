<?php
// Production Management System Functions

require_once 'db.php';

// Authentication Functions
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isProductionManager() {
    return isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], ['admin', 'production_manager']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireProductionManager() {
    requireLogin();
    if (!isProductionManager()) {
        header('Location: unauthorized.php');
        exit();
    }
}

function loginUser($user_id, $username, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $username;
    $_SESSION['user_role'] = $role;
    $_SESSION['login_time'] = time();
}

function logoutUser() {
    session_destroy();
    header('Location: login.php');
    exit();
}

function registerUser($username, $email, $password, $role = 'operator') {
    $pdo = getDB();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $email, $hashed_password, $role]);
}

// Production Management Functions
function getProductionPlans() {
    $pdo = getDB();
    $sql = "SELECT pp.*, p.name as product_name, m.name as machine_name 
            FROM production_plans pp 
            LEFT JOIN products p ON pp.product_id = p.id 
            LEFT JOIN machines m ON pp.machine_id = m.id 
            ORDER BY pp.start_date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getProductionPlanById($id) {
    $pdo = getDB();
    $sql = "SELECT pp.*, p.name as product_name, m.name as machine_name 
            FROM production_plans pp 
            LEFT JOIN products p ON pp.product_id = p.id 
            LEFT JOIN machines m ON pp.machine_id = m.id 
            WHERE pp.id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addProductionPlan($data) {
    $pdo = getDB();
    $sql = "INSERT INTO production_plans (product_id, machine_id, target_quantity, start_date, end_date, status, created_by) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['product_id'], $data['machine_id'], $data['target_quantity'],
        $data['start_date'], $data['end_date'], $data['status'], $data['created_by']
    ]);
}

function getDailyProductionLog($date = null) {
    $pdo = getDB();
    if (!$date) $date = date('Y-m-d');
    
    $sql = "SELECT dpl.*, p.name as product_name, m.name as machine_name, u.username as operator_name
            FROM daily_production_log dpl 
            LEFT JOIN products p ON dpl.product_id = p.id 
            LEFT JOIN machines m ON dpl.machine_id = m.id 
            LEFT JOIN users u ON dpl.operator_id = u.id 
            WHERE DATE(dpl.production_date) = ? 
            ORDER BY dpl.production_date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$date]);
    return $stmt->fetchAll();
}

function addDailyProductionLog($data) {
    $pdo = getDB();
    $sql = "INSERT INTO daily_production_log (product_id, machine_id, quantity_produced, quality_score, 
            production_date, operator_id, notes) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['product_id'], $data['machine_id'], $data['quantity_produced'],
        $data['quality_score'], $data['production_date'], $data['operator_id'], $data['notes']
    ]);
}

function getMachineUsage($machine_id = null, $date_from = null, $date_to = null) {
    $pdo = getDB();
    
    $sql = "SELECT mu.*, m.name as machine_name, p.name as product_name, u.username as operator_name
            FROM machine_usage mu 
            LEFT JOIN machines m ON mu.machine_id = m.id 
            LEFT JOIN products p ON mu.product_id = p.id 
            LEFT JOIN users u ON mu.operator_id = u.id";
    
    $params = [];
    $where_conditions = [];
    
    if ($machine_id) {
        $where_conditions[] = "mu.machine_id = ?";
        $params[] = $machine_id;
    }
    
    if ($date_from) {
        $where_conditions[] = "DATE(mu.start_time) >= ?";
        $params[] = $date_from;
    }
    
    if ($date_to) {
        $where_conditions[] = "DATE(mu.end_time) <= ?";
        $params[] = $date_to;
    }
    
    if (!empty($where_conditions)) {
        $sql .= " WHERE " . implode(" AND ", $where_conditions);
    }
    
    $sql .= " ORDER BY mu.start_time DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getMaterialTracker() {
    $pdo = getDB();
    $sql = "SELECT mt.*, m.name as material_name, s.name as supplier_name
            FROM material_tracker mt 
            LEFT JOIN materials m ON mt.material_id = m.id 
            LEFT JOIN suppliers s ON mt.supplier_id = s.id 
            ORDER BY mt.last_updated DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function updateMaterialStock($material_id, $quantity, $type = 'add') {
    $pdo = getDB();
    
    if ($type === 'add') {
        $sql = "UPDATE materials SET current_stock = current_stock + ?, last_updated = NOW() WHERE id = ?";
    } else {
        $sql = "UPDATE materials SET current_stock = current_stock - ?, last_updated = NOW() WHERE id = ?";
    }
    
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$quantity, $material_id]);
}

function getProductionReports($type = 'daily', $date = null) {
    $pdo = getDB();
    
    if (!$date) $date = date('Y-m-d');
    
    switch ($type) {
        case 'daily':
            $sql = "SELECT 
                        DATE(dpl.production_date) as date,
                        p.name as product_name,
                        SUM(dpl.quantity_produced) as total_produced,
                        AVG(dpl.quality_score) as avg_quality,
                        COUNT(DISTINCT dpl.operator_id) as operators_count
                    FROM daily_production_log dpl 
                    LEFT JOIN products p ON dpl.product_id = p.id 
                    WHERE DATE(dpl.production_date) = ? 
                    GROUP BY p.id, DATE(dpl.production_date)";
            break;
            
        case 'weekly':
            $sql = "SELECT 
                        YEARWEEK(dpl.production_date) as week,
                        p.name as product_name,
                        SUM(dpl.quantity_produced) as total_produced,
                        AVG(dpl.quality_score) as avg_quality
                    FROM daily_production_log dpl 
                    LEFT JOIN products p ON dpl.product_id = p.id 
                    WHERE YEARWEEK(dpl.production_date) = YEARWEEK(?) 
                    GROUP BY p.id, YEARWEEK(dpl.production_date)";
            break;
            
        default:
            $sql = "SELECT 
                        DATE(dpl.production_date) as date,
                        p.name as product_name,
                        SUM(dpl.quantity_produced) as total_produced,
                        AVG(dpl.quality_score) as avg_quality
                    FROM daily_production_log dpl 
                    LEFT JOIN products p ON dpl.product_id = p.id 
                    GROUP BY p.id, DATE(dpl.production_date) 
                    ORDER BY dpl.production_date DESC 
                    LIMIT 30";
            $date = null;
    }
    
    $stmt = $pdo->prepare($sql);
    if ($date) {
        $stmt->execute([$date]);
    } else {
        $stmt->execute();
    }
    return $stmt->fetchAll();
}

function getAlerts() {
    $pdo = getDB();
    $sql = "SELECT * FROM alerts WHERE status = 'active' ORDER BY priority DESC, created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTeamMembers() {
    $pdo = getDB();
    $sql = "SELECT u.*, d.name as department_name 
            FROM users u 
            LEFT JOIN departments d ON u.department_id = d.id 
            WHERE u.role IN ('operator', 'supervisor', 'production_manager') 
            ORDER BY u.department_id, u.username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getDashboardStats() {
    $pdo = getDB();
    
    // Today's production
    $sql_today = "SELECT 
                    COUNT(DISTINCT dpl.id) as total_entries,
                    SUM(dpl.quantity_produced) as total_produced,
                    AVG(dpl.quality_score) as avg_quality
                   FROM daily_production_log dpl 
                   WHERE DATE(dpl.production_date) = CURDATE()";
    $stmt = $pdo->prepare($sql_today);
    $stmt->execute();
    $today_stats = $stmt->fetch();
    
    // Active machines
    $sql_machines = "SELECT COUNT(*) as active_machines FROM machines WHERE status = 'active'";
    $stmt = $pdo->prepare($sql_machines);
    $stmt->execute();
    $machine_stats = $stmt->fetch();
    
    // Pending plans
    $sql_plans = "SELECT COUNT(*) as pending_plans FROM production_plans WHERE status = 'pending'";
    $stmt = $pdo->prepare($sql_plans);
    $stmt->execute();
    $plan_stats = $stmt->fetch();
    
    // Active alerts
    $sql_alerts = "SELECT COUNT(*) as active_alerts FROM alerts WHERE status = 'active'";
    $stmt = $pdo->prepare($sql_alerts);
    $stmt->execute();
    $alert_stats = $stmt->fetch();
    
    return [
        'today_production' => $today_stats,
        'active_machines' => $machine_stats['active_machines'],
        'pending_plans' => $plan_stats['pending_plans'],
        'active_alerts' => $alert_stats['active_alerts']
    ];
}

// Utility Functions
function formatDate($date) {
    return date('M d, Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('M d, Y H:i', strtotime($datetime));
}

function formatCurrency($amount) {
    return 'RWF ' . number_format($amount, 0, '.', ',');
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function calculateEfficiency($actual_output, $target_output) {
    if ($target_output == 0) return 0;
    return round(($actual_output / $target_output) * 100, 2);
}

function calculateOvertime($hours_worked) {
    $regular_hours = SHIFT_DURATION;
    return max(0, $hours_worked - $regular_hours);
}
