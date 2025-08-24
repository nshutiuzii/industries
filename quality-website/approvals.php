<?php
$page_title = 'Approvals';
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
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">
                        <i class="fas fa-file-alt"></i>
                        <span>Reports</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="trends.php">
                        <i class="fas fa-chart-area"></i>
                        <span>Trends</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="batches.php">
                        <i class="fas fa-boxes"></i>
                        <span>Batches</span>
                        <span class="item-counter">25</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="qc-issues.php">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>QC Issues</span>
                        <span class="item-counter">8</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="approvals.php">
                        <i class="fas fa-check-circle"></i>
                        <span>Approvals</span>
                        <span class="item-counter">12</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="new-test.php">
                        <i class="fas fa-flask"></i>
                        <span>New Test</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="test-history.php">
                        <i class="fas fa-history"></i>
                        <span>Test History</span>
                        <span class="item-counter">45</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="test-methods.php">
                        <i class="fas fa-cogs"></i>
                        <span>Test Methods</span>
                        <span class="item-counter">18</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="compliance.php">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Compliance</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="standards.php">
                        <i class="fas fa-certificate"></i>
                        <span>Standards</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="audits.php">
                        <i class="fas fa-search"></i>
                        <span>Audits</span>
                        <span class="item-counter">5</span>
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
                    <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isQualityManager() ? 'Quality Manager' : 'QC Inspector'); ?></p>
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
                        <h2>Batch Approval Workflow</h2>
                        <p class="text-muted mb-0">Manage quality batch approvals and rejections</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" onclick="exportData()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Approval Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number" data-target="12">12</div>
                    <div class="stat-label">Pending Approval</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-up me-1"></i>+3
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number" data-target="85">85</div>
                    <div class="stat-label">Approved Today</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+12
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card danger">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number" data-target="3">3</div>
                    <div class="stat-label">Rejected Today</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-2
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-number" data-target="2.1">2.1</div>
                    <div class="stat-label">Avg Approval Time (hrs)</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-0.3
                    </div>
                </div>
            </div>
        </div>

        <!-- Approval Workflow -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Pending Approvals</h5>
                                <span>Batches awaiting quality approval</span>
                            </div>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control search-input" placeholder="Search batches..." style="width: 200px;">
                                <select class="form-select filter-select" style="width: 150px;">
                                    <option value="all">All Products</option>
                                    <option value="Product A">Product A</option>
                                    <option value="Product B">Product B</option>
                                    <option value="Product C">Product C</option>
                                </select>
                                <select class="form-select filter-select" style="width: 150px;">
                                    <option value="all">All Priorities</option>
                                    <option value="high">High Priority</option>
                                    <option value="medium">Medium Priority</option>
                                    <option value="low">Low Priority</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Batch Number</th>
                                        <th>Product</th>
                                        <th>Quality Score</th>
                                        <th>Priority</th>
                                        <th>Submitted By</th>
                                        <th>Submitted Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>BATCH-20241203-QRST</strong></td>
                                        <td>Product B</td>
                                        <td>
                                            <div class="quality-score good">89.1%</div>
                                        </td>
                                        <td><span class="badge bg-warning">Medium</span></td>
                                        <td>John Doe</td>
                                        <td>Dec 3, 2024 09:30</td>
                                        <td><span class="badge bg-info">Pending Review</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-success" onclick="approveBatch(5)">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="rejectBatch(5)">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewBatch(5)">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241203-UVWX</strong></td>
                                        <td>Product A</td>
                                        <td>
                                            <div class="quality-score excellent">94.2%</div>
                                        </td>
                                        <td><span class="badge bg-danger">High</span></td>
                                        <td>Jane Smith</td>
                                        <td>Dec 3, 2024 11:15</td>
                                        <td><span class="badge bg-warning">Under Review</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-success" onclick="approveBatch(6)">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="rejectBatch(6)">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewBatch(6)">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241202-YZAB</strong></td>
                                        <td>Product C</td>
                                        <td>
                                            <div class="quality-score good">87.5%</div>
                                        </td>
                                        <td><span class="badge bg-success">Low</span></td>
                                        <td>Mike Johnson</td>
                                        <td>Dec 2, 2024 16:45</td>
                                        <td><span class="badge bg-info">Pending Review</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-success" onclick="approveBatch(7)">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="rejectBatch(7)">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewBatch(7)">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Approvals -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Approvals</h5>
                        <span>Recently approved and rejected batches</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Batch Number</th>
                                        <th>Product</th>
                                        <th>Quality Score</th>
                                        <th>Decision</th>
                                        <th>Approved By</th>
                                        <th>Decision Date</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>BATCH-20241202-IJKL</strong></td>
                                        <td>Product A</td>
                                        <td>
                                            <div class="quality-score excellent">92.8%</div>
                                        </td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                        <td>Quality Manager</td>
                                        <td>Dec 2, 2024 14:30</td>
                                        <td>All quality parameters met</td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241202-MNOP</strong></td>
                                        <td>Product C</td>
                                        <td>
                                            <div class="quality-score poor">78.5%</div>
                                        </td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                        <td>QC Inspector</td>
                                        <td>Dec 2, 2024 13:15</td>
                                        <td>Quality score below threshold</td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241201-EFGH</strong></td>
                                        <td>Product B</td>
                                        <td>
                                            <div class="quality-score good">88.9%</div>
                                        </td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                        <td>Quality Manager</td>
                                        <td>Dec 1, 2024 17:20</td>
                                        <td>Minor issues resolved</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Approval Workflow Chart -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Approval Workflow Status</h5>
                        <span>Current workflow progress</span>
                    </div>
                    <div class="card-body">
                        <div class="workflow-status">
                            <div class="workflow-step completed">
                                <div class="step-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="step-content">
                                    <h6>Quality Testing</h6>
                                    <p class="text-muted">Tests completed and results recorded</p>
                                </div>
                            </div>
                            <div class="workflow-step completed">
                                <div class="step-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="step-content">
                                    <h6>Initial Review</h6>
                                    <p class="text-muted">QC Inspector review completed</p>
                                </div>
                            </div>
                            <div class="workflow-step active">
                                <div class="step-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="step-content">
                                    <h6>Manager Approval</h6>
                                    <p class="text-muted">Awaiting quality manager approval</p>
                                </div>
                            </div>
                            <div class="workflow-step pending">
                                <div class="step-icon">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="step-content">
                                    <h6>Final Release</h6>
                                    <p class="text-muted">Batch release for production</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Approval workflow functions
