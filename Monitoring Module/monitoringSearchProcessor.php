<?php
include("../includes/database.php");

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($search == "") {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name,  patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
    }

    echo "
    <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Patient Name</th>
                <th scope='col'>Category</th>
                <th scope='col'>Complete Address</th>
                <th scope='col'>Contact Number</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";
            
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientID, $patientName, $category, $patientAddress, $contactNum);

    
    while ($stmt->fetch()) {
        echo "<tr>
                <td>$patientID</td>
                <td>$patientName</td>
                <td>$category</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                <td><button id='postVac' class='viewReportBtn btn-success' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button></td></td>
                </tr>";
    }
}

if (isset($_POST['modalRes'])) {
    $modalRes = $_POST['modalRes'];
    require('../require/getPatientDetails.php');
    require('../includes/configure.php');
    
    foreach ($patient_details as $ps) {
        if ($modalRes == $ps->getPatientDeetPatId()) {
            $id = $ps->getPatientDeetPatId();
            $FName = $ps->getpatientFName();
            $LName = $ps->getpatientLName();
            $FullAddress = $ps->getHouseAdd() . $ps->getBrgy() . $ps->getCity() . $ps->getProvince() . $ps->getRegion();
            $category = $ps->getPriorityGroup();
            // $prePulese = $ps->getPrePulse();
            // $preTemp = $ps->getPreTemp();
            // $preBP = $ps->getBP();

            echo "<h4>$FName $LName</h4>
            <hr>
            <div class='row'>
            <div class='col'>
            <h6>Address: </h6><p>$FullAddress<p>
            <h6>Category:</h6><p>$category</p>
            <hr>
            <h5>Medical Background</h5>
            <h6>Allergies:</h6>
            <h6>Commorbidities:</h6>
            <hr>
            <h5>Vaccination Details</h5>
            <h6>Schedule:</h6>
            <h6>Vax Site:</h6>
            <h6>Vaccine:</h6>
            <h6>Lot No.:</h6>
            </div>
            <div class='col'>
            <h5>Pre-Vaccine Vitals:</h5>
            <h6>Pulse Rate:</h6><p>$prePulse</p>
            <h6>Temperature Rate:</h6><p>$preTemp</p>
            <h6>Blood Presuure Rate:</h6><p>$preBP</p>
            <hr>
            <h5>Post-Vaccine Vitals:</h5>
            <form>
            Pulse Rate: <input id='pulseR' type='text' placeholder='Beats Per Minute' name='vitals'>
            <br>
            Temperature: <input id='tempR' type='text' placeholder='in Celcius' name='vitals'>
            <br>
            <strong>Blood Pressure</strong>
            <br>
            Diastolic: <input id='bpRDias' type='text' placeholder='millimetres of mercury' name='vitals'>
            <br>
            Systolic: <input id='bpRSys' type='text' placeholder='millimetres of mercury' name='vitals'>
            </form>
            </div>
            </div>
            <div class='modal-footer'>
                <button onclick=btnViewPostVac('add') id='addButtonId' type='button' class='btn btn-success' value=$id> Add</button>
                <button onclick=btnViewPostVac('close') type='button' class='btn btn-danger'> Cancel</button>
             </div>
             </div>
             ";
        }
    }
}

if (isset($_POST['pulse'])) {
    require_once('../includes/configure.php');
    $pulseRR = $_POST['pulse'];
    $tempRR = $_POST['temp'];
    $bpDiastolic = $_POST['diastolic'];
    $bpSystolic = $_POST['systolic'];
    $id = $_POST['id'];
    $vital = $_POST['vital'];
    
    
    try {
        $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_2nd_dose = ?, post_vital_temp_rate_2nd_dose = ?, post_vital_bpDiastolic_2nd_dose = ?, post_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
        $stmtinsert = $database->prepare($query);
        $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
        
    } catch (Exception $th) {
        echo $th->getMessage();
    }

    echo'added';

}
    // function createQuery($id, $vital, $pulseRR, $tempRR, $bpDiastolic, $bpSystolic) {
    //     require_once('../includes/configure.php');
    //     $querySelect = "SELECT * FROM patient WHERE patient_id = ?";
    
    //     try {
    //         $stmtselect = $database->prepare($querySelect);
    //         $stmtselect->execute([$id]);
    //         $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
    //         if ($vital == "pre") {
    //             if ($row["first_dose_vaccination"] == '0') {
    //                 $query = ("UPDATE patient_vitals SET pre_vital_pulse_rate_1st_dose = ?, pre_vital_temp_rate_1st_dose = ?, pre_vital_bpDiastolic_1st_dose = ?, pre_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?");
    //                 $stmtinsert = $database->prepare($query);
    //                 $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
    //             } else if ($row["first_dose_vaccination"] == '1' && $row["second_dose_vaccination"] == '0') {
    //                 $query = ("UPDATE patient_vitals SET pre_vital_pulse_rate_2nd_dose = ?, pre_vital_temp_rate_2nd_dose = ?, pre_vital_bpDiastolic_2nd_dose = ?, pre_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
    //                 $stmtinsert = $database->prepare($query);
    //                 $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
    //             }
    //         } else {
    //             if ($row["first_dose_vacciantion"] == 1 && $row["second_dose_vaccination"] == 0) {                
    //                 $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_1st_dose = ?, post_vital_temp_rate_1st_dose = ?, post_vital_bpDiastolic_1st_dose = ?, post_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?");
    //                 $stmtinsert = $database->prepare($query);
    //                 $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
    //             } else {
    //                 $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_2nd_dose = ?, post_vital_temp_rate_2nd_dose = ?, post_vital_bpDiastolic_2nd_dose = ?, post_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
    //                 $stmtinsert = $database->prepare($query);
    //                 $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
    //             }
    //         }
    //     } catch (Exception $th) {
    //         echo $th->getMessage();
    //     }
    // }
