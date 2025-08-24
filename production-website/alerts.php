<?php
$page_title = 'Alerts & Notifications';
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
                    <a class="nav-link" href="production-plans.php">
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
                    <a class="nav-link active" href="alerts.php">
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
                        <h2>Alerts & Notifications</h2>
                        <p class="text-muted mb-0">Monitor system alerts and production notifications</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('alerts')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAlertModal">
                            <i class="fas fa-plus me-2"></i>Create Alert
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">5</h3>
                        <p class="stat-label">Active Alerts</p>
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
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">12</h3>
                        <p class="stat-label">Resolved</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Today's Notifications</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Filters -->
        <div class="row mb-4">
            <div class="col-lg-3 mb-3">
                <select class="form-select" id="alertPriorityFilter">
                    <option value="">All Priorities</option>
                    <option value="critical">Critical</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <select class="form-select" id="alertStatusFilter">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="acknowledged">Acknowledged</option>
                    <option value="resolved">Resolved</option>
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <select class="form-select" id="alertTypeFilter">
                    <option value="">All Types</option>
                    <option value="info">Info</option>
                    <option value="warning">Warning</option>
                    <option value="error">Error</option>
                    <option value="success">Success</option>
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                    <i class="fas fa-times me-2"></i>Clear Filters
                </button>
            </div>
        </div>

        <!-- Active Alerts -->
        <div class="dashboard-card mb-4">
            <div class="card-header">
                <h5>Active Alerts</h5>
                <span class="text-muted">Critical and high-priority alerts requiring attention</span>
            </div>
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show mb-3" data-alert-id="1">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="alert-heading">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Critical: Machine Packager C1 Down
                            </h6>
                            <p class="mb-1">Packager C1 has stopped unexpectedly and requires immediate attention.</p>
                            <small class="text-muted">Created: 2 hours ago | Priority: Critical</small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewAlert(1)">
                            <i class="fas fa-eye me-1"></i>View Details
                        </button>
                        <button class="btn btn-sm btn-outline-warning alert-action" data-alert-id="1">
                            <i class="fas fa-check me-1"></i>Acknowledge
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="resolveAlert(1)">
                            <i class="fas fa-check-double me-1"></i>Mark Resolved
                        </button>
                    </div>
                </div>

                <div class="alert alert-warning alert-dismissible fade show mb-3" data-alert-id="2">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="alert-heading">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Warning: Low Material Stock
                            </h6>
                            <p class="mb-1">Sugar stock has fallen below reorder level (850 kg remaining).</p>
                            <small class="text-muted">Created: 4 hours ago | Priority: High</small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewAlert(2)">
                            <i class="fas fa-eye me-1"></i>View Details
                        </button>
                        <button class="btn btn-sm btn-outline-warning alert-action" data-alert-id="2">
                            <i class="fas fa-check me-1"></i>Acknowledge
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="resolveAlert(2)">
                            <i class="fas fa-check-double me-1"></i>Mark Resolved
                        </button>
                    </div>
                </div>

                <div class="alert alert-info alert-dismissible fade show mb-3" data-alert-id="3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="alert-heading">
                                <i class="fas fa-info-circle me-2"></i>
                                Info: Production Plan Completed
                            </h6>
                            <p class="mb-1">BISCUIT Classic production plan has been completed successfully.</p>
                            <small class="text-muted">Created: 6 hours ago | Priority: Medium</small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewAlert(3)">
                            <i class="fas fa-eye me-1"></i>View Details
                        </button>
                        <button class="btn btn-sm btn-outline-warning alert-action" data-alert-id="3">
                            <i class="fas fa-check me-1"></i>Acknowledge
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="resolveAlert(3)">
                            <i class="fas fa-check-double me-1"></i>Mark Resolved
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Notifications -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Notifications</h5>
                <span class="text-muted">System and production notifications</span>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <i class="fas fa-cogs text-primary me-2"></i>
                                Machine Mixer A1 Started
                            </div>
                            <small class="text-muted">Production line A mixer has been started by operator John Smith</small>
                        </div>
                        <small class="text-muted">1 hour ago</small>
                    </div>
                    
                    <div class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <i class="fas fa-boxes text-success me-2"></i>
                                Material Received
                            </div>
                            <small class="text-muted">New shipment of flour (1,000 kg) received from Flour Co Ltd</small>
                        </div>
                        <small class="text-muted">3 hours ago</small>
                    </div>
                    
                    <div class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <i class="fas fa-chart-line text-info me-2"></i>
                                Quality Check Completed
                            </div>
                            <small class="text-muted">Quality check completed for BISCUIT Premium batch with 98% score</small>
                        </div>
                        <small class="text-muted">5 hours ago</small>
                    </div>
                    
                    <div class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <i class="fas fa-users text-warning me-2"></i>
                                Shift Change
                            </div>
                            <small class="text-muted">Day shift operators have completed their shift and night shift has begun</small>
                        </div>
                        <small class="text-muted">8 hours ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Alert Modal -->
<div class="modal fade" id="createAlertModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="createAlertForm">
                    <div class="mb-3">
                        <label for="alertTitle" class="form-label">Alert Title *</label>
                        <input type="text" class="form-control" id="alertTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="alertMessage" class="form-label">Message *</label>
                        <textarea class="form-control" id="alertMessage" name="message" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="alertType" class="form-label">Alert Type *</label>
                            <select class="form-select" id="alertType" name="type" required>
                                <option value="">Select Type</option>
                                <option value="info">Info</option>
                                <option value="warning">Warning</option>
                                <option value="error">Error</option>
                                <option value="success">Success</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alertPriority" class="form-label">Priority *</label>
                            <select class="form-select" id="alertPriority" name="priority" required>
                                <option value="">Select Priority</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="critical">Critical</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alertNotes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="alertNotes" name="notes" rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitAlert()">
                    <i class="fas fa-save me-2"></i>Create Alert
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Alert functions
function viewAlert(id) {
    alert('View alert ' + id + ' functionality would be implemented here');
}

function resolveAlert(id) {
    if (confirm('Are you sure you want to mark this alert as resolved?')) {
        alert('Alert ' + id + ' marked as resolved');
        // Update UI would go here
    }
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitAlert() {
    const form = document.getElementById('createAlertForm');
    if (form.checkValidity()) {
        alert('Alert created successfully!');
        form.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('createAlertModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

function clearFilters() {
    document.getElementById('alertPriorityFilter').value = '';
    document.getElementById('alertStatusFilter').value = '';
    document.getElementById('alertTypeFilter').value = '';
    // Reset filtered alerts display
    console.log('Filters cleared');
}

// Filter functionality
document.getElementById('alertPriorityFilter').addEventListener('change', function() {
    console.log('Filtering by priority:', this.value);
});

document.getElementById('alertStatusFilter').addEventListener('change', function() {
    console.log('Filtering by status:', this.value);
});

document.getElementById('alertTypeFilter').addEventListener('change', function() {
    console.log('Filtering by type:', this.value);
});
</script>

<?php include 'includes/footer.php'; ?>
