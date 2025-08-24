<?php
$page_title = 'Production Plans';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <!-- Left Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Navigation</h5>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Overview</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link active" href="production-plans.php">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Production Plans</span>
                        <span class="item-counter">8</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daily-production-log.php">
                        <i class="fas fa-chart-line"></i>
                        <span>Daily Production Log</span>
                        <span class="item-counter">25</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="machine-usage.php">
                        <i class="fas fa-cogs"></i>
                        <span>Machine Usage</span>
                        <span class="item-counter">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="material-tracker.php">
                        <i class="fas fa-boxes"></i>
                        <span>Material Tracker</span>
                        <span class="item-counter">45</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="production-reports.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Production Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alerts.php">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Alerts & Notifications</span>
                        <span class="item-counter">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team-management.php">
                        <i class="fas fa-users"></i>
                        <span>Team Management</span>
                        <span class="item-counter">18</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="settings.php">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
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
                    <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isProductionManager() ? 'Production Manager' : 'Operator'); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Dashboard Content -->
    <div class="dashboard-content">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Production Plans</h2>
                        <p class="text-muted mb-0">Manage and track production schedules</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('plans')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProductionPlanModal">
                            <i class="fas fa-plus me-2"></i>New Plan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plan Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Total Plans</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">3</h3>
                        <p class="stat-label">Pending</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-play"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">4</h3>
                        <p class="stat-label">In Progress</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">1</h3>
                        <p class="stat-label">Completed</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="productionSearch" placeholder="Search production plans...">
                </div>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="priorityFilter">
                    <option value="">All Priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="productFilter">
                    <option value="">All Products</option>
                    <option value="biscuit-classic">BISCUIT Classic</option>
                    <option value="biscuit-premium">BISCUIT Premium</option>
                    <option value="biscuit-chocolate">BISCUIT Chocolate</option>
                </select>
            </div>
        </div>

        <!-- Production Plans Grid -->
        <div class="row" id="productionPlansGrid">
            <!-- Production Plan Card 1 -->
            <div class="col-lg-6 col-xl-4 mb-3 production-item" data-status="in_progress" data-priority="high" data-product="biscuit-classic">
                <div class="production-plan-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="mb-1">BISCUIT Classic Production</h6>
                            <small class="text-muted">Plan #PP-2024-001</small>
                        </div>
                        <span class="badge bg-info">In Progress</span>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Target Quantity</small>
                            <div class="fw-bold">500 units</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Machine</small>
                            <div class="fw-bold">Mixer A1</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Start Date</small>
                            <div class="fw-bold">Dec 17, 2024</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">End Date</small>
                            <div class="fw-bold">Dec 18, 2024</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                        <small class="text-muted">75% Complete</small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewProductionPlan(1)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editProductionPlan(1)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="completeProduction(1)">
                            <i class="fas fa-check me-1"></i>Complete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Production Plan Card 2 -->
            <div class="col-lg-6 col-xl-4 mb-3 production-item" data-status="pending" data-priority="medium" data-product="biscuit-premium">
                <div class="production-plan-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="mb-1">BISCUIT Premium Production</h6>
                            <small class="text-muted">Plan #PP-2024-002</small>
                        </div>
                        <span class="badge bg-warning">Pending</span>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Target Quantity</small>
                            <div class="fw-bold">300 units</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Machine</small>
                            <div class="fw-bold">Oven B1</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Start Date</small>
                            <div class="fw-bold">Dec 19, 2024</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">End Date</small>
                            <div class="fw-bold">Dec 20, 2024</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Priority</small>
                        <div class="fw-bold text-warning">Medium</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewProductionPlan(2)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editProductionPlan(2)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="startProduction(2)">
                            <i class="fas fa-play me-1"></i>Start
                        </button>
                    </div>
                </div>
            </div>

            <!-- Production Plan Card 3 -->
            <div class="col-lg-6 col-xl-4 mb-3 production-item" data-status="pending" data-priority="urgent" data-product="biscuit-chocolate">
                <div class="production-plan-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="mb-1">BISCUIT Chocolate Production</h6>
                            <small class="text-muted">Plan #PP-2024-003</small>
                        </div>
                        <span class="badge bg-warning">Pending</span>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Target Quantity</small>
                            <div class="fw-bold">400 units</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Machine</small>
                            <div class="fw-bold">Packager C1</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Start Date</small>
                            <div class="fw-bold">Dec 18, 2024</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">End Date</small>
                            <div class="fw-bold">Dec 19, 2024</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Priority</small>
                        <div class="fw-bold text-danger">Urgent</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewProductionPlan(3)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editProductionPlan(3)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="startProduction(3)">
                            <i class="fas fa-play me-1"></i>Start
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12">
                <nav aria-label="Production plans pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- New Production Plan Modal -->
