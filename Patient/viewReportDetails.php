<?php 
if (isset($_POST['report'])) {
    require '../require/getReport.php';

    $reportId = $_POST['report'];
    $patientId = '';
    $dateRecentTravel = '';
    $vaccineSymptoms = '';
    $covid19Symptoms = '';
    $reportStatus = '';
    
    foreach ($reports as $rep) {
        if ($rep->getReportId() == $reportId) {
            $patientId = $rep->getReportPatientId();
            $dateRecentTravel = $rep->getLastOut();
            $vaccineSymptoms = $rep->getVaccineSymptomsReported();
            $covid19Symptoms = $rep->getCovid19SymptomsReported();
            $reportStatus = $rep->getReportStatus();
        }
    }

    $vaccineSymptoms = explode(',', $vaccineSymptoms);
    $covid19Symptoms = explode(',', $covid19Symptoms);

    echo "<div class=view-report-container>
        <h3 class='headerViewReport'>Report ID {$reportId}</h3><br>";

    echo"<p>Reported COVID-19 symptoms: </p>";
    if($vaccineSymptoms[0] === "") {
        echo "None";
    } else {
        foreach ($vaccineSymptoms as $vacSymp) {
            echo "${vacSymp}<br>";
        }
    }

    echo "<br><p>Reported COVID-19 symptoms: </p>";

    if($covid19Symptoms[0] === "") {
        echo "None";
    } else {
        foreach ($covid19Symptoms as $covSymp) {
            echo "${covSymp}<br>";
        }
    }
    echo"<br>Report details: {$reportDetails}";
    echo"<br>Report status: {$reportStatus}";
    echo "</div>";
}