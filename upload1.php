<?php 
session_start();
$patientId = $_SESSION['id'];
	include "db/connection.php";

	$imgsCount = count($_FILES['my_image']['name']);
	$finalImgsNames = '';
	$finalsImgsNamesTotal = '';

	// for($i = 0; $i < $imgsCount; $i++){
	// 	$img_size = $_FILES['my_image']['size'][$i];
	// 	$error = $_FILES['my_image']['error'][$i];
	// 	if ($error === 0) {
	// 		if ($img_size > 125000) {
	// 			$em = "Sorry, your file is too large.";
	// 			header("Location: upload.php?error=$em");
	// 		}
	// 	}
	// }

	for($i = 0; $i < $imgsCount; $i++){
		$img_name = $_FILES['my_image']['name'][$i];
		// $img_size = $_FILES['my_image']['size'][$i];
		$tmp_name = $_FILES['my_image']['tmp_name'][$i];
		$error = $_FILES['my_image']['error'][$i];
		if ($error === 0) {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png","PNG"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// echo $img_name . ' ' . $new_img_name;

				if($i != $imgsCount-1){	
					$imgDbName = $new_img_name . ',';
					$img_nameNew = $img_name . ',';
				} else {
					$imgDbName = $new_img_name;
					$img_nameNew = $img_name;
				}

				$finalImgsNames = $finalImgsNames . $imgDbName;
				$finalsImgsNamesTotal = $finalsImgsNamesTotal . $img_nameNew;
			}else {
				$em = "You can't upload files of this type";
				header("Location: upload.php?error=$em");
			}
		}else {
			$em = "unknown error occurred!";
			header("Location: upload.php?error=$em");
		}
	}

	// Insert images into Database
	$sql = "INSERT INTO `images`(`Image_name`, `Image`, `Patient_id`) VALUES ('$finalsImgsNamesTotal','$finalImgsNames','$patientId')";
	mysqli_query($conn, $sql);
	header("Location:load file/upload/profile/index.php");


