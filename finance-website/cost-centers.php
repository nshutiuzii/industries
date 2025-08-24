<?php
$page_title = 'Cost Centers';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Cost Centers</h1>
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
                            <a class="nav-link active" href="cost-centers.php">
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
                            <h2>Cost Center Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCostCenterModal">
                                <i class="fas fa-plus me-2"></i>Add Cost Center
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Cost Center Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-sitemap"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">6</h3>
                                <p class="stat-label">Total Cost Centers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 12,500,000</h3>
                                <p class="stat-label">Total Budget</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-danger">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 8,200,000</h3>
                                <p class="stat-label">Total Spent</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-percentage"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">65.6%</h3>
                                <p class="stat-label">Budget Utilization</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cost Center Performance Chart -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-3">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5>Cost Center Performance</h5>
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
                                    <i class="fas fa-chart-bar"></i>
                                    <p>Cost Center Performance Chart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5>Budget Status</h5>
                            </div>
                            <div class="chart-body">
                                <div class="budget-status">
                                    <div class="status-item">
                                        <span class="status-label">Under Budget</span>
                                        <span class="status-value text-success">3</span>
                                    </div>
                                    <div class="status-item">
                                        <span class="status-label">On Track</span>
                                        <span class="status-value text-warning">2</span>
                                    </div>
                                    <div class="status-item">
                                        <span class="status-label">Over Budget</span>
                                        <span class="status-value text-danger">1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cost Centers Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Cost Centers</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Export</button>
                                    <button class="btn btn-sm btn-outline-secondary">Filter</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cost Center</th>
                                                <th>Type</th>
                                                <th>Manager</th>
                                                <th>Budget</th>
                                                <th>Spent</th>
                                                <th>Remaining</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>CC-001</strong>
                                                    <br><small class="text-muted">Operations Department</small>
                                                </td>
                                                <td><span class="badge bg-primary">Department</span></td>
                                                <td>John Doe</td>
                                                <td>RWF 3,500,000</td>
                                                <td>RWF 2,100,000</td>
                                                <td class="text-success">RWF 1,400,000</td>
                                                <td><span class="badge bg-success">Under Budget</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>CC-002</strong>
                                                    <br><small class="text-muted">Marketing Campaign</small>
                                                </td>
                                                <td><span class="badge bg-info">Project</span></td>
                                                <td>Jane Smith</td>
                                                <td>RWF 2,800,000</td>
                                                <td>RWF 2,800,000</td>
                                                <td class="text-warning">RWF 0</td>
                                                <td><span class="badge bg-warning">On Track</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>CC-003</strong>
                                                    <br><small class="text-muted">IT Infrastructure</small>
                                                </td>
                                                <td><span class="badge bg-primary">Department</span></td>
                                                <td>Mike Johnson</td>
                                                <td>RWF 2,200,000</td>
                                                <td>RWF 2,400,000</td>
                                                <td class="text-danger">-RWF 200,000</td>
                                                <td><span class="badge bg-danger">Over Budget</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>CC-004</strong>
                                                    <br><small class="text-muted">Product Development</small>
                                                </td>
                                                <td><span class="badge bg-info">Project</span></td>
                                                <td>Sarah Wilson</td>
                                                <td>RWF 1,800,000</td>
                                                <td>RWF 1,200,000</td>
                                                <td class="text-success">RWF 600,000</td>
                                                <td><span class="badge bg-success">Under Budget</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>CC-005</strong>
                                                    <br><small class="text-muted">Human Resources</small>
                                                </td>
                                                <td><span class="badge bg-primary">Department</span></td>
                                                <td>David Brown</td>
                                                <td>RWF 1,200,000</td>
                                                <td>RWF 900,000</td>
                                                <td class="text-success">RWF 300,000</td>
                                                <td><span class="badge bg-success">Under Budget</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>CC-006</strong>
                                                    <br><small class="text-muted">Customer Support</small>
                                                </td>
                                                <td><span class="badge bg-primary">Department</span></td>
                                                <td>Lisa Davis</td>
                                                <td>RWF 1,000,000</td>
                                                <td>RWF 800,000</td>
                                                <td class="text-success">RWF 200,000</td>
                                                <td><span class="badge bg-warning">On Track</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
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

<!-- Add Cost Center Modal -->
<div class="modal fade" id="addCostCenterModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Cost Center</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Cost Center Name</label>
                        <input type="text" class="form-control" placeholder="Enter cost center name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cost Center Code</label>
                        <input type="text" class="form-control" placeholder="Enter cost center code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select">
                            <option>Department</option>
                            <option>Project</option>
                            <option>Product</option>
                            <option>Service</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Manager</label>
                        <select class="form-select">
                            <option>Select Manager</option>
                            <option>John Doe</option>
                            <option>Jane Smith</option>
                            <option>Mike Johnson</option>
                            <option>Sarah Wilson</option>
                            <option>David Brown</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Annual Budget (RWF)</label>
                        <input type="number" class="form-control" placeholder="Enter annual budget">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Cost center description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent Cost Center</label>
                        <select class="form-select">
                            <option>None (Top Level)</option>
                            <option>Operations Department</option>
                            <option>IT Infrastructure</option>
                            <option>Marketing Campaign</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Cost Center</button>
            </div>
        </div>
    </div>
</div>

<style>
.budget-status {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.status-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem;
    background: var(--light-color);
    border-radius: 8px;
}

.status-label {
    font-weight: 500;
    color: var(--text-color);
}

.status-value {
    font-weight: 600;
    font-size: 1.1rem;
}
</style>

<?php include 'includes/footer.php'; ?>
