<?php 
  session_start();
  if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-
      wvfXpqpZZVQGK6TAH5PVLGOfQNHSoD2xbE+QKPxCAFLNEevoEH3SlosibVcoQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="result.css">
  <title>Prediction Result </title>
</head>
<body>
  <!-- nav -->
  <nav style="background-color: #13C5DD; margin:0; padding: 10px;">
      <a class="navbar-brand" href="./index.php">
          <img src="../images/<?php echo ($_SESSION['gender'] == 1) ? 'male' : 'female' ?>.png" width="60" height="60" alt="profile">
      </a>
      <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul> -->
      
      <div class="user-cart" style='float: right; margin-top: 20px;'> 
          <a href="../../../profile/index.php" style="text-decoration:none;">
              <i class="fa fa-home" style="margin-right:15px; font-size:30px; color:#fff;" aria-hidden="true"></i>
          </a>
          <a href="../../../logout.php" style="text-decoration:none;">
              <i class="fa fa-sign-in mr-5" style="margin-right:15px; font-size:30px; color:#fff;" aria-hidden="true"></i>
          </a>
      </div>  
    </nav>
  <div id="container">
    <div class="form-wrap">
      <h1>Prediction Result</h1>
      <p>It's Free and Only takes a minute</p>
      <form>
        <div class="form-group">
          <label for="Result">Result</label>
          <input type="text" name="Result" value="You have a some of cancer tissue 'Go to the Doctor'" id="Result" disabled>
        </div>
        <div class="form-group">
          <label for="UserName">CT'image</label>
          <input type="image" name="ct'image"  id="ct'image">
        </div>
      </form>
      <button class="button" onclick="location.href='../../../index.html'">Go to Home Page</button>
    </div>
  </div>
</body>
</html>
<?php 
  } else {
    header("Location:../login.php");
  }
?>