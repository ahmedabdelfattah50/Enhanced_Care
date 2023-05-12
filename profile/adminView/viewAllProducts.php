<?php 
  session_start();
  if(isset($_SESSION['id'])){
    include_once "../db/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="assets/css/style.css"></link>
  </head>
</head>
<body >
<div >
  <h2>Images</h2>

  <?php
    $sql = "SELECT * from images where patient_id = '".$_SESSION['id']."'";
    $res = mysqli_query($conn,  $sql);
    $patientImgs = mysqli_fetch_all($res, MYSQLI_ASSOC);

    if($patientImgs){
  ?>

  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Image</th>
        <th>Image Name</th>
        <th>Download Image</th>
        <th>Action</th>
      </tr>
    </thead>
       
    <tbody>
      <?php
        foreach($patientImgs as $imgIndex => $patientImg){ 
      ?>
      <tr>
        <td><?php echo $imgIndex+1 ?></td>
        <td><img src="adminView/uploads/<?php echo $patientImg['Image'] ?>" width="40" height="40" alt="profile"></td>
        <td><?php echo $patientImg['Image_name'] ?></td>
        <td><a class="btn btn-info" style="height:40px" href="adminView/download.php?image=<?php echo urlencode($patientImg['Image']) ?>">Download</a></td>
        <td>
          <form method="post" action="adminView/delete_image.php">
            <input type="hidden" value="<?php echo $patientImg['id'] ?>" name="image_id" />
            <input type="submit" class="btn btn-danger" style="height:40px" value="Delete" />
          </form>
          <!-- <a class="btn btn-danger" style="height:40px">Delete</a> -->
        </td>
      </tr>
      <?php 
        }
      ?>
    </tbody>
  </table>
  <?php 
    } else { ?>
      <p class='alert alert-danger'>No Data Founded</p>
  <?php
    }
  ?>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Image
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="adminView/upload_image.php" method="POST">
            <div class="form-group">
              <label for="name">Image Name:</label>
              <input type="text" class="form-control" id="p_name" name='image_name' required>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file" name='my_image'>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Image</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>


<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>
<?php 
  } else {
    header("Location:../../login.php");
  }
?>
