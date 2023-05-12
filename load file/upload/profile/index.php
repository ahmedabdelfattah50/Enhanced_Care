<?php 
    session_start();
    include "../../../db/connection.php";
    $patientId = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My profile</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="left">
        <img src="https://i.imgur.com/cMy8V5j.png" 
        alt="user" width="100">
        <h4><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']?></h4>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p><?php echo $_SESSION['email']?></p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p><?php echo $_SESSION['phone']?></p>
              </div>
            </div>
        </div>
      
        <?php 
            $sql = "SELECT * from images where Patient_id = '".$patientId."'";
            $res = mysqli_query($conn,  $sql);
            $patientImgs = mysqli_fetch_assoc($res);
            if($patientImgs){   
                $allMyImgs = explode(',', $patientImgs['Image']);       // to seprate the images from the (,) sign in the database
            }
        ?>
      <div class="projects">
            <h3>My Files</h3>

            <?php
            if($patientImgs){  
                foreach($allMyImgs as $fileIndex => $fileImg){ ?>
                <div class="projects_data">
                    <div class="data">
                        <h4>File No.<?php echo $fileIndex+1?></h4>
                        <img src="../../../uploads/<?php echo $fileImg ?>" style="width: 100px; height: 80px;" alt="">
                    </div>
                </div>
                <?php 
                }    
            } else { ?>
                <div class="projects_data">
                    <div class="data">
                        <h4>!!! No images Founded</h4>
                    </div>
                </div>
            <?php } ?>
            
            <!-- <hr>
            <div class="projects_data">
                <div class="data">
                   <h4>Second File</h4>
                </div>
            </div> -->
        </div>
    </div>
</div>

</body>
</html>