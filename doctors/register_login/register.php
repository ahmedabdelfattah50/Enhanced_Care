<?php
 session_start(); 
 include "../db/connection.php";
// $conn = mysqli_connect("localhost","root","","colon_cancer_db");
if(isset($_POST["submit"])){
  // $SSN           =$_POST['SSN'];
  $F_name        = $_POST['firstName'];
  $L_name        = $_POST['lastName'];
  $Email         = $_POST['email'];
  $PhoneNumber   = $_POST['phoneNumber'];
  $Address       = $_POST['address'];
  $Password      = $_POST['password'];
  $ConfirmPassword = $_POST['confirmPassword'];

  $phoneNumLength = strlen($PhoneNumber);
  if($phoneNumLength == 11){
    if($Password == $ConfirmPassword){ 
      $Password = password_hash($Password, PASSWORD_DEFAULT);    // encreapted password
      $sql = "INSERT INTO `doctor`(`F_name`,`L_name`,`E_mail`,`Password`,`Phone`,`Address`) values ('$F_name','$L_name ','$Email','$Password','$PhoneNumber','$Address')";
      mysqli_query($conn, $sql);

      $sqlCreatedDoctor = "SELECT * from doctor where E_mail = '".$Email."'";
      $resOfDoctor = mysqli_query($conn,  $sqlCreatedDoctor);
      $doctorData = mysqli_fetch_assoc($resOfDoctor);
      print_r($doctorData);
      if($doctorData) {
        $hash = $doctorData['Password'];
        if(mysqli_num_rows($resOfDoctor) > 0){
          if (password_verify($_POST['password'], $hash)) {
            $_SESSION['id'] = $doctorData['id'];
            $_SESSION['email'] = $Email;
            $_SESSION['first_name'] = $F_name;
            $_SESSION['last_name'] = $L_name;
            $_SESSION['phone'] = $PhoneNumber;
            $_SESSION['adress'] = $Address;
            header("Location:../profile/index.php");
          } else {
            echo "<script>alert('Invalid Patient.')</script>";
          }
        } else {
          echo "<script>alert('Invalid Patient.')</script>";
        }
      } else {
        echo "<script>alert('Invalid Patient.')</script>";
      }
    } else {
      echo "<script>alert('the password and the confirmed password must be identical')</script>";
    }
  } else {
    echo "<script>alert('Invalid Phone Number.')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8" />
    <title>Doctor Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css" />
  </head>
  
  <body>

    <div class="container registerPage">
      <h1 class="title">Doctor Registration</h1>
      <form action="", method="POST">
        <div class="user-info">
          <!-- <div class="user-input">
            <label for="SSN">SSN</label>
            <input type="number"
                    id="SSN"
                    name="SSN"
                    placeholder="Enter SSN" required/>
          </div> -->
          <div class="user-input">
            <label for="First Name">First Name</label>
            <input type="text"
                    id="firstName"
                    name="firstName"
                    placeholder="Enter First Name" required/>
          </div>
          <div class="user-input">
            <label for="Last Name">Last Name</label>
            <input type="text"
                    id="lastName"
                    name="lastName"
                    placeholder="Enter Last Name" required/>
          </div>
          <div class="user-input">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email" required/>
          </div>
          <div class="user-input">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter Phone Number" required/>
          </div>
          
          <div class="user-input">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password" required/>
          </div>
          <div class="user-input">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password" required/>
          </div>
          <div class="user-input" id='user-input-textarea'>
            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="Enter your Address" cols="30" rows="10"></textarea>
            <!-- <input type="text"
                    id="address"
                    name="address"
                    placeholder="Enter your Address" required/> -->
          </div>
        </div>
        <div class="submit-btn">
          <input type="submit" name="submit" value="Register" class="submit">
        </div>
        <p class="styling">already have an account? <a href="login.php">login now!</a></p>
      </form>
    </div>
  </body>
</html>