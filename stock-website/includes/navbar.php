<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fas fa-industry me-2"></i><?php echo SITE_NAME; ?>
        </a>
        
        <!-- Mobile Sidebar Toggle -->
        <button class="navbar-toggler d-lg-none sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isLoggedIn()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-2"></i><?php echo $_SESSION['user_name']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if (isAdmin() || isStockManager()): ?>
                                <li><a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user-edit me-2"></i>Profile
                            </a></li>
                            <li><a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="register.php">
                            <i class="fas fa-user-plus me-2"></i>Get Started
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
