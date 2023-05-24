<?php 
  session_start();
  if(isset($_SESSION['doctor'])){
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="assets/css/style.css"></link>
  </head>
</head>
<body>
        <?php
            include_once "../db/connection.php";
            include "adminHeader.php";
            include "sidebar.php";
           
            $sql = "SELECT * from patient where Doctor_id = '".$_SESSION['id']."'";
            $res = mysqli_query($conn, $sql);
            $patientsData = mysqli_fetch_all($res, MYSQLI_ASSOC);

            // $sql = "SELECT * from images where patient_id = '".$_SESSION['id']."'";
            // $res = mysqli_query($conn, $sql);
            // $imagesData = mysqli_fetch_all($res, MYSQLI_ASSOC);
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="background-color: #13C5DD;">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Patients</h4>
                    <h4 style="color:white;"><?php echo count($patientsData) ?></h4>
                </div>
            </div>
            <!-- <div class="col-sm-3">
                <div class="card" style="background-color: #13C5DD;">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Images</h4>
                    <h4 style="color:white;"><php echo count($imagesData) ?></h4>
                </div>
            </div> -->
        </div>
        
    </div>
       
            
        <!-- <php
            if (isset($_GET['category']) && $_GET['category'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['category']) && $_GET['category'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['variation']) && $_GET['variation'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?> -->


    <script type="text/javascript" src="assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>
<?php 
  } else {
    header("Location:../login.php");
  }
?>