<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="assets/images/logo.png" width="120" height="120" alt="profile"> 
    <h5 style="margin-top:10px;"><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']?></h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#category"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Medicines</a>   
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Images</a>

  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


