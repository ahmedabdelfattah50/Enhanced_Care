<?php      
    session_start(); 
  if(!isset($_SESSION['gender'])){
    include "db/connection.php";
    if(isset($_GET['page'])){ 
      $pageName = $_GET['page'];
    }
    //  $conn=mysqli_connect('localhost', 'root', '', 'colon_cancer_db');
    
    if(isset($_POST["submit"])){
      $email =$_POST["email"];
      $password =$_POST["password"];
       
        // $sql = mysqli_query($conn, "SELECT count(*) as total from patient where 
        //     E_mail = '".$email."' and Password = '".$password."'") or die(
        //     mysqli_error($conn));
        
        // $sql = "SELECT * from patient where E_mail = '".$email."' and Password = '".$password."'";
        $sql = "SELECT * from patient where E_mail = '".$email."'";
        $res = mysqli_query($conn,  $sql);
        $patientData = mysqli_fetch_assoc($res);
        if($patientData) {
          $hash = $patientData['Password'];
          if(mysqli_num_rows($res) > 0){
            if (password_verify($password, $hash)) {
              $_SESSION['id'] = $patientData['id'];
              $_SESSION['email'] = $patientData['E_mail'];
              $_SESSION['first_name'] = $patientData['F_name'];
              $_SESSION['last_name'] = $patientData['L_name'];
              $_SESSION['birth_date'] = $patientData['BD'];
              $_SESSION['gender'] = $patientData['Gender'];
              $_SESSION['phone'] = $patientData['Phone'];
              $_SESSION['adress'] = $patientData['Adress'];
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
              $message["error"] = 'Invalid password';
            }
          } else {
            $message["error"] = 'Email or Password is incorrect';
          }
        } else {
          $message["error"] = 'Invalid Email';
        }
   }
    
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="title">Patient Login</h1>
      <form action="<?php $_SERVER['PHP_SELF']?>", method="POST">
        <?php
        if(isset($message["error"])){ ?>
          <div class='error_messages'>
          <p><?php echo $message["error"] ?></p>
          </div>
        <?php } ?>
        
        <div class="user-info">
          <div class="user-input">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your Email" required/>
          </div>
          <div class="user-input">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password" required/>
          </div>
        </div>
        <div class="submit-btn">
          <input type="submit" name="submit" value="Login" class="submit">
        </div>
        <?php 
          if(isset($pageName)){ ?>
              <p class="styling">don't have an account? <a href="register.php?page=<?php echo $pageName ?>">register now!</a></p>
        <?php
          } else { ?>
            <p class="styling">don't have an account? <a href="register.php">register now!</a></p>
        <?php
          }
        ?>
        
      </form>
    </div>
  </body>
</html>
<?php 
  } else {
    header("Location:symptoms/symptoms.php");
  }
?>