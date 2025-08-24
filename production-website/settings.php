<?php
$page_title = 'Settings';
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
                    <a class="nav-link" href="team-management.php">
                        <i class="fas fa-users"></i>
                        <span>Team Management</span>
                        <span class="item-counter">18</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link active" href="settings.php">
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
                        <h2>System Settings</h2>
                        <p class="text-muted mb-0">Configure system preferences and production parameters</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="exportSettings()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button class="btn btn-primary" onclick="saveAllSettings()">
                            <i class="fas fa-save me-2"></i>Save All
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Navigation -->
        <div class="row mb-4">
            <div class="col-12">
                <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                            <i class="fas fa-cog me-2"></i>General
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="production-tab" data-bs-toggle="tab" data-bs-target="#production" type="button" role="tab">
                            <i class="fas fa-industry me-2"></i>Production
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                            <i class="fas fa-bell me-2"></i>Notifications
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                            <i class="fas fa-shield-alt me-2"></i>Security
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="backup-tab" data-bs-toggle="tab" data-bs-target="#backup" type="button" role="tab">
                            <i class="fas fa-database me-2"></i>Backup
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="tab-content" id="settingsTabContent">
            <!-- General Settings -->
            <div class="tab-pane fade show active" id="general" role="tabpanel">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>General System Settings</h5>
                        <span class="text-muted">Basic system configuration</span>
                    </div>
                    <div class="card-body">
                        <form id="generalSettingsForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="siteName" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" id="siteName" name="site_name" value="ADMA Production">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="siteUrl" class="form-label">Site URL</label>
                                    <input type="url" class="form-control" id="siteUrl" name="site_url" value="http://localhost/production-website">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="adminEmail" class="form-label">Admin Email</label>
                                    <input type="email" class="form-control" id="adminEmail" name="admin_email" value="admin@adma.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="timezone" class="form-label">Timezone</label>
                                    <select class="form-select" id="timezone" name="timezone">
                                        <option value="Africa/Kigali" selected>Africa/Kigali (GMT+2)</option>
                                        <option value="UTC">UTC (GMT+0)</option>
                                        <option value="Europe/London">Europe/London (GMT+0)</option>
                                        <option value="America/New_York">America/New_York (GMT-5)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="language" class="form-label">Language</label>
                                    <select class="form-select" id="language" name="language">
                                        <option value="en" selected>English</option>
                                        <option value="fr">French</option>
                                        <option value="rw">Kinyarwanda</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dateFormat" class="form-label">Date Format</label>
                                    <select class="form-select" id="dateFormat" name="date_format">
                                        <option value="Y-m-d" selected>YYYY-MM-DD</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Production Settings -->
            <div class="tab-pane fade" id="production" role="tabpanel">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Production Parameters</h5>
                        <span class="text-muted">Configure production thresholds and standards</span>
                    </div>
                    <div class="card-body">
                        <form id="productionSettingsForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="shiftDuration" class="form-label">Shift Duration (hours)</label>
                                    <input type="number" class="form-control" id="shiftDuration" name="shift_duration" value="8" min="1" max="24">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="breakTime" class="form-label">Break Time (minutes)</label>
                                    <input type="number" class="form-control" id="breakTime" name="break_time" value="30" min="0" max="120">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="overtimeThreshold" class="form-label">Overtime Threshold (hours)</label>
                                    <input type="number" class="form-control" id="overtimeThreshold" name="overtime_threshold" value="8" min="1" max="24">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="qualityThreshold" class="form-label">Quality Threshold (%)</label>
                                    <input type="number" class="form-control" id="qualityThreshold" name="quality_threshold" value="95" min="0" max="100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="efficiencyTarget" class="form-label">Efficiency Target (%)</label>
                                    <input type="number" class="form-control" id="efficiencyTarget" name="efficiency_target" value="85" min="0" max="100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maintenanceInterval" class="form-label">Maintenance Interval (days)</label>
                                    <input type="number" class="form-control" id="maintenanceInterval" name="maintenance_interval" value="30" min="1" max="365">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="tab-pane fade" id="notifications" role="tabpanel">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Notification Preferences</h5>
                        <span class="text-muted">Configure alert and notification settings</span>
                    </div>
                    <div class="card-body">
                        <form id="notificationSettingsForm">
                            <div class="mb-3">
                                <h6>Email Notifications</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailAlerts" name="email_alerts" checked>
                                    <label class="form-check-label" for="emailAlerts">
                                        Send email alerts for critical issues
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailReports" name="email_reports" checked>
                                    <label class="form-check-label" for="emailReports">
                                        Send daily production reports via email
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailMaintenance" name="email_maintenance">
                                    <label class="form-check-label" for="emailMaintenance">
                                        Notify about scheduled maintenance
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6>System Alerts</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lowStockAlerts" name="low_stock_alerts" checked>
                                    <label class="form-check-label" for="lowStockAlerts">
                                        Low material stock alerts
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="machineDownAlerts" name="machine_down_alerts" checked>
                                    <label class="form-check-label" for="machineDownAlerts">
                                        Machine downtime alerts
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="qualityAlerts" name="quality_alerts" checked>
                                    <label class="form-check-label" for="qualityAlerts">
                                        Quality threshold alerts
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="alertFrequency" class="form-label">Alert Frequency</label>
                                    <select class="form-select" id="alertFrequency" name="alert_frequency">
                                        <option value="immediate" selected>Immediate</option>
                                        <option value="hourly">Hourly</option>
                                        <option value="daily">Daily</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maxAlerts" class="form-label">Max Alerts per Day</label>
                                    <input type="number" class="form-control" id="maxAlerts" name="max_alerts" value="50" min="1" max="1000">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Security Configuration</h5>
                        <span class="text-muted">System security and access control settings</span>
                    </div>
                    <div class="card-body">
                        <form id="securitySettingsForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sessionTimeout" class="form-label">Session Timeout (minutes)</label>
                                    <input type="number" class="form-control" id="sessionTimeout" name="session_timeout" value="30" min="5" max="480">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maxLoginAttempts" class="form-label">Max Login Attempts</label>
                                    <input type="number" class="form-control" id="maxLoginAttempts" name="max_login_attempts" value="5" min="1" max="10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passwordMinLength" class="form-label">Minimum Password Length</label>
                                    <input type="number" class="form-control" id="passwordMinLength" name="password_min_length" value="8" min="6" max="20">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="passwordExpiry" class="form-label">Password Expiry (days)</label>
                                    <input type="number" class="form-control" id="passwordExpiry" name="password_expiry" value="90" min="30" max="365">
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6>Security Features</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="twoFactorAuth" name="two_factor_auth">
                                    <label class="form-check-label" for="twoFactorAuth">
                                        Enable two-factor authentication
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ipWhitelist" name="ip_whitelist">
                                    <label class="form-check-label" for="ipWhitelist">
                                        Restrict access to specific IP addresses
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="auditLogging" name="audit_logging" checked>
                                    <label class="form-check-label" for="auditLogging">
                                        Enable audit logging for all actions
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Backup Settings -->
            <div class="tab-pane fade" id="backup" role="tabpanel">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Backup & Maintenance</h5>
                        <span class="text-muted">Database backup and system maintenance settings</span>
                    </div>
                    <div class="card-body">
                        <form id="backupSettingsForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="backupFrequency" class="form-label">Backup Frequency</label>
                                    <select class="form-select" id="backupFrequency" name="backup_frequency">
                                        <option value="daily" selected>Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="backupRetention" class="form-label">Backup Retention (days)</label>
                                    <input type="number" class="form-control" id="backupRetention" name="backup_retention" value="30" min="1" max="365">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="backupTime" class="form-label">Backup Time</label>
                                    <input type="time" class="form-control" id="backupTime" name="backup_time" value="02:00">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="backupLocation" class="form-label">Backup Location</label>
                                    <input type="text" class="form-control" id="backupLocation" name="backup_location" value="/backups/production/">
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6>Backup Options</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="compressBackups" name="compress_backups" checked>
                                    <label class="form-check-label" for="compressBackups">
                                        Compress backup files
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailBackupReports" name="email_backup_reports">
                                    <label class="form-check-label" for="emailBackupReports">
                                        Email backup completion reports
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoCleanup" name="auto_cleanup" checked>
                                    <label class="form-check-label" for="autoCleanup">
                                        Automatically clean up old backups
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary" onclick="createBackup()">
                                    <i class="fas fa-download me-2"></i>Create Backup Now
                                </button>
                                <button type="button" class="btn btn-outline-info" onclick="testBackup()">
                                    <i class="fas fa-vial me-2"></i>Test Backup
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Settings functions
function saveAllSettings() {
    // Collect all form data
    const generalForm = document.getElementById('generalSettingsForm');
    const productionForm = document.getElementById('productionSettingsForm');
    const notificationForm = document.getElementById('notificationSettingsForm');
    const securityForm = document.getElementById('securitySettingsForm');
    const backupForm = document.getElementById('backupSettingsForm');
    
    // Validate and save
    if (generalForm.checkValidity() && productionForm.checkValidity()) {
        alert('All settings saved successfully!');
        // Save logic would go here
    } else {
        alert('Please check all required fields before saving.');
        generalForm.reportValidity();
        productionForm.reportValidity();
    }
}

function exportSettings() {
    alert('Settings export functionality would be implemented here');
}

function createBackup() {
    if (confirm('Are you sure you want to create a backup now? This may take several minutes.')) {
        alert('Backup creation started. You will be notified when it completes.');
        // Backup logic would go here
    }
}

function testBackup() {
    alert('Backup test functionality would be implemented here');
}

// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
    const triggerTabList = [].slice.call(document.querySelectorAll('#settingsTabs button'));
    triggerTabList.forEach(function(triggerEl) {
        const tabTrigger = new bootstrap.Tab(triggerEl);
        
        triggerEl.addEventListener('click', function(event) {
            event.preventDefault();
            tabTrigger.show();
        });
    });
});

// Form validation
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (this.checkValidity()) {
            console.log('Form is valid');
        } else {
            this.reportValidity();
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
