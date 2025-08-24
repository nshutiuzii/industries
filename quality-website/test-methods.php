<?php
$page_title = 'Test Methods';
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
                    <a class="nav-link" href="test-history.php">
                        <i class="fas fa-history"></i>
                        <span>Test History</span>
                        <span class="item-counter">45</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="test-methods.php">
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
                        <h2>Test Methods</h2>
                        <p class="text-muted mb-0">Manage and configure quality testing methods and procedures</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="refreshData()">
                            <i class="fas fa-sync-alt me-2"></i>Refresh
                        </button>
                        <button class="btn btn-primary" onclick="showNewMethodModal()">
                            <i class="fas fa-plus me-2"></i>New Method
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Methods Statistics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">18</h3>
                        <p class="stat-label">Total Methods</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">15</h3>
                        <p class="stat-label">Active Methods</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">3</h3>
                        <p class="stat-label">Pending Review</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">12</h3>
                        <p class="stat-label">Updated This Month</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Methods Grid -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5>Test Methods Library</h5>
                        <span>Browse and manage all available testing methods</span>
                    </div>
                    <div class="card-body">
                        <!-- Search and Filter Controls -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search methods...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="categoryFilter">
                                    <option value="">All Categories</option>
                                    <option value="inspection">Inspection</option>
                                    <option value="measurement">Measurement</option>
                                    <option value="laboratory">Laboratory</option>
                                    <option value="performance">Performance</option>
                                    <option value="safety">Safety</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                    <option value="review">Under Review</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            </div>
                        </div>

                        <!-- Test Methods Grid -->
                        <div class="row" id="methodsGrid">
                            <!-- Method cards will be populated here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Method Modal -->
<div class="modal fade" id="newMethodModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Test Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newMethodForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="methodName" class="form-label">Method Name</label>
                            <input type="text" class="form-control" id="methodName" name="method_name" placeholder="Enter method name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="methodCategory" class="form-label">Category</label>
                            <select class="form-select" id="methodCategory" name="method_category" required>
                                <option value="">Select Category</option>
                                <option value="inspection">Inspection</option>
                                <option value="measurement">Measurement</option>
                                <option value="laboratory">Laboratory</option>
                                <option value="performance">Performance</option>
                                <option value="safety">Safety</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="methodDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="methodDescription" name="method_description" rows="3" placeholder="Describe the test method..." required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="estimatedDuration" class="form-label">Estimated Duration (minutes)</label>
                            <input type="number" class="form-control" id="estimatedDuration" name="estimated_duration" min="1" placeholder="30" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="requiredEquipment" class="form-label">Required Equipment</label>
                            <input type="text" class="form-control" id="requiredEquipment" name="required_equipment" placeholder="e.g., Calipers, Scale, etc." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="testProcedure" class="form-label">Test Procedure</label>
                        <textarea class="form-control" id="testProcedure" name="test_procedure" rows="6" placeholder="Step-by-step test procedure..." required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="acceptanceCriteria" class="form-label">Acceptance Criteria</label>
                            <textarea class="form-control" id="acceptanceCriteria" name="acceptance_criteria" rows="3" placeholder="Define acceptance criteria..." required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="safetyNotes" class="form-label">Safety Notes</label>
                            <textarea class="form-control" id="safetyNotes" name="safety_notes" rows="3" placeholder="Any safety considerations..."></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="references" class="form-label">References & Standards</label>
                        <textarea class="form-control" id="references" name="references" rows="2" placeholder="Relevant standards, documents, or references..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveNewMethod()">Save Method</button>
            </div>
        </div>
    </div>
</div>

