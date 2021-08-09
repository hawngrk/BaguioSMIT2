<?php
    include_once("../../includes/database.php");
    include_once("../../includes/constructor.php");

$query = "SELECT * FROM patient_details";
$patient_details = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($patientDeetsPatId, $patientFName, $patientLName, $patientMName, $patientSuffix, $patientPrioGroup, $patientCatId, $patientCatNum, $patientHAddress, $patientBrgy, $patientCity, $patientProv, $patientReg, $patientBirth, $age, $gender, $contact, $occupation);

while ($stmt->fetch()){
    $patientDeets = new patientDetails($patientDeetsPatId, $patientFName, $patientLName, $patientMName, $patientSuffix, $patientPrioGroup, $patientCatId, $patientCatNum, $patientHAddress, $patientBrgy, $patientCity, $patientProv, $patientReg, $patientBirth, $age, $gender, $contact, $occupation);
    $patient_details[] = $patientDeets;

}
