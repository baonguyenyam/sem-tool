<?php 
/*// HEADER */
$title = "Change password";
$active='changepass'; 
/*// LAYOUT */
require_once 'includes/header.php';

/*// CHECK */
$getID  = isset($_GET["id"]) ? $_GET["id"] : $auth->getMemberByID($_SESSION["member_id"])[0]["member_id"];
$getMemberByID = $auth->getMemberByID($getID);
$getConfig = $auth->getConfig();

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
    $email = trim($_POST["member_email"]);
    $random_password_hash = password_hash($password, PASSWORD_DEFAULT);
    $tokenId = $getID;
    $auth->updatePass($tokenId, $random_password_hash);

    // EMAIL 
    $output = '';
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    // SMTP
    $mail->Host = $getConfig[0]['config_host'];        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = $getConfig[0]['config_port'];                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = $getConfig[0]['config_username'];                    //Sets SMTP username
    $mail->Password = $getConfig[0]['config_password'];                    //Sets SMTP password
    $mail->SMTPSecure = $getConfig[0]['config_type'];

    // BEGIN 
    $mail->From = $getConfig[0]['config_username'];            //Sets the From email address for the message
    $mail->FromName = $getConfig[0]['config_name'];                    //Sets the From name of the message
    $mail->SetFrom($getConfig[0]['config_username'], $getConfig[0]['config_name']);
    $mail->AddReplyTo($getConfig[0]['config_username'], $getConfig[0]['config_name']);                 //Sets the From name of the message
    $mail->AddAddress($email);    //Adds a "To" address
    $mail->WordWrap = 50000000;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Your password has been changed at ' . $getConfig[0]['config_name']; //Sets the Subject of the message
    $mail->Body = '<p dir="ltr">Password: <strong>' . $password . '</strong></p>';
    $mail->AltBody = '';
    $result = $mail->Send();                        //Send an Email. Return true on success or false on error
    if ($result["code"] == '400') {
        $output .= html_entity_decode($result['full_error']);
    }
    if ($output == '') {
        $util->redirect("./");
    } else {
        echo $output;
    }
    // EMAIL 

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
                                    <input name="member_email" type="hidden" value="<?php echo $getMemberByID[0]["member_email"]; ?>" id="txtEmail" class="form-control" placeholder="">
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