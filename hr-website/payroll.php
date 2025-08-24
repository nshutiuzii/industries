<?php
$page_title = 'Payroll Management';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

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
                            <a class="nav-link" href="all-employees.php">
                                <i class="fas fa-users"></i>
                                <span>All Employees</span>
                                <span class="item-counter">10</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-employee.php">
                                <i class="fas fa-user-plus"></i>
                                <span>Add Employee</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="departments.php">
                                <i class="fas fa-building"></i>
                                <span>Departments</span>
                                <span class="item-counter">5</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="daily-attendance.php">
                                <i class="fas fa-clock"></i>
                                <span>Daily Attendance</span>
                                <span class="item-counter">9</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shifts.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Shifts</span>
                                <span class="item-counter">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attendance-reports.php">
                                <i class="fas fa-chart-bar"></i>
                                <span>Attendance Reports</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="leave.php">
                                <i class="fas fa-calendar-check"></i>
                                <span>Leave</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="payroll.php">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Payroll</span>
                                <span class="item-counter">10</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="performance.php">
                                <i class="fas fa-chart-line"></i>
                                <span>Performance</span>
                                <span class="item-counter">8</span>
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
                            <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isHRManager() ? 'HR Manager' : 'Employee'); ?></p>
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
                            <h2>Payroll Management</h2>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary" onclick="exportPayroll()">
                                    <i class="fas fa-download me-2"></i>Export
                                </button>
                                <button class="btn btn-primary" onclick="processPayroll()">
                                    <i class="fas fa-calculator me-2"></i>Process Payroll
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payroll Statistics -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">RWF 8.5M</h3>
                                <p class="stat-label">Total Payroll</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">10</h3>
                                <p class="stat-label">Employees</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">December</h3>
                                <p class="stat-label">Current Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">Pending</h3>
                                <p class="stat-label">Status</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payroll Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Employee Payroll</h5>
                                <span class="text-muted">December 2024</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Basic Salary</th>
                                                <th>Allowances</th>
                                                <th>Deductions</th>
                                                <th>Net Salary</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-primary me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>John Doe</strong>
                                                            <br><small class="text-muted">EMP001 - HR</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 500,000</td>
                                                <td>RWF 50,000</td>
                                                <td>RWF 25,000</td>
                                                <td><strong>RWF 525,000</strong></td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="viewPayroll(1)">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Process</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-success me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Jane Smith</strong>
                                                            <br><small class="text-muted">EMP002 - IT</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 600,000</td>
                                                <td>RWF 60,000</td>
                                                <td>RWF 30,000</td>
                                                <td><strong>RWF 630,000</strong></td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="viewPayroll(2)">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Process</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-info me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Mike Johnson</strong>
                                                            <br><small class="text-muted">EMP003 - Finance</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>RWF 550,000</td>
                                                <td>RWF 55,000</td>
                                                <td>RWF 27,500</td>
                                                <td><strong>RWF 577,500</strong></td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="viewPayroll(3)">View</button>
                                                    <button class="btn btn-sm btn-outline-success">Process</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.employee-avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.table td {
    vertical-align: middle;
}
</style>

<script>
// View payroll details
function viewPayroll(employeeId) {
    console.log('Viewing payroll for employee:', employeeId);
    alert('Payroll details would be displayed here');
}

// Process payroll
function processPayroll() {
    if (confirm('Are you sure you want to process payroll for all employees?')) {
        console.log('Processing payroll...');
        alert('Payroll processing started successfully!');
    }
}

// Export payroll
function exportPayroll() {
    alert('Payroll export functionality would be implemented here');
}
</script>

<?php include 'includes/footer.php'; ?>
