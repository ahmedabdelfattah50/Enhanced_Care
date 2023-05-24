<?php 
  session_start();
  if(isset($_SESSION['doctor'])){
    include_once "../../db/connection.php";
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
<body>
<div>
      <h3>Patients</h3>

      <?php
            // include_once "../db/connection.php";
            include "adminHeader.php";
            include "sidebar.php";

            $sql = "SELECT * from patient where Doctor_id = '".$_SESSION['id']."'";
            $res = mysqli_query($conn,  $sql);
            $patientsData = mysqli_fetch_all($res, MYSQLI_ASSOC);

            if($patientsData){
        ?>

  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Phone</th>
        <th>All Predictions</th>
      </tr>
    </thead>
       
    <tbody>
      <?php
        foreach($patientsData as $patientIndex => $patientData){ 
      ?>
      <tr>
        <td><?php echo $patientIndex+1 ?></td>
        <td><?php echo $patientData['F_name'] . ' ' . $patientData['L_name'] ?></td>
        <td>0<?php echo $patientData['Phone'] ?></td>
        <td><a class="btn btn-info" style="height:40px" href="patient_predictions.php?id=<?php echo $patientData['id'] ?>">Predictions</a></td>
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
      <!-- <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Medicine
      </button> -->
    
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Medicine</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="adminView/upload_medicine.php" method="POST">
                <div class="form-group">
                  <label for="Name_of_medicine">Medicine Name:</label>
                  <input type="text" class="form-control" name="Name_of_medicine" required>
                </div>
                <div class="form-group">
                  <label for="Description">Medicine Description:</label>
                  <textarea class="form-control" name="Description" cols="30" rows="5" required></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Medicine</button>
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


    <script type="text/javascript" src="assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>
<?php 
  } else {
    header("Location:../login.php");
  }
?>