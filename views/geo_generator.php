<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "GEO generator";
$active='geo'; 
/*// LAYOUT */
require_once 'includes/header.php';
require_once 'core/class-php-ico.php';
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                        <div class="pe-md-4">
                            <h1 class="h2">GEO generator</h1>
                            <p>Create HTML Geo-Tags for your own Website</p>
                        </div>
                        <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                            <div class="btn-group">
                            	<button type="button" class="btn btn-sm btn-primary" id="geogenerator">Generator</button>
                            </div>
                        </div>
                    </div>


					<div class="row">
					<div class="col-xl-8 offset-xl-2">
							<div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5" id="geoResult">
                                <h5 class="mb-3">Your information</h5>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-3">
                                            <h6>Start here and enter the address (street, city, country)</h6>
                                            <input type="text" name="geoaddress" value="1065 Foch St, Fort Worth, TX 76107" class="form-control" id="geoaddress" placeholder="Your address" required>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 mt-2 mb-3">
                                            <h6>Website's name</h6>
                                            <input type="text" name="geowebname" class="form-control" id="geowebname" required>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-md-6 mt-2 mb-3">
											<h6>State</h6>
											<select id="geostate" class="form-select"></select>
										</div>
                                        <div class="col-md-6 mt-2 mb-3">
											<h6>Email</h6>
											<input type="text" class="form-control" id="geoemail">
										</div>
                                        <div class="col-md-6 mt-2 mb-3">
											<h6>Phone</h6>
											<input type="text" class="form-control" id="geophone">
										</div>
                                        <div class="col-md-6 mt-2 mb-3">
											<h6>Fax</h6>
											<input type="text" class="form-control" id="geofax">
										</div>
									</div>
									<div class="row">
                                        <div class="col-md-12 mb-3">
											<h5 class="mt-3">Result</h5>
                                            <p class="mb-2">Please check the map above to ensure the correct position and then transfer the displayed code to your html-header</p>
                                            <textarea class="form-control" id="geosource" rows="5"></textarea>
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