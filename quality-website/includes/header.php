<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Fixed Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Logo/Brand -->
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-shield-alt me-2"></i>
                <span class="brand-text"><?php echo SITE_NAME; ?></span>
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#notificationsModal">
                            <i class="fas fa-bell"></i>
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            <?php echo isLoggedIn() ? $_SESSION['user_name'] : 'Guest'; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Notifications Modal -->
    <div class="modal fade" id="notificationsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-bell me-2"></i>Quality Control Notifications
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="notification-item">
                        <div class="d-flex align-items-center mb-3">
                            <div class="notification-icon bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1">High Priority Issue Detected</h6>
                                <p class="mb-1 text-muted">Batch BATCH-20241202-MNOP has quality score below threshold</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="d-flex align-items-center mb-3">
                            <div class="notification-icon bg-info">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1">New Test Results Available</h6>
                                <p class="mb-1 text-muted">Dimensional verification completed for Product A</p>
                                <small class="text-muted">4 hours ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="d-flex align-items-center mb-3">
                            <div class="notification-icon bg-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1">Audit Completed Successfully</h6>
                                <p class="mb-1 text-muted">Monthly quality review passed all criteria</p>
                                <small class="text-muted">1 day ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="alerts.php" class="btn btn-primary">View All Notifications</a>
                </div>
            </div>
        </div>
    </div>
