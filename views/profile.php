<?php 
/*// HEADER */
$title = "Edit profile";
$active='profile'; 
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
    $userid = isset($_POST["userid"]) ?  $_POST["userid"] : $_SESSION["member_id"];
    $email = strtolower(trim($_POST["member_email"]));
    $fullname = trim($_POST["fullname"]);
    $content = $_POST["content"];
    $type = $_POST["type"];
    $password = trim($_POST["member_password"]);
    $random_password_hash = password_hash($password, PASSWORD_DEFAULT);
    $getPass = $random_password_hash;
    $getnow = date("Y-m-d H:i:s");
    
    if ($email !== $getMemberByID[0]['member_email']) {
        if ($auth->checkEmail($email)) {
            $message = 'This email already exits';
        } else {
            if($isMemberTypye == 1 && $getMemberByID[0]["member_id"] == $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"]) {
                $auth->editUser($email, null , $fullname, $content, $userid);
            } else {
                $auth->editUser($email, $type, $fullname, $content, $userid);
            }
            if ($isMemberTypye == 1) {
                $util->redirect("./profile?id=" . $getID . "");
            } else {
                $util->redirect("./profile");
            }
        }
    } else {
        if($isMemberTypye == 1 && $getMemberByID[0]["member_id"] == $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"]) {
            $auth->editUser($email, null, $fullname, $content, $userid);
        } else {
            $auth->editUser($email, $type, $fullname, $content, $userid);
        }
        if ($isMemberTypye == 1) {
            $util->redirect("./profile?id=" . $getID . "");
        } else {
            $util->redirect("./profile");
        }
    }

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
                        <h1 class="h2">Edit profile</h1>
                        </div>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <input type="submit" name="change" class="btn btn-sm btn-primary" value="Update" id="createuser">
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-6 offset-xl-3">
                            <div class="shadow p-5 mb-5 bg-body rounded border">
                                <h3 class="h3 mb-3 mt-0">Edit profile</h3>
                                <?php if (isset($message)) { ?>
                                    <div class="form-group mb-3">
                                        <div class="alert alert-danger mb-0"><?php echo $message ?></div>
                                    </div>
                                <?php } ?>
                                <div class="form-group mb-3">
                                    <label class="form-control" disabled><?php echo $getMemberByID[0]["member_name"]; ?></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="member_email" type="email" value="<?php echo $getMemberByID[0]["member_email"]; ?>" id="inputN" class="form-control" placeholder="" required autofocus>
                                    <label for="inputN">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="fullname" type="text" value="<?php echo $getMemberByID[0]["member_fullname"]; ?>" id="inputO" class="form-control" placeholder="">
                                    <label for="inputO">Full Name</label>
                                </div>
                                <?php
                                if($isMemberTypye == 1 && $getMemberByID[0]["member_id"] != $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"]) {
                                ?>
                                <div class="form-floating mb-3">
                                    <select name="type" id="type" class="form-select">
                                        <option value="0"<?php echo $getMemberByID[0]["member_type"] == 0 ? ' selected' : ''; ?>>User</option>
                                        <option value="1"<?php echo $getMemberByID[0]["member_type"] == 1 ? ' selected' : ''; ?>>Administrator</option>
                                        <option value="2"<?php echo $getMemberByID[0]["member_type"] == 2 ? ' selected' : ''; ?>>Moderator</option>
                                        <option value="3"<?php echo $getMemberByID[0]["member_type"] == 3 ? ' selected' : ''; ?>>Customers</option>
                                    </select>
                                    <label for="type">Type</label>
                                </div>
                                <?php
                                }
                                ?>
                                <div class="form-floating">
                                    <textarea name="content" id="content" class="form-control" rows="5" style="min-height: 100px"><?php echo $getMemberByID[0]["member_info"]; ?></textarea>
                                    <label for="content">Information</label>
                                </div>
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