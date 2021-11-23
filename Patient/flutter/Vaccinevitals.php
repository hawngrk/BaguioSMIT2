<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';

$patient = $_POST['patient'];
$data = array();

$query = "SELECT first_dose_vaccination FROM patient WHERE patient_id = '$patient';";
$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($firstDose);
$stmt->fetch();
$stmt->close();

if ($firstDose == '1') {
    $query = "SELECT pre_vital_pulse_rate_2nd_dose AS pulseRate, pre_vital_temp_rate_2nd_dose AS tempRate, pre_oxygen_saturation_2nd_dose AS oxygenSaturation, pre_vital_bpDiastolic_2nd_dose AS bpDiastolic, pre_vital_bpSystolic_2nd_dose AS bpSystolic FROM patient_vitals WHERE patient_id = '$patient';";
} else {
    $query = "SELECT pre_vital_pulse_rate_1st_dose AS pulseRate, pre_vital_temp_rate_1st_dose AS tempRate, pre_oxygen_saturation_1st_dose AS oxygenSaturation, pre_vital_bpDiastolic_1st_dose AS bpDiastolic, pre_vital_bpSystolic_1st_dose AS bpSystolic FROM patient_vitals WHERE patient_id = '$patient';";
}

$result = $database->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "error";
}
