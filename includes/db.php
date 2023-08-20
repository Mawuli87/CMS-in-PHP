<?php ob_start();

// $db['DB_HOST'] = "localhost";
// $db['DB_USER'] = "root";
// $db['DB_PASS'] = "";
// $db['B_NAME'] = "cms";

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "cmsnew");

// foreach($db as $key => $value){
// define(strtoupper($key), $value);
// }

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

$query = "SET NAMES utf8";
mysqli_query($connection,$query);

// if($connection) {

// echo "We are connected";

// }
