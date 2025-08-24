<?php
$page_title = 'Overview';
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
                    <a class="nav-link active" href="index.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Overview</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">
                        <i class="fas fa-file-alt"></i>
                        <span>Reports</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="trends.php">
                        <i class="fas fa-chart-area"></i>
                        <span>Trends</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="batches.php">
                        <i class="fas fa-boxes"></i>
                        <span>Batches</span>
                        <span class="item-counter">25</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="qc-issues.php">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>QC Issues</span>
                        <span class="item-counter">8</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="approvals.php">
                        <i class="fas fa-check-circle"></i>
                        <span>Approvals</span>
                        <span class="item-counter">12</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="new-test.php">
                        <i class="fas fa-flask"></i>
                        <span>New Test</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="test-history.php">
                        <i class="fas fa-history"></i>
                        <span>Test History</span>
                        <span class="item-counter">45</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="test-methods.php">
                        <i class="fas fa-cogs"></i>
                        <span>Test Methods</span>
                        <span class="item-counter">18</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a class="nav-link" href="compliance.php">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Compliance</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="standards.php">
                        <i class="fas fa-certificate"></i>
                        <span>Standards</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="audits.php">
                        <i class="fas fa-search"></i>
                        <span>Audits</span>
                        <span class="item-counter">5</span>
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
                    <p class="user-role"><?php echo isAdmin() ? 'Administrator' : (isQualityManager() ? 'Quality Manager' : 'QC Inspector'); ?></p>
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
                        <h2>Quality Control Overview</h2>
                        <p class="text-muted mb-0">Monitor quality metrics and system performance</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" onclick="exportData()">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quality Metrics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number" data-target="85">85</div>
                    <div class="stat-label">Approved Batches</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+5.2%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number" data-target="12">12</div>
                    <div class="stat-label">Pending Review</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-down me-1"></i>-2.1%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card danger">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number" data-target="3">3</div>
                    <div class="stat-label">Rejected Batches</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-15.3%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-number" data-target="92">92</div>
                    <div class="stat-label">Avg Quality Score</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+1.8%
                    </div>
                </div>
            </div>
        </div>

        <!-- Quality Trends Chart -->
        <div class="row mb-4">
            <div class="col-md-8 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quality Score Trends</h5>
                        <span>Last 7 days performance</span>
                    </div>
                    <div class="card-body">
                        <canvas id="qualityTrendsChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quality Distribution</h5>
                        <span>Score breakdown</span>
                    </div>
                    <div class="card-body">
                        <canvas id="qualityDistributionChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Quality Issues -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Recent QC Issues</h5>
                        <span>Latest quality problems</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Issue</th>
                                        <th>Severity</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Surface finish below spec</td>
                                        <td><span class="severity-badge high">High</span></td>
                                        <td><span class="badge bg-warning">Investigating</span></td>
                                        <td>Dec 3</td>
                                    </tr>
                                    <tr>
                                        <td>Minor dust particles</td>
                                        <td><span class="severity-badge medium">Medium</span></td>
                                        <td><span class="badge bg-info">Open</span></td>
                                        <td>Dec 2</td>
                                    </tr>
                                    <tr>
                                        <td>Label alignment issue</td>
                                        <td><span class="severity-badge low">Low</span></td>
                                        <td><span class="badge bg-success">Resolved</span></td>
                                        <td>Dec 1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="qc-issues.php" class="btn btn-outline-primary">View All Issues</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Upcoming Audits</h5>
                        <span>Scheduled quality reviews</span>
                    </div>
                    <div class="card-body">
                        <div class="audit-timeline">
                            <div class="audit-item">
                                <h6>Monthly Quality Review</h6>
                                <p class="text-muted mb-1">Internal audit for December</p>
                                <small class="text-muted">Scheduled: Dec 15, 2024</small>
                            </div>
                            <div class="audit-item">
                                <h6>ISO Certification Audit</h6>
                                <p class="text-muted mb-1">External certification review</p>
                                <small class="text-muted">Scheduled: Dec 20, 2024</small>
                            </div>
                            <div class="audit-item">
                                <h6>Safety Compliance Check</h6>
                                <p class="text-muted mb-1">Regulatory safety audit</p>
                                <small class="text-muted">Completed: Dec 10, 2024</small>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="audits.php" class="btn btn-outline-primary">View All Audits</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quality Batches Overview -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Recent Quality Batches</h5>
                                <span>Latest production batches</span>
                            </div>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control search-input" placeholder="Search batches..." style="width: 200px;">
                                <select class="form-select filter-select" style="width: 150px;">
                                    <option value="all">All Status</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                <a href="batches.php" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>New Batch
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Batch Number</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Quality Score</th>
                                        <th>Status</th>
                                        <th>Production Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>BATCH-20241203-QRST</strong></td>
                                        <td>Product B</td>
                                        <td>900</td>
                                        <td>
                                            <div class="quality-score good">89.1%</div>
                                        </td>
                                        <td><span class="quality-status pending">Pending</span></td>
                                        <td>Dec 3, 2024</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-success" onclick="approveBatch(5)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="rejectBatch(5)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <button class="btn btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241202-MNOP</strong></td>
                                        <td>Product C</td>
                                        <td>600</td>
                                        <td>
                                            <div class="quality-score poor">78.5%</div>
                                        </td>
                                        <td><span class="quality-status rejected">Rejected</span></td>
                                        <td>Dec 2, 2024</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>BATCH-20241202-IJKL</strong></td>
                                        <td>Product A</td>
                                        <td>1200</td>
                                        <td>
                                            <div class="quality-score excellent">92.8%</div>
                                        </td>
                                        <td><span class="quality-status approved">Approved</span></td>
                                        <td>Dec 2, 2024</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                        <span>Common quality control tasks</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <a href="new-test.php" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4">
                                    <i class="fas fa-flask fa-2x mb-3"></i>
                                    <span>Create New Test</span>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="batches.php" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4">
                                    <i class="fas fa-boxes fa-2x mb-3"></i>
                                    <span>Add New Batch</span>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="qc-issues.php" class="btn btn-outline-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4">
                                    <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                                    <span>Report Issue</span>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="reports.php" class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4">
                                    <i class="fas fa-chart-bar fa-2x mb-3"></i>
                                    <span>Generate Report</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
