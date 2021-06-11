<?php 
/*// HEADER */
$title = "Users";
$active='users'; 
/*// LAYOUT */
require_once 'includes/header.php';

$getUserConfig = $auth->getMemberByID($_SESSION["member_id"]);
if (isset($_GET['s'])) {
    $users = $auth->getAllMember('%' . $_GET['s'] . '%');
    $query = $_GET['s'];
} else {
    $users = $auth->getAllMember('%%');
    $query = '';
}

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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Users</h1>
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
                        
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">.No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Group</th>
                                <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $m = 1;
                                    foreach ($page as &$item) {
                                        if ($item["member_id"] != 1) {
                                ?>
                                <tr>
                                <th scope="row"><?=$m?></th>
                                <td><a href="profile.php?id=<?=$item["member_id"]?>"><?=$item["member_name"]?></a></td>
                                <td><?=$item["member_fullname"]?></td>
                                <td><?php
                                if($item["member_type"] == 1) {
                                    echo 'Administartor';
                                } else if($item["member_type"] == 2) {
                                    echo 'Moderator';
                                } else if($item["member_type"] == 0) {
                                    echo 'User';
                                }
                                ?></td>
                                <td><?=$item["member_email"]?></td>
                                </tr>
                                <?php
                                        }
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

                            <?php echo pagination($users, $allpage, $curent_page, 'users.php', ['s']); ?>

                        </div>
                    </div>


                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger">No users found!</div>
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