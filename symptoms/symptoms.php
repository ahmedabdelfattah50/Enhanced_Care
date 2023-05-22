<?php 
  session_start();
  if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-
        wvfXpqpZZVQGK6TAH5PVLGOfQNHSoD2xbE+QKPxCAFLNEevoEH3SlosibVcoQVnN" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Symptoms Page</title>
        <link rel="stylesheet" href="symptoms.css" /> 
    </head>
    <body style='margin:0'>
        <!-- nav -->
        <nav style="background-color: #13C5DD; margin:0; padding: 10px">
            <a class="navbar-brand" href="./index.php">
                <img src="images/<?php echo ($_SESSION['gender'] == 1) ? 'male' : 'female' ?>.png" width="60" height="60" alt="profile">
            </a>
            <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul> -->
            
            <div class="user-cart" style='float: right; margin-top: 20px'> 
                <a href="../profile/index.php" style="text-decoration:none;">
                    <i class="fa fa-home" style="margin-right:15px; font-size:30px; color:#fff;" aria-hidden="true"></i>
                </a>
                <a href="../logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="margin-right:15px; font-size:30px; color:#fff;" aria-hidden="true"></i>
                </a>

            </div>  
        </nav>
        <form>
            <h2>Symptoms</h2>
            <p>Which of these Symptoms do you have?</p>

                 <input type="checkbox" name="symptom1" id="symptom1" value="A persistent change in your bowel habits,
                 including diarrhea or constipation or a change in the consistency of your stool">
                 <label for="symptom1">A persistent change in your bowel habits,<br>including diarrhea or constipation or a change in the consistency of your stool.</label>

                 <input type="checkbox" name="symptom2" id="symptom2" value="Rectal bleeding or blood in your stool">
                 <label for="symptom2">Rectal bleeding or blood in your stool.</label>

                 <input type="checkbox" name="symptom3" id="symptom3" value="Persistent abdominal discomfort, such as cramps, gas or pain">
                 <label for="symptom3">Persistent abdominal discomfort, such as cramps or gas.</label>

                 <input type="checkbox" name="symptom4" id="symptom4" value="A feeling that your bowel doesn't empty completely">
                 <label for="symptom4">A feeling that your bowel doesn't empty completely.</label>

                 <input type="checkbox" name="symptom5" id="symptom5" value="Weakness or fatigue">
                 <label for="symptom5">Weakness or fatigue.</label>

                 <input type="checkbox" name="symptom6" id="symptom6" value="Unexplained weight loss">
                 <label for="symptom6">Unexplained weight loss.</label>

                 <button><a href="../home of prediction/upload ct/upload.php">Go to prediction page</a></button>
        </form>
    </body>
</html>
<?php 
  } else {
    header("Location:../login.php");
  }
?>