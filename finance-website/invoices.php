<?php
$page_title = 'Invoices';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Invoices</h1>
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
                            <a class="nav-link active" href="invoices.php">
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
                            <h2>Invoice Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">
                                <i class="fas fa-plus me-2"></i>Create Invoice
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Invoice Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">18</h3>
                                <p class="stat-label">Total Invoices</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 12,500,000</h3>
                                <p class="stat-label">Total Billed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 3,200,000</h3>
                                <p class="stat-label">Pending Payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">5</h3>
                                <p class="stat-label">Overdue</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Invoice Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select">
                                            <option>All Statuses</option>
                                            <option>Draft</option>
                                            <option>Sent</option>
                                            <option>Paid</option>
                                            <option>Overdue</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Date Range</label>
                                        <select class="form-select">
                                            <option>Last 30 Days</option>
                                            <option>Last 3 Months</option>
                                            <option>Last 6 Months</option>
                                            <option>Last Year</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Client</label>
                                        <select class="form-select">
                                            <option>All Clients</option>
                                            <option>ABC Corp</option>
                                            <option>XYZ Ltd</option>
                                            <option>DEF Inc</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Amount Range</label>
                                        <select class="form-select">
                                            <option>All Amounts</option>
                                            <option>0 - 500,000</option>
                                            <option>500,000 - 1,000,000</option>
                                            <option>1,000,000+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Invoices Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Recent Invoices</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Export</button>
                                    <button class="btn btn-sm btn-outline-secondary">Bulk Actions</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Invoice #</th>
                                                <th>Client</th>
                                                <th>Date</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>INV-2024-001</strong>
                                                    <br><small class="text-muted">Draft</small>
                                                </td>
                                                <td>ABC Corporation</td>
                                                <td>2024-01-15</td>
                                                <td>2024-02-15</td>
                                                <td class="text-success">RWF 2,500,000</td>
                                                <td><span class="badge bg-secondary">Draft</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Send</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>INV-2024-002</strong>
                                                    <br><small class="text-muted">Sent</small>
                                                </td>
                                                <td>XYZ Limited</td>
                                                <td>2024-01-14</td>
                                                <td>2024-02-14</td>
                                                <td class="text-success">RWF 1,800,000</td>
                                                <td><span class="badge bg-info">Sent</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-warning">Remind</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>INV-2024-003</strong>
                                                    <br><small class="text-muted">Paid</small>
                                                </td>
                                                <td>DEF Industries</td>
                                                <td>2024-01-10</td>
                                                <td>2024-02-10</td>
                                                <td class="text-success">RWF 3,200,000</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-info">Download</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>INV-2024-004</strong>
                                                    <br><small class="text-muted">Overdue</small>
                                                </td>
                                                <td>GHI Solutions</td>
                                                <td>2024-01-05</td>
                                                <td>2024-02-05</td>
                                                <td class="text-success">RWF 950,000</td>
                                                <td><span class="badge bg-danger">Overdue</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-warning">Remind</button>
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

<!-- Create Invoice Modal -->
<div class="modal fade" id="createInvoiceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Client</label>
                            <select class="form-select">
                                <option>Select Client</option>
                                <option>ABC Corporation</option>
                                <option>XYZ Limited</option>
                                <option>DEF Industries</option>
                                <option>GHI Solutions</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Invoice Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-select">
                                <option>RWF (Rwandan Franc)</option>
                                <option>USD (US Dollar)</option>
                                <option>EUR (Euro)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Invoice Items</label>
                        <div class="invoice-items">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Description">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" placeholder="Qty">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" placeholder="Rate">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" placeholder="Amount" readonly>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary">Add Item</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" rows="3" placeholder="Additional notes for the client"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save as Draft</button>
                <button type="button" class="btn btn-success">Create & Send</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
