<?php
$page_title = 'All Employees';
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
                            <a class="nav-link active" href="all-employees.php">
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
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Employee Management</h2>
                            <a href="add-employee.php" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Employee
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Search and Filters -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Search Employees</label>
                                        <input type="text" class="form-control" id="employeeSearch" placeholder="Search by name, position, or department">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" id="departmentFilter">
                                            <option value="all">All Departments</option>
                                            <option value="Human Resources">Human Resources</option>
                                            <option value="Information Technology">Information Technology</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Operations">Operations</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" id="statusFilter">
                                            <option value="all">All Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="terminated">Terminated</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">Actions</label>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-primary" onclick="exportEmployees()">
                                                <i class="fas fa-download me-1"></i>Export
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Employee Cards -->
                <div class="row" id="employeeCards">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="employee-card">
                            <div class="employee-header text-center">
                                <div class="employee-avatar mx-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-info">
                                    <h5>John Doe</h5>
                                    <div class="employee-position">HR Manager</div>
                                    <div class="employee-department">Human Resources</div>
                                </div>
                            </div>
                            <div class="employee-body">
                                <div class="employee-stats">
                                    <div class="stat-item">
                                        <h6>2.5</h6>
                                        <p>Years</p>
                                    </div>
                                    <div class="stat-item">
                                        <h6>RWF 2.5M</h6>
                                        <p>Salary</p>
                                    </div>
                                </div>
                                <div class="employee-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">john.doe@company.com</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">+250788123456</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Hire Date:</span>
                                        <span class="detail-value">2022-01-15</span>
                                    </div>
                                </div>
                            </div>
                            <div class="employee-actions">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-warning">Edit</button>
                                <button class="btn btn-sm btn-outline-info">Attendance</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="employee-card">
                            <div class="employee-header text-center">
                                <div class="employee-avatar mx-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-info">
                                    <h5>Jane Smith</h5>
                                    <div class="employee-position">Software Developer</div>
                                    <div class="employee-department">Information Technology</div>
                                </div>
                            </div>
                            <div class="employee-body">
                                <div class="employee-stats">
                                    <div class="stat-item">
                                        <h6>1.8</h6>
                                        <p>Years</p>
                                    </div>
                                    <div class="stat-item">
                                        <h6>RWF 3.0M</h6>
                                        <p>Salary</p>
                                    </div>
                                </div>
                                <div class="employee-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">jane.smith@company.com</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">+250788123457</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Hire Date:</span>
                                        <span class="detail-value">2022-03-20</span>
                                    </div>
                                </div>
                            </div>
                            <div class="employee-actions">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-warning">Edit</button>
                                <button class="btn btn-sm btn-outline-info">Attendance</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="employee-card">
                            <div class="employee-header text-center">
                                <div class="employee-avatar mx-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-info">
                                    <h5>Mike Johnson</h5>
                                    <div class="employee-position">Accountant</div>
                                    <div class="employee-department">Finance</div>
                                </div>
                            </div>
                            <div class="employee-body">
                                <div class="employee-stats">
                                    <div class="stat-item">
                                        <h6>2.0</h6>
                                        <p>Years</p>
                                    </div>
                                    <div class="stat-item">
                                        <h6>RWF 2.2M</h6>
                                        <p>Salary</p>
                                    </div>
                                </div>
                                <div class="employee-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">mike.johnson@company.com</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">+250788123458</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Hire Date:</span>
                                        <span class="detail-value">2022-02-10</span>
                                    </div>
                                </div>
                            </div>
                            <div class="employee-actions">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-warning">Edit</button>
                                <button class="btn btn-sm btn-outline-info">Attendance</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="employee-card">
                            <div class="employee-header text-center">
                                <div class="employee-avatar mx-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-info">
                                    <h5>Sarah Wilson</h5>
                                    <div class="employee-position">Marketing Specialist</div>
                                    <div class="employee-department">Marketing</div>
                                </div>
                            </div>
                            <div class="employee-body">
                                <div class="employee-stats">
                                    <div class="stat-item">
                                        <h6>1.7</h6>
                                        <p>Years</p>
                                    </div>
                                    <div class="stat-item">
                                        <h6>RWF 2.0M</h6>
                                        <p>Salary</p>
                                    </div>
                                </div>
                                <div class="employee-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">sarah.wilson@company.com</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">+250788123459</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Hire Date:</span>
                                        <span class="detail-value">2022-04-05</span>
                                    </div>
                                </div>
                            </div>
                            <div class="employee-actions">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-warning">Edit</button>
                                <button class="btn btn-sm btn-outline-info">Attendance</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="employee-card">
                            <div class="employee-header text-center">
                                <div class="employee-avatar mx-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-info">
                                    <h5>David Brown</h5>
                                    <div class="employee-position">Operations Manager</div>
                                    <div class="employee-department">Operations</div>
                                </div>
                            </div>
                            <div class="employee-body">
                                <div class="employee-stats">
                                    <div class="stat-item">
                                        <h6>2.0</h6>
                                        <p>Years</p>
                                    </div>
                                    <div class="stat-item">
                                        <h6>RWF 2.8M</h6>
                                        <p>Salary</p>
                                    </div>
                                </div>
                                <div class="employee-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">david.brown@company.com</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">+250788123460</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Hire Date:</span>
                                        <span class="detail-value">2022-01-25</span>
                                    </div>
                                </div>
                            </div>
                            <div class="employee-actions">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-warning">Edit</button>
                                <button class="btn btn-sm btn-outline-info">Attendance</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="employee-card">
                            <div class="employee-header text-center">
                                <div class="employee-avatar mx-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-info">
                                    <h5>Emily Davis</h5>
                                    <div class="employee-position">UI/UX Designer</div>
                                    <div class="employee-department">Information Technology</div>
                                </div>
                            </div>
                            <div class="employee-body">
                                <div class="employee-stats">
                                    <div class="stat-item">
                                        <h6>1.6</h6>
                                        <p>Years</p>
                                    </div>
                                    <div class="stat-item">
                                        <h6>RWF 2.5M</h6>
                                        <p>Salary</p>
                                    </div>
                                </div>
                                <div class="employee-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">emily.davis@company.com</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">+250788123461</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Hire Date:</span>
                                        <span class="detail-value">2022-05-12</span>
                                    </div>
                                </div>
                            </div>
                            <div class="employee-actions">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-warning">Edit</button>
                                <button class="btn btn-sm btn-outline-info">Attendance</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Employee pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.employee-details {
    margin-top: 1rem;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--border-color);
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    font-weight: 500;
    color: var(--text-muted);
    font-size: 0.9rem;
}

.detail-value {
    font-weight: 600;
    color: var(--text-color);
    font-size: 0.9rem;
}

.employee-actions {
    padding: 1rem 1.5rem;
    background: var(--light-color);
    border-top: 1px solid var(--border-color);
    display: flex;
    gap: 0.5rem;
}

@media (max-width: 768px) {
    .employee-actions {
        flex-direction: column;
    }
    
    .employee-actions .btn {
        width: 100%;
    }
}
</style>

<script>
function exportEmployees() {
    // This would implement CSV/Excel export functionality
    alert('Export functionality would be implemented here');
}

// Employee search functionality is already implemented in script.js
</script>

<?php include 'includes/footer.php'; ?>
