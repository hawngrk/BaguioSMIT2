<?php
include("../includes/database.php");
include("../includes/constructor.php");

/***
 * @Author Hudson Kit P. Natividad
 * Date Created: June 28, 2021
 * Description: returns the Report content from the Database
 */

$query = "SELECT report_id, patient_id, report_details, vaccine_symptoms_reported, COVID19_symptoms_reported, date_reported, report_verified FROM report";
$reports = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($reportId, $reportPatientId, $reportDetails, $vaccineSymptomsReported, $covSymptomsReported, $dateReported, $reportStatus);

while ($stmt->fetch()){
    $report = new patientInfo($reportId, $reportPatientId, $reportDetails, $vaccineSymptomsReported, $covSymptomsReported, $dateReported, $reportStatus);
    $reports[] = $report;

}

$stmt->close();

?>

