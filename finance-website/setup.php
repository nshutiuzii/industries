<?php
/**
 * Finance Pro - Setup Script
 * Run this file to set up your database and initial data
 */

// Check if already configured
if (file_exists('config.php')) {
    require_once 'config.php';
    
    // Try to connect to existing database
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        echo "<h2>✅ Setup Complete!</h2>";
        echo "<p>Your Finance Pro website is already configured and ready to use.</p>";
        echo "<p><a href='index.php' class='btn btn-primary'>Go to Website</a></p>";
        echo "<p><a href='admin.php' class='btn btn-secondary'>Admin Dashboard</a></p>";
        exit();
    } catch (PDOException $e) {
        // Database connection failed, continue with setup
    }
}

$step = $_GET['step'] ?? 1;
$error = '';
$success = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($step == 1) {
        // Database configuration
        $db_host = $_POST['db_host'] ?? 'localhost';
        $db_name = $_POST['db_name'] ?? 'finance';
        $db_user = $_POST['db_user'] ?? 'root';
        $db_pass = $_POST['db_pass'] ?? '';
        $site_name = $_POST['site_name'] ?? 'Finance Pro';
        $site_url = $_POST['site_url'] ?? 'http://localhost/finance-website';
        
        // Test database connection
        try {
            $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            
            // Create database if it doesn't exist
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            // Create config file
            $config_content = "<?php
// Database configuration
define('DB_HOST', '$db_host');
define('DB_NAME', '$db_name');
define('DB_USER', '$db_user');
define('DB_PASS', '$db_pass');
define('DB_CHARSET', 'utf8mb4');

// Site configuration
define('SITE_NAME', '$site_name');
define('SITE_URL', '$site_url');
define('ADMIN_EMAIL', 'admin@financepro.com');
?>";
            
            if (file_put_contents('config.php', $config_content)) {
                $success = 'Configuration file created successfully!';
                $step = 2;
            } else {
                $error = 'Could not create configuration file. Please check file permissions.';
            }
            
        } catch (PDOException $e) {
            $error = 'Database connection failed: ' . $e->getMessage();
        }
    } elseif ($step == 2) {
        // Create database tables
        try {
            require_once 'config.php';
            require_once 'db.php';
            
            // Read and execute schema
            $schema = file_get_contents('database/schema.sql');
            $pdo->exec($schema);
            
            // Read and execute seed data
            $seed = file_get_contents('database/seed.sql');
            $pdo->exec($seed);
            
            $success = 'Database tables and sample data created successfully!';
            $step = 3;
            
        } catch (Exception $e) {
            $error = 'Error creating database tables: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Pro - Setup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .setup-card { background: white; border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .step-indicator { display: flex; justify-content: center; margin-bottom: 2rem; }
        .step { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 1rem; font-weight: bold; }
        .step.active { background: #007bff; color: white; }
        .step.completed { background: #28a745; color: white; }
        .step.pending { background: #e9ecef; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="setup-card p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-chart-line" style="font-size: 4rem; color: #007bff; margin-bottom: 1rem;"></i>
                        <h1>Finance Pro Setup</h1>
                        <p class="lead text-muted">Complete the setup to get your financial website running</p>
                    </div>
                    
                    <!-- Step Indicators -->
                    <div class="step-indicator">
                        <div class="step <?php echo $step >= 1 ? 'active' : 'pending'; ?>">1</div>
                        <div class="step <?php echo $step >= 2 ? 'completed' : ($step == 2 ? 'active' : 'pending'); ?>">2</div>
                        <div class="step <?php echo $step >= 3 ? 'completed' : 'pending'; ?>">3</div>
                    </div>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    
                    <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                    <?php endif; ?>
                    
                    <?php if ($step == 1): ?>
                    <!-- Step 1: Configuration -->
                    <form method="POST">
                        <h3>Step 1: Database Configuration</h3>
                        <p class="text-muted">Enter your database connection details and site information.</p>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="db_host" class="form-label">Database Host</label>
                                <input type="text" class="form-control" id="db_host" name="db_host" value="localhost" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="db_name" class="form-label">Database Name</label>
                                <input type="text" class="form-control" id="db_name" name="db_name" value="finance" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="db_user" class="form-label">Database Username</label>
                                <input type="text" class="form-control" id="db_user" name="db_user" value="root" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="db_pass" class="form-label">Database Password</label>
                                <input type="password" class="form-control" id="db_pass" name="db_pass">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="site_name" class="form-label">Site Name</label>
                                <input type="text" class="form-control" id="site_name" name="site_name" value="Finance Pro" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="site_url" class="form-label">Site URL</label>
                                <input type="url" class="form-control" id="site_url" name="site_url" value="http://localhost/finance-website" required>
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Continue to Database Setup</button>
                        </div>
                    </form>
                    
                    <?php elseif ($step == 2): ?>
                    <!-- Step 2: Database Setup -->
                    <form method="POST">
                        <h3>Step 2: Database Setup</h3>
                        <p class="text-muted">Create database tables and sample data.</p>
                        
                        <div class="alert alert-info">
                            <h5>What will be created:</h5>
                            <ul class="mb-0">
                                <li>Users table (with admin account)</li>
                                <li>Services table (with sample services)</li>
                                <li>Blog posts table (with sample posts)</li>
                                <li>Testimonials table (with sample testimonials)</li>
                                <li>Pricing plans table (with sample plans)</li>
                                <li>Leads table (for contact form)</li>
                            </ul>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Create Database Tables</button>
                        </div>
                    </form>
                    
                    <?php elseif ($step == 3): ?>
                    <!-- Step 3: Setup Complete -->
                    <div class="text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle" style="font-size: 5rem; color: #28a745;"></i>
                        </div>
                        <h3>🎉 Setup Complete!</h3>
                        <p class="lead">Your Finance Pro website is ready to use.</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Default Admin Account</h5>
                                        <p class="mb-1"><strong>Email:</strong> admin@financepro.com</p>
                                        <p class="mb-0"><strong>Password:</strong> admin123</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Quick Links</h5>
                                        <p class="mb-2">Access your website and admin panel:</p>
                                        <a href="index.php" class="btn btn-primary btn-sm">View Website</a>
                                        <a href="admin.php" class="btn btn-secondary btn-sm">Admin Panel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-warning mt-4">
                            <h6>⚠️ Important Security Note:</h6>
                            <p class="mb-0">Please change the default admin password after your first login for security purposes.</p>
                        </div>
                        
                        <div class="mt-4">
                            <a href="index.php" class="btn btn-success btn-lg">Go to Website</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
