<?php
$page_title = 'Approvals';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Approvals</h1>
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
                            <a class="nav-link active" href="approvals.php">
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
                            <h2>Approval Workflows</h2>
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">My Approvals</button>
                                <button class="btn btn-outline-secondary">All Requests</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Approval Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
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
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">45</h3>
                                <p class="stat-label">Approved This Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-danger">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">3</h3>
                                <p class="stat-label">Rejected This Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-avg-time"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">2.3</h3>
                                <p class="stat-label">Avg. Days to Approve</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Approval Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Request Type</label>
                                        <select class="form-select">
                                            <option>All Types</option>
                                            <option>Expense</option>
                                            <option>Purchase Order</option>
                                            <option>Invoice</option>
                                            <option>Budget</option>
                                            <option>Asset</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select">
                                            <option>All Statuses</option>
                                            <option>Pending</option>
                                            <option>Under Review</option>
                                            <option>Approved</option>
                                            <option>Rejected</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Priority</label>
                                        <select class="form-select">
                                            <option>All Priorities</option>
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                            <option>Urgent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Date Range</label>
                                        <select class="form-select">
                                            <option>Last 7 Days</option>
                                            <option>Last 30 Days</option>
                                            <option>Last 3 Months</option>
                                            <option>Last Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pending Approvals -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Pending Approvals</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Export</button>
                                    <button class="btn btn-sm btn-outline-success">Bulk Approve</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="approval-requests">
                                    <div class="approval-item">
                                        <div class="approval-header">
                                            <div class="approval-type">
                                                <span class="badge bg-warning">Expense</span>
                                            </div>
                                            <div class="approval-priority">
                                                <span class="badge bg-danger">High</span>
                                            </div>
                                        </div>
                                        <div class="approval-content">
                                            <h6>Office Equipment Purchase</h6>
                                            <p class="text-muted">Requested by John Doe for new office furniture and equipment</p>
                                            <div class="approval-details">
                                                <span><strong>Amount:</strong> RWF 450,000</span>
                                                <span><strong>Requested:</strong> 2024-01-15</span>
                                                <span><strong>Department:</strong> Operations</span>
                                            </div>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                        </div>
                                    </div>
                                    
                                    <div class="approval-item">
                                        <div class="approval-header">
                                            <div class="approval-type">
                                                <span class="badge bg-info">Purchase Order</span>
                                            </div>
                                            <div class="approval-priority">
                                                <span class="badge bg-warning">Medium</span>
                                            </div>
                                        </div>
                                        <div class="approval-content">
                                            <h6>IT Infrastructure Upgrade</h6>
                                            <p class="text-muted">Requested by Mike Johnson for server and network equipment</p>
                                            <div class="approval-details">
                                                <span><strong>Amount:</strong> RWF 1,200,000</span>
                                                <span><strong>Requested:</strong> 2024-01-14</span>
                                                <span><strong>Department:</strong> IT</span>
                                            </div>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                        </div>
                                    </div>
                                    
                                    <div class="approval-item">
                                        <div class="approval-header">
                                            <div class="approval-type">
                                                <span class="badge bg-primary">Invoice</span>
                                            </div>
                                            <div class="approval-priority">
                                                <span class="badge bg-success">Low</span>
                                            </div>
                                        </div>
                                        <div class="approval-content">
                                            <h6>Marketing Services Invoice</h6>
                                            <p class="text-muted">Requested by Jane Smith for digital marketing campaign</p>
                                            <div class="approval-details">
                                                <span><strong>Amount:</strong> RWF 800,000</span>
                                                <span><strong>Requested:</strong> 2024-01-13</span>
                                                <span><strong>Department:</strong> Marketing</span>
                                            </div>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                        </div>
                                    </div>
                                    
                                    <div class="approval-item">
                                        <div class="approval-header">
                                            <div class="approval-type">
                                                <span class="badge bg-secondary">Budget</span>
                                            </div>
                                            <div class="approval-priority">
                                                <span class="badge bg-warning">Medium</span>
                                            </div>
                                        </div>
                                        <div class="approval-content">
                                            <h6>Q1 Budget Adjustment</h6>
                                            <p class="text-muted">Requested by Sarah Wilson for budget reallocation</p>
                                            <div class="approval-details">
                                                <span><strong>Amount:</strong> RWF 300,000</span>
                                                <span><strong>Requested:</strong> 2024-01-12</span>
                                                <span><strong>Department:</strong> Finance</span>
                                            </div>
                                        </div>
                                        <div class="approval-actions">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Reject</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
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

<style>
.approval-requests {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.approval-item {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.approval-item:hover {
    box-shadow: var(--shadow);
    transform: translateY(-2px);
}

.approval-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.approval-content h6 {
    margin: 0 0 0.5rem 0;
    font-size: 1.1rem;
    color: var(--text-color);
}

.approval-content p {
    margin: 0 0 1rem 0;
    color: var(--text-muted);
}

.approval-details {
    display: flex;
    gap: 2rem;
    margin-bottom: 1.5rem;
}

.approval-details span {
    font-size: 0.9rem;
    color: var(--text-muted);
}

.approval-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .approval-details {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .approval-actions {
        flex-direction: column;
    }
    
    .approval-actions .btn {
        width: 100%;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
