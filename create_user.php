<?php 
/*// HEADER */
$title = "Create an user";
$active='create'; 
/*// LAYOUT */
require_once 'includes/header.php';

/*// CHECK */
$getUserConfig = $auth->getMemberByID($_SESSION["member_id"]);
if ($isMemberTypye == 1 ) {
} else {
    $util->redirect("./");
}
// CREATE 
if (!empty($_POST["change"])) {
    $username = strtolower(trim($_POST["member_name"]));
    $email = strtolower(trim($_POST["member_email"]));
    $fullname = trim($_POST["fullname"]);
    $content = $_POST["content"];
    $type = $_POST["type"];
    $password = trim($_POST["member_password"]);
    $random_password_hash = password_hash($password, PASSWORD_DEFAULT);
    $getPass = $random_password_hash;
    $getnow = date("Y-m-d H:i:s");
    if ($auth->getMemberByUsername($username)) {
        $message = 'This username already exits';
    } else if ($auth->checkEmail($email)) {
        $message = 'This email already exits';
    } else {
        $auth->insertUser($username, $getPass, $email, $type, $fullname, $content);
        $util->redirect("./");
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
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div>
                        <h1 class="h2">Create a new user</h1>
                        </div>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <input type="submit" name="change" class="btn btn-sm btn-primary" value="Create" id="createuser">
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-6 offset-xl-3 col-xxl-4 offset-xxl-4">
                            <div class="shadow p-5 mb-5 bg-body rounded border">
                                <h3 class="h3 mb-3 mt-0">Create user</h3>
                                <?php if (isset($message)) { ?>
                                    <div class="form-group mb-3">
                                        <div class="alert alert-danger mb-0"><?php echo $message ?></div>
                                    </div>
                                <?php } ?>
                                <div class="form-floating mb-3">
                                    <input name="member_name" type="text" value="" id="inputEmail" class="form-control" placeholder="" required autofocus>
                                    <label for="inputEmail">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="member_email" type="email" value="" id="inputN" class="form-control" placeholder="" required autofocus>
                                    <label for="inputN">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="fullname" type="text" value="" id="inputO" class="form-control" placeholder="">
                                    <label for="inputO">Full Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="member_password" type="text" value="" id="inputPassword" class="form-control" placeholder="" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="type" id="type" class="form-select">
                                        <option value="0">User</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Moderator</option>
                                    </select>
                                    <label for="type">Type</label>
                                </div>
                                <div class="form-floating">
                                    <textarea name="content" id="content" class="form-control" rows="5" style="min-height: 100px"></textarea>
                                    <label for="content">Information</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script>
        function generatePassword() {
            var length = 6,
                charset = "0123456789",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            return retVal;
        }
        $().ready(function() {
            $('#inputPassword').val(generatePassword());
        });
    </script>
    <?php require 'includes/footer.php';?>

</body>

</html>