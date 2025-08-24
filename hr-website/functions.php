<?php
session_start();

// Authentication functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isHRManager() {
    return isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], ['admin', 'hr_manager']);
}

// User management functions
function registerUser($name, $email, $password, $role = 'user') {
    global $pdo;
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$name, $email, $password_hash, $role]);
}

function loginUser($email, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        return true;
    }
    return false;
}

function logoutUser() {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Employee functions
function getAllEmployees() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM employees ORDER BY name");
    return $stmt->fetchAll();
}

function getEmployeeById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addEmployee($data) {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO employees (name, email, phone, department_id, position, hire_date, salary, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $data['name'],
        $data['email'],
        $data['phone'],
        $data['department_id'],
        $data['position'],
        $data['hire_date'],
        $data['salary'],
        $data['status']
    ]);
}

// Department functions
function getAllDepartments() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM departments ORDER BY name");
    return $stmt->fetchAll();
}

function getDepartmentById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM departments WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Attendance functions
function getAttendanceByDate($date) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT a.*, e.name as employee_name FROM attendance a JOIN employees e ON a.employee_id = e.id WHERE DATE(a.check_in) = ? ORDER BY e.name");
    $stmt->execute([$date]);
    return $stmt->fetchAll();
}

function getAttendanceByEmployee($employee_id, $start_date, $end_date) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM attendance WHERE employee_id = ? AND DATE(check_in) BETWEEN ? AND ? ORDER BY check_in");
    $stmt->execute([$employee_id, $start_date, $end_date]);
    return $stmt->fetchAll();
}

// Leave functions
function getLeaveRequests($status = null) {
    global $pdo;
    
    if ($status) {
        $stmt = $pdo->prepare("SELECT l.*, e.name as employee_name FROM leave_requests l JOIN employees e ON l.employee_id = e.id WHERE l.status = ? ORDER BY l.created_at DESC");
        $stmt->execute([$status]);
    } else {
        $stmt = $pdo->query("SELECT l.*, e.name as employee_name FROM leave_requests l JOIN employees e ON l.employee_id = e.id ORDER BY l.created_at DESC");
    }
    return $stmt->fetchAll();
}

// Payroll functions
function getPayrollByMonth($month, $year) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT p.*, e.name as employee_name FROM payroll p JOIN employees e ON p.employee_id = e.id WHERE MONTH(p.pay_period) = ? AND YEAR(p.pay_period) = ? ORDER BY e.name");
    $stmt->execute([$month, $year]);
    return $stmt->fetchAll();
}

// Performance functions
function getPerformanceReviews($employee_id = null) {
    global $pdo;
    
    if ($employee_id) {
        $stmt = $pdo->prepare("SELECT p.*, e.name as employee_name FROM performance_reviews p JOIN employees e ON p.employee_id = e.id WHERE p.employee_id = ? ORDER BY p.review_date DESC");
        $stmt->execute([$employee_id]);
    } else {
        $stmt = $pdo->query("SELECT p.*, e.name as employee_name FROM performance_reviews p JOIN employees e ON p.employee_id = e.id ORDER BY p.review_date DESC");
    }
    return $stmt->fetchAll();
}

// Utility functions
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function formatDate($date) {
    return date('Y-m-d', strtotime($date));
}

function formatDateTime($datetime) {
    return date('Y-m-d H:i:s', strtotime($datetime));
}

function calculateWorkingHours($check_in, $check_out) {
    if (!$check_in || !$check_out) return 0;
    
    $check_in_time = strtotime($check_in);
    $check_out_time = strtotime($check_out);
    
    $diff = $check_out_time - $check_in_time;
    return round($diff / 3600, 2);
}

function getDashboardStats() {
    global $pdo;
    
    $stats = [];
    
    // Total employees
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM employees WHERE status = 'active'");
    $stats['total_employees'] = $stmt->fetch()['count'];
    
    // Present today
    $today = date('Y-m-d');
    $stmt = $pdo->prepare("SELECT COUNT(DISTINCT employee_id) as count FROM attendance WHERE DATE(check_in) = ?");
    $stmt->execute([$today]);
    $stats['present_today'] = $stmt->fetch()['count'];
    
    // Pending leave requests
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM leave_requests WHERE status = 'pending'");
    $stats['pending_leave'] = $stmt->fetch()['count'];
    
    // Total departments
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM departments");
    $stats['total_departments'] = $stmt->fetch()['count'];
    
    return $stats;
}
?>
