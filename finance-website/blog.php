<?php
$page_title = 'Blog';
require_once 'config.php';
require_once 'functions.php';

// Check if viewing a single post
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post = getPost($_GET['id']);
    if (!$post) {
        header('Location: blog.php');
        exit();
    }
    $page_title = $post['title'];
} else {
    // Fetch all posts for blog listing
    $posts = getPosts();
}

include 'includes/header.php';
?>

<?php if (isset($post)): ?>
<!-- Single Blog Post -->
<section class="hero-section" style="padding: 120px 0 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="blog.php" class="text-light">Blog</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page"><?php echo htmlspecialchars($post['title']); ?></li>
                    </ol>
                </nav>
                <h1 class="hero-title"><?php echo htmlspecialchars($post['title']); ?></h1>
                <p class="text-light opacity-75">Published on <?php echo formatDate($post['created_at']); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <article class="blog-post">
                    <?php if ($post['image']): ?>
                    <div class="blog-image mb-4">
                        <img src="assets/img/<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-fluid rounded">
                    </div>
                    <?php else: ?>
                    <div class="blog-image mb-4">
                        <div class="bg-light p-5 rounded text-center">
                            <i class="fas fa-newspaper" style="font-size: 6rem; color: var(--primary-color); opacity: 0.3;"></i>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="blog-content">
                        <div class="content-text">
                            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                        </div>
                        
                        <hr class="my-5">
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="blog.php" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Blog
                            </a>
                            <div class="share-buttons">
                                <span class="text-muted me-2">Share:</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary me-2" onclick="shareOnSocial('facebook')">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary me-2" onclick="shareOnSocial('twitter')">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary" onclick="shareOnSocial('linkedin')">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<?php else: ?>
<!-- Blog Listing -->
<section class="hero-section" style="padding: 120px 0 60px;">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="hero-title">Financial Insights & Tips</h1>
                <p class="hero-subtitle">Stay informed with our latest articles on financial planning, investment strategies, and wealth management.</p>
            </div>
        </div>
    </div>
</section>

<section class="blog-section">
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <?php if ($post['image']): ?>
                    <div class="blog-image">
                        <img src="assets/img/<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-fluid">
                    </div>
                    <?php else: ?>
                    <div class="blog-image">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <?php endif; ?>
                    
                    <div class="blog-content">
                        <div class="blog-date"><?php echo formatDate($post['created_at']); ?></div>
                        <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                        <p class="text-muted">
                            <?php 
                            $excerpt = strip_tags($post['content']);
                            echo strlen($excerpt) > 150 ? substr($excerpt, 0, 150) . '...' : $excerpt;
                            ?>
                        </p>
                        <a href="blog.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if (empty($posts)): ?>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="py-5">
                    <i class="fas fa-newspaper" style="font-size: 4rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
                    <h3>No Blog Posts Yet</h3>
                    <p class="text-muted">We're working on creating valuable content for you. Check back soon!</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3>Stay Updated</h3>
                <p class="lead text-muted">Get the latest financial insights delivered to your inbox.</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-md-8">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email address">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Subscribe</button>
                    </div>
                </form>
                <small class="text-muted">We respect your privacy. Unsubscribe at any time.</small>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2>Ready to Take Control of Your Finances?</h2>
                <p class="lead mb-4">Let our experts help you create a personalized financial plan.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="contact.php" class="btn btn-light btn-lg">Get Free Consultation</a>
                    <a href="services.php" class="btn btn-outline-light btn-lg">Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function shareOnSocial(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    
    let shareUrl = '';
    
    switch(platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
            break;
    }
    
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
