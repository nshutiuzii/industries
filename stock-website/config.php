<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'stock_management');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Site Configuration
define('SITE_NAME', 'ADMA');
define('SITE_URL', 'http://localhost/stock-website');
define('ADMIN_EMAIL', 'admin@adma.com');

// Stock Management Settings
define('LOW_STOCK_THRESHOLD', 10);
define('CRITICAL_STOCK_THRESHOLD', 5);
define('DEFAULT_CURRENCY', 'RWF');
define('DEFAULT_LOCATION', 'Main Warehouse');

// Session Configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 for HTTPS

// Error Reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
