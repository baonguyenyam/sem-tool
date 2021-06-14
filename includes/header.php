<!DOCTYPE html>
<html lang="en" class="dark">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Nguyen Pham">
	<title><?= $title ?> - <?=LIFT_TITLE?></title>
    <?php require_once 'includes/css.php'; ?>
    <?php require_once 'includes/js.php'; ?>
    <?php require_once 'includes/favicon.php'; ?>
    <?php if (!empty($_COOKIE["active_theme"]) && $_COOKIE["active_theme"] === '1') {?>
        <link rel="stylesheet" href="/assets/css/dist/dark.min.css?v=<?=LIFT_VERSION?>">
    <?php } ?>
</head>