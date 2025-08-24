<?php
$page_title = 'Daily Production Log';
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
                    <a class="nav-link active" href="daily-production-log.php">
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
                    <a class="nav-link" href="material-tracker.php">
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
                        <h2>Daily Production Log</h2>
                        <p class="text-muted mb-0">Record and track daily production activities</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('daily-log')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productionLogModal">
                            <i class="fas fa-plus me-2"></i>Log Production
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Log Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">25</h3>
                        <p class="stat-label">Today's Entries</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">1,250</h3>
                        <p class="stat-label">Units Produced</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">96.5%</h3>
                        <p class="stat-label">Quality Score</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Active Operators</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Filter and Search -->
        <div class="row mb-4">
            <div class="col-lg-4 mb-3">
                <label for="logDate" class="form-label">Production Date</label>
                <input type="date" class="form-control" id="logDate" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-lg-4 mb-3">
                <label for="logProduct" class="form-label">Product Filter</label>
                <select class="form-select" id="logProduct">
                    <option value="">All Products</option>
                    <option value="biscuit-classic">BISCUIT Classic</option>
                    <option value="biscuit-premium">BISCUIT Premium</option>
                    <option value="biscuit-chocolate">BISCUIT Chocolate</option>
                </select>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="logMachine" class="form-label">Machine Filter</label>
                <select class="form-select" id="logMachine">
                    <option value="">All Machines</option>
                    <option value="mixer-a1">Mixer A1</option>
                    <option value="oven-b1">Oven B1</option>
                    <option value="packager-c1">Packager C1</option>
                </select>
            </div>
        </div>

        <!-- Production Log Table -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Production Log Entries</h5>
                <span class="text-muted">Today's production activities</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Product</th>
                                <th>Machine</th>
                                <th>Operator</th>
                                <th>Quantity</th>
                                <th>Quality Score</th>
                                <th>Shift Time</th>
                                <th>Downtime</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>08:00 - 16:00</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                        <strong>BISCUIT Classic</strong>
                                    </div>
                                </td>
                                <td>Mixer A1</td>
                                <td>John Smith</td>
                                <td>500 units</td>
                                <td><span class="quality-score excellent">98%</span></td>
                                <td>8 hours</td>
                                <td>15 min</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewLogEntry(1)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>08:00 - 16:00</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                        <strong>BISCUIT Premium</strong>
                                    </div>
                                </td>
                                <td>Oven B1</td>
                                <td>Jane Doe</td>
                                <td>300 units</td>
                                <td><span class="quality-score good">95%</span></td>
                                <td>8 hours</td>
                                <td>20 min</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewLogEntry(2)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>08:00 - 16:00</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                        <strong>BISCUIT Chocolate</strong>
                                    </div>
                                </td>
                                <td>Packager C1</td>
                                <td>Mike Johnson</td>
                                <td>400 units</td>
                                <td><span class="quality-score average">92%</span></td>
                                <td>8 hours</td>
                                <td>30 min</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewLogEntry(3)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Log Entry -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Quick Production Entry</h5>
                <span class="text-muted">Fast entry for single production activities</span>
            </div>
            <div class="card-body">
                <form id="quickLogForm">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="quickProduct" class="form-label">Product *</label>
                            <select class="form-select" id="quickProduct" name="product_id" required>
                                <option value="">Select Product</option>
                                <option value="1">BISCUIT Classic</option>
                                <option value="2">BISCUIT Premium</option>
                                <option value="3">BISCUIT Chocolate</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="quickMachine" class="form-label">Machine *</label>
                            <select class="form-select" id="quickMachine" name="machine_id" required>
                                <option value="">Select Machine</option>
                                <option value="1">Mixer A1</option>
                                <option value="2">Oven B1</option>
                                <option value="3">Packager C1</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickQuantity" class="form-label">Quantity *</label>
                            <input type="number" class="form-control" id="quickQuantity" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quickQuality" class="form-label">Quality %</label>
                            <input type="number" class="form-control" id="quickQuality" name="quality_score" min="0" max="100" value="95">
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

<!-- Production Log Modal -->
<div class="modal fade" id="productionLogModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Log Production Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="productionLogForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logProductSelect" class="form-label">Product *</label>
                            <select class="form-select" id="logProductSelect" name="product_id" required>
                                <option value="">Select Product</option>
                                <option value="1">BISCUIT Classic</option>
                                <option value="2">BISCUIT Premium</option>
                                <option value="3">BISCUIT Chocolate</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logMachineSelect" class="form-label">Machine *</label>
                            <select class="form-select" id="logMachineSelect" name="machine_id" required>
                                <option value="">Select Machine</option>
                                <option value="1">Mixer A1</option>
                                <option value="2">Oven B1</option>
                                <option value="3">Packager C1</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logQuantity" class="form-label">Quantity Produced *</label>
                            <input type="number" class="form-control" id="logQuantity" name="quantity_produced" min="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logQuality" class="form-label">Quality Score (%)</label>
                            <input type="number" class="form-control" id="logQuality" name="quality_score" min="0" max="100" value="95">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logShiftStart" class="form-label">Shift Start Time</label>
                            <input type="time" class="form-control" id="logShiftStart" name="shift_start" value="08:00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logShiftEnd" class="form-label">Shift End Time</label>
                            <input type="time" class="form-control" id="logShiftEnd" name="shift_end" value="16:00">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logDowntime" class="form-label">Downtime (minutes)</label>
                            <input type="number" class="form-control" id="logDowntime" name="downtime_minutes" min="0" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logDate" class="form-label">Production Date</label>
                            <input type="date" class="form-control" id="logDate" name="production_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="logNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="logNotes" name="notes" rows="3" placeholder="Any special notes about this production run..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitProductionLog()">
                    <i class="fas fa-save me-2"></i>Log Production
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Production log functions
function viewLogEntry(id) {
    alert('View log entry ' + id + ' functionality would be implemented here');
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitProductionLog() {
    const form = document.getElementById('productionLogForm');
    if (form.checkValidity()) {
        alert('Production logged successfully!');
        form.reset();
        document.getElementById('logDate').valueAsDate = new Date();
        document.getElementById('logShiftStart').value = '08:00';
        document.getElementById('logShiftEnd').value = '16:00';
        const modal = bootstrap.Modal.getInstance(document.getElementById('productionLogModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Quick form submission
document.getElementById('quickLogForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Quick production entry added successfully!');
    this.reset();
});

// Date filter functionality
document.getElementById('logDate').addEventListener('change', function() {
    // Filter table based on selected date
    console.log('Filtering by date:', this.value);
});

// Product filter functionality
document.getElementById('logProduct').addEventListener('change', function() {
    // Filter table based on selected product
    console.log('Filtering by product:', this.value);
});

// Machine filter functionality
document.getElementById('logMachine').addEventListener('change', function() {
    // Filter table based on selected machine
    console.log('Filtering by machine:', this.value);
});
</script>

<?php include 'includes/footer.php'; ?>
