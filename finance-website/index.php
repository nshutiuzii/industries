<?php
$page_title = 'Finance Dashboard';
require_once 'config.php';
require_once 'functions.php';

// Fetch data for dashboard
$services = getServices(6);
$posts = getPosts(3);
$testimonials = getTestimonials(4);
$pricingPlans = getPricingPlans();

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Finance Dashboard</h1>
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
                            <a class="nav-link active" href="index.php">
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
                            <a class="nav-link" href="reports.php">
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
                <!-- Quick Stats -->
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 25,000,000</h3>
                                <p class="stat-label">Total Balance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">12</h3>
                                <p class="stat-label">Pending Approvals</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 8,500,000</h3>
                                <p class="stat-label">Monthly Income</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Row -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-3">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5>Financial Overview</h5>
                                <div class="chart-actions">
                                    <select class="form-select form-select-sm">
                                        <option>Last 30 Days</option>
                                        <option>Last 3 Months</option>
                                        <option>Last 6 Months</option>
                                        <option>Last Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="chart-body">
                                <div class="chart-placeholder">
                                    <i class="fas fa-chart-line"></i>
                                    <p>Financial Chart Visualization</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5>Expense Breakdown</h5>
                            </div>
                            <div class="chart-body">
                                <div class="expense-breakdown">
                                    <div class="expense-item">
                                        <span class="expense-label">Operations</span>
                                        <span class="expense-value">45%</span>
                                    </div>
                                    <div class="expense-item">
                                        <span class="expense-label">Marketing</span>
                                        <span class="expense-value">25%</span>
                                    </div>
                                    <div class="expense-item">
                                        <span class="expense-label">Personnel</span>
                                        <span class="expense-value">20%</span>
                                    </div>
                                    <div class="expense-item">
                                        <span class="expense-label">Other</span>
                                        <span class="expense-value">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Transactions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Recent Transactions</h5>
                                <a href="transactions.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2024-01-15</td>
                                                <td>Office Supplies Purchase</td>
                                                <td>Operations</td>
                                                <td class="text-danger">-RWF 150,000</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-14</td>
                                                <td>Client Payment - ABC Corp</td>
                                                <td>Income</td>
                                                <td class="text-success">+RWF 2,500,000</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-13</td>
                                                <td>Marketing Campaign</td>
                                                <td>Marketing</td>
                                                <td class="text-danger">-RWF 800,000</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-12</td>
                                                <td>Salary Payment</td>
                                                <td>Personnel</td>
                                                <td class="text-danger">-RWF 5,200,000</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="quick-actions">
                                    <a href="income.php" class="btn btn-outline-success mb-2 w-100">
                                        <i class="fas fa-plus me-2"></i>Record Income
                                    </a>
                                    <a href="expenses.php" class="btn btn-outline-danger mb-2 w-100">
                                        <i class="fas fa-minus me-2"></i>Record Expense
                                    </a>
                                    <a href="invoices.php" class="btn btn-outline-primary mb-2 w-100">
                                        <i class="fas fa-file-invoice me-2"></i>Create Invoice
                                    </a>
                                    <a href="reports.php" class="btn btn-outline-info w-100">
                                        <i class="fas fa-chart-bar me-2"></i>Generate Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Pending Approvals</h5>
                                <a href="approvals.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="approval-list">
                                    <div class="approval-item">
                                        <div class="approval-info">
                                            <strong>Office Equipment Purchase</strong>
                                            <small class="text-muted">RWF 450,000</small>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                        </div>
                                    </div>
                                    <div class="approval-item">
                                        <div class="approval-info">
                                            <strong>Travel Expense</strong>
                                            <small class="text-muted">RWF 180,000</small>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                        </div>
                                    </div>
                                    <div class="approval-item">
                                        <div class="approval-info">
                                            <strong>Software License</strong>
                                            <small class="text-muted">RWF 320,000</small>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
