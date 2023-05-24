<?php
 session_start(); 
 include "db/connection.php";
 if(isset($_GET['page'])){ 
  $pageName = $_GET['page'];
}
// $conn = mysqli_connect("localhost","root","","colon_cancer_db");
if(isset($_POST["submit"])){
  // $SSN           =$_POST['SSN'];
  $F_name        = $_POST['firstName'];
  $L_name        = $_POST['lastName'];
  $BD            = $_POST['birthdate'];
  $gender        = $_POST['gender'];
  $Email         = $_POST['email'];
  $PhoneNumber   = $_POST['phoneNumber'];
  $Address       = $_POST['address'];
  $Doctor_id     = $_POST['Doctor_id'];
  $Password      = $_POST['password'];
  $ConfirmPassword = $_POST['confirmPassword'];

  $phoneNumLength = strlen($PhoneNumber);
  if($phoneNumLength == 11){
    if($Password == $ConfirmPassword){ 
      $Password = password_hash($Password, PASSWORD_DEFAULT);    // encreapted password
      $sql = "INSERT INTO `patient`(`F_name`,`L_name`,`Birthdate`,`Gender`,`Phone`,`Password`,`E_mail`,`Adress`, `Doctor_id`) values ('$F_name','$L_name','$BD','$gender','$PhoneNumber','$Password','$Email','$Address', '$Doctor_id')";
      // $sql = "INSERT INTO `data`(`Image_name`, `Image`, `Patient_id`) VALUES ('$img_name','$new_img_name',1)";
      mysqli_query($conn, $sql);

      $sqlCreatedPatient = "SELECT * from patient where E_mail = '".$Email."'";
      $resOfPatient = mysqli_query($conn,  $sqlCreatedPatient);
      $patientData = mysqli_fetch_assoc($resOfPatient);
      print_r($patientData);
      if($patientData) {
        $hash = $patientData['Password'];
        if(mysqli_num_rows($resOfPatient) > 0){
          if (password_verify($_POST['password'], $hash)) {
            $_SESSION['id'] = $patientData['id'];
            $_SESSION['email'] = $Email;
            $_SESSION['first_name'] = $F_name;
            $_SESSION['last_name'] = $L_name;
            $_SESSION['birth_date'] = $BD;
            $_SESSION['gender'] = $gender;
            $_SESSION['phone'] = $PhoneNumber;
            $_SESSION['adress'] = $Address;
            $_SESSION['Doctor_id'] = $patientData['Doctor_id'];
            $_SESSION['Prediction_id'] = $patientData['Prediction_id'];
            if(isset($pageName)){ 
              if($pageName == 'upload_form'){ 
                header("Location:upload_form.php");
              }
            } else {
              header("Location:symptoms/symptoms.php");
            }
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
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css" />
  </head>
  
  <body>

    <div class="container registerPage">
      <h1 class="title">Patient Registration</h1>
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
            <label for="">Birth Date</label>
            <input type="DATE"
                    id="birthdate"
                    name="birthdate"
                    placeholder="Enter birthdate" required/>
          </div>
          <div class="user-input">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
              <option value="">Select Your Gender</option>
              <option value="1">Male</option>
              <option value="2">Female</option>
            </select>
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
          <div class="user-input" style='width: 105%; margin: 10px 0 0 -28px'>
            <label for="gender">Select Your Doctor</label>
            <select id="gender" name="Doctor_id" required>
              <option value="">Select Your Doctor</option>
              <?php
                $sql = "SELECT * from doctor";
                $res = mysqli_query($conn,  $sql);
                $doctorsData = mysqli_fetch_all($res, MYSQLI_ASSOC);

                if($doctorsData){
                foreach($doctorsData as $doctorIndex => $doctorData){ 
              ?>
              <option value="<?php echo $doctorData['id'] ?>"><?php echo $doctorData['F_name'] . ' ' . $doctorData['L_name'] ?></option>
              <?php 
                }
              } else {?>
              <option>No Data Founded</option>
            <?php
              }
            ?>
            </select>
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