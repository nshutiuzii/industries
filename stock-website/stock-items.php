<?php
$page_title = 'Stock Items';
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
                    <a class="nav-link active" href="stock-items.php">
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
                        <h2>Stock Items Management</h2>
                        <p class="text-muted mb-0">Manage all stock items, categories, and inventory details</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportStockItems()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStockItemModal">
                            <i class="fas fa-plus me-2"></i>Add Stock Item
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="stockSearch" placeholder="Search stock items by name, SKU, or description...">
                </div>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="electronics">Electronics</option>
                    <option value="office-supplies">Office Supplies</option>
                    <option value="furniture">Furniture</option>
                    <option value="it-equipment">IT Equipment</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="discontinued">Discontinued</option>
                </select>
            </div>
        </div>

        <!-- Stock Items Grid -->
        <div class="row" id="stockItemsGrid">
            <!-- Stock Item Card 1 -->
            <div class="col-lg-4 col-md-6 mb-3" data-category="electronics" data-status="active">
                <div class="stock-item-card">
                    <div class="stock-item-header">
                        <div class="stock-item-icon bg-primary">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="stock-item-info">
                            <h6>Laptop Dell XPS 13</h6>
                            <small>SKU-001</small>
                        </div>
                    </div>
                    <div class="stock-item-stats">
                        <div class="stock-item-stat">
                            <strong>45</strong>
                            <small>In Stock</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>RWF 850,000</strong>
                            <small>Unit Price</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>10</strong>
                            <small>Reorder Level</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewStockItem(1)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editStockItem(1)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="viewMovements(1)">
                            <i class="fas fa-history me-1"></i>History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stock Item Card 2 -->
            <div class="col-lg-4 col-md-6 mb-3" data-category="office-supplies" data-status="active">
                <div class="stock-item-card">
                    <div class="stock-item-header">
                        <div class="stock-item-icon bg-success">
                            <i class="fas fa-print"></i>
                        </div>
                        <div class="stock-item-info">
                            <h6>HP LaserJet Printer</h6>
                            <small>SKU-002</small>
                        </div>
                    </div>
                    <div class="stock-item-stats">
                        <div class="stock-item-stat">
                            <strong>12</strong>
                            <small>In Stock</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>RWF 450,000</strong>
                            <small>Unit Price</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>5</strong>
                            <small>Reorder Level</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewStockItem(2)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editStockItem(2)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="viewMovements(2)">
                            <i class="fas fa-history me-1"></i>History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stock Item Card 3 -->
            <div class="col-lg-4 col-md-6 mb-3" data-category="it-equipment" data-status="active">
                <div class="stock-item-card">
                    <div class="stock-item-header">
                        <div class="stock-item-icon bg-info">
                            <i class="fas fa-mouse"></i>
                        </div>
                        <div class="stock-item-info">
                            <h6>Wireless Mouse</h6>
                            <small>SKU-003</small>
                        </div>
                    </div>
                    <div class="stock-item-stats">
                        <div class="stock-item-stat">
                            <strong>78</strong>
                            <small>In Stock</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>RWF 25,000</strong>
                            <small>Unit Price</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>15</strong>
                            <small>Reorder Level</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewStockItem(3)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editStockItem(3)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="viewMovements(3)">
                            <i class="fas fa-history me-1"></i>History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stock Item Card 4 -->
            <div class="col-lg-4 col-md-6 mb-3" data-category="office-supplies" data-status="active">
                <div class="stock-item-card">
                    <div class="stock-item-header">
                        <div class="stock-item-icon bg-warning">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="stock-item-info">
                            <h6>Blue Pens (Pack of 10)</h6>
                            <small>SKU-004</small>
                        </div>
                    </div>
                    <div class="stock-item-stats">
                        <div class="stock-item-stat">
                            <strong>8</strong>
                            <small>In Stock</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>RWF 5,000</strong>
                            <small>Unit Price</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>20</strong>
                            <small>Reorder Level</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewStockItem(4)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editStockItem(4)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="viewMovements(4)">
                            <i class="fas fa-history me-1"></i>History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stock Item Card 5 -->
            <div class="col-lg-4 col-md-6 mb-3" data-category="furniture" data-status="active">
                <div class="stock-item-card">
                    <div class="stock-item-header">
                        <div class="stock-item-icon bg-secondary">
                            <i class="fas fa-chair"></i>
                        </div>
                        <div class="stock-item-info">
                            <h6>Office Chair</h6>
                            <small>SKU-005</small>
                        </div>
                    </div>
                    <div class="stock-item-stats">
                        <div class="stock-item-stat">
                            <strong>25</strong>
                            <small>In Stock</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>RWF 120,000</strong>
                            <small>Unit Price</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>8</strong>
                            <small>Reorder Level</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewStockItem(5)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editStockItem(5)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="viewMovements(5)">
                            <i class="fas fa-history me-1"></i>History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stock Item Card 6 -->
            <div class="col-lg-4 col-md-6 mb-3" data-category="maintenance" data-status="active">
                <div class="stock-item-card">
                    <div class="stock-item-header">
                        <div class="stock-item-icon bg-danger">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="stock-item-info">
                            <h6>Tool Kit Set</h6>
                            <small>SKU-006</small>
                        </div>
                    </div>
                    <div class="stock-item-stats">
                        <div class="stock-item-stat">
                            <strong>15</strong>
                            <small>In Stock</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>RWF 85,000</strong>
                            <small>Unit Price</small>
                        </div>
                        <div class="stock-item-stat">
                            <strong>5</strong>
                            <small>Reorder Level</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewStockItem(6)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editStockItem(6)">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="viewMovements(6)">
                            <i class="fas fa-history me-1"></i>History
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12">
                <nav aria-label="Stock items pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Add Stock Item Modal -->
