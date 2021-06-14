<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "WHOIS Domain Lookup";
$active='domain'; 
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
							<h1 class="h2">WHOIS Domain Lookup</h1>
							<p>The Domain Name Registration Data lookup and WHOIS failover lookup results are shown to help users obtain information about domain name registration ...</p>
						</div>
						<div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
							<div class="btn-group">
								<input type="submit" class="btn btn-sm btn-primary" name="checkaddress" value="Lookup">
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
										<h3 class="mb-1">WHOIS search results</h3>
										<h5 class="mb-3 __domain text-primary"></h5>
										<div class="text __domain_desc">
											<?php 
											$domainM = isset(parse_url($_POST["url"])['host']) ? parse_url($_POST["url"])['host'] : $_POST["url"];	
											$getSource = getHtml('http://api.fastdomain.com/cgi/whois?domain='.$domainM);
											echo $getSource;
											?>
										</div>
											
									</div>

								<?php } else {?>

									<div class="input-group mb-3">
										<input type="text" value="<?=isset($_GET['url'])?$_GET['url']:''?>" class="form-control" placeholder="Enter URL" aria-label="Enter your domain" aria-describedby="whoisHTML" id="whoisHTML_URL" name="url" required>
									</div>
									
									<div class="input-group mb-3 mb-lg-0 d-none">
										<textarea class="form-control form-control-sm" name="whoisList" id="whoisList" rows="12"></textarea>
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
	<?php if (!empty($_POST["checkaddress"])) {
	$domain = isset(parse_url($_POST["url"])['host']) ? parse_url($_POST["url"])['host'] : $_POST["url"];	
	// https://rdap.verisign.com/com/v1/domain/DOMAIN.COM
	// https://rdap.fastdomain.com/domain/DOMAIN.COM
	?>
	<script>
		$.ajax({
			url: 'https://rdap.fastdomain.com/domain/<?=$domain?>',
			type: 'GET',
			dataType: "html",
			success: function(json) {
				console.log(json);
				$('#speedResult .__domain').text('<?=$domain?>')
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