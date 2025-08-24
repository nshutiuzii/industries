<?php
$page_title = 'Material Tracker';
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
                    <a class="nav-link" href="production-plans.php">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Production Plans</span>
                        <span class="item-counter">8</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daily-production-log.php">
                        <i class="fas fa-chart-line"></i>
                        <span>Daily Production Log</span>
                        <span class="item-counter">25</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="machine-usage.php">
                        <i class="fas fa-cogs"></i>
                        <span>Machine Usage</span>
                        <span class="item-counter">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="material-tracker.php">
                        <i class="fas fa-boxes"></i>
                        <span>Material Tracker</span>
                        <span class="item-counter">45</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="production-reports.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Production Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alerts.php">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Alerts & Notifications</span>
                        <span class="item-counter">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team-management.php">
                        <i class="fas fa-users"></i>
                        <span>Team Management</span>
                        <span class="item-counter">18</span>
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
                    <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isProductionManager() ? 'Production Manager' : 'Operator'); ?></p>
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
                        <h2>Material Tracker</h2>
                        <p class="text-muted mb-0">Monitor inventory levels and track material movements</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('materials')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaterialModal">
                            <i class="fas fa-plus me-2"></i>Add Material
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Material Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">45</h3>
                        <p class="stat-label">Total Materials</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">32</h3>
                        <p class="stat-label">In Stock</p>
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
                        <p class="stat-label">Low Stock</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">5</h3>
                        <p class="stat-label">Out of Stock</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="materialSearch" placeholder="Search materials by name, SKU, or description...">
                </div>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="raw-materials">Raw Materials</option>
                    <option value="packaging">Packaging</option>
                    <option value="chemicals">Chemicals</option>
                    <option value="tools">Tools</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="stockFilter">
                    <option value="">All Stock</option>
                    <option value="in-stock">In Stock</option>
                    <option value="low-stock">Low Stock</option>
                    <option value="out-of-stock">Out of Stock</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="supplierFilter">
                    <option value="">All Suppliers</option>
                    <option value="flour-co">Flour Co Ltd</option>
                    <option value="sugar-suppliers">Sugar Suppliers</option>
                    <option value="dairy-products">Dairy Products</option>
                </select>
            </div>
        </div>

        <!-- Materials Grid -->
        <div class="row" id="materialsGrid">
            <!-- Material Card 1 -->
            <div class="col-lg-4 col-md-6 mb-3 material-item" data-category="raw-materials" data-stock="in-stock" data-supplier="flour-co">
                <div class="production-plan-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="mb-1">Flour</h6>
                            <small class="text-muted">MAT-001</small>
                        </div>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Current Stock</small>
                            <div class="fw-bold current-stock">5,000 kg</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Reorder Level</small>
                            <div class="fw-bold">1,000 kg</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Unit Cost</small>
                            <div class="fw-bold">RWF 120</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Supplier</small>
                            <div class="fw-bold">Flour Co Ltd</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Stock Status</small>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 80%"></div>
                        </div>
                        <small class="text-muted">80% Available</small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewMaterial(1)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="updateMaterialStock(1, 'add')">
                            <i class="fas fa-plus me-1"></i>Add
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="updateMaterialStock(1, 'remove')">
                            <i class="fas fa-minus me-1"></i>Remove
                        </button>
                    </div>
                </div>
            </div>

            <!-- Material Card 2 -->
            <div class="col-lg-4 col-md-6 mb-3 material-item" data-category="raw-materials" data-stock="low-stock" data-supplier="sugar-suppliers">
                <div class="production-plan-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="mb-1">Sugar</h6>
                            <small class="text-muted">MAT-002</small>
                        </div>
                        <span class="badge bg-warning">Low Stock</span>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Current Stock</small>
                            <div class="fw-bold current-stock">850 kg</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Reorder Level</small>
                            <div class="fw-bold">800 kg</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Unit Cost</small>
                            <div class="fw-bold">RWF 150</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Supplier</small>
                            <div class="fw-bold">Sugar Suppliers</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Stock Status</small>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 15%"></div>
                        </div>
                        <small class="text-muted">15% Available</small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewMaterial(2)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="updateMaterialStock(2, 'add')">
                            <i class="fas fa-plus me-1"></i>Add
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="updateMaterialStock(2, 'remove')">
                            <i class="fas fa-minus me-1"></i>Remove
                        </button>
                    </div>
                </div>
            </div>

            <!-- Material Card 3 -->
            <div class="col-lg-4 col-md-6 mb-3 material-item" data-category="raw-materials" data-stock="out-of-stock" data-supplier="dairy-products">
                <div class="production-plan-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="mb-1">Butter</h6>
                            <small class="text-muted">MAT-003</small>
                        </div>
                        <span class="badge bg-danger">Out of Stock</span>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Current Stock</small>
                            <div class="fw-bold current-stock">0 kg</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Reorder Level</small>
                            <div class="fw-bold">500 kg</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Unit Cost</small>
                            <div class="fw-bold">RWF 800</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Supplier</small>
                            <div class="fw-bold">Dairy Products</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Stock Status</small>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-danger" style="width: 0%"></div>
                        </div>
                        <small class="text-muted">0% Available</small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewMaterial(3)">
                            <i class="fas fa-eye me-1"></i>View
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="updateMaterialStock(3, 'add')">
                            <i class="fas fa-plus me-1"></i>Add
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="updateMaterialStock(3, 'remove')">
                            <i class="fas fa-minus me-1"></i>Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Material Movement History -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Material Movements</h5>
                <span class="text-muted">Latest inventory transactions</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Material</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Reference</th>
                                <th>User</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dec 17, 2024</td>
                                <td><strong>Flour</strong></td>
                                <td><span class="badge bg-success">In</span></td>
                                <td>+1,000 kg</td>
                                <td>PO-2024-001</td>
                                <td>John Smith</td>
                                <td>New shipment received</td>
                            </tr>
                            <tr>
                                <td>Dec 17, 2024</td>
                                <td><strong>Sugar</strong></td>
                                <td><span class="badge bg-warning">Out</span></td>
                                <td>-200 kg</td>
                                <td>PR-2024-001</td>
                                <td>Jane Doe</td>
                                <td>Production consumption</td>
                            </tr>
                            <tr>
                                <td>Dec 16, 2024</td>
                                <td><strong>Butter</strong></td>
                                <td><span class="badge bg-warning">Out</span></td>
                                <td>-150 kg</td>
                                <td>PR-2024-002</td>
                                <td>Mike Johnson</td>
                                <td>Production consumption</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Material Modal -->
