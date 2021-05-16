<?php
require __DIR__ . '/vendor/autoload.php';
use Dusterio\LinkPreview\Client;

// header('Content-Type: application/json');

if(isset($_GET['url'])) {
	$previewClient = new Client(trim($_GET['url']));
	// Get previews from all available parsers
	$previews = $previewClient->getPreviews();
	// Get a preview from specific parser
	$preview = $previewClient->getPreview('general');
	// Convert output to array
	$preview = $preview->toArray();

	// var_dump($preview);

	$data = (object) array();
	$data->cover = $preview['cover'];
	$data->title = $preview['title'];
	$data->description = $preview['description'];

	echo json_encode($data);
}