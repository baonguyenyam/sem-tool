<?php 
/*// HEADER */
$title = "Change password";
$active='changepass'; 
/*// LAYOUT */
require_once 'includes/header.php';

/*// CHECK */
$getID  = isset($_GET["id"]) ? $_GET["id"] : $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"];
$getMemberByID = $auth->getMemberByID($getID);

if ($isMemberTypye == 1 || $getMemberByID[0]["member_id"] == $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"]) {
    if ($getID == 1 && (int)$_SESSION["member_id"] != 1) {
        $util->redirect("./");
    }
} else {
    $util->redirect("./");
}

if(!$getMemberByID) {
    $util->redirect("./");
}

// CREATE 
if (!empty($_POST["change"])) {
    $password = trim($_POST["member_password"]);
    $random_password_hash = password_hash($password, PASSWORD_DEFAULT);
    $tokenId = $getID;
    $auth->updatePass($tokenId, $random_password_hash);
}
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <form action="" method="post" id="frmchange" class="form-signin">
                    <input type="hidden" name="userid" id="userid" value="<?php echo $getID; ?>">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div>
                        <h1 class="h2">Change password</h1>
                        </div>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <input type="submit" name="change" class="btn btn-sm btn-primary" value="Update" id="changepass" onclick="return Validate()">
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-6 offset-xl-3 col-xxl-4 offset-xxl-4">
                            <div class="shadow p-5 mb-5 bg-body rounded border">
                                <h3 class="h3 mb-3 mt-0">Change password</h3>
                                <?php if (isset($message)) { ?>
                                    <div class="form-group mb-3">
                                        <div class="alert alert-danger mb-0"><?php echo $message ?></div>
                                    </div>
                                <?php } ?>
                                <div class="form-group mb-3">
                                    <label class="form-control" disabled><?php echo $getMemberByID[0]["member_name"]; ?></label>
                                </div>
                                
                                
                                <?php
                                if($isMemberTypye == 1 && $getMemberByID[0]["member_id"] != $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"]) {
                                ?>
                                <div class="form-floating mb-3">
                                    <input name="member_password" type="text" value="" id="txtPassword" class="form-control" placeholder="">
                                    <label for="txtPassword">Password</label>
                                </div>
                                <?php
                                } else {
                                ?>
                                <div class="form-floating mb-3">
                                    <input name="member_password" type="text" value="" id="txtPassword" class="form-control" placeholder="">
                                    <label for="txtPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password_again" type="text" value="" id="txtConfirmPassword" class="form-control" placeholder="">
                                    <label for="txtConfirmPassword">Confirm Password</label>
                                </div>
                                <?php
                                } 
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    
    <?php require 'includes/footer.php';?>

</body>

</html>