<?php
$page_title = 'Departments';
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
                            <a class="nav-link active" href="departments.php">
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
                            <h2>Department Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                                <i class="fas fa-plus me-2"></i>Add Department
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Department Statistics -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">5</h3>
                                <p class="stat-label">Total Departments</p>
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
                                <p class="stat-label">Total Employees</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">5</h3>
                                <p class="stat-label">Department Heads</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">2.0</h3>
                                <p class="stat-label">Avg. Employees/Dept</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Department List -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>All Departments</h5>
                                <span class="text-muted">Manage company departments</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Department Name</th>
                                                <th>Department Head</th>
                                                <th>Employee Count</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="department-icon bg-primary me-3">
                                                            <i class="fas fa-users text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Human Resources</strong>
                                                            <br><small class="text-muted">HR & Recruitment</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>John Doe</td>
                                                <td><span class="badge bg-primary">2</span></td>
                                                <td>Main Office</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="department-icon bg-success me-3">
                                                            <i class="fas fa-laptop-code text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Information Technology</strong>
                                                            <br><small class="text-muted">IT & Development</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Jane Smith</td>
                                                <td><span class="badge bg-success">2</span></td>
                                                <td>Tech Wing</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="department-icon bg-info me-3">
                                                            <i class="fas fa-calculator text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Finance</strong>
                                                            <br><small class="text-muted">Accounting & Finance</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Mike Johnson</td>
                                                <td><span class="badge bg-info">2</span></td>
                                                <td>Finance Wing</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="department-icon bg-warning me-3">
                                                            <i class="fas fa-bullhorn text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Marketing</strong>
                                                            <br><small class="text-muted">Marketing & Sales</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Sarah Wilson</td>
                                                <td><span class="badge bg-warning">2</span></td>
                                                <td>Marketing Wing</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="department-icon bg-secondary me-3">
                                                            <i class="fas fa-cogs text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Operations</strong>
                                                            <br><small class="text-muted">Operations & Logistics</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>David Brown</td>
                                                <td><span class="badge bg-secondary">2</span></td>
                                                <td>Operations Wing</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
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

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addDepartmentForm">
                    <div class="mb-3">
                        <label for="deptName" class="form-label">Department Name *</label>
                        <input type="text" class="form-control" id="deptName" name="deptName" required>
                    </div>
                    <div class="mb-3">
                        <label for="deptDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="deptDescription" name="deptDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deptHead" class="form-label">Department Head</label>
                        <input type="text" class="form-control" id="deptHead" name="deptHead">
                    </div>
                    <div class="mb-3">
                        <label for="deptLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="deptLocation" name="deptLocation">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="addDepartmentForm" class="btn btn-primary">Add Department</button>
            </div>
        </div>
    </div>
</div>

<style>
.department-icon {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.table td {
    vertical-align: middle;
}
</style>

<script>
// Add Department Form Submission
document.getElementById('addDepartmentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const departmentData = Object.fromEntries(formData.entries());
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert('Department added successfully!');
        
        // Reset form and close modal
        this.reset();
        bootstrap.Modal.getInstance(document.getElementById('addDepartmentModal')).hide();
        
        // Restore button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Reload page to show new department
        location.reload();
    }, 1500);
});
</script>

<?php include 'includes/footer.php'; ?>
