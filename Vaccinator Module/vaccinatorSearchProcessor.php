<?php
if (isset($_POST['search'])) {
    include("../includes/database.php");
    $search = $_POST['search'];
    if ($search === "") {
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
                <td><button id='viewVac' class='viewReportBtn btn-success' type='submit' onclick='clickModalRow($patientID)'>View Info</button></td></td>
                </tr>";
    }
}

if (isset($_POST['viewPatientDetails'])) {
    $modalRes = $_POST['viewPatientDetails'];
    require('../require/getPatientDetails.php');
    require('../includes/configure.php');
    
    foreach ($patient_details as $ps) {
        if ($modalRes == $ps->getPatientDeetPatId()) {
            $id = $ps->getPatientDeetPatId();
            $FName = $ps->getpatientFName();
            $LName = $ps->getpatientLName();
            $FullAddress = $ps->getHouseAdd() . $ps->getBrgy() .  $ps->getCity() .  $ps->getProvince() .  $ps->getRegion();
            $category = $ps->getPriorityGroup();

            echo "<h4>$FName $LName</h4>
            <hr>
            <div class='row'>
            <div class='col'>
            <h6>Address: </h6><p>$FullAddress<p>
            <h6>Category:</h6><p>$category</p>
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
            <div class='col'>
            <h5>Pre-Vaccine Vital</h5>
            <h6>Pulse Rate:</h6>
            <br>
            <h6>Temperature Rate:</h6>
            <br>
            <h6>Blood Pressure Rate:</h6>
            </div>
            </div>
            <div class='modal-footer'>
            <button onclick=btnViewPostVac('close') type='button' class='btn btn-danger'> Close</button>
            </div>
            </div>
            ";
        }
    }
}
