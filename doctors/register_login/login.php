<?php      
    session_start(); 
    include "../db/connection.php";
    
    if(isset($_POST["submit"])){
      $email =$_POST["email"];
      $password =$_POST["password"];
        $sql = "SELECT * from doctor where E_mail = '".$email."'";
        $res = mysqli_query($conn,  $sql);
        $doctorData = mysqli_fetch_assoc($res);
        if($doctorData) {
          $hash = $doctorData['Password'];
          if(mysqli_num_rows($res) > 0){
            if (password_verify($password, $hash)) {
              $_SESSION['id'] = $doctorData['id'];
              $_SESSION['email'] = $doctorData['E_mail'];
              $_SESSION['first_name'] = $doctorData['F_name'];
              $_SESSION['last_name'] = $doctorData['L_name'];
              $_SESSION['phone'] = $doctorData['Phone'];
              $_SESSION['adress'] = $doctorData['Adress'];
              
              header("Location:../profile/index.php");
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
    <title>Doctor Login Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="title">Doctor Login</h1>
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
        <p class="styling">don't have an account? <a href="register.php">register now!</a></p>
      </form>
    </div>
  </body>
</html>