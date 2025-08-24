<?php
$page_title = 'Compliance';
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
                    <a class="nav-link active" href="compliance.php">
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
                        <h2>Compliance Management</h2>
                        <p class="text-muted mb-0">Monitor and manage quality compliance requirements and checklists</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" onclick="showNewChecklistModal()">
                            <i class="fas fa-plus me-2"></i>New Checklist
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance Overview Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">24</h3>
                        <p class="stat-label">Active Checklists</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">18</h3>
                        <p class="stat-label">Compliant Items</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">6</h3>
                        <p class="stat-label">Non-Compliant</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">75%</h3>
                        <p class="stat-label">Compliance Rate</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance Dashboard -->
        <div class="row mb-4">
            <div class="col-md-8 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Compliance Status Overview</h5>
                        <span>Current compliance status across all categories</span>
                    </div>
                    <div class="card-body">
                        <canvas id="complianceChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Compliance Updates</h5>
                        <span>Latest changes and updates</span>
                    </div>
                    <div class="card-body">
                        <div class="compliance-updates">
                            <div class="update-item">
                                <div class="update-icon success">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="update-content">
                                    <p class="update-text">Safety checklist updated</p>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                            </div>
                            <div class="update-item">
                                <div class="update-icon warning">
                                    <i class="fas fa-exclamation"></i>
                                </div>
                                <div class="update-content">
                                    <p class="update-text">New regulation added</p>
                                    <small class="text-muted">1 day ago</small>
                                </div>
                            </div>
                            <div class="update-item">
                                <div class="update-icon info">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="update-content">
                                    <p class="update-text">Compliance review scheduled</p>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance Checklists -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Compliance Checklists</h5>
                        <span>Manage and monitor compliance requirements</span>
                    </div>
                    <div class="card-body">
                        <!-- Search and Filter Controls -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search checklists...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="categoryFilter">
                                    <option value="">All Categories</option>
                                    <option value="safety">Safety</option>
                                    <option value="quality">Quality</option>
                                    <option value="environmental">Environmental</option>
                                    <option value="regulatory">Regulatory</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="compliant">Compliant</option>
                                    <option value="non-compliant">Non-Compliant</option>
                                    <option value="pending">Pending Review</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            </div>
                        </div>

                        <!-- Checklists Table -->
                        <div class="table-responsive">
                            <table class="table table-hover" id="checklistsTable">
                                <thead>
                                    <tr>
                                        <th>Checklist Name</th>
                                        <th>Category</th>
                                        <th>Last Updated</th>
                                        <th>Status</th>
                                        <th>Compliance Rate</th>
                                        <th>Next Review</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Safety Standards Checklist</td>
                                        <td><span class="badge bg-warning">Safety</span></td>
                                        <td>2024-01-15</td>
                                        <td><span class="badge bg-success">Compliant</span></td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" style="width: 95%"></div>
                                            </div>
                                            <small>95%</small>
                                        </td>
                                        <td>2024-02-15</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewChecklist('safety')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="editChecklist('safety')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quality Control Standards</td>
                                        <td><span class="badge bg-info">Quality</span></td>
                                        <td>2024-01-14</td>
                                        <td><span class="badge bg-success">Compliant</span></td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" style="width: 88%"></div>
                                            </div>
                                            <small>88%</small>
                                        </td>
                                        <td>2024-02-14</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewChecklist('quality')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="editChecklist('quality')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Environmental Compliance</td>
                                        <td><span class="badge bg-success">Environmental</span></td>
                                        <td>2024-01-13</td>
                                        <td><span class="badge bg-danger">Non-Compliant</span></td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-danger" style="width: 65%"></div>
                                            </div>
                                            <small>65%</small>
                                        </td>
                                        <td>2024-01-20</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewChecklist('environmental')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="editChecklist('environmental')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Regulatory Requirements</td>
                                        <td><span class="badge bg-primary">Regulatory</span></td>
                                        <td>2024-01-12</td>
                                        <td><span class="badge bg-warning">Pending Review</span></td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-warning" style="width: 72%"></div>
                                            </div>
                                            <small>72%</small>
                                        </td>
                                        <td>2024-01-25</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewChecklist('regulatory')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="editChecklist('regulatory')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance Calendar -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Compliance Calendar</h5>
                        <span>Upcoming compliance deadlines and reviews</span>
                    </div>
                    <div class="card-body">
                        <div class="compliance-calendar">
                            <div class="calendar-item urgent">
                                <div class="calendar-date">
                                    <span class="day">20</span>
                                    <span class="month">Jan</span>
                                </div>
                                <div class="calendar-content">
                                    <h6>Environmental Compliance Review</h6>
                                    <p class="text-muted">Critical deadline for environmental standards</p>
                                    <span class="badge bg-danger">Urgent</span>
                                </div>
                            </div>
                            <div class="calendar-item">
                                <div class="calendar-date">
                                    <span class="day">25</span>
                                    <span class="month">Jan</span>
                                </div>
                                <div class="calendar-content">
                                    <h6>Regulatory Requirements Update</h6>
                                    <p class="text-muted">Annual regulatory compliance review</p>
                                    <span class="badge bg-warning">Due Soon</span>
                                </div>
                            </div>
                            <div class="calendar-item">
                                <div class="calendar-date">
                                    <span class="day">14</span>
                                    <span class="month">Feb</span>
                                </div>
                                <div class="calendar-content">
                                    <h6>Quality Standards Review</h6>
                                    <p class="text-muted">Quarterly quality compliance check</p>
                                    <span class="badge bg-info">Scheduled</span>
                                </div>
                            </div>
                            <div class="calendar-item">
                                <div class="calendar-date">
                                    <span class="day">15</span>
                                    <span class="month">Feb</span>
                                </div>
                                <div class="calendar-content">
                                    <h6>Safety Standards Update</h6>
                                    <p class="text-muted">Monthly safety compliance review</p>
                                    <span class="badge bg-success">On Track</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Checklist Modal -->
