<?php
$page_title = 'Machine Usage';
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
                    <a class="nav-link active" href="machine-usage.php">
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
                        <h2>Machine Usage Management</h2>
                        <p class="text-muted mb-0">Monitor and manage machine operations and efficiency</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('machine-usage')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#machineUsageModal">
                            <i class="fas fa-plus me-2"></i>Record Usage
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Machine Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">12</h3>
                        <p class="stat-label">Total Machines</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-play"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Active Machines</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">3</h3>
                        <p class="stat-label">In Maintenance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">87.5%</h3>
                        <p class="stat-label">Average Efficiency</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Machine Status Overview -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Machine Status Overview</h5>
                        <span class="text-muted">Current machine operations and status</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Machine</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Current Operator</th>
                                        <th>Efficiency</th>
                                        <th>Last Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-machine-id="1" data-status="active">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>Mixer A1</strong>
                                                <br><small class="text-muted">Industrial Mixer 5000</small>
                                            </div>
                                        </td>
                                        <td>Production Line A</td>
                                        <td><span class="machine-status active">Active</span></td>
                                        <td>John Smith</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 92%"></div>
                                            </div>
                                            <small class="text-muted">92%</small>
                                        </td>
                                        <td>2 hours ago</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning" onclick="stopMachine(1)">
                                                <i class="fas fa-stop me-1"></i>Stop
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-machine-id="2" data-status="active">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>Oven B1</strong>
                                                <br><small class="text-muted">Conveyor Oven 2000</small>
                                            </div>
                                        </td>
                                        <td>Production Line A</td>
                                        <td><span class="machine-status active">Active</span></td>
                                        <td>Jane Doe</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 88%"></div>
                                            </div>
                                            <small class="text-muted">88%</small>
                                        </td>
                                        <td>1 hour ago</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning" onclick="stopMachine(2)">
                                                <i class="fas fa-stop me-1"></i>Stop
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-machine-id="3" data-status="maintenance">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-warning rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>Packager C1</strong>
                                                <br><small class="text-muted">Auto Packager 3000</small>
                                            </div>
                                        </td>
                                        <td>Production Line A</td>
                                        <td><span class="machine-status maintenance">Maintenance</span></td>
                                        <td>-</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 0%"></div>
                                            </div>
                                            <small class="text-muted">0%</small>
                                        </td>
                                        <td>6 hours ago</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success" onclick="startMachine(3)">
                                                <i class="fas fa-play me-1"></i>Start
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-machine-id="4" data-status="inactive">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-secondary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>Mixer A2</strong>
                                                <br><small class="text-muted">Industrial Mixer 5000</small>
                                            </div>
                                        </td>
                                        <td>Production Line B</td>
                                        <td><span class="machine-status inactive">Inactive</span></td>
                                        <td>-</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-secondary" style="width: 0%"></div>
                                            </div>
                                            <small class="text-muted">0%</small>
                                        </td>
                                        <td>1 day ago</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success" onclick="startMachine(4)">
                                                <i class="fas fa-play me-1"></i>Start
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Machine Efficiency</h5>
                        <span class="text-muted">Performance metrics</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Mixer A1</span>
                                <span>92%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: 92%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Oven B1</span>
                                <span>88%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: 88%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Packager C1</span>
                                <span>0%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" style="width: 0%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Mixer A2</span>
                                <span>0%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" style="width: 0%"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <strong>Overall Efficiency: 87.5%</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Machine Usage History -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Recent Machine Usage</h5>
                <span class="text-muted">Latest machine operation records</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Machine</th>
                                <th>Operator</th>
                                <th>Product</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Hours Worked</th>
                                <th>Efficiency</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Mixer A1</strong></td>
                                <td>John Smith</td>
                                <td>BISCUIT Classic</td>
                                <td>Dec 17, 08:00</td>
                                <td>Dec 17, 16:00</td>
                                <td>8.0 hours</td>
                                <td><span class="quality-score excellent">92%</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMachineUsage(1)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Oven B1</strong></td>
                                <td>Jane Doe</td>
                                <td>BISCUIT Premium</td>
                                <td>Dec 17, 08:00</td>
                                <td>Dec 17, 16:00</td>
                                <td>8.0 hours</td>
                                <td><span class="quality-score good">88%</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMachineUsage(2)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Packager C1</strong></td>
                                <td>Mike Johnson</td>
                                <td>BISCUIT Chocolate</td>
                                <td>Dec 16, 08:00</td>
                                <td>Dec 16, 14:00</td>
                                <td>6.0 hours</td>
                                <td><span class="quality-score average">85%</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewMachineUsage(3)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Machine Usage Modal -->
<div class="modal fade" id="machineUsageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record Machine Usage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="machineUsageForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="usageMachine" class="form-label">Machine *</label>
                            <select class="form-select" id="usageMachine" name="machine_id" required>
                                <option value="">Select Machine</option>
                                <option value="1">Mixer A1</option>
                                <option value="2">Oven B1</option>
                                <option value="3">Packager C1</option>
                                <option value="4">Mixer A2</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usageOperator" class="form-label">Operator *</label>
                            <select class="form-select" id="usageOperator" name="operator_id" required>
                                <option value="">Select Operator</option>
                                <option value="1">John Smith</option>
                                <option value="2">Jane Doe</option>
                                <option value="3">Mike Johnson</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="usageProduct" class="form-label">Product</label>
                            <select class="form-select" id="usageProduct" name="product_id">
                                <option value="">Select Product</option>
                                <option value="1">BISCUIT Classic</option>
                                <option value="2">BISCUIT Premium</option>
                                <option value="3">BISCUIT Chocolate</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usageStartTime" class="form-label">Start Time *</label>
                            <input type="datetime-local" class="form-control" id="usageStartTime" name="start_time" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="usageEndTime" class="form-label">End Time</label>
                            <input type="datetime-local" class="form-control" id="usageEndTime" name="end_time">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usageEfficiency" class="form-label">Efficiency (%)</label>
                            <input type="number" class="form-control" id="usageEfficiency" name="efficiency_percentage" min="0" max="100" value="90">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="usageNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="usageNotes" name="notes" rows="3" placeholder="Any notes about machine operation..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitMachineUsage()">
                    <i class="fas fa-save me-2"></i>Record Usage
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Set default start time to current time
document.getElementById('usageStartTime').value = new Date().toISOString().slice(0, 16);

// Machine usage functions
function viewMachineUsage(id) {
    alert('View machine usage ' + id + ' functionality would be implemented here');
}

function startMachine(machineId) {
    if (confirm('Are you sure you want to start this machine?')) {
        alert('Machine ' + machineId + ' started successfully!');
        // Update UI would go here
    }
}

function stopMachine(machineId) {
    if (confirm('Are you sure you want to stop this machine?')) {
        alert('Machine ' + machineId + ' stopped successfully!');
        // Update UI would go here
    }
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitMachineUsage() {
    const form = document.getElementById('machineUsageForm');
    if (form.checkValidity()) {
        alert('Machine usage recorded successfully!');
        form.reset();
        document.getElementById('usageStartTime').value = new Date().toISOString().slice(0, 16);
        const modal = bootstrap.Modal.getInstance(document.getElementById('machineUsageModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Machine status filter functionality
document.getElementById('machineStatusFilter').addEventListener('change', function() {
    const selectedStatus = this.value;
    const machines = document.querySelectorAll('.machine-item');
    
    machines.forEach(machine => {
        const machineStatus = machine.dataset.status;
        if (selectedStatus === '' || machineStatus === selectedStatus) {
            machine.style.display = 'block';
        } else {
            machine.style.display = 'none';
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
