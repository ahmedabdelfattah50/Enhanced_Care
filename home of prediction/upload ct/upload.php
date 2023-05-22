<?php 
  session_start();
  if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Custom File Upload Button</title>
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="D:\front pages\load file\style.css"
    />
    <!-- Google Fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"/>
    <!-- Stylesheet -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-
        wvfXpqpZZVQGK6TAH5PVLGOfQNHSoD2xbE+QKPxCAFLNEevoEH3SlosibVcoQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- nav -->
    <nav style="background-color: #13C5DD; margin:0; padding: 10px;">
      <a class="navbar-brand" href="./index.php">
          <img src="images/<?php echo ($_SESSION['gender'] == 1) ? 'male' : 'female' ?>.png" width="60" height="60" alt="profile">
      </a>
      <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul> -->
      
      <div class="user-cart" style='float: right; margin-top: 20px;'> 
          <a href="../../profile/index.php" style="text-decoration:none;">
              <i class="fa fa-home" style="margin-right:15px; font-size:30px; color:#fff;" aria-hidden="true"></i>
          </a>
          <a href="../../logout.php" style="text-decoration:none;">
              <i class="fa fa-sign-in mr-5" style="margin-right:15px; font-size:30px; color:#fff;" aria-hidden="true"></i>
          </a>
      </div>  
    </nav>
    <div class="container">
      <input type="file" id="file-input" multiple />
      <label for="file-input">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
        &nbsp;  Upload your CT
      </label>
      <button class="Show" onclick="location.href='result/result.php'">Show Result</button>
      <div id="num-of-files">No Files Choosen </div>
      
      <ul id="files-list"></ul>
    </div>
    <!-- Script -->
    <script src="D:\front pages\load file\script.js"></script>
  </body>
</html>
<?php 
  } else {
    header("Location:../login.php");
  }
?>