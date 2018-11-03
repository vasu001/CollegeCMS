<?php if (isAdminLoggedIn()): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger py-1 px-1">
        <div class="container-fluid">
            <a class="h6 navbar-brand" href="<?php echo URLROOT; ?>/admins/dashboard">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo URLROOT; ?>/admins/dashboard">Welcome <?php echo $_SESSION['admin_name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . '/admins/logout'; ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif;?>

<?php if (!isAdminLoggedIn()): ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT . '/pages/about'; ?>"><i class="fas fa-users"></i> About</a>
                </li>
                <a class="nav-link" href="<?php echo URLROOT . '/pages/facilities'; ?>"><i class="fas fa-wifi"></i> Facilities</a>
                </li>
                <a class="nav-link" href="<?php echo URLROOT . '/pages/campusEvent'; ?>"><i class="fas fa-volleyball-ball"></i> Events</a>
                </li>
                <a class="nav-link" href="<?php echo URLROOT . '/pages/career'; ?>"><i class="fas fa-rupee-sign"></i> Careers</a>
                </li>
                <a class="nav-link" href="<?php echo URLROOT . '/pages/contact'; ?>"><i class="fas fa-phone-volume"></i> Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . '/users/register'; ?>"><i class="fas fa-user-graduate"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . '/users/login'; ?>"><i class="fas fa-users"></i> Login</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>

<?php endif;?>