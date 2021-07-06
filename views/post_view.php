<?php 
require_once 'includes/variables.php';
/*// HEADER */
$getID  = isset($_GET["id"]) ? $_GET["id"] : $util->redirect("./");
$getPOST = $auth->getPostByID($getID);
$title = $getPOST[0]['post_title'];
$active='post-view'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                    <div class="pe-md-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <?php if($getPOST[0]['post_type'] === 'helps') {?>
                                <li class="breadcrumb-item"><a href="/help-support">Helps</a></li>
                                <?php }?>
                                <?php if($getPOST[0]['post_type'] === 'pages') {?>
                                <li class="breadcrumb-item"><a href="/pages">Pages</a></li>
                                <?php }?>
                                <?php if($getPOST[0]['post_type'] === 'posts') {?>
                                <li class="breadcrumb-item"><a href="/posts">Posts</a></li>
                                <?php }?>
                                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                            </ol>
                        </nav>
                    </div>
                </div>


                <div class="shadow p-4 mb-5 bg-body rounded border mt-3 mt-xxl-5 mx-xxl-5">
                    <div class="row mb-3">
                        <div class="col-lg">
                            <h1 class="h2"><?=$title?></h1>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
							<?=$getPOST[0]['post_content']?>
						</div>
                    </div>
                </div>



            </main>
        </div>
    </div>


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="keywordds_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Keywords saved</strong>
                <small>1s ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your keywords list has been saved
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

</body>

</html>