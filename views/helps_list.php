<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Helps";
$active='helps'; 
/*// LAYOUT */
require_once 'includes/header.php';

if (isset($_GET['s'])) {
    $posts = $auth->getAllPosts('%' . $_GET['s'] . '%', 'helps');
    $query = $_GET['s'];
} else {
    $posts = $auth->getAllPosts('%%', 'helps');
    $query = '';
}
?>
<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Helps</h1>
                    <form action="" method="get" class="form-inline mb-2">
						<div class="form-group d-flex justify-content-center flex-nowrap align-items-center">
							<input type="text" name="s" id="s" placeholder="Search" class="form-control form-control-sm">
						</div>
					</form>
                </div>


                <div class="row mb-3">
                    <div class="col-12">

                    <?php
                    if ($posts) {

                        $pageper = 20;
                        $curent_page = isset($_GET["p"]) ? $_GET["p"] : 1;
                        $allpage = (ceil(count($posts) / $pageper)) > 0 ? ceil(count($posts) / $pageper) : 1;
                        $page = get_page($posts, $curent_page, $pageper);

                    ?>

                    <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5">
                            
                        <div class="table-responsive">
							<div class="list-group list-group-flush">

							<?php
                                        $m = 1;
                                        foreach ($page as &$item) {
                                    ?>
								<div  class="list-group-item list-group-item-action">
									<a href="post-view?id=<?=$item["post_id"]?>">
										<h3><?=$item["post_title"]?></h3>
									</a>
									<div class="text-muted"><?php echo time_elapsed_string($item["post_date"]) ?></div>
								</div>
								<?php
                                        $m++;
                                        }
                                    ?>
							</div>
                        </div>


                        <div class="row">
                            <div class="col-lg">
                                
                            </div>
                            <div class="col-auto">

                                <?php echo pagination($posts, $allpage, $curent_page, 'help-support', ['s']); ?>

                            </div>
                        </div>
                    
                    </div>

                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger">No helps found!</div>
                    <?php
                    }
                    ?>

                        
                    </div>
                </div>

            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>