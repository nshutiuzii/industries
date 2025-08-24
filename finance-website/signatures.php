<?php
$page_title = 'Signatures';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Signatures</h1>
                <p class="dashboard-subtitle">Financial Management System</p>
            </div>
            <div class="col-lg-4 text-end">
                <div class="user-info">
                    <span class="user-name"><?php echo isLoggedIn() ? $_SESSION['user_name'] : 'Guest User'; ?></span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <div class="row">
        <!-- Left Sidebar Navigation -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar">
                <div class="sidebar-header">
                    <h5>Navigation</h5>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="budgets.php">
                                <i class="fas fa-chart-pie"></i>
                                <span>Budgets</span>
                                <span class="item-counter">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="income.php">
                                <i class="fas fa-arrow-up text-success"></i>
                                <span>Income</span>
                                <span class="item-counter">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="expenses.php">
                                <i class="fas fa-arrow-down text-danger"></i>
                                <span>Expenses</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="payroll.php">
                                <i class="fas fa-users"></i>
                                <span>Payroll</span>
                                <span class="item-counter">15</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="transactions.php">
                                <i class="fas fa-exchange-alt"></i>
                                <span>Transactions</span>
                                <span class="item-counter">24</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="recurring.php">
                                <i class="fas fa-redo"></i>
                                <span>Recurring</span>
                                <span class="item-counter">7</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="fas fa-university"></i>
                                <span>Accounts</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="purchase-orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Purchase Orders</span>
                                <span class="item-counter">9</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="petty-cash.php">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Petty Cash</span>
                                <span class="item-counter">4</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="invoices.php">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span>Invoices</span>
                                <span class="item-counter">18</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="assets.php">
                                <i class="fas fa-building"></i>
                                <span>Assets</span>
                                <span class="item-counter">11</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cost-centers.php">
                                <i class="fas fa-sitemap"></i>
                                <span>Cost Centers</span>
                                <span class="item-counter">6</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="approvals.php">
                                <i class="fas fa-check-circle"></i>
                                <span>Approvals</span>
                                <span class="item-counter">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alerts.php">
                                <i class="fas fa-bell"></i>
                                <span>Alerts</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documents.php">
                                <i class="fas fa-file-alt"></i>
                                <span>Documents</span>
                                <span class="item-counter">25</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="signatures.php">
                                <i class="fas fa-signature"></i>
                                <span>Signatures</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="reports.php">
                                <i class="fas fa-chart-bar"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="audit-log.php">
                                <i class="fas fa-history"></i>
                                <span>Audit Log</span>
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
                            <p class="user-role"><?php echo isAdmin() ? 'Administrator' : 'User'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Dashboard Content -->
        <div class="col-lg-9 col-md-8">
            <div class="dashboard-content">
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Digital Signature Management</h2>
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">My Signatures</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSignatureModal">
                                    <i class="fas fa-plus me-2"></i>Create Signature
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Signature Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
                                <p class="stat-label">Pending Signatures</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">24</h3>
                                <p class="stat-label">Completed This Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">12</h3>
                                <p class="stat-label">Active Signers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">156</h3>
                                <p class="stat-label">Total Documents</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Signature Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Document Type</label>
                                        <select class="form-select">
                                            <option>All Types</option>
                                            <option>Invoice</option>
                                            <option>Contract</option>
                                            <option>Purchase Order</option>
                                            <option>Approval Form</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select">
                                            <option>All Statuses</option>
                                            <option>Pending</option>
                                            <option>In Progress</option>
                                            <option>Completed</option>
                                            <option>Rejected</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Priority</label>
                                        <select class="form-select">
                                            <option>All Priorities</option>
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                            <option>Urgent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Date Range</label>
                                        <select class="form-select">
                                            <option>Last 7 Days</option>
                                            <option>Last 30 Days</option>
                                            <option>Last 3 Months</option>
                                            <option>Last Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pending Signatures -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Pending Signatures</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Export</button>
                                    <button class="btn btn-sm btn-outline-success">Bulk Sign</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="signature-requests">
                                    <div class="signature-item">
                                        <div class="signature-header">
                                            <div class="signature-type">
                                                <span class="badge bg-primary">Invoice</span>
                                            </div>
                                            <div class="signature-priority">
                                                <span class="badge bg-danger">High</span>
                                            </div>
                                        </div>
                                        <div class="signature-content">
                                            <h6>Invoice INV-2024-018 - ABC Corporation</h6>
                                            <p class="text-muted">Professional consulting services for Q1 2024</p>
                                            <div class="signature-details">
                                                <span><strong>Amount:</strong> RWF 3,200,000</span>
                                                <span><strong>Due Date:</strong> 2024-01-25</span>
                                                <span><strong>Requester:</strong> Jane Smith</span>
                                                <span><strong>Created:</strong> 2024-01-15</span>
                                            </div>
                                        </div>
                                        <div class="signature-actions">
                                            <button class="btn btn-sm btn-success">Sign Document</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            <button class="btn btn-sm btn-outline-danger">Reject</button>
                                        </div>
                                    </div>
                                    
                                    <div class="signature-item">
                                        <div class="signature-header">
                                            <div class="signature-type">
                                                <span class="badge bg-info">Contract</span>
                                            </div>
                                            <div class="signature-priority">
                                                <span class="badge bg-warning">Medium</span>
                                            </div>
                                        </div>
                                        <div class="signature-content">
                                            <h6>Service Agreement - XYZ Technologies Ltd</h6>
                                            <p class="text-muted">Annual IT infrastructure maintenance contract</p>
                                            <div class="signature-details">
                                                <span><strong>Value:</strong> RWF 8,500,000</span>
                                                <span><strong>Duration:</strong> 12 months</span>
                                                <span><strong>Requester:</strong> Mike Johnson</span>
                                                <span><strong>Created:</strong> 2024-01-14</span>
                                            </div>
                                        </div>
                                        <div class="signature-actions">
                                            <button class="btn btn-sm btn-success">Sign Document</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            <button class="btn btn-sm btn-outline-danger">Reject</button>
                                        </div>
                                    </div>
                                    
                                    <div class="signature-item">
                                        <div class="signature-header">
                                            <div class="signature-type">
                                                <span class="badge bg-warning">Purchase Order</span>
                                            </div>
                                            <div class="signature-priority">
                                                <span class="badge bg-success">Low</span>
                                            </div>
                                        </div>
                                        <div class="signature-content">
                                            <h6>PO-2024-005 - Office Equipment</h6>
                                            <p class="text-muted">New office furniture and equipment for expansion</p>
                                            <div class="signature-details">
                                                <span><strong>Amount:</strong> RWF 1,800,000</span>
                                                <span><strong>Vendor:</strong> Office Supplies Co</span>
                                                <span><strong>Requester:</strong> Sarah Wilson</span>
                                                <span><strong>Created:</strong> 2024-01-13</span>
                                            </div>
                                        </div>
                                        <div class="signature-actions">
                                            <button class="btn btn-sm btn-success">Sign Document</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            <button class="btn btn-sm btn-outline-danger">Reject</button>
                                        </div>
                                    </div>
                                    
                                    <div class="signature-item">
                                        <div class="signature-header">
                                            <div class="signature-type">
                                                <span class="badge bg-secondary">Approval Form</span>
                                            </div>
                                            <div class="signature-priority">
                                                <span class="badge bg-warning">Medium</span>
                                            </div>
                                        </div>
                                        <div class="signature-content">
                                            <h6>Budget Adjustment Request - Marketing Department</h6>
                                            <p class="text-muted">Q1 budget reallocation for digital marketing campaign</p>
                                            <div class="signature-details">
                                                <span><strong>Amount:</strong> RWF 500,000</span>
                                                <span><strong>Department:</strong> Marketing</span>
                                                <span><strong>Requester:</strong> David Brown</span>
                                                <span><strong>Created:</strong> 2024-01-12</span>
                                            </div>
                                        </div>
                                        <div class="signature-actions">
                                            <button class="btn btn-sm btn-success">Sign Document</button>
                                            <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            <button class="btn btn-sm btn-outline-danger">Reject</button>
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
</div>

