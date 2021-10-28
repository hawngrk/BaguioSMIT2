<?php
header("Access-Control-Allow-Origin: *");
include "../includes/database.php";
$token = $_POST['token'];
$barangay = $_POST['barangay'];
$database->query("UPDATE patient SET notification = 0 WHERE token = '$token';");
$stmt = $database->stmt_init();
$stmt->prepare("SELECT first_dose_queue FROM patient_barangay_queue ORDER BY first_dose_queue DESC LIMIT 1;");
$stmt->execute();
$stmt->bind_result($queue);
$stmt->fetch();
$stmt->close();
$database->query("UPDATE patient_barangay_queue JOIN patient ON (patient_barangay_queue.patient_id = patient.patient_id) SET first_dose_queue = ('$queue' + 1) WHERE barangay_id = '$barangay' AND token = '$token';");