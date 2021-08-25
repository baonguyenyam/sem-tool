<?php 
header('Access-Control-Allow-Origin: *');
require_once 'includes/variables_nologin.php';
$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$auth->checkVersion($url);
?>