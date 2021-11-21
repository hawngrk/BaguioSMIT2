<?php
include_once("../includes/database.php");
include_once("../includes/constructor.php");

/***
 * @Author Hudson Kit P. Natividad
 * Date Created: June 28, 2021
 * Description: returns the Report content from the Database
 */

$query = "SELECT * FROM report";
$reports = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($reportId, $reportPatientId, $reportDetails, $vaccineSymptomsReported, $covSymptomsReported, $dateLastOut, $dateReported, $reportStatus, $Archived);

while ($stmt->fetch()){
    $report = new reports($reportId, $reportPatientId, $reportDetails, $vaccineSymptomsReported, $covSymptomsReported, $dateLastOut, $dateReported, $reportStatus, $Archived);
    $reports[] = $report;

}


