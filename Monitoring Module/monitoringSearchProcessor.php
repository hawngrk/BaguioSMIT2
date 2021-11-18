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
                <td><button id='postVac' class='btn-success' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button></td></td>
                </tr>";
    }
}

if (isset($_POST['modalRes'])) {
    $modalRes = $_POST['modalRes'];
    require('../includes/configure.php');

    $queryDetails = 
    "SELECT 
        patient_details.patient_first_name,
        patient_details.patient_last_name,
    CONCAT(
        patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    ) AS full_address,
        priority_groups.priority_group,
        patient_vitals.pre_vital_pulse_rate_1st_dose,
        patient_vitals.pre_vital_temp_rate_1st_dose,
        patient_vitals.pre_vital_bpDiastolic_1st_dose,
        patient_vitals.pre_vital_bpSystolic_1st_dose
    FROM
        patient
    JOIN 
        patient_details 
    ON 
        patient_details.patient_id = $modalRes
    JOIN
        barangay
    ON 
        barangay.barangay_id = patient_details.barangay_id
    JOIN
        priority_groups
    ON
        priority_groups.priority_group_id = patient_details.priority_group_id
    JOIN
        patient_vitals
    ON 
        patient_vitals.patient_id = $modalRes;
    WHERE 
    	patient.patient_id = $modalRes
    ";

    $stmtinsert = $database->prepare($queryDetails);
    $stmtinsert->execute();
    $patientDetails = $stmtinsert->fetch(PDO::FETCH_ASSOC);

    $id = $modalRes;
    $fullName = $patientDetails['patient_last_name'].', '.$patientDetails['patient_first_name'];
    $fullAddress = $patientDetails['full_address'];
    $category = $patientDetails['priority_group'];
    $prePulse = $patientDetails['pre_vital_pulse_rate_1st_dose'];
    $preTemp = $patientDetails['pre_vital_temp_rate_1st_dose'];
    $preBP = $patientDetails['pre_vital_bpDiastolic_1st_dose']."/".$patientDetails['pre_vital_bpSystolic_1st_dose'];

    echo "<h3>$fullName</h3>
    <hr>
    <div class='row'>
    <div class='col'>
    <h4>Address: </h4><p>$fullAddress<p>
    <hr>
    <h4>Category:</h4><p>$category</p>
    <hr>
    <h4>Medical Background</h4>
    <h6>Allergies:</h6>
    <p>*Allergies Here*</p>
    <h6>Commorbidities:</h6>
    <p>*Commorbidities Here*</p>
    <hr>
    <h4>Vaccination Details</h4>
    <h6>Schedule:</h6>
    <p>*Sample Sched*</p>
    <h6>Vax Site:</h6>
    <p>*Sample VaxSite*</p>
    <h6>Vaccine:</h6>
    <p>*Sample Vax*</p>
    <h6>Lot No.:</h6>
    <p>*Sample Lot No*</p>
    </div>
    <div class='col-md-6'>
    <h4>Pre-Vaccine Vitals:</h4>
    <h6>Pulse Rate:</h6><p>$prePulse</p>
    <h6>Temperature Rate:</h6><p>$preTemp</p>
    <h6>Blood Presure Rate:</h6><p>$preBP</p>
    <hr>
    <h4>Post-Vaccine Vitals:</h4>
    <form>
    <strong>Pulse Rate:</strong> <br><input id='pulseR' type='text' placeholder='Beats Per Minute' name='vitals'>
    <br>
    <strong>Temperature:</strong> <br><input id='tempR' type='text' placeholder='in Celcius' name='vitals'>
    <br>
    <br>
    
    <strong>Blood Pressure</strong>
    <br>
    Diastolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    <br>
    Systolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    </form>
    </div>
    </div>
    <div class='modal-footer'>
        <button onclick=closeModal('qrView') type='button' class='btn btn-danger'> Cancel</button>
        <button onlcick=btnViewPostVac('ad') type='button' class='btn btn-success'> Add</button>
        </div>
        </div>
        ";
}

if (isset($_POST['pulse'])) {
    require_once('../includes/configure.php');
    $pulseRR = $_POST['pulse'];
    $tempRR = $_POST['temp'];
    $bpR = $_POST['bp'];

    $queryInsert = "UPDATE patient SET 1st_dosage_pulse = ?, 1st_dosage_temp = ?, 1st_dosage_bpR = ? WHERE patient_id = ?";

    $stmtinsert = $database->prepare($queryInsert);
    $stmtinsert->execute([$pulseRR, $tempRR, $bpR]);
}

