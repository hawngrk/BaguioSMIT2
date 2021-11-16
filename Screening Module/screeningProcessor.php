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
            <tr class='tableCenterCont'>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Category</th>
                <th>Complete Address</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
            </thead>";
            
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientID, $patientName, $category, $patientAddress, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td>$patientID</td>
                <td>$patientName</td>
                <td>$category</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                <td><button id='postVac' class='viewReportBtn btn-success' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button></td></td>
                </tr>";
    }
}

//filter
if (isset($_POST['filter'])) {
    echo "passed";
}

if (isset($_POST['modalScreening'])) {
    $modalRes = $_POST['modalScreening'];
    require('../includes/configure.php');
    
    $queryDetails = 
    "SELECT 
        patient_details.patient_first_name,
        patient_details.patient_last_name,
    CONCAT(
        patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    ) AS full_address,
        priority_groups.priority_group
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

    echo "<h3>$fullName</h3>
    <hr>
    <div class='row'>
    <div class='col'>
        <h5>Address: </h5> <p>$fullAddress<p>
        <hr>
        <h5>Category:</h5><p>$category</p>
        <hr>
        <h5>Medical Background</h5>
        <h6>Allergies:</h6>
        <h6>Commorbidities::</h6>
        <hr>
        <h5>Vaccination Details</h5>
        <h6>Schedule:</h6>
        <h6>Vax Site:</h6>
        <h6>Vaccine:</h6>
        <h6>Lot No.:</h6>
        <hr>
    </div>
    <div class='col-md-6'>
    <h5>Pre-Vaccine Vitals:</h5>
    <form>
    Pulse Rate: <br><input class='textInp'type='text' placeholder='Beats Per Minute' name='vitals'>
    <br>
    Temperature: <br> <input class='textInp' type='text' placeholder='in Celcius' name='vitals'>
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
    <button onclick=btnViewPostVac('close') type='button' class='btn btn-danger'> Cancel</button>            
    <button onclick=btnViewPostVac('add') id='addButtonId' type='button' class='btn btn-success' value=$id> Add</button>
    </div>
    </div>
    ";
}
    


if (isset($_POST['pulse'])) {
    require_once('../includes/configure.php');
    $pulseRR = $_POST['pulse'];
    $tempRR = $_POST['temp'];
    $bpDiastolic = $_POST['diastolic'];
    $bpSystolic = $_POST['systolic'];
    $id = $_POST['id'];

    try {
        $querySelect = "SELECT * FROM patient WHERE patient_id = ?";
        $stmtselect = $database->prepare($querySelect);
        $stmtselect->execute([$id]);
        $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

        if ($row['first_dose_vaccination'] == 1 && $row['second_dose_vaccination'] == 0) {
            $query = ("UPDATE patient_vitals SET pre_vital_pulse_rate_2nd_dose = ?, pre_vital_temp_rate_2nd_dose = ?, pre_vital_bpDiastolic_2nd_dose = ?, pre_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
        } else {
            $query = ("UPDATE patient_vitals SET pre_vital_pulse_rate_1st_dose = ?, pre_vital_temp_rate_1st_dose = ?, pre_vital_bpDiastolic_1st_dose = ?, pre_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
        }
    } catch (Exception $th) {
        echo $th->getMessage();
    }
    echo 'added';
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


    echo "      
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'>
               
                <hr>
                <h2>PATIENT PROFILE</h2>
                <hr><br>
                <h5>Full Name: $name</h5><br>
                <h5>Gender: $gender</h5><br>
                <h5>Age: $age</h5><br>
                <h5>Contact Number: $contact</h5><br>
                
                <hr>
                <h2>VACCINATION SUMMARY</h2>
                <hr><br>
                
                <h5>Priority Group: $group</h5><br>
           
                 
                <h5>First Dose: ";

    if ($first == 0){
        echo "Pending </h5><br>";
    } else {
        echo "Vaccinated </h5></br>";
    }

    echo"<h5>First Dose Vaccination Date: $fDate</h5><br><br>
                     <h5>Second Dose: ";
    if ($second == 0){
        echo "Pending </h5><br>";
    } else {
        echo "Vaccinated </h5></br>";
    }

    echo"<h5>Second Dose Vaccination Date: $sDate</h5><br>
                     <button id='postVac' class='btn-success' type='submit' style='width: 20%; float: right'>Add Pre Vitals</button>";

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
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'>
               
                <hr>
                <h2>PATIENT PROFILE</h2>
                <hr><br>
                <h5>Full Name: $name</h5><br>
                <h5>Gender: $gender</h5><br>
                <h5>Age: $age</h5><br>
                <h5>Contact Number: $contact</h5><br>
                
                <hr>
                <h2>VACCINATION SUMMARY</h2>
                <hr><br>
                
                <h5>Priority Group: $group</h5><br>
              
                 
                <h5>First Dose: ";

    if ($first == 0){
        echo "Not Vaccinated </h5><br>";
    } else {
        echo "Vaccinated </h5></br>";
    }

    echo"<h5>First Dose Vaccination Date: $fDate</h5><br><br>
                     <h5>Second Dose: ";
    if ($second == 0){
        echo "Not Vaccinated </h5><br>";
    } else {
        echo "Vaccinated </h5></br>";
    }

    echo"<h5>Second Dose Vaccination Date: $sDate</h5><br>
                     <button id='postVac' class='btn-success' type='submit' style='width: 20%; float: right'>Add Pre Vitals</button>";

}
