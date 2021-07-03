<header class="navbar navbar-white sticky-top bg-white flex-md-nowrap p-0 shadow-sm navbar-expand-md">
    <a class="navbar-brand col-md-3 col-lg-2 col-xl-auto me-0 px-3" href="/"><img src="./assets/img/logoc.png" alt=""></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="bi bi-list"></span>
    </button>
    <div class="ml-auto justify-content-end collapse navbar-collapse">
        <ul class="navbar-nav px-3 d-none d-md-flex align-items-center">
            <?php if($_SESSION["member_id"] == 7) { ?>
            <li class="nav-item me-2">
                <div class="badge bg-danger rounded-pill py-2 px-3">DEMO MODE</div>
            </li>
            <?php } ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="myhelp" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-question-circle fa-lg fa-fw me-1"></i> Support
                </a>
                <ul class="dropdown-menu" aria-labelledby="myhelp">
                    <?php if ($isMemberTypye != 3 && $isMemberTypye != 0) { ?>
                    <li>
                        <a class="dropdown-item" href="app">
                            <i class="bi bi-laptop fa-lg fa-fw me-1"></i> Desktop Apps
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="https://docs.myseo.website/" target="_blank">
                            <i class="bi bi-journal-bookmark fa-lg fa-fw me-1"></i> Guideline
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="https://demo.myseo.website" target="_blank">
                            <i class="bi bi-braces fa-lg fa-fw me-1"></i>
                            <span>Testing Site</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item <?= $active === 'changelog' ? 'active' : '' ?>" href="change-logs">
                            <i class="bi bi-calendar4-event fa-lg fa-fw me-1"></i> Changelog
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item <?= $active === 'roadmap' ? 'active' : '' ?>" href="road-map">
                            <i class="bi bi-diagram-3 fa-lg fa-fw me-1"></i> Roadmap
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item <?= $active === 'helps' ? 'active' : '' ?>" href="helps">
                            <i class="bi bi-question-circle fa-lg fa-fw me-1"></i> Helps
                        </a>
                    </li>
                    <?php } else { ?>
                        <li>
                            <a class="dropdown-item" href="app">
                                <i class="bi bi-laptop fa-lg fa-fw me-1"></i> Desktop Apps
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item <?= $active === 'helps' ? 'active' : '' ?>" href="help-support">
                                <i class="bi bi-question-circle fa-lg fa-fw me-1"></i> Helps
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php if ($isMemberTypye == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="myadmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear fa-lg fa-fw me-1"></i> Admin CP
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="myadmin">
                        <?php if ($_SESSION["member_id"] == 1) {?>
                        <li>
                            <a href="upload" class="dropdown-item <?= $active === 'upload' ? 'active' : '' ?>">
                                <i class="bi bi-upload fa-lg fa-fw me-1"></i> Upload
                            </a>
                        </li>
                        <li>
                            <a href="posts" class="dropdown-item <?= $active === 'posts' ? 'active' : '' ?>">
                                <i class="bi bi-card-text fa-lg fa-fw me-1"></i> Post List
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <?php } ?>
                        <li>
                            <a href="users" class="dropdown-item <?= $active === 'users' ? 'active' : '' ?>">
                                <i class="bi bi-people fa-lg fa-fw me-1"></i> Users List
                            </a>
                        </li>
                        <li>
                            <a href="create-user" class="dropdown-item <?= $active === 'create' ? 'active' : '' ?>">
                                <i class="bi bi-person-plus fa-lg fa-fw me-1"></i> Create User
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="config" class="dropdown-item <?= $active === 'config' ? 'active' : '' ?>">
                                <i class="bi bi-gear fa-lg fa-fw me-1"></i> Configs
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="myprofile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person fa-lg fa-fw me-1"></i> Profile
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="myprofile">
                    <li>
                        <a href="profile" class="dropdown-item <?= $active === 'profile' ? 'active' : '' ?>">
                            <i class="bi bi-person fa-lg fa-fw me-1"></i> My Account
                        </a>
                    </li>
                    <li>
                        <a href="changepass" class="dropdown-item <?= $active === 'changepass' ? 'active' : '' ?>">
                            <i class="bi bi-shield-check fa-lg fa-fw me-1"></i> Change Password
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a href="logout" class="dropdown-item">
                            <i class="bi bi-box-arrow-right fa-lg fa-fw me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</header>