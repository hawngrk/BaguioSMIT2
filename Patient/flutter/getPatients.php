<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';

if (isset($_POST['many'])) {
    $result = $database->query("SELECT patient.patient_id AS id, patient.patient_full_name AS name, priority_groups.priority_group AS priority, patient.first_dose_vaccination AS dosageFirst, patient.second_dose_vaccination AS dosageSecond , patient.date_of_first_dosage AS dateFirst, patient.date_of_second_dosage AS dateSecond, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS address FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id;");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "error";
    }
}

if (isset($_POST['individual'])) {
    $id = $_POST['individual'];

    $result = $database->query("SELECT patient.patient_id AS id, patient.patient_full_name AS name, priority_groups.priority_group AS priority, patient.first_dose_vaccination AS dosageFirst, patient.second_dose_vaccination AS dosageSecond , patient.date_of_first_dosage AS dateFirst, patient.date_of_second_dosage AS dateSecond, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS address FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id  WHERE patient.patient_id = '$id';");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "error";
    }
}