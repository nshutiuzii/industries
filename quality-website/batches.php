<?php
$page_title = 'Batches';
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
                    <a class="nav-link active" href="batches.php">
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
                    <a class="nav-link" href="approvals.php">
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
                        <h2>Quality Batches Management</h2>
                        <p class="text-muted mb-0">Manage and track production quality batches</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newBatchModal">
                            <i class="fas fa-plus me-2"></i>New Batch
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Batch Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number" data-target="85">85</div>
                    <div class="stat-label">Approved Batches</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+5.2%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number" data-target="12">12</div>
                    <div class="stat-label">Pending Review</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-down me-1"></i>-2.1%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card danger">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number" data-target="3">3</div>
                    <div class="stat-label">Rejected Batches</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-15.3%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-number" data-target="92">92</div>
                    <div class="stat-label">Avg Quality Score</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+1.8%
                    </div>
                </div>
            </div>
        </div>

        <!-- Batch Management -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Quality Batches</h5>
                                <span>Production batch quality tracking</span>
                            </div>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control search-input" placeholder="Search batches..." style="width: 200px;">
                                <select class="form-select filter-select" style="width: 150px;">
                                    <option value="all">All Status</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                <button class="btn btn-outline-secondary" onclick="exportData()">
                                    <i class="fas fa-download me-2"></i>Export
                                </button>
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
                                        <th>Quantity</th>
                                        <th>Production Date</th>
                                        <th>Quality Score</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>BATCH-20241203-QRST</strong></td>
                                        <td>Product B</td>
                                        <td>900</td>
                                        <td>Dec 3, 2024</td>
                                        <td>
                                            <div class="quality-score good">89.1%</div>
                                        </td>
                                        <td><span class="quality-status pending">Pending</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-success" onclick="approveBatch(5)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="rejectBatch(5)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewBatch(5)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241202-MNOP</strong></td>
                                        <td>Product C</td>
                                        <td>600</td>
                                        <td>Dec 2, 2024</td>
                                        <td>
                                            <div class="quality-score poor">78.5%</div>
                                        </td>
                                        <td><span class="quality-status rejected">Rejected</span></td>
                                        <td>Jane Smith</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-warning" onclick="editBatch(4)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewBatch(4)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241202-IJKL</strong></td>
                                        <td>Product A</td>
                                        <td>1200</td>
                                        <td>Dec 2, 2024</td>
                                        <td>
                                            <div class="quality-score excellent">92.8%</div>
                                        </td>
                                        <td><span class="quality-status approved">Approved</span></td>
                                        <td>Mike Johnson</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-info" onclick="viewBatch(3)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" onclick="printBatch(3)">
                                                    <i class="fas fa-print"></i>
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
    </div>
</div>

<!-- New Batch Modal -->
<div class="modal fade" id="newBatchModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Create New Quality Batch
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newBatchForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="batchNumber" class="form-label">Batch Number</label>
                            <input type="text" class="form-control" id="batchNumber" name="batch_number" value="BATCH-<?php echo date('Ymd'); ?>-<?php echo strtoupper(substr(uniqid(), -4)); ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <select class="form-select" id="productName" name="product_name" required>
                                <option value="">Select Product</option>
                                <option value="Product A">Product A</option>
                                <option value="Product B">Product B</option>
                                <option value="Product C">Product C</option>
                                <option value="Product D">Product D</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="productionDate" class="form-label">Production Date</label>
                            <input type="date" class="form-control" id="productionDate" name="production_date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="qualityScore" class="form-label">Quality Score (%)</label>
                            <input type="number" class="form-control" id="qualityScore" name="quality_score" min="0" max="100" step="0.1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="batchStatus" class="form-label">Status</label>
                            <select class="form-select" id="batchStatus" name="batch_status" required>
                                <option value="pending">Pending Review</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="under_review">Under Review</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="batchNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="batchNotes" name="batch_notes" rows="3" placeholder="Additional notes about this batch..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createBatch()">
                    <i class="fas fa-save me-2"></i>Create Batch
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Batch management functions
function createBatch() {
    const form = document.getElementById('newBatchForm');
    if (form && form.checkValidity()) {
        showNotification('Batch created successfully!', 'success');
        closeModal('newBatchModal');
        location.reload();
    } else {
        form.reportValidity();
    }
}

function approveBatch(batchId) {
    if (confirm('Are you sure you want to approve this batch?')) {
        showNotification('Batch approved successfully!', 'success');
        location.reload();
    }
}

function rejectBatch(batchId) {
    const reason = prompt('Please provide a reason for rejection:');
    if (reason) {
        showNotification('Batch rejected successfully!', 'success');
        location.reload();
    }
}

function viewBatch(batchId) {
    showNotification('Opening batch details...', 'info');
}

function editBatch(batchId) {
    showNotification('Opening batch editor...', 'info');
}

function printBatch(batchId) {
    showNotification('Preparing batch for printing...', 'info');
}

// Auto-generate batch number
document.addEventListener('DOMContentLoaded', function() {
    const batchNumberInput = document.getElementById('batchNumber');
    if (batchNumberInput) {
        const timestamp = new Date().getTime();
        const random = Math.random().toString(36).substr(2, 4).toUpperCase();
        batchNumberInput.value = `BATCH-${new Date().toISOString().slice(0,10).replace(/-/g, '')}-${random}`;
    }
});
</script>

<?php include 'includes/footer.php'; ?>
