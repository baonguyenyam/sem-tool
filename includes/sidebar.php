<nav id="sidebarMenu" class="col-md-3 col-lg-2 col-xl d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>TOOLS</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'home' ? 'active' : '' ?>" aria-current="page" href="/">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>MORE TOOLS</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'keyword' ? 'active' : '' ?>" href="keywork_generator.php">
                    Keywords generator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'post' ? 'active' : '' ?>" href="post_generator.php">
                    Wordpress posts generator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'html' ? 'active' : '' ?>" href="html_validator.php">
                    HTML Validator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'chrome' ? 'active' : '' ?>" href="chrome_extensions.php">
                    Chrome extensions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'changelog' ? 'active' : '' ?>" href="change_logs.php">
                    Changelog
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'roadmap' ? 'active' : '' ?>" href="road_map.php">
                    Roadmap
                </a>
            </li>
        </ul>
    </div>
</nav>