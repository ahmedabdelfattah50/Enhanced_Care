<?php
  include_once "../db/connection.php";
  
  // delete medicine page @##@#!@
  // 213
  // 123
  // 123

  $medicine_id = $_POST['medicine_id'];
  $sql = "SELECT * from medicine where id = '".$medicine_id."'";
  $res = mysqli_query($conn, $sql);
  $medicineData = mysqli_fetch_assoc($res);
  if($medicineData) {
    $sqlDel = "DELETE from `medicine` where `id` = '".$medicine_id."'";
    $resDel = mysqli_query($conn,  $sqlDel);
    header("Location:../index.php");
  }