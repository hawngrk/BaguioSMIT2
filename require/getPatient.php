<?php
    include_once("../includes/database.php");
    include_once("../includes/constructor.php");

    $query = "SELECT * FROM patient";
    $patients = [];

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientFullName, $firstDoseDate, $secondDoseDate, $patientFirstDosage,
        $patientSecondDosage, $queueNumber, $notification, $firstDoseVaccinator, $secondDoseVaccinator);

    while ($stmt->fetch()){
        $patient = new patientInfo($patientId, $patientFullName, $firstDoseDate, $secondDoseDate, $patientFirstDosage,
            $patientSecondDosage, $queueNumber, $notification, $firstDoseVaccinator, $secondDoseVaccinator);
        $patients[] = $patient;

    }


