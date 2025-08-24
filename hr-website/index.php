<?php
$page_title = 'Dashboard';
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
                            <a class="nav-link active" href="index.php">
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
                            <a class="nav-link" href="payroll.php">
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
                <!-- Overview Statistics -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">10</h3>
                                <p class="stat-label">Total Employees</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">9</h3>
                                <p class="stat-label">Present Today</p>
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
                                <p class="stat-label">Pending Leave</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">5</h3>
                                <p class="stat-label">Departments</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Quick Actions</h5>
                                <span class="text-muted">Common HR tasks</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <a href="add-employee.php" class="text-decoration-none">
                                            <div class="quick-action-card text-center p-4 border rounded">
                                                <div class="mb-3">
                                                    <i class="fas fa-user-plus fa-2x text-primary"></i>
                                                </div>
                                                <h6>Add Employee</h6>
                                                <small class="text-muted">Register new employee</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <a href="daily-attendance.php" class="text-decoration-none">
                                            <div class="quick-action-card text-center p-4 border rounded">
                                                <div class="mb-3">
                                                    <i class="fas fa-clock fa-2x text-success"></i>
                                                </div>
                                                <h6>Mark Attendance</h6>
                                                <small class="text-muted">Record daily attendance</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <a href="leave.php" class="text-decoration-none">
                                            <div class="quick-action-card text-center p-4 border rounded">
                                                <div class="mb-3">
                                                    <i class="fas fa-calendar-check fa-2x text-warning"></i>
                                                </div>
                                                <h6>Leave Requests</h6>
                                                <small class="text-muted">Manage leave applications</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <a href="payroll.php" class="text-decoration-none">
                                            <div class="quick-action-card text-center p-4 border rounded">
                                                <div class="mb-3">
                                                    <i class="fas fa-money-bill-wave fa-2x text-info"></i>
                                                </div>
                                                <h6>Process Payroll</h6>
                                                <small class="text-muted">Generate salary payments</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Recent Activity</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="activity-list">
                                    <div class="activity-item d-flex align-items-center mb-3">
                                        <div class="activity-icon bg-success rounded-circle p-2 me-3">
                                            <i class="fas fa-user-check text-white"></i>
                                        </div>
                                        <div class="activity-content flex-grow-1">
                                            <p class="mb-0"><strong>Jane Smith</strong> clocked in at 8:15 AM</p>
                                            <small class="text-muted">2 minutes ago</small>
                                        </div>
                                    </div>
                                    <div class="activity-item d-flex align-items-center mb-3">
                                        <div class="activity-icon bg-warning rounded-circle p-2 me-3">
                                            <i class="fas fa-calendar-plus text-white"></i>
                                        </div>
                                        <div class="activity-content flex-grow-1">
                                            <p class="mb-0"><strong>Mike Johnson</strong> submitted leave request</p>
                                            <small class="text-muted">15 minutes ago</small>
                                        </div>
                                    </div>
                                    <div class="activity-item d-flex align-items-center mb-3">
                                        <div class="activity-icon bg-info rounded-circle p-2 me-3">
                                            <i class="fas fa-user-plus text-white"></i>
                                        </div>
                                        <div class="activity-content flex-grow-1">
                                            <p class="mb-0"><strong>Emily Davis</strong> was added to IT department</p>
                                            <small class="text-muted">1 hour ago</small>
                                        </div>
                                    </div>
                                    <div class="activity-item d-flex align-items-center mb-3">
                                        <div class="activity-icon bg-primary rounded-circle p-2 me-3">
                                            <i class="fas fa-star text-white"></i>
                                        </div>
                                        <div class="activity-content flex-grow-1">
                                            <p class="mb-0"><strong>Performance Review</strong> completed for David Brown</p>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                    </div>
                                    <div class="activity-item d-flex align-items-center">
                                        <div class="activity-icon bg-secondary rounded-circle p-2 me-3">
                                            <i class="fas fa-money-bill-wave text-white"></i>
                                        </div>
                                        <div class="activity-content flex-grow-1">
                                            <p class="mb-0"><strong>Payroll</strong> processed for January 2024</p>
                                            <small class="text-muted">1 day ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mb-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Department Overview</h5>
                            </div>
                            <div class="card-body">
                                <div class="department-stats">
                                    <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <strong>Human Resources</strong>
                                            <br><small class="text-muted">2 employees</small>
                                        </div>
                                        <span class="badge bg-primary">20%</span>
                                    </div>
                                    <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <strong>Information Technology</strong>
                                            <br><small class="text-muted">2 employees</small>
                                        </div>
                                        <span class="badge bg-success">20%</span>
                                    </div>
                                    <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <strong>Finance</strong>
                                            <br><small class="text-muted">2 employees</small>
                                        </div>
                                        <span class="badge bg-info">20%</span>
                                    </div>
                                    <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <strong>Marketing</strong>
                                            <br><small class="text-muted">2 employees</small>
                                        </div>
                                        <span class="badge bg-warning">20%</span>
                                    </div>
                                    <div class="department-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>Operations</strong>
                                            <br><small class="text-muted">2 employees</small>
                                        </div>
                                        <span class="badge bg-secondary">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Upcoming Events</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">View Calendar</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="event-item d-flex align-items-center p-3 border rounded">
                                            <div class="event-date text-center me-3">
                                                <div class="event-day text-primary fw-bold">25</div>
                                                <div class="event-month text-muted">Jan</div>
                                            </div>
                                            <div class="event-content">
                                                <h6 class="mb-1">Team Building Workshop</h6>
                                                <p class="mb-0 text-muted">All departments - Conference Room A</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="event-item d-flex align-items-center p-3 border rounded">
                                            <div class="event-date text-center me-3">
                                                <div class="event-day text-warning fw-bold">01</div>
                                                <div class="event-month text-muted">Feb</div>
                                            </div>
                                            <div class="event-content">
                                                <h6 class="mb-1">Performance Review Deadline</h6>
                                                <p class="mb-0 text-muted">Q4 2023 reviews due</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="event-item d-flex align-items-center p-3 border rounded">
                                            <div class="event-date text-center me-3">
                                                <div class="event-day text-success fw-bold">15</div>
                                                <div class="event-month text-muted">Feb</div>
                                            </div>
                                            <div class="event-content">
                                                <h6 class="mb-1">HR Training Session</h6>
                                                <p class="mb-0 text-muted">New policies and procedures</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="event-item d-flex align-items-center p-3 border rounded">
                                            <div class="event-date text-center me-3">
                                                <div class="event-day text-info fw-bold">28</div>
                                                <div class="event-month text-muted">Feb</div>
                                            </div>
                                            <div class="event-content">
                                                <h6 class="mb-1">Payroll Processing</h6>
                                                <p class="mb-0 text-muted">February 2024 salaries</p>
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
</div>

<style>
.quick-action-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.quick-action-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-color) !important;
}

.activity-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.department-item {
    padding: 0.5rem 0;
}

.event-date {
    min-width: 60px;
}

.event-day {
    font-size: 1.5rem;
    line-height: 1;
}

.event-month {
    font-size: 0.8rem;
    text-transform: uppercase;
}

.event-item {
    transition: all 0.3s ease;
}

.event-item:hover {
    background: var(--light-color);
    transform: translateX(5px);
}
</style>

<?php include 'includes/footer.php'; ?>
