<?php      
     $conn=mysqli_connect('localhost', 'root', '', 'colon_cancer_db');
    
     //session_start();
    //if(isset($_POST["submit"])){

      //  echo "tmam";
       
      $email =$_POST["email"];
      $password =$_POST["password"];
       
        $sql = mysqli_query($conn, "SELECT count(*) as total from patient where 
            E_mail = '".$email."' and Password = '".$password."'") or die(
            mysqli_error($conn));
            
            $rw = mysqli_fetch_array($sql);
            // echo $rw;
            
            if($rw['total'] > 0){
              /*session_start();
              $_SESSION['id'] = $rw['Patient_id'];
              $_SESSION['email'] = $rw['E_mail'];
              $_SESSION['f_name'] = $rw['F_name'];
              $_SESSION['last_name'] = $rw['L_name'];
              $_SESSION['birth_date'] = $rw['BD'];
              $_SESSION['gender'] = $rw['Gender'];
              $_SESSION['phone'] = $rw['Phone'];
              $_SESSION['adress'] = $rw['Adress'];
              $_SESSION['Doctor_id'] = $rw['Doctor_id'];
              $_SESSION['Prediction_id'] = $rw['Prediction_id'];*/

              //echo "<script>alert('kkkkkk')</script>";
              header("Location:symptoms/symptoms.php");
              //echo "<script>alert('E_mail and Password are correct')</script>";
            } else {
              echo "<script>alert('E_mail and Password are incorrect')</script>";
            }
    
   // }
    
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
      <h1 class="title">Login</h1>
      <form action="<?php $_SERVER['PHP_SELF']?>", method="POST">
        <div class="user-info">
          <div class="user-input">
            <label for="email">E_mail</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your Email"/>
          </div>
          <div class="user-input">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
        </div>
        <div class="submit-btn">
          <p><a class="button"> <input type="submit" name="login"></a></p>
        </div>
        <p class="styling">don't have an account? <a href="register.html">register now!</a></p>
      </form>
    </div>
  </body>
</html>