<div class="modal fade" id="newProductionPlanModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Production Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newProductionPlanForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="planProduct" class="form-label">Product *</label>
                            <select class="form-select" id="planProduct" name="product_id" required>
                                <option value="">Select Product</option>
                                <option value="1">BISCUIT Classic</option>
                                <option value="2">BISCUIT Premium</option>
                                <option value="3">BISCUIT Chocolate</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="planMachine" class="form-label">Machine *</label>
                            <select class="form-select" id="planMachine" name="machine_id" required>
                                <option value="">Select Machine</option>
                                <option value="1">Mixer A1</option>
                                <option value="2">Oven B1</option>
                                <option value="3">Packager C1</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="planTargetQuantity" class="form-label">Target Quantity *</label>
                            <input type="number" class="form-control" id="planTargetQuantity" name="target_quantity" min="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="planPriority" class="form-label">Priority</label>
                            <select class="form-select" id="planPriority" name="priority">
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="planStartDate" class="form-label">Start Date *</label>
                            <input type="date" class="form-control" id="planStartDate" name="start_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="planEndDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="planEndDate" name="end_date" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="planNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="planNotes" name="notes" rows="3" placeholder="Any special instructions or notes..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitProductionPlan()">
                    <i class="fas fa-save me-2"></i>Create Plan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default dates
document.getElementById('planStartDate').valueAsDate = new Date();
document.getElementById('planEndDate').valueAsDate = new Date(Date.now() + 24 * 60 * 60 * 1000); // Tomorrow

// Production plan functions
function viewProductionPlan(id) {
    alert('View production plan ' + id + ' functionality would be implemented here');
}

function editProductionPlan(id) {
    alert('Edit production plan ' + id + ' functionality would be implemented here');
}

function startProduction(id) {
    if (confirm('Are you sure you want to start this production plan?')) {
        alert('Production plan ' + id + ' started successfully!');
        // Update UI would go here
    }
}

function completeProduction(id) {
    if (confirm('Are you sure you want to mark this production plan as completed?')) {
        alert('Production plan ' + id + ' completed successfully!');
        // Update UI would go here
    }
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitProductionPlan() {
    const form = document.getElementById('newProductionPlanForm');
    if (form.checkValidity()) {
        alert('Production plan created successfully!');
        form.reset();
        document.getElementById('planStartDate').valueAsDate = new Date();
        document.getElementById('planEndDate').valueAsDate = new Date(Date.now() + 24 * 60 * 60 * 1000);
        const modal = bootstrap.Modal.getInstance(document.getElementById('newProductionPlanModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Search and filter functionality
document.getElementById('productionSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const items = document.querySelectorAll('#productionPlansGrid .production-item');
    
    items.forEach(item => {
        const itemName = item.querySelector('h6').textContent.toLowerCase();
        const itemPlan = item.querySelector('small').textContent.toLowerCase();
        
        if (itemName.includes(searchTerm) || itemPlan.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('statusFilter').addEventListener('change', function() {
    const selectedStatus = this.value;
    const items = document.querySelectorAll('#productionPlansGrid .production-item');
    
    items.forEach(item => {
        const itemStatus = item.dataset.status;
        if (selectedStatus === '' || itemStatus === selectedStatus) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('priorityFilter').addEventListener('change', function() {
    const selectedPriority = this.value;
    const items = document.querySelectorAll('#productionPlansGrid .production-item');
    
    items.forEach(item => {
        const itemPriority = item.dataset.priority;
        if (selectedPriority === '' || itemPriority === selectedPriority) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('productFilter').addEventListener('change', function() {
    const selectedProduct = this.value;
    const items = document.querySelectorAll('#productionPlansGrid .production-item');
    
    items.forEach(item => {
        const itemProduct = item.dataset.product;
        if (selectedProduct === '' || itemProduct === selectedProduct) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
