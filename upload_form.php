<?php 
  session_start();
  if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Custom File Upload Button</title>
    
    <link
      rel="stylesheet"
      href="D:\front pages\load file\style.css"
    />
   
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />
   
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
  <form action="upload_image.php"
           method="post"
           enctype="multipart/form-data">
    <div class="container" style='margin-top: 100px; width: 500px'>
      <div style='color: #fff; padding: 10px 0; font-size:25px'>
        <label style='display: block; padding: 5px 0;'>Upload Image File</label>
        <input type="file" id="file-input" name="my_image" required />
      </div>
      <div style='color: #fff; padding: 10px 0; font-size:25px'>
        <label style='display: block; padding: 5px 0;'>Image Name</label>
        <input type="text" id="file-input" style='padding: 5px; font-size:20px; width:100%' name="image_name" required />
      </div>
      <!-- <label for="file-input">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
        &nbsp;
      </label> -->
      <input type="submit" style='padding: 5px 10px; font-size:18px; background-color: #13C5DD; color: #fff; border:none' name="login">
      <!-- <button class="Show" onclick="location.href='Profile/index.html'">Show your Profile</button> -->
      <!-- <div id="num-of-files"> </div> -->
      <!-- <ul id="files-list"></ul> -->
    </div>
    <!-- Script -->
    <script src="D:\front pages\load file\script.js"></script>
</body>
</html>
<?php 
  } else {
    header("Location:login.php?page=upload_form");
  }
?>