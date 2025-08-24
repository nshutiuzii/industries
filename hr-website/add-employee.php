<?php
$page_title = 'Add Employee';
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
                            <a class="nav-link active" href="add-employee.php">
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
                            <h2>Add New Employee</h2>
                            <a href="all-employees.php" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Employees
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add Employee Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Employee Information</h5>
                                <span class="text-muted">Fill in the details below</span>
                            </div>
                            <div class="card-body">
                                <form id="addEmployeeForm">
                                    <!-- Personal Information -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="form-section-title">
                                                <i class="fas fa-user me-2"></i>Personal Information
                                            </h6>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName" class="form-label">First Name *</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName" class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone Number *</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>

                                    <!-- Employment Information -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="form-section-title">
                                                <i class="fas fa-briefcase me-2"></i>Employment Information
                                            </h6>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="position" class="form-label">Position *</label>
                                            <input type="text" class="form-control" id="position" name="position" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="department" class="form-label">Department *</label>
                                            <select class="form-select" id="department" name="department" required>
                                                <option value="">Select Department</option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Operations">Operations</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="hireDate" class="form-label">Hire Date *</label>
                                            <input type="date" class="form-control" id="hireDate" name="hireDate" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="basicSalary" class="form-label">Basic Salary (RWF) *</label>
                                            <input type="number" class="form-control" id="basicSalary" name="basicSalary" min="0" step="1000" required>
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                                                    <i class="fas fa-undo me-2"></i>Reset Form
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-user-plus me-2"></i>Add Employee
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-section-title {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--border-color);
}

.form-control:focus,
.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
}

.form-label {
    font-weight: 500;
    color: var(--text-color);
    margin-bottom: 0.5rem;
}
</style>

<script>
// Form validation and submission
document.getElementById('addEmployeeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (validateForm()) {
        submitForm();
    }
});

function validateForm() {
    const requiredFields = document.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    return isValid;
}

function submitForm() {
    const formData = new FormData(document.getElementById('addEmployeeForm'));
    const employeeData = Object.fromEntries(formData.entries());
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding Employee...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert('Employee added successfully!');
        resetForm();
        
        // Restore button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Redirect to all employees page
        window.location.href = 'all-employees.php';
    }, 2000);
}

function resetForm() {
    document.getElementById('addEmployeeForm').reset();
    document.querySelectorAll('.is-invalid').forEach(field => {
        field.classList.remove('is-invalid');
    });
}

// Real-time validation
document.querySelectorAll('input, select').forEach(field => {
    field.addEventListener('blur', function() {
        if (this.hasAttribute('required') && !this.value.trim()) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    field.addEventListener('input', function() {
        if (this.classList.contains('is-invalid')) {
            this.classList.remove('is-invalid');
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
