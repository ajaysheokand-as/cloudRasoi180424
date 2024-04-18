<?php
$host = "localhost";
// $username = "u709711065_cloudRasoi";
// $password = "NewPassword@1234";
// $db = "u709711065_cloudRasoi";
$username = "u709711065_srproduction";
$password = "NewPassword@1234";
$db = "u709711065_srproduction";

$site_name = "Cloud Rasoi";
$site_title = "";
define('SITE_NAME',"Cloud Rasoi");
// $host = "sql487.main-hosting.eu";
// $username = "u709711065_spicyrasoi";
// $password = "NewPassword@1234";
// $db = "u709711065_spicyrasoi";

// $host = "localhost";
// $username = "u709711065_srproduction";
// $password = "NewPassword@1234";
// $db = "u709711065_srproduction";
$con = mysqli_connect($host, $username, $password, $db);

if (mysqli_connect_errno())
    die("error");
    // else
    // echo("Connected");
date_default_timezone_set("Asia/Calcutta");

// header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
