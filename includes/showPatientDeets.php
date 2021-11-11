<?php
include("database.php");


$querySearch = 
"SELECT
    patient.patient_id,
    patient.patient_full_name,
    priority_groups.priority_group,
CONCAT(
    patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    )
AS full_address,
    patient_details.patient_contact_number
FROM 
    patient
JOIN 
    patient_details 
ON 
    patient.patient_id = patient_details.patient_id
JOIN
    barangay
ON 
    barangay.barangay_id = patient_details.barangay_id
JOIN
    priority_groups
ON
    priority_groups.priority_group_id = patient_details.priority_group_id;
";

$stmt = $database->stmt_init();
$stmt->prepare($querySearch);
$stmt->execute();
$stmt->bind_result($patientID, $patientName, $category, $patientAddress, $contactNum);

    while ($stmt->fetch()) {
        echo "<tr>
                <td class='columnName'>$patientID</td>
                <td class='columnName'>$patientName</td>
                <td class='columnName'>$category</td>
                <td class='columnName'>$patientAddress</td>
                <td class='columnName'>$contactNum</td>
                <td class='columnName'><button class='addVitals btn-success btn-sm' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button></td></td>
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