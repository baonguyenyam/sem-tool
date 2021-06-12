<?php
ob_start();
session_start();
require_once "global.php";
require_once "db/authNologin.php";
require_once 'core/functions.php';
require_once 'core/class.phpmailer.php';
require_once 'core/class.smtp.php';
require_once 'core/class-concat.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LogIn - <?=LIFT_TITLE?></title>
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

    if (!empty($_POST["login"])) {

        $redirect = NULL;
        if ($_POST['location'] != '') {
            $redirect = $_POST['location'];
        }

        $isAuthenticated = false;

        
        $username = explode('@', trim($_POST["member_name"]))[0];
        $password = trim($_POST["member_password"]);

        $user = $auth->getMemberByUsername($username);
        if($user) {
            if (password_verify($password, $user[0]["member_password"])) {
                $isAuthenticated = true;
            }
        }
        
        if ($isAuthenticated) {
            $_SESSION["member_id"] = $user[0]["member_id"];
            $_SESSION["member_type"] = $user[0]["member_type"];

            // Set Auth Cookies if 'Remember Me' checked
            if (!empty($_POST["remember"])) {
                setcookie("member_login", $username, $cookie_expiration_time);

                $random_password = $util->getToken(16);
                setcookie("random_password", $random_password, $cookie_expiration_time);

                $random_selector = $util->getToken(32);
                setcookie("random_selector", $random_selector, $cookie_expiration_time);

                $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
                $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

                $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

                // mark existing token as expired
                $userToken = $auth->getTokenByUsername($username, 0);
                if (!empty($userToken[0]["auth_id"])) {
                    $auth->markAsExpired($userToken[0]["auth_id"]);
                }

                setcookie("member_type", $user[0]["member_type"], $cookie_expiration_time);

                // Insert new token
                $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
            } else {
                // $util->clearAuthCookie();
            }

            if($redirect) {
                $util->redirect($redirect);
            } else {
                $util->redirect("/");
            }

        } else {
            $message = "<div>Invalid Username or Password</div>";
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
                            <h2 class="h3 mb-3 font-weight-normal">Login</h2>
                            <?php if (isset($message)) { ?>
                                <div class="alert alert-danger mb-3"><?php echo $message; ?></div>
                            <?php } ?>
                            <div class="form-label-group">
                                <input name="member_name" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" id="inputEmail" class="form-control" placeholder="Account" required autofocus>
                                <label for="inputEmail">Account</label>
                            </div>
                            <div class="form-label-group">
                                <input name="member_password" type="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>

                            </div>
                            <div class="form-check form-switch mb-4">
                                <?php
                                    echo '<input type="hidden" name="location" value="';
                                    if (isset($_GET['location'])) {
                                        echo htmlspecialchars($_GET['location']);
                                    }
                                    echo '" />';
                                ?>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <div class="d-grid mb-2 text-center mt-2">
                                <input type="submit" name="login" value="Login" class="btn btn-lg btn-primary btn-block">
                            </div>
                            <div class="form-group  mb-0 text-center mt-5">
                                <p class="mb-0"><a href="forgot">Forgot Password</a></p>
                            </div>
                        </div>
                    </div>
                </form>


                

                <div class="mb-1 text-center mt-5">
                    <p class="mb-0"><a href="https://docs.myseo.website/" target="_blank">Guidelines</a></p>
                </div>
                <p class="mb-5 mb-0 text-muted text-center">© <?php echo date('Y'); ?></p>

            </div>
        </div>
    </div>
    <?php
    require_once "includes/footer.php";
    ?>

</body>

</html>