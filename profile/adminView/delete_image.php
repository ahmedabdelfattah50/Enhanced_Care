<?php
  include_once "../db/connection.php";

  $image_id = $_POST['image_id'];
  $sql = "SELECT * from images where id = '".$image_id."'";
  $res = mysqli_query($conn, $sql);
  $imageData = mysqli_fetch_assoc($res);
  if($imageData) {
    $sqlDel = "DELETE from `images` where `id` = '".$image_id."'";
    $resDel = mysqli_query($conn,  $sqlDel);

    if($resDel){ 
      $pathImgs = 'uploads/';
      unlink($pathImgs . $imageData['Image']);
      header("Location:../index.php");
    } else {
      header("Location:../index.php");
    }
  }