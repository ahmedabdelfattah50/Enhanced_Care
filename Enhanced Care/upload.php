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
  <form action="upload1.php"
           method="post"
           enctype="multipart/form-data">
    <div class="container">
      <input type="file" id="file-input" name="my_image" />
      <label for="file-input">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
        &nbsp; Choose Files To Upload
      </label>
      <input type="submit" name="login">
      <button class="Show" onclick="location.href='Profile/index.html'">Show your Profile</button>
      <div id="num-of-files"> </div>
      
      <ul id="files-list"></ul>
    </div>
    <!-- Script -->
    <script src="D:\front pages\load file\script.js"></script>
  </body>
</html>