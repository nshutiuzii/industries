<?php
$page_title = 'QC Issues';
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
                    <a class="nav-link active" href="qc-issues.php">
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
                        <h2>Quality Control Issues</h2>
                        <p class="text-muted mb-0">Track and manage quality control problems</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newIssueModal">
                            <i class="fas fa-plus me-2"></i>Report Issue
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Issue Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card danger">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-number" data-target="8">8</div>
                    <div class="stat-label">Active Issues</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-up me-1"></i>+2
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number" data-target="3">3</div>
                    <div class="stat-label">Investigating</div>
                    <div class="stat-change neutral">
                        <i class="fas fa-minus me-1"></i>0
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number" data-target="15">15</div>
                    <div class="stat-label">Resolved</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+5
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-number" data-target="2.3">2.3</div>
                    <div class="stat-label">Avg Resolution Time (days)</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-0.5
                    </div>
                </div>
            </div>
        </div>

        <!-- Issues Management -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Quality Control Issues</h5>
                                <span>Track and resolve quality problems</span>
                            </div>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control search-input" placeholder="Search issues..." style="width: 200px;">
                                <select class="form-select filter-select" style="width: 150px;">
                                    <option value="all">All Severity</option>
                                    <option value="critical">Critical</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                                <select class="form-select filter-select" style="width: 150px;">
                                    <option value="all">All Status</option>
                                    <option value="open">Open</option>
                                    <option value="investigating">Investigating</option>
                                    <option value="resolved">Resolved</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Issue ID</th>
                                        <th>Type</th>
                                        <th>Severity</th>
                                        <th>Description</th>
                                        <th>Batch</th>
                                        <th>Reported By</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>#QC-001</strong></td>
                                        <td>Defect</td>
                                        <td><span class="severity-badge high">High</span></td>
                                        <td>Surface finish below specification</td>
                                        <td>BATCH-20241202-MNOP</td>
                                        <td>John Doe</td>
                                        <td><span class="badge bg-warning">Investigating</span></td>
                                        <td>Dec 3, 2024</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-info" onclick="viewIssue(1)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-warning" onclick="editIssue(1)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-success" onclick="resolveIssue(1)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#QC-002</strong></td>
                                        <td>Contamination</td>
                                        <td><span class="severity-badge medium">Medium</span></td>
                                        <td>Minor dust particles detected</td>
                                        <td>BATCH-20241201-EFGH</td>
                                        <td>Jane Smith</td>
                                        <td><span class="badge bg-info">Open</span></td>
                                        <td>Dec 2, 2024</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-info" onclick="viewIssue(2)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-warning" onclick="editIssue(2)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-success" onclick="resolveIssue(2)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#QC-003</strong></td>
                                        <td>Dimension Error</td>
                                        <td><span class="severity-badge low">Low</span></td>
                                        <td>Slight size variation within tolerance</td>
                                        <td>BATCH-20241201-ABCD</td>
                                        <td>Mike Johnson</td>
                                        <td><span class="badge bg-success">Resolved</span></td>
                                        <td>Dec 1, 2024</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-info" onclick="viewIssue(3)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" onclick="closeIssue(3)">
                                                    <i class="fas fa-times"></i>
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

<!-- New Issue Modal -->
<div class="modal fade" id="newIssueModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Report New Quality Issue
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newIssueForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="issueType" class="form-label">Issue Type</label>
                            <select class="form-select" id="issueType" name="issue_type" required>
                                <option value="">Select Issue Type</option>
                                <option value="defect">Defect</option>
                                <option value="contamination">Contamination</option>
                                <option value="dimension_error">Dimension Error</option>
                                <option value="packaging_issue">Packaging Issue</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="severity" class="form-label">Severity</label>
                            <select class="form-select" id="severity" name="severity" required>
                                <option value="">Select Severity</option>
                                <option value="critical">Critical</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="batchId" class="form-label">Affected Batch</label>
                            <select class="form-select" id="batchId" name="batch_id" required>
                                <option value="">Select Batch</option>
                                <option value="1">BATCH-20241203-QRST</option>
                                <option value="2">BATCH-20241202-MNOP</option>
                                <option value="3">BATCH-20241202-IJKL</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="assignedTo" class="form-label">Assign To</label>
                            <select class="form-select" id="assignedTo" name="assigned_to">
                                <option value="">Select Assignee</option>
                                <option value="1">John Doe</option>
                                <option value="2">Jane Smith</option>
                                <option value="3">Mike Johnson</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="issueDescription" class="form-label">Issue Description</label>
                        <textarea class="form-control" id="issueDescription" name="issue_description" rows="4" placeholder="Describe the quality issue in detail..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="issueNotes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="issueNotes" name="issue_notes" rows="3" placeholder="Any additional information or context..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createIssue()">
                    <i class="fas fa-save me-2"></i>Report Issue
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Issue management functions
function createIssue() {
    const form = document.getElementById('newIssueForm');
    if (form && form.checkValidity()) {
        showNotification('Quality issue reported successfully!', 'success');
        closeModal('newIssueModal');
        location.reload();
    } else {
        form.reportValidity();
    }
}

function viewIssue(issueId) {
    showNotification('Opening issue details...', 'info');
}

function editIssue(issueId) {
    showNotification('Opening issue editor...', 'info');
}

function resolveIssue(issueId) {
    if (confirm('Are you sure you want to mark this issue as resolved?')) {
        showNotification('Issue resolved successfully!', 'success');
        location.reload();
    }
}

function closeIssue(issueId) {
    if (confirm('Are you sure you want to close this issue?')) {
        showNotification('Issue closed successfully!', 'success');
        location.reload();
    }
}
</script>

<?php include 'includes/footer.php'; ?>
