<?php 
/*// HEADER */
$title = "Ping to search engines";
$active='ping'; 
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
                        <h1 class="h2">Ping to search engines</h1>
                        <p>Pinging is an act to inform search engines and directories that your website has new content. The process is simple; just enter a URL of your site in ping website tool free, press “Ping Now” button and the site will be pinged on the net. Once you ping your website, search engines are ready to do several things.</p>
                    </div>
                    <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                        <div class="btn-group ms-2">
                            <button type="button" class="btn btn-sm btn-primary" id="pingnow">Ping Now</button>
                        </div>
                    </div>
                </div>


				<div class="row">
					<div class="col-xl-8 offset-xl-2">
                		<div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
							
							<div class="input-group mb-3">
								<input type="text" value="<?=isset($_GET['url'])?$_GET['url']:''?>" class="form-control" placeholder="Enter URL" aria-label="Enter URL" aria-describedby="pingHTML" id="pingHTML_URL" name="url">
							</div>
							
							<div class="input-group mb-3 mb-lg-0">

								<textarea class="form-control form-control-sm" id="pingList" rows="12"></textarea>
							</div>

						</div>
                    </div>
                </div>

            </main>
        </div>
    </div>


    <?php require 'includes/footer.php';?>

    <script>
        $.ajax({
            url: '/assets/ping.txt',
            dataType: 'text',
            async: false,
            success: function(json) {
                $('#pingList').html(json)
            }
        });
    </script>


</body>

</html>