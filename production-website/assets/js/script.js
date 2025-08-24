// Production Management System JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functionalities
    initNavbarScroll();
    initCounters();
    initProductionSearch();
    initMachineFilters();
    initMaterialTracker();
    initProductionAlerts();
    initMobileMenu();
    initSmoothScrolling();
    initAutoHideAlerts();
    initFormValidation();
    initKeyboardShortcuts();
});

// Navbar scroll effect
function initNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }
}

// Animate counters
function initCounters() {
    const counters = document.querySelectorAll('.stat-value');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target') || counter.textContent);
                animateCounter(counter, target);
                counterObserver.unobserve(counter);
            }
        });
    });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}

function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 20);
}

// Production search functionality
function initProductionSearch() {
    const searchInput = document.getElementById('productionSearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const items = document.querySelectorAll('.production-item');
            
            items.forEach(item => {
                const itemName = item.querySelector('.item-name')?.textContent.toLowerCase() || '';
                const itemSKU = item.querySelector('.item-sku')?.textContent.toLowerCase() || '';
                
                if (itemName.includes(searchTerm) || itemSKU.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
}

// Machine filter functionality
function initMachineFilters() {
    const statusFilter = document.getElementById('machineStatusFilter');
    if (statusFilter) {
        statusFilter.addEventListener('change', function() {
            const selectedStatus = this.value;
            const machines = document.querySelectorAll('.machine-item');
            
            machines.forEach(machine => {
                const machineStatus = machine.dataset.status;
                if (selectedStatus === '' || machineStatus === selectedStatus) {
                    machine.style.display = 'block';
                } else {
                    machine.style.display = 'none';
                }
            });
        });
    }
}

// Material tracker functionality
function initMaterialTracker() {
    const materialSearch = document.getElementById('materialSearch');
    if (materialSearch) {
        materialSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const materials = document.querySelectorAll('.material-item');
            
            materials.forEach(material => {
                const materialName = material.querySelector('.material-name')?.textContent.toLowerCase() || '';
                const materialSKU = material.querySelector('.material-sku')?.textContent.toLowerCase() || '';
                
                if (materialName.includes(searchTerm) || materialSKU.includes(searchTerm)) {
                    material.style.display = 'block';
                } else {
                    material.style.display = 'none';
                }
            });
        });
    }
}

// Production alerts functionality
function initProductionAlerts() {
    const alertButtons = document.querySelectorAll('.alert-action');
    alertButtons.forEach(button => {
        button.addEventListener('click', function() {
            const alertId = this.dataset.alertId;
            acknowledgeAlert(alertId);
        });
    });
}

function acknowledgeAlert(alertId) {
    // Simulate alert acknowledgment
    const alertElement = document.querySelector(`[data-alert-id="${alertId}"]`);
    if (alertElement) {
        alertElement.style.opacity = '0.6';
        alertElement.querySelector('.alert-action').textContent = 'Acknowledged';
        alertElement.querySelector('.alert-action').disabled = true;
        
        // Show notification
        showNotification('Alert acknowledged successfully', 'success');
    }
}

// Mobile menu functionality
function initMobileMenu() {
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
        
        // Close sidebar when clicking outside
        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });
    }
}

// Smooth scrolling
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Auto-hide alerts
function initAutoHideAlerts() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 300);
            }
        }, 5000);
    });
}

// Form validation
function initFormValidation() {
    const forms = document.querySelectorAll('form[data-validate]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!this.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            this.classList.add('was-validated');
        });
    });
}

// Keyboard shortcuts
function initKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.querySelector('#productionSearch, #materialSearch, input[type="search"]');
            if (searchInput) {
                searchInput.focus();
            }
        }
        
        // Ctrl/Cmd + N for new production plan
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            const newButton = document.querySelector('[data-bs-target="#newProductionPlanModal"]');
            if (newButton) {
                newButton.click();
            }
        }
        
        // Escape to close modals
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                const closeButton = openModal.querySelector('.btn-close');
                if (closeButton) {
                    closeButton.click();
                }
            }
        }
    });
}

// Utility functions
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatCurrency(amount) {
    return 'RWF ' + formatNumber(amount);
}

function formatDate(date) {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
}

function formatDateTime(datetime) {
    return new Date(datetime).toLocaleString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

// Production specific functions
function startProduction(planId) {
    if (confirm('Are you sure you want to start this production plan?')) {
        // Simulate starting production
        showNotification('Production plan started successfully', 'success');
        
        // Update UI
        const startButton = document.querySelector(`[onclick="startProduction(${planId})"]`);
        if (startButton) {
            startButton.textContent = 'In Progress';
            startButton.className = 'btn btn-warning btn-sm';
            startButton.disabled = true;
        }
    }
}

function completeProduction(planId) {
    if (confirm('Are you sure you want to mark this production plan as completed?')) {
        // Simulate completing production
        showNotification('Production plan completed successfully', 'success');
        
        // Update UI
        const completeButton = document.querySelector(`[onclick="completeProduction(${planId})"]`);
        if (completeButton) {
            completeButton.textContent = 'Completed';
            completeButton.className = 'btn btn-success btn-sm';
            completeButton.disabled = true;
        }
    }
}

function logProduction() {
    const form = document.getElementById('productionLogForm');
    if (form && form.checkValidity()) {
        // Simulate logging production
        showNotification('Production logged successfully', 'success');
        form.reset();
        
        // Close modal if exists
        const modal = bootstrap.Modal.getInstance(document.querySelector('#productionLogModal'));
        if (modal) {
            modal.hide();
        }
    } else if (form) {
        form.reportValidity();
    }
}

function exportProductionData(type) {
    // Simulate export functionality
    showNotification(`${type} export started. File will be downloaded shortly.`, 'info');
}

// Machine management functions
function startMachine(machineId) {
    if (confirm('Are you sure you want to start this machine?')) {
        showNotification('Machine started successfully', 'success');
        
        // Update machine status
        const statusBadge = document.querySelector(`[data-machine-id="${machineId}"] .machine-status`);
        if (statusBadge) {
            statusBadge.textContent = 'Active';
            statusBadge.className = 'machine-status active';
        }
    }
}

function stopMachine(machineId) {
    if (confirm('Are you sure you want to stop this machine?')) {
        showNotification('Machine stopped successfully', 'warning');
        
        // Update machine status
        const statusBadge = document.querySelector(`[data-machine-id="${machineId}"] .machine-status`);
        if (statusBadge) {
            statusBadge.textContent = 'Inactive';
            statusBadge.className = 'machine-status inactive';
        }
    }
}

// Material management functions
function addMaterial() {
    const form = document.getElementById('addMaterialForm');
    if (form && form.checkValidity()) {
        showNotification('Material added successfully', 'success');
        form.reset();
        
        // Close modal if exists
        const modal = bootstrap.Modal.getInstance(document.querySelector('#addMaterialModal'));
        if (modal) {
            modal.hide();
        }
    } else if (form) {
        form.reportValidity();
    }
}

function updateMaterialStock(materialId, type) {
    const quantity = prompt(`Enter quantity to ${type}:`);
    if (quantity && !isNaN(quantity)) {
        showNotification(`Material stock ${type}ed successfully`, 'success');
        
        // Update UI
        const stockElement = document.querySelector(`[data-material-id="${materialId}"] .current-stock`);
        if (stockElement) {
            const currentStock = parseFloat(stockElement.textContent);
            const newStock = type === 'add' ? currentStock + parseFloat(quantity) : currentStock - parseFloat(quantity);
            stockElement.textContent = newStock.toFixed(2);
        }
    }
}
