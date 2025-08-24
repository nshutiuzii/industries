<?php
$page_title = 'Alerts';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<div class="dashboard-container">
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Navigation</h5>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
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
                    <a class="nav-link active" href="alerts.php">
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
    
    <div class="dashboard-content">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Stock Alerts</h2>
                        <p class="text-muted mb-0">Monitor low stock, expired items, and system alerts</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportAlerts()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" onclick="acknowledgeAll()">
                            <i class="fas fa-check me-2"></i>Acknowledge All
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Active Alerts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">5</h3>
                        <p class="stat-label">Low Stock Items</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">3</h3>
                        <p class="stat-label">Expiring Soon</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">15</h3>
                        <p class="stat-label">Resolved Today</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <h5>Active Alerts</h5>
                <span class="text-muted">Requires immediate attention</span>
            </div>
            <div class="card-body">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <div>
                        <strong>Critical Stock Alert:</strong> Laptop Dell XPS 13 (SKU-001) is below critical stock level. Current stock: 2, Reorder level: 10
                    </div>
                    <button class="btn btn-sm btn-outline-danger ms-auto" onclick="acknowledgeAlert(1)">Acknowledge</button>
                </div>
                
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <div>
                        <strong>Low Stock Warning:</strong> HP LaserJet Printer (SKU-002) stock is running low. Current stock: 8, Reorder level: 5
                    </div>
                    <button class="btn btn-sm btn-outline-warning ms-auto" onclick="acknowledgeAlert(2)">Acknowledge</button>
                </div>
                
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="fas fa-calendar-times me-2"></i>
                    <div>
                        <strong>Expiry Alert:</strong> Blue Pens (SKU-004) will expire in 7 days. Quantity: 15 packs
                    </div>
                    <button class="btn btn-sm btn-outline-info ms-auto" onclick="acknowledgeAlert(3)">Acknowledge</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function exportAlerts() {
    alert('Export alerts functionality would be implemented here');
}

function acknowledgeAll() {
    alert('All alerts acknowledged successfully!');
}

function acknowledgeAlert(alertId) {
    alert('Alert ' + alertId + ' acknowledged successfully!');
}
</script>

<?php include 'includes/footer.php'; ?>
