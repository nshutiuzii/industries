<?php
$page_title = 'Accounts';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Accounts</h1>
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
                            <a class="nav-link active" href="accounts.php">
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
                            <h2>Account Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAccountModal">
                                <i class="fas fa-plus me-2"></i>Add Account
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Account Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">3</h3>
                                <p class="stat-label">Total Accounts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 25,000,000</h3>
                                <p class="stat-label">Total Balance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 8,500,000</h3>
                                <p class="stat-label">Monthly Inflow</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 3,200,000</h3>
                                <p class="stat-label">Monthly Outflow</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Account Cards -->
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="account-card">
                            <div class="account-header">
                                <div class="account-icon bg-primary">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div class="account-info">
                                    <h5>Main Business Account</h5>
                                    <small class="text-muted">Bank of Kigali</small>
                                </div>
                                <div class="account-status">
                                    <span class="badge bg-success">Active</span>
                                </div>
                            </div>
                            <div class="account-body">
                                <div class="account-balance">
                                    <h3 class="text-success">RWF 18,500,000</h3>
                                    <p class="text-muted">Available Balance</p>
                                </div>
                                <div class="account-details">
                                    <div class="detail-item">
                                        <span>Account Number:</span>
                                        <strong>1234567890</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Currency:</span>
                                        <strong>RWF</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Last Updated:</span>
                                        <strong>2024-01-15</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="account-footer">
                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                                <button class="btn btn-sm btn-outline-secondary">Transfer</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="account-card">
                            <div class="account-header">
                                <div class="account-icon bg-success">
                                    <i class="fas fa-piggy-bank"></i>
                                </div>
                                <div class="account-info">
                                    <h5>Savings Account</h5>
                                    <small class="text-muted">Equity Bank</small>
                                </div>
                                <div class="account-status">
                                    <span class="badge bg-success">Active</span>
                                </div>
                            </div>
                            <div class="account-body">
                                <div class="account-balance">
                                    <h3 class="text-success">RWF 5,200,000</h3>
                                    <p class="text-muted">Available Balance</p>
                                </div>
                                <div class="account-details">
                                    <div class="detail-item">
                                        <span>Account Number:</span>
                                        <strong>9876543210</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Currency:</span>
                                        <strong>RWF</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Last Updated:</span>
                                        <strong>2024-01-15</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="account-footer">
                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                                <button class="btn btn-sm btn-outline-secondary">Transfer</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="account-card">
                            <div class="account-header">
                                <div class="account-icon bg-warning">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="account-info">
                                    <h5>Petty Cash</h5>
                                    <small class="text-muted">Cash Account</small>
                                </div>
                                <div class="account-status">
                                    <span class="badge bg-success">Active</span>
                                </div>
                            </div>
                            <div class="account-body">
                                <div class="account-balance">
                                    <h3 class="text-success">RWF 1,300,000</h3>
                                    <p class="text-muted">Available Balance</p>
                                </div>
                                <div class="account-details">
                                    <div class="detail-item">
                                        <span>Account Type:</span>
                                        <strong>Cash</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Currency:</span>
                                        <strong>RWF</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Last Updated:</span>
                                        <strong>2024-01-15</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="account-footer">
                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                                <button class="btn btn-sm btn-outline-secondary">Reconcile</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Account Transactions -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Recent Account Transactions</h5>
                                <a href="transactions.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Account</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2024-01-15</td>
                                                <td>Main Business Account</td>
                                                <td>Client Payment - ABC Corp</td>
                                                <td><span class="badge bg-success">Credit</span></td>
                                                <td class="text-success">+RWF 2,500,000</td>
                                                <td>RWF 18,500,000</td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-15</td>
                                                <td>Main Business Account</td>
                                                <td>Office Supplies Purchase</td>
                                                <td><span class="badge bg-danger">Debit</span></td>
                                                <td class="text-danger">-RWF 150,000</td>
                                                <td>RWF 18,350,000</td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-14</td>
                                                <td>Main Business Account</td>
                                                <td>Consulting Fee - XYZ Ltd</td>
                                                <td><span class="badge bg-success">Credit</span></td>
                                                <td class="text-success">+RWF 1,800,000</td>
                                                <td>RWF 18,500,000</td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-14</td>
                                                <td>Main Business Account</td>
                                                <td>Marketing Campaign</td>
                                                <td><span class="badge bg-danger">Debit</span></td>
                                                <td class="text-danger">-RWF 800,000</td>
                                                <td>RWF 16,700,000</td>
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

<!-- Add Account Modal -->
<div class="modal fade" id="addAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Account Name</label>
                        <input type="text" class="form-control" placeholder="Enter account name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Account Type</label>
                        <select class="form-select">
                            <option>Bank Account</option>
                            <option>Cash Account</option>
                            <option>Credit Card</option>
                            <option>Investment Account</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bank/Institution</label>
                        <input type="text" class="form-control" placeholder="Enter bank or institution name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-control" placeholder="Enter account number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Currency</label>
                        <select class="form-select">
                            <option>RWF (Rwandan Franc)</option>
                            <option>USD (US Dollar)</option>
                            <option>EUR (Euro)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Initial Balance</label>
                        <input type="number" class="form-control" placeholder="Enter initial balance">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Account description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Account</button>
            </div>
        </div>
    </div>
</div>

<style>
.account-card {
    background: white;
    border-radius: 16px;
    box-shadow: var(--shadow);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: all 0.3s ease;
}

.account-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.account-header {
    padding: 1.5rem;
    background: var(--light-color);
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.account-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.account-info {
    flex: 1;
}

.account-info h5 {
    margin: 0 0 0.25rem 0;
    font-size: 1.1rem;
}

.account-body {
    padding: 1.5rem;
}

.account-balance {
    text-align: center;
    margin-bottom: 1.5rem;
}

.account-balance h3 {
    margin: 0 0 0.5rem 0;
    font-size: 1.5rem;
}

.account-details {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--border-color);
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item span {
    color: var(--text-muted);
    font-size: 0.9rem;
}

.account-footer {
    padding: 1rem 1.5rem;
    background: var(--light-color);
    border-top: 1px solid var(--border-color);
    display: flex;
    gap: 0.5rem;
}
</style>

<?php include 'includes/footer.php'; ?>
