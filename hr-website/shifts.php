<?php
$page_title = 'Shifts';
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
                            <a class="nav-link active" href="shifts.php">
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
                            <h2>Shift Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addShiftModal">
                                <i class="fas fa-plus me-2"></i>Add Shift
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Shift Statistics -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">4</h3>
                                <p class="stat-label">Total Shifts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
                                <p class="stat-label">Employees on Shift</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">5</h3>
                                <p class="stat-label">Days per Week</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-hourglass-half"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">40</h3>
                                <p class="stat-label">Avg. Hours/Week</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shifts Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>All Shifts</h5>
                                <span class="text-muted">Manage work schedules</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Shift Name</th>
                                                <th>Time</th>
                                                <th>Days</th>
                                                <th>Employees</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="shift-icon bg-primary me-3">
                                                            <i class="fas fa-sun text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Morning Shift</strong>
                                                            <br><small class="text-muted">Standard 9-5</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>8:00 AM - 5:00 PM</td>
                                                <td>Mon - Fri</td>
                                                <td><span class="badge bg-primary">5</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="shift-icon bg-success me-3">
                                                            <i class="fas fa-moon text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Night Shift</strong>
                                                            <br><small class="text-muted">10 PM - 7 AM</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>10:00 PM - 7:00 AM</td>
                                                <td>Mon - Fri</td>
                                                <td><span class="badge bg-success">2</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="shift-icon bg-warning me-3">
                                                            <i class="fas fa-clock text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Afternoon Shift</strong>
                                                            <br><small class="text-muted">2 PM - 11 PM</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>2:00 PM - 11:00 PM</td>
                                                <td>Mon - Fri</td>
                                                <td><span class="badge bg-warning">1</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="shift-icon bg-info me-3">
                                                            <i class="fas fa-calendar-alt text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Weekend Shift</strong>
                                                            <br><small class="text-muted">Sat - Sun</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>9:00 AM - 6:00 PM</td>
                                                <td>Sat - Sun</td>
                                                <td><span class="badge bg-info">0</span></td>
                                                <td><span class="badge bg-secondary">Inactive</span></td>
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

<!-- Add Shift Modal -->
<div class="modal fade" id="addShiftModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Shift</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addShiftForm">
                    <div class="mb-3">
                        <label for="shiftName" class="form-label">Shift Name *</label>
                        <input type="text" class="form-control" id="shiftName" name="shiftName" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="startTime" class="form-label">Start Time *</label>
                            <input type="time" class="form-control" id="startTime" name="startTime" required>
                        </div>
                        <div class="col-md-6">
                            <label for="endTime" class="form-label">End Time *</label>
                            <input type="time" class="form-control" id="endTime" name="endTime" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="workDays" class="form-label">Work Days *</label>
                        <select class="form-select" id="workDays" name="workDays" required>
                            <option value="">Select Days</option>
                            <option value="Mon-Fri">Monday - Friday</option>
                            <option value="Mon-Sat">Monday - Saturday</option>
                            <option value="Sun-Sat">Sunday - Saturday</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="shiftStatus" class="form-label">Status</label>
                        <select class="form-select" id="shiftStatus" name="shiftStatus">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="addShiftForm" class="btn btn-primary">Add Shift</button>
            </div>
        </div>
    </div>
</div>

<style>
.shift-icon {
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
// Add Shift Form Submission
document.getElementById('addShiftForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const shiftData = Object.fromEntries(formData.entries());
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert('Shift added successfully!');
        
        // Reset form and close modal
        this.reset();
        bootstrap.Modal.getInstance(document.getElementById('addShiftModal')).hide();
        
        // Restore button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Reload page to show new shift
        location.reload();
    }, 1500);
});
</script>

<?php include 'includes/footer.php'; ?>
