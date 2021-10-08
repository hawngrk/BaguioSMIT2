<?php 
    session_start();
    require_once '../../require/getReport.php';

    $account = $_SESSION['account'];

    $reportArray = array();
    foreach ($reports as $reportLog ) {
        $report = array(
            'patient_id' => $reportLog->getReportPatientId(), 'date' => $reportLog ->getReportDateReported(), 'symptoms' => $reportLog->getSymptoms(), 
            'details', $reportLog->getReportDetails());
            
        if ($account['patient_id'] == $report['patient_id']) {
            array_push($reportArray, $report);
        }
    }
    echo json_encode($reportArray);