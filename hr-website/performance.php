<?php
$page_title = 'Performance Management';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <div class="row">
        <!-- Left Sidebar Navigation -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar">
                <div class="sidebar-header">
                    <h5>Navigation</h5>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="all-employees.php">
                                <i class="fas fa-users"></i>
                                <span>All Employees</span>
                                <span class="item-counter">10</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-employee.php">
                                <i class="fas fa-user-plus"></i>
                                <span>Add Employee</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="departments.php">
                                <i class="fas fa-building"></i>
                                <span>Departments</span>
                                <span class="item-counter">5</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="daily-attendance.php">
                                <i class="fas fa-clock"></i>
                                <span>Daily Attendance</span>
                                <span class="item-counter">9</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shifts.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Shifts</span>
                                <span class="item-counter">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attendance-reports.php">
                                <i class="fas fa-chart-bar"></i>
                                <span>Attendance Reports</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="leave.php">
                                <i class="fas fa-calendar-check"></i>
                                <span>Leave</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="payroll.php">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Payroll</span>
                                <span class="item-counter">10</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="performance.php">
                                <i class="fas fa-chart-line"></i>
                                <span>Performance</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <!-- Sidebar Footer with User Info -->
                <div class="sidebar-footer">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <p class="user-name"><?php echo isLoggedIn() ? $_SESSION['user_name'] : 'Guest User'; ?></p>
                            <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isHRManager() ? 'HR Manager' : 'Employee'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Dashboard Content -->
        <div class="col-lg-9 col-md-8">
            <div class="dashboard-content">
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Performance Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                                <i class="fas fa-plus me-2"></i>Add Review
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Performance Statistics -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">4.2</h3>
                                <p class="stat-label">Avg. Rating</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
                                <p class="stat-label">Reviews This Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">2</h3>
                                <p class="stat-label">Needs Improvement</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">15</h3>
                                <p class="stat-label">Due Next Month</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Reviews Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Performance Reviews</h5>
                                <span class="text-muted">Employee performance evaluations</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Rating</th>
                                                <th>Review Date</th>
                                                <th>Next Review</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-primary me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>John Doe</strong>
                                                            <br><small class="text-muted">EMP001</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Human Resources</td>
                                                <td>
                                                    <div class="rating-stars">
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="far fa-star text-warning"></i>
                                                        <span class="ms-2">4.0</span>
                                                    </div>
                                                </td>
                                                <td>Dec 15, 2024</td>
                                                <td>Jun 15, 2025</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="viewReview(1)">View</button>
                                                    <button class="btn btn-sm btn-outline-warning">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-success me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Jane Smith</strong>
                                                            <br><small class="text-muted">EMP002</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Information Technology</td>
                                                <td>
                                                    <div class="rating-stars">
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <span class="ms-2">5.0</span>
                                                    </div>
                                                </td>
                                                <td>Dec 20, 2024</td>
                                                <td>Jun 20, 2025</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="viewReview(2)">View</button>
                                                    <button class="btn btn-sm btn-outline-warning">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-info me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Mike Johnson</strong>
                                                            <br><small class="text-muted">EMP003</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Finance</td>
                                                <td>
                                                    <div class="rating-stars">
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="far fa-star text-warning"></i>
                                                        <i class="far fa-star text-warning"></i>
                                                        <span class="ms-2">3.0</span>
                                                    </div>
                                                </td>
                                                <td>Dec 10, 2024</td>
                                                <td>Mar 10, 2025</td>
                                                <td><span class="badge bg-warning">Needs Improvement</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="viewReview(3)">View</button>
                                                    <button class="btn btn-sm btn-outline-warning">Edit</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Review Modal -->
<div class="modal fade" id="addReviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Performance Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addReviewForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="employee" class="form-label">Employee *</label>
                            <select class="form-select" id="employee" name="employee" required>
                                <option value="">Select Employee</option>
                                <option value="1">John Doe (EMP001)</option>
                                <option value="2">Jane Smith (EMP002)</option>
                                <option value="3">Mike Johnson (EMP003)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="reviewDate" class="form-label">Review Date *</label>
                            <input type="date" class="form-control" id="reviewDate" name="reviewDate" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="rating" class="form-label">Rating *</label>
                            <div class="rating-input">
                                <i class="far fa-star" data-rating="1"></i>
                                <i class="far fa-star" data-rating="2"></i>
                                <i class="far fa-star" data-rating="3"></i>
                                <i class="far fa-star" data-rating="4"></i>
                                <i class="far fa-star" data-rating="5"></i>
                                <input type="hidden" id="rating" name="rating" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nextReviewDate" class="form-label">Next Review Date *</label>
                            <input type="date" class="form-control" id="nextReviewDate" name="nextReviewDate" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments</label>
                        <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="addReviewForm" class="btn btn-primary">Add Review</button>
            </div>
        </div>
    </div>
</div>

<style>
.employee-avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.rating-stars {
    display: flex;
    align-items: center;
}

.rating-input {
    font-size: 1.5rem;
    cursor: pointer;
}

.rating-input i {
    margin-right: 0.25rem;
    transition: color 0.2s;
}

.rating-input i:hover,
.rating-input i.active {
    color: #ffc107;
}

.table td {
    vertical-align: middle;
}
</style>

<script>
// Set default dates
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const nextReview = new Date(today.getFullYear() + 1, today.getMonth(), today.getDate());
    
    document.getElementById('reviewDate').value = today.toISOString().split('T')[0];
    document.getElementById('nextReviewDate').value = nextReview.toISOString().split('T')[0];
});

// Rating stars functionality
document.querySelectorAll('.rating-input i').forEach(star => {
    star.addEventListener('click', function() {
        const rating = this.dataset.rating;
        document.getElementById('rating').value = rating;
        
        // Update visual stars
        document.querySelectorAll('.rating-input i').forEach((s, index) => {
            if (index < rating) {
                s.classList.remove('far');
                s.classList.add('fas', 'active');
            } else {
                s.classList.remove('fas', 'active');
                s.classList.add('far');
            }
        });
    });
    
    star.addEventListener('mouseenter', function() {
        const rating = this.dataset.rating;
        document.querySelectorAll('.rating-input i').forEach((s, index) => {
            if (index < rating) {
                s.classList.remove('far');
                s.classList.add('fas');
            }
        });
    });
    
    star.addEventListener('mouseleave', function() {
        const rating = document.getElementById('rating').value;
        document.querySelectorAll('.rating-input i').forEach((s, index) => {
            if (index < rating) {
                s.classList.remove('far');
                s.classList.add('fas', 'active');
            } else {
                s.classList.remove('fas', 'active');
                s.classList.add('far');
            }
        });
    });
});

// Add Review Form Submission
document.getElementById('addReviewForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const reviewData = Object.fromEntries(formData.entries());
    
    if (!reviewData.rating) {
        alert('Please select a rating');
        return;
    }
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert('Performance review added successfully!');
        
        // Reset form and close modal
        this.reset();
        document.getElementById('rating').value = '';
        document.querySelectorAll('.rating-input i').forEach(star => {
            star.classList.remove('fas', 'active');
            star.classList.add('far');
        });
        bootstrap.Modal.getInstance(document.getElementById('addReviewModal')).hide();
        
        // Restore button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Reload page to show new review
        location.reload();
    }, 1500);
});

// View review details
function viewReview(reviewId) {
    console.log('Viewing review:', reviewId);
    alert('Review details would be displayed here');
}
</script>

<?php include 'includes/footer.php'; ?>
