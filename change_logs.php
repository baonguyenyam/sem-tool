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
                    <h1 class="h2">Changelog</h1>

                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">v1.0.2</h5>
                                    <small>05/15/2021</small>
                                </div>
                                <p class="mb-1">Fixed bugs and improve somethings</p>
                                <ul class="small">
                                    <li>Fixed <code>LIFT_APP.code.setOption("theme", 'monokai')</code></li>
                                    <li>Fixed <code>localStorage.getItem("myLIFT_KW")</code></li>
                                    <li>Improve save keywords list feature</li>
                                    <li>Auto load keywords list from saved list</li>
                                </ul>
                            </div>
                            <div class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">v1.0.1</h5>
                                    <small>05/15/2021</small>
                                </div>
                                <p class="mb-1">Refactor Code</p>
                                <small>Big change, we have improve the source code and create matrix math to generator keyword and fixed some bugs on Wordpress Post generator tool</small>
                            </div>
                            <div class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">v0.4</h5>
                                    <small>05/15/2021</small>
                                </div>
                                <p class="mb-1">HTML Code validator</p>
                                <small>Find missing or unbalanced HTML tags in your documents, stray characters, duplicate IDs, missing or invalid attributes and other recommendations.</small>
                            </div>
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">v0.3</h5>
                                    <small class="text-muted">05/14/2021</small>
                                </div>
                                <p class="mb-1">Wordpress Post generator tool. </p>
                                <small>The tool auto-generation posts from the keywords list you have.</small>
                            </div>
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">v0.2</h5>
                                    <small class="text-muted">05/14/2021</small>
                                </div>
                                <p class="mb-1">Create "Keywords generator" tool. </p>
                                <small>The tool works by allowing you to input general words and phrases into the 5
                                    boxes, and then quickly generate keyword lists that can include your basic phrases
                                    and your long-tail terms.</small>
                            </div>
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">First version - v0.1</h5>
                                    <small class="text-muted">05/13/2021</small>
                                </div>
                                <p class="mb-1">Build the source code structure</p>
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