<?php
$page_title = 'Transfers';
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
                    <a class="nav-link active" href="transfers.php">
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
                        <h2>Stock Transfers</h2>
                        <p class="text-muted mb-0">Move stock between locations and warehouses</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportTransfers()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transferModal">
                            <i class="fas fa-plus me-2"></i>New Transfer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transfer Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">12</h3>
                        <p class="stat-label">Active Transfers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Completed Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">4</h3>
                        <p class="stat-label">In Transit</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">156</h3>
                        <p class="stat-label">Items Transferred</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Transfers -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Active Transfers</h5>
                <span class="text-muted">Currently in progress</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Transfer ID</th>
                                <th>From Location</th>
                                <th>To Location</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>TRF-2024-008</strong></td>
                                <td>Main Warehouse</td>
                                <td>Branch Warehouse</td>
                                <td>10 items</td>
                                <td><span class="badge bg-warning">In Transit</span></td>
                                <td>John Doe</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewTransfer('TRF-2024-008')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>TRF-2024-009</strong></td>
                                <td>Office Storage</td>
                                <td>Main Warehouse</td>
                                <td>5 items</td>
                                <td><span class="badge bg-info">Pending</span></td>
                                <td>Jane Smith</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-success" onclick="approveTransfer('TRF-2024-009')">
                                        <i class="fas fa-check me-1"></i>Approve
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Transfer Form -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Quick Transfer Request</h5>
                <span class="text-muted">Fast transfer between locations</span>
            </div>
            <div class="card-body">
                <form id="quickTransferForm">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="quickFromLocation" class="form-label">From Location *</label>
                            <select class="form-select" id="quickFromLocation" name="from_location" required>
                                <option value="">Select Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="quickToLocation" class="form-label">To Location *</label>
                            <select class="form-select" id="quickToLocation" name="to_location" required>
                                <option value="">Select Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickTransferItem" class="form-label">Item *</label>
                            <select class="form-select" id="quickTransferItem" name="item_id" required>
                                <option value="">Select Item</option>
                                <option value="1">Laptop Dell XPS 13</option>
                                <option value="2">HP LaserJet Printer</option>
                                <option value="3">Wireless Mouse</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickTransferQuantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="quickTransferQuantity" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-info w-100">
                                <i class="fas fa-exchange-alt me-2"></i>Transfer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Transfer Modal -->
<div class="modal fade" id="transferModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="transferForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="transferFrom" class="form-label">From Location *</label>
                            <select class="form-select" id="transferFrom" name="from_location" required>
                                <option value="">Select Source Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="transferTo" class="form-label">To Location *</label>
                            <select class="form-select" id="transferTo" name="to_location" required>
                                <option value="">Select Destination Location</option>
                                <option value="main-warehouse">Main Warehouse</option>
                                <option value="office-storage">Office Storage</option>
                                <option value="branch-warehouse">Branch Warehouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="transferDate" class="form-label">Transfer Date *</label>
                            <input type="date" class="form-control" id="transferDate" name="transfer_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="transferPriority" class="form-label">Priority</label>
                            <select class="form-select" id="transferPriority" name="priority">
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="transferNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="transferNotes" name="notes" rows="2" placeholder="Any special instructions or notes..."></textarea>
                    </div>
                    
                    <hr>
                    
                    <h6>Items to Transfer</h6>
                    <div id="transferItems">
                        <div class="row transfer-item">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Stock Item *</label>
                                <select class="form-select" name="items[0][item_id]" required>
                                    <option value="">Select Item</option>
                                    <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                                    <option value="2">HP LaserJet Printer (SKU-002)</option>
                                    <option value="3">Wireless Mouse (SKU-003)</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Quantity *</label>
                                <input type="number" class="form-control" name="items[0][quantity]" min="1" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Available</label>
                                <input type="text" class="form-control" name="items[0][available]" readonly>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Unit Value</label>
                                <input type="text" class="form-control" name="items[0][unit_value]" readonly>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="removeTransferItem(this)">
                                    <i class="fas fa-trash me-1"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-outline-primary" onclick="addTransferItem()">
                            <i class="fas fa-plus me-2"></i>Add Another Item
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitTransfer()">
                    <i class="fas fa-save me-2"></i>Create Transfer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default date to today
document.getElementById('transferDate').valueAsDate = new Date();

// Transfer functions
function viewTransfer(transferId) {
    alert('View transfer ' + transferId + ' functionality would be implemented here');
}

function approveTransfer(transferId) {
    alert('Approve transfer ' + transferId + ' functionality would be implemented here');
}

function exportTransfers() {
    alert('Export transfers functionality would be implemented here');
}

function addTransferItem() {
    const container = document.getElementById('transferItems');
    const itemCount = container.children.length;
    const newItem = document.createElement('div');
    newItem.className = 'row transfer-item';
    newItem.innerHTML = `
        <div class="col-md-4 mb-3">
            <label class="form-label">Stock Item *</label>
            <select class="form-select" name="items[${itemCount}][item_id]" required>
                <option value="">Select Item</option>
                <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                <option value="2">HP LaserJet Printer (SKU-002)</option>
                <option value="3">Wireless Mouse (SKU-003)</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Quantity *</label>
            <input type="number" class="form-control" name="items[${itemCount}][quantity]" min="1" required>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Available</label>
            <input type="text" class="form-control" name="items[${itemCount}][available]" readonly>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Unit Value</label>
            <input type="text" class="form-control" name="items[${itemCount}][unit_value]" readonly>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">&nbsp;</label>
            <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="removeTransferItem(this)">
                <i class="fas fa-trash me-1"></i>Remove
            </button>
        </div>
    `;
    container.appendChild(newItem);
}

function removeTransferItem(button) {
    button.closest('.transfer-item').remove();
}

function submitTransfer() {
    const form = document.getElementById('transferForm');
    if (form.checkValidity()) {
        alert('Transfer created successfully!');
        form.reset();
        document.getElementById('transferDate').valueAsDate = new Date();
        const modal = bootstrap.Modal.getInstance(document.getElementById('transferModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Quick form submission
document.getElementById('quickTransferForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Quick transfer request submitted successfully!');
    this.reset();
});

// Prevent same location selection
document.getElementById('quickFromLocation').addEventListener('change', function() {
    const toLocation = document.getElementById('quickToLocation');
    if (this.value === toLocation.value && this.value !== '') {
        toLocation.value = '';
        alert('Please select a different destination location');
    }
});

document.getElementById('quickToLocation').addEventListener('change', function() {
    const fromLocation = document.getElementById('quickFromLocation');
    if (this.value === fromLocation.value && this.value !== '') {
        this.value = '';
        alert('Please select a different destination location');
    }
});
</script>

<?php include 'includes/footer.php'; ?>
