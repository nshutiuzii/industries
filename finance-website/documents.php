<?php
$page_title = 'Documents';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Documents</h1>
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
                            <a class="nav-link active" href="documents.php">
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
                            <h2>Document Management</h2>
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">Upload Files</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                                    <i class="fas fa-folder-plus me-2"></i>New Folder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Document Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">25</h3>
                                <p class="stat-label">Total Documents</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-folder"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
                                <p class="stat-label">Folders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-download"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">156 MB</h3>
                                <p class="stat-label">Total Size</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">12</h3>
                                <p class="stat-label">Recent Uploads</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Document Search and Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Search documents...">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <select class="form-select">
                                            <option>All Categories</option>
                                            <option>Financial Reports</option>
                                            <option>Invoices</option>
                                            <option>Contracts</option>
                                            <option>Receipts</option>
                                            <option>Policies</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <select class="form-select">
                                            <option>All Types</option>
                                            <option>PDF</option>
                                            <option>Excel</option>
                                            <option>Word</option>
                                            <option>Image</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <button class="btn btn-outline-secondary w-100">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Document Grid -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Documents</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Export List</button>
                                    <button class="btn btn-sm btn-outline-secondary">Bulk Actions</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="document-grid">
                                    <!-- Document Item 1 -->
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="document-info">
                                            <h6>Q4 Financial Report 2023</h6>
                                            <p class="text-muted">Financial Reports</p>
                                            <small class="text-muted">2.5 MB • Updated 2 days ago</small>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Document Item 2 -->
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        <div class="document-info">
                                            <h6>Budget Analysis 2024</h6>
                                            <p class="text-muted">Financial Reports</p>
                                            <small class="text-muted">1.8 MB • Updated 1 week ago</small>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Document Item 3 -->
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </div>
                                        <div class="document-info">
                                            <h6>Invoice INV-2024-015</h6>
                                            <p class="text-muted">Invoices</p>
                                            <small class="text-muted">450 KB • Updated 3 days ago</small>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Document Item 4 -->
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-file-contract"></i>
                                        </div>
                                        <div class="document-info">
                                            <h6>Service Agreement - ABC Corp</h6>
                                            <p class="text-muted">Contracts</p>
                                            <small class="text-muted">3.2 MB • Updated 1 month ago</small>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Document Item 5 -->
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-receipt"></i>
                                        </div>
                                        <div class="document-info">
                                            <h6>Office Supplies Receipt</h6>
                                            <p class="text-muted">Receipts</p>
                                            <small class="text-muted">280 KB • Updated 5 days ago</small>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Document Item 6 -->
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-file-word"></i>
                                        </div>
                                        <div class="document-info">
                                            <h6>Company Policy Handbook</h6>
                                            <p class="text-muted">Policies</p>
                                            <small class="text-muted">1.5 MB • Updated 2 months ago</small>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Download">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
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

<!-- Create Folder Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Folder Name</label>
                        <input type="text" class="form-control" placeholder="Enter folder name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Financial Reports</option>
                            <option>Invoices</option>
                            <option>Contracts</option>
                            <option>Receipts</option>
                            <option>Policies</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent Folder</label>
                        <select class="form-select">
                            <option>Root (No Parent)</option>
                            <option>Financial Reports</option>
                            <option>Invoices</option>
                            <option>Contracts</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Folder description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Access Permissions</label>
                        <select class="form-select">
                            <option>All Users</option>
                            <option>Finance Team Only</option>
                            <option>Managers Only</option>
                            <option>Administrators Only</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Folder</button>
            </div>
        </div>
    </div>
</div>

<style>
.document-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.document-item {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.document-item:hover {
    box-shadow: var(--shadow);
    transform: translateY(-2px);
}

.document-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.document-icon .fa-file-pdf {
    background: #dc3545;
}

.document-icon .fa-file-excel {
    background: #198754;
}

.document-icon .fa-file-invoice {
    background: #0d6efd;
}

.document-icon .fa-file-contract {
    background: #6f42c1;
}

.document-icon .fa-receipt {
    background: #fd7e14;
}

.document-icon .fa-file-word {
    background: #0d6efd;
}

.document-info {
    flex: 1;
    min-width: 0;
}

.document-info h6 {
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-color);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.document-info p {
    margin: 0 0 0.25rem 0;
    font-size: 0.9rem;
    color: var(--primary-color);
}

.document-info small {
    font-size: 0.8rem;
}

.document-actions {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    flex-shrink: 0;
}

.document-actions .btn {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 768px) {
    .document-grid {
        grid-template-columns: 1fr;
    }
    
    .document-item {
        flex-direction: column;
        text-align: center;
    }
    
    .document-actions {
        flex-direction: row;
        justify-content: center;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
