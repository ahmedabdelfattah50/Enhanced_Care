<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-
        wvfXpqpZZVQGK6TAH5PVLGOfQNHSoD2xbE+QKPxCAFLNEevoEH3SlosibVcoQVnN" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Symptoms Page</title>
        <link rel="stylesheet" href="symptoms.css" /> 
    </head>
    <body>
        <form action="action.php" method="post">
            <h2><?php 
             session_start();
             echo $_SESSION['f_name'] . ' ' . $_SESSION['last_name'] 
             ?>
             </h2>
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

                 <button>Go to prediction page</button>
           
        </form>
    </body>
</html>