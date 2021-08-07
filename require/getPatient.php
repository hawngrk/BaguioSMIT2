<?php
    include_once("../includes/database.php");
    include_once("../includes/constructor.php");

    $query = "SELECT * FROM patient";
    $patients = [];

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientFullName, $patientFirstDosage, $patientSecondDosage, $patientVaccinationStatus);

    while ($stmt->fetch()){
        $patient = new patientInfo($patientId, $patientFullName, $patientFirstDosage, $patientSecondDosage, $patientVaccinationStatus);
        $patients[] = $patient;

    }


