<?php 
/*// HEADER */
$title = "Image generator";
$active='image'; 
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
                        <h1 class="h2">Image generator</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro et nobis voluptatem ea eius architecto unde fugiat perspiciatis soluta necessitatibus iste rerum nam ipsum, deleniti sequi laboriosam quo, iusto atque?</p>
                    </div>
                    <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                        <div class="btn-group ms-2">
                            <button type="button" class="btn btn-sm btn-primary" id="boiler">Generator</button>
                        </div>
                    </div>
                </div>


                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                    <div class="row">
                        <div class="col-lg">
							<h5 class="mb-3">Results</h5>
							<textarea class="form-control form-control-sm mb-3" id="robotsresult" rows="24"></textarea>
							<button class="btn btn-success" data-clipboard-target="#robotsresult">Copy</button>
						</div>
                    </div>
                </div>



            </main>
        </div>
    </div>


    <?php require 'includes/footer.php';?>

</body>

</html>