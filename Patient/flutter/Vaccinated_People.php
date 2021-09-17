<?php
include '../../includes/database.php';
$priority = $_POST['priority'];

$getVaccinatedPeople = "SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.second_dose_vaccination = 1 AND patient_priority_group = '$priority';";

$data = array();
$result = $database->query($getVaccinatedPeople);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
} else {
    echo "error";
}
