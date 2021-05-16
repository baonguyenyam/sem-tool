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
                    <h1 class="h2">Wordpress Post generator
                    </h1>

                </div>


                <div class="row">
                    <div class="col">
                        <h5><span class="badge bg-info">Step 1</span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <h5 class="mb-3">Upload xml file</h5>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="fileToLoad">
                            <button class="btn btn-primary" type="button" id="loadf" onclick="loadFileAsText()">Submit</button>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h5><span class="badge bg-info">Step 2</span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-xxl-7 mb-3">
                        <h5>Source</h5>
                        <textarea class="form-control" placeholder="Paste export file (.xml) from Wordpress post article" id="source" rows="12"></textarea>
                    </div>
                    <div class="col-lg-3 col-xxl-5 mb-3">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <h5>Keywords</h5>
                            <button type="button" class="btn btn-xs btn-danger" id="clear">Clear</button>
                        </div>
                        <textarea class="form-control text-sm" placeholder="Paste your keywords list here" id="keyworkds" rows="12"></textarea>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <p><strong>Code Key:</strong> <span class="text-muted" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE___</span>
                        </p>
                        <textarea class="d-none" id="results"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg mb-3">
                        <button type="button" class="btn btn-success btn-lg btn-block" id="create-btn">Create import
                            file</button>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>