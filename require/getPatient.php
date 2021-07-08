<?php
    include("../includes/database.php");
    include("../includes/constructor.php");

    $query = "SELECT * FROM patient";
    $patients = [];

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientFullName, $patientFirstDosage, $patientSecondDosage, $patientVaccinationStatus);

    while ($stmt->fetch()){
        $patient = new patientInfo($patientId, $patientFullName, $patientFirstDosage, $patientSecondDosage, $patientVaccinationStatus);
        $patients[] = $patients;

    }

    $stmt->close();

    ?>
