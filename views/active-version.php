<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Active Website";
$active='active-version'; 
/*// LAYOUT */
require_once 'includes/header.php';

$getUserConfig = $auth->getMemberByID($_SESSION["member_id"]);

$users = $auth->getAllActiveWeb();

if ($isMemberTypye == 1) {
} else {
    $util->redirect("./");
}

?>
<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Active Website</h1>
                    <form action="" method="get" class="form-inline mb-2">
                        <div class="form-group">
                            <input type="text" name="s" id="s" placeholder="Search" class="form-control form-control-sm">
                        </div>
                    </form>
                </div>


                <div class="row mb-3">
                    <div class="col-12">

                    <?php
                    if ($users) {

                        $pageper = 20;
                        $curent_page = isset($_GET["p"]) ? $_GET["p"] : 1;
                        $allpage = (ceil(count($users) / $pageper)) > 0 ? ceil(count($users) / $pageper) : 1;
                        $page = get_page($users, $curent_page, $pageper);

                    ?>
                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col" width="30">.No</th>
                                <th scope="col">Time</th>
                                <th scope="col">URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $m = 1;
                                    foreach ($page as &$item) {
                                ?>
                                <tr>
                                    <th scope="row"><?=$m?></th>
                                    <td><?=$item["date_time"]?></td>
                                    <td><?=$item["version_url"]?></td>
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

                            <?php echo pagination($users, $allpage, $curent_page, 'active-version', ['s']); ?>

                        </div>
                    </div>
                    </div>


                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger">No active website found!</div>
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