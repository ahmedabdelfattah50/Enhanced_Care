<?php
  include_once "db/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <title> Doctor Section </title>
  <style media="screen">

   * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: Exo;
   }
   @font-face {
     font-family: Exo;
     src: url(./fonts/Exo2.0-Medium.otf);
   }

   body {
    background-image: url(IMG-20221217-WA0033.jpg);
     background-size: cover;
   }

   
   .main{
     padding: 50px 0;
   }

   .main h2 {
    margin-bottom: 15px;
    color: #fff;
    text-align: center;
   }

   .main .totalDoctors {
    display: flex;
     justify-content: center;
     align-items: center;
     flex-wrap: wrap;
   }

   .profile-card{
     position: relative;
     font-family: sans-serif;
     width: 220px;
     height: 220px;
     background: #fff;
     padding: 30px;
     border-radius: 50%;
     box-shadow: 0 0 22px #289c8e;
     transition: .6s;
     margin: 10px 25px;
   }
   .profile-card:hover{
     border-radius: 10px;
     height: 260px;
   }
   .profile-card .img{
     position: relative;
     width: 100%;
     height: 100%;
     transition: .6s;
     z-index: 99;
   }
   .profile-card:hover .img{
     transform: translateY(-60px);
   }
   .img img{
     width: 100%;
     border-radius: 50%;
     box-shadow: 0 0 22px #3336;
     transition: .6s;
   }
   .profile-card:hover img{
     border-radius: 10px;
   }
   .caption{
     text-align: center;
     transform: translateY(-80px);
     opacity: 0;
     transition: .6s;
   }
   .profile-card:hover .caption{
     opacity: 1;
   }
   .caption h3{
     font-size: 21px;
     font-family: sans-serif;
     color:#289c8e;
   }
   .caption p{
     font-size: 15px;
     color:#289c8e;
     font-family: sans-serif;
     margin: 2px 0 9px 0;
   }
   .button {
  border :none ;
  font-size:medium ;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #289c8e;
  text-align: center;
  cursor: pointer;
  width: 50%;
}

.button:hover {
  background-color:#289c8e ;
}
   

  </style>

</head>

<body>
 <div class="container">
   <div class="main">
      <h2>Our Doctors</h2>
      <div class="totalDoctors">
      <?php
        $sql = "SELECT * from doctor";
        $res = mysqli_query($conn,  $sql);
        $doctorsData = mysqli_fetch_all($res, MYSQLI_ASSOC);

        if($doctorsData){
        foreach($doctorsData as $doctorIndex => $doctorData){ 
      ?>
        
        <div class="profile-card">
            <div class="img">
                <img src="WhatsApp Image 2022-12-18 at 2.20.17 PM.jpeg">
            </div>
            <div class="caption">
                <h3><?php echo $doctorData['F_name'] . ' ' . $doctorData['L_name'] ?></h3>
                <p>استشارى اورام</p>
                <p><button class="button" onclick="location.href='info doc 1/index.php?id=<?php echo $doctorData['id'] ?>'">Contact</button></p>
            </div>
        </div>

        <?php 
        }
      } else { ?>
        <p class='alert alert-danger'>No Data Founded</p>
      <?php
        }
      ?>
    </div>
    </div>
  </div>
</body>

</html>
