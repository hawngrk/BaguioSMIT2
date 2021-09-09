<?php
session_start();
require_once("../configure.php");

$sessionDetails = $_SESSION['userlogin'];
$type = $_GET['type'];
$id = $sessionDetails['patient_id'];

if($type === 'getUsername') {
    $userQuery = "SELECT * FROM patient_details WHERE patient_id = ?";
    $stmtselect = $database->prepare($userQuery);
    $result = $stmtselect->execute([$id]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
    echo json_encode($row);
}

if($type === 'getProfile') {
    /**
     * 
     */
    $profileQuery = "SELECT * FROM patient WHERE patient_id = ?";

    $stmtselect = $database->prepare($profileQuery);
    $result = $stmtselect->execute([$id]);
    $patient = $stmtselect->fetch(PDO::FETCH_ASSOC);
    
    $profileQuery = "SELECT * FROM patient_details WHERE patient_id = ?";
    $stmtselect = $database->prepare($profileQuery);
    $result = $stmtselect->execute([$id]);
    $patientDetails = $stmtselect->fetch(PDO::FETCH_ASSOC);

    $formatAddress = $patientDetails['patient_house_address']." ".$patientDetails['patient_barangay_address']." ".$patientDetails['patient_CM_address'];

    $vaccineName = getVaccine($id);

    $profileDetails = array('name' => $patient['patient_name'],  'age' => $patientDetails['patient_age'], 'patient_address' => $formatAddress, 'vaccine' => $vaccineName, 'first_dosage_date' => $patient['date_of_first_dosage'], 'second_dosage_date' => $patient['date_of_second_dosage']);

    echo json_encode($profileDetails);
}   

function getVaccine($id) {
    require_once("../configure.php");
    $vaccineBrand = "SELECT * FROM patient_drive WHERE patient_id = ?";
    $stmtselect = $database->prepare($vaccineBrand);
    $result = $stmtselect->execute([$id]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

    $vaccineBrand = "SELECT * FROM vaccine_batch WHERE vaccine_batch_id = ?";
    $stmtselect = $database->prepare($vaccineBrand);
    $result = $stmtselect->execute([$row['vaccine_batch_id']]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

    $vaccineBrand = "SELECT * FROM vaccine WHERE vaccine_id = ?";
    $stmtselect = $database->prepare($vaccineBrand);
    $result = $stmtselect->execute([$row['vaccine_id']]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

    return $row['vaccine_name']; 
}