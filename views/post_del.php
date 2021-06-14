<?php 
require_once 'includes/variables.php';
/*// HEADER */
$getID  = isset($_GET["id"]) ? $_GET["id"] : $util->redirect("./");
if ($isMemberTypye == 1 || $isMemberTypye == 2) {
} else {
    $util->redirect("./");
}
if (!empty($getID)) {
	$auth->deletePost(1, $getID);
	$util->redirect("/posts");
}
?>
