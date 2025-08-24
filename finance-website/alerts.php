<?php
$page_title = 'Alerts';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Alerts</h1>
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
                            <a class="nav-link active" href="alerts.php">
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
                            <h2>Alert Management</h2>
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">Mark All Read</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAlertModal">
                                    <i class="fas fa-plus me-2"></i>Create Alert
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Alert Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">3</h3>
                                <p class="stat-label">Critical Alerts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
                                <p class="stat-label">Warning Alerts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">15</h3>
                                <p class="stat-label">Info Alerts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">42</h3>
                                <p class="stat-label">Resolved Alerts</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Alert Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Alert Type</label>
                                        <select class="form-select">
                                            <option>All Types</option>
                                            <option>Budget Overrun</option>
                                            <option>Payment Due</option>
                                            <option>System Alert</option>
                                            <option>Compliance</option>
                                            <option>Security</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Priority</label>
                                        <select class="form-select">
                                            <option>All Priorities</option>
                                            <option>Critical</option>
                                            <option>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select">
                                            <option>All Statuses</option>
                                            <option>Active</option>
                                            <option>Acknowledged</option>
                                            <option>Resolved</option>
                                            <option>Dismissed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Date Range</label>
                                        <select class="form-select">
                                            <option>Last 24 Hours</option>
                                            <option>Last 7 Days</option>
                                            <option>Last 30 Days</option>
                                            <option>Last 3 Months</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Active Alerts -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Active Alerts</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Export</button>
                                    <button class="btn btn-sm btn-outline-secondary">Bulk Actions</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert-list">
                                    <div class="alert-item critical">
                                        <div class="alert-icon">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="alert-content">
                                            <div class="alert-header">
                                                <h6>Budget Overrun Alert</h6>
                                                <span class="alert-time">2 hours ago</span>
                                            </div>
                                            <p class="alert-description">IT Infrastructure department has exceeded their quarterly budget by 15%</p>
                                            <div class="alert-details">
                                                <span><strong>Department:</strong> IT Infrastructure</span>
                                                <span><strong>Budget:</strong> RWF 2,200,000</span>
                                                <span><strong>Spent:</strong> RWF 2,530,000</span>
                                                <span><strong>Overrun:</strong> RWF 330,000</span>
                                            </div>
                                        </div>
                                        <div class="alert-actions">
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            <button class="btn btn-sm btn-outline-warning">Acknowledge</button>
                                            <button class="btn btn-sm btn-outline-success">Resolve</button>
                                        </div>
                                    </div>
                                    
                                    <div class="alert-item warning">
                                        <div class="alert-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="alert-content">
                                            <div class="alert-header">
                                                <h6>Payment Due Reminder</h6>
                                                <span class="alert-time">4 hours ago</span>
                                            </div>
                                            <p class="alert-description">Invoice INV-2024-015 is due in 3 days for ABC Corporation</p>
                                            <div class="alert-details">
                                                <span><strong>Invoice:</strong> INV-2024-015</span>
                                                <span><strong>Client:</strong> ABC Corporation</span>
                                                <span><strong>Amount:</strong> RWF 2,500,000</span>
                                                <span><strong>Due Date:</strong> 2024-01-18</span>
                                            </div>
                                        </div>
                                        <div class="alert-actions">
                                            <button class="btn btn-sm btn-outline-primary">View Invoice</button>
                                            <button class="btn btn-sm btn-outline-warning">Send Reminder</button>
                                            <button class="btn btn-sm btn-outline-success">Mark Paid</button>
                                        </div>
                                    </div>
                                    
                                    <div class="alert-item info">
                                        <div class="alert-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="alert-content">
                                            <div class="alert-header">
                                                <h6>System Maintenance Notice</h6>
                                                <span class="alert-time">6 hours ago</span>
                                            </div>
                                            <p class="alert-description">Scheduled system maintenance will occur tonight from 11:00 PM to 2:00 AM</p>
                                            <div class="alert-details">
                                                <span><strong>Type:</strong> System Maintenance</span>
                                                <span><strong>Start Time:</strong> 23:00</span>
                                                <span><strong>End Time:</strong> 02:00</span>
                                                <span><strong>Impact:</strong> Minimal</span>
                                            </div>
                                        </div>
                                        <div class="alert-actions">
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            <button class="btn btn-sm btn-outline-warning">Acknowledge</button>
                                            <button class="btn btn-sm btn-outline-secondary">Dismiss</button>
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

<!-- Create Alert Modal -->
<div class="modal fade" id="addAlertModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Alert Title</label>
                        <input type="text" class="form-control" placeholder="Enter alert title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alert Type</label>
                        <select class="form-select">
                            <option>Budget Overrun</option>
                            <option>Payment Due</option>
                            <option>System Alert</option>
                            <option>Compliance</option>
                            <option>Security</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Priority</label>
                        <select class="form-select">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                            <option>Critical</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter alert description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target Users</label>
                        <select class="form-select">
                            <option>All Users</option>
                            <option>Finance Team</option>
                            <option>Managers</option>
                            <option>Administrators</option>
                            <option>Specific Users</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Auto-Resolve</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoResolve">
                            <label class="form-check-label" for="autoResolve">
                                Automatically resolve this alert after expiry
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Alert</button>
            </div>
        </div>
    </div>
</div>

<style>
.alert-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.alert-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.alert-item:hover {
    box-shadow: var(--shadow);
    transform: translateY(-2px);
}

.alert-item.critical {
    border-left: 4px solid var(--danger-color);
}

.alert-item.warning {
    border-left: 4px solid var(--warning-color);
}

.alert-item.info {
    border-left: 4px solid var(--info-color);
}

.alert-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    flex-shrink: 0;
}

.alert-item.critical .alert-icon {
    background: var(--danger-color);
}

.alert-item.warning .alert-icon {
    background: var(--warning-color);
}

.alert-item.info .alert-icon {
    background: var(--info-color);
}

.alert-content {
    flex: 1;
}

.alert-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.alert-header h6 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
}

.alert-time {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.alert-description {
    margin: 0 0 1rem 0;
    color: var(--text-muted);
}

.alert-details {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.alert-details span {
    font-size: 0.9rem;
    color: var(--text-muted);
}

.alert-actions {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .alert-item {
        flex-direction: column;
        align-items: stretch;
    }
    
    .alert-details {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .alert-actions {
        flex-direction: row;
        justify-content: stretch;
    }
    
    .alert-actions .btn {
        flex: 1;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
