<?php
$page_title = 'Test History';
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
                    <a class="nav-link active" href="test-history.php">
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
                        <h2>Test History</h2>
                        <p class="text-muted mb-0">View and analyze quality test results and performance</p>
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

        <!-- Test History Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">1,247</h3>
                        <p class="stat-label">Total Tests</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">1,189</h3>
                        <p class="stat-label">Passed Tests</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">58</h3>
                        <p class="stat-label">Failed Tests</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">95.3%</h3>
                        <p class="stat-label">Pass Rate</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test History Table -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Test History</h5>
                        <span>Comprehensive view of all quality tests performed</span>
                    </div>
                    <div class="card-body">
                        <!-- Search and Filter Controls -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search tests...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="passed">Passed</option>
                                    <option value="failed">Failed</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="methodFilter">
                                    <option value="">All Methods</option>
                                    <option value="visual_inspection">Visual Inspection</option>
                                    <option value="dimensional_check">Dimensional Check</option>
                                    <option value="weight_verification">Weight Verification</option>
                                    <option value="material_testing">Material Testing</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            </div>
                        </div>

                        <!-- Test History Table -->
                        <div class="table-responsive">
                            <table class="table table-hover" id="testHistoryTable">
                                <thead>
                                    <tr>
                                        <th>Test ID</th>
                                        <th>Test Name</th>
                                        <th>Method</th>
                                        <th>Batch</th>
                                        <th>Tester</th>
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#QC001</td>
                                        <td>Visual Inspection Test</td>
                                        <td>Visual Inspection</td>
                                        <td>BATCH-2024-001</td>
                                        <td>John Doe</td>
                                        <td>2024-01-15</td>
                                        <td>15 min</td>
                                        <td><span class="badge bg-success">Passed</span></td>
                                        <td>98.5%</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewTestDetails('QC001')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#QC002</td>
                                        <td>Dimensional Check</td>
                                        <td>Dimensional Check</td>
                                        <td>BATCH-2024-002</td>
                                        <td>Jane Smith</td>
                                        <td>2024-01-15</td>
                                        <td>30 min</td>
                                        <td><span class="badge bg-success">Passed</span></td>
                                        <td>99.2%</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewTestDetails('QC002')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#QC003</td>
                                        <td>Weight Verification</td>
                                        <td>Weight Verification</td>
                                        <td>BATCH-2024-003</td>
                                        <td>Mike Johnson</td>
                                        <td>2024-01-14</td>
                                        <td>20 min</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                        <td>87.3%</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewTestDetails('QC003')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#QC004</td>
                                        <td>Material Testing</td>
                                        <td>Material Testing</td>
                                        <td>BATCH-2024-004</td>
                                        <td>Sarah Wilson</td>
                                        <td>2024-01-14</td>
                                        <td>120 min</td>
                                        <td><span class="badge bg-success">Passed</span></td>
                                        <td>99.8%</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewTestDetails('QC004')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#QC005</td>
                                        <td>Visual Inspection Test</td>
                                        <td>Visual Inspection</td>
                                        <td>BATCH-2024-005</td>
                                        <td>John Doe</td>
                                        <td>2024-01-13</td>
                                        <td>18 min</td>
                                        <td><span class="badge bg-success">Passed</span></td>
                                        <td>97.1%</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewTestDetails('QC005')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Test history pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Performance Charts -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Test Results by Method</h5>
                        <span>Performance comparison across test methods</span>
                    </div>
                    <div class="card-body">
                        <canvas id="testMethodChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Monthly Test Volume</h5>
                        <span>Test activity trends over time</span>
                    </div>
                    <div class="card-body">
                        <canvas id="testVolumeChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Test Details Modal -->
