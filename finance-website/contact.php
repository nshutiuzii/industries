<?php
$page_title = 'Contact Us';
require_once 'config.php';
require_once 'functions.php';

$message = '';
$messageType = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $subject = sanitizeInput($_POST['subject'] ?? '');
    $message_text = sanitizeInput($_POST['message'] ?? '');
    
    // Basic validation
    if (empty($name) || empty($email) || empty($message_text)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'danger';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $messageType = 'danger';
    } else {
        // Insert lead into database
        if (insertLead($name, $email, $phone, $message_text)) {
            $message = 'Thank you! Your message has been sent successfully. We\'ll get back to you soon.';
            $messageType = 'success';
            
            // Clear form data
            $name = $email = $phone = $subject = $message_text = '';
        } else {
            $message = 'Sorry, there was an error sending your message. Please try again.';
            $messageType = 'danger';
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
                <h1 class="hero-title">Get In Touch</h1>
                <p class="hero-subtitle">Ready to start your financial journey? Let's discuss how we can help you achieve your goals.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show mb-4" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>
                
                <div class="contact-form">
                    <h3 class="text-center mb-4">Send Us a Message</h3>
                    <form id="contactForm" method="POST" action="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select class="form-select" id="subject" name="subject">
                                    <option value="">Select a subject</option>
                                    <option value="Financial Planning" <?php echo ($subject ?? '') === 'Financial Planning' ? 'selected' : ''; ?>>Financial Planning</option>
                                    <option value="Investment Advisory" <?php echo ($subject ?? '') === 'Investment Advisory' ? 'selected' : ''; ?>>Investment Advisory</option>
                                    <option value="Tax Consulting" <?php echo ($subject ?? '') === 'Tax Consulting' ? 'selected' : ''; ?>>Tax Consulting</option>
                                    <option value="Retirement Planning" <?php echo ($subject ?? '') === 'Retirement Planning' ? 'selected' : ''; ?>>Retirement Planning</option>
                                    <option value="Estate Planning" <?php echo ($subject ?? '') === 'Estate Planning' ? 'selected' : ''; ?>>Estate Planning</option>
                                    <option value="Insurance Solutions" <?php echo ($subject ?? '') === 'Insurance Solutions' ? 'selected' : ''; ?>>Insurance Solutions</option>
                                    <option value="General Inquiry" <?php echo ($subject ?? '') === 'General Inquiry' ? 'selected' : ''; ?>>General Inquiry</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required><?php echo htmlspecialchars($message_text ?? ''); ?></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Other Ways to Reach Us</h2>
                <p class="lead">We're here to help you succeed financially.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Office Location</h5>
                    <p class="text-muted">
                        123 Financial District<br>
                        New York, NY 10001<br>
                        United States
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>Phone</h5>
                    <p class="text-muted">
                        Main: (555) 123-4567<br>
                        Fax: (555) 123-4568<br>
                        Toll-free: 1-800-FINANCE
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>Email</h5>
                    <p class="text-muted">
                        info@financepro.com<br>
                        support@financepro.com<br>
                        admin@financepro.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Hours -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4">
                                <h3>Office Hours</h3>
                                <p class="text-muted">We're available during these hours to assist you:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM</li>
                                    <li class="mb-2"><strong>Saturday:</strong> 10:00 AM - 2:00 PM</li>
                                    <li class="mb-2"><strong>Sunday:</strong> Closed</li>
                                </ul>
                                <p class="text-muted">* Extended hours available by appointment</p>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="bg-primary bg-opacity-10 p-4 rounded">
                                    <i class="fas fa-clock" style="font-size: 4rem; color: var(--primary-color);"></i>
                                    <h5 class="mt-3">Schedule a Meeting</h5>
                                    <p class="text-muted">Book a consultation at your convenience</p>
                                    <a href="#" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Frequently Asked Questions</h2>
                <p class="lead">Get quick answers to common questions.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                How much does a financial consultation cost?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a complimentary initial consultation to discuss your financial goals and how we can help. This gives you the opportunity to learn about our services without any obligation.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                What information should I bring to my first meeting?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                For your first meeting, it's helpful to bring recent financial statements, tax returns, and a list of your financial goals. However, don't worry if you don't have everything - we can work with what you have.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                How often will we meet to review my financial plan?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We typically meet quarterly to review your financial plan and make any necessary adjustments. However, we're always available for urgent questions or concerns between scheduled meetings.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Do you work with clients outside of New York?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We work with clients across the United States. We can conduct meetings via video conference, phone, or in-person when you're in the area.
                            </div>
                        </div>
                    </div>
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
                <p class="lead mb-4">Take the first step toward financial success today.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#contactForm" class="btn btn-light btn-lg">Contact Us Now</a>
                    <a href="services.php" class="btn btn-outline-light btn-lg">Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
