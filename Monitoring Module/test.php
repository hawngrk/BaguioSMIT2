<?php
    require_once('../includes/configure.php');
    
    $pulseRR = '90';
    $tempRR = '35';
    $bpDiastolic = '120';
    $bpSystolic = '80';
    $id = '1';
    $vitals = 'post';
    
    try {
    $queryInsert = createQuery($id, $vital);
    echo $queryInsert;
    $stmtinsert = $database->prepare($queryInsert);
    $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
    } catch (Exception $th) {
        echo $th;
    }

    echo "vitals added";

function createQuery($id, $vital) {
    require_once('../includes/configure.php');
    $querySelect = "SELECT * FROM patient WHERE patient_id = ?";

    try {
        $stmtselect = $database->prepare($querySelect);
        $stmtselect->execute([$id]);
        $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
        echo $row["second_dose_vaccination"];
        if ($vital == "pre") {
            if ($row["first_dose_vaccination"] == '0') {
                $query = "UPDATE patient_vitals SET pre_vital_pulse_rate_1st_dose = ?, pre_vital_temp_rate_1st_dose = ?, pre_vital_bpDiastolic_1st_dose = ?, pre_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?";
                return $query;
            } else if ($row["first_dose_vaccination"] == '1' && $row["second_dose_vaccination"] == '0') {
                $query = "UPDATE patient_vitals SET pre_vital_pulse_rate_2nd_dose = ?, pre_vital_temp_rate_2nd_dose = ?, pre_vital_bpDiastolic_2nd_dose = ?, pre_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?";
                return $query;
            }
        } else {
            if ($row["first_dose_vacciantion"] == '1' && $row["second_dose_vaccination"] == '0') {                
                $query = "UPDATE patient_vitals SET post_vital_pulse_rate_1st_dose = ?, post_vital_temp_rate_1st_dose = ?, post_vital_bpDiastolic_1st_dose = ?, post_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?";
                return $query;
            } else if($row["second_dose_vaccination"] == '0'){
                $query = "UPDATE patient_vitals SET post_vital_pulse_rate_2nd_dose = ?, post_vital_temp_rate_2nd_dose = ?, post_vital_bpDiastolic_2nd_dose = ?, post_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?";
                return $query;
            }
        }
    } catch (Exception $th) {
        echo $th;
    }
}
?>