<div class="modal fade" id="addStockItemModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Stock Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addStockItemForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="itemName" class="form-label">Item Name *</label>
                            <input type="text" class="form-control" id="itemName" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="itemSKU" class="form-label">SKU *</label>
                            <input type="text" class="form-control" id="itemSKU" name="sku" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="itemDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="itemDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="itemCategory" class="form-label">Category *</label>
                            <select class="form-select" id="itemCategory" name="category_id" required>
                                <option value="">Select Category</option>
                                <option value="electronics">Electronics</option>
                                <option value="office-supplies">Office Supplies</option>
                                <option value="furniture">Furniture</option>
                                <option value="it-equipment">IT Equipment</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="itemLocation" class="form-label">Location *</label>
                            <select class="form-select" id="itemLocation" name="location_id" required>
                                <option value="">Select Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="itemQuantity" class="form-label">Initial Quantity *</label>
                            <input type="number" class="form-control" id="itemQuantity" name="quantity" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="itemPrice" class="form-label">Unit Price (RWF) *</label>
                            <input type="number" class="form-control" id="itemPrice" name="unit_price" min="0" step="100" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="itemReorderLevel" class="form-label">Reorder Level *</label>
                            <input type="number" class="form-control" id="itemReorderLevel" name="reorder_level" min="0" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="itemSupplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="itemSupplier" name="supplier">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="itemBarcode" class="form-label">Barcode</label>
                            <input type="text" class="form-control" id="itemBarcode" name="barcode">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitStockItem()">
                    <i class="fas fa-save me-2"></i>Add Stock Item
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Stock item functions
function viewStockItem(id) {
    alert('View stock item ' + id + ' functionality would be implemented here');
}

function editStockItem(id) {
    alert('Edit stock item ' + id + ' functionality would be implemented here');
}

function viewMovements(id) {
    alert('View movements for item ' + id + ' functionality would be implemented here');
}

function exportStockItems() {
    alert('Export stock items functionality would be implemented here');
}

function submitStockItem() {
    const form = document.getElementById('addStockItemForm');
    if (form.checkValidity()) {
        alert('Stock item added successfully!');
        form.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('addStockItemModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Search and filter functionality
document.getElementById('stockSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const items = document.querySelectorAll('#stockItemsGrid .col-lg-4');
    
    items.forEach(item => {
        const itemName = item.querySelector('h6').textContent.toLowerCase();
        const itemSKU = item.querySelector('small').textContent.toLowerCase();
        
        if (itemName.includes(searchTerm) || itemSKU.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('categoryFilter').addEventListener('change', function() {
    const selectedCategory = this.value;
    const items = document.querySelectorAll('#stockItemsGrid .col-lg-4');
    
    items.forEach(item => {
        const itemCategory = item.dataset.category;
        if (selectedCategory === '' || itemCategory === selectedCategory) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('statusFilter').addEventListener('change', function() {
    const selectedStatus = this.value;
    const items = document.querySelectorAll('#stockItemsGrid .col-lg-4');
    
    items.forEach(item => {
        const itemStatus = item.dataset.status;
        if (selectedStatus === '' || itemStatus === selectedStatus) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
