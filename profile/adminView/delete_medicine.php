<?php
  include_once "../db/connection.php";

  $medicine_id = $_POST['medicine_id'];
  $sql = "SELECT * from medicine where id = '".$medicine_id."'";
  $res = mysqli_query($conn, $sql);
  $medicineData = mysqli_fetch_assoc($res);
  if($medicineData) {
    $sqlDel = "DELETE from `medicine` where `id` = '".$medicine_id."'";
    $resDel = mysqli_query($conn,  $sqlDel);
    header("Location:../index.php");
  }