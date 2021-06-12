<?php
session_start();
require "db/Util.php";
$util = new Util();

//Clear Session
$_SESSION["member_id"] = "";
session_destroy();

// clear cookies
$util->clearAuthCookie();

header("Location: ./");
