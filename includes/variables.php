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