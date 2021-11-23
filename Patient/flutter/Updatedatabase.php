<?php
header("Access-Control-Allow-Origin: *");
include "../../includes/database.php";
$patient = $_POST['patient'];
$drive = $_POST['drive'];
$barangay = $_POST['barangay'];
$dose = $_POST['dose'];
$answer = $_POST['answer'];

if ($answer == 'no') {
    $stmt = $database->stmt_init();
    $stmt->prepare("SELECT first_dose_queue FROM patient_barangay_queue ORDER BY first_dose_queue DESC LIMIT 1;");
    $stmt->execute();
    $stmt->bind_result($queue);
    $stmt->fetch();
    $stmt->close();

    if ($dose == 'firstDose') {
        $database->query("UPDATE patient_barangay_queue SET first_dose_queue = ('$queue' + 1) WHERE barangay_id = '$barangay' AND patient_id = '$patient';");
    } else {
        $database->query("UPDATE patient_barangay_queue SET second_dose_queue = ('$queue' + 1) WHERE barangay_id = '$barangay' AND patient_id = '$patient';");
    }

    $database->query("UPDATE patient SET notification = 0 WHERE patient_id = '1';");
} else {
    $database->query("INSERT INTO patient_drive (patient_id, drive_id) VALUES ('$drive', '$patient';");
}
