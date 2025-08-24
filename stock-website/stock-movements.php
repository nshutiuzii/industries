<?php
$page_title = 'Stock Movements';
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
                    <a class="nav-link active" href="stock-movements.php">
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
                        <h2>Stock Movements</h2>
                        <p class="text-muted mb-0">Track all stock activities and transactions</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportMovements()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movementFiltersModal">
                            <i class="fas fa-filter me-2"></i>Advanced Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Movement Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">156</h3>
                        <p class="stat-label">Stock In Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">89</h3>
                        <p class="stat-label">Stock Out Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">23</h3>
                        <p class="stat-label">Transfers Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-undo"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">7</h3>
                        <p class="stat-label">Returns Today</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Filters -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="movementSearch" placeholder="Search movements by item, reference, or user...">
                </div>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="movementTypeFilter">
                    <option value="">All Types</option>
                    <option value="stock_in">Stock In</option>
                    <option value="stock_out">Stock Out</option>
                    <option value="transfer">Transfer</option>
                    <option value="return">Return</option>
                    <option value="adjustment">Adjustment</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="movementDateFilter">
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="custom">Custom Range</option>
                </select>
            </div>
        </div>

        <!-- Stock Movements Table -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Stock Movements</h5>
                <span class="text-muted">Latest 50 stock transactions</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Type</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Reference</th>
                                <th>Location</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <strong>Dec 17, 2024</strong><br>
                                        <small class="text-muted">14:30:25</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Stock In</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-primary me-2" style="width: 25px; height: 25px; font-size: 0.75rem;">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        <div>
                                            <strong>Laptop Dell XPS 13</strong>
                                            <br><small class="text-muted">SKU-001</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-success">+5</td>
                                <td><strong>PO-2024-001</strong></td>
                                <td>Main Warehouse</td>
                                <td>John Doe</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMovement(1)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <strong>Dec 17, 2024</strong><br>
                                        <small class="text-muted">13:15:42</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Stock Out</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-success me-2" style="width: 25px; height: 25px; font-size: 0.75rem;">
                                            <i class="fas fa-print"></i>
                                        </div>
                                        <div>
                                            <strong>HP LaserJet Printer</strong>
                                            <br><small class="text-muted">SKU-002</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-danger">-2</td>
                                <td><strong>REQ-2024-015</strong></td>
                                <td>IT Department</td>
                                <td>Jane Smith</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMovement(2)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <strong>Dec 17, 2024</strong><br>
                                        <small class="text-muted">11:45:18</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Transfer</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-info me-2" style="width: 25px; height: 25px; font-size: 0.75rem;">
                                            <i class="fas fa-mouse"></i>
                                        </div>
                                        <div>
                                            <strong>Wireless Mouse</strong>
                                            <br><small class="text-muted">SKU-003</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-info">10</td>
                                <td><strong>TRF-2024-008</strong></td>
                                <td>Main → Branch</td>
                                <td>Mike Johnson</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMovement(3)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <strong>Dec 17, 2024</strong><br>
                                        <small class="text-muted">10:20:33</small>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Return</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-warning me-2" style="width: 25px; height: 25px; font-size: 0.75rem;">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                        <div>
                                            <strong>Blue Pens (Pack of 10)</strong>
                                            <br><small class="text-muted">SKU-004</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-warning">-5</td>
                                <td><strong>RET-2024-003</strong></td>
                                <td>Office Storage</td>
                                <td>Sarah Wilson</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMovement(4)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Movement Chart -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Movement Trends</h5>
                <span class="text-muted">Last 7 days stock movement overview</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div style="height: 300px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                            <div class="text-center text-muted">
                                <i class="fas fa-chart-line fa-3x mb-3"></i>
                                <p>Stock Movement Chart</p>
                                <small>Chart visualization would be implemented here</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                    <div>
                                        <h6 class="mb-0">Stock In</h6>
                                        <small class="text-muted">Last 7 days</small>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="text-success mb-0">+1,245</h4>
                                        <small class="text-success">+12.5%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                    <div>
                                        <h6 class="mb-0">Stock Out</h6>
                                        <small class="text-muted">Last 7 days</small>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="text-danger mb-0">-856</h4>
                                        <small class="text-danger">-8.2%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                    <div>
                                        <h6 class="mb-0">Net Movement</h6>
                                        <small class="text-muted">Last 7 days</small>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="text-primary mb-0">+389</h4>
                                        <small class="text-success">+4.3%</small>
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

<!-- Movement Filters Modal -->
<div class="modal fade" id="movementFiltersModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advanced Movement Filters</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="movementFiltersForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterDateFrom" class="form-label">Date From</label>
                            <input type="date" class="form-control" id="filterDateFrom" name="date_from">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterDateTo" class="form-label">Date To</label>
                            <input type="date" class="form-control" id="filterDateTo" name="date_to">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterItem" class="form-label">Stock Item</label>
                            <select class="form-select" id="filterItem" name="item_id">
                                <option value="">All Items</option>
                                <option value="1">Laptop Dell XPS 13</option>
                                <option value="2">HP LaserJet Printer</option>
                                <option value="3">Wireless Mouse</option>
                                <option value="4">Blue Pens</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterLocation" class="form-label">Location</label>
                            <select class="form-select" id="filterLocation" name="location">
                                <option value="">All Locations</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filterUser" class="form-label">User</label>
                            <select class="form-select" id="filterUser" name="user">
                                <option value="">All Users</option>
                                <option value="john-doe">John Doe</option>
                                <option value="jane-smith">Jane Smith</option>
                                <option value="mike-johnson">Mike Johnson</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filterMinQuantity" class="form-label">Min Quantity</label>
                            <input type="number" class="form-control" id="filterMinQuantity" name="min_quantity" placeholder="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="applyFilters()">
                    <i class="fas fa-filter me-2"></i>Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default dates for filters
document.getElementById('filterDateFrom').valueAsDate = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
document.getElementById('filterDateTo').valueAsDate = new Date();

// Movement functions
function viewMovement(movementId) {
    alert('View movement ' + movementId + ' functionality would be implemented here');
}

function exportMovements() {
    alert('Export movements functionality would be implemented here');
}

function applyFilters() {
    alert('Filters applied successfully!');
    const modal = bootstrap.Modal.getInstance(document.getElementById('movementFiltersModal'));
    modal.hide();
}

// Search functionality
document.getElementById('movementSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
});

// Type filter
document.getElementById('movementTypeFilter').addEventListener('change', function() {
    const selectedType = this.value;
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const typeBadge = row.querySelector('.badge');
        if (selectedType === '' || typeBadge.textContent.toLowerCase().includes(selectedType)) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
});

// Date filter
document.getElementById('movementDateFilter').addEventListener('change', function() {
    const selectedRange = this.value;
    // Date filtering logic would be implemented here
    console.log('Date filter changed to:', selectedRange);
});
</script>

<?php include 'includes/footer.php'; ?>
