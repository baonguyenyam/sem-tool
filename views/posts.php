<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Posts";
$active='posts'; 
/*// LAYOUT */
require_once 'includes/header.php';

if (isset($_GET['s'])) {
    $posts = $auth->getAllPosts('%' . $_GET['s'] . '%', 'posts');
    $query = $_GET['s'];
} else {
    $posts = $auth->getAllPosts('%%', 'posts');
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
                    <h1 class="h2">Posts</h1>
                    <form action="" method="get" class="form-inline mb-2">
						<div class="form-group d-flex justify-content-center flex-nowrap align-items-center">
							<a class="btn btn-circle me-3" href="post-add"><i class="bi bi-plus-lg fa-lg"></i></a>
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
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col" width="30">.No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Information</th>
                                    <th scope="col" width="100">CP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $m = 1;
                                        foreach ($page as &$item) {
                                    ?>
                                    <tr>
                                    <th scope="row"><?=$m?></th>
                                    <td><a href="post-view?id=<?=$item["post_id"]?>"><?=$item["post_title"]?></a></td>
                                    <td>
                                        <div class="small text-muted"><?php echo time_elapsed_string($item["post_date"]) ?></div>
                                
                                </td>
                                    <td class="small text-nowrap"><a href="post-edit?id=<?=$item["post_id"]?>" class="btn btn-sm btn-primary text-nowrap">Edit</a> <a href="post-del?id=<?=$item["post_id"]?>" class="btn btn-sm btn-danger text-nowrap" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                    </tr>
                                    <?php
                                        $m++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="col-lg">
                                
                            </div>
                            <div class="col-auto">

                                <?php echo pagination($posts, $allpage, $curent_page, 'posts', ['s']); ?>

                            </div>
                        </div>
                    
                    </div>

                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger">No posts found!</div>
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