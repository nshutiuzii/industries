<?php
$page_title = 'Calendar';
require_once 'config.php';
require_once 'functions.php';

include 'includes/header.php';
?>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="dashboard-title">Calendar</h1>
                <p class="dashboard-subtitle">Financial Management System</p>
            </div>
            <div class="col-lg-4 text-end">
                <div class="user-info">
                    <span class="user-name"><?php echo isLoggedIn() ? $_SESSION['user_name'] : 'Guest User'; ?></span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <div class="row">
        <!-- Left Sidebar Navigation -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar">
                <div class="sidebar-header">
                    <h5>Navigation</h5>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="budgets.php">
                                <i class="fas fa-chart-pie"></i>
                                <span>Budgets</span>
                                <span class="item-counter">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="income.php">
                                <i class="fas fa-arrow-up text-success"></i>
                                <span>Income</span>
                                <span class="item-counter">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="expenses.php">
                                <i class="fas fa-arrow-down text-danger"></i>
                                <span>Expenses</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="payroll.php">
                                <i class="fas fa-users"></i>
                                <span>Payroll</span>
                                <span class="item-counter">15</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="transactions.php">
                                <i class="fas fa-exchange-alt"></i>
                                <span>Transactions</span>
                                <span class="item-counter">24</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="recurring.php">
                                <i class="fas fa-redo"></i>
                                <span>Recurring</span>
                                <span class="item-counter">7</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="fas fa-university"></i>
                                <span>Accounts</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="purchase-orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Purchase Orders</span>
                                <span class="item-counter">9</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="petty-cash.php">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Petty Cash</span>
                                <span class="item-counter">4</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="invoices.php">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span>Invoices</span>
                                <span class="item-counter">18</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="assets.php">
                                <i class="fas fa-building"></i>
                                <span>Assets</span>
                                <span class="item-counter">11</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cost-centers.php">
                                <i class="fas fa-sitemap"></i>
                                <span>Cost Centers</span>
                                <span class="item-counter">6</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="approvals.php">
                                <i class="fas fa-check-circle"></i>
                                <span>Approvals</span>
                                <span class="item-counter">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alerts.php">
                                <i class="fas fa-bell"></i>
                                <span>Alerts</span>
                                <span class="item-counter">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documents.php">
                                <i class="fas fa-file-alt"></i>
                                <span>Documents</span>
                                <span class="item-counter">25</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signatures.php">
                                <i class="fas fa-signature"></i>
                                <span>Signatures</span>
                                <span class="item-counter">8</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-divider"></div>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="reports.php">
                                <i class="fas fa-chart-bar"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="audit-log.php">
                                <i class="fas fa-history"></i>
                                <span>Audit Log</span>
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
                            <p class="user-role"><?php echo isAdmin() ? 'Administrator' : 'User'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Dashboard Content -->
        <div class="col-lg-9 col-md-8">
            <div class="dashboard-content">
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Financial Calendar</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                <i class="fas fa-plus me-2"></i>Add Event
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Calendar Navigation -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="calendar-nav">
                                        <button class="btn btn-outline-secondary">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <h4 class="mx-3 mb-0">January 2024</h4>
                                        <button class="btn btn-outline-secondary">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    <div class="calendar-views">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-outline-primary active">Month</button>
                                            <button class="btn btn-outline-primary">Week</button>
                                            <button class="btn btn-outline-primary">Day</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Calendar Grid -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-body p-0">
                                <div class="calendar-grid">
                                    <!-- Calendar Header -->
                                    <div class="calendar-header">
                                        <div class="calendar-day-header">Sun</div>
                                        <div class="calendar-day-header">Mon</div>
                                        <div class="calendar-day-header">Tue</div>
                                        <div class="calendar-day-header">Wed</div>
                                        <div class="calendar-day-header">Thu</div>
                                        <div class="calendar-day-header">Fri</div>
                                        <div class="calendar-day-header">Sat</div>
                                    </div>
                                    
                                    <!-- Calendar Days -->
                                    <div class="calendar-days">
                                        <!-- Week 1 -->
                                        <div class="calendar-day prev-month">31</div>
                                        <div class="calendar-day">
                                            <span class="day-number">1</span>
                                            <div class="calendar-event income">
                                                <small>Client Payment Due</small>
                                            </div>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">2</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">3</span>
                                            <div class="calendar-event expense">
                                                <small>Rent Payment</small>
                                            </div>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">4</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">5</span>
                                            <div class="calendar-event warning">
                                                <small>Invoice Due</small>
                                            </div>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">6</span>
                                        </div>
                                        
                                        <!-- Week 2 -->
                                        <div class="calendar-day">
                                            <span class="day-number">7</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">8</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">9</span>
                                            <div class="calendar-event info">
                                                <small>Tax Filing</small>
                                            </div>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">10</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">11</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">12</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">13</span>
                                        </div>
                                        
                                        <!-- Week 3 -->
                                        <div class="calendar-day">
                                            <span class="day-number">14</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">15</span>
                                            <div class="calendar-event income">
                                                <small>Consulting Fee</small>
                                            </div>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">16</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">17</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">18</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">19</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">20</span>
                                        </div>
                                        
                                        <!-- Week 4 -->
                                        <div class="calendar-day">
                                            <span class="day-number">21</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">22</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">23</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">24</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">25</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">26</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">27</span>
                                        </div>
                                        
                                        <!-- Week 5 -->
                                        <div class="calendar-day">
                                            <span class="day-number">28</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">29</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">30</span>
                                        </div>
                                        <div class="calendar-day">
                                            <span class="day-number">31</span>
                                            <div class="calendar-event expense">
                                                <small>Payroll</small>
                                            </div>
                                        </div>
                                        <div class="calendar-day next-month">1</div>
                                        <div class="calendar-day next-month">2</div>
                                        <div class="calendar-day next-month">3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Upcoming Events -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5>Upcoming Events</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="upcoming-events">
                                    <div class="event-item">
                                        <div class="event-date">
                                            <div class="event-day">15</div>
                                            <div class="event-month">Jan</div>
                                        </div>
                                        <div class="event-content">
                                            <h6>Client Payment Due - ABC Corp</h6>
                                            <p class="text-muted">RWF 2,500,000 - Monthly consulting services</p>
                                            <span class="badge bg-success">Income</span>
                                        </div>
                                        <div class="event-actions">
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </div>
                                    </div>
                                    
                                    <div class="event-item">
                                        <div class="event-date">
                                            <div class="event-day">17</div>
                                            <div class="event-month">Jan</div>
                                        </div>
                                        <div class="event-content">
                                            <h6>Tax Filing Deadline</h6>
                                            <p class="text-muted">Quarterly tax returns submission</p>
                                            <span class="badge bg-info">Compliance</span>
                                        </div>
                                        <div class="event-actions">
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </div>
                                    </div>
                                    
                                    <div class="event-item">
                                        <div class="event-date">
                                            <div class="event-day">20</div>
                                            <div class="event-month">Jan</div>
                                        </div>
                                        <div class="event-content">
                                            <h6>Budget Review Meeting</h6>
                                            <p class="text-muted">Monthly budget performance review</p>
                                            <span class="badge bg-warning">Meeting</span>
                                        </div>
                                        <div class="event-actions">
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Calendar Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Event Title</label>
                        <input type="text" class="form-control" placeholder="Enter event title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Event Type</label>
                        <select class="form-select">
                            <option>Income</option>
                            <option>Expense</option>
                            <option>Meeting</option>
                            <option>Deadline</option>
                            <option>Compliance</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Event description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reminder</label>
                        <select class="form-select">
                            <option>No Reminder</option>
                            <option>15 minutes before</option>
                            <option>1 hour before</option>
                            <option>1 day before</option>
                            <option>1 week before</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Event</button>
            </div>
        </div>
    </div>
