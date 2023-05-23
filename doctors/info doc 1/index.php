<?php 
  $doctorId = $_GET['id'];
  include_once "../db/connection.php";
  $sql = "SELECT * from doctor where id = '".$doctorId."'";
  $res = mysqli_query($conn,  $sql);
  $doctorData = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info doctor <?php echo $doctorData['F_name'] . ' ' . $doctorData['L_name'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="left">
        <img src="WhatsApp Image 2022-12-18 at 2.20.17 PM.jpeg" alt="user" width="100">
        <h4><?php echo $doctorData['F_name'] . ' ' . $doctorData['L_name'] ?></h4>
         <p>استشاري علاج الأورام بالقوات المسلحه /جامعه القاهره
            مدير مركز أورام القوات المسلحه بالزقازيق
            عضو الجمعيه الامريكيه لعلاج الاورام ASCO</p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div style='display:block;'>
                    <h4>Email</h4>
                    <p><?php echo $doctorData['E_mail'] ?></p>
                 </div>
            </div>
            <div class="info_data">
                <div style='display:block;'>
                  <h4>Phone</h4>
                  <p>0<?php echo $doctorData['Phone'] ?></p>
                </div>
            </div>
        </div>
      
      <div class="projects">
            <h3></h3>
            <div class="info_data">
            <div>
              <h4>Address</h4>
              <p>شارع فريد ندا ، أمام البوابة الرئيسية لمبنى إدارة جامعة بنها</p>
            </div>
        </div>
      
        <!-- <div class="social_media">
            <ul>
              <li><a href="https://www.facebook.com/people/%D9%85%D8%B1%D9%83%D8%B2-%D8%A7%D9%84%D8%AF%D9%83%D8%AA%D9%88%D8%B1-%D8%B9%D8%A8%D8%AF-%D8%A7%D9%84%D8%AD%D9%84%D9%8A%D9%85-%D8%B9%D9%8A%D8%B3%D9%89-%D9%84%D8%B9%D9%84%D8%A7%D8%AC-%D8%A7%D9%84%D8%A3%D9%88%D8%B1%D8%A7%D9%85/100063941533692/?mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a></li>
             <li><a href="whatsapp:contact=01001343473@s.whatsapp.com&message="like to chat with you><i class="fab fa-whatsapp"></i></a></li>
            </ul>
      </div> -->
    </div>
</div>
</body>
</html>
