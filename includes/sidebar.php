<nav id="sidebarMenu" class="col-md-3 col-lg-2 col-xl d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'home' ? 'active' : '' ?>" aria-current="page" href="/">
                <i class="bi bi-speedometer2 fa-lg fa-fw me-1"></i> Dashboard
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>TOOLS</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'keyword' ? 'active' : '' ?>" href="keywork_generator.php">
                <i class="bi bi-type-h1 fa-lg fa-fw me-1"></i> Keywords generator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'post' ? 'active' : '' ?>" href="post_generator.php">
                <i class="bi bi-stickies fa-lg fa-fw me-1"></i> WordPress posts generator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'content' ? 'active' : '' ?>" href="content_generator.php">
                <i class="bi bi-bullseye fa-lg fa-fw me-1"></i> Content SEO generator
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $active === 'plugingen' ? 'active' : '' ?>" href="plugin_generator.php">
                <i class="bi bi-cloud-download fa-lg fa-fw me-1"></i> Plugin Generator
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ADDONS...</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'html' ? 'active' : '' ?>" href="html_validator.php">
                <i class="bi bi-check2-all fa-lg fa-fw me-1"></i> HTML Validator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'chrome' ? 'active' : '' ?>" href="chrome_extensions.php">
                <i class="bi bi-box-seam fa-lg fa-fw me-1"></i>  Chrome extensions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'plugins' ? 'active' : '' ?>" href="wp_plugins.php">
                <i class="bi bi-archive fa-lg fa-fw me-1"></i> WordPress plugins
                </a>
            </li>
        </ul>
        <hr>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'copyright' ? 'active' : '' ?>" href="about.php">
                <i class="bi bi-bootstrap-reboot fa-lg fa-fw me-1"></i> Copyright
                </a>
            </li>
        </ul>
    </div>
</nav>