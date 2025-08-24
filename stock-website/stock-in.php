<?php
$page_title = 'Stock In';
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
                    <a class="nav-link active" href="stock-in.php">
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
                        <h2>Stock In Management</h2>
                        <p class="text-muted mb-0">Record incoming stock, purchases, and receipts</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportStockIn()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockInModal">
                            <i class="fas fa-plus me-2"></i>Record Stock In
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock In Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">25</h3>
                        <p class="stat-label">Today's Receipts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">1,250</h3>
                        <p class="stat-label">Items Received</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">RWF 8.5M</h3>
                        <p class="stat-label">Total Value</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">3</h3>
                        <p class="stat-label">Pending Approval</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Stock In Records -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Stock In Records</h5>
                <span class="text-muted">Latest incoming stock transactions</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Value</th>
                                <th>Supplier</th>
                                <th>Received Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>PO-2024-001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-primary me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        <div>
                                            <strong>Laptop Dell XPS 13</strong>
                                            <br><small class="text-muted">SKU-001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>+5</td>
                                <td>RWF 850,000</td>
                                <td>RWF 4,250,000</td>
                                <td>Tech Solutions Ltd</td>
                                <td>Dec 17, 2024</td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewStockIn('PO-2024-001')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>PO-2024-002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-success me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                            <i class="fas fa-print"></i>
                                        </div>
                                        <div>
                                            <strong>HP LaserJet Printer</strong>
                                            <br><small class="text-muted">SKU-002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>+3</td>
                                <td>RWF 450,000</td>
                                <td>RWF 1,350,000</td>
                                <td>Office Equipment Co</td>
                                <td>Dec 16, 2024</td>
                                <td><span class="badge bg-success">Received</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewStockIn('PO-2024-002')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>PO-2024-003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-info me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                            <i class="fas fa-mouse"></i>
                                        </div>
                                        <div>
                                            <strong>Wireless Mouse</strong>
                                            <br><small class="text-muted">SKU-003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>+20</td>
                                <td>RWF 25,000</td>
                                <td>RWF 500,000</td>
                                <td>Computer Accessories</td>
                                <td>Dec 15, 2024</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-warning" onclick="approveStockIn('PO-2024-003')">
                                        <i class="fas fa-check me-1"></i>Approve
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Stock In Form -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Quick Stock In Entry</h5>
                <span class="text-muted">Fast entry for single items</span>
            </div>
            <div class="card-body">
                <form id="quickStockInForm">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="quickItem" class="form-label">Stock Item *</label>
                            <select class="form-select" id="quickItem" name="item_id" required>
                                <option value="">Select Item</option>
                                <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                                <option value="2">HP LaserJet Printer (SKU-002)</option>
                                <option value="3">Wireless Mouse (SKU-003)</option>
                                <option value="4">Blue Pens (SKU-004)</option>
                                <option value="5">Office Chair (SKU-005)</option>
                                <option value="6">Tool Kit Set (SKU-006)</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickQuantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="quickQuantity" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickReference" class="form-label">Reference</label>
                            <input type="text" class="form-control" id="quickReference" name="reference" placeholder="PO-2024-XXX">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickSupplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="quickSupplier" name="supplier">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Stock In Modal -->
<div class="modal fade" id="stockInModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record Stock In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="stockInForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stockInReference" class="form-label">Reference Number *</label>
                            <input type="text" class="form-control" id="stockInReference" name="reference" placeholder="PO-2024-XXX" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stockInDate" class="form-label">Received Date *</label>
                            <input type="date" class="form-control" id="stockInDate" name="received_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stockInSupplier" class="form-label">Supplier *</label>
                            <input type="text" class="form-control" id="stockInSupplier" name="supplier" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stockInLocation" class="form-label">Receiving Location *</label>
                            <select class="form-select" id="stockInLocation" name="location_id" required>
                                <option value="">Select Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="stockInNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="stockInNotes" name="notes" rows="2" placeholder="Any additional notes about this stock in..."></textarea>
                    </div>
                    
                    <hr>
                    
                    <h6>Items to Receive</h6>
                    <div id="stockInItems">
                        <div class="row stock-in-item">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Stock Item *</label>
                                <select class="form-select" name="items[0][item_id]" required>
                                    <option value="">Select Item</option>
                                    <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                                    <option value="2">HP LaserJet Printer (SKU-002)</option>
                                    <option value="3">Wireless Mouse (SKU-003)</option>
                                    <option value="4">Blue Pens (SKU-004)</option>
                                    <option value="5">Office Chair (SKU-005)</option>
                                    <option value="6">Tool Kit Set (SKU-006)</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Quantity *</label>
                                <input type="number" class="form-control" name="items[0][quantity]" min="1" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Unit Price</label>
                                <input type="number" class="form-control" name="items[0][unit_price]" min="0" step="100">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Total Value</label>
                                <input type="text" class="form-control" name="items[0][total_value]" readonly>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="removeStockInItem(this)">
                                    <i class="fas fa-trash me-1"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-outline-primary" onclick="addStockInItem()">
                            <i class="fas fa-plus me-2"></i>Add Another Item
                        </button>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <strong>Total Items:</strong> <span id="totalItems">1</span><br>
                                <strong>Total Value:</strong> <span id="totalValue">RWF 0</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitStockIn()">
                    <i class="fas fa-save me-2"></i>Record Stock In
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default date to today
document.getElementById('stockInDate').valueAsDate = new Date();

