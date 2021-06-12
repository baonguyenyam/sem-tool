<?php
ob_start();
session_start();
require_once "db/authCookieSessionValidate.php";
require_once 'functions/functions.php';
require_once 'functions/class.phpmailer.php';
require_once 'functions/class.smtp.php';
require_once 'functions/class-concat.php';
define("LIFT_VERSION", "3.0.6");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Nguyen Pham">
	<title><?= $title ?> - LIFT Creations ✅</title>
    <?php
    echo AssetPacker::css('/assets/css/dist/bundled/lift-bundled-v-'.LIFT_VERSION.'.css',
    [
        'assets/css/bootstrap/bootstrap-icons.css',
        'assets/css/vendor/bootstrap.min.css',
        'assets/css/vendor/all.min.css',
        'assets/css/vendor/codemirror.min.css',
        'assets/css/vendor/theme/monokai.css',
        'assets/css/dist/main.min.css',
    ]);
    ?>
    <?php
    echo AssetPacker::js('/assets/js/dist/bundled/lift-bundled-v-'.LIFT_VERSION.'.js',
    [
        'assets/js/vendor/jquery.min.js',
        'assets/js/vendor/clipboard.min.js',
        'assets/js/vendor/codemirror.min.js',
        'assets/js/vendor/mode/xml/xml.js',
    ]);
    ?>
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>