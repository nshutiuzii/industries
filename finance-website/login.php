<?php
$page_title = 'Login';
require_once 'config.php';
require_once 'functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        if (loginUser($email, $password)) {
            // Redirect based on user role
            if (isAdmin()) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $error = 'Invalid email or password.';
        }
    }
}

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="hero-section" style="padding: 120px 0 60px;">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="hero-title">Welcome Back</h1>
                <p class="hero-subtitle">Sign in to your account to access your financial dashboard.</p>
            </div>
        </div>
    </div>
</section>

<!-- Login Form -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="service-icon mx-auto mb-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <h3>Sign In</h3>
                            <p class="text-muted">Enter your credentials to access your account</p>
                        </div>
                        
                        <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>
                        
                        <form id="loginForm" method="POST" action="">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="mb-2">
                                <a href="#" class="text-decoration-none">Forgot your password?</a>
                            </p>
                            <p class="mb-0">
                                Don't have an account? 
                                <a href="register.php" class="text-decoration-none">Sign up here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Why Choose Finance Pro?</h2>
                <p class="lead">Join thousands of satisfied clients who trust us with their financial success.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5>Secure & Private</h5>
                    <p class="text-muted">Your financial information is protected with bank-level security and encryption.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5>Expert Guidance</h5>
                    <p class="text-muted">Get personalized advice from certified financial planners and investment advisors.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5>24/7 Access</h5>
                    <p class="text-muted">Access your financial dashboard anytime, anywhere with our secure online platform.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2>Ready to Get Started?</h2>
                <p class="lead mb-4">Create your account and start your journey to financial success.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="register.php" class="btn btn-light btn-lg">Create Account</a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
