<?php 
require_once 'includes/variables.php';
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
                    <button type="button" class="btn btn-primary btn-sm" id="create-btn">Create import
                                file</button>
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
                                <button class="btn btn-primary" type="button" id="loadf" onclick="loadFileAsText()">Upload</button>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <h5><span class="badge bg-info">Step 2</span></h5>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-xxl-7 mb-3">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <h5>Source</h5>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#liftModal" class="howto"><i class="fa fa-question"></i></a>
                            </div>
                            <textarea class="form-control" placeholder="Paste export file (.xml) from WordPress post article" id="source" rows="12"></textarea>
                        </div>
                        <div class="col-xxl-5 mb-3">

                            <ul class="nav nav-tabs nav-sm" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="kwb_1-tab" data-bs-toggle="tab" data-bs-target="#kwb_1" type="button" role="tab" aria-controls="kwb_1" aria-selected="true">P KW</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kwb_a-tab" data-bs-toggle="tab" data-bs-target="#kwb_a" type="button" role="tab" aria-controls="kwb_a" aria-selected="true">A</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kwb_b-tab" data-bs-toggle="tab" data-bs-target="#kwb_b" type="button" role="tab" aria-controls="kwb_b" aria-selected="true">B</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kwb_c-tab" data-bs-toggle="tab" data-bs-target="#kwb_c" type="button" role="tab" aria-controls="kwb_c" aria-selected="true">C</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kwb_d-tab" data-bs-toggle="tab" data-bs-target="#kwb_d" type="button" role="tab" aria-controls="kwb_d" aria-selected="true">D</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kwb_e-tab" data-bs-toggle="tab" data-bs-target="#kwb_e" type="button" role="tab" aria-controls="kwb_e" aria-selected="true">E</button>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kwb_1" role="tabpanel" aria-labelledby="kwb_1-tab">
                                    <textarea class="form-control text-sm border-top-0 rounded-0 rounded-bottom" placeholder="Paste your keywords list here" id="keyworkds" rows="10"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE___</code>
                                        </p>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear">Clear</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kwb_a" role="tabpanel" aria-labelledby="kwb_a-tab">
                                    <textarea class="form-control text-sm border-top-0 rounded-0 rounded-bottom" placeholder="Paste your keywords list here" id="keyworkds_a" rows="10"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___KW_A___</code>
                                        </p>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear_a">Clear</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kwb_b" role="tabpanel" aria-labelledby="kwb_b-tab">
                                    <textarea class="form-control text-sm border-top-0 rounded-0 rounded-bottom" placeholder="Paste your keywords list here" id="keyworkds_b" rows="10"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___KW_B___</code>
                                        </p>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear_b">Clear</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kwb_c" role="tabpanel" aria-labelledby="kwb_c-tab">
                                    <textarea class="form-control text-sm border-top-0 rounded-0 rounded-bottom" placeholder="Paste your keywords list here" id="keyworkds_c" rows="10"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___KW_C___</code>
                                        </p>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear_c">Clear</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kwb_d" role="tabpanel" aria-labelledby="kwb_d-tab">
                                    <textarea class="form-control text-sm border-top-0 rounded-0 rounded-bottom" placeholder="Paste your keywords list here" id="keyworkds_d" rows="10"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___KW_D___</code>
                                        </p>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear_d">Clear</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kwb_e" role="tabpanel" aria-labelledby="kwb_e-tab">
                                    <textarea class="form-control text-sm border-top-0 rounded-0 rounded-bottom" placeholder="Paste your keywords list here" id="keyworkds_e" rows="10"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___KW_E___</code>
                                        </p>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear_e">Clear</button>
                                    </div>
                                </div>
                            </div>

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