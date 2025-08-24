<?php
$page_title = 'Reports';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Reports</h1>
                <p class="dashboard-subtitle">Financial Management System</p>
            </div>
            <div class="col-lg-4 text-end">
                <div class="user-info">
                    <span class="user-name"><?php echo isLoggedIn() ? $_SESSION['user_name'] : 'Guest User'; ?></span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                            <a class="nav-link" href="budgets.php">
                                <i class="fas fa-chart-pie"></i>
                                <span>Budgets</span>
                                <span class="item-counter">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="income.php">
                                <i class="fas fa-arrow-up text-success"></i>
                                <span>Income</span>
                                <span class="item-counter">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="expenses.php">
                                <i class="fas fa-arrow-down text-danger"></i>
                                <span>Expenses</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="payroll.php">
                                <i class="fas fa-users"></i>
                                <span>Payroll</span>
                                <span class="item-counter">15</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="transactions.php">
                                <i class="fas fa-exchange-alt"></i>
                                <span>Transactions</span>
                                <span class="item-counter">24</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="recurring.php">
                                <i class="fas fa-redo"></i>
                                <span>Recurring</span>
                                <span class="item-counter">7</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="fas fa-university"></i>
                                <span>Accounts</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="purchase-orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Purchase Orders</span>
                                <span class="item-counter">9</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="petty-cash.php">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Petty Cash</span>
                                <span class="item-counter">4</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="invoices.php">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span>Invoices</span>
                                <span class="item-counter">18</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="assets.php">
                                <i class="fas fa-building"></i>
                                <span>Assets</span>
                                <span class="item-counter">11</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cost-centers.php">
                                <i class="fas fa-sitemap"></i>
                                <span>Cost Centers</span>
                                <span class="item-counter">6</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="approvals.php">
                                <i class="fas fa-check-circle"></i>
                                <span>Approvals</span>
                                <span class="item-counter">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alerts.php">
                                <i class="fas fa-bell"></i>
                                <span>Alerts</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documents.php">
                                <i class="fas fa-file-alt"></i>
                                <span>Documents</span>
                                <span class="item-counter">25</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signatures.php">
                                <i class="fas fa-signature"></i>
                                <span>Signatures</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="reports.php">
                                <i class="fas fa-chart-bar"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="audit-log.php">
                                <i class="fas fa-history"></i>
                                <span>Audit Log</span>
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
                            <p class="user-role"><?php echo isAdmin() ? 'Administrator' : 'User'; ?></p>
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
                            <h2>Financial Reports & Analytics</h2>
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">Schedule Report</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                                    <i class="fas fa-plus me-2"></i>Generate Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Report Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">24</h3>
                                <p class="stat-label">Reports Generated</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
                                <p class="stat-label">Scheduled Reports</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">156</h3>
                                <p class="stat-label">Report Views</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-download"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">89</h3>
                                <p class="stat-label">Downloads</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Reports -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Quick Reports</h5>
                                <span class="text-muted">Generate common reports instantly</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="quick-report-card">
                                            <div class="report-icon bg-primary">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                            <div class="report-content">
                                                <h6>Profit & Loss</h6>
                                                <p class="text-muted">Monthly P&L statement</p>
                                                <button class="btn btn-sm btn-primary">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="quick-report-card">
                                            <div class="report-icon bg-success">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                            <div class="report-content">
                                                <h6>Cash Flow</h6>
                                                <p class="text-muted">Cash flow analysis</p>
                                                <button class="btn btn-sm btn-success">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="quick-report-card">
                                            <div class="report-icon bg-info">
                                                <i class="fas fa-balance-scale"></i>
                                            </div>
                                            <div class="report-content">
                                                <h6>Balance Sheet</h6>
                                                <p class="text-muted">Financial position</p>
                                                <button class="btn btn-sm btn-info">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="quick-report-card">
                                            <div class="report-icon bg-warning">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div class="report-content">
                                                <h6>Budget vs Actual</h6>
                                                <p class="text-muted">Budget performance</p>
                                                <button class="btn btn-sm btn-warning">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="quick-report-card">
                                            <div class="report-icon bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="report-content">
                                                <h6>Expense Analysis</h6>
                                                <p class="text-muted">Expense breakdown</p>
                                                <button class="btn btn-sm btn-danger">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="quick-report-card">
                                            <div class="report-icon bg-secondary">
                                                <i class="fas fa-file-invoice"></i>
                                            </div>
                                            <div class="report-content">
                                                <h6>Invoice Summary</h6>
                                                <p class="text-muted">Invoice status report</p>
                                                <button class="btn btn-sm btn-secondary">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
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
                                                <td>
                                                    <strong>Q4 2023 Financial Summary</strong>
                                                    <br><small class="text-muted">Comprehensive financial overview</small>
                                                </td>
                                                <td><span class="badge bg-primary">Financial</span></td>
                                                <td>John Doe</td>
                                                <td>2024-01-15</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>December 2023 Expense Report</strong>
                                                    <br><small class="text-muted">Monthly expense breakdown</small>
                                                </td>
                                                <td><span class="badge bg-warning">Expense</span></td>
                                                <td>Jane Smith</td>
                                                <td>2024-01-14</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Annual Budget Performance 2023</strong>
                                                    <br><small class="text-muted">Budget vs actual analysis</small>
                                                </td>
                                                <td><span class="badge bg-info">Budget</span></td>
                                                <td>Mike Johnson</td>
                                                <td>2024-01-13</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Cash Flow Forecast Q1 2024</strong>
                                                    <br><small class="text-muted">Projected cash flow</small>
                                                </td>
                                                <td><span class="badge bg-success">Forecast</span></td>
                                                <td>Sarah Wilson</td>
                                                <td>2024-01-12</td>
                                                <td><span class="badge bg-warning">Processing</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-secondary" disabled>Processing...</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Vendor Payment Analysis</strong>
                                                    <br><small class="text-muted">Vendor payment patterns</small>
                                                </td>
                                                <td><span class="badge bg-secondary">Analysis</span></td>
                                                <td>David Brown</td>
                                                <td>2024-01-11</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Download</button>
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
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Scheduled Reports</h5>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#scheduleReportModal">
                                    <i class="fas fa-plus me-2"></i>Schedule New
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Report Name</th>
                                                <th>Frequency</th>
                                                <th>Next Run</th>
                                                <th>Recipients</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Monthly Financial Summary</strong>
                                                    <br><small class="text-muted">Comprehensive monthly report</small>
                                                </td>
                                                <td>Monthly</td>
                                                <td>2024-02-01</td>
                                                <td>management@company.com</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Pause</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Weekly Expense Report</strong>
                                                    <br><small class="text-muted">Weekly expense tracking</small>
                                                </td>
                                                <td>Weekly</td>
                                                <td>2024-01-22</td>
                                                <td>finance@company.com</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Pause</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Quarterly Budget Review</strong>
                                                    <br><small class="text-muted">Quarterly budget analysis</small>
                                                </td>
                                                <td>Quarterly</td>
                                                <td>2024-04-01</td>
                                                <td>board@company.com</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Pause</button>
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

