<!-- Sidebar -->
<div class="sidebar" id="mySidebar" style="background-color: #13C5DD;">
<div class="side-header" >
    <img src="assets/images/logo.png" width="120" height="120" alt="profile"> 
    <h5 style="margin-top:10px;"><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']?></h5>
    <?php 
        if(isset($_SESSION['phone']) && ($_SESSION['phone'] != null)){ ?>
            <p class='m-0'>0<?php echo $_SESSION['phone'] ?></p>
    <?php
        } 
    ?>
    <?php 
        if(isset($_SESSION['phone']) && ($_SESSION['phone'] != null)){ ?>
    <p><?php echo $_SESSION['email']?></p>
    <?php
        } 
    ?>
</div>

<hr style="border:1px solid; background-color:#13C5DD; border-color:white;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
    <a href="#category"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Patients</a>   
    <!-- <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Images</a>
    <a href="result/result.html"   onclick="showProductItems()" ><i class="fa fa-th"></i> Show Result</a> -->

  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" style="background-color: #13C5DD;" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


