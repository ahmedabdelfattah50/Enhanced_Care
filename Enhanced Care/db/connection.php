<?php

require_once __DIR__ .  "/../config/constants.php";

function database_connect(){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn=mysqli_connect('localhost', 'root', '', 'colon_cancer_db');
    return $conn;
}











/*$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "colon_cancer_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();*/
//}