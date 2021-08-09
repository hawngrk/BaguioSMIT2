<?php
    require_once("../configure.php");

    session_start();
    $account = $_SESSION['userlogin'];
    if(isset($_POST['processReport'])){
        $patientId = $account ['patient_id'];

        $dateOut = $_POST['last-out'];

        //Variable declaration
        
        //Vaccine side effects
        $chills = $_POST['chills'];
        $headache = $_POST['headache'];
        $musclePain = $_POST['muscle-pain'];
        $nausea = $_POST['nausea'];
        $tiredness = $_POST['tiredness'];
        $other = $_POST['other'];
        $otherSymptom = $_POST['other-symptom'];
        
        //Covid-19 symptoms
        $fever = $_POST['fever'];
        $dryCough = $_POST['dry-cough'];
        $fatigue = $_POST['fatigue'];
        $aches = $_POST['aches-and-pains'];
        $runnyNose = $_POST['runny-nose'];
        $soreThroat = $_POST['sore-throat'];
        $shortnessOfBreath = $_POST['shortness-of-breath'];
        $diarrhea = $_POST['diarrhea'];
        $headache = $_POST['headache'];
        $loss = $_POST['loss-of-smell-and-taste'];

        //Additional description
        $description = $_POST['description'];

        //variables set to default 
        $reportType = 'Smit+ App';
        $reportStatus = 'Pending';

        //Creating an array for the vaccine side effects
        $vaccineSideEffects = array("{$chills},", "{$headache},", "{$musclePain},", "{$nausea},", "{$tiredness},", "{$other}{$otherSymptom}");

        //Serialize array of vaccine side effects
        $reportSideEffects = serialize($vaccineSideEffects);

        
        //Creating an array for the covid-19 side effects
        $covidSymptoms = array("{$fever},", "{$dryCough},", "{$fatigue},", "{$aches},", "{$runnyNose},", "{$soreThroat},", "{$shortnessOfBreath},", "{$diarrhea},", "{$headache},", "{$loss}");
        
        //Serialize array of vaccine side effects and covidSymptoms
        $reportSideEffects = serialize($vaccineSideEffects);
        $reportSymptoms = serialize($covidSymptoms);

        //Testing variable display
        echo  "{$dateOut}<br>";
        echo "{$patientId}<br>";
        echo "{$description}<br>";

        for($x = 0; $x < count($vaccineSideEffects); $x++) {
            echo $vaccineSideEffects[$x];
            echo "<br>";
        }

        for($x = 0; $x < count($covidSymptoms); $x++) {
            echo $covidSymptoms[$x];
            echo "<br>";
        }
     
        $sql = "INSERT INTO report (patient_id, report_type, report_details, vaccine_symptoms_reported, COVID19_symptoms_reported, date_last_out, report_status) VALUES(?,?,?,?,?,?,?)";

        try {
            $stmtinsert= $database->prepare($sql);
            $result = $stmtinsert->execute([$patientId, $reportType, $description, $reportSideEffects, $reportSymptoms, $dateOut, $reportStatus]);
            if($result) {
                echo 'Report submitted';
            } else {
                throw new Exception(header('HTTP/1.0 400 Patient does not exist'));
            }
        

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        catch (PDOException $e) {
            die(header('HTTP/1.0 500 Database Server error'));
        }

        // Unserialize Array for display purposes
        //$unserializedSideEffects = unserialize($sideEffects);
        //$unserializedSymptoms = unserialize($symptoms);
    }
?> 
