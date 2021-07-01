<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "WP Themes";
$active='themes'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <?php   
                    $arr = $auth->getfile(7);
                    foreach ($arr as &$value) {                    
                ?>
                <div class="px-4 py-5 my-5 text-center">
                    <img class="d-block mx-auto mb-4" src="/assets/img/icon.png" alt="" width="72" height="72">
                    <h1 class="display-5 fw-bold text-primary">LIFT's WP Themes</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">The LIFT WP Themes is a minimalistic theme for WordPress. This theme made for the LIFT Creations.</p>
                        <div class="d-grid gap-2 d-inline-flex flex-column">
                            <div>
                            <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-primary btn-lg px-4">Download</a>
                            </div>
                            <p class="my-1 text-muted small">v<?=$value['upload_version']?></p>
                        </div>
                    </div>
                </div>
                            <?php
                        }
                    ?>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                        <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                            <h5>Other versions</h5>
                            
							
							<?php
                        $arr = $auth->getfileAll(7);
						$i = 0;
                        foreach ($arr as &$value) { 
							if($i>0){
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT's WP Themes</strong>
                                    <p class="mb-0">v<?=$value['upload_version']?></p>
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>

                    <?php
							}
					$i++;
                        }
                    ?>


                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>