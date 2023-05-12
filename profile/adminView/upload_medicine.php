<?php 
session_start();
	$patientId = $_SESSION['id'];
	include_once "../db/connection.php";

    $Name_of_medicine = $_POST["Name_of_medicine"];
    $Description = $_POST["Description"];
	
	// Insert medicine into Database
	$sql = "INSERT INTO `medicine`(`Name_of_medicine`, `Description`, `Patient_id`) VALUES ('$Name_of_medicine','$Description','$patientId')";
	mysqli_query($conn, $sql);
	header("Location:../index.php");


