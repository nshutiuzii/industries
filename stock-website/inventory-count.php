<?php
$page_title = 'Inventory Count';
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
                    <a class="nav-link active" href="inventory-count.php">
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
                        <h2>Inventory Count Management</h2>
                        <p class="text-muted mb-0">Audit and count stock levels for accurate inventory records</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportCounts()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCountModal">
                            <i class="fas fa-plus me-2"></i>New Count
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Count Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">3</h3>
                        <p class="stat-label">Active Counts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">12</h3>
                        <p class="stat-label">Completed This Month</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">5</h3>
                        <p class="stat-label">Pending Approval</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">98.5%</h3>
                        <p class="stat-label">Accuracy Rate</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Counts -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Active Inventory Counts</h5>
                <span class="text-muted">Currently in progress</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Count ID</th>
                                <th>Location</th>
                                <th>Started By</th>
                                <th>Start Date</th>
                                <th>Items Counted</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#IC-2024-001</strong></td>
                                <td>Main Warehouse</td>
                                <td>John Doe</td>
                                <td>Dec 15, 2024</td>
                                <td>45/150</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                    </div>
                                    <small class="text-muted">30%</small>
                                </td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="continueCount('IC-2024-001')">
                                        <i class="fas fa-play me-1"></i>Continue
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#IC-2024-002</strong></td>
                                <td>Office Storage</td>
                                <td>Jane Smith</td>
                                <td>Dec 16, 2024</td>
                                <td>78/120</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" style="width: 65%"></div>
                                    </div>
                                    <small class="text-muted">65%</small>
                                </td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="continueCount('IC-2024-002')">
                                        <i class="fas fa-play me-1"></i>Continue
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#IC-2024-003</strong></td>
                                <td>Branch Warehouse</td>
                                <td>Mike Johnson</td>
                                <td>Dec 17, 2024</td>
                                <td>12/85</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" style="width: 14%"></div>
                                    </div>
                                    <small class="text-muted">14%</small>
                                </td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="continueCount('IC-2024-003')">
                                        <i class="fas fa-play me-1"></i>Continue
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Completed Counts -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Completed Counts</h5>
                <span class="text-muted">Last 10 completed counts</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Count ID</th>
                                <th>Location</th>
                                <th>Completed By</th>
                                <th>Completion Date</th>
                                <th>Total Items</th>
                                <th>Variance</th>
                                <th>Accuracy</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#IC-2024-000</strong></td>
                                <td>Main Warehouse</td>
                                <td>John Doe</td>
                                <td>Dec 14, 2024</td>
                                <td>150</td>
                                <td class="text-success">+2</td>
                                <td>98.7%</td>
                                <td><span class="badge bg-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td><strong>#IC-2024-001</strong></td>
                                <td>Office Storage</td>
                                <td>Jane Smith</td>
                                <td>Dec 13, 2024</td>
                                <td>120</td>
                                <td class="text-danger">-1</td>
                                <td>99.2%</td>
                                <td><span class="badge bg-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td><strong>#IC-2024-002</strong></td>
                                <td>Branch Warehouse</td>
                                <td>Mike Johnson</td>
                                <td>Dec 12, 2024</td>
                                <td>85</td>
                                <td class="text-success">+0</td>
                                <td>100%</td>
                                <td><span class="badge bg-success">Approved</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Count Modal -->
<div class="modal fade" id="newCountModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Start New Inventory Count</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newCountForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="countLocation" class="form-label">Location *</label>
                            <select class="form-select" id="countLocation" name="location_id" required>
                                <option value="">Select Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countDate" class="form-label">Count Date *</label>
                            <input type="date" class="form-control" id="countDate" name="count_date" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="countNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="countNotes" name="notes" rows="3" placeholder="Any special instructions or notes for this count..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Count Options</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeInactive" name="include_inactive">
                            <label class="form-check-label" for="includeInactive">
                                Include inactive/discontinued items
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeZeroStock" name="include_zero_stock">
                            <label class="form-check-label" for="includeZeroStock">
                                Include items with zero stock
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="randomSampling" name="random_sampling">
                            <label class="form-check-label" for="randomSampling">
                                Use random sampling for large inventories
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="startNewCount()">
                    <i class="fas fa-play me-2"></i>Start Count
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default date to today
document.getElementById('countDate').valueAsDate = new Date();

// Inventory count functions
function continueCount(countId) {
    alert('Continue count ' + countId + ' functionality would be implemented here');
}

function exportCounts() {
    alert('Export counts functionality would be implemented here');
}

function startNewCount() {
    const form = document.getElementById('newCountForm');
    if (form.checkValidity()) {
        alert('New inventory count started successfully!');
        form.reset();
        document.getElementById('countDate').valueAsDate = new Date();
        const modal = bootstrap.Modal.getInstance(document.getElementById('newCountModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}
</script>

<?php include 'includes/footer.php'; ?>
