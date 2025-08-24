<?php
require_once 'config.php';
require_once 'db.php';

// Authentication Functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isQualityManager() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'quality_manager';
}

function isQCInspector() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'qc_inspector';
}

// Quality Control Functions
function getQualityOverview() {
    try {
        $pdo = getDB();
        $stmt = $pdo->query("
            SELECT 
                COUNT(*) as total_batches,
                SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) as approved_batches,
                SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) as rejected_batches,
                SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending_batches,
                AVG(quality_score) as avg_quality_score
            FROM quality_batches
        ");
        return $stmt->fetch();
    } catch (PDOException $e) {
        return false;
    }
}

function getRecentQualityIssues($limit = 10) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            SELECT * FROM qc_issues 
            ORDER BY created_at DESC 
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getQualityTrends($days = 30) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            SELECT 
                DATE(created_at) as date,
                AVG(quality_score) as avg_score,
                COUNT(*) as batch_count
            FROM quality_batches 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL ? DAY)
            GROUP BY DATE(created_at)
            ORDER BY date
        ");
        $stmt->execute([$days]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function createQualityTest($data) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            INSERT INTO quality_tests (
                test_name, test_method, parameters, expected_results, 
                created_by, created_at
            ) VALUES (?, ?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([
            $data['test_name'],
            $data['test_method'],
            $data['parameters'],
            $data['expected_results'],
            $data['created_by']
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

function getTestHistory($filters = []) {
    try {
        $pdo = getDB();
        $sql = "SELECT * FROM quality_tests ORDER BY created_at DESC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getTestMethods() {
    try {
        $pdo = getDB();
        $stmt = $pdo->query("SELECT * FROM test_methods ORDER BY method_name");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getComplianceChecklists() {
    try {
        $pdo = getDB();
        $stmt = $pdo->query("SELECT * FROM compliance_checklists ORDER BY category, checklist_name");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getQualityStandards() {
    try {
        $pdo = getDB();
        $stmt = $pdo->query("SELECT * FROM quality_standards ORDER BY standard_name");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getAuditSchedule() {
    try {
        $pdo = getDB();
        $stmt = $pdo->query("
            SELECT * FROM quality_audits 
            ORDER BY scheduled_date ASC
        ");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function createQualityBatch($data) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            INSERT INTO quality_batches (
                batch_number, product_name, quantity, 
                production_date, quality_score, status, 
                created_by, created_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([
            $data['batch_number'],
            $data['product_name'],
            $data['quantity'],
            $data['production_date'],
            $data['quality_score'],
            $data['status'],
            $data['created_by']
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

function updateBatchStatus($batch_id, $status, $notes = '') {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            UPDATE quality_batches 
            SET status = ?, notes = ?, updated_at = NOW()
            WHERE id = ?
        ");
        return $stmt->execute([$status, $notes, $batch_id]);
    } catch (PDOException $e) {
        return false;
    }
}

function createQCIssue($data) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            INSERT INTO qc_issues (
                issue_type, severity, description, 
                batch_id, reported_by, status, created_at
            ) VALUES (?, ?, ?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([
            $data['issue_type'],
            $data['severity'],
            $data['description'],
            $data['batch_id'],
            $data['reported_by'],
            $data['status']
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

function getQualityReports($filters = []) {
    try {
        $pdo = getDB();
        $sql = "
            SELECT 
                qb.*,
                COUNT(qi.id) as issue_count
            FROM quality_batches qb
            LEFT JOIN qc_issues qi ON qb.id = qi.batch_id
            GROUP BY qb.id
            ORDER BY qb.created_at DESC
        ";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

// Utility Functions
function formatDate($date) {
    return date('M d, Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('M d, Y H:i', strtotime($datetime));
}

function getQualityStatusClass($status) {
    switch ($status) {
        case 'approved':
            return 'success';
        case 'rejected':
            return 'danger';
        case 'pending':
            return 'warning';
        default:
            return 'secondary';
    }
}

function getSeverityClass($severity) {
    switch ($severity) {
        case 'critical':
            return 'danger';
        case 'high':
            return 'warning';
        case 'medium':
            return 'info';
        case 'low':
            return 'success';
        default:
            return 'secondary';
    }
}

function generateBatchNumber() {
    return 'BATCH-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
}

function calculateQualityScore($parameters) {
    // Simple quality score calculation
    $total = 0;
    $count = 0;
    
    foreach ($parameters as $param) {
        if (isset($param['value']) && isset($param['target'])) {
            $deviation = abs($param['value'] - $param['target']) / $param['target'];
            $score = max(0, 100 - ($deviation * 100));
            $total += $score;
            $count++;
        }
    }
    
    return $count > 0 ? round($total / $count, 2) : 0;
}

// Notification Functions
function sendQualityAlert($type, $message, $recipients = []) {
    if (EMAIL_NOTIFICATIONS) {
        // Email notification logic would go here
        error_log("Quality Alert: $type - $message");
    }
}

function logQualityAction($action, $details, $user_id) {
    try {
        $pdo = getDB();
        $stmt = $pdo->prepare("
            INSERT INTO quality_audit_log (
                action, details, user_id, created_at
            ) VALUES (?, ?, ?, NOW())
        ");
        return $stmt->execute([$action, $details, $user_id]);
    } catch (PDOException $e) {
        return false;
    }
}
?>
