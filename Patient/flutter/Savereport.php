<?php
header("Access-Control-Allow-Origin: *");
include "../../includes/database.php";
$patient = $_POST['patient'];
$date = $_POST['date'];
$vacSymp = $_POST['vacSymp'];
$covSymp = $_POST['covSymp'];
$add = $_POST['add'];
$reported = $_POST['reported'];

$database->query("INSERT INTO report (patient_id, report_details, vaccine_symptoms_reported, COVID19_symptoms_reported, date_last_out, date_reported, report_status, Archived) VALUES ($patient, '$add', '$vacSymp', '$covSymp', '$date', '$reported', 'Pending', 0);");