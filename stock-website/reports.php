<?php
$page_title = 'Reports';
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
                    <a class="nav-link" href="alerts.php">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Alerts</span>
                        <span class="item-counter">8</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="reports.php">
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
                        <h2>Stock Reports & Analytics</h2>
                        <p class="text-muted mb-0">Generate comprehensive stock reports and insights</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="generateReport()">
                            <i class="fas fa-plus me-2"></i>Generate Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">12</h3>
                        <p class="stat-label">Report Types</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">45</h3>
                        <p class="stat-label">Generated Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Scheduled Reports</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-download"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">156</h3>
                        <p class="stat-label">Downloads</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quick Reports</h5>
                        <span class="text-muted">Most commonly used reports</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-boxes fa-2x text-primary mb-3"></i>
                                        <h6>Inventory Summary</h6>
                                        <p class="text-muted small">Complete stock overview with values</p>
                                        <button class="btn btn-sm btn-primary" onclick="generateInventoryReport()">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-arrow-down fa-2x text-success mb-3"></i>
                                        <h6>Stock In Report</h6>
                                        <p class="text-muted small">Incoming stock analysis</p>
                                        <button class="btn btn-sm btn-success" onclick="generateStockInReport()">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-arrow-up fa-2x text-danger mb-3"></i>
                                        <h6>Stock Out Report</h6>
                                        <p class="text-muted small">Outgoing stock analysis</p>
                                        <button class="btn btn-sm btn-danger" onclick="generateStockOutReport()">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-exclamation-triangle fa-2x text-warning mb-3"></i>
                                        <h6>Low Stock Alert</h6>
                                        <p class="text-muted small">Items requiring reorder</p>
                                        <button class="btn btn-sm btn-warning" onclick="generateLowStockReport()">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Reports</h5>
                        <span class="text-muted">Last 5 generated</span>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Inventory Summary</h6>
                                    <small class="text-muted">Dec 17, 2024 - 14:30</small>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="downloadReport('inv-summary-001')">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Low Stock Alert</h6>
                                    <small class="text-muted">Dec 17, 2024 - 12:15</small>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="downloadReport('low-stock-001')">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Stock Movement</h6>
                                    <small class="text-muted">Dec 17, 2024 - 10:45</small>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="downloadReport('movement-001')">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function generateReport() {
    alert('Report generation functionality would be implemented here');
}

function generateInventoryReport() {
    alert('Generating Inventory Summary Report...');
}

function generateStockInReport() {
    alert('Generating Stock In Report...');
}

function generateStockOutReport() {
    alert('Generating Stock Out Report...');
}

function generateLowStockReport() {
    alert('Generating Low Stock Alert Report...');
}

function downloadReport(reportId) {
    alert('Downloading report ' + reportId + '...');
}
</script>

<?php include 'includes/footer.php'; ?>
