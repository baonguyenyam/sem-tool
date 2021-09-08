<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "WordPress plugins";
$active='plugins'; 
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
                    <h1 class="display-5 fw-bold text-primary">LIFT's WordPress plugins</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">The LIFT WordPress plugins for your website is easy to use to install. This WordPress plugins made for the LIFT Creations.</p>
                    </div>
                </div>

                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5">
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
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT Core <span class="text-danger">(*)</span></strong>
                                    <p class="mb-0">This plugins add new LIFT's menu into WordPress site. It also auto rename image file by post title</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(2); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
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
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT Addons for Visual Composer</strong>
                                    <p class="mb-0">A collection of LIFT's addons for use in WPBakery Page Builder. WPBakery Page Builder must be installed and activated.</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(3); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
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
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT Blocks</strong>
                                    <p class="mb-0">This plugins add new Blocks feature into WordPress site.</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(4); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
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
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT CleanUp <span class="text-danger">(*)</span></strong>
                                    <p class="mb-0">This is a product of LIFT Creations.</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(5); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <?php   
                        $arr = $auth->getfile(6);
                        foreach ($arr as &$value) {                    
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                        <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT Chat</strong>
                                    <p class="mb-0">A Better Way to Connect With Customers</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(6); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <?php   
                        $arr = $auth->getfile(8);
                        foreach ($arr as &$value) {                    
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                        <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT WP Configure</strong>
                                    <p class="mb-0">LIFT WP Configure help you configure your websites without any coding knowledge required. Lightweight and using best practices for fastest load time.</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(8); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <?php   
                        $arr = $auth->getfile(9);
                        foreach ($arr as &$value) {                    
                    ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                        <i class="fas fa-archive fa-3x text-primary"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT PageBuilder</strong>
                                    <p class="mb-0">LIFT PageBuilder is a FREE drag & drop website building tool for WordPress. This plugin lets you develop a wonderful site in minutes without any coding.</p>
                                    <small class="mb-0 text-primary">
                                    <?php $arrN = $auth->getfileAll(9); foreach ($arrN as &$item) {  ?><a href="download?filename=<?=md5($item['upload_version'])?>&f=<?=$item['upload_fname']?>">v<?=$item['upload_version']?></a> <?php } ?>
                                    </small>                                
                                </div>
                                <a href="download?filename=<?=md5($value['upload_version'])?>&f=<?=$value['upload_fname']?>" class="btn btn-sm btn-success">Download v<?=$value['upload_version']?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                <?php if($_SESSION["member_id"] != 7) { ?>

                    <div class="d-flex text-muted pt-3">
                        <div class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <i class="fas fa-archive fa-3x"></i>
                        </div>

                        <div class="flex-fill pb-3 mb-0 small lh-sm border-bottom">
                            <div class="d-lg-flex w-100 justify-content-between align-items-start">
                                <div class="mb-2">
                                    <strong class="d-block text-gray-dark">LIFT Export 1 post</strong>
                                    <p class="mb-0">This plugins add export link into WordPress site.</p>
                                </div>
                                <a href="download?filename=<?=md5('wp-lift-export')?>&f=wp-lift-export.zip" class="btn btn-sm btn-success">Download</a>
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
                                    <strong class="d-block text-gray-dark">Visual Composer Clipboard</strong>
                                    <p class="mb-0">Clipboard and template manager for WPBakery Page Builder (Visual Composer)</p>
                                </div>
                                <a href="download?filename=<?=md5('vc_clipboard')?>&f=vc_clipboard.zip" class="btn btn-sm btn-success">Download</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>


                
                <p class="mt-3"><span class="text-danger">(*)</span>: Deleted or not support anymore</p>
                </div>


            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>