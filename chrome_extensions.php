<?php require 'functions/functions.php'; ?>
<?php $active = 'chrome'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nguyen Pham">
    <title>LIFT SEM Tools</title>
    <?php require 'includes/header.php'; ?>
</head>

<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Chrome extensions</h1>

                </div>

                <div class="px-4 py-5 my-5 text-center">
                    <img class="d-block mx-auto mb-4" src="/assets/img/icon.png" alt="" width="72" height="72">
                    <h1 class="display-5 fw-bold text-primary">LIFT's Chrome extensions</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">The LIFT extension for your browser is easy to use to install. This extension made for the LIFT Creations.</p>
                        <div class="d-grid gap-2 d-inline-flex flex-column">
                            <a href="/files/lift_extention.zip" class="btn btn-primary btn-lg px-4">Download</a>
                            <p class="my-1 text-muted small">v.1.0</p>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>