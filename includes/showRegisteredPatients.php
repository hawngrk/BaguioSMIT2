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
            <td>$patientName</td>
            <td>$category</td>
            <td>$patientAddress</td>
            <td class='center'>$contactNum</td>
            <td class='center'> <button id='postVac' class='viewReportBtn buttonTransparent' onclick=''><i class='fas fa-eye'></i></td></td>
            </tr>";
}
?><?php
