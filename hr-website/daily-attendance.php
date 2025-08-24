<?php
$page_title = 'Daily Attendance';
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
                            <a class="nav-link active" href="daily-attendance.php">
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
                            <h2>Daily Attendance</h2>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary" onclick="exportAttendance()">
                                    <i class="fas fa-download me-2"></i>Export
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkAttendanceModal">
                                    <i class="fas fa-plus me-2"></i>Bulk Entry
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Date Selection and Quick Stats -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3">
                            <label for="attendanceDate" class="form-label mb-0">Select Date:</label>
                            <input type="date" class="form-control" id="attendanceDate" value="<?php echo date('Y-m-d'); ?>">
                            <button class="btn btn-outline-primary" onclick="loadAttendance()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-3">
                            <div class="text-center">
                                <div class="h4 text-success mb-0">9</div>
                                <small class="text-muted">Present</small>
                            </div>
                            <div class="text-center">
                                <div class="h4 text-danger mb-0">1</div>
                                <small class="text-muted">Absent</small>
                            </div>
                            <div class="text-center">
                                <div class="h4 text-warning mb-0">0</div>
                                <small class="text-muted">Late</small>
                            </div>
                            <div class="text-center">
                                <div class="h4 text-info mb-0">0</div>
                                <small class="text-muted">Half Day</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Attendance for <?php echo date('l, F j, Y'); ?></h5>
                                <span class="text-muted">Click on time fields to edit</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Total Hours</th>
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
                                                            <br><small class="text-muted">EMP001</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Human Resources</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 1)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 1)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(1)">Edit</button>
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
                                                            <br><small class="text-muted">EMP002</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Information Technology</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:15" onchange="updateAttendance(this, 'checkin', 2)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:15" onchange="updateAttendance(this, 'checkout', 2)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(2)">Edit</button>
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
                                                            <br><small class="text-muted">EMP003</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Finance</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:30" onchange="updateAttendance(this, 'checkin', 3)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:30" onchange="updateAttendance(this, 'checkout', 3)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(3)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-warning me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Sarah Wilson</strong>
                                                            <br><small class="text-muted">EMP004</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Marketing</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 4)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 4)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(4)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-secondary me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>David Brown</strong>
                                                            <br><small class="text-muted">EMP005</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Operations</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 5)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 5)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(5)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-primary me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Emily Davis</strong>
                                                            <br><small class="text-muted">EMP006</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Information Technology</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 6)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 6)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(6)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-success me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Robert Wilson</strong>
                                                            <br><small class="text-muted">EMP007</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Finance</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 7)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 7)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(7)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-info me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Lisa Anderson</strong>
                                                            <br><small class="text-muted">EMP008</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Marketing</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 8)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 8)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(8)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-warning me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Michael Chen</strong>
                                                            <br><small class="text-muted">EMP009</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Operations</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="08:00" onchange="updateAttendance(this, 'checkin', 9)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="17:00" onchange="updateAttendance(this, 'checkout', 9)">
                                                </td>
                                                <td><span class="badge bg-success">9.0 hrs</span></td>
                                                <td><span class="badge bg-success">Present</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(9)">Edit</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar-sm bg-danger me-3">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Alex Thompson</strong>
                                                            <br><small class="text-muted">EMP010</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Human Resources</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="" onchange="updateAttendance(this, 'checkin', 10)">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" value="" onchange="updateAttendance(this, 'checkout', 10)">
                                                </td>
                                                <td><span class="badge bg-danger">0.0 hrs</span></td>
                                                <td><span class="badge bg-danger">Absent</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editAttendance(10)">Edit</button>
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

