<?php require 'functions/functions.php'; ?>
<?php $active='html'; ?>
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

<?php
if (isset($_GET['url'])) {
    $value = getHtml($_GET['url']);
}
?>

<body>


    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">HTML Validator</h1>

                </div>


                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-3">HTML Source</h3>
                    </div>
                    <div class="col-lg">
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" value="<?=isset($_GET['url'])?$_GET['url']:''?>" class="form-control" placeholder="Enter URL" aria-label="Enter URL" aria-describedby="checkHTML" id="checkHTML_URL" name="url">
                                <button class="btn btn-primary" type="submit" id="checkHTML">Read this URL</button>
                            </div>
                        </form>

                        <?php
                        if (isset($_GET['url'])) {
                            echo auto_preview($_GET["url"]);
                        }
                        ?>

                        <textarea class="form-control text-sm d-none" placeholder="Paste your HTML Code here" id="htmlcode" rows="12"><?=isset($value)?$value:''?></textarea>
                        <div class="row d-none">
                            <div class="col-lg my-3">
                                <button type="button" class="btn btn-success btn-lg btn-block" id="validator-btn">Validation</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="alert alert-danger d-none" id="err_HTML"></div>
                        <div class="alert alert-success d-none" id="done_HTML"><i class="fa fa-check"></i> Good job!
                        </div>
                        <div class="d-none" id="check_HTML"></div>
                    </div>
                </div>






            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>