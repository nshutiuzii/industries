<?php
// Quality Control System Configuration
session_start();

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'quality_control_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Site Configuration
define('SITE_NAME', 'ADMA Quality Control');
define('SITE_URL', 'http://localhost/quality-website');
define('ADMIN_EMAIL', 'quality@adma.com');

// Quality Control Parameters
define('QUALITY_THRESHOLD', 95);
define('REJECTION_THRESHOLD', 5);
define('TEST_DURATION', 60);
define('APPROVAL_WORKFLOW', true);
define('AUDIT_FREQUENCY', 30);

// File Upload Settings
define('MAX_FILE_SIZE', 10485760); // 10MB
define('ALLOWED_EXTENSIONS', ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpg', 'png']);

// Notification Settings
define('EMAIL_NOTIFICATIONS', true);
define('SMS_NOTIFICATIONS', false);
define('ALERT_FREQUENCY', 'immediate');

// Timezone
date_default_timezone_set('Africa/Kigali');

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
