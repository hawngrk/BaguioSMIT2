<?php
    include_once("../includes/database.php");
    include_once("../includes/constructor.php");

$query = "SELECT * FROM patient_details";
$patient_details = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($patientDeetsPatId, $patientFName, $patientLName, $patientMName, $patientSuffix, $patientCatId, $patientCatNum, $philHealthID, $pwdID, $patientHAddress, $patientBirth, $age, $gender, $contact, $occupation, $archived, $barangayId, $priorityGroupId);

while ($stmt->fetch()){
    $patientDeets = new patientDetails($patientDeetsPatId, $patientFName, $patientLName, $patientMName, $patientSuffix, $patientCatId, $patientCatNum, $philHealthID, $pwdID, $patientHAddress, $patientBirth, $age, $gender, $contact, $occupation, $archived,  $barangayId, $priorityGroupId);
    $patient_details[] = $patientDeets;

}