<!-- Bulk Attendance Modal -->
<div class="modal fade" id="bulkAttendanceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Attendance Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="bulkAttendanceForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bulkDate" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="bulkDate" name="bulkDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bulkStatus" class="form-label">Default Status *</label>
                            <select class="form-select" id="bulkStatus" name="bulkStatus" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Late">Late</option>
                                <option value="Half Day">Half Day</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bulkCheckIn" class="form-label">Default Check In Time</label>
                            <input type="time" class="form-control" id="bulkCheckIn" name="bulkCheckIn" value="08:00">
                        </div>
                        <div class="col-md-6">
                            <label for="bulkCheckOut" class="form-label">Default Check Out Time</label>
                            <input type="time" class="form-control" id="bulkCheckOut" name="bulkCheckOut" value="17:00">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Employees</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAll" onchange="toggleAllEmployees()">
                            <label class="form-check-label" for="selectAll">
                                <strong>Select All Employees</strong>
                            </label>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp1" name="employees[]" value="1">
                                    <label class="form-check-label" for="emp1">John Doe (HR)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp2" name="employees[]" value="2">
                                    <label class="form-check-label" for="emp2">Jane Smith (IT)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp3" name="employees[]" value="3">
                                    <label class="form-check-label" for="emp3">Mike Johnson (Finance)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp4" name="employees[]" value="4">
                                    <label class="form-check-label" for="emp4">Sarah Wilson (Marketing)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp5" name="employees[]" value="5">
                                    <label class="form-check-label" for="emp5">David Brown (Operations)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp6" name="employees[]" value="6">
                                    <label class="form-check-label" for="emp6">Emily Davis (IT)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp7" name="employees[]" value="7">
                                    <label class="form-check-label" for="emp7">Robert Wilson (Finance)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp8" name="employees[]" value="8">
                                    <label class="form-check-label" for="emp8">Lisa Anderson (Marketing)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp9" name="employees[]" value="9">
                                    <label class="form-check-label" for="emp9">Michael Chen (Operations)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input employee-checkbox" type="checkbox" id="emp10" name="employees[]" value="10">
                                    <label class="form-check-label" for="emp10">Alex Thompson (HR)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="bulkAttendanceForm" class="btn btn-primary">Apply Bulk Entry</button>
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

.form-control-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    border-radius: 0.25rem;
}

.table td {
    vertical-align: middle;
}
</style>

<script>
// Set default date to today
document.getElementById('bulkDate').value = new Date().toISOString().split('T')[0];

// Load attendance for selected date
function loadAttendance() {
    const date = document.getElementById('attendanceDate').value;
    // This would typically make an AJAX call to load attendance data
    console.log('Loading attendance for:', date);
}

// Update attendance when time fields change
function updateAttendance(input, type, employeeId) {
    const time = input.value;
    console.log(`Updating ${type} for employee ${employeeId}: ${time}`);
    
    // This would typically make an AJAX call to update the database
    // For now, we'll just log the change
}

// Edit attendance for specific employee
function editAttendance(employeeId) {
    console.log('Editing attendance for employee:', employeeId);
    // This could open a detailed edit modal
}

// Export attendance data
function exportAttendance() {
    const date = document.getElementById('attendanceDate').value;
    console.log('Exporting attendance for:', date);
    alert('Attendance export functionality would be implemented here');
}

// Toggle all employee checkboxes
function toggleAllEmployees() {
    const selectAll = document.getElementById('selectAll');
    const employeeCheckboxes = document.querySelectorAll('.employee-checkbox');
    
    employeeCheckboxes.forEach(checkbox => {
        checkbox.checked = selectAll.checked;
    });
}

// Bulk attendance form submission
document.getElementById('bulkAttendanceForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const selectedEmployees = formData.getAll('employees[]');
    
    if (selectedEmployees.length === 0) {
        alert('Please select at least one employee');
        return;
    }
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Applying...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert(`Bulk attendance entry applied to ${selectedEmployees.length} employees successfully!`);
        
        // Reset form and close modal
        this.reset();
        document.getElementById('bulkDate').value = new Date().toISOString().split('T')[0];
        bootstrap.Modal.getInstance(document.getElementById('bulkAttendanceModal')).hide();
        
        // Restore button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Reload attendance data
        loadAttendance();
    }, 1500);
});

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadAttendance();
});
</script>

<?php include 'includes/footer.php'; ?>
