<?php
   //session_start();
  // include_once "./db/connection.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #13C5DD;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/<?php echo ($_SESSION['gender'] == 1) ? 'male' : 'female' ?>.png" width="80" height="80" alt="profile">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
    <a href="index.php" style="text-decoration:none;">
    <!-- <i class="fa fa-home mr-5" style="font-size:30px; color:#fff;"></i></a> -->
    
         <a href="" style="text-decoration:none;">
            <!-- <i class="fa fa-stethoscope mr-5"></i> -->
            <i class="fa fa-stethoscope mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>

          <a href="" style="text-decoration:none;">
            <i class="fa fa-home mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
         
        
         <a href="../logout.php" style="text-decoration:none;">
            <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>

    </div>  
</nav>
