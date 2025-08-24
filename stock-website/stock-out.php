<?php
$page_title = 'Stock Out';
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
                    <a class="nav-link active" href="stock-out.php">
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
                        <h2>Stock Out Management</h2>
                        <p class="text-muted mb-0">Issue stock to departments, staff, or external parties</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportStockOut()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockOutModal">
                            <i class="fas fa-plus me-2"></i>Issue Stock
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">18</h3>
                        <p class="stat-label">Today's Issues</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">450</h3>
                        <p class="stat-label">Items Issued</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">RWF 2.1M</h3>
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
                        <h3 class="stat-value">5</h3>
                        <p class="stat-label">Pending Approval</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Stock Out Records</h5>
                <span class="text-muted">Latest stock issues and requests</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Requested By</th>
                                <th>Department</th>
                                <th>Issue Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>REQ-2024-015</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stock-item-icon bg-warning me-2" style="width: 30px; height: 30px; font-size: 0.875rem;">
                                            <i class="fas fa-print"></i>
                                        </div>
                                        <div>
                                            <strong>HP LaserJet Printer</strong>
                                            <br><small class="text-muted">SKU-002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>-2</td>
                                <td>John Smith</td>
                                <td>IT Department</td>
                                <td>Dec 17, 2024</td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewStockOut('REQ-2024-015')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>REQ-2024-016</strong></td>
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
                                <td>-5</td>
                                <td>Jane Doe</td>
                                <td>Sales Department</td>
                                <td>Dec 16, 2024</td>
                                <td><span class="badge bg-success">Issued</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewStockOut('REQ-2024-016')">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <h5>Quick Stock Out Request</h5>
                <span class="text-muted">Fast stock issue request</span>
            </div>
            <div class="card-body">
                <form id="quickStockOutForm">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="quickOutItem" class="form-label">Stock Item *</label>
                            <select class="form-select" id="quickOutItem" name="item_id" required>
                                <option value="">Select Item</option>
                                <option value="1">Laptop Dell XPS 13 (SKU-001)</option>
                                <option value="2">HP LaserJet Printer (SKU-002)</option>
                                <option value="3">Wireless Mouse (SKU-003)</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickOutQuantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="quickOutQuantity" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickOutDepartment" class="form-label">Department *</label>
                            <select class="form-select" id="quickOutDepartment" name="department" required>
                                <option value="">Select Dept</option>
                                <option value="it">IT Department</option>
                                <option value="sales">Sales Department</option>
                                <option value="hr">HR Department</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="quickOutReason" class="form-label">Reason</label>
                            <input type="text" class="form-control" id="quickOutReason" name="reason" placeholder="e.g., Office use">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-arrow-up me-2"></i>Request Issue
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Stock Out Modal -->
<div class="modal fade" id="stockOutModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Issue Stock Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="stockOutForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stockOutRequestId" class="form-label">Request ID</label>
                            <input type="text" class="form-control" id="stockOutRequestId" name="request_id" placeholder="REQ-2024-XXX" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stockOutDate" class="form-label">Issue Date *</label>
                            <input type="date" class="form-control" id="stockOutDate" name="issue_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stockOutRequestedBy" class="form-label">Requested By *</label>
                            <input type="text" class="form-control" id="stockOutRequestedBy" name="requested_by" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stockOutDepartment" class="form-label">Department *</label>
                            <select class="form-select" id="stockOutDepartment" name="department" required>
                                <option value="">Select Department</option>
                                <option value="it">IT Department</option>
                                <option value="sales">Sales Department</option>
                                <option value="hr">HR Department</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="stockOutReason" class="form-label">Reason for Issue *</label>
                        <textarea class="form-control" id="stockOutReason" name="reason" rows="2" placeholder="Please provide a detailed reason for this stock issue..." required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitStockOut()">
                    <i class="fas fa-save me-2"></i>Submit Request
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('stockOutDate').valueAsDate = new Date();
document.getElementById('stockOutRequestId').value = 'REQ-' + new Date().getFullYear() + '-' + String(Math.floor(Math.random() * 1000)).padStart(3, '0');

function viewStockOut(requestId) {
    alert('View stock out ' + requestId + ' functionality would be implemented here');
}

function exportStockOut() {
    alert('Export stock out functionality would be implemented here');
}

function submitStockOut() {
    const form = document.getElementById('stockOutForm');
    if (form.checkValidity()) {
        alert('Stock out request submitted successfully!');
        form.reset();
        document.getElementById('stockOutDate').valueAsDate = new Date();
        document.getElementById('stockOutRequestId').value = 'REQ-' + new Date().getFullYear() + '-' + String(Math.floor(Math.random() * 1000)).padStart(3, '0');
        const modal = bootstrap.Modal.getInstance(document.getElementById('stockOutModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

document.getElementById('quickStockOutForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Quick stock out request submitted successfully!');
    this.reset();
});
</script>

<?php include 'includes/footer.php'; ?>