function approveBatch(batchId) {
    if (confirm('Are you sure you want to approve this batch?')) {
        const notes = prompt('Please provide approval notes (optional):');
        showNotification('Batch approved successfully!', 'success');
        location.reload();
    }
}

function rejectBatch(batchId) {
    const reason = prompt('Please provide rejection reason:');
    if (reason) {
        showNotification('Batch rejected successfully!', 'success');
        location.reload();
    }
}

function viewBatch(batchId) {
    showNotification('Opening batch details...', 'info');
}
</script>

<style>
.workflow-status {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin: 2rem 0;
}

.workflow-step {
    flex: 1;
    text-align: center;
    position: relative;
}

.workflow-step:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 25px;
    right: -50%;
    width: 100%;
    height: 2px;
    background: #e9ecef;
    z-index: 1;
}

.workflow-step.completed:not(:last-child)::after {
    background: var(--success-color);
}

.workflow-step .step-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    position: relative;
    z-index: 2;
}

.workflow-step.completed .step-icon {
    background: var(--success-color);
    color: white;
}

.workflow-step.active .step-icon {
    background: var(--warning-color);
    color: white;
}

.workflow-step.pending .step-icon {
    background: #e9ecef;
    color: var(--text-muted);
}

.workflow-step .step-content h6 {
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.workflow-step .step-content p {
    font-size: 0.9rem;
    margin: 0;
}
</style>

<?php include 'includes/footer.php'; ?>
