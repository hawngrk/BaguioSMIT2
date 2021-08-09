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
        <form action="processes/processReport.php" method="post" target="_blank" id="report-form">
            <h3>1. Date of the last time you went out</h3>
            <input type="hidden" name="last-out">
            <input type="date" name="last-out" id="last-out"><br>

            <h3>2. Select the vaccine side effect/s that applies:</h3>
            
            <input type="hidden" name="chills" value="">
            <input type="checkbox" name="chills" id="chills" value="Chills">
            <label for="chills">Chills</label><br>

            <input type="hidden" name="headache" value="">
            <input type="checkbox" name="headache" id="headache" value="Headache">
            <label for="headache">Headache</label><br>

            <input type="hidden" name="muscle-pain" value="">
            <input type="checkbox" name="muscle-pain" id="muscle-pain" value="Muscle pain">
            <label for="muscle-pain">Muscle Pain</label><br>

            <input type="hidden" name="nausea" value="">
            <input type="checkbox" name="nausea" id="nausea" value="Nausea">
            <label for="nausea">Nausea</label><br>

            <input type="hidden" name="tiredness" value="">
            <input type="checkbox" name="tiredness" id="tiredness" value="Tiredness">
            <label for="tiredness">Tiredness</label><br>

            <input type="hidden" name="other" value="">
            <input type="checkbox" name="other" id="other" value="Other:">
            <label for="other">Other side effect/s (Stomach pain, Eye redness)</label><br>

            <input type="text" name="other-symptom" id="other-symptom" placeholder="Please specify here"><br>
            <input type="checkbox" name="none" id="no-side-effect" value="">
            <label for="no-side-effect">None of the Above</label><br>

            <h3>3. Select the COVID-19 symptom/s that applies:</h3>

            <input type="hidden" name="fever" value="">
            <input type="checkbox" name="fever" id="fever" value="Fever">
            <label for="fever">Fever</label><br>

            <input type="hidden" name="dry-cough" value="">
            <input type="checkbox" name="dry-cough" id="dry-cough" value="Dry Cough">
            <label for="dry-cough">Dry Cough</label><br>

            <input type="hidden" name="fatigue" value="">
            <input type="checkbox" name="fatigue" id="fatigue" value="Fatigue">
            <label for="fatigue">Fatigue</label><br>

            <input type="hidden" name="aches-and-pains" value="">
            <input type="checkbox" name="aches-and-pains" id="aches-and-pains" value="Aches and Pains">
            <label for="aches-and-pains">Aches and Pains</label><br>

            <input type="hidden" name="runny-nose" value="">
            <input type="checkbox" name="runny-nose" id="runny-nose" value="Runny Rose">
            <label for="runny-nose">Runny Nose</label><br>

            <input type="hidden" name="sore-throat" value="">
            <input type="checkbox" name="sore-throat" id="sore-throat" value="Sore throat">
            <label for="sore-throat">Sore Throat</label><br> 

            <input type="hidden" name="shortness-of-breath" value="">
            <input type="checkbox" name="shortness-of-breath" id="shortness-of-breath" value="Shortness of breath">
            <label for="shortness-of-breath">Shortness of Breath</label><br>   

            <input type="hidden" name="diarrhea" value="">
            <input type="checkbox" name="diarrhea" id="diarrhea" value="Diarrhea">
            <label for="diarrhea">Diarrhea</label><br>

            <input type="hidden" name="cHeadache" value="">
            <input type="checkbox" name="cHeadache" id="cHeadache" value="Headache">
            <label for="headache">Headache</label><br>

            <input type="hidden" name="loss-of-smell-and-taste" value="">
            <input type="checkbox" name="loss-of-smell-and-taste" id="loss-of-smell-and-taste" value="Loss of smell and taste">
            <label for="loss-of-smell-and-taste">Loss of smell and Taste</label><br>

            <input type="checkbox" name="no-symptoms" id="no-symptoms" value="">
            <label for="no-symptoms">None of the Above</label><br>
            
            <h3>Additional Description</h3><br>
            <input type="text" name="description" id="description"><br>
            <button type="submit" name="processReport" form="report-form">Submit</button>
        </form>
    </body>
</html>