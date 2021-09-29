<?php
include("database.php");

$querySearch = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";

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
// require_once '../require/getPatientDetails.php';
// require_once '../require/getPatient.php';
               
//                 foreach ($patient_details as $pd) {
//                     $id = $pd->getPatientDeetPatId();
//                     $name = $pd->getPatientFName()." ".$pd->getPatientMName()." ".$pd->getPatientLName()." ".$pd->getPatientSuffix();
//                     $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
//                     $contact = $pd->getContact();
//                     $category = $pd->getPriorityGroup();
                    
//                     // if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
//                     //     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
//                     // } else if ($pd->getPatientSuffix() == null) {
//                     //     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
//                     // } else if ($pd->getPatientMName() == null) {
//                     //     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
//                     // } else {
//                     //     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
//                     // }
                
//                 echo "<tr>
//                 <td>$id</td>
//                 <td>$name</td>
//                 <td>$category</td>
//                 <td>$fullAddress</td>
//                 <td>$contact</td>
//                 <td><button id='postVac' class='viewReportBtn btn-success' type='submit' onclick='clickModalRow($i)'>Add Vitals</button></td></td>
//                 </tr>";
//                 }
                ?>
