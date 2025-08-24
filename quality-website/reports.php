<?php
$page_title = 'Reports';
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
                    <a class="nav-link active" href="reports.php">
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
                        <h2>Quality Reports & Exports</h2>
                        <p class="text-muted mb-0">Generate and export quality control reports</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                            <i class="fas fa-plus me-2"></i>Generate Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Generation Options -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-bar fa-3x text-primary mb-3"></i>
                        <h5>Quality Summary</h5>
                        <p class="text-muted">Daily quality performance overview</p>
                        <button class="btn btn-outline-primary" onclick="generateReport('quality_summary')">
                            Generate
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h5>Issue Report</h5>
                        <p class="text-muted">Quality issues and resolutions</p>
                        <button class="btn btn-outline-warning" onclick="generateReport('issue_report')">
                            Generate
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-boxes fa-3x text-success mb-3"></i>
                        <h5>Batch Analysis</h5>
                        <p class="text-muted">Batch quality performance data</p>
                        <button class="btn btn-outline-success" onclick="generateReport('batch_analysis')">
                            Generate
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-certificate fa-3x text-info mb-3"></i>
                        <h5>Compliance Report</h5>
                        <p class="text-muted">Standards compliance status</p>
                        <button class="btn btn-outline-info" onclick="generateReport('compliance_report')">
                            Generate
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Reports</h5>
                        <span>Recently generated quality reports</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Report Name</th>
                                        <th>Type</th>
                                        <th>Generated By</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Daily Quality Summary</strong></td>
                                        <td>Quality Summary</td>
                                        <td>John Doe</td>
                                        <td>Dec 3, 2024 09:00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-primary" onclick="downloadReport(1)">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewReport(1)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" onclick="printReport(1)">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Weekly Issue Report</strong></td>
                                        <td>Issue Report</td>
                                        <td>Jane Smith</td>
                                        <td>Dec 2, 2024 17:30</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-primary" onclick="downloadReport(2)">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewReport(2)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" onclick="printReport(2)">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monthly Compliance Review</strong></td>
                                        <td>Compliance Report</td>
                                        <td>Mike Johnson</td>
                                        <td>Dec 1, 2024 14:15</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-primary" onclick="downloadReport(3)">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                                <button class="btn btn-outline-info" onclick="viewReport(3)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" onclick="printReport(3)">
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

        <!-- Scheduled Reports -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Scheduled Reports</h5>
                                <span>Automatically generated reports</span>
                            </div>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#scheduleReportModal">
                                <i class="fas fa-plus me-2"></i>Schedule Report
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Report Name</th>
                                        <th>Frequency</th>
                                        <th>Recipients</th>
                                        <th>Next Run</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Daily Quality Summary</strong></td>
                                        <td>Daily</td>
                                        <td>quality@adma.com</td>
                                        <td>Dec 4, 2024 09:00</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-warning" onclick="editSchedule(1)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="deleteSchedule(1)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Weekly Issue Summary</strong></td>
                                        <td>Weekly</td>
                                        <td>managers@adma.com</td>
                                        <td>Dec 9, 2024 08:00</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-warning" onclick="editSchedule(2)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="deleteSchedule(2)">
                                                    <i class="fas fa-trash"></i>
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

<!-- Generate Report Modal -->
<div class="modal fade" id="generateReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-file-alt me-2"></i>Generate Quality Report
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reportType" class="form-label">Report Type</label>
                            <select class="form-select" id="reportType" name="report_type" required>
                                <option value="">Select Report Type</option>
                                <option value="quality_summary">Quality Summary</option>
                                <option value="issue_report">Issue Report</option>
                                <option value="batch_analysis">Batch Analysis</option>
                                <option value="compliance_report">Compliance Report</option>
                                <option value="custom">Custom Report</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reportFormat" class="form-label">Output Format</label>
                            <select class="form-select" id="reportFormat" name="report_format" required>
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                                <option value="csv">CSV</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="includeCharts" class="form-label">Include Charts</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeCharts" name="include_charts" checked>
                                <label class="form-check-label" for="includeCharts">
                                    Include charts and graphs
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="emailReport" class="form-label">Email Report</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailReport" name="email_report">
                                <label class="form-check-label" for="emailReport">
                                    Send report via email
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reportNotes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="reportNotes" name="report_notes" rows="3" placeholder="Any additional requirements or notes..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="generateReport()">
                    <i class="fas fa-cog me-2"></i>Generate Report
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Report Modal -->
<div class="modal fade" id="scheduleReportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-clock me-2"></i>Schedule Report
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="scheduleForm">
                    <div class="mb-3">
                        <label for="scheduleReportType" class="form-label">Report Type</label>
                        <select class="form-select" id="scheduleReportType" name="schedule_report_type" required>
                            <option value="">Select Report Type</option>
                            <option value="quality_summary">Quality Summary</option>
                            <option value="issue_report">Issue Report</option>
                            <option value="batch_analysis">Batch Analysis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleFrequency" class="form-label">Frequency</label>
                        <select class="form-select" id="scheduleFrequency" name="schedule_frequency" required>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleTime" class="form-label">Time</label>
                        <input type="time" class="form-control" id="scheduleTime" name="schedule_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="scheduleRecipients" class="form-label">Email Recipients</label>
                        <input type="email" class="form-control" id="scheduleRecipients" name="schedule_recipients" placeholder="email@example.com" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="scheduleReport()">
                    <i class="fas fa-save me-2"></i>Schedule Report
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Report generation functions
function generateReport(type = null) {
    if (type) {
        // Quick report generation
        showNotification(`${type.replace('_', ' ')} report generated successfully!`, 'success');
    } else {
        // Custom report generation
        const form = document.getElementById('reportForm');
        if (form && form.checkValidity()) {
            showNotification('Report generation started. You will be notified when it completes.', 'info');
            closeModal('generateReportModal');
        } else {
            form.reportValidity();
        }
    }
}

function downloadReport(reportId) {
    showNotification('Report download started...', 'info');
}

function viewReport(reportId) {
    showNotification('Opening report viewer...', 'info');
}

function printReport(reportId) {
    showNotification('Preparing report for printing...', 'info');
}

function editSchedule(scheduleId) {
    showNotification('Opening schedule editor...', 'info');
}

function deleteSchedule(scheduleId) {
    if (confirm('Are you sure you want to delete this scheduled report?')) {
        showNotification('Schedule deleted successfully!', 'success');
    }
}

function scheduleReport() {
    const form = document.getElementById('scheduleForm');
    if (form && form.checkValidity()) {
        showNotification('Report scheduled successfully!', 'success');
        closeModal('scheduleReportModal');
    } else {
        form.reportValidity();
    }
}

// Set default dates
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const lastWeek = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
    
    document.getElementById('startDate').value = lastWeek.toISOString().split('T')[0];
    document.getElementById('endDate').value = today.toISOString().split('T')[0];
    document.getElementById('scheduleTime').value = '09:00';
});
</script>

<?php include 'includes/footer.php'; ?>
