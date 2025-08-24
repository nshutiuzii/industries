<?php
$page_title = 'Settings';
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
                    <a class="nav-link" href="reports.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link active" href="settings.php">
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
                        <h2>System Settings</h2>
                        <p class="text-muted mb-0">Configure stock management system preferences</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportSettings()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" onclick="saveAllSettings()">
                            <i class="fas fa-save me-2"></i>Save All
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Stock Management Settings</h5>
                        <span class="text-muted">Configure stock thresholds and alerts</span>
                    </div>
                    <div class="card-body">
                        <form id="stockSettingsForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="lowStockThreshold" class="form-label">Low Stock Threshold (%)</label>
                                    <input type="number" class="form-control" id="lowStockThreshold" name="low_stock_threshold" value="20" min="1" max="100">
                                    <small class="text-muted">Percentage of stock level to trigger low stock alerts</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="criticalStockThreshold" class="form-label">Critical Stock Threshold (%)</label>
                                    <input type="number" class="form-control" id="criticalStockThreshold" name="critical_stock_threshold" value="10" min="1" max="100">
                                    <small class="text-muted">Percentage of stock level to trigger critical alerts</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="defaultCurrency" class="form-label">Default Currency</label>
                                    <select class="form-select" id="defaultCurrency" name="default_currency">
                                        <option value="RWF" selected>Rwandan Franc (RWF)</option>
                                        <option value="USD">US Dollar (USD)</option>
                                        <option value="EUR">Euro (EUR)</option>
                                        <option value="GBP">British Pound (GBP)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="defaultLocation" class="form-label">Default Location</label>
                                    <select class="form-select" id="defaultLocation" name="default_location">
                                        <option value="main-warehouse" selected>Main Warehouse</option>
                                        <option value="office-storage">Office Storage</option>
                                        <option value="branch-warehouse">Branch Warehouse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="autoReorder" class="form-label">Auto Reorder Settings</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableAutoReorder" name="enable_auto_reorder">
                                    <label class="form-check-label" for="enableAutoReorder">
                                        Enable automatic reorder suggestions
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" name="email_notifications">
                                    <label class="form-check-label" for="emailNotifications">
                                        Send email notifications for low stock
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>User Preferences</h5>
                        <span class="text-muted">Personal system preferences</span>
                    </div>
                    <div class="card-body">
                        <form id="userPreferencesForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="itemsPerPage" class="form-label">Items Per Page</label>
                                    <select class="form-select" id="itemsPerPage" name="items_per_page">
                                        <option value="10">10</option>
                                        <option value="25" selected>25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dateFormat" class="form-label">Date Format</label>
                                    <select class="form-select" id="dateFormat" name="date_format">
                                        <option value="Y-m-d" selected>YYYY-MM-DD</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                        <option value="d-m-Y">DD-MM-YYYY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select" id="timezone" name="timezone">
                                    <option value="Africa/Kigali" selected>Africa/Kigali (GMT+2)</option>
                                    <option value="UTC">UTC (GMT+0)</option>
                                    <option value="America/New_York">America/New_York (GMT-5)</option>
                                    <option value="Europe/London">Europe/London (GMT+0)</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>System Information</h5>
                        <span class="text-muted">Current system status</span>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between">
                                <span>System Version</span>
                                <strong>v2.1.0</strong>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span>Database</span>
                                <strong>MySQL 8.0</strong>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span>PHP Version</span>
                                <strong>8.1+</strong>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span>Last Backup</span>
                                <strong>Dec 16, 2024</strong>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span>System Status</span>
                                <span class="badge bg-success">Online</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quick Actions</h5>
                        <span class="text-muted">System maintenance</span>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="backupDatabase()">
                                <i class="fas fa-database me-2"></i>Backup Database
                            </button>
                            <button class="btn btn-outline-warning" onclick="clearCache()">
                                <i class="fas fa-broom me-2"></i>Clear Cache
                            </button>
                            <button class="btn btn-outline-info" onclick="systemLogs()">
                                <i class="fas fa-file-alt me-2"></i>View Logs
                            </button>
                            <button class="btn btn-outline-danger" onclick="resetSettings()">
                                <i class="fas fa-undo me-2"></i>Reset to Default
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function saveAllSettings() {
    alert('All settings saved successfully!');
}

function exportSettings() {
    alert('Settings exported successfully!');
}

function backupDatabase() {
    alert('Database backup initiated...');
}

function clearCache() {
    alert('Cache cleared successfully!');
}

function systemLogs() {
    alert('Opening system logs...');
}

function resetSettings() {
    if (confirm('Are you sure you want to reset all settings to default? This action cannot be undone.')) {
        alert('Settings reset to default successfully!');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
