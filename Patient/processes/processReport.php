<?php
    require_once("../configure.php");

    session_start();
    $account = $_SESSION['userlogin'];
    if(isset($_POST['processReport'])){
        $patientId = $account ['patient_id'];

        $dateOut = $_POST['date'];

        //Variable declaration
        
        //Vaccine side effects
        $chills = $_POST['chills'];
        $sFever = $_POST['sFever'];
        $headache = $_POST['headache'];
        $musclePain = $_POST['musclePain'];
        $nausea = $_POST['nausea'];
        $tiredness = $_POST['tiredness'];
        $other = $_POST['other'];
        $otherSymptom = $_POST['other'];
        
        //Covid-19 symptoms
        $cFever = $_POST['cFever'];
        $dryCough = $_POST['cough'];
        $fatigue = $_POST['fatigue'];
        $aches = $_POST['ache'];
        $runnyNose = $_POST['runny']; 
        $soreThroat = $_POST['sore'];
        $shortnessOfBreath = $_POST['loss'];
        $diarrhea = $_POST['diarrhea'];
        $headache = $_POST['headache'];
        $loss = $_POST['loss'];

        //Additional description
        $description = $_POST['description'];

        //variables set to default 
        $reportType = 'Smit+ App';
        $reportStatus = 'Pending';

        //Creating an array for the vaccine side effects
        $vaccineSideEffects = array("{$chills},", "{$sFever}","{$headache},", "{$musclePain},", "{$nausea},", "{$tiredness}", "{$other}{$otherSymptom}");

        
        //Creating an array for the covid-19 side effects
        $covidSymptoms = array("{$cFever}", "{$dryCough}", "{$fatigue}", "{$aches}", "{$runnyNose}", "{$soreThroat}", "{$shortnessOfBreath}", "{$diarrhea}", "{$headache}", "{$loss}");
        
        //Implode array of vaccine side effects and covidSymptoms
        $reportSideEffects = implode(",", $vaccineSideEffects);
        $reportSymptoms = implode(",", $covidSymptoms);
     
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
    }
?> 
