<?php
$page_title = 'Admin Dashboard';
require_once 'config.php';
require_once 'functions.php';

// Require admin access
requireAdmin();

// Handle form submissions
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add_service':
            $name = sanitizeInput($_POST['name']);
            $description = sanitizeInput($_POST['description']);
            $icon = sanitizeInput($_POST['icon']);
            
            if (empty($name) || empty($description)) {
                $message = 'Please fill in all required fields.';
                $messageType = 'danger';
            } else {
                $stmt = $pdo->prepare("INSERT INTO services (name, description, icon) VALUES (?, ?, ?)");
                if ($stmt->execute([$name, $description, $icon])) {
                    $message = 'Service added successfully!';
                    $messageType = 'success';
                } else {
                    $message = 'Error adding service.';
                    $messageType = 'danger';
                }
            }
            break;
            
        case 'add_post':
            $title = sanitizeInput($_POST['title']);
            $content = sanitizeInput($_POST['content']);
            $image = sanitizeInput($_POST['image']);
            
            if (empty($title) || empty($content)) {
                $message = 'Please fill in all required fields.';
                $messageType = 'danger';
            } else {
                $stmt = $pdo->prepare("INSERT INTO posts (title, content, image) VALUES (?, ?, ?)");
                if ($stmt->execute([$title, $content, $image])) {
                    $message = 'Post added successfully!';
                    $messageType = 'success';
                } else {
                    $message = 'Error adding post.';
                    $messageType = 'danger';
                }
            }
            break;
            
        case 'add_testimonial':
            $author = sanitizeInput($_POST['author']);
            $role_company = sanitizeInput($_POST['role_company']);
            $quote = sanitizeInput($_POST['quote']);
            $rating = (int)$_POST['rating'];
            $avatar = sanitizeInput($_POST['avatar']);
            
            if (empty($author) || empty($quote)) {
                $message = 'Please fill in all required fields.';
                $messageType = 'danger';
            } else {
                $stmt = $pdo->prepare("INSERT INTO testimonials (author, role_company, quote, rating, avatar) VALUES (?, ?, ?, ?, ?)");
                if ($stmt->execute([$author, $role_company, $quote, $rating, $avatar])) {
                    $message = 'Testimonial added successfully!';
                    $messageType = 'success';
                } else {
                    $message = 'Error adding testimonial.';
                    $messageType = 'danger';
                }
            }
            break;
            
        case 'add_pricing':
            $plan = sanitizeInput($_POST['plan']);
            $price = (float)$_POST['price'];
            $period = sanitizeInput($_POST['period']);
            $features = sanitizeInput($_POST['features']);
            $featured = isset($_POST['featured']) ? 1 : 0;
            
            if (empty($plan) || $price <= 0) {
                $message = 'Please fill in all required fields.';
                $messageType = 'danger';
            } else {
                $stmt = $pdo->prepare("INSERT INTO pricing (plan, price, period, features, featured) VALUES (?, ?, ?, ?, ?)");
                if ($stmt->execute([$plan, $price, $period, $features, $featured])) {
                    $message = 'Pricing plan added successfully!';
                    $messageType = 'success';
                } else {
                    $message = 'Error adding pricing plan.';
                    $messageType = 'danger';
                }
            }
            break;
            
        case 'delete_service':
            $id = (int)$_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
            if ($stmt->execute([$id])) {
                $message = 'Service deleted successfully!';
                $messageType = 'success';
            } else {
                $message = 'Error deleting service.';
                $messageType = 'danger';
            }
            break;
            
        case 'delete_post':
            $id = (int)$_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
            if ($stmt->execute([$id])) {
                $message = 'Post deleted successfully!';
                $messageType = 'success';
            } else {
                $message = 'Error deleting post.';
                $messageType = 'danger';
            }
            break;
            
        case 'delete_testimonial':
            $id = (int)$_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM testimonials WHERE id = ?");
            if ($stmt->execute([$id])) {
                $message = 'Testimonial deleted successfully!';
                $messageType = 'success';
            } else {
                $message = 'Error deleting testimonial.';
                $messageType = 'danger';
            }
            break;
            
        case 'delete_pricing':
            $id = (int)$_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM pricing WHERE id = ?");
            if ($stmt->execute([$id])) {
                $message = 'Pricing plan deleted successfully!';
                $messageType = 'success';
            } else {
                $message = 'Error deleting pricing plan.';
                $messageType = 'danger';
            }
            break;
    }
}

// Fetch data for dashboard
$stats = getDashboardStats();
$services = getServices();
$posts = getPosts();
$testimonials = getTestimonials();
$pricingPlans = getPricingPlans();

// Fetch recent leads
$stmt = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC LIMIT 10");
$recentLeads = $stmt->fetchAll();

