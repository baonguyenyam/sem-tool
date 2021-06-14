<?php 
require_once 'includes/variables.php';
/*// HEADER */
$getID  = isset($_GET["id"]) ? $_GET["id"] : $util->redirect("./");
$getPOST = $auth->getPostByID($getID, 'posts');
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
                        <h1 class="h2"><?=$title?></h1>
                    </div>
                </div>


                <div class="shadow p-4 mb-5 bg-body rounded border mt-3 mt-xxl-5 mx-xxl-5">
                    <div class="row">
                        <div class="col-lg">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quibusdam earum facilis autem, ipsum repudiandae harum neque ex soluta minus dolores quidem ad illum esse sapiente rerum dolor in quas!
						</div>
                    </div>
                </div>



            </main>
        </div>
    </div>


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="keyworkds_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
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