<!-- Create Signature Modal -->
<div class="modal fade" id="createSignatureModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Digital Signature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Signature Name</label>
                        <input type="text" class="form-control" placeholder="Enter signature name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signature Type</label>
                        <select class="form-select">
                            <option>Personal Signature</option>
                            <option>Company Signature</option>
                            <option>Department Signature</option>
                            <option>Role-based Signature</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signature Method</label>
                        <select class="form-select">
                            <option>Draw Signature</option>
                            <option>Upload Image</option>
                            <option>Type Signature</option>
                            <option>Use Stored Signature</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signature Canvas</label>
                        <div class="signature-canvas-container">
                            <canvas id="signatureCanvas" width="400" height="200" style="border: 1px solid #ccc; border-radius: 8px;"></canvas>
                            <div class="mt-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearSignature()">Clear</button>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="undoSignature()">Undo</button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Default Message</label>
                        <textarea class="form-control" rows="3" placeholder="Default message to include with signature"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Security Level</label>
                        <select class="form-select">
                            <option>Standard</option>
                            <option>Enhanced</option>
                            <option>High Security</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Signature</button>
            </div>
        </div>
    </div>
</div>

<style>
.signature-requests {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.signature-item {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.signature-item:hover {
    box-shadow: var(--shadow);
    transform: translateY(-2px);
}

.signature-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.signature-content h6 {
    margin: 0 0 0.5rem 0;
    font-size: 1.1rem;
    font-weight: 600;
}

.signature-content p {
    margin: 0 0 1rem 0;
    color: var(--text-muted);
}

.signature-details {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
    margin-bottom: 1.5rem;
}

.signature-details span {
    font-size: 0.9rem;
    color: var(--text-muted);
}

.signature-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.signature-canvas-container {
    text-align: center;
}

#signatureCanvas {
    cursor: crosshair;
}

@media (max-width: 768px) {
    .signature-details {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .signature-actions {
        flex-direction: column;
    }
    
    .signature-actions .btn {
        width: 100%;
    }
}
</style>

<script>
// Signature Canvas Functionality
let canvas = document.getElementById('signatureCanvas');
let ctx = canvas.getContext('2d');
let isDrawing = false;
let lastX = 0;
let lastY = 0;

// Set canvas style
ctx.strokeStyle = '#000';
ctx.lineWidth = 2;
ctx.lineCap = 'round';

// Mouse events
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mouseout', stopDrawing);

// Touch events for mobile
canvas.addEventListener('touchstart', startDrawingTouch);
canvas.addEventListener('touchmove', drawTouch);
canvas.addEventListener('touchend', stopDrawing);

function startDrawing(e) {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
}

function draw(e) {
    if (!isDrawing) return;
    
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
    
    [lastX, lastY] = [e.offsetX, e.offsetY];
}

function startDrawingTouch(e) {
    e.preventDefault();
    isDrawing = true;
    let rect = canvas.getBoundingClientRect();
    let touch = e.touches[0];
    [lastX, lastY] = [touch.clientX - rect.left, touch.clientY - rect.top];
}

function drawTouch(e) {
    e.preventDefault();
    if (!isDrawing) return;
    
    let rect = canvas.getBoundingClientRect();
    let touch = e.touches[0];
    let currentX = touch.clientX - rect.left;
    let currentY = touch.clientY - rect.top;
    
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(currentX, currentY);
    ctx.stroke();
    
    [lastX, lastY] = [currentX, currentY];
}

function stopDrawing() {
    isDrawing = false;
}

function clearSignature() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function undoSignature() {
    // Simple undo - clear and redraw (in a real app, you'd store drawing history)
    clearSignature();
}
</script>

<?php include 'includes/footer.php'; ?>
