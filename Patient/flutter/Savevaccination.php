<?php
header("Access-Control-Allow-Origin: *");
include "../includes/database.php";

$date = $_POST['date'];
$dose = $_POST['dose'];
$lot = $_POST['lot'];
$personnel = $_POST['personnel'];
$patient = $_POST['patient'];

if ($dose == 'First Dose') {
    $stmt = $database->stmt_init();
    $stmt->prepare("SELECT second_dose_queue FROM patient_barangay_queue ORDER BY second_dose_queue DESC LIMIT 1;");
    $stmt->execute();
    $stmt->bind_result($queue);
    $stmt->fetch();
    $stmt->close();

    $query = "UPDATE patient SET date_of_first_dosage = '$date', first_dose_vaccination = 1, notification = 0, first_dose_vaccinator = '$personnel' WHERE patient_id = '$patient';";
    $query2 = "UPDATE patient_barangay_queue SET first_dose_queue = 0 AND second_dose_queue = ('$queue' + 1);";

    $database->query($query);
    $database->query($query2);
} else {
    $query = "UPDATE patient SET date_of_second_dosage = '$date', second_dose_vaccination = 1, notification = 0, second_dose_vaccinator = '$personnel' WHERE patient_id = '$patient';";
    $query2 = "UPDATE patient_barangay_queue SET second_dose_queue = 0;";

    $database->query($query);
    $database->query($query2);
}