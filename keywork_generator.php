<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nguyen Pham">
    <title>LIFT SEM Tools</title>
    <?php require 'includes/header.php';?>
</head>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Keywords generator</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-secondary" id="load">Load an example</button>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-primary" id="generator">Generator</button>
                        </div>

                    </div>
                </div>


                <div class="row">
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
                        <div class="form-floating mb-4">
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
                                        <button type="button" class="btn btn-success btn-lg"
                                            id="dwn-btn">Download</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary btn-lg" id="save-btn">Save
                                            it</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </main>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

</body>

</html>