<!-- Method Details Modal -->
<div class="modal fade" id="methodDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Test Method Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="methodDetailsContent">
                    <!-- Method details will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary" onclick="editMethod()">
                    <i class="fas fa-edit me-2"></i>Edit
                </button>
                <button type="button" class="btn btn-primary" onclick="printMethod()">
                    <i class="fas fa-print me-2"></i>Print
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Test methods data
const testMethods = [
    {
        id: 1,
        name: 'Visual Inspection',
        category: 'inspection',
        status: 'active',
        description: 'Standard visual quality assessment to identify surface defects, color variations, and cosmetic issues.',
        duration: 15,
        equipment: 'Magnification tools, Lighting, Checklist',
        lastUpdated: '2024-01-10',
        usageCount: 245,
        successRate: 98.5
    },
    {
        id: 2,
        name: 'Dimensional Check',
        category: 'measurement',
        status: 'active',
        description: 'Precise measurement verification using calibrated instruments to ensure dimensional accuracy.',
        duration: 30,
        equipment: 'Calipers, Gauges, Temperature control',
        lastUpdated: '2024-01-08',
        usageCount: 189,
        successRate: 99.2
    },
    {
        id: 3,
        name: 'Weight Verification',
        category: 'measurement',
        status: 'active',
        description: 'Product weight measurement to ensure consistency and meet weight specifications.',
        duration: 20,
        equipment: 'Digital scale, Stable surface',
        lastUpdated: '2024-01-12',
        usageCount: 156,
        successRate: 97.8
    },
    {
        id: 4,
        name: 'Material Testing',
        category: 'laboratory',
        status: 'active',
        description: 'Laboratory analysis to verify material composition and properties meet specifications.',
        duration: 120,
        equipment: 'Lab equipment, Temperature control',
        lastUpdated: '2024-01-05',
        usageCount: 78,
        successRate: 99.8
    },
    {
        id: 5,
        name: 'Performance Testing',
        category: 'performance',
        status: 'review',
        description: 'Product performance testing under various conditions and stress levels.',
        duration: 60,
        equipment: 'Test chambers, Monitoring devices',
        lastUpdated: '2024-01-15',
        usageCount: 45,
        successRate: 96.3
    },
    {
        id: 6,
        name: 'Safety Compliance',
        category: 'safety',
        status: 'active',
        description: 'Safety compliance verification to ensure products meet all safety standards.',
        duration: 45,
        equipment: 'Safety testing equipment',
        lastUpdated: '2024-01-03',
        usageCount: 92,
        successRate: 99.1
    }
];

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    renderMethodsGrid();
    initializeSearchFilters();
});

// Render methods grid
function renderMethodsGrid() {
    const grid = document.getElementById('methodsGrid');
    grid.innerHTML = '';

    testMethods.forEach(method => {
        const methodCard = createMethodCard(method);
        grid.appendChild(methodCard);
    });
}

