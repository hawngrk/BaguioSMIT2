<?php
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

        <form action="" method="post">
            <h3>1. Date of the last time you went out</h3>
            <input type="date" name="last-out" id="last-out"><br>
            <h3>2. Select the vaccine side effect/s that applies:</h3>
            <label for="chills"></label>
            <input type="radio" name="chills" id="chills"><br>
            <label for="headache"></label>
            <input type="radio" name="headache" id="headache"><br>
            <label for="muscle-pain"></label>
            <input type="radio" name="muscle-pain" id="muscle-pain"><br>
            <label for="nausea"></label>
            <input type="radio" name="nausea" 
            id="nausea"><br>
            <label for="tiredness"></label>
            <input type="radio" name="tiredness" 
            id="tiredness"><br>
            <label for="other"></label>
            <input type="radio" name="other" id="other"><br>
            <input type="text" name="other-symptom" id="other-symptom" placeholder="Please specify here"><br>
            <label for=""></label>
            <h3>3. Select the COVID-19 symptom/s that applies:</h3>


            
            
        </form>
        <script src="" async defer></script>
    </body>
</html>