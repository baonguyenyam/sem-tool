<?php
ob_start();
session_start();
require_once "global.php";
require_once "db/authCookieSessionValidate.php";
require_once 'core/functions.php';
require_once 'core/class.phpmailer.php';
require_once 'core/class.smtp.php';
require_once 'core/class-concat.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Nguyen Pham">
	<title><?= $title ?> - <?=LIFT_TITLE?></title>
    <?php require_once 'includes/css.php'; ?>
    <?php require_once 'includes/js.php'; ?>
    <?php require_once 'includes/favicon.php'; ?>
</head>