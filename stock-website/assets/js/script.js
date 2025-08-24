// Stock Management System JavaScript

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Counter animation
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    function updateCounter() {
        start += increment;
        if (start < target) {
            element.textContent = Math.floor(start);
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = target;
        }
    }
    
    updateCounter();
}

// Intersection Observer for counter animation
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counter = entry.target.querySelector('.stat-value');
            if (counter) {
                const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
                animateCounter(counter, target);
                counterObserver.unobserve(entry.target);
            }
        }
    });
}, { threshold: 0.5 });

// Observe all stat cards
document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => counterObserver.observe(card));
});

// Stock search functionality
function initStockSearch() {
    const searchInput = document.getElementById('stockSearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const stockItems = document.querySelectorAll('.stock-item-card');
            
            stockItems.forEach(item => {
                const itemName = item.querySelector('.stock-item-info h6').textContent.toLowerCase();
                const itemSKU = item.querySelector('.stock-item-info small').textContent.toLowerCase();
                
                if (itemName.includes(searchTerm) || itemSKU.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
}

// Category filter functionality
function initCategoryFilter() {
    const categorySelect = document.getElementById('categoryFilter');
    if (categorySelect) {
        categorySelect.addEventListener('change', function() {
            const selectedCategory = this.value;
            const stockItems = document.querySelectorAll('.stock-item-card');
            
            stockItems.forEach(item => {
                const itemCategory = item.dataset.category;
                if (selectedCategory === '' || itemCategory === selectedCategory) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
}

// Stock quantity validation
function validateStockQuantity(input) {
    const quantity = parseInt(input.value);
    const minQuantity = parseInt(input.dataset.minQuantity) || 0;
    
    if (quantity < minQuantity) {
        input.classList.add('is-invalid');
        return false;
    } else {
        input.classList.remove('is-invalid');
        return true;
    }
}

// Stock movement form enhancement
function initStockMovementForms() {
    const forms = document.querySelectorAll('.stock-movement-form');
    forms.forEach(form => {
        const quantityInput = form.querySelector('input[name="quantity"]');
        const itemSelect = form.querySelector('select[name="item_id"]');
        
        if (quantityInput && itemSelect) {
            itemSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const maxQuantity = selectedOption.dataset.quantity || 0;
                quantityInput.max = maxQuantity;
                quantityInput.dataset.maxQuantity = maxQuantity;
            });
            
            quantityInput.addEventListener('input', function() {
                validateStockQuantity(this);
            });
        }
    });
}

// Stock alerts functionality
function initStockAlerts() {
    const alertItems = document.querySelectorAll('.alert-item');
    alertItems.forEach(alert => {
        const acknowledgeBtn = alert.querySelector('.acknowledge-alert');
        if (acknowledgeBtn) {
            acknowledgeBtn.addEventListener('click', function() {
                const alertId = this.dataset.alertId;
                acknowledgeAlert(alertId, alert);
            });
        }
    });
}

function acknowledgeAlert(alertId, alertElement) {
    // This would typically make an AJAX call to update the alert status
    console.log('Acknowledging alert:', alertId);
    
    // Show loading state
    const btn = alertElement.querySelector('.acknowledge-alert');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Acknowledging...';
    btn.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        alertElement.style.opacity = '0.5';
        btn.innerHTML = '<i class="fas fa-check me-2"></i>Acknowledged';
        btn.classList.remove('btn-warning');
        btn.classList.add('btn-success');
        
        // Remove alert after 3 seconds
        setTimeout(() => {
            alertElement.remove();
        }, 3000);
    }, 1000);
}

// Export functionality
function exportToCSV(tableId, filename) {
    const table = document.getElementById(tableId);
    if (!table) return;
    
    let csv = [];
    const rows = table.querySelectorAll('tr');
    
    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        
        cols.forEach(col => {
            // Remove HTML tags and get text content
            let text = col.textContent || col.innerText || '';
            // Escape quotes and wrap in quotes if contains comma
            if (text.includes(',') || text.includes('"')) {
                text = '"' + text.replace(/"/g, '""') + '"';
            }
            rowData.push(text);
        });
        
        csv.push(rowData.join(','));
    });
    
    const csvContent = csv.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    
    if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

function exportToExcel(tableId, filename) {
    // This would typically use a library like SheetJS
    alert('Excel export functionality would be implemented here. For now, use CSV export.');
}

// Mobile menu toggle
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
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500);
            }
        }, 5000);
    });
}

// Form auto-save
function initFormAutoSave() {
    const forms = document.querySelectorAll('form[data-autosave]');
    forms.forEach(form => {
        const formKey = form.dataset.autosave;
        
        // Load saved data
        const savedData = localStorage.getItem(formKey);
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                Object.keys(data).forEach(key => {
                    const field = form.querySelector(`[name="${key}"]`);
                    if (field) {
                        field.value = data[key];
                    }
                });
            } catch (e) {
                console.error('Error loading saved form data:', e);
            }
        }
        
        // Auto-save on input
        form.addEventListener('input', function() {
            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            localStorage.setItem(formKey, JSON.stringify(data));
        });
        
        // Clear saved data on successful submission
        form.addEventListener('submit', function() {
            localStorage.removeItem(formKey);
        });
    });
}

// Keyboard shortcuts
function initKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.getElementById('stockSearch');
            if (searchInput) {
                searchInput.focus();
            }
        }
        
        // Ctrl/Cmd + N for new item
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            const newItemBtn = document.querySelector('[data-bs-target="#addStockItemModal"]');
            if (newItemBtn) {
                newItemBtn.click();
            }
        }
        
        // Escape to close modals
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                const modalInstance = bootstrap.Modal.getInstance(openModal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            }
        }
    });
}

// Show notification
function showNotification(message, type = 'info', duration = 3000) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after duration
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, duration);
}

// Initialize all functionality
document.addEventListener('DOMContentLoaded', function() {
    initStockSearch();
    initCategoryFilter();
    initStockMovementForms();
    initStockAlerts();
    initMobileMenu();
    initSmoothScrolling();
    initAutoHideAlerts();
    initFormAutoSave();
    initKeyboardShortcuts();
    
    console.log('Stock Management System initialized successfully!');
});

// Utility functions
function formatCurrency(amount, currency = 'RWF') {
    return currency + ' ' + number_format(amount, 0, '.', ',');
}

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if ((sep.length > 0)) {
        var i = s[0].length;
        if (i % 3 !== 0) {
            i = 3 - i % 3;
        }
        while (i < s[0].length) {
            s[0] = s[0].substr(0, i) + sep + s[0].substr(i);
            i += sep.length + 3;
        }
    }
    if ((s.length > 1) && (prec > 0)) {
        s[0] += dec + s[1];
    }
    return s[0];
}
