<?php
$page_title = 'Our Services';
require_once 'config.php';
require_once 'functions.php';

// Fetch all services
$services = getServices();

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="hero-section" style="padding: 120px 0 60px;">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="hero-title">Our Services</h1>
                <p class="hero-subtitle">Comprehensive financial solutions to help you achieve your goals.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>What We Offer</h2>
                <p class="lead text-muted">From financial planning to investment management, we provide the expertise and guidance you need to build wealth and secure your future.</p>
            </div>
        </div>
        
        <div class="row">
            <?php foreach ($services as $service): ?>
            <div class="col-lg-6 mb-4">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="<?php echo htmlspecialchars($service['icon']); ?>"></i>
                    </div>
                    <h4><?php echo htmlspecialchars($service['name']); ?></h4>
                    <p class="text-muted"><?php echo htmlspecialchars($service['description']); ?></p>
                    <a href="contact.php" class="btn btn-outline-primary">Get Started</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Service Details</h2>
                <p class="lead">Learn more about how each service can benefit you.</p>
            </div>
        </div>
        
        <!-- Financial Planning -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4">
                <h3>Financial Planning</h3>
                <p class="lead">Comprehensive financial planning tailored to your unique situation.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Goal setting and prioritization</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Cash flow analysis and budgeting</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Debt management strategies</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Emergency fund planning</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Regular plan reviews and updates</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Start Planning</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white p-5 rounded-3 shadow">
                    <i class="fas fa-chart-line" style="font-size: 6rem; color: var(--primary-color);"></i>
                </div>
            </div>
        </div>
        
        <!-- Investment Advisory -->
        <div class="row align-items-center mb-5 flex-row-reverse">
            <div class="col-lg-6 mb-4">
                <h3>Investment Advisory</h3>
                <p class="lead">Expert investment advice to help you build and grow your portfolio.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Portfolio analysis and optimization</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Risk assessment and management</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Asset allocation strategies</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Regular portfolio rebalancing</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Performance monitoring and reporting</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Get Advice</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white p-5 rounded-3 shadow">
                    <i class="fas fa-chart-pie" style="font-size: 6rem; color: var(--primary-color);"></i>
                </div>
            </div>
        </div>
        
        <!-- Tax Consulting -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4">
                <h3>Tax Consulting</h3>
                <p class="lead">Strategic tax planning to minimize your tax burden and maximize savings.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tax-efficient investment strategies</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Retirement account optimization</li>
                    <li class="mb-2"><i class="mb-2"><i class="fas fa-check text-success me-2"></i>Business tax planning</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Estate tax strategies</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Year-round tax planning</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Tax Planning</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white p-5 rounded-3 shadow">
                    <i class="fas fa-calculator" style="font-size: 6rem; color: var(--primary-color);"></i>
                </div>
            </div>
        </div>
        
        <!-- Retirement Planning -->
        <div class="row align-items-center mb-5 flex-row-reverse">
            <div class="col-lg-6 mb-4">
                <h3>Retirement Planning</h3>
                <p class="lead">Secure your golden years with comprehensive retirement planning.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Retirement goal setting</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Social Security optimization</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>401(k) and IRA strategies</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Income planning for retirement</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Healthcare cost planning</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Plan Retirement</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white p-5 rounded-3 shadow">
                    <i class="fas fa-piggy-bank" style="font-size: 6rem; color: var(--primary-color);"></i>
                </div>
            </div>
        </div>
        
        <!-- Estate Planning -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4">
                <h3>Estate Planning</h3>
                <p class="lead">Protect your legacy and ensure your wishes are carried out.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Will and trust creation</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Beneficiary designation review</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Power of attorney setup</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Healthcare directive planning</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Charitable giving strategies</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Estate Planning</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white p-5 rounded-3 shadow">
                    <i class="fas fa-home" style="font-size: 6rem; color: var(--primary-color);"></i>
                </div>
            </div>
        </div>
        
        <!-- Insurance Solutions -->
        <div class="row align-items-center mb-5 flex-row-reverse">
            <div class="col-lg-6 mb-4">
                <h3>Insurance Solutions</h3>
                <p class="lead">Protect what matters most with comprehensive insurance coverage.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Life insurance analysis</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Disability insurance review</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Long-term care planning</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Property and casualty review</li>
                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Business insurance strategies</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Insurance Review</a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white p-5 rounded-3 shadow">
                    <i class="fas fa-shield-alt" style="font-size: 6rem; color: var(--primary-color);"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Our Process</h2>
                <p class="lead">How we work with you to achieve your financial goals.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="h1 text-primary">1</span>
                    </div>
                    <h5>Discovery</h5>
                    <p class="text-muted">We start by understanding your current situation, goals, and concerns.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="h1 text-primary">2</span>
                    </div>
                    <h5>Analysis</h5>
                    <p class="text-muted">We analyze your financial data and create a comprehensive plan.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="h1 text-primary">3</span>
                    </div>
                    <h5>Implementation</h5>
                    <p class="text-muted">We help you implement the strategies and recommendations.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3">
                        <span class="h1 text-primary">4</span>
                    </div>
                    <h5>Monitoring</h5>
                    <p class="text-muted">We continuously monitor and adjust your plan as needed.</p>
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
                <p class="lead mb-4">Let's discuss how our services can help you achieve your financial goals.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="contact.php" class="btn btn-light btn-lg">Schedule Consultation</a>
                    <a href="about.php" class="btn btn-outline-light btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
