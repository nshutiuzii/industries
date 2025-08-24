<?php
$page_title = 'Dashboard';
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
                    <a class="nav-link active" href="dashboard.php">
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
                        <h2>Quality Analytics Dashboard</h2>
                        <p class="text-muted mb-0">Comprehensive quality metrics and performance analysis</p>
                    </div>
                    <div class="d-flex gap-2">
                        <select class="form-select" style="width: 150px;">
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>Last 90 Days</option>
                            <option>Custom Range</option>
                        </select>
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

        <!-- Advanced Quality Metrics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-number" data-target="96.8">96.8</div>
                    <div class="stat-label">First Pass Yield</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up me-1"></i>+2.1%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number" data-target="4.2">4.2</div>
                    <div class="stat-label">Avg Test Time (hrs)</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-down me-1"></i>-0.8hrs
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-number" data-target="2.3">2.3</div>
                    <div class="stat-label">Defect Rate (%)</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-0.5%
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stat-card danger">
                    <div class="stat-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <div class="stat-number" data-target="1.8">1.8</div>
                    <div class="stat-label">Rework Rate (%)</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-down me-1"></i>-0.3%
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Charts Row -->
        <div class="row mb-4">
            <div class="col-md-8 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quality Performance Trends</h5>
                        <span>Multi-metric analysis over time</span>
                    </div>
                    <div class="card-body">
                        <canvas id="qualityPerformanceChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Issue Severity Distribution</h5>
                        <span>Current problem breakdown</span>
                    </div>
                    <div class="card-body">
                        <canvas id="issueSeverityChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quality Score Analysis -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Quality Score by Product</h5>
                        <span>Product-wise performance comparison</span>
                    </div>
                    <div class="card-body">
                        <canvas id="productQualityChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Test Method Efficiency</h5>
                        <span>Testing method performance analysis</span>
                    </div>
                    <div class="card-body">
                        <canvas id="testMethodChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Real-time Quality Monitoring -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Real-time Quality Monitoring</h5>
                        <span>Live quality control status</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mb-3">
                                <div class="quality-indicator active">
                                    <i class="fas fa-cogs fa-2x text-success mb-2"></i>
                                    <h6>Production Line A</h6>
                                    <div class="quality-score excellent">94.2%</div>
                                    <small class="text-muted">Running</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <div class="quality-indicator warning">
                                    <i class="fas fa-cogs fa-2x text-warning mb-2"></i>
                                    <h6>Production Line B</h6>
                                    <div class="quality-score good">87.5%</div>
                                    <small class="text-muted">Attention</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <div class="quality-indicator active">
                                    <i class="fas fa-cogs fa-2x text-success mb-2"></i>
                                    <h6>Production Line C</h6>
                                    <div class="quality-score excellent">96.8%</div>
                                    <small class="text-muted">Running</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <div class="quality-indicator inactive">
                                    <i class="fas fa-cogs fa-2x text-muted mb-2"></i>
                                    <h6>Production Line D</h6>
                                    <div class="quality-score">--</div>
                                    <small class="text-muted">Maintenance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quality Metrics Table -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Detailed Quality Metrics</h5>
                        <span>Comprehensive quality data</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Metric</th>
                                        <th>Current</th>
                                        <th>Previous</th>
                                        <th>Target</th>
                                        <th>Trend</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Overall Quality Score</strong></td>
                                        <td>92.4%</td>
                                        <td>90.1%</td>
                                        <td>95.0%</td>
                                        <td><span class="text-success">↗ +2.3%</span></td>
                                        <td><span class="badge bg-warning">Below Target</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Customer Satisfaction</strong></td>
                                        <td>94.7%</td>
                                        <td>93.2%</td>
                                        <td>90.0%</td>
                                        <td><span class="text-success">↗ +1.5%</span></td>
                                        <td><span class="badge bg-success">Above Target</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>On-time Delivery</strong></td>
                                        <td>97.3%</td>
                                        <td>96.8%</td>
                                        <td>95.0%</td>
                                        <td><span class="text-success">↗ +0.5%</span></td>
                                        <td><span class="badge bg-success">Above Target</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cost of Quality</strong></td>
                                        <td>2.1%</td>
                                        <td>2.8%</td>
                                        <td>2.5%</td>
                                        <td><span class="text-success">↘ -0.7%</span></td>
                                        <td><span class="badge bg-success">Below Target</span></td>
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

<script>
// Initialize additional charts for dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Quality Performance Chart
    const performanceCtx = document.getElementById('qualityPerformanceChart');
    if (performanceCtx) {
        new Chart(performanceCtx, {
            type: 'line',
            data: {
                labels: ['Dec 1', 'Dec 2', 'Dec 3', 'Dec 4', 'Dec 5', 'Dec 6', 'Dec 7'],
                datasets: [{
                    label: 'Quality Score',
                    data: [92.5, 89.8, 94.2, 91.7, 93.1, 90.5, 95.2],
                    borderColor: '#3498db',
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'First Pass Yield',
                    data: [94.2, 92.1, 96.8, 93.5, 95.7, 91.8, 97.1],
                    borderColor: '#27ae60',
                    backgroundColor: 'rgba(39, 174, 96, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Quality Performance Trends' }
                },
                scales: {
                    y: { beginAtZero: false, min: 80, max: 100 }
                }
            }
        });
    }
    
    // Product Quality Chart
    const productCtx = document.getElementById('productQualityChart');
    if (productCtx) {
        new Chart(productCtx, {
            type: 'bar',
            data: {
                labels: ['Product A', 'Product B', 'Product C', 'Product D'],
                datasets: [{
                    label: 'Quality Score (%)',
                    data: [94.2, 87.5, 96.8, 91.3],
                    backgroundColor: ['#3498db', '#f39c12', '#27ae60', '#e74c3c']
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, max: 100 } }
            }
        });
    }
    
    // Test Method Chart
    const methodCtx = document.getElementById('testMethodChart');
    if (methodCtx) {
        new Chart(methodCtx, {
            type: 'radar',
            data: {
                labels: ['Speed', 'Accuracy', 'Reliability', 'Cost', 'Ease of Use'],
                datasets: [{
                    label: 'Visual Inspection',
                    data: [90, 85, 95, 80, 90],
                    borderColor: '#3498db',
                    backgroundColor: 'rgba(52, 152, 219, 0.2)'
                }, {
                    label: 'Dimensional Check',
                    data: [70, 95, 90, 85, 75],
                    borderColor: '#e74c3c',
                    backgroundColor: 'rgba(231, 76, 60, 0.2)'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'top' } },
                scales: { r: { beginAtZero: true, max: 100 } }
            }
        });
    }
});
</script>

<?php include 'includes/footer.php'; ?>
