<?php
$page_title = 'Assets';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Assets</h1>
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
                            <a class="nav-link active" href="assets.php">
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
                            <h2>Asset Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssetModal">
                                <i class="fas fa-plus me-2"></i>Add Asset
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Asset Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">11</h3>
                                <p class="stat-label">Total Assets</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 45,200,000</h3>
                                <p class="stat-label">Total Value</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 8,500,000</h3>
                                <p class="stat-label">Depreciation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-network-wired"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 36,700,000</h3>
                                <p class="stat-label">Net Book Value</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Asset Categories Chart -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-3">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5>Asset Depreciation Trends</h5>
                                <div class="chart-actions">
                                    <select class="form-select form-select-sm">
                                        <option>Last 12 Months</option>
                                        <option>Last 3 Years</option>
                                        <option>Last 5 Years</option>
                                    </select>
                                </div>
                            </div>
                            <div class="chart-body">
                                <div class="chart-placeholder">
                                    <i class="fas fa-chart-line"></i>
                                    <p>Asset Depreciation Chart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h5>Asset Categories</h5>
                            </div>
                            <div class="chart-body">
                                <div class="asset-categories">
                                    <div class="category-item">
                                        <span class="category-label">Equipment</span>
                                        <span class="category-value">45%</span>
                                    </div>
                                    <div class="category-item">
                                        <span class="category-label">Vehicles</span>
                                        <span class="category-value">25%</span>
                                    </div>
                                    <div class="category-item">
                                        <span class="category-label">Buildings</span>
                                        <span class="category-value">20%</span>
                                    </div>
                                    <div class="category-item">
                                        <span class="category-label">Software</span>
                                        <span class="category-value">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Assets Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Asset Inventory</h5>
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
                                                <th>Asset ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Purchase Date</th>
                                                <th>Purchase Price</th>
                                                <th>Current Value</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>AST-001</strong>
                                                    <br><small class="text-muted">Office Building</small>
                                                </td>
                                                <td>Main Office Complex</td>
                                                <td><span class="badge bg-primary">Building</span></td>
                                                <td>2020-03-15</td>
                                                <td>RWF 25,000,000</td>
                                                <td>RWF 22,500,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>AST-002</strong>
                                                    <br><small class="text-muted">Company Vehicle</small>
                                                </td>
                                                <td>Toyota Hilux 4x4</td>
                                                <td><span class="badge bg-info">Vehicle</span></td>
                                                <td>2021-06-20</td>
                                                <td>RWF 8,500,000</td>
                                                <td>RWF 5,100,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>AST-003</strong>
                                                    <br><small class="text-muted">IT Equipment</small>
                                                </td>
                                                <td>Server Infrastructure</td>
                                                <td><span class="badge bg-warning">Equipment</span></td>
                                                <td>2022-01-10</td>
                                                <td>RWF 3,200,000</td>
                                                <td>RWF 1,920,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>AST-004</strong>
                                                    <br><small class="text-muted">Software License</small>
                                                </td>
                                                <td>ERP System License</td>
                                                <td><span class="badge bg-secondary">Software</span></td>
                                                <td>2022-08-05</td>
                                                <td>RWF 2,800,000</td>
                                                <td>RWF 1,400,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>AST-005</strong>
                                                    <br><small class="text-muted">Office Equipment</small>
                                                </td>
                                                <td>Furniture & Fixtures</td>
                                                <td><span class="badge bg-warning">Equipment</span></td>
                                                <td>2021-12-01</td>
                                                <td>RWF 1,500,000</td>
                                                <td>RWF 1,050,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
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

<!-- Add Asset Modal -->
<div class="modal fade" id="addAssetModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Asset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Asset Name</label>
                            <input type="text" class="form-control" placeholder="Enter asset name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Asset Category</label>
                            <select class="form-select">
                                <option>Equipment</option>
                                <option>Vehicle</option>
                                <option>Building</option>
                                <option>Software</option>
                                <option>Land</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Purchase Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Purchase Price (RWF)</label>
                            <input type="number" class="form-control" placeholder="Enter purchase price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Expected Life (Years)</label>
                            <input type="number" class="form-control" placeholder="Enter expected life">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Depreciation Method</label>
                            <select class="form-select">
                                <option>Straight Line</option>
                                <option>Declining Balance</option>
                                <option>Units of Production</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" placeholder="Enter asset location">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Responsible Person</label>
                            <select class="form-select">
                                <option>Select Employee</option>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Mike Johnson</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Asset description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asset Image</label>
                        <input type="file" class="form-control" accept="image/*">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Asset</button>
            </div>
        </div>
    </div>
</div>

<style>
.asset-categories {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem;
    background: var(--light-color);
    border-radius: 8px;
}

.category-label {
    font-weight: 500;
    color: var(--text-color);
}

.category-value {
    font-weight: 600;
    color: var(--primary-color);
}
</style>

<?php include 'includes/footer.php'; ?>
