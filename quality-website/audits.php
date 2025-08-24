<?php
$page_title = 'Audits';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<div class="dashboard-container">
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
                    <a class="nav-link active" href="audits.php">
                        <i class="fas fa-search"></i>
                        <span>Audits</span>
                        <span class="item-counter">5</span>
                    </a>
                </li>
            </ul>
        </nav>
        
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
    
    <div class="dashboard-content">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Quality Audits</h2>
                        <p class="text-muted mb-0">Manage and monitor quality audits and inspections</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" onclick="showNewAuditModal()">
                            <i class="fas fa-plus me-2"></i>New Audit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">5</h3>
                        <p class="stat-label">Total Audits</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">3</h3>
                        <p class="stat-label">Completed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">1</h3>
                        <p class="stat-label">In Progress</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">1</h3>
                        <p class="stat-label">Scheduled</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Audit Schedule & Status</h5>
                        <span>Current and upcoming quality audits</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Audit ID</th>
                                        <th>Type</th>
                                        <th>Department</th>
                                        <th>Auditor</th>
                                        <th>Start Date</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#AUD001</td>
                                        <td><span class="badge bg-info">Internal</span></td>
                                        <td>Production</td>
                                        <td>John Doe</td>
                                        <td>2024-01-20</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>92%</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#AUD002</td>
                                        <td><span class="badge bg-warning">External</span></td>
                                        <td>Quality Control</td>
                                        <td>Jane Smith</td>
                                        <td>2024-01-25</td>
                                        <td><span class="badge bg-primary">In Progress</span></td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#AUD003</td>
                                        <td><span class="badge bg-info">Internal</span></td>
                                        <td>Safety</td>
                                        <td>Mike Johnson</td>
                                        <td>2024-02-01</td>
                                        <td><span class="badge bg-secondary">Scheduled</span></td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
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

        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Audit Results</h5>
                        <span>Performance overview of completed audits</span>
                    </div>
                    <div class="card-body">
                        <canvas id="auditResultsChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Upcoming Audits</h5>
                        <span>Next scheduled quality audits</span>
                    </div>
                    <div class="card-body">
                        <div class="upcoming-audits">
                            <div class="audit-item">
                                <div class="audit-date">
                                    <span class="day">01</span>
                                    <span class="month">Feb</span>
                                </div>
                                <div class="audit-content">
                                    <h6>Safety Standards Audit</h6>
                                    <p class="text-muted">Internal audit of workplace safety procedures</p>
                                    <span class="badge bg-info">Internal</span>
                                </div>
                            </div>
                            <div class="audit-item">
                                <div class="audit-date">
                                    <span class="day">15</span>
                                    <span class="month">Feb</span>
                                </div>
                                <div class="audit-content">
                                    <h6>Quality Management System</h6>
                                    <p class="text-muted">External certification audit</p>
                                    <span class="badge bg-warning">External</span>
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
function showNewAuditModal() {
    showNotification('New Audit functionality will be implemented here', 'info');
}

// Initialize audit results chart
document.addEventListener('DOMContentLoaded', function() {
    const auditCtx = document.getElementById('auditResultsChart').getContext('2d');
    new Chart(auditCtx, {
        type: 'bar',
        data: {
            labels: ['Production', 'Quality Control', 'Safety', 'Environmental'],
            datasets: [{
                label: 'Audit Score (%)',
                data: [92, 88, 95, 87],
                backgroundColor: ['#28a745', '#17a2b8', '#ffc107', '#20c997'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
});
</script>

<style>
.upcoming-audits {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.audit-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: white;
    transition: var(--transition);
}

.audit-item:hover {
    box-shadow: var(--shadow);
}

.audit-date {
    text-align: center;
    min-width: 60px;
}

.audit-date .day {
    display: block;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-color);
    line-height: 1;
}

.audit-date .month {
    display: block;
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

.audit-content {
    flex: 1;
}

.audit-content h6 {
    margin: 0 0 0.25rem 0;
    color: var(--primary-color);
}

.audit-content p {
    margin: 0 0 0.5rem 0;
    font-size: 0.85rem;
}
</style>

<?php include 'includes/footer.php'; ?>