<div class="modal fade" id="testDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Test Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="testDetailsContent">
                    <!-- Test details will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printTestReport()">
                    <i class="fas fa-print me-2"></i>Print Report
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Test history management functions
function viewTestDetails(testId) {
    // Simulate loading test details
    const testDetails = {
        'QC001': {
            name: 'Visual Inspection Test',
            method: 'Visual Inspection',
            batch: 'BATCH-2024-001',
            tester: 'John Doe',
            date: '2024-01-15',
            duration: '15 minutes',
            status: 'Passed',
            score: '98.5%',
            parameters: 'Standard visual inspection checklist, adequate lighting (500-1000 lux)',
            results: 'All products passed visual inspection with minor cosmetic variations within acceptable limits.',
            notes: 'No major defects found. Minor color variations noted but within specification.'
        }
    };

    const test = testDetails[testId] || testDetails['QC001'];
    const modal = document.getElementById('testDetailsModal');
    const content = document.getElementById('testDetailsContent');

    content.innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <h6>Test Information</h6>
                <table class="table table-sm">
                    <tr><td><strong>Test ID:</strong></td><td>${testId}</td></tr>
                    <tr><td><strong>Name:</strong></td><td>${test.name}</td></tr>
                    <tr><td><strong>Method:</strong></td><td>${test.method}</td></tr>
                    <tr><td><strong>Batch:</strong></td><td>${test.batch}</td></tr>
                    <tr><td><strong>Tester:</strong></td><td>${test.tester}</td></tr>
                    <tr><td><strong>Date:</strong></td><td>${test.date}</td></tr>
                    <tr><td><strong>Duration:</strong></td><td>${test.duration}</td></tr>
                    <tr><td><strong>Status:</strong></td><td><span class="badge bg-success">${test.status}</span></td></tr>
                    <tr><td><strong>Score:</strong></td><td>${test.score}</td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <h6>Test Details</h6>
                <p><strong>Parameters:</strong></p>
                <p class="text-muted">${test.parameters}</p>
                
                <p><strong>Results:</strong></p>
                <p class="text-muted">${test.results}</p>
                
                <p><strong>Notes:</strong></p>
                <p class="text-muted">${test.notes}</p>
            </div>
        </div>
    `;

    const bsModal = new bootstrap.Modal(modal);
    bsModal.show();
}

function printTestReport() {
    window.print();
}

// Initialize charts
document.addEventListener('DOMContentLoaded', function() {
    // Test Method Performance Chart
    const testMethodCtx = document.getElementById('testMethodChart').getContext('2d');
    new Chart(testMethodCtx, {
        type: 'doughnut',
        data: {
            labels: ['Visual Inspection', 'Dimensional Check', 'Weight Verification', 'Material Testing'],
            datasets: [{
                data: [95.2, 98.7, 92.1, 99.5],
                backgroundColor: ['#28a745', '#17a2b8', '#ffc107', '#dc3545'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Test Volume Chart
    const testVolumeCtx = document.getElementById('testVolumeChart').getContext('2d');
    new Chart(testVolumeCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Tests Performed',
                data: [120, 135, 142, 138, 156, 168],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

// Search and filter functionality
document.getElementById('searchInput').addEventListener('input', function() {
    filterTests();
});

document.getElementById('statusFilter').addEventListener('change', function() {
    filterTests();
});

document.getElementById('methodFilter').addEventListener('change', function() {
    filterTests();
});

function filterTests() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const statusFilter = document.getElementById('statusFilter').value;
    const methodFilter = document.getElementById('methodFilter').value;
    
    const rows = document.querySelectorAll('#testHistoryTable tbody tr');
    
    rows.forEach(row => {
        const testName = row.cells[1].textContent.toLowerCase();
        const method = row.cells[2].textContent.toLowerCase();
        const status = row.cells[7].textContent.toLowerCase();
        
        const matchesSearch = testName.includes(searchTerm);
        const matchesStatus = !statusFilter || status.includes(statusFilter);
        const matchesMethod = !methodFilter || method.includes(methodFilter);
        
        row.style.display = matchesSearch && matchesStatus && matchesMethod ? '' : 'none';
    });
}

function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('methodFilter').value = '';
    filterTests();
}
</script>

<?php include 'includes/footer.php'; ?>
