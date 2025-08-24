<?php
session_start();
require_once 'db.php';

// Authentication functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireAdmin() {
    requireLogin();
    if (!isAdmin()) {
        header('Location: index.php');
        exit();
    }
}

// User functions
function registerUser($name, $email, $password) {
    global $pdo;
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, $password_hash]);
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
    header('Location: index.php');
    exit();
}

// Data fetching functions
function getServices($limit = null) {
    global $pdo;
    
    $sql = "SELECT * FROM services ORDER BY created_at DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getPosts($limit = null) {
    global $pdo;
    
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getPost($id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getTestimonials($limit = null) {
    global $pdo;
    
    $sql = "SELECT * FROM testimonials ORDER BY created_at DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getPricingPlans() {
    global $pdo;
    
    $stmt = $pdo->query("SELECT * FROM pricing ORDER BY price ASC");
    return $stmt->fetchAll();
}

// Lead functions
function insertLead($name, $email, $phone, $message) {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO leads (name, email, phone, message) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$name, $email, $phone, $message]);
}

// Admin functions
function getDashboardStats() {
    global $pdo;
    
    $stats = [];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
    $stats['users'] = $stmt->fetch()['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM leads");
    $stats['leads'] = $stmt->fetch()['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM posts");
    $stats['posts'] = $stmt->fetch()['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM services");
    $stats['services'] = $stmt->fetch()['count'];
    
    return $stats;
}

// Utility functions
function formatDate($date) {
    return date('M d, Y', strtotime($date));
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>
