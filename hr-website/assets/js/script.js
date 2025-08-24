// HR Pro - Custom JavaScript

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
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
                const target = parseInt(counter.textContent);
                animateCounter(counter, target);
                counterObserver.unobserve(entry.target);
            }
        }
    });
}, { threshold: 0.5 });

// Observe all stat cards
document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        counterObserver.observe(card);
    });
});

// Employee search functionality
function employeeSearch() {
    const searchInput = document.getElementById('employeeSearch');
    const searchTerm = searchInput.value.toLowerCase();
    const employeeCards = document.querySelectorAll('.employee-card');
    
    employeeCards.forEach(card => {
        const employeeName = card.querySelector('h5').textContent.toLowerCase();
        const employeePosition = card.querySelector('.employee-position').textContent.toLowerCase();
        const employeeDepartment = card.querySelector('.employee-department').textContent.toLowerCase();
        
        if (employeeName.includes(searchTerm) || 
            employeePosition.includes(searchTerm) || 
            employeeDepartment.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Department filter functionality
function departmentFilter() {
    const filterSelect = document.getElementById('departmentFilter');
    const selectedDepartment = filterSelect.value;
    const employeeCards = document.querySelectorAll('.employee-card');
    
    employeeCards.forEach(card => {
        const employeeDepartment = card.querySelector('.employee-department').textContent;
        
        if (selectedDepartment === 'all' || employeeDepartment === selectedDepartment) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Attendance time picker enhancement
function enhanceTimePickers() {
    const timeInputs = document.querySelectorAll('input[type="time"]');
    timeInputs.forEach(input => {
        input.addEventListener('change', function() {
            this.style.borderColor = '#10b981';
            this.style.boxShadow = '0 0 0 0.2rem rgba(16, 185, 129, 0.25)';
        });
    });
}

// Leave request form enhancement
function enhanceLeaveForm() {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    
    if (startDateInput && endDateInput) {
        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
            if (endDateInput.value && endDateInput.value < this.value) {
                endDateInput.value = this.value;
            }
        });
    }
}

// Performance rating stars
function initRatingStars() {
    const ratingContainers = document.querySelectorAll('.rating-stars');
    
    ratingContainers.forEach(container => {
        const stars = container.querySelectorAll('.fa-star');
        const hiddenInput = container.parentElement.querySelector('input[type="hidden"]');
        
        stars.forEach((star, index) => {
            star.addEventListener('click', function() {
                const rating = index + 1;
                updateStars(stars, rating);
                if (hiddenInput) {
                    hiddenInput.value = rating;
                }
            });
            
            star.addEventListener('mouseenter', function() {
                const rating = index + 1;
                updateStars(stars, rating);
            });
            
            star.addEventListener('mouseleave', function() {
                const currentRating = hiddenInput ? parseInt(hiddenInput.value) : 0;
                updateStars(stars, currentRating);
            });
        });
    });
}

function updateStars(stars, rating) {
    stars.forEach((star, index) => {
        if (index < rating) {
            star.classList.add('text-warning');
        } else {
            star.classList.remove('text-warning');
        }
    });
}

// Payroll calculation helper
function calculatePayroll() {
    const basicSalary = parseFloat(document.getElementById('basicSalary')?.value) || 0;
    const allowances = parseFloat(document.getElementById('allowances')?.value) || 0;
    const deductions = parseFloat(document.getElementById('deductions')?.value) || 0;
    
    const netSalary = basicSalary + allowances - deductions;
    
    const netSalaryElement = document.getElementById('netSalary');
    if (netSalaryElement) {
        netSalaryElement.textContent = netSalary.toLocaleString('en-US', {
            style: 'currency',
            currency: 'RWF'
        });
    }
}

// Select all functionality
function selectAllCheckbox() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const employeeCheckboxes = document.querySelectorAll('.employee-checkbox');
    
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            employeeCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
}

// Export to CSV
function exportToCSV(tableId, filename) {
    const table = document.getElementById(tableId);
    const rows = table.querySelectorAll('tr');
    let csv = [];
    
    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        cols.forEach(col => {
            let text = col.textContent.trim();
            // Handle commas and quotes in text
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
    link.href = URL.createObjectURL(blob);
    link.download = filename;
    link.click();
}

// Export to Excel
function exportToExcel(tableId, filename) {
    // This would require a library like SheetJS for proper Excel export
    alert('Excel export functionality would be implemented here with a proper library');
}

// Mobile menu toggle enhancement
function enhanceMobileMenu() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.toggle('show');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!navbarToggler.contains(event.target) && !navbarCollapse.contains(event.target)) {
                navbarCollapse.classList.remove('show');
            }
        });
    }
}

// Smooth scrolling for anchor links
function initSmoothScrolling() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
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
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });
}

// Form auto-save functionality
function initFormAutoSave() {
    const forms = document.querySelectorAll('form[data-autosave]');
    
    forms.forEach(form => {
        const formId = form.getAttribute('data-autosave');
        const formData = JSON.parse(localStorage.getItem(formId) || '{}');
        
        // Restore form data
        Object.keys(formData).forEach(key => {
            const input = form.querySelector(`[name="${key}"]`);
            if (input) {
                input.value = formData[key];
            }
        });
        
        // Auto-save on input change
        form.addEventListener('input', function(e) {
            if (e.target.name) {
                formData[e.target.name] = e.target.value;
                localStorage.setItem(formId, JSON.stringify(formData));
            }
        });
        
        // Clear saved data on form submit
        form.addEventListener('submit', function() {
            localStorage.removeItem(formId);
        });
    });
}

// Keyboard shortcuts
function initKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + S for form save
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            const activeForm = document.querySelector('form:focus-within');
            if (activeForm) {
                activeForm.dispatchEvent(new Event('submit'));
            }
        }
        
        // Ctrl/Cmd + K for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.getElementById('employeeSearch');
            if (searchInput) {
                searchInput.focus();
            }
        }
    });
}

// Notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Initialize all functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    enhanceTimePickers();
    enhanceLeaveForm();
    initRatingStars();
    selectAllCheckbox();
    enhanceMobileMenu();
    initSmoothScrolling();
    initAutoHideAlerts();
    initFormAutoSave();
    initKeyboardShortcuts();
    
    console.log('HR Pro - All functionality initialized successfully!');
});
