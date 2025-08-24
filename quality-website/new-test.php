<?php
$page_title = 'New Test';
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
                    <a class="nav-link active" href="new-test.php">
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
                        <h2>Create New Quality Test</h2>
                        <p class="text-muted mb-0">Set up and configure new quality control tests</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" onclick="saveTest()">
                            <i class="fas fa-save me-2"></i>Save Test
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Creation Form -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Test Configuration</h5>
                        <span>Define test parameters and requirements</span>
                    </div>
                    <div class="card-body">
                        <form id="testForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="testName" class="form-label">Test Name</label>
                                    <input type="text" class="form-control" id="testName" name="test_name" placeholder="Enter test name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="testMethod" class="form-label">Test Method</label>
                                    <select class="form-select" id="testMethod" name="test_method" required>
                                        <option value="">Select Test Method</option>
                                        <option value="visual_inspection">Visual Inspection</option>
                                        <option value="dimensional_check">Dimensional Check</option>
                                        <option value="weight_verification">Weight Verification</option>
                                        <option value="material_testing">Material Testing</option>
                                        <option value="custom">Custom Method</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="testCategory" class="form-label">Test Category</label>
                                    <select class="form-select" id="testCategory" name="test_category" required>
                                        <option value="">Select Category</option>
                                        <option value="inspection">Inspection</option>
                                        <option value="measurement">Measurement</option>
                                        <option value="laboratory">Laboratory</option>
                                        <option value="performance">Performance</option>
                                        <option value="safety">Safety</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="priority" class="form-label">Priority</label>
                                    <select class="form-select" id="priority" name="priority" required>
                                        <option value="">Select Priority</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="testDescription" class="form-label">Test Description</label>
                                <textarea class="form-control" id="testDescription" name="test_description" rows="3" placeholder="Describe the test purpose and scope..." required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expectedDuration" class="form-label">Expected Duration (minutes)</label>
                                    <input type="number" class="form-control" id="expectedDuration" name="expected_duration" min="1" placeholder="30" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sampleSize" class="form-label">Sample Size</label>
                                    <input type="number" class="form-control" id="sampleSize" name="sample_size" min="1" placeholder="10" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="testParameters" class="form-label">Test Parameters</label>
                                <textarea class="form-control" id="testParameters" name="test_parameters" rows="4" placeholder="Define test parameters, conditions, and requirements..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="expectedResults" class="form-label">Expected Results</label>
                                <textarea class="form-control" id="expectedResults" name="expected_results" rows="3" placeholder="Describe expected test outcomes and acceptance criteria..." required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="qualityThreshold" class="form-label">Quality Threshold (%)</label>
                                    <input type="number" class="form-control" id="qualityThreshold" name="quality_threshold" min="0" max="100" step="0.1" placeholder="95.0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tolerance" class="form-label">Tolerance (±)</label>
                                    <input type="text" class="form-control" id="tolerance" name="tolerance" placeholder="0.1mm or ±2%" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="assignedTester" class="form-label">Assigned Tester</label>
                                    <select class="form-select" id="assignedTester" name="assigned_tester">
                                        <option value="">Select Tester</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Mike Johnson</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="testDate" class="form-label">Scheduled Test Date</label>
                                    <input type="date" class="form-control" id="testDate" name="test_date" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="additionalNotes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="additionalNotes" name="additional_notes" rows="3" placeholder="Any additional information or special requirements..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Method Templates -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Test Method Templates</h5>
                        <span>Quick setup using predefined templates</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="template-card" onclick="loadTemplate('visual_inspection')">
                                    <div class="template-icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <h6>Visual Inspection</h6>
                                    <p class="text-muted">Standard visual quality assessment</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="template-card" onclick="loadTemplate('dimensional_check')">
                                    <div class="template-icon">
                                        <i class="fas fa-ruler"></i>
                                    </div>
                                    <h6>Dimensional Check</h6>
                                    <p class="text-muted">Measurements and size verification</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="template-card" onclick="loadTemplate('weight_verification')">
                                    <div class="template-icon">
                                        <i class="fas fa-weight-hanging"></i>
                                    </div>
                                    <h6>Weight Verification</h6>
                                    <p class="text-muted">Product weight measurement</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="template-card" onclick="loadTemplate('material_testing')">
                                    <div class="template-icon">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                    <h6>Material Testing</h6>
                                    <p class="text-muted">Material composition analysis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Test management functions