<div class="modal fade" id="newChecklistModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Compliance Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newChecklistForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="checklistName" class="form-label">Checklist Name</label>
                            <input type="text" class="form-control" id="checklistName" name="checklist_name" placeholder="Enter checklist name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="checklistCategory" class="form-label">Category</label>
                            <select class="form-select" id="checklistCategory" name="checklist_category" required>
                                <option value="">Select Category</option>
                                <option value="safety">Safety</option>
                                <option value="quality">Quality</option>
                                <option value="environmental">Environmental</option>
                                <option value="regulatory">Regulatory</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="checklistDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="checklistDescription" name="checklist_description" rows="3" placeholder="Describe the compliance requirements..." required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reviewFrequency" class="form-label">Review Frequency</label>
                            <select class="form-select" id="reviewFrequency" name="review_frequency" required>
                                <option value="">Select Frequency</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="annually">Annually</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nextReviewDate" class="form-label">Next Review Date</label>
                            <input type="date" class="form-control" id="nextReviewDate" name="next_review_date" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="complianceItems" class="form-label">Compliance Items</label>
                        <textarea class="form-control" id="complianceItems" name="compliance_items" rows="6" placeholder="List compliance items, one per line..." required></textarea>
                        <small class="text-muted">Enter each compliance requirement on a new line</small>
                    </div>
                    <div class="mb-3">
                        <label for="references" class="form-label">References & Standards</label>
                        <textarea class="form-control" id="references" name="references" rows="2" placeholder="Relevant standards, regulations, or documents..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveNewChecklist()">Save Checklist</button>
            </div>
        </div>
    </div>
</div>

<script>
// Compliance management functions
function showNewChecklistModal() {
    const modal = new bootstrap.Modal(document.getElementById('newChecklistModal'));
    modal.show();
}

function saveNewChecklist() {
    const form = document.getElementById('newChecklistForm');
    if (form && form.checkValidity()) {
        showNotification('Compliance checklist created successfully!', 'success');
        const modal = bootstrap.Modal.getInstance(document.getElementById('newChecklistModal'));
        modal.hide();
        form.reset();
        // Here you would typically submit the form data
    } else {
        form.reportValidity();
    }
}

function viewChecklist(checklistType) {
    // Implementation for viewing checklist details
    showNotification(`Viewing ${checklistType} checklist`, 'info');
}

function editChecklist(checklistType) {
    // Implementation for editing checklist
    showNotification(`Editing ${checklistType} checklist`, 'info');
}

// Initialize compliance chart
document.addEventListener('DOMContentLoaded', function() {
    const complianceCtx = document.getElementById('complianceChart').getContext('2d');
    new Chart(complianceCtx, {
        type: 'doughnut',
        data: {
            labels: ['Compliant', 'Non-Compliant', 'Pending Review'],
            datasets: [{
                data: [18, 6, 3],
                backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});

// Search and filter functionality
document.getElementById('searchInput').addEventListener('input', function() {
    filterChecklists();
});

document.getElementById('categoryFilter').addEventListener('change', function() {
    filterChecklists();
});

document.getElementById('statusFilter').addEventListener('change', function() {
    filterChecklists();
});

function filterChecklists() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    
    const rows = document.querySelectorAll('#checklistsTable tbody tr');
    
    rows.forEach(row => {
        const checklistName = row.cells[0].textContent.toLowerCase();
        const category = row.cells[1].textContent.toLowerCase();
        const status = row.cells[3].textContent.toLowerCase();
        
        const matchesSearch = checklistName.includes(searchTerm);
        const matchesCategory = !categoryFilter || category.includes(categoryFilter);
        const matchesStatus = !statusFilter || status.includes(statusFilter);
        
        row.style.display = matchesSearch && matchesCategory && matchesStatus ? '' : 'none';
    });
}

function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('statusFilter').value = '';
    filterChecklists();
}

// Set default date for new checklist
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const nextMonth = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
    document.getElementById('nextReviewDate').value = nextMonth.toISOString().split('T')[0];
});
</script>

<style>
.compliance-updates {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.update-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem;
    border-radius: 8px;
    background: var(--light-bg);
}

.update-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
}

.update-icon.success {
    background: var(--success-color);
}

.update-icon.warning {
    background: var(--warning-color);
}

.update-icon.info {
    background: var(--info-color);
}

.update-content {
    flex: 1;
}

.update-text {
    margin: 0;
    font-weight: 500;
}

.compliance-calendar {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.calendar-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: white;
    transition: var(--transition);
}

.calendar-item:hover {
    box-shadow: var(--shadow);
}

.calendar-item.urgent {
    border-color: var(--danger-color);
    background: rgba(220, 53, 69, 0.05);
}

.calendar-date {
    text-align: center;
    min-width: 60px;
}

.calendar-date .day {
    display: block;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-color);
    line-height: 1;
}

.calendar-date .month {
    display: block;
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

.calendar-content {
    flex: 1;
}

.calendar-content h6 {
    margin: 0 0 0.25rem 0;
    color: var(--primary-color);
}

.calendar-content p {
    margin: 0 0 0.5rem 0;
    font-size: 0.85rem;
}

.progress {
    background-color: var(--light-bg);
    border-radius: 3px;
}

.progress-bar {
    border-radius: 3px;
}
</style>

<?php include 'includes/footer.php'; ?>
