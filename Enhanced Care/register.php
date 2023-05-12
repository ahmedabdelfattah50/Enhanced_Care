<?php
$conn = mysqli_connect("localhost","root","","colon_cancer_db");
if(isset($_POST["submit"])){
  $SSN           =$_POST['SSN'];
  $F_name        = $_POST['firstName'];
  $L_name        = $_POST['lastName'];
  $BD            = $_POST['birthdate'];
  $gender        = $_POST['gender'];
  $Email         = $_POST['email'];
  $PhoneNumber   = $_POST['phoneNumber'];
  $Address       = $_POST['address'];
  $Password      = $_POST['password'];
  $ConfirmPassword = $_POST['confirmPassword'];
    
  $query = "insert into patient(Patient_id,F_name,L_name,BD,Gender,Phone, Password,E_mail,Adress) values ('$SSN','$F_name','$L_name ','$BD','$gender','$PhoneNumber','$Password','$Email ','$Address')";
  $result = mysqli_query($conn,$query);}
?>
<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8" />
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css" />
  </head>
  
  <body>

    <div class="container">
      <h1 class="title">Registration</h1>
      <form action="", method="POST">
        <div class="user-info">
          <div class="user-input">
            <label for="SSN">SSN</label>
            <input type="number"
                    id="SSN"
                    name="SSN"
                    placeholder="Enter SSN" required/>
          </div>
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
            <label for="">Birth Date</label>
            <input type="DATE"
                    id="birthdate"
                    name="birthdate"
                    placeholder="Enter birthdate" required/>
          </div>
          <div class="user-input">
            <label for="gender">Gender</label>
            <input type="text"
                    id="gender"
                    name="gender" required/>
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
            <label for="address">Address</label>
            <input type="text"
                    id="address"
                    name="address"
                    placeholder="Enter your Address" required/>
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
        </div>
        <div class="submit-btn">
        <input type="submit" name="submit">
        </div>
        <p class="styling">already have an account? <a href="login.html">login now!</a></p>
      </form>
    </div>
  </body>
</html>