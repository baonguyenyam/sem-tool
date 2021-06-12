<?php
ob_start();
session_start();
require_once "db/authNologin.php";
require_once 'functions/functions.php';
require 'functions/class.phpmailer.php';
require_once 'functions/class.smtp.php';
isset($_GET['key']) ? '' : $util->redirect("/");
isset($_GET['id']) ? '' : $util->redirect("/");
isset($_GET['email']) ? '' : $util->redirect("/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset your password - LIFT Creations</title>
    <link href="/assets/css/bootstrap/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/vendor/all.min.css" rel="stylesheet">
    <link href="/assets/css/vendor/codemirror.min.css" rel="stylesheet">
    <link href="/assets/css/vendor/theme/monokai.css" rel="stylesheet">
    <link href="/assets/css/dist/main.min.css" rel="stylesheet">
    <script src="/assets/js/vendor/jquery.min.js"></script>
    <script src="/assets/js/vendor/clipboard.min.js"></script>
    <script src="/assets/js/vendor/codemirror.min.js"></script>
    <script src="/assets/js/vendor/mode/xml/xml.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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

    $email = trim($_GET["email"]);
    $id = trim($_GET["id"]);
    $key = trim($_GET["key"]);

    if ($auth->checkReset($id, $email, $key)) {

        $username = $auth->getMemberByID($id)[0]['member_name'];
        $password = trim(getRandomKeyNum(6));
        $random_password_hash = password_hash($password, PASSWORD_DEFAULT);
        $auth->updatePass($id, $random_password_hash);
        $donepass = $password;
        $auth->updateTempPass('', $id);

        
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
                            <h2 class="h3 mb-3 font-weight-normal">Reset password</h2>
                            <?php if (isset($message)) { ?>
                                <div class="alert alert-danger mb-3"><?php echo $message; ?></div>
                            <?php } ?>
                            <?php if (isset($donepass)) { ?>
                            <p>Your new password is:</p>
                                <div class="alert alert-success fs-3 mb-3 text-center"><?php echo $donepass; ?></div>
                            <?php } ?>


                            

                            <div class="form-group  mb-0 text-center mt-5">
                                <p class="mb-0"><a href="login.php">Login</a></p>
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