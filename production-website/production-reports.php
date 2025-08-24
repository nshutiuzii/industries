<?php
$page_title = 'Production Reports';
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
                    <a class="nav-link active" href="production-reports.php">
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
                        <h2>Production Reports</h2>
                        <p class="text-muted mb-0">Generate and analyze production performance reports</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('reports')">
                            <i class="fas fa-download me-2"></i>Export All
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                            <i class="fas fa-plus me-2"></i>Generate Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Filters -->
        <div class="row mb-4">
            <div class="col-lg-3 mb-3">
                <label for="reportType" class="form-label">Report Type</label>
                <select class="form-select" id="reportType">
                    <option value="daily">Daily Report</option>
                    <option value="weekly">Weekly Report</option>
                    <option value="monthly">Monthly Report</option>
                    <option value="custom">Custom Range</option>
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <label for="reportDate" class="form-label">Date</label>
                <input type="date" class="form-control" id="reportDate" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-lg-3 mb-3">
                <label for="reportProduct" class="form-label">Product</label>
                <select class="form-select" id="reportProduct">
                    <option value="">All Products</option>
                    <option value="biscuit-classic">BISCUIT Classic</option>
                    <option value="biscuit-premium">BISCUIT Premium</option>
                    <option value="biscuit-chocolate">BISCUIT Chocolate</option>
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <label class="form-label">&nbsp;</label>
                <button class="btn btn-primary w-100" onclick="generateReport()">
                    <i class="fas fa-chart-bar me-2"></i>Generate
                </button>
            </div>
        </div>

        <!-- Report Summary -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">1,250</h3>
                        <p class="stat-label">Total Units</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">87.5%</h3>
                        <p class="stat-label">Efficiency Rate</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">96.2%</h3>
                        <p class="stat-label">Quality Score</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8.2</h3>
                        <p class="stat-label">Avg Hours/Day</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Production Performance Chart -->
        <div class="dashboard-card mb-4">
            <div class="card-header">
                <h5>Production Performance Trend</h5>
                <span class="text-muted">Last 7 days production metrics</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div style="height: 300px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <div class="text-center">
                                <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Production Performance Chart</p>
                                <small>Chart visualization would be implemented here</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6>Daily Breakdown</h6>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Dec 11</span>
                                <span class="fw-bold">1,200 units</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Dec 12</span>
                                <span class="fw-bold">1,180 units</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Dec 13</span>
                                <span class="fw-bold">1,250 units</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Dec 14</span>
                                <span class="fw-bold">1,300 units</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Dec 15</span>
                                <span class="fw-bold">1,280 units</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Dec 16</span>
                                <span class="fw-bold">1,220 units</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Dec 17</span>
                                <span class="fw-bold">1,250 units</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Performance Table -->
        <div class="dashboard-card mb-4">
            <div class="card-header">
                <h5>Product Performance Analysis</h5>
                <span class="text-muted">Detailed breakdown by product</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Target</th>
                                <th>Produced</th>
                                <th>Efficiency</th>
                                <th>Quality Score</th>
                                <th>Machine Usage</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                        <strong>BISCUIT Classic</strong>
                                    </div>
                                </td>
                                <td>500 units</td>
                                <td>450 units</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" style="width: 90%"></div>
                                    </div>
                                    <small class="text-muted">90%</small>
                                </td>
                                <td><span class="quality-score excellent">96%</span></td>
                                <td>Mixer A1</td>
                                <td><span class="badge bg-success">On Track</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                        <strong>BISCUIT Premium</strong>
                                    </div>
                                </td>
                                <td>300 units</td>
                                <td>280 units</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" style="width: 93%"></div>
                                    </div>
                                    <small class="text-muted">93%</small>
                                </td>
                                <td><span class="quality-score excellent">98%</span></td>
                                <td>Oven B1</td>
                                <td><span class="badge bg-success">On Track</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                        <strong>BISCUIT Chocolate</strong>
                                    </div>
                                </td>
                                <td>400 units</td>
                                <td>320 units</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 80%"></div>
                                    </div>
                                    <small class="text-muted">80%</small>
                                </td>
                                <td><span class="quality-score good">94%</span></td>
                                <td>Packager C1</td>
                                <td><span class="badge bg-warning">Behind Schedule</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Machine Efficiency Report -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Machine Efficiency Report</h5>
                <span class="text-muted">Machine performance and utilization</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Efficiency by Machine</h6>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Mixer A1</span>
                                <span>92%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: 92%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Oven B1</span>
                                <span>88%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: 88%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Packager C1</span>
                                <span>0%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Utilization Summary</h6>
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border rounded p-3">
                                    <h4 class="text-primary mb-1">8</h4>
                                    <small class="text-muted">Active Machines</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border rounded p-3">
                                    <h4 class="text-warning mb-1">3</h4>
                                    <small class="text-muted">In Maintenance</small>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-6">
                                <div class="border rounded p-3">
                                    <h4 class="text-success mb-1">87.5%</h4>
                                    <small class="text-muted">Avg Efficiency</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border rounded p-3">
                                    <h4 class="text-info mb-1">64 hrs</h4>
                                    <small class="text-muted">Total Runtime</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Generate Report Modal -->
