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
                                    <a href="?type=default" class="nav-link<?= (isset($_GET['type']) && $_GET['type'] === 'default' || !isset($_GET['type'])) ? ' active' : '' ?>">Primary Keywork</a>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 mb-3" id="multiresults">
                                    <h5 class="mb-3"><span class="badge bg-info">Step 2</span></h5>
                                    <div class="uv">
                                        <h6 class="mb-2"><span class="badge bg-primary">A</span> keywords</h6>
                                        <div class="form-floating-0 mb-4">
                                            <textarea class="form-control" placeholder="" id="a_kw"
                                                style="height: 40px">LIFT, Sandiego</textarea>
                                            <!-- <label for="a_kw">enter keywords and add comma (,) end of words</label> -->
                                        </div>
                                        <h6 class="mb-2"><span class="badge bg-info">B</span> keywords</h6>
                                        <div class="form-floating-0 mb-4">
                                            <textarea class="form-control" placeholder="" id="b_kw"
                                                style="height: 40px">Web, WordPress</textarea>
                                            <!-- <label for="b_kw">enter keywords and add comma (,) end of words</label> -->
                                        </div>
                                        <h6 class="mb-2"><span class="badge bg-warning">C</span> keywords</h6>
                                        <div class="form-floating-0 mb-4">
                                            <textarea class="form-control" placeholder="" id="c_kw" style="height: 40px"></textarea>
                                            <!-- <label for="c_kw">enter keywords and add comma (,) end of words</label> -->
                                        </div>
                                        <h6 class="mb-2"><span class="badge bg-dark">D</span> keywords</h6>
                                        <div class="form-floating-0 mb-4">
                                            <textarea class="form-control" placeholder="" id="d_kw" style="height: 40px"></textarea>
                                            <!-- <label for="d_kw">enter keywords and add comma (,) end of words</label> -->
                                        </div>
                                        <h6 class="mb-2"><span class="badge bg-secondary">E</span> keywords</h6>
                                        <div class="form-floating-0 mb-5 mb-lg-0">
                                            <textarea class="form-control" placeholder="" id="e_kw"
                                                style="height: 40px"></textarea>
                                            <!-- <label for="e_kw">enter keywords and add comma (,) end of words</label> -->
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

                                    <h5>Keyworks</h5>
                                    <textarea class="form-control text-sm" placeholder="Paste your keywords list here" id="keyworkds" rows="11"></textarea>
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