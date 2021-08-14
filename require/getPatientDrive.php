<?php
include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM patient_drive";
$patientDrives = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($patientDrivePatId, $patientDriveDriveId, $patientDriveBatchId);

while ($stmt->fetch()){
    $patientDrive = new patientDrive($patientDrivePatId, $patientDriveDriveId, $patientDriveBatchId);
    $patientDrives[] = $patientDrive;

}
