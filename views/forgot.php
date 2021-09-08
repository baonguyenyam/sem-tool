<?php
ob_start();
session_start();
require_once "global.php";
require_once "db/authNologin.php";
require_once 'core/functions.php';
require_once 'core/class.phpmailer.php';
require_once 'core/class.smtp.php';
require_once 'core/class-concat.php';
$getConfig = $auth->getConfig();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot your password - <?=LIFT_TITLE?></title>
    <?php require_once 'includes/css.php'; ?>
    <?php require_once 'includes/js.php'; ?>
    <?php require_once 'includes/favicon.php'; ?>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 420px;
            padding: 15px;
            margin: auto;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group>input,
        .form-label-group>label {
            height: 3.125rem;
            padding: .75rem;
        }

        .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            pointer-events: none;
            cursor: text;
            /* Match the input under the label */
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: 1.25rem;
            padding-bottom: .25rem;
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: .25rem;
            padding-bottom: .25rem;
            font-size: 12px;
            color: #777;
        }

        /* Fallback for Edge
-------------------------------------------------- */
        @supports (-ms-ime-align: auto) {
            .form-label-group>label {
                display: none;
            }

            .form-label-group input::-ms-input-placeholder {
                color: #777;
            }
        }

        /* Fallback for IE
-------------------------------------------------- */
        @media all and (-ms-high-contrast: none),
        (-ms-high-contrast: active) {
            .form-label-group>label {
                display: none;
            }

            .form-label-group input:-ms-input-placeholder {
                color: #777;
            }
        }
    </style>
</head>

<body class="f1w">
    <?php

    $sendEmailAll  = isset($_GET["status"]) ? $_GET["status"] : null;

    if (!empty($_POST["forgot"])) {

        $email = trim($_POST["member_email"]);
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

        if ($auth->checkEmail($email)) {

            $password = trim(getRandomKeyNum(10));
            $random_password_hash = password_hash($password, PASSWORD_DEFAULT);
            $auth->updateTempPass($random_password_hash, $auth->checkEmail($email)[0]['member_id']);

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
            $mail->Subject = 'Your reset password URL at ' . $getConfig[0]['config_name']; //Sets the Subject of the message
            $mail->Body = '<p dir="ltr"><a href="'.$actual_link.'/reset?key=' . $random_password_hash . '&email=' . $auth->checkEmail($email)[0]['member_email'] . '&id=' . $auth->checkEmail($email)[0]['member_id'] . '" target="_blank" rel="noopener">'.$actual_link.'/reset?key=' . $random_password_hash . '&email=' . $auth->checkEmail($email)[0]['member_email'] . '&id=' . $auth->checkEmail($email)[0]['member_id'] . '</a></p>';
            $mail->AltBody = '';
            $result = $mail->Send();                        //Send an Email. Return true on success or false on error
            if ($result["code"] == '400') {
                $output .= html_entity_decode($result['full_error']);
            }
            if ($output == '') {
                $util->redirect("./forgot?status=done");
            } else {
                echo $output;
            }
            // EMAIL 

        } else {
            $message = "Invalid your email address";
        }

    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">


                <form action="" method="post" id="frmLogin" class="form-signin">


                    <div class="text-center mb-4 mt-4">
                        <p><img src="/assets/img/logoc.png" alt="" class="w-100" style="max-width:250px"></p>
                    </div>
                    <div class="card rounded">
                        <div class="card-body shadow rounded p-4">
                            <h2 class="h3 mb-3 font-weight-normal">Forgot password</h2>
                            <?php if (isset($message)) { ?>
                                <div class="alert alert-danger mb-3"><?php echo $message; ?></div>
                            <?php } ?>


                            <?php if ($sendEmailAll === 'done') { ?>

                                <div class="alert alert-success">An email has been sent to your account. Please check your email to reactivate your account</div>

                            <?php } else { ?>

                                <div class="form-label-group">
                                    <input name="member_email" type="text" value="" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                                    <label for="inputEmail">Email</label>
                                </div>

                                <div class="d-grid mb-2 text-center mt-2">
                                    <input type="submit" name="forgot" value="Forgot password" class="btn btn-lg btn-primary btn-block">
                                </div>
                            
                            <?php } ?>

                            <div class="form-group  mb-0 text-center mt-5">
                                <p class="mb-0"><a href="login">Login</a></p>
                            </div>


                        </div>
                    </div>
                </form>


                

                <div class="mb-1 text-center mt-5">
                    <p class="mb-0">Author: <a href="https://baonguyenyam.github.io/" target="_blank">Nguyen Pham</a></p>
                </div>
                <p class="mb-5 text-muted text-center">© <?php echo date('Y'); ?></p>

            </div>
        </div>
    </div>
    <?php
    require_once "includes/footer.php";
    ?>

</body>

</html>