include 'includes/header.php';
?>

<!-- Admin Header -->
<section class="hero-section" style="padding: 120px 0 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="hero-title">Admin Dashboard</h1>
                <p class="hero-subtitle">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="index.php" class="btn btn-light">View Site</a>
                <a href="logout.php" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Stats -->
<section class="admin-dashboard">
    <div class="container">
        <?php if ($message): ?>
        <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show mb-4" role="alert">
            <?php echo htmlspecialchars($message); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card-admin">
                    <div class="stat-number"><?php echo $stats['users']; ?></div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card-admin">
                    <div class="stat-number"><?php echo $stats['leads']; ?></div>
                    <div class="stat-label">Total Leads</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card-admin">
                    <div class="stat-number"><?php echo $stats['posts']; ?></div>
                    <div class="stat-label">Blog Posts</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card-admin">
                    <div class="stat-number"><?php echo $stats['services']; ?></div>
                    <div class="stat-label">Services</div>
                </div>
            </div>
        </div>
        
        <!-- Recent Leads -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="admin-table">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Leads</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentLeads as $lead): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($lead['name']); ?></td>
                                    <td><?php echo htmlspecialchars($lead['email']); ?></td>
                                    <td><?php echo htmlspecialchars($lead['phone']); ?></td>
                                    <td><?php echo htmlspecialchars(substr($lead['message'], 0, 50)) . '...'; ?></td>
                                    <td><?php echo formatDate($lead['created_at']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CRUD Operations -->
        <div class="row">
            <!-- Services Management -->
            <div class="col-lg-6 mb-5">
                <div class="admin-table">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Services Management</h5>
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                            <i class="fas fa-plus"></i> Add Service
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($services as $service): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($service['name']); ?></td>
                                    <td><?php echo htmlspecialchars(substr($service['description'], 0, 50)) . '...'; ?></td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="action" value="delete_service">
                                            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Blog Posts Management -->
            <div class="col-lg-6 mb-5">
                <div class="admin-table">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Blog Posts Management</h5>
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addPostModal">
                            <i class="fas fa-plus"></i> Add Post
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                                    <td><?php echo formatDate($post['created_at']); ?></td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="action" value="delete_post">
                                            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Testimonials Management -->
            <div class="col-lg-6 mb-5">
                <div class="admin-table">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Testimonials Management</h5>
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                            <i class="fas fa-plus"></i> Add Testimonial
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Author</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($testimonials as $testimonial): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($testimonial['author']); ?></td>
                                    <td>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'text-warning' : 'text-muted'; ?>"></i>
                                        <?php endfor; ?>
                                    </td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="action" value="delete_testimonial">
                                            <input type="hidden" name="id" value="<?php echo $testimonial['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Pricing Management -->
            <div class="col-lg-6 mb-5">
                <div class="admin-table">
                    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Pricing Management</h5>
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addPricingModal">
                            <i class="fas fa-plus"></i> Add Plan
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Plan</th>
                                    <th>Price</th>
                                    <th>Period</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pricingPlans as $plan): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($plan['plan']); ?></td>
                                    <td>$<?php echo number_format($plan['price'], 2); ?></td>
                                    <td><?php echo $plan['period']; ?></td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="action" value="delete_pricing">
                                            <input type="hidden" name="id" value="<?php echo $plan['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="add_service">
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon Class (FontAwesome)</label>
                        <input type="text" class="form-control" name="icon" placeholder="fas fa-chart-line">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Post Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Blog Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="add_post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" name="content" rows="8" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Filename</label>
                        <input type="text" class="form-control" name="image" placeholder="blog-1.jpg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Testimonial Modal -->
<div class="modal fade" id="addTestimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="add_testimonial">
                    <div class="mb-3">
                        <label for="author" class="form-label">Author Name</label>
                        <input type="text" class="form-control" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="role_company" class="form-label">Role/Company</label>
                        <input type="text" class="form-control" name="role_company">
                    </div>
                    <div class="mb-3">
                        <label for="quote" class="form-label">Testimonial Quote</label>
                        <textarea class="form-control" name="quote" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" name="rating">
                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar Filename</label>
                        <input type="text" class="form-control" name="avatar" placeholder="avatar-1.jpg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Pricing Modal -->
<div class="modal fade" id="addPricingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Pricing Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="add_pricing">
                    <div class="mb-3">
                        <label for="plan" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" name="plan" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" step="0.01" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form-label">Billing Period</label>
                        <select class="form-select" name="period">
                            <option value="mo">Monthly</option>
                            <option value="yr">Yearly</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="features" class="form-label">Features (one per line)</label>
                        <textarea class="form-control" name="features" rows="5" required></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="featured" id="featured">
                        <label class="form-check-label" for="featured">
                            Featured Plan
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Plan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
