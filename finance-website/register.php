<?php
$page_title = 'Register';
require_once 'config.php';
require_once 'functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Please fill in all fields.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // Check if email already exists
        global $pdo;
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = 'An account with this email address already exists.';
        } else {
            // Register user
            if (registerUser($name, $email, $password)) {
                $success = 'Account created successfully! You can now sign in.';
                // Clear form data
                $name = $email = '';
            } else {
                $error = 'Sorry, there was an error creating your account. Please try again.';
            }
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
                <h1 class="hero-title">Create Your Account</h1>
                <p class="hero-subtitle">Join Finance Pro and start your journey to financial success.</p>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="service-icon mx-auto mb-3">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h3>Sign Up</h3>
                            <p class="text-muted">Create your account to get started</p>
                        </div>
                        
                        <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <?php echo htmlspecialchars($success); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>
                        
                        <form id="registerForm" method="POST" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                                <div class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-text">Password must be at least 6 characters long.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Subscribe to our newsletter for financial tips and updates
                                </label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="mb-0">
                                Already have an account? 
                                <a href="login.php" class="text-decoration-none">Sign in here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Benefits of Creating an Account</h2>
                <p class="lead">Unlock exclusive features and personalized financial guidance.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5>Personalized Dashboard</h5>
                    <p class="text-muted">Track your financial progress with a customized dashboard tailored to your goals.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5>Easy Scheduling</h5>
                    <p class="text-muted">Book consultations and meetings directly through your account dashboard.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h5>Document Access</h5>
                    <p class="text-muted">Securely access and download your financial documents and reports.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Security Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2>Your Security is Our Priority</h2>
                <p class="lead">We use industry-standard security measures to protect your information.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Bank-level encryption (256-bit SSL)</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Secure password hashing</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Regular security audits</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Two-factor authentication available</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>GDPR compliant data handling</li>
                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-light p-5 rounded-3">
                    <i class="fas fa-shield-alt" style="font-size: 8rem; color: var(--primary-color); opacity: 0.3;"></i>
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
                <p class="lead mb-4">Create your account today and take the first step toward financial success.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#registerForm" class="btn btn-light btn-lg">Create Account</a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
