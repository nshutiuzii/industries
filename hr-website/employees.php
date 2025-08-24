<?php
$page_title = 'Employees';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Employees</h1>
                <p class="dashboard-subtitle">Human Resource Management System</p>
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
                            <a class="nav-link active" href="employees.php">
                                <i class="fas fa-users"></i>
                                <span>Employees</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="departments.php">
                                <i class="fas fa-building"></i>
                                <span>Departments</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="attendance.php">
                                <i class="fas fa-clock"></i>
                                <span>Attendance</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shifts.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Shifts</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="leave.php">
                                <i class="fas fa-calendar-check"></i>
                                <span>Leave</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="payroll.php">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Payroll</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="performance.php">
                                <i class="fas fa-chart-line"></i>
                                <span>Performance</span>
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
                            <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isHR() ? 'HR Manager' : 'Employee'); ?></p>
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
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary">Import</button>
                                <button class="btn btn-outline-success">Export</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                    <i class="fas fa-plus me-2"></i>Add Employee
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Employee Overview -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">8</h3>
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
                                <h3 class="stat-value">7</h3>
                                <p class="stat-label">Active</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-user-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">1</h3>
                                <p class="stat-label">On Leave</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-value">2</h3>
                                <p class="stat-label">New This Month</p>
                            </div>
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
                                        <label class="form-label">Search</label>
                                        <input type="text" class="form-control search-input" placeholder="Search employees...">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-select">
                                            <option>All Departments</option>
                                            <option>Human Resources</option>
                                            <option>Information Technology</option>
                                            <option>Finance</option>
                                            <option>Marketing</option>
                                            <option>Operations</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select">
                                            <option>All Status</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                            <option>On Leave</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">&nbsp;</label>
                                        <button class="btn btn-primary w-100">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Employees Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>All Employees</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary">Bulk Actions</button>
                                    <button class="btn btn-sm btn-outline-success export-btn" data-format="csv">Export CSV</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="form-check-input select-all">
                                                </th>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>Hire Date</th>
                                                <th>Salary</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input row-checkbox">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>John Doe</strong>
                                                            <br><small class="text-muted">EMP001</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Human Resources</td>
                                                <td>HR Manager</td>
                                                <td>2022-01-15</td>
                                                <td>RWF 2,500,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">View</button>
                                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
                                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input row-checkbox">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Jane Smith</strong>
                                                            <br><small class="text-muted">EMP002</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Information Technology</td>
                                                <td>Software Developer</td>
                                                <td>2022-03-10</td>
                                                <td>RWF 3,000,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">View</button>
                                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
                                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input row-checkbox">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Mike Johnson</strong>
                                                            <br><small class="text-muted">EMP003</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Finance</td>
                                                <td>Accountant</td>
                                                <td>2022-06-20</td>
                                                <td>RWF 2,200,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">View</button>
                                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
                                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input row-checkbox">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>Sarah Wilson</strong>
                                                            <br><small class="text-muted">EMP004</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Marketing</td>
                                                <td>Marketing Specialist</td>
                                                <td>2022-09-05</td>
                                                <td>RWF 2,000,000</td>
                                                <td><span class="badge bg-warning">On Leave</span></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">View</button>
                                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
                                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input row-checkbox">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="employee-avatar me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <strong>David Brown</strong>
                                                            <br><small class="text-muted">EMP005</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Operations</td>
                                                <td>Operations Manager</td>
                                                <td>2022-02-28</td>
                                                <td>RWF 2,800,000</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">View</button>
                                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
                                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination -->
                                <nav aria-label="Employee pagination" class="mt-4">
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
    </div>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Employee ID</label>
                            <input type="text" class="form-control" placeholder="EMP001" required>
                            <div class="invalid-feedback">Please provide an employee ID.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter full name" required>
                            <div class="invalid-feedback">Please provide a full name.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="employee@company.com" required>
                            <div class="invalid-feedback">Please provide a valid email.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" placeholder="+250788123456">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select" required>
                                <option value="">Select Department</option>
                                <option>Human Resources</option>
                                <option>Information Technology</option>
                                <option>Finance</option>
                                <option>Marketing</option>
                                <option>Operations</option>
                            </select>
                            <div class="invalid-feedback">Please select a department.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" placeholder="Enter position" required>
                            <div class="invalid-feedback">Please provide a position.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hire Date</label>
                            <input type="date" class="form-control" required>
                            <div class="invalid-feedback">Please select a hire date.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Salary (RWF)</label>
                            <input type="number" class="form-control" placeholder="Enter salary" required>
                            <div class="invalid-feedback">Please provide a salary.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Birth Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select">
                                <option value="">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="3" placeholder="Enter address"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
        </div>
    </div>
</div>

<!-- View Employee Modal -->
<div class="modal fade" id="viewEmployeeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Employee Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="employee-avatar mb-3" style="width: 120px; height: 120px; font-size: 3rem; margin: 0 auto;">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5>John Doe</h5>
                        <p class="text-muted">EMP001</p>
                        <span class="badge bg-success">Active</span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Department:</strong> Human Resources
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Position:</strong> HR Manager
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Hire Date:</strong> 2022-01-15
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Salary:</strong> RWF 2,500,000
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Email:</strong> john.doe@company.com
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Phone:</strong> +250788123456
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Birth Date:</strong> 1990-05-15
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Gender:</strong> Male
                            </div>
                        </div>
                        <div class="mb-3">
                            <strong>Address:</strong><br>
                            Kigali, Rwanda
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Employee ID</label>
                            <input type="text" class="form-control" value="EMP001" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" value="John Doe" required>
                            <div class="invalid-feedback">Please provide a full name.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="john.doe@company.com" required>
                            <div class="invalid-feedback">Please provide a valid email.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" value="+250788123456">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select" required>
                                <option>Human Resources</option>
                                <option>Information Technology</option>
                                <option>Finance</option>
                                <option>Marketing</option>
                                <option>Operations</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" value="HR Manager" required>
                            <div class="invalid-feedback">Please provide a position.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hire Date</label>
                            <input type="date" class="form-control" value="2022-01-15" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Salary (RWF)</label>
                            <input type="number" class="form-control" value="2500000" required>
                            <div class="invalid-feedback">Please provide a salary.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>On Leave</option>
                                <option>Terminated</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Birth Date</label>
                            <input type="date" class="form-control" value="1990-05-15">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="3">Kigali, Rwanda</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

