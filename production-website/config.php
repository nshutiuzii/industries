<?php
// Production Management System Configuration

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'production_management');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Site Configuration
define('SITE_NAME', 'ADMA Production');
define('SITE_URL', 'http://localhost/production-website');
define('ADMIN_EMAIL', 'admin@adma.com');

// Production Management Settings
define('SHIFT_DURATION', 8); // hours
define('BREAK_TIME', 30); // minutes
define('OVERTIME_THRESHOLD', 8); // hours
define('QUALITY_THRESHOLD', 95); // percentage
define('EFFICIENCY_TARGET', 85); // percentage

// Session Configuration
session_start();
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// Error Reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Africa/Kigali');

// Security Headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
