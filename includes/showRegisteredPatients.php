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
            <td><button id='postVac' class='viewReportBtn btn-success' type='submit' onclick=''>View Details</button></td></td>
            </tr>";
}
?><?php
