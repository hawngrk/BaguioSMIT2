<?php
header("Access-Control-Allow-Origin: *");
require_once("../../../includes/configure.php");
$username = $_POST['username'];
$password = $_POST['password'];

//Test variables
// $username = "patientGaviola";
// $password = "patient1";
// $username = "patientArtbog";
// $password = "patient1";

$query = "SELECT * FROM patient_account WHERE patient_username = ? LIMIT 1";

try {
    $stmtselect = $database->prepare($query);
    $stmtselect->execute([$username]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $hash = $row['patient_password'];
    if (password_verify($password, $hash)) {
        $credentials = getPatientDetails($row['patient_id']);
        $vaccineDetails = sortPatientVaccineDetails($row['patient_id']);
        $patientDetails = [];
        $patientDetails['patient_details'] = $credentials;
        $patientDetails['vaccine_details'] = $vaccineDetails;

        //var_dump($patientDetails);
        echo json_encode($patientDetails);
    } else {
        echo 'Invalid username or password';
    }
} catch(PDOException $e) {
    echo 'Caught exception: ' , $e->getMessage();
}

//Searches for patient credentials and returns
function getPatientDetails($id) {
    require("../../../includes/configure.php");
    $query = 
    "SELECT 
    patient.patient_id,
    patient.patient_full_name,
    patient.date_of_first_dosage,
    patient.date_of_second_dosage,
    patient.first_dose_vaccination,
    patient.second_dose_vaccination, 
    CONCAT(
        patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    ) AS full_address,
        priority_groups.priority_group
    FROM
        patient
        JOIN 
        patient_details 
    ON 
        patient_details.patient_id = $id

    JOIN
        barangay
    ON 
        barangay.barangay_id = patient_details.barangay_id
    JOIN
        priority_groups
    ON
        priority_groups.priority_group_id = patient_details.priority_group_id

    WHERE 
        patient.patient_id = $id";
    try {
        $stmtselect = $database->prepare($query);
        $stmtselect ->execute([$id]);
        $patientDetails[] = $stmtselect->fetch(PDO::FETCH_ASSOC);

        return $patientDetails;
    } catch (PDOException $e) {
        echo 'Error in get patient ID: ', $e->getMessage();
    }
}

//Fetches the vaccination details of a specific patient
function sortPatientVaccineDetails($patientID)
{
    require("../../../includes/configure.php");
    $query =
"SELECT
    patient_drive.vaccine_lot_id,
    vaccination_drive.vaccination_date,
    vaccination_sites.location,
    vaccine.vaccine_name
from 
    patient_drive
JOIN
    vaccine_lot
ON
    vaccine_lot.vaccine_lot_id = patient_drive.vaccine_lot_id
JOIN
    vaccination_drive
ON
    vaccination_drive.drive_id = patient_drive.drive_id 
JOIN
    vaccination_sites
ON
    vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id
JOIN
    vaccine
ON
    vaccine.vaccine_id = vaccine_lot.vaccine_id
WHERE
    patient_drive.patient_id = $patientID";
    
    $stmt = $database->prepare($query);
    $stmt->execute();
    $vaccineDetails = [];
    $row = $stmt->rowCount();
    while ($row != 0) {
        $row-=1;    
        $queriedVaccine = $stmt->fetch(PDO::FETCH_ASSOC);
        array_push($vaccineDetails, array('lotID' => $queriedVaccine['vaccine_lot_id'], 'vaccDate' => $queriedVaccine['vaccination_date'], 'location' => $queriedVaccine['location'], 'vaccName' => $queriedVaccine['vaccine_name']));
    }
    if (empty($vaccineDetails[0])) {
        $vaccineDetails[0] = "";
        $vaccineDetails[1] = "";
    }
    return $vaccineDetails;
}