<div class="modal fade" id="generateReportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Custom Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="generateReportForm">
                    <div class="mb-3">
                        <label for="customReportType" class="form-label">Report Type</label>
                        <select class="form-select" id="customReportType" name="report_type" required>
                            <option value="">Select Report Type</option>
                            <option value="production-summary">Production Summary</option>
                            <option value="quality-analysis">Quality Analysis</option>
                            <option value="machine-efficiency">Machine Efficiency</option>
                            <option value="material-consumption">Material Consumption</option>
                            <option value="operator-performance">Operator Performance</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="customStartDate" name="start_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="customEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="customEndDate" name="end_date" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="customProducts" class="form-label">Products (Optional)</label>
                        <select class="form-select" id="customProducts" name="products[]" multiple>
                            <option value="biscuit-classic">BISCUIT Classic</option>
                            <option value="biscuit-premium">BISCUIT Premium</option>
                            <option value="biscuit-chocolate">BISCUIT Chocolate</option>
                        </select>
                        <small class="text-muted">Hold Ctrl/Cmd to select multiple</small>
                    </div>
                    <div class="mb-3">
                        <label for="customFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="customFormat" name="format">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                            <option value="csv">CSV</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitCustomReport()">
                    <i class="fas fa-chart-bar me-2"></i>Generate Report
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default dates
document.getElementById('customStartDate').valueAsDate = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000); // 7 days ago
document.getElementById('customEndDate').valueAsDate = new Date();

// Report functions
function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const reportDate = document.getElementById('reportDate').value;
    const reportProduct = document.getElementById('reportProduct').value;
    
    if (!reportDate) {
        alert('Please select a date for the report');
        return;
    }
    
    alert(`Generating ${reportType} report for ${reportDate}${reportProduct ? ' - ' + reportProduct : ''}`);
    // Report generation logic would go here
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitCustomReport() {
    const form = document.getElementById('generateReportForm');
    if (form.checkValidity()) {
        alert('Custom report generation started!');
        form.reset();
        document.getElementById('customStartDate').valueAsDate = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
        document.getElementById('customEndDate').valueAsDate = new Date();
        const modal = bootstrap.Modal.getInstance(document.getElementById('generateReportModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Report type change handler
document.getElementById('reportType').addEventListener('change', function() {
    const reportDate = document.getElementById('reportDate');
    const customDateFields = document.querySelectorAll('#customStartDate, #customEndDate');
    
    if (this.value === 'custom') {
        reportDate.style.display = 'none';
        customDateFields.forEach(field => field.style.display = 'block');
    } else {
        reportDate.style.display = 'block';
        customDateFields.forEach(field => field.style.display = 'none');
    }
});
</script>

<?php include 'includes/footer.php'; ?>