function saveTest() {
    const form = document.getElementById('testForm');
    if (form && form.checkValidity()) {
        showNotification('Quality test created successfully!', 'success');
        // Here you would typically submit the form data
        console.log('Test data:', new FormData(form));
    } else {
        form.reportValidity();
    }
}

function loadTemplate(templateType) {
    const templates = {
        visual_inspection: {
            testName: 'Visual Inspection Test',
            testMethod: 'visual_inspection',
            testCategory: 'inspection',
            priority: 'medium',
            testDescription: 'Standard visual quality assessment to identify surface defects, color variations, and cosmetic issues.',
            expectedDuration: 15,
            sampleSize: 20,
            testParameters: '1. Adequate lighting (500-1000 lux)\n2. Clean inspection surface\n3. Magnification tools if needed\n4. Standard inspection checklist',
            expectedResults: 'All products should meet visual quality standards with no major defects, consistent color, and proper finish.',
            qualityThreshold: 98.0,
            tolerance: '±0 defects'
        },
        dimensional_check: {
            testName: 'Dimensional Verification Test',
            testMethod: 'dimensional_check',
            testCategory: 'measurement',
            priority: 'high',
            testDescription: 'Precise measurement verification using calibrated instruments to ensure dimensional accuracy.',
            expectedDuration: 30,
            sampleSize: 15,
            testParameters: '1. Calibrated calipers and gauges\n2. Temperature controlled environment (20±2°C)\n3. Clean measurement surfaces\n4. Multiple measurement points',
            expectedResults: 'All measured dimensions should fall within specified tolerances and meet engineering specifications.',
            qualityThreshold: 99.5,
            tolerance: '±0.1mm'
        },
        weight_verification: {
            testName: 'Weight Verification Test',
            testMethod: 'weight_verification',
            testCategory: 'measurement',
            priority: 'medium',
            testDescription: 'Product weight measurement to ensure consistency and meet weight specifications.',
            expectedDuration: 20,
            sampleSize: 25,
            testParameters: '1. Calibrated digital scale\n2. Stable weighing surface\n3. Room temperature environment\n4. Multiple weight measurements',
            expectedResults: 'Product weights should be consistent and within specified weight ranges and tolerances.',
            qualityThreshold: 97.0,
            tolerance: '±2%'
        },
        material_testing: {
            testName: 'Material Composition Test',
            testMethod: 'material_testing',
            testCategory: 'laboratory',
            priority: 'critical',
            testDescription: 'Laboratory analysis to verify material composition and properties meet specifications.',
            expectedDuration: 120,
            sampleSize: 5,
            testParameters: '1. Laboratory testing equipment\n2. Controlled temperature and humidity\n3. Sample preparation protocols\n4. Multiple test runs for accuracy',
            expectedResults: 'Material composition should match specifications with properties meeting all required standards.',
            qualityThreshold: 99.9,
            tolerance: '±0.1%'
        }
    };

    const template = templates[templateType];
    if (template) {
        Object.keys(template).forEach(key => {
            const element = document.getElementById(key);
            if (element) {
                element.value = template[key];
            }
        });
        showNotification(`${template.testName} template loaded successfully!`, 'info');
    }
}

// Set default values
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('testDate').value = new Date().toISOString().split('T')[0];
});
</script>

<style>
.template-card {
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    cursor: pointer;
    transition: var(--transition);
    background: white;
}

.template-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow);
    border-color: var(--accent-color);
}

.template-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--accent-color) 0%, #2980b9 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.5rem;
}

.template-card h6 {
    margin-bottom: 0.5rem;
    color: var(--primary-color);
    font-weight: 600;
}

.template-card p {
    font-size: 0.85rem;
    margin: 0;
}
</style>

<?php include 'includes/footer.php'; ?>