if (isset($_POST['patientId'])) {
        $patId = $_POST['patientId'];

    $query = "SELECT patient.patient_full_name, patient_details.patient_gender, patient_details.patient_contact_number, patient_details.patient_age, priority_groups.priority_group, patient.date_of_first_dosage, patient.date_of_second_dosage, patient.first_dose_vaccination, patient.second_dose_vaccination FROM patient_details JOIN patient on patient_details.patient_id = patient.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE patient_details.patient_id = $patId;";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name, $gender, $contact, $age, $group, $fDate, $sDate, $first, $second);
    $stmt->fetch();
    $stmt->close();



    echo "<h3>$fullName</h3>
    <hr>
    <div class='row'>
    <div class='col'>
    <h4>Address: </h4><p>$fullAddress<p>
    <hr>
    <h4>Category:</h4><p>$category</p>
    <hr>
    <h4>Medical Background</h4>
    <h6>Allergies:</h6>
    <p>*Allergies Here*</p>
    <h6>Commorbidities:</h6>
    <p>*Commorbidities Here*</p>
    <hr>
    <h4>Vaccination Details</h4>
    <h6>Schedule:</h6>
    <p>*Sample Sched*</p>
    <h6>Vax Site:</h6>
    <p>*Sample VaxSite*</p>
    <h6>Vaccine:</h6>
    <p>*Sample Vax*</p>
    <h6>Lot No.:</h6>
    <p>*Sample Lot No*</p>
    </div>
    <div class='col-md-6'>
    <h4>Pre-Vaccine Vitals:</h4>
    <h6>Pulse Rate:</h6><p>$prePulse</p>
    <h6>Temperature Rate:</h6><p>$preTemp</p>
    <h6>Blood Presure Rate:</h6><p>$preBP</p>
    <hr>
    <h4>Post-Vaccine Vitals:</h4>
    <form>
    <strong>Pulse Rate:</strong> <br><input id='pulseR' type='text' placeholder='Beats Per Minute' name='vitals'>
    <br>
    <strong>Temperature:</strong> <br><input id='tempR' type='text' placeholder='in Celcius' name='vitals'>
    <br>
    <br>
    
    <strong>Blood Pressure</strong>
    <br>
    Diastolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    <br>
    Systolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    </form>
    </div>
    </div>
    <div class='modal-footer'>
        <button onclick=closeModal('postVacView') type='button' class='btn btn-danger'> Cancel</button>
        <button onlcick=btnViewPostVac('ad') type='button' class='btn btn-success'> Add</button>
        </div>
        </div>
        ";
//
//        if ($first == 0){
//            echo "Pending </h5><br>";
//        } else {
//            echo "Vaccinated </h5></br>";
//        }
//
//        echo"<h5>First Dose Vaccination Date: $fDate</h5><br><br>
//                     <h5>Second Dose: ";
//        if ($second == 0){
//            echo "Pending </h5><br>";
//        } else {
//            echo "Vaccinated </h5></br>";
//        }
//
//        echo"<h5>Second Dose Vaccination Date: $sDate</h5><br>
//            </div>
//            <div class='modal-footer'>
//            <button id='postVac' class='btn btn-success' type='submit' style='width: 20%; float: right'>Add Post Vitals</button>
//            </div>";



}

if (isset($_POST['passport'])){
    require_once ('../require/getPatientDetails.php');
    require_once ('../require/getPatient.php');

    $passport = $_POST['passport'];

    foreach ($patient_details as $patient){
        if($patient->getPatientDeetPatId() == $passport){
            $group = $patient->getPriorityGroup();
            $age = $patient->getAge();
            $gender = $patient->getGender();
            $contact = $patient->getContact();
        }
    }

    foreach ($patients as $pat){
        if ($pat->getPatientId() == $passport){
            $name = $pat->getPatientFullName();
            $fDate = $pat->getFirstDosageDate();
            $sDate = $pat->getSecondDosageDate();
            $first = $pat->getFirstDosage();
            $second = $pat->getSecondDosage();
        }
    }

    echo "      
                <h3> $fullName </h3>
                <hr>
                <div class='row'>
                <div class='col'>
                <h4>Address: </h4><p>$fullAddress<p>
                <hr>
                <h4>Category:</h4><p>$category</p>
                <hr>
                <h4>Medical Background</h4>
                <h6>Allergies:</h6>
                <p>*Allergies Here*</p>
                <h6>Commorbidities:</h6>
                <p>*Commorbidities Here*</p>
                <hr>
                <h4>Vaccination Details</h4>
                <h6>Schedule:</h6>
                <p>*Sample Sched*</p>
                <h6>Vax Site:</h6>
                <p>*Sample VaxSite*</p>
                <h6>Vaccine:</h6>
                <p>*Sample Vax*</p>
                <h6>Lot No.:</h6>
                <p>*Sample Lot No*</p>
                </div>
                <div class='col'>
                
                <h4>Pre-Vaccine Vitals:</h4>
    <h6>Pulse Rate:</h6><p>$prePulse</p>
    <h6>Temperature Rate:</h6><p>$preTemp</p>
    <h6>Blood Presure Rate:</h6><p>$preBP</p>
    <hr>
    <h4>Post-Vaccine Vitals:</h4>
    <form>
    <strong>Pulse Rate:</strong> <br><input id='pulseR' type='text' placeholder='Beats Per Minute' name='vitals'>
    <br>
    <strong>Temperature:</strong> <br><input id='tempR' type='text' placeholder='in Celcius' name='vitals'>
    <br>
    <br>
    
    <strong>Blood Pressure</strong>
    <br>
    Diastolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    <br>
    Systolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    </form>
    </div>
    </div>
    <div class='modal-footer'>
        <button onclick=closeModal('postVacView') type='button' class='btn btn-danger'> Cancel</button>
        <button onlcick=btnViewPostVac('add') type='button' class='btn btn-success'> Add</button>
        </div> 
        </div>";

//
//                <h5>First Dose:

//    if ($first == 0){
//        echo "Not Vaccinated </h5><br>";
//    } else {
//        echo "Vaccinated </h5></br>";
//    }
//
//    echo"<h5>First Dose Vaccination Date: $fDate</h5><br><br>
//                     <h5>Second Dose: ";
//    if ($second == 0){
//        echo "Not Vaccinated </h5><br>";
//    } else {
//        echo "Vaccinated </h5></br>";
//    }
//
//    echo"<h5>Second Dose Vaccination Date: $sDate</h5><br>
//                     <button id='postVac' class='btn-success' type='submit' style='width: 20%; float: right'>Add Post Vitals</button>";

}
