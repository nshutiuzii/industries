<?php
$page_title = 'Budgets';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Budgets</h1>
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
                            <a class="nav-link active" href="budgets.php">
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
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Budget Management</h2>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create Budget
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Budget Overview -->
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 15,000,000</h3>
                                <p class="stat-label">Total Budget</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 12,500,000</h3>
                                <p class="stat-label">Used Budget</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-coins"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 2,500,000</h3>
                                <p class="stat-label">Remaining</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Budget Categories -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Budget Categories</h5>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Monthly</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary active">Quarterly</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary">Yearly</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Budget</th>
                                                <th>Used</th>
                                                <th>Remaining</th>
                                                <th>Progress</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="category-icon bg-primary me-3">
                                                            <i class="fas fa-cogs text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Operations</strong>
                                                            <br><small class="text-muted">Daily operations</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 5,000,000</td>
                                                <td>RWF 4,200,000</td>
                                                <td>RWF 800,000</td>
                                                <td>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-success" style="width: 84%"></div>
                                                    </div>
                                                    <small class="text-muted">84%</small>
                                                </td>
                                                <td><span class="badge bg-success">On Track</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="category-icon bg-warning me-3">
                                                            <i class="fas fa-bullhorn text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Marketing</strong>
                                                            <br><small class="text-muted">Promotional activities</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 3,000,000</td>
                                                <td>RWF 2,800,000</td>
                                                <td>RWF 200,000</td>
                                                <td>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-warning" style="width: 93%"></div>
                                                    </div>
                                                    <small class="text-muted">93%</small>
                                                </td>
                                                <td><span class="badge bg-warning">Warning</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="category-icon bg-info me-3">
                                                            <i class="fas fa-laptop text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Technology</strong>
                                                            <br><small class="text-muted">IT infrastructure</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 2,500,000</td>
                                                <td>RWF 1,800,000</td>
                                                <td>RWF 700,000</td>
                                                <td>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-info" style="width: 72%"></div>
                                                    </div>
                                                    <small class="text-muted">72%</small>
                                                </td>
                                                <td><span class="badge bg-success">On Track</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="category-icon bg-danger me-3">
                                                            <i class="fas fa-users text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Personnel</strong>
                                                            <br><small class="text-muted">Staff costs</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 4,500,000</td>
                                                <td>RWF 3,700,000</td>
                                                <td>RWF 800,000</td>
                                                <td>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-danger" style="width: 82%"></div>
                                                    </div>
                                                    <small class="text-muted">82%</small>
                                                </td>
                                                <td><span class="badge bg-success">On Track</span></td>
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

<style>
.category-icon {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<?php include 'includes/footer.php'; ?>
