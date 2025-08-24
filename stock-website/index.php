<?php
$page_title = 'Overview';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <!-- Left Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Navigation</h5>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Overview</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="stock-items.php">
                        <i class="fas fa-boxes"></i>
                        <span>Stock Items</span>
                        <span class="item-counter">150</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventory-count.php">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Inventory Count</span>
                        <span class="item-counter">3</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="stock-in.php">
                        <i class="fas fa-arrow-down"></i>
                        <span>Stock In</span>
                        <span class="item-counter">25</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stock-out.php">
                        <i class="fas fa-arrow-up"></i>
                        <span>Stock Out</span>
                        <span class="item-counter">18</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transfers.php">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Transfers</span>
                        <span class="item-counter">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="returns.php">
                        <i class="fas fa-undo"></i>
                        <span>Returns</span>
                        <span class="item-counter">5</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="stock-movements.php">
                        <i class="fas fa-chart-line"></i>
                        <span>Stock Movements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alerts.php">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Alerts</span>
                        <span class="item-counter">8</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="settings.php">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
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
                    <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isStockManager() ? 'Stock Manager' : 'User'); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Dashboard Content -->
    <div class="dashboard-content">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Stock Dashboard</h2>
                        <p class="text-muted mb-0">Welcome back! Here's what's happening with your inventory today.</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportDashboard()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickActionModal">
                            <i class="fas fa-plus me-2"></i>Quick Action
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">150</h3>
                        <p class="stat-label">Total Stock Items</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">25</h3>
                        <p class="stat-label">Stock In Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Low Stock Alerts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">RWF 2.5M</h3>
                        <p class="stat-label">Total Stock Value</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions and Recent Activity -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Stock Movements</h5>
                        <span class="text-muted">Latest inventory activities</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Reference</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="stock-item-icon bg-primary me-3">
                                                    <i class="fas fa-laptop"></i>
                                                </div>
                                                <div>
                                                    <strong>Laptop Dell XPS 13</strong>
                                                    <br><small class="text-muted">SKU-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">Stock In</span></td>
                                        <td>+5</td>
                                        <td>PO-2024-001</td>
                                        <td>2 hours ago</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="stock-item-icon bg-warning me-3">
                                                    <i class="fas fa-print"></i>
                                                </div>
                                                <div>
                                                    <strong>HP LaserJet Printer</strong>
                                                    <br><small class="text-muted">SKU-002</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">Stock Out</span></td>
                                        <td>-2</td>
                                        <td>REQ-2024-015</td>
                                        <td>4 hours ago</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="stock-item-icon bg-info me-3">
                                                    <i class="fas fa-mouse"></i>
                                                </div>
                                                <div>
                                                    <strong>Wireless Mouse</strong>
                                                    <br><small class="text-muted">SKU-003</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-info">Transfer</span></td>
                                        <td>10</td>
                                        <td>TRF-2024-008</td>
                                        <td>6 hours ago</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quick Actions</h5>
                        <span class="text-muted">Common tasks</span>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="stock-in.php" class="btn btn-outline-success">
                                <i class="fas fa-arrow-down me-2"></i>Record Stock In
                            </a>
                            <a href="stock-out.php" class="btn btn-outline-danger">
                                <i class="fas fa-arrow-up me-2"></i>Issue Stock Out
                            </a>
                            <a href="transfers.php" class="btn btn-outline-info">
                                <i class="fas fa-exchange-alt me-2"></i>Transfer Stock
                            </a>
                            <a href="stock-items.php" class="btn btn-outline-primary">
                                <i class="fas fa-plus me-2"></i>Add New Item
                            </a>
                            <a href="inventory-count.php" class="btn btn-outline-warning">
                                <i class="fas fa-clipboard-check me-2"></i>Start Count
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock Alerts and Category Overview -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Low Stock Alerts</h5>
                        <span class="text-muted">Items needing attention</span>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning mb-3">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>8 items</strong> are below reorder level
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="stock-item-icon bg-danger me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                                    <i class="fas fa-box"></i>
                                                </div>
                                                <div>
                                                    <strong>Paper A4</strong>
                                                    <br><small class="text-muted">Quantity: 5</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">Critical</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Reorder</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="stock-item-icon bg-warning me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                                    <i class="fas fa-pen"></i>
                                                </div>
                                                <div>
                                                    <strong>Blue Pens</strong>
                                                    <br><small class="text-muted">Quantity: 8</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">Low</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Reorder</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Category Overview</h5>
                        <span class="text-muted">Stock distribution</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="text-center">
                                    <div class="h4 text-primary mb-1">45</div>
                                    <small class="text-muted">Electronics</small>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="text-center">
                                    <div class="h4 text-success mb-1">32</div>
                                    <small class="text-muted">Office Supplies</small>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="text-center">
                                    <div class="h4 text-warning mb-1">28</div>
                                    <small class="text-muted">Furniture</small>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="text-center">
                                    <div class="h4 text-info mb-1">25</div>
                                    <small class="text-muted">IT Equipment</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="stock-items.php" class="btn btn-outline-primary btn-sm w-100">
                                View All Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Action Modal -->
<div class="modal fade" id="quickActionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quick Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success" onclick="quickStockIn()">
                        <i class="fas fa-arrow-down me-2"></i>Quick Stock In
                    </button>
                    <button class="btn btn-outline-danger" onclick="quickStockOut()">
                        <i class="fas fa-arrow-up me-2"></i>Quick Stock Out
                    </button>
                    <button class="btn btn-outline-info" onclick="quickTransfer()">
                        <i class="fas fa-exchange-alt me-2"></i>Quick Transfer
                    </button>
                    <button class="btn btn-outline-warning" onclick="quickCount()">
                        <i class="fas fa-clipboard-check me-2"></i>Quick Count
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
// Export dashboard data
function exportDashboard() {
    alert('Dashboard export functionality would be implemented here');
}

// Quick action functions
function quickStockIn() {
    window.location.href = 'stock-in.php';
}

function quickStockOut() {
    window.location.href = 'stock-out.php';
}

function quickTransfer() {
    window.location.href = 'transfers.php';
}

function quickCount() {
    window.location.href = 'inventory-count.php';
}
</script>

<?php include 'includes/footer.php'; ?>
