<?php 
/*// HEADER */
$title = "LIFT's Apps";
$active='app'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">

                <div class="px-4 my-5 text-center">
                    <img class="d-block mx-auto mb-4" src="/assets/img/icon.png" alt="" width="72" height="72">
                    <h1 class="display-5 fw-bold text-primary">LIFT's Apps</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">The LIFT's apps for your work is easy to use to install. This apps made for the LIFT Creations.</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                            <h5>Window</h5>
        
                            <div class="d-flex text-muted pt-3">
                                <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                                    <i class="fas fa-archive fa-3x"></i>
                                </div>
        
                                <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                                    <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                        <div class="mb-2">
                                            <strong class="d-block text-gray-dark">LIFT Creations</strong>
                                            <p class="mb-0">win32-x64</p>
                                        </div>
                                        <a href="download?filename=<?=md5('win32-x64')?>&f=LIFT_Creations_win32-x64.zip&dir=desktop" class="btn btn-sm btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                                    <i class="fas fa-archive fa-3x"></i>
                                </div>
        
                                <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                                    <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                        <div class="mb-2">
                                            <strong class="d-block text-gray-dark">LIFT Creations</strong>
                                            <p class="mb-0">win32-arm64</p>
                                        </div>
                                        <a href="download?filename=<?=md5('win32-arm64')?>&f=LIFT_Creations_win32-arm64.zip&dir=desktop" class="btn btn-sm btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3 mb-5">
                                <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                                    <i class="fas fa-archive fa-3x"></i>
                                </div>
        
                                <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                                    <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                        <div class="mb-2">
                                            <strong class="d-block text-gray-dark">LIFT Creations</strong>
                                            <p class="mb-0">win32-ia32</p>
                                        </div>
                                        <a href="download?filename=<?=md5('win32-ia32')?>&f=LIFT_Creations_win32-ia32.zip&dir=desktop" class="btn btn-sm btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
        
                            <h5>Linux</h5>
        
                            <div class="d-flex text-muted pt-3">
                                <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                                    <i class="fas fa-archive fa-3x"></i>
                                </div>
        
                                <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                                    <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                        <div class="mb-2">
                                            <strong class="d-block text-gray-dark">LIFT Creations</strong>
                                            <p class="mb-0">linux-x64</p>
                                        </div>
                                        <a href="download?filename=<?=md5('linux-x64')?>&f=LIFT_Creations_linux-x64.zip&dir=desktop" class="btn btn-sm btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                                    <i class="fas fa-archive fa-3x"></i>
                                </div>
        
                                <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                                    <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                        <div class="mb-2">
                                            <strong class="d-block text-gray-dark">LIFT Creations</strong>
                                            <p class="mb-0">linux-ia32</p>
                                        </div>
                                        <a href="download?filename=<?=md5('linux-ia32')?>&f=LIFT_Creations_linux-ia32.zip&dir=desktop" class="btn btn-sm btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>



            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>