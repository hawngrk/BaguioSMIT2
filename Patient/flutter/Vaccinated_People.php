<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';
$priority = $_POST['priority'];

$data = array();
$result = $database->query("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE patient.second_dose_vaccination = 1 AND priority_groups.priority_group = '$priority';");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "error";
}
