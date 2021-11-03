<?php
header("Access-Control-Allow-Origin: *");
include "../includes/database.php";
$answer = $_POST['answer'];
$token = $_POST['token'];
$barangay = $_POST['barangay'];
$drive = $_POST['drive'];

if ($answer == 'no') {
    $stmt = $database->stmt_init();
    $stmt->prepare("SELECT first_dose_queue FROM patient_barangay_queue ORDER BY first_dose_queue DESC LIMIT 1;");
    $stmt->execute();
    $stmt->bind_result($queue);
    $stmt->fetch();
    $stmt->close();
    $database->query("UPDATE patient_barangay_queue JOIN patient ON (patient_barangay_queue.patient_id = patient.patient_id) SET first_dose_queue = ('$queue' + 1) WHERE barangay_id = '$barangay' AND token = '$token';");
    $database->query("UPDATE patient SET notification = 0 WHERE token = '$token';");
} else {
    $stmt = $database->stmt_init();
    $stmt->prepare("SELECT patient_id FROM patient WHERE token = '$token';");
    $stmt->execute();
    $stmt->bind_result($patient);
    $stmt->fetch();
    $stmt->close();
    $database->query("INSERT INTO patient_drive (patient_id, drive_id) VALUES ('$drive', '$patient';");
}