// Stock in functions
function viewStockIn(reference) {
    alert('View stock in ' + reference + ' functionality would be implemented here');
}

function approveStockIn(reference) {
    alert('Approve stock in ' + reference + ' functionality would be implemented here');
}

function exportStockIn() {
    alert('Export stock in functionality would be implemented here');
}

function addStockInItem() {
    const container = document.getElementById('stockInItems');
    const itemCount = container.children.length;
    const newItem = document.createElement('div');
    newItem.className = 'row stock-in-item';
    newItem.innerHTML = `
        <div class="col-md-4 mb-3">
            <label class="form-label">Stock Item *</label>
            <select class="form-select" name="items[${itemCount}][item_id]" required>
                <option value="">Select Item</option>
                <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                <option value="2">HP LaserJet Printer (SKU-002)</option>
                <option value="3">Wireless Mouse (SKU-003)</option>
                <option value="4">Blue Pens (SKU-004)</option>
                <option value="5">Office Chair (SKU-005)</option>
                <option value="6">Tool Kit Set (SKU-006)</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Quantity *</label>
            <input type="number" class="form-control" name="items[${itemCount}][quantity]" min="1" required>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Unit Price</label>
            <input type="number" class="form-control" name="items[${itemCount}][unit_price]" min="0" step="100">
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Total Value</label>
            <input type="text" class="form-control" name="items[${itemCount}][total_value]" readonly>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">&nbsp;</label>
            <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="removeStockInItem(this)">
                <i class="fas fa-trash me-1"></i>Remove
            </button>
        </div>
    `;
    container.appendChild(newItem);
    updateTotals();
}

function removeStockInItem(button) {
    button.closest('.stock-in-item').remove();
    updateTotals();
}

function updateTotals() {
    const items = document.querySelectorAll('.stock-in-item');
    let totalItems = 0;
    let totalValue = 0;
    
    items.forEach(item => {
        const quantity = parseInt(item.querySelector('input[name*="[quantity]"]').value) || 0;
        const unitPrice = parseInt(item.querySelector('input[name*="[unit_price]"]').value) || 0;
        const totalValueInput = item.querySelector('input[name*="[total_value]"]');
        
        const itemTotal = quantity * unitPrice;
        totalValueInput.value = 'RWF ' + itemTotal.toLocaleString();
        
        totalItems += quantity;
        totalValue += itemTotal;
    });
    
    document.getElementById('totalItems').textContent = totalItems;
    document.getElementById('totalValue').textContent = 'RWF ' + totalValue.toLocaleString();
}

function submitStockIn() {
    const form = document.getElementById('stockInForm');
    if (form.checkValidity()) {
        alert('Stock in recorded successfully!');
        form.reset();
        document.getElementById('stockInDate').valueAsDate = new Date();
        const modal = bootstrap.Modal.getInstance(document.getElementById('stockInModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Quick form submission
document.getElementById('quickStockInForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Quick stock in added successfully!');
    this.reset();
});

// Update totals when quantities or prices change
document.addEventListener('input', function(e) {
    if (e.target.name && (e.target.name.includes('[quantity]') || e.target.name.includes('[unit_price]'))) {
        updateTotals();
    }
});
</script>

<?php include 'includes/footer.php'; ?>