</div>

<style>
.calendar-grid {
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.calendar-header {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    background: var(--light-color);
    border-bottom: 1px solid var(--border-color);
}

.calendar-day-header {
    padding: 1rem;
    text-align: center;
    font-weight: 600;
    color: var(--text-color);
    border-right: 1px solid var(--border-color);
}

.calendar-day-header:last-child {
    border-right: none;
}

.calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.calendar-day {
    min-height: 120px;
    padding: 0.5rem;
    border-right: 1px solid var(--border-color);
    border-bottom: 1px solid var(--border-color);
    position: relative;
}

.calendar-day:nth-child(7n) {
    border-right: none;
}

.calendar-day.prev-month,
.calendar-day.next-month {
    background: var(--light-color);
    color: var(--text-muted);
}

.day-number {
    font-weight: 600;
    font-size: 1.1rem;
    color: var(--text-color);
}

.calendar-event {
    margin-top: 0.5rem;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.8rem;
    color: white;
}

.calendar-event.income {
    background: var(--success-color);
}

.calendar-event.expense {
    background: var(--danger-color);
}

.calendar-event.warning {
    background: var(--warning-color);
}

.calendar-event.info {
    background: var(--info-color);
}

.upcoming-events {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.event-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--light-color);
    border-radius: 8px;
    border: 1px solid var(--border-color);
}

.event-date {
    text-align: center;
    min-width: 60px;
}

.event-day {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    line-height: 1;
}

.event-month {
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

.event-content {
    flex: 1;
}

.event-content h6 {
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
}

.event-content p {
    margin: 0 0 0.5rem 0;
    font-size: 0.9rem;
}

.calendar-nav {
    display: flex;
    align-items: center;
}

.calendar-views .btn-group .btn {
    padding: 0.5rem 1rem;
}
</style>

<?php include 'includes/footer.php'; ?>
