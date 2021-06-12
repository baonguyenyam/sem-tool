<?php 
/*// HEADER */
$title = "Configs";
$active='config'; 
/*// LAYOUT */
require_once 'includes/header.php';

/*// CHECK */
$getConfig = $auth->getConfig();
if ($isMemberTypye == 1) {
} else {
    $util->redirect("./");
}
// CREATE 
if (!empty($_POST["change"])) {
    $host = trim($_POST["host"]);
    $port = trim($_POST["port"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $type = trim($_POST["type"]);
    $name = trim($_POST["name"]);
    $auth->updateConfig($host, $port, $username, $password, $type, $name);
    $util->redirect("./config.php");
}
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <form action="" method="post" id="frmchange" class="form-signin">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div>
                        <h1 class="h2">Configs</h1>
                        </div>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <input type="submit" name="change" class="btn btn-sm btn-primary" value="Update" id="config">
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-6 offset-xl-3">
                            <div class="shadow p-5 mb-5 bg-body rounded border">
                                <?php if (isset($message)) { ?>
                                    <div class="form-group mb-3">
                                        <div class="alert alert-danger mb-0"><?php echo $message ?></div>
                                    </div>
                                <?php } ?>
                                <h4 class="mb-3">System's name</h4>
                                <div class="form-floating mb-5">
                                    <input name="name" type="text" value="<?php echo $getConfig[0]['config_name'] ?>" id="name" class="form-control" placeholder="LIFT SEO Tool" required>
                                    <label for="name">Name</label>
                                </div>
                                <h4 class="mb-3">SMTP</h4>
                                <div class="form-floating mb-3">
                                    <input name="host" type="text" value="<?php echo $getConfig[0]['config_host'] ?>" id="host" class="form-control" placeholder="smtp.gmail.com" required>
                                    <label for="host">Host</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="port" type="text" value="<?php echo $getConfig[0]['config_port'] ?>" id="port" class="form-control" placeholder="465" required>
                                    <label for="port">Port</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="username" type="text" value="<?php echo $getConfig[0]['config_username'] ?>" id="username" class="form-control" placeholder="demo@demo.com" required>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password" type="password" value="<?php echo $getConfig[0]['config_password'] ?>" id="password" class="form-control" placeholder="***" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="type" id="type" class="form-select">
                                        <option value="ssl" <?php echo $getConfig[0]["config_type"] === 'ssl' ? 'selected' : ''; ?>>SSL</option>
                                        <option value="tsl" <?php echo $getConfig[0]["config_type"] === 'tsl' ? 'selected' : ''; ?>>TSL</option>
                                    </select>
                                    <label for="type">Secure</label>
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