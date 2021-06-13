<nav id="sidebarMenu" class="col-md-3 col-lg-2 col-xl d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'home' ? 'active' : '' ?>" aria-current="page" href="/">
                    <i class="bi bi-speedometer2 fa-lg fa-fw me-1"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
        
            <?php if ($isMemberTypye != 3) { ?>
                <?php include 'sidebar_lift.php'; ?>
            <?php } else { ?>
                <?php include 'sidebar_customers.php'; ?>
            <?php } ?>
        
        <hr>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'copyright' ? 'active' : '' ?>" href="copyright">
                <i class="bi bi-bootstrap-reboot fa-lg fa-fw me-1"></i> Copyright
                </a>
            </li>
            <li class="nav-item nav-link">
                <small class="text-muted">© <?php echo date('Y'); ?> - v<?=LIFT_VERSION?></small>
            </li>
        </ul>
    </div>
</nav>