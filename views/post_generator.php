<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "WordPress Post generator";
$active='post'; 
/*// LAYOUT */
require_once 'includes/header.php';
$btnquest = isset($_GET['type']) && $_GET['type'] === 'multi' ? 'multi' : '';
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
                    <button type="button" class="btn btn-primary btn-sm" id="create-btn<?=$btnquest?>">Create import file</button>
                </div>

                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5">

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="?type=default" class="nav-link<?= (isset($_GET['type']) && $_GET['type'] === 'default' || !isset($_GET['type'])) ? ' active' : '' ?>">Primary Keyword</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="?type=multi" class="nav-link<?= isset($_GET['type']) && $_GET['type'] === 'multi' ? ' active' : '' ?>">Multi-Keywords</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-4 border-top-0">
                        <?php if(isset($_GET['type']) && $_GET['type'] === 'multi') {?>

                            <div class="row gx-5">
                                <div class="col-xxl-6 mb-3">
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
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <h5>Source</h5>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#liftModal" class="howto"><i class="fa fa-question"></i></a>
                                            </div>
                                            <textarea class="form-control" placeholder="Paste export file (.xml) from WordPress post article" id="source" rows="13"></textarea>
                                            <p class="mt-2"><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE___</code>, <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE_A___</code>, <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE_B___</code>, <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE_C___</code>, <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE_D___</code>, <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE_E___</code>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 mb-3" id="multiresults">
                                    <h5 class="mb-3"><span class="badge bg-info">Step 2</span></h5>
                                    <div class="uv">

                                        <ul class="nav nav-tabs nav-sm" id="qrtabnice" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a href="javascript:void(0)" class="nav-link active" id="tabkws-tab" data-bs-toggle="tab" data-bs-target="#tabkws">Keywords</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a href="javascript:void(0)" class="nav-link" id="tabmakets-tab" data-bs-toggle="tab" data-bs-target="#tabmakets">Categories</a>
                                            </li>
                                        </ul>


                                        <div class="tab-content pt-4" id="myTabContentNice">
                                            <div class="tab-pane fade show active" id="tabkws">
                                                <h6><span class="badge bg-primary">A</span> keywords</h6>
                                                <div class="relative form-floating-0 mb-4">
                                                    <textarea class="form-control" placeholder="e.g: LIFT, Sandiego" id="a_kw"
                                                        style="height: 40px"></textarea>
                                                    <div class="form-check form-switch lock-btn-small" id="lock_a">
                                                        <input class="form-check-input" type="checkbox" id="l_a" checked disabled>
                                                    </div>
                                                    <div id="keywordds_a" class="btn-save">Save</div>
                                                </div>
                                                <h6><span class="badge bg-info">B</span> keywords</h6>
                                                <div class="relative form-floating-0 mb-4">
                                                    <textarea class="form-control" placeholder="e.g: Web, WordPress" id="b_kw"
                                                        style="height: 40px"></textarea>
                                                    <div class="form-check form-switch lock-btn-small" id="lock_b">
                                                        <input class="form-check-input" type="checkbox" id="l_b">
                                                    </div>
                                                    <div id="keywordds_b" class="btn-save">Save</div>
                                                </div>
                                                <h6><span class="badge bg-warning">C</span> keywords</h6>
                                                <div class="relative form-floating-0 mb-4">
                                                    <textarea class="form-control" placeholder="" id="c_kw" style="height: 40px"></textarea>
                                                    <div class="form-check form-switch lock-btn-small" id="lock_c">
                                                        <input class="form-check-input" type="checkbox" id="l_c">
                                                    </div>
                                                    <div id="keywordds_c" class="btn-save">Save</div>
                                                </div>
                                                <h6><span class="badge bg-dark">D</span> keywords</h6>
                                                <div class="relative form-floating-0 mb-4">
                                                    <textarea class="form-control" placeholder="" id="d_kw" style="height: 40px"></textarea>
                                                    <div class="form-check form-switch lock-btn-small" id="lock_d">
                                                        <input class="form-check-input" type="checkbox" id="l_d">
                                                    </div>
                                                    <div id="keywordds_d" class="btn-save">Save</div>
                                                </div>
                                                <h6><span class="badge bg-secondary">E</span> keywords</h6>
                                                <div class="relative form-floating-0 mb-5 mb-lg-2">
                                                    <textarea class="form-control" placeholder="" id="e_kw"
                                                        style="height: 40px"></textarea>
                                                    <div class="form-check form-switch lock-btn-small" id="lock_e">
                                                        <input class="form-check-input" type="checkbox" id="l_e" disabled>
                                                    </div>
                                                    <div id="keywordds_e" class="btn-save">Save</div>
                                                </div>
                                                <p class="text-muted">e.g: https://domain.com/<code>state</code>/<code>location</code>/<code class="text-primary">primary-keyword</code></p>

                                            </div>
                                            <div class="tab-pane fade" id="tabmakets">
                                                <h6>States</h6>
                                                <div class="relative form-floating-0 mb-4">
                                                    <textarea class="form-control" placeholder="" id="instate"
                                                        style="height: 40px"></textarea>
                                                        <div id="keywordds_f" class="btn-save">Save</div>

                                                </div>
                                                <h6>Cities</h6>
                                                <div class="relative form-floating-0 mb-4">
                                                    <textarea class="form-control" placeholder="e.g: Fort Worth" id="inlocation"
                                                        style="height: 40px"></textarea>
                                                        <div id="keywordds_g" class="btn-save">Save</div>

                                                </div>
                                                <p class="text-muted">e.g: https://domain.com/<code>state</code>/<code>location</code>/<code class="text-primary">primary-keyword</code></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rv d-none">
                                        <h5>Results <span id="number" class="badge badge-sm bg-success"></span></h5>
                                        <textarea class="form-control mb-2" placeholder="" rows="15" id="results"></textarea>
                                    </div>
                                    <textarea class="d-none" id="results<?=$btnquest?>"></textarea>
                                </div>
                            </div>

                        <?php } else { ?>
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

                                    <h5>Keywords</h5>
                                    <textarea class="form-control text-sm" placeholder="Paste your keywords list here" id="keywordds" rows="11"></textarea>
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <p><strong>Code Key:</strong> <code class="a" style="-webkit-user-select: all!important;-moz-user-select: all!important;user-select: all!important;">___REPLACE___</code>
                                        </p>
                                        <textarea class="d-none" id="results"></textarea>
                                        <button type="button" class="btn btn-xs btn-danger" id="clear">Clear</button>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
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
                    <a href="download?filename=<?=md5('demo')?>&f=demo.xml" class="btn btn-primary">Download sample file</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="keywordds_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Memory update</strong>
                <small>1s ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your keywords list has been update
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>


    

</body>

</html>