// Create method card
function createMethodCard(method) {
    const col = document.createElement('div');
    col.className = 'col-md-6 col-lg-4 mb-3';
    
    const statusClass = getStatusClass(method.status);
    const categoryIcon = getCategoryIcon(method.category);
    
    col.innerHTML = `
        <div class="method-card">
            <div class="method-header">
                <div class="method-icon">
                    <i class="${categoryIcon}"></i>
                </div>
                <div class="method-status">
                    <span class="badge ${statusClass}">${method.status}</span>
                </div>
            </div>
            <div class="method-body">
                <h6 class="method-title">${method.name}</h6>
                <p class="method-description">${method.description}</p>
                <div class="method-meta">
                    <span class="meta-item">
                        <i class="fas fa-clock"></i>
                        ${method.duration} min
                    </span>
                    <span class="meta-item">
                        <i class="fas fa-tools"></i>
                        ${method.equipment}
                    </span>
                </div>
                <div class="method-stats">
                    <div class="stat-item">
                        <span class="stat-label">Usage</span>
                        <span class="stat-value">${method.usageCount}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Success Rate</span>
                        <span class="stat-value">${method.successRate}%</span>
                    </div>
                </div>
            </div>
            <div class="method-footer">
                <small class="text-muted">Updated: ${method.lastUpdated}</small>
                <div class="method-actions">
                    <button class="btn btn-sm btn-outline-primary" onclick="viewMethodDetails(${method.id})">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="editMethod(${method.id})">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    return col;
}

// Get status class
function getStatusClass(status) {
    const statusClasses = {
        'active': 'bg-success',
        'draft': 'bg-secondary',
        'review': 'bg-warning',
        'archived': 'bg-dark'
    };
    return statusClasses[status] || 'bg-secondary';
}

// Get category icon
function getCategoryIcon(category) {
    const categoryIcons = {
        'inspection': 'fas fa-eye',
        'measurement': 'fas fa-ruler',
        'laboratory': 'fas fa-flask',
        'performance': 'fas fa-tachometer-alt',
        'safety': 'fas fa-shield-alt'
    };
    return categoryIcons[category] || 'fas fa-cogs';
}

// Show new method modal
function showNewMethodModal() {
    const modal = new bootstrap.Modal(document.getElementById('newMethodModal'));
    modal.show();
}

// Save new method
function saveNewMethod() {
    const form = document.getElementById('newMethodForm');
    if (form && form.checkValidity()) {
        showNotification('Test method created successfully!', 'success');
        const modal = bootstrap.Modal.getInstance(document.getElementById('newMethodModal'));
        modal.hide();
        form.reset();
        // Here you would typically submit the form data
    } else {
        form.reportValidity();
    }
}

// View method details
function viewMethodDetails(methodId) {
    const method = testMethods.find(m => m.id === methodId);
    if (!method) return;

    const modal = document.getElementById('methodDetailsModal');
    const content = document.getElementById('methodDetailsContent');
    
    content.innerHTML = `
        <div class="row">
            <div class="col-md-8">
                <h6>Method Information</h6>
                <table class="table table-sm">
                    <tr><td><strong>Name:</strong></td><td>${method.name}</td></tr>
                    <tr><td><strong>Category:</strong></td><td>${method.category}</td></tr>
                    <tr><td><strong>Status:</strong></td><td><span class="badge ${getStatusClass(method.status)}">${method.status}</span></td></tr>
                    <tr><td><strong>Duration:</strong></td><td>${method.duration} minutes</td></tr>
                    <tr><td><strong>Equipment:</strong></td><td>${method.equipment}</td></tr>
                    <tr><td><strong>Last Updated:</strong></td><td>${method.lastUpdated}</td></tr>
                </table>
                
                <h6 class="mt-4">Description</h6>
                <p>${method.description}</p>
                
                <h6 class="mt-4">Test Procedure</h6>
                <p>Detailed step-by-step procedure for ${method.name} testing...</p>
                
                <h6 class="mt-4">Acceptance Criteria</h6>
                <p>Specific criteria that must be met for the test to pass...</p>
            </div>
            <div class="col-md-4">
                <h6>Performance Statistics</h6>
                <div class="performance-stats">
                    <div class="stat-box">
                        <div class="stat-number">${method.usageCount}</div>
                        <div class="stat-label">Total Usage</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">${method.successRate}%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">${method.duration}</div>
                        <div class="stat-label">Avg Duration (min)</div>
                    </div>
                </div>
                
                <h6 class="mt-4">Recent Activity</h6>
                <ul class="list-unstyled">
                    <li class="activity-item">
                        <i class="fas fa-check-circle text-success"></i>
                        Test completed successfully - 2 hours ago
                    </li>
                    <li class="activity-item">
                        <i class="fas fa-edit text-primary"></i>
                        Method updated - 1 day ago
                    </li>
                    <li class="activity-item">
                        <i class="fas fa-user text-info"></i>
                        Assigned to QC Team - 3 days ago
                    </li>
                </ul>
            </div>
        </div>
    `;

    const bsModal = new bootstrap.Modal(modal);
    bsModal.show();
}

// Edit method
function editMethod(methodId) {
    // Implementation for editing method
    showNotification('Edit functionality will be implemented here', 'info');
}

// Print method
function printMethod() {
    window.print();
}

// Initialize search and filters
function initializeSearchFilters() {
    document.getElementById('searchInput').addEventListener('input', filterMethods);
    document.getElementById('categoryFilter').addEventListener('change', filterMethods);
    document.getElementById('statusFilter').addEventListener('change', filterMethods);
}

// Filter methods
function filterMethods() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    
    const filteredMethods = testMethods.filter(method => {
        const matchesSearch = method.name.toLowerCase().includes(searchTerm) || 
                             method.description.toLowerCase().includes(searchTerm);
        const matchesCategory = !categoryFilter || method.category === categoryFilter;
        const matchesStatus = !statusFilter || method.status === statusFilter;
        
        return matchesSearch && matchesCategory && matchesStatus;
    });
    
    renderFilteredMethods(filteredMethods);
}

// Render filtered methods
function renderFilteredMethods(methods) {
    const grid = document.getElementById('methodsGrid');
    grid.innerHTML = '';

    methods.forEach(method => {
        const methodCard = createMethodCard(method);
        grid.appendChild(methodCard);
    });
}

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('statusFilter').value = '';
    renderMethodsGrid();
}
</script>

<style>
.method-card {
    border: 1px solid var(--border-color);
    border-radius: 12px;
    background: white;
    transition: var(--transition);
    height: 100%;
}

.method-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow);
    border-color: var(--accent-color);
}

.method-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1rem 0.5rem;
}

.method-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--accent-color) 0%, #2980b9 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.method-status .badge {
    font-size: 0.75rem;
}

.method-body {
    padding: 0 1rem 1rem;
}

.method-title {
    margin-bottom: 0.5rem;
    color: var(--primary-color);
    font-weight: 600;
}

.method-description {
    font-size: 0.85rem;
    color: var(--text-muted);
    margin-bottom: 1rem;
    line-height: 1.4;
}

.method-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.meta-item {
    font-size: 0.8rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.method-stats {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.stat-item {
    text-align: center;
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.75rem;
    color: var(--text-muted);
    margin-bottom: 0.25rem;
}

.stat-value {
    display: block;
    font-weight: 600;
    color: var(--primary-color);
}

.method-footer {
    padding: 1rem;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.method-actions {
    display: flex;
    gap: 0.5rem;
}

.performance-stats {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.stat-box {
    text-align: center;
    padding: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: var(--light-bg);
}

.stat-box .stat-number {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-color);
}

.stat-box .stat-label {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.activity-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--border-color);
    font-size: 0.85rem;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-item i {
    margin-right: 0.5rem;
}
</style>

<?php include 'includes/footer.php'; ?>
