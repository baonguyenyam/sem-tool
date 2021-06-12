<?php 
/*// HEADER */
$title = "WordPress Post generator";
$active='post'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>


    <?php require 'includes/nav.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                    <div class="pe-md-4">
                        <h1 class="h2">WordPress Post generator
                        </h1>
                        <p>The tool auto-generation posts from the keywords list you have.</p>
                    </div>
                </div>

                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">

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
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <h5>Source</h5>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#liftModal" class="howto"><i class="fa fa-question"></i></a>
                            </div>
                            <textarea class="form-control" placeholder="Paste export file (.xml) from WordPress post article" id="source" rows="12"></textarea>
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
                        <div class="col-12">
                            <p><strong>Code Key:</strong> <span class="text-muted" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE___</span>
                            </p>
                            <textarea class="d-none" id="results"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            <button type="button" class="btn btn-success btn-block" id="create-btn">Create import
                                file</button>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal" id="liftModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="liftModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="liftModalLabel">How to?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="/assets/img/help-1.png" alt="" class="img-thumbnail img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="keyworkds_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Memory cleared</strong>
                <small>1s ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your keywords list has been cleared
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>