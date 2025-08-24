<?php
$page_title = 'Returns';
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
                    <a class="nav-link active" href="returns.php">
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
                        <h2>Stock Returns Management</h2>
                        <p class="text-muted mb-0">Handle returned, damaged, or expired items</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportReturns()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#returnModal">
                            <i class="fas fa-plus me-2"></i>New Return
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Returns Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-undo"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">5</h3>
                        <p class="stat-label">Pending Returns</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">12</h3>
                        <p class="stat-label">Damaged Items</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Expired Items</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">25</h3>
                        <p class="stat-label">Processed Today</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Returns -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Returns</h5>
                <span class="text-muted">Latest return requests and processed returns</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Return ID</th>
                                <th>Item</th>
                                <th>Return Type</th>
                                <th>Quantity</th>
                                <th>Returned By</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>RET-2024-001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-danger me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        <div>
                                            <strong>Laptop Dell XPS 13</strong>
                                            <br><small class="text-muted">SKU-001</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Damaged</span></td>
                                <td>1</td>
                                <td>John Smith</td>
                                <td>Dec 17, 2024</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-warning" onclick="processReturn('RET-2024-001')">
                                        <i class="fas fa-cog me-1"></i>Process
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RET-2024-002</strong></td>
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
                                <td><span class="badge bg-info">Wrong Item</span></td>
                                <td>2</td>
                                <td>Jane Doe</td>
                                <td>Dec 16, 2024</td>
                                <td><span class="badge bg-success">Processed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewReturn('RET-2024-002')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>RET-2024-003</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-warning me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                        <div>
                                            <strong>Blue Pens (Pack of 10)</strong>
                                            <br><small class="text-muted">SKU-004</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Expired</span></td>
                                <td>5</td>
                                <td>Mike Johnson</td>
                                <td>Dec 15, 2024</td>
                                <td><span class="badge bg-success">Processed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewReturn('RET-2024-003')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Return Form -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Quick Return Request</h5>
                <span class="text-muted">Fast return processing</span>
            </div>
            <div class="card-body">
                <form id="quickReturnForm">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="quickReturnItem" class="form-label">Stock Item *</label>
                            <select class="form-select" id="quickReturnItem" name="item_id" required>
                                <option value="">Select Item</option>
                                <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                                <option value="2">HP LaserJet Printer (SKU-002)</option>
                                <option value="3">Wireless Mouse (SKU-003)</option>
                                <option value="4">Blue Pens (SKU-004)</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickReturnQuantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="quickReturnQuantity" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickReturnType" class="form-label">Return Type *</label>
                            <select class="form-select" id="quickReturnType" name="return_type" required>
                                <option value="">Select Type</option>
                                <option value="damaged">Damaged</option>
                                <option value="expired">Expired</option>
                                <option value="wrong_item">Wrong Item</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="quickReturnReason" class="form-label">Reason</label>
                            <input type="text" class="form-control" id="quickReturnReason" name="reason" placeholder="Brief reason for return">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-undo me-2"></i>Return
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Return Modal -->
<div class="modal fade" id="returnModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Process Stock Return</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="returnForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="returnItem" class="form-label">Stock Item *</label>
                            <select class="form-select" id="returnItem" name="item_id" required>
                                <option value="">Select Item</option>
                                <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                                <option value="2">HP LaserJet Printer (SKU-002)</option>
                                <option value="3">Wireless Mouse (SKU-003)</option>
                                <option value="4">Blue Pens (SKU-004)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="returnQuantity" class="form-label">Quantity to Return *</label>
                            <input type="number" class="form-control" id="returnQuantity" name="quantity" min="1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="returnType" class="form-label">Return Type *</label>
                            <select class="form-select" id="returnType" name="return_type" required>
                                <option value="">Select Return Type</option>
                                <option value="damaged">Damaged</option>
                                <option value="expired">Expired</option>
                                <option value="wrong_item">Wrong Item</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="returnDate" class="form-label">Return Date *</label>
                            <input type="date" class="form-control" id="returnDate" name="return_date" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="returnReason" class="form-label">Detailed Reason *</label>
                        <textarea class="form-control" id="returnReason" name="reason" rows="3" placeholder="Please provide a detailed reason for this return..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="returnAction" class="form-label">Recommended Action</label>
                        <select class="form-select" id="returnAction" name="recommended_action">
                            <option value="">Select Action</option>
                            <option value="refund">Refund</option>
                            <option value="replace">Replace</option>
                            <option value="repair">Repair</option>
                            <option value="dispose">Dispose</option>
                            <option value="restock">Restock (if usable)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="returnNotes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="returnNotes" name="notes" rows="2" placeholder="Any additional notes or instructions..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitReturn()">
                    <i class="fas fa-save me-2"></i>Process Return
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default date to today
document.getElementById('returnDate').valueAsDate = new Date();

// Return functions
function viewReturn(returnId) {
    alert('View return ' + returnId + ' functionality would be implemented here');
}

function processReturn(returnId) {
    alert('Process return ' + returnId + ' functionality would be implemented here');
}

function exportReturns() {
    alert('Export returns functionality would be implemented here');
}

function submitReturn() {
    const form = document.getElementById('returnForm');
    if (form.checkValidity()) {
        alert('Return processed successfully!');
        form.reset();
        document.getElementById('returnDate').valueAsDate = new Date();
        const modal = bootstrap.Modal.getInstance(document.getElementById('returnModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Quick form submission
document.getElementById('quickReturnForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Quick return request submitted successfully!');
    this.reset();
});
</script>

<?php include 'includes/footer.php'; ?>
