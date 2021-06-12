<?php 
/*// HEADER */
$title = "Keywords generator";
$active='keyword'; 
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
                        <h1 class="h2">Keywords generator</h1>
                        <p>The tool works by allowing you to input general words and phrases into the 5 boxes, and then quickly generate keyword lists that can include your basic phrases and your long-tail terms.</p>
                    </div>
                    <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary" id="load">Load an example</button>
                        </div>
                        <div class="btn-group ms-2">
                            <button type="button" class="btn btn-sm btn-primary" id="generator">Generator</button>
                        </div>

                    </div>
                </div>


                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                    <div class="row gx-5">
                        <div class="col-lg">

                            <h3 class="mb-3"><span class="badge bg-primary">A</span> keywords</h3>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="" id="a_kw"
                                    style="height: 70px">nguyen,van</textarea>
                                <label for="a_kw">enter keywords and add comma (,) end of words</label>
                            </div>
                            <h3 class="mb-3"><span class="badge bg-info">B</span> keywords</h3>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="" id="b_kw"
                                    style="height: 70px">1,2,3</textarea>
                                <label for="b_kw">enter keywords and add comma (,) end of words</label>
                            </div>
                            <h3 class="mb-3"><span class="badge bg-warning">C</span> keywords</h3>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="" id="c_kw" style="height: 70px">@,#</textarea>
                                <label for="c_kw">enter keywords and add comma (,) end of words</label>
                            </div>
                            <h3 class="mb-3"><span class="badge bg-dark">D</span> keywords</h3>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="" id="d_kw" style="height: 70px">ᚠ,ᛉ</textarea>
                                <label for="d_kw">enter keywords and add comma (,) end of words</label>
                            </div>
                            <h3 class="mb-3"><span class="badge bg-secondary">E</span> keywords</h3>
                            <div class="form-floating mb-5 mb-lg-0">
                                <textarea class="form-control" placeholder="" id="e_kw"
                                    style="height: 70px">隨,河,予</textarea>
                                <label for="e_kw">enter keywords and add comma (,) end of words</label>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div id="boxresult">
                                <h3 class="mb-3">Results keywords <span id="number"
                                        class="badge bg-danger text-white small"></span></h3>
                                <div class="rv">
                                    <div class="alert alert-warning">Nothing to show</div>
                                </div>
                                <div class="rs d-none mb-3">
                                    <textarea class="form-control mb-2" placeholder="" rows="20" id="results"></textarea>
                                    <div class="row mt-3">
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-success"
                                                id="dwn-btn">Download</button>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-primary" id="save-btn">Save
                                                it</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </main>
        </div>
    </div>


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="keyworkds_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Keywords saved</strong>
                <small>1s ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your keywords list has been saved
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

</body>

</html>