<div class="modal fade" id="addMaterialModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addMaterialForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="materialName" class="form-label">Material Name *</label>
                            <input type="text" class="form-control" id="materialName" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="materialSKU" class="form-label">SKU *</label>
                            <input type="text" class="form-control" id="materialSKU" name="sku" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="materialDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="materialDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="materialCategory" class="form-label">Category *</label>
                            <select class="form-select" id="materialCategory" name="category" required>
                                <option value="">Select Category</option>
                                <option value="raw-materials">Raw Materials</option>
                                <option value="packaging">Packaging</option>
                                <option value="chemicals">Chemicals</option>
                                <option value="tools">Tools</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="materialUnit" class="form-label">Unit *</label>
                            <input type="text" class="form-control" id="materialUnit" name="unit" placeholder="kg, pcs, liters" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="materialStock" class="form-label">Initial Stock *</label>
                            <input type="number" class="form-control" id="materialStock" name="current_stock" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="materialReorderLevel" class="form-label">Reorder Level *</label>
                            <input type="number" class="form-control" id="materialReorderLevel" name="reorder_level" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="materialUnitCost" class="form-label">Unit Cost (RWF) *</label>
                            <input type="number" class="form-control" id="materialUnitCost" name="unit_cost" min="0" step="100" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="materialSupplier" class="form-label">Supplier</label>
                            <select class="form-select" id="materialSupplier" name="supplier_id">
                                <option value="">Select Supplier</option>
                                <option value="1">Flour Co Ltd</option>
                                <option value="2">Sugar Suppliers</option>
                                <option value="3">Dairy Products</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="materialStatus" class="form-label">Status</label>
                            <select class="form-select" id="materialStatus" name="status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitMaterial()">
                    <i class="fas fa-save me-2"></i>Add Material
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Material functions
function viewMaterial(id) {
    alert('View material ' + id + ' functionality would be implemented here');
}

function updateMaterialStock(materialId, type) {
    const quantity = prompt(`Enter quantity to ${type}:`);
    if (quantity && !isNaN(quantity)) {
        alert(`Material stock ${type}ed successfully`);
        
        // Update UI
        const stockElement = document.querySelector(`[data-material-id="${materialId}"] .current-stock`);
        if (stockElement) {
            const currentStock = parseFloat(stockElement.textContent);
            const newStock = type === 'add' ? currentStock + parseFloat(quantity) : currentStock - parseFloat(quantity);
            stockElement.textContent = newStock.toFixed(2) + ' kg';
        }
    }
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitMaterial() {
    const form = document.getElementById('addMaterialForm');
    if (form.checkValidity()) {
        alert('Material added successfully!');
        form.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('addMaterialModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Search and filter functionality
document.getElementById('materialSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const items = document.querySelectorAll('#materialsGrid .material-item');
    
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
    const items = document.querySelectorAll('#materialsGrid .material-item');
    
    items.forEach(item => {
        const itemCategory = item.dataset.category;
        if (selectedCategory === '' || itemCategory === selectedCategory) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('stockFilter').addEventListener('change', function() {
    const selectedStock = this.value;
    const items = document.querySelectorAll('#materialsGrid .material-item');
    
    items.forEach(item => {
        const itemStock = item.dataset.stock;
        if (selectedStock === '' || itemStock === selectedStock) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

document.getElementById('supplierFilter').addEventListener('change', function() {
    const selectedSupplier = this.value;
    const items = document.querySelectorAll('#materialsGrid .material-item');
    
    items.forEach(item => {
        const itemSupplier = item.dataset.supplier;
        if (selectedSupplier === '' || itemSupplier === selectedSupplier) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
