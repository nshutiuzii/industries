<?php
$page_title = 'Overview';
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
                    <a class="nav-link active" href="index.php">
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
                        <h2>Production Dashboard</h2>
                        <p class="text-muted mb-0">Monitor production performance and key metrics</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('dashboard')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickActionModal">
                            <i class="fas fa-plus me-2"></i>Quick Action
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value" data-target="1250">1250</h3>
                        <p class="stat-label">Units Produced Today</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value" data-target="87">87</h3>
                        <p class="stat-label">Efficiency Rate</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value" data-target="12">12</h3>
                        <p class="stat-label">Active Machines</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value" data-target="96">96</h3>
                        <p class="stat-label">Quality Score</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Production Overview -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Today's Production Overview</h5>
                        <span class="text-muted">Real-time production status</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Target</th>
                                        <th>Produced</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>BISCUIT Classic</strong>
                                            </div>
                                        </td>
                                        <td>500 units</td>
                                        <td>450 units</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" style="width: 90%"></div>
                                            </div>
                                            <small class="text-muted">90%</small>
                                        </td>
                                        <td><span class="badge bg-success">On Track</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>BISCUIT Premium</strong>
                                            </div>
                                        </td>
                                        <td>300 units</td>
                                        <td>280 units</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 93%"></div>
                                            </div>
                                            <small class="text-muted">93%</small>
                                        </td>
                                        <td><span class="badge bg-success">On Track</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-warning rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                                                <strong>BISCUIT Chocolate</strong>
                                            </div>
                                        </td>
                                        <td>400 units</td>
                                        <td>320 units</td>
                                        <td>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 80%"></div>
                                            </div>
                                            <small class="text-muted">80%</small>
                                        </td>
                                        <td><span class="badge bg-warning">Behind Schedule</span></td>
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
                        <h5>Machine Status</h5>
                        <span class="text-muted">Current machine operations</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <strong>Mixer A1</strong>
                                <br><small class="text-muted">Production Line A</small>
                            </div>
                            <span class="machine-status active">Active</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <strong>Oven B1</strong>
                                <br><small class="text-muted">Production Line A</small>
                            </div>
                            <span class="machine-status active">Active</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <strong>Packager C1</strong>
                                <br><small class="text-muted">Production Line A</small>
                            </div>
                            <span class="machine-status maintenance">Maintenance</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <strong>Mixer A2</strong>
                                <br><small class="text-muted">Production Line B</small>
                            </div>
                            <span class="machine-status inactive">Inactive</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities and Quick Actions -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent Production Activities</h5>
                        <span class="text-muted">Latest production logs</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success rounded-circle me-3" style="width: 8px; height: 8px;"></div>
                            <div class="flex-grow-1">
                                <strong>Production completed</strong>
                                <br><small class="text-muted">BISCUIT Classic - 500 units at 96% quality</small>
                            </div>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info rounded-circle me-3" style="width: 8px; height: 8px;"></div>
                            <div class="flex-grow-1">
                                <strong>Machine started</strong>
                                <br><small class="text-muted">Oven B1 started for BISCUIT Premium production</small>
                            </div>
                            <small class="text-muted">4 hours ago</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning rounded-circle me-3" style="width: 8px; height: 8px;"></div>
                            <div class="flex-grow-1">
                                <strong>Maintenance alert</strong>
                                <br><small class="text-muted">Packager C1 scheduled for maintenance</small>
                            </div>
                            <small class="text-muted">6 hours ago</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle me-3" style="width: 8px; height: 8px;"></div>
                            <div class="flex-grow-1">
                                <strong>New production plan</strong>
                                <br><small class="text-muted">BISCUIT Chocolate - 400 units target</small>
                            </div>
                            <small class="text-muted">8 hours ago</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quick Actions</h5>
                        <span class="text-muted">Common production tasks</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6">
                                <button class="btn btn-outline-primary w-100 mb-2" onclick="quickStartProduction()">
                                    <i class="fas fa-play me-2"></i>Start Production
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-success w-100 mb-2" onclick="quickLogProduction()">
                                    <i class="fas fa-plus me-2"></i>Log Production
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-warning w-100 mb-2" onclick="quickMachineCheck()">
                                    <i class="fas fa-cogs me-2"></i>Machine Check
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-info w-100 mb-2" onclick="quickQualityCheck()">
                                    <i class="fas fa-check-circle me-2"></i>Quality Check
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="production-plans.php" class="btn btn-primary">
                                <i class="fas fa-clipboard-list me-2"></i>View All Plans
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Action Modal -->
<div class="modal fade" id="quickActionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quick Production Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <button class="btn btn-outline-primary w-100 h-100 py-4" onclick="quickStartProduction()">
                            <i class="fas fa-play fa-2x mb-2"></i><br>
                            Start Production
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-success w-100 h-100 py-4" onclick="quickLogProduction()">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            Log Production
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-warning w-100 h-100 py-4" onclick="quickMachineCheck()">
                            <i class="fas fa-cogs fa-2x mb-2"></i><br>
                            Machine Check
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-info w-100 h-100 py-4" onclick="quickQualityCheck()">
                            <i class="fas fa-check-circle fa-2x mb-2"></i><br>
                            Quality Check
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Quick action functions
function quickStartProduction() {
    alert('Quick start production functionality would be implemented here');
    const modal = bootstrap.Modal.getInstance(document.getElementById('quickActionModal'));
    modal.hide();
}

function quickLogProduction() {
    alert('Quick log production functionality would be implemented here');
    const modal = bootstrap.Modal.getInstance(document.getElementById('quickActionModal'));
    modal.hide();
}

function quickMachineCheck() {
    alert('Quick machine check functionality would be implemented here');
    const modal = bootstrap.Modal.getInstance(document.getElementById('quickActionModal'));
    modal.hide();
}

function quickQualityCheck() {
    alert('Quick quality check functionality would be implemented here');
    const modal = bootstrap.Modal.getInstance(document.getElementById('quickActionModal'));
    modal.hide();
}
</script>

<?php include 'includes/footer.php'; ?>
