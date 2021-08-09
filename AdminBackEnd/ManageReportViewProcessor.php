<?php
if (isset($_POST['report'])) {
    include '../includes/database.php';
    require '../require/getReport.php';
    require '../require/getPatientDetails.php';
    require '../require/getVaccine.php';
    $reportId = $_POST['report'];
    $patientId = '';
    $reportType = '';
    $dateRecentTravel = '';
    $vaccineSymptoms = '';
    $covid19Symptoms = '';
    $reportDetails = '';
    $reportStatus = '';
    $patientName = '';
    $patientAddress = '';
    $patientNum = '';
    $vacName = '';
    $vacDate = '';
    $vacDosage = '';

    foreach ($reports as $rep) {
        if ($rep->getReportId() == $reportId) {
            $patientId = $rep->getReportPatientId();
            $reportType = $rep->getReportType();
            $dateRecentTravel = $rep->getLastOut();
            $vaccineSymptoms = $rep->getVaccineSymptomsReported();
            $covid19Symptoms = $rep->getCovid19SymptomsReported();
            $reportDetails = $rep->getReportDetails();
            $reportStatus = $rep->getReportStatus();
        }
    }
    $vaccineSymptoms = explode(',', $vaccineSymptoms);
    $covid19Symptoms = explode(',', $covid19Symptoms);

    foreach ($patient_details as $pat_det) {
        if ($pat_det->getPatientDeetPatId() == $patientId) {
            $patientName = $pat_det->getPatientFName(). " " .$pat_det->getPatientMName(). " " .$pat_det->getPatientLName();
            $patientAddress = $pat_det->getHouseAdd(). ", " .$pat_det->getBrgy(). ", " .$pat_det->getCity(). ", " .$pat_det->getProvince();
            $patientNum = $pat_det->getContact();
        }
    }
    echo "
    <div class='modal-content container'>
    <h2 id='headerReviewReport'>REVIEW REPORT - $patientName<span id='viewReportClose' class='close'>&times;</span></h2>
    <div class='ReviewRerport-PopUp'>
    <div id='repInfo'>
    <h4 class='reviewReportH3'>Report Information</h4>
    <p>Report ID: $reportId</p>
    <p>Report Type: $reportType</p>
    <p>Date of recent travel: $dateRecentTravel</p>
    </div>
    <div id='sympExpr'>
    <h4 class='reviewReportH3'>Symptoms Experienced</h4>
    <div id='vacSideEffect'>
    <p>Vaccine Side Effect:</p>
    <ul>
    ";
    if ($vaccineSymptoms[0] === "") {
        echo "<li>None</li>";
    } else {
        foreach ($vaccineSymptoms as $vacSymp) {
            echo "<li>$vacSymp</li>";
        }
    }

    echo "
    </ul>
    </div>
    <div id='covidSymp'>
    <p>Applicable COVID-19 Symptoms:</p>
    <ul>";
    if ($covid19Symptoms[0] === "") {
        echo "<li>None</li>";
    } else {
        foreach ($covid19Symptoms as $covSymp) {
            echo "<li>$covSymp</li>";
        }
    }
    echo "
    </ul>
    </div>
    <div id='repDetails'>
    <p>Additional Details:</p>
    <p>$reportDetails</p>
    </div>
    </div>
    <div id='patInfo'>
    <h4 class='reviewReportH3'>Patient Information</h4>
    <p>Patient Address: $patientAddress</p>
    <p>Contact Number: $patientNum</p>
    </div>
    <p>Report Status: $reportStatus</p>
    </div>
    </div>
    ";
}
