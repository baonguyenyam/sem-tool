<?php require 'functions/functions.php'; ?>
<?php $active='content'; ?>
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
                    <h1 class="h2">Content SEO generator</h1>
                    <div class="btn-toolbar align-items-center mb-2 mb-md-0">
                        <div class="form-group form-check me-2 mb-0">
                            <input type="checkbox" class="form-check-input" id="add-title">
                            <label class="form-check-label" for="add-title">Include <code>title</code> tag</label>
                        </div>
                        <div class="form-group form-check me-2 mb-0">
                            <input type="checkbox" class="form-check-input" id="add-nofollow">
                            <label class="form-check-label" for="add-nofollow">Include <code>rel="nofollow"</code></label>
                        </div>
                        <div class="form-group form-check me-2 mb-0">
                            <input type="checkbox" class="form-check-input" id="add-tab">
                            <label class="form-check-label" for="add-tab">Open in new tab</label>
                        </div>
                        <?php if($_GET['type'] === 'enter') {?>
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-primary" id="contentgenerator">Generator</button>
                            </div>
                            <?php } else { ?>
                                <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-primary" id="contentgeneratorimport">Generator</button>
                            </div>
                        <?php } ?>

                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="?type=import" class="nav-link<?= ($_GET['type'] === 'import' || !$_GET['type']) ? ' active' : '' ?>">Import .CSV file</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="?type=enter" class="nav-link<?= $_GET['type'] === 'enter' ? ' active' : '' ?>">Enter list</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border p-3 border-top-0">
                    <div class="row mt-1">
                        <?php if($_GET['type'] === 'enter') {?>
                        <div class="col-lg">
                            <h3 class="mb-3">Keywords list</h3>
                            <div class="mb-4">
                                <textarea class="form-control" placeholder="enter keywords and enter end of words" id="contentkeyword" rows="20"></textarea>
                            </div>
                        </div>
                        <div class="col-lg">
                            <h3 class="mb-3">URLs list</h3>
                            <div class="mb-4">
                                <textarea class="form-control" placeholder="enter keywords and enter end of words" id="contenturls" rows="20"></textarea>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="col-lg-6">
                                <h3 class="mb-3">Upload .csv file</h3>

                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="fileCSVToLoad">
                                    <button class="btn btn-primary" type="button" id="loadcsv" onclick="loadCSVFileAsText()">Submit</button>
                                </div>
                                <textarea class="form-control" placeholder="Paste export file (.csv) content here. You have to follow the rule: 'TITLE, URL'" id="csvsource" rows="12"></textarea>

                            </div>
                        <?php } ?>
                        <div class="col-lg">
                            <div id="boxresult">
                                <h3 class="mb-3">Results</h3>
                                <div class="rv">
                                    <div class="alert alert-warning">Nothing to show</div>
                                </div>
                                <div class="rs d-none mb-3">


                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab-re" role="tablist">
                                        <button class="nav-link active" id="tab-total" data-bs-toggle="tab" data-bs-target="#nav-tab-total" type="button" role="tab" aria-controls="nav-tab-total" aria-selected="true">Text</button>
                                        <button class="nav-link" id="tab-area" data-bs-toggle="tab" data-bs-target="#nav-tab-area" type="button" role="tab" aria-controls="nav-tab-area" aria-selected="false">HTML</button>
                                    </div>
                                </nav>
                                <div class="tab-content border p-3 border-top-0" id="nav-tabContent-re">
                                    <div class="tab-pane fade show active" id="nav-tab-total" role="tabpanel" aria-labelledby="tab-total"><div id="totalurls"></div></div>
                                    <div class="tab-pane fade" id="nav-tab-area" role="tabpanel" aria-labelledby="tab-area"><textarea class="form-control form-control-sm" placeholder="enter keywords and enter end of words" id="contentresult" rows="15"></textarea></div>
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