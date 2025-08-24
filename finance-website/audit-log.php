<?php
$page_title = 'Audit Log';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Audit Log</h1>
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
                            <a class="nav-link" href="reports.php">
                                <i class="fas fa-chart-bar"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="audit-log.php">
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
                            <h2>System Audit Log</h2>
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">Export Log</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#auditSettingsModal">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Audit Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-list"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">1,247</h3>
                                <p class="stat-label">Total Log Entries</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">156</h3>
                                <p class="stat-label">User Actions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">23</h3>
                                <p class="stat-label">Security Events</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">7 days</h3>
                                <p class="stat-label">Retention Period</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Audit Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Event Type</label>
                                        <select class="form-select">
                                            <option>All Events</option>
                                            <option>User Login</option>
                                            <option>Data Access</option>
                                            <option>Data Modification</option>
                                            <option>System Changes</option>
                                            <option>Security Events</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">User</label>
                                        <select class="form-select">
                                            <option>All Users</option>
                                            <option>John Doe</option>
                                            <option>Jane Smith</option>
                                            <option>Mike Johnson</option>
                                            <option>Sarah Wilson</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Severity</label>
                                        <select class="form-select">
                                            <option>All Levels</option>
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                            <option>Critical</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Date Range</label>
                                        <select class="form-select">
                                            <option>Last 24 Hours</option>
                                            <option>Last 7 Days</option>
                                            <option>Last 30 Days</option>
                                            <option>Last 3 Months</option>
                                            <option>Custom Range</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary">Apply Filters</button>
                                        <button class="btn btn-outline-secondary ms-2">Reset</button>
                                        <button class="btn btn-outline-info ms-2">Save Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Audit Log Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Audit Trail</h5>
                                <div class="d-flex gap-2">
                                    <span class="text-muted">Showing 50 of 1,247 entries</span>
                                    <button class="btn btn-sm btn-outline-primary">Refresh</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Timestamp</th>
                                                <th>User</th>
                                                <th>Event</th>
                                                <th>Details</th>
                                                <th>IP Address</th>
                                                <th>Severity</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>2024-01-15 14:32:15</strong>
                                                    <br><small class="text-muted">2 minutes ago</small>
                                                </td>
                                                <td>
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-sm">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>John Doe</strong>
                                                            <br><small class="text-muted">Administrator</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary">Data Access</span>
                                                    <br><small class="text-muted">Viewed financial reports</small>
                                                </td>
                                                <td>
                                                    <strong>Module:</strong> Reports<br>
                                                    <strong>Action:</strong> Generated P&L Report<br>
                                                    <strong>Duration:</strong> 45 seconds
                                                </td>
                                                <td>192.168.1.100</td>
                                                <td><span class="badge bg-success">Low</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>2024-01-15 14:28:42</strong>
                                                    <br><small class="text-muted">6 minutes ago</small>
                                                </td>
                                                <td>
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-sm">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Jane Smith</strong>
                                                            <br><small class="text-muted">Finance Manager</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning">Data Modification</span>
                                                    <br><small class="text-muted">Updated expense record</small>
                                                </td>
                                                <td>
                                                    <strong>Module:</strong> Expenses<br>
                                                    <strong>Action:</strong> Modified Expense ID: EXP-001<br>
                                                    <strong>Changes:</strong> Amount updated
                                                </td>
                                                <td>192.168.1.105</td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>2024-01-15 14:25:18</strong>
                                                    <br><small class="text-muted">9 minutes ago</small>
                                                </td>
                                                <td>
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-sm">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Mike Johnson</strong>
                                                            <br><small class="text-muted">Accountant</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">User Login</span>
                                                    <br><small class="text-muted">Successful authentication</small>
                                                </td>
                                                <td>
                                                    <strong>Method:</strong> Username/Password<br>
                                                    <strong>Browser:</strong> Chrome 120.0<br>
                                                    <strong>Device:</strong> Desktop
                                                </td>
                                                <td>192.168.1.110</td>
                                                <td><span class="badge bg-success">Low</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>2024-01-15 14:20:33</strong>
                                                    <br><small class="text-muted">14 minutes ago</small>
                                                </td>
                                                <td>
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-sm">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Unknown User</strong>
                                                            <br><small class="text-muted">Failed Login Attempt</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger">Security Event</span>
                                                    <br><small class="text-muted">Failed login attempt</small>
                                                </td>
                                                <td>
                                                    <strong>Username:</strong> admin<br>
                                                    <strong>Reason:</strong> Invalid password<br>
                                                    <strong>Attempts:</strong> 3/5
                                                </td>
                                                <td>203.45.67.89</td>
                                                <td><span class="badge bg-danger">High</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning">Block IP</button>
                                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>2024-01-15 14:15:07</strong>
                                                    <br><small class="text-muted">19 minutes ago</small>
                                                </td>
                                                <td>
                                                    <div class="user-info-compact">
                                                        <div class="user-avatar-sm">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Sarah Wilson</strong>
                                                            <br><small class="text-muted">HR Manager</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">System Change</span>
                                                    <br><small class="text-muted">Updated user permissions</small>
                                                </td>
                                                <td>
                                                    <strong>Module:</strong> User Management<br>
                                                    <strong>Action:</strong> Modified user role<br>
                                                    <strong>Target:</strong> David Brown
                                                </td>
                                                <td>192.168.1.115</td>
                                                <td><span class="badge bg-warning">Medium</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination -->
                                <nav aria-label="Audit log pagination" class="mt-4">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Audit Settings Modal -->
<div class="modal fade" id="auditSettingsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Audit Log Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Log Retention Period</label>
                            <select class="form-select">
                                <option>7 days</option>
                                <option>30 days</option>
                                <option>90 days</option>
                                <option>1 year</option>
                                <option>Indefinite</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Log Level</label>
                            <select class="form-select">
                                <option>Low (Basic events only)</option>
                                <option>Medium (Standard events)</option>
                                <option>High (Detailed events)</option>
                                <option>Debug (All events)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Events to Log</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="event1" checked>
                            <label class="form-check-label" for="event1">User Authentication</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="event2" checked>
                            <label class="form-check-label" for="event2">Data Access</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="event3" checked>
                            <label class="form-check-label" for="event3">Data Modification</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="event4" checked>
                            <label class="form-check-label" for="event4">System Configuration Changes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="event5" checked>
                            <label class="form-check-label" for="event5">Security Events</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="event6">
                            <label class="form-check-label" for="event6">Performance Metrics</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Real-time Alerts</label>
                            <select class="form-select">
                                <option>Disabled</option>
                                <option>Critical events only</option>
                                <option>High and critical events</option>
                                <option>All security events</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alert Recipients</label>
                            <input type="email" class="form-control" placeholder="admin@company.com">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Additional Notes</label>
                        <textarea class="form-control" rows="3" placeholder="Any additional configuration notes"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Settings</button>
            </div>
        </div>
    </div>
</div>

<style>
.user-info-compact {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.user-avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--light-color);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-size: 0.875rem;
}

.audit-filters {
    background: var(--light-color);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.audit-filters .form-label {
    font-weight: 500;
    color: var(--text-color);
    margin-bottom: 0.5rem;
}

.audit-filters .btn {
    margin-top: 1rem;
}

@media (max-width: 768px) {
    .user-info-compact {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
    
    .audit-filters .row > div {
        margin-bottom: 1rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
