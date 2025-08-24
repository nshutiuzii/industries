<?php
$page_title = 'Team Management';
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
                    <a class="nav-link active" href="team-management.php">
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
                        <h2>Team Management</h2>
                        <p class="text-muted mb-0">Manage team members, roles, and performance</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportProductionData('team')">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeamMemberModal">
                            <i class="fas fa-plus me-2"></i>Add Member
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">18</h3>
                        <p class="stat-label">Total Team Members</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">15</h3>
                        <p class="stat-label">Active Members</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">8</h3>
                        <p class="stat-label">Operators</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-value">3</h3>
                        <p class="stat-label">Supervisors</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="teamSearch" placeholder="Search team members...">
                </div>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="roleFilter">
                    <option value="">All Roles</option>
                    <option value="admin">Administrator</option>
                    <option value="production_manager">Production Manager</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="operator">Operator</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="departmentFilter">
                    <option value="">All Departments</option>
                    <option value="production-line-a">Production Line A</option>
                    <option value="production-line-b">Production Line B</option>
                    <option value="quality-control">Quality Control</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <!-- Team Members Table -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Team Members</h5>
                <span class="text-muted">Manage team roles and permissions</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Performance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <strong>John Smith</strong>
                                            <br><small class="text-muted">john.smith@adma.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">Production Manager</span></td>
                                <td>Production Line A</td>
                                <td>+250 788 123 456</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" style="width: 95%"></div>
                                    </div>
                                    <small class="text-muted">95%</small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewTeamMember(1)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" onclick="editTeamMember(1)">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <strong>Jane Doe</strong>
                                            <br><small class="text-muted">jane.doe@adma.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Supervisor</span></td>
                                <td>Production Line A</td>
                                <td>+250 788 789 012</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" style="width: 88%"></div>
                                    </div>
                                    <small class="text-muted">88%</small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewTeamMember(2)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" onclick="editTeamMember(2)">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <strong>Mike Johnson</strong>
                                            <br><small class="text-muted">mike.johnson@adma.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary">Operator</span></td>
                                <td>Production Line B</td>
                                <td>+250 788 345 678</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 75%"></div>
                                    </div>
                                    <small class="text-muted">75%</small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewTeamMember(3)">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" onclick="editTeamMember(3)">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Department Overview -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5>Department Overview</h5>
                <span class="text-muted">Team distribution across departments</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-3">
                        <div class="border rounded p-3">
                            <h4 class="text-primary mb-1">8</h4>
                            <small class="text-muted">Production Line A</small>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="border rounded p-3">
                            <h4 class="text-success mb-1">6</h4>
                            <small class="text-muted">Production Line B</small>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="border rounded p-3">
                            <h4 class="text-info mb-1">2</h4>
                            <small class="text-muted">Quality Control</small>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="border rounded p-3">
                            <h4 class="text-warning mb-1">2</h4>
                            <small class="text-muted">Maintenance</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Team Member Modal -->
<div class="modal fade" id="addTeamMemberModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addTeamMemberForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="memberFirstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="memberFirstName" name="first_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="memberLastName" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="memberLastName" name="last_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="memberEmail" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="memberEmail" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="memberPhone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="memberPhone" name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="memberRole" class="form-label">Role *</label>
                            <select class="form-select" id="memberRole" name="role" required>
                                <option value="">Select Role</option>
                                <option value="admin">Administrator</option>
                                <option value="production_manager">Production Manager</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="memberDepartment" class="form-label">Department *</label>
                            <select class="form-select" id="memberDepartment" name="department_id" required>
                                <option value="">Select Department</option>
                                <option value="1">Production Line A</option>
                                <option value="2">Production Line B</option>
                                <option value="3">Quality Control</option>
                                <option value="4">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="memberUsername" class="form-label">Username *</label>
                            <input type="text" class="form-control" id="memberUsername" name="username" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="memberPassword" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="memberPassword" name="password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="memberStatus" class="form-label">Status</label>
                        <select class="form-select" id="memberStatus" name="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitTeamMember()">
                    <i class="fas fa-save me-2"></i>Add Member
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Team management functions
function viewTeamMember(id) {
    alert('View team member ' + id + ' functionality would be implemented here');
}

function editTeamMember(id) {
    alert('Edit team member ' + id + ' functionality would be implemented here');
}

function exportProductionData(type) {
    alert('Export ' + type + ' functionality would be implemented here');
}

function submitTeamMember() {
    const form = document.getElementById('addTeamMemberForm');
    if (form.checkValidity()) {
        alert('Team member added successfully!');
        form.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('addTeamMemberModal'));
        modal.hide();
    } else {
        form.reportValidity();
    }
}

// Search and filter functionality
document.getElementById('teamSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const memberName = row.querySelector('strong').textContent.toLowerCase();
        const memberEmail = row.querySelector('small').textContent.toLowerCase();
        
        if (memberName.includes(searchTerm) || memberEmail.includes(searchTerm)) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
});

document.getElementById('roleFilter').addEventListener('change', function() {
    console.log('Filtering by role:', this.value);
});

document.getElementById('departmentFilter').addEventListener('change', function() {
    console.log('Filtering by department:', this.value);
});

document.getElementById('statusFilter').addEventListener('change', function() {
    console.log('Filtering by status:', this.value);
});
</script>

<?php include 'includes/footer.php'; ?>
