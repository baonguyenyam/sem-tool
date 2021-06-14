<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "PageSpeed Insights";
$active='pagespeed'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        	<?php require 'includes/sidebar.php'; ?>
			<main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
				<form action="" id="checkmyDomain" name="checkmyDomain" method="post">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
						<div class="pe-md-4">
							<h1 class="h2">PageSpeed Insights</h1>
							<p>The PageSpeed Insights API provides free access to performance monitoring for web pages and returns data with suggestions for how to improve</p>
						</div>
						<div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
							<div class="btn-group">
								<input type="submit" class="btn btn-sm btn-primary" name="checkaddress" value="Check Now">
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xl-8 offset-xl-2">
							<div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5" id="speedResult">
								<?php if (!empty($_POST["checkaddress"])) {?>

									<div class="ifLoading">
										<i class="fas fa-spinner fa-lg1 fa-pulse"></i> loading...
									</div>
									<div class="ifDone d-none">
										<h3 class="mb-5 __domain"></h3>

										<figure class="mb-5 text-center">
											<img src="" alt="" class="img-thumbnail __thumbnail" src="">
										</figure>

										<div class="d-flex">
											<div class="single-chart __s_score_chart"></div>
											<div class="single-chart __s_block_chart"></div>
											<div class="single-chart __s_byte_chart"></div>
										</div>

										<div class="row mt-5">
											<div class="col-sm-12 d-flex justify-content-between flex-nowrap list-group-item">
												<div class="__js_title"></div>
												<div class="__js_value"></div>
											</div>
											<div class="col-sm-12 d-flex justify-content-between flex-nowrap list-group-item">
												<div class="__dom_title"></div>
												<div class="__dom_value"></div>
											</div>
											<div class="col-sm-12 d-flex justify-content-between flex-nowrap list-group-item">
												<div class="__interactive_title"></div>
												<div class="__interactive_value"></div>
											</div>
											<div class="col-sm-12 d-flex justify-content-between flex-nowrap list-group-item">
												<div class="__server_title"></div>
												<div class="__server_value"></div>
											</div>
											
										</div>
									</div>

								<?php } else {?>

									<div class="input-group mb-3">
										<input type="text" value="<?=isset($_GET['url'])?$_GET['url']:''?>" class="form-control" placeholder="Enter URL" aria-label="Enter your domain" aria-describedby="pingHTML" id="pingHTML_URL" name="url" required>
									</div>
									
									<div class="input-group mb-3 mb-lg-0 d-none">
										<textarea class="form-control form-control-sm" name="pingList" id="pingList" rows="12"></textarea>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

				</form>
			</main>
        </div>
    </div>

    <?php require 'includes/footer.php';?>
	<?php if (!empty($_POST["checkaddress"])) {?>
	<script>
		function buildtempChart(per) {
			let color = 'orange';
			if(per<50) {
				color = 'orange'
			} else if (per>=50 && per <75) {
				color = 'blue'
			} else if (per>=75 && per <=100) {
				color = 'green'
			} 
			return '<svg viewBox="0 0 36 36" class="circular-chart '+color+'"> <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" /> <path class="circle" stroke-dasharray="'+per+', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" /> <text x="18" y="20.35" class="percentage">'+per+'%</text> </svg>';
		}
		$.ajax({
			url: 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=<?=isset($_POST['url'])?$_POST['url']:''?>',
			data: '',
			type: 'GET',
			async: true,
			cache: false,
			success: function(json) {
				// console.log(json)
				var g = json.lighthouseResult.audits;
				$('#speedResult .__domain').text(json.id)
				$('#speedResult .__thumbnail').attr('src', g['final-screenshot'].details.data)
				$('#speedResult .__fpthumbnail').attr('src', g['full-page-screenshot'].details.screenshot.data)
				$('#speedResult .__js_title').text(g['bootup-time'].title)
				$('#speedResult .__js_value').text(g['bootup-time'].displayValue)
				$('#speedResult .__dom_title').text(g['dom-size'].title)
				$('#speedResult .__dom_value').text(g['dom-size'].displayValue)
				$('#speedResult .__interactive_title').text(g['interactive'].title)
				$('#speedResult .__interactive_value').text(g['interactive'].displayValue)
				$('#speedResult .__server_title').text(g['server-response-time'].title)
				$('#speedResult .__server_value').text(g['server-response-time'].displayValue)
				$('#speedResult .__s_title').text(g['speed-index'].title)
				$('#speedResult .__s_value').text(g['speed-index'].displayValue)
				$('#speedResult .__s_score').text(g['speed-index'].score)
				$('#speedResult .__s_score_chart').html(buildtempChart(g['speed-index'].score*100))
				$('#speedResult .__block_value').text(g['total-blocking-time'].title)
				$('#speedResult .__block_value').text(g['total-blocking-time'].displayValue)
				$('#speedResult .__block_score').text(g['total-blocking-time'].score)
				$('#speedResult .__s_block_chart').html(buildtempChart(g['total-blocking-time'].score*100))
				$('#speedResult .__byte_value').text(g['total-byte-weight'].title)
				$('#speedResult .__byte_value').text(g['total-byte-weight'].displayValue)
				$('#speedResult .__byte_score').text(g['total-byte-weight'].score)
				$('#speedResult .__s_byte_chart').html(buildtempChart(g['total-byte-weight'].score*100))
				$('.ifLoading').addClass('d-none');
				$('.ifDone').removeClass('d-none');
			},
			error: function () {
				$('.ifLoading').html('<div class="alert alert-danger">Something wrong!</div>');
			},
		});
	</script>
	<?php } ?>

</body>

</html>