<?php require 'includes/hook.php'; ?>
<?php require 'functions/functions.php'; ?>
<?php $active = 'plugins'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nguyen Pham">
    <title>LIFT SEM Tools</title>
    <?php require 'includes/header.php'; ?>
</head>

<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Wordpress plugins</h1>

                </div>

                <div class="px-4 py-5 my-5 text-center">
                    <img class="d-block mx-auto mb-4" src="/assets/img/icon.png" alt="" width="72" height="72">
                    <h1 class="display-5 fw-bold text-primary">LIFT's Wordpress plugins</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">The LIFT Wordpress plugins for your website is easy to use to install. This Wordpress plugins made for the LIFT Creations.</p>
                    </div>
                </div>

                <div class="alert alert-light">
                    <h5>Plugins</h5>


                    <?php
                        $arr = $auth->getfile(2);
                        foreach ($arr as &$value) {                    
                    ?>


                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block text-gray-dark">LIFT Core</strong>
                                    <p class="mb-0">This plugins add new LIFT's menu into Wordpress site. It also auto rename image file by post title</p>
                                    <small class="mb-0 text-primary">v<?=$value['version']?></small>
                                </div>
                                <a href="download.php?filename=<?=md5($value['version'])?>&f=<?=$value['fname']?>" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <?php
                        $arr = $auth->getfile(3);
                        foreach ($arr as &$value) {                    
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block text-gray-dark">LIFT Addons for Visual Composer</strong>
                                    <p class="mb-0">A collection of LIFT's addons for use in WPBakery Page Builder. WPBakery Page Builder must be installed and activated.</p>
                                    <small class="mb-0 text-primary">v<?=$value['version']?></small>
                                </div>
                                <a href="download.php?filename=<?=md5($value['version'])?>&f=<?=$value['fname']?>" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <?php
                        $arr = $auth->getfile(4);
                        foreach ($arr as &$value) {                    
                    ?>
                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                        <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block text-gray-dark">LIFT Blocks</strong>
                                    <p class="mb-0">This plugins add new Blocks feature into Wordpress site.</p>
                                    <small class="mb-0 text-primary">v<?=$value['version']?></small>
                                </div>
                                <a href="download.php?filename=<?=md5($value['version'])?>&f=<?=$value['fname']?>" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <?php   
                        $arr = $auth->getfile(5);
                        foreach ($arr as &$value) {                    
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                        <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block text-gray-dark">LIFT CleanUp</strong>
                                    <p class="mb-0">This is a product of LIFT Creations.</p>
                                    <small class="mb-0 text-primary">v<?=$value['version']?></small>
                                </div>
                                <a href="download.php?filename=<?=md5($value['version'])?>&f=<?=$value['fname']?>" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <i class="fas fa-archive fa-3x"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block text-gray-dark">LIFT Export 1 post</strong>
                                    <p class="mb-0">This plugins add export link into Wordpress site.</p>
                                </div>
                                <a href="download.php?filename=<?=md5('wp-lift-export')?>&f=wp-lift-export.zip" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>


                    


                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <i class="fas fa-archive fa-3x"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block text-gray-dark">Visual Composer Clipboard</strong>
                                    <p class="mb-0">Clipboard and template manager for WPBakery Page Builder (Visual Composer)</p>
                                </div>
                                <a href="download.php?filename=<?=md5('vc_clipboard')?>&f=vc_clipboard.zip" class="btn btn-sm btn-success">Download</a>
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