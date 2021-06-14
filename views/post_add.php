<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Add new post";
$active='post-add'; 
/*// LAYOUT */
require_once 'includes/header.php';

/*// CHECK */
$getConfig = $auth->getConfig();

if ($isMemberTypye == 1 ) {
} else {
    $util->redirect("./");
}
// CREATE 
if (!empty($_POST["change"])) {
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
	$options = serialize(array());
	// $datadisplay = unserialize($getBaiThibyID[0]["baithi_data"]);
	$auth->insertPosts($title, $content, 1, $options, 'posts');
	$util->redirect("/posts");
}
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <form action="" method="post" id="frmchange" class="form-signin">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div>
                        <h1 class="h2">Add new post</h1>
                        </div>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <input type="submit" name="change" class="btn btn-sm btn-primary" value="Create" id="create">
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="shadow p-5 mb-5 bg-body rounded border">
                                <?php if (isset($message)) { ?>
                                    <div class="form-group mb-3">
                                        <div class="alert alert-danger mb-0"><?php echo $message ?></div>
                                    </div>
                                <?php } ?>
                                <div class="form-floating mb-3">
                                    <input name="title" type="text" value="" id="inputTitle" class="form-control" placeholder="" required autofocus>
                                    <label for="inputTitle">Title</label>
                                </div>
                                <div class="mb-3 mb-lg-0">
                                    <textarea name="content" id="content" class="form-control" rows="20" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

	<script>
		$().ready(function() {
			$('textarea').tinymce({
				plugins: [
					'code paste wordcount',
					"advlist autoresize autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table paste"
				],
				toolbar_mode: 'scrolling',
				images_upload_url: 'upload-post',
				image_dimensions: false,
				relative_urls: false,
				remove_script_host: false,
				// override default upload handler to simulate successful upload
				images_upload_handler: function(blobInfo, success, failure) {
					var xhr, formData;

					xhr = new XMLHttpRequest();
					xhr.withCredentials = false;
					xhr.open('POST', 'upload-post');

					xhr.onload = function() {
						var json;

						if (xhr.status != 200) {
							failure('HTTP Error: ' + xhr.status);
							return;
						}

						json = JSON.parse(xhr.responseText);

						if (!json || typeof json.location != 'string') {
							failure('Invalid JSON: ' + xhr.responseText);
							return;
						}

						success(json.location);
					};

					formData = new FormData();
					formData.append('file', blobInfo.blob(), blobInfo.filename());

					xhr.send(formData);
				},
				min_height: 500,
				// max_height: 500,
				resize: true,
				autoScroll: true,
				autoresize_bottom_margin: 25,
				toolbar: 'image | bold italic backcolor | bullist numlist | ' +
					'removeformat',
				init_instance_callback: function(editor) {
					editor.on('PastePreProcess', function(e) {
						e.content = e.content.replace(/<img(.*?)data-src=[\'"](.*?)[\'"][^>]*>/is, '<img src="$2">');
					});
				}
			});
		});
	</script>

</body>

</html>