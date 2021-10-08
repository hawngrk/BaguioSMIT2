<?php
require_once("../../includes/configure.php");
session_start();
$account = $_SESSION['account'];

$query = "INSERT INTO report(patient_id, report_method, report_type, report_details ,reported_symptoms, date_last_out, report_status) VALUES(?,?,?,?,?,?,?) patient_id = ?";

if($_POST['reportType'] == 'Covid Symptoms') {
    reportCovidSymp($account['patient_id'], $query);
} else {
    reportVaccineSideEffects($account['patient_id'], $query);
}   

function reportCovidSymp($id, $query) {
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

    $symptomsArray= array("$cFever", "$dryCough", "$fatigue", "$aches", "$runnyNose", "$soreThroat", "$shortnessOfBreath", "$diarrhea", "$headache", "$loss");
    $trimmedArray = array_map('trim', $symptomsArray);
    $symptoms = implode(",", $trimmedArray);

    $description = $_POST['description'];
    $method = 'SMIT+ App';

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$id, $method, "Covid Symptoms", $description, $symptoms, "Pending"]);
        if ($result) {
            echo "Report submitted";
        } else {
            throw new Exception(header('HTTP/1.0 400 This should not happen'));
        }

    } catch (Exception $e) {
        echo $e->getMessage();
        
    } catch (PDOException $e) {
        die(header('HTTP/1.0 500 Database Server error'));
    }
}

function reportVaccineSideEffects($id, $query) {
    $chills = $_POST['chills'];
    $sFever = $_POST['sFever'];
    $headache = $_POST['headache'];
    $musclePain = $_POST['musclePain'];
    $nausea = $_POST['nausea'];
    $tiredness = $_POST['tiredness'];
    $other = $_POST['other'];
    $otherSymptom = $_POST['other'];

    $description = $_POST['description'];
    $method = $_POST['method'];

    $sideEffectsArray= array("$chills", "$sFever", "$headache", "$musclePain", "$nausea", "$tiredness", "$other:$otherSymptom");

    $trimmedArray = array_map('trim', $sideEffectsArray);
    $sideEffects = implode(",", $trimmedArray);

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$id, $method, "Covid Symptoms", $description, $sideEffects, "Pending"]);

        if ($result) {
            echo "Report Submitted";
        } else {
            echo "This should'nt happen";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        
    } catch (PDOException $e) {
        echo 'Database Server error';
    }
}