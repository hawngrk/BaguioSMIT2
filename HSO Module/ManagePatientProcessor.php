<?php
if (isset($_POST['search'])) {
    include("../includes/database.php");
    $search = $_POST['search'];
    if ($search === "") {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
    }
    echo "
    <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Patient ID</th>
                <th scope='col'>Patient Name</th>
                <th scope='col'>Complete Address</th>
                <th scope='col'>Contact Number</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";

    $count = 1;
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientName, $patientAddress, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr>
                <td>$count</td>
                <td>$patientId</td>
                <td>$patientName</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                </tr>";
        $count++;
    }
}