<!-- Generate Report Modal -->
<div class="modal fade" id="generateReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Custom Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Report Name</label>
                            <input type="text" class="form-control" placeholder="Enter report name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Report Type</label>
                            <select class="form-select">
                                <option>Financial Summary</option>
                                <option>Profit & Loss</option>
                                <option>Cash Flow</option>
                                <option>Balance Sheet</option>
                                <option>Budget Analysis</option>
                                <option>Expense Report</option>
                                <option>Custom Report</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Format</label>
                            <select class="form-select">
                                <option>PDF</option>
                                <option>Excel</option>
                                <option>CSV</option>
                                <option>HTML</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Include Charts</label>
                            <select class="form-select">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Report Sections</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="section1" checked>
                            <label class="form-check-label" for="section1">Executive Summary</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="section2" checked>
                            <label class="form-check-label" for="section2">Financial Highlights</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="section3" checked>
                            <label class="form-check-label" for="section3">Detailed Analysis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="section4">
                            <label class="form-check-label" for="section4">Recommendations</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Additional Notes</label>
                        <textarea class="form-control" rows="3" placeholder="Any additional requirements or notes"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Report Modal -->
<div class="modal fade" id="scheduleReportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Recurring Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Report Name</label>
                        <input type="text" class="form-control" placeholder="Enter report name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Report Type</label>
                        <select class="form-select">
                            <option>Financial Summary</option>
                            <option>Expense Report</option>
                            <option>Budget Analysis</option>
                            <option>Cash Flow</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Frequency</label>
                        <select class="form-select">
                            <option>Daily</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Quarterly</option>
                            <option>Annually</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Recipients</label>
                        <input type="email" class="form-control" placeholder="Enter email addresses (comma separated)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Format</label>
                        <select class="form-select">
                            <option>PDF</option>
                            <option>Excel</option>
                            <option>CSV</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Schedule Report</button>
            </div>
        </div>
    </div>
</div>

<style>
.quick-report-card {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
}

.quick-report-card:hover {
    box-shadow: var(--shadow);
    transform: translateY(-3px);
}

.report-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1rem auto;
}

.report-content h6 {
    margin: 0 0 0.5rem 0;
    font-size: 1.1rem;
    font-weight: 600;
}

.report-content p {
    margin: 0 0 1rem 0;
    color: var(--text-muted);
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .quick-report-card {
        margin-bottom: 1rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
