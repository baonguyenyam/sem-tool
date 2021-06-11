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
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>LOGS...</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'changelog' ? 'active' : '' ?>" href="change_logs.php">
                <i class="bi bi-calendar4-event fa-lg fa-fw me-1"></i> Changelog
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'roadmap' ? 'active' : '' ?>" href="road_map.php">
                <i class="bi bi-diagram-3 fa-lg fa-fw me-1"></i> Roadmap
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>DOCS</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="https://docs.myseo.website/" target="_blank">
                <i class="bi bi-journal-bookmark fa-lg fa-fw me-1"></i> Guideline
                </a>
            </li>
        </ul>



        <?php if ($isLoggedIn) { ?>
            <hr>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
                <span>Control Panel</span>
            </h6>
            <div class="list-group">
                <?php if ($isMemberTypye == 1) { ?>
                    <?php if ($_SESSION["member_id"] == 1) {?>
                        <a href="upload.php" class="list-group-item list-group-item-action <?= $active === 'upload' ? 'active' : '' ?>">
                            <i class="bi bi-upload fa-lg fa-fw me-1"></i> Upload
                        </a>
                    <?php } ?>
                    <a href="users.php" class="list-group-item list-group-item-action <?= $active === 'users' ? 'active' : '' ?>">
                        <i class="bi bi-people fa-lg fa-fw me-1"></i> Users list
                    </a>
                    <a href="create_user.php" class="list-group-item list-group-item-action <?= $active === 'create' ? 'active' : '' ?>">
                        <i class="bi bi-person-plus fa-lg fa-fw me-1"></i> Create user
                    </a>
                    <hr>
                <?php } ?>
                <a href="profile.php" class="list-group-item list-group-item-action <?= $active === 'profile' ? 'active' : '' ?>">
                    <i class="bi bi-person fa-lg fa-fw me-1"></i> Profile
                </a>
                <a href="logout.php" class="list-group-item list-group-item-action">
                    <i class="bi bi-box-arrow-right fa-lg fa-fw me-1"></i> Logout
                </a>
            </div>
            <hr>
        <?php } ?>


        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                <i class="bi bi-bootstrap-reboot fa-lg fa-fw me-1"></i> Copyright
                </a>
            </li>
        </ul>
    </div>
</nav>