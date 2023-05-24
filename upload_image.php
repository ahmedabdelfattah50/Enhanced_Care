<?php 
session_start();
	$patientId = $_SESSION['id'];
	include_once "db/connection.php";

    $image_name = $_POST["image_name"];
	$img_name = $_FILES['my_image']['name'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	if ($error === 0) {
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);

		$allowed_exs = array("jpg", "jpeg", "png","PNG"); 

		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = 'profile/adminView/uploads/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);

			$imgDbName = $new_img_name;
			$img_nameNew = $img_name;
		} else {
			$em = "You can't upload files of this type";
			header("Location: upload.php?error=$em");
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: upload.php?error=$em");
	}

	// Insert images into Database
	$sql = "INSERT INTO `images`(`Image_name`, `Image`, `Patient_id`) VALUES ('$image_name','$imgDbName','$patientId')";
	mysqli_query($conn, $sql);
	header("Location:profile/index.php");
