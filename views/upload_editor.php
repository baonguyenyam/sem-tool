<?php
require_once 'includes/variables.php';

$getUserConfig = $auth->getMemberByID($_SESSION["member_id"]);

if ($isMemberTypye == 1 || $isMemberTypye == 2) {
} else {
    $util->redirect("/");
}

// Allowed origins to upload images
$accepted_origins = array(
	"http://localhost",
	"http://seo.local",
	"http://seo.local:8888",
	"https://myseo.website"
);

// Images upload path
$imageFolder = "images";
$imageFolderDone = "uploads/images/" . date('Y') . '/' . date('m'). '/' ;

if (!file_exists(getcwd() . '/uploads')) {
	mkdir(getcwd() . '/uploads', 0777);
}
if (!file_exists(getcwd() . '/uploads/' . $imageFolder)) {
	mkdir(getcwd() . '/uploads/' . $imageFolder, 0777);
}
if (!file_exists(getcwd() . '/uploads/' . $imageFolder . '/' . date('Y'))) {
	mkdir(getcwd() . '/uploads/' . $imageFolder . '/' . date('Y'), 0777);
}
if (!file_exists(getcwd() . '/uploads/' . $imageFolder . '/' . date('Y') . '/' . date('m'))) {
	mkdir(getcwd() . '/uploads/' . $imageFolder . '/' . date('Y') . '/' . date('m'), 0777);
}

reset($_FILES);
$temp = current($_FILES);
if (is_uploaded_file($temp['tmp_name'])) {
	if (isset($_SERVER['HTTP_ORIGIN'])) {
		// Same-origin requests won't set an origin. If the origin is set, it must be valid.
		if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
			header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		} else {
			header("HTTP/1.1 403 Origin Denied");
			return;
		}
	}

	// Sanitize input
	if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
		header("HTTP/1.1 400 Invalid file name.");
		return;
	}

	// Verify extension
	if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "png"))) {
		header("HTTP/1.1 400 Invalid extension.");
		return;
	}

    $ext = strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION));
	$filenamewithoutextension = pathinfo($temp['name'], PATHINFO_FILENAME);

	// Accept upload if there was no origin, or if it is an accepted origin
	// $filetowrite = $imageFolderDone . $temp['name'];
	// move_uploaded_file($temp['tmp_name'], $filetowrite);

	$filename_to_store = stripVN($filenamewithoutextension) . '_' . uniqid() . '.' . $ext;
	move_uploaded_file($temp['tmp_name'], $imageFolderDone . $filename_to_store);

	// Respond to the successful upload with JSON.
	echo json_encode(array('location' => '/'. $imageFolderDone . $filename_to_store));
} else {
	// Notify editor that the upload failed
	header("HTTP/1.1 500 Server Error");
}
