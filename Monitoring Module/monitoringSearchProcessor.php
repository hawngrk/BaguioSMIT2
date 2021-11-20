<?php
include("../includes/database.php");

if (isset($_POST['search'])) {
    $searchPatient = $_POST['search'];
    if ($searchPatient == "") {
        $querySearchPatient = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";
    } else {
        $querySearchPatient = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 AND patient_details.patient_id LIKE '$searchPatient%' OR barangay.barangay_name LIKE '$searchPatient%' OR patient_details.patient_first_name LIKE '$searchPatient%' OR patient_details.patient_last_name LIKE '$searchPatient%';";
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
    $stmt->prepare($querySearchPatient);
    $stmt->execute();
    $stmt->bind_result($patientID, $fullname, $category, $patientAddress, $contactNum);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td class='columnName'>$patientID</td>
                <td class='columnName'>$fullname</td>
                <td class='columnName'>$category</td>
                <td class='columnName'>$patientAddress</td>
                <td class='columnName'>$contactNum</td>
                <td class='columnName'>
                <button class='addVitals btn-success btn-sm' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button>
                </td>
                </tr>";
    }
}

if (isset($_POST['modalRes'])) {
    $patientID = $_POST['modalRes'];
    require('../includes/configure.php');

    $queryDetails = 
    "SELECT 
        patient.patient_full_name,
        patient.date_of_first_dosage,
        patient.date_of_second_dosage,
        patient.first_dose_vaccination,
        patient.second_dose_vaccination,
        patient_vitals.pre_vital_pulse_rate_1st_dose,
        patient_vitals.pre_vital_temp_rate_1st_dose,
        patient_vitals.pre_oxygen_saturation_1st_dose,
        patient_vitals.pre_vital_bpDiastolic_1st_dose,
        patient_vitals.pre_vital_bpSystolic_1st_dose,
        patient_vitals.pre_vital_pulse_rate_2nd_dose,
        patient_vitals.pre_vital_temp_rate_2nd_dose,
        patient_vitals.pre_oxygen_saturation_2nd_dose,
        patient_vitals.pre_vital_bpDiastolic_2nd_dose,
        patient_vitals.pre_vital_bpSystolic_2nd_dose,
    CONCAT(
        patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    ) AS full_address,
        priority_groups.priority_group
    FROM
        patient
    JOIN
        patient_vitals
    ON
        patient_vitals.patient_id = $patientID
    JOIN 
        patient_details 
    ON 
        patient_details.patient_id = $patientID
    JOIN
        barangay
    ON 
        barangay.barangay_id = patient_details.barangay_id
    JOIN
        priority_groups
    ON
        priority_groups.priority_group_id = patient_details.priority_group_id
    WHERE 
    	patient.patient_id = $patientID
    ";

    $stmtinsert = $database->prepare($queryDetails);
    $stmtinsert->execute();
    $patientDetails = $stmtinsert->fetch(PDO::FETCH_ASSOC);

    //Personal Information
    $fullName = $patientDetails['patient_full_name'];
    $fullAddress = $patientDetails['full_address'];
    $category = $patientDetails['priority_group'];

    //Pre vital information
    $pulseRate1st = trim($patientDetails['pre_vital_pulse_rate_1st_dose']) != "" ? $patientDetails['pre_vital_pulse_rate_1st_dose'] : 'N/A';
    $tempRate1st = trim($patientDetails['pre_vital_temp_rate_1st_dose']) != "" ? $patientDetails['pre_vital_temp_rate_1st_dose'] : 'N/A';
    $oxygen1st = trim($patientDetails['pre_oxygen_saturation_1st_dose']) != "" ? $patientDetails['pre_oxygen_saturation_1st_dose'] : 'N/A';
    $bloodPressure1st = trim($patientDetails['pre_vital_bpDiastolic_1st_dose']) != "" ? $patientDetails['pre_vital_bpDiastolic_1st_dose']."/".$patientDetails['pre_vital_bpSystolic_1st_dose'] : 'N/A';
    
    $pulseRate2nd = trim($patientDetails['pre_vital_pulse_rate_2nd_dose']) != "" ? $patientDetails['pre_vital_pulse_rate_2nd_dose'] : 'N/A';
    $tempRate2nd = trim($patientDetails['pre_vital_temp_rate_2nd_dose']) != "" ? $patientDetails['pre_vital_temp_rate_2nd_dose'] : 'N/A';
    $oxygen2nd = trim($patientDetails['pre_oxygen_saturation_2nd_dose']) != "" ? $patientDetails['pre_oxygen_saturation_2nd_dose'] : 'N/A';
    $bloodPressure2nd = trim($patientDetails['pre_vital_bpDiastolic_2nd_dose']) != "" ? $patientDetails['pre_vital_bpDiastolic_2nd_dose']."/".$patientDetails['pre_vital_bpSystolic_2nd_dose'] : 'N/A';

    $sortPatientVaccine = sortPatientVaccineDetails($patientID);
        
    //Vaccination Information
    $sched1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['vaccDate']: 'N/A';
    $site1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['location'] : 'N/A';
    $vaccineN1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['vaccName'] : 'N/A';
    $vaccineM1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['vaccManufacturer'] : '' ;
    $lot1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['lotID'] : 'N/A';

    $sched2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['vaccDate']: 'N/A';
    $site2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['location'] : 'N/A';
    $vaccineN2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['vaccName'] : 'N/A';
    $vaccineM2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['vaccManufacturer'] : '' ;
    $lot2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['lotID'] : 'N/A';

    $vaccineStatus = 'Not vaccinated';

    if($patientDetails['first_dose_vaccination'] == 1 && $patientDetails['second_dose_vaccination'] == 1) {
        $vaccineStatus = 'Fully vaccinated';
    } else if($patientDetails['first_dose_vaccination'] == 1 && $patientDetails['second_dose_vaccination'] == 0) {
        $vaccineStatus = 'Partially vaccinated';
    }


    echo "<h3>$fullName</h3>
    <hr>
    <div class='row'>
        <div class='col'>
            <h4>Address: </h4><p>$fullAddress<p>
            <hr>
            <h4>Category:</h4><p>$category</p>
            
        </div>
        <div class='col-md-6'>
            <h4>Pre-Vaccine Vitals:</h4>
            <div class='row'>
            <div class='col'>
            <h5>1st Dose vitals</h5>
            <h6>Pulse Rate:</h6><p>$pulseRate1st</p>
            <h6>Temperature Rate:</h6><p>$tempRate1st</p>
            <h6>Oxygen saturation:</h6><p>$oxygen1st</p>
            <h6>Blood Presure Rate:</h6><p>$bloodPressure1st</p>
            </div>
            <div class='col'>
            <h5>2nd Dose vitals</h5>
            <h6>Pulse Rate:</h6><p>$pulseRate2nd</p>
            <h6>Temperature Rate:</h6><p>$tempRate2nd</p>
            <h6>Oxygen saturation:</h6><p>$oxygen2nd</p>
            <h6>Blood Presure Rate:</h6><p>$bloodPressure2nd</p>
            </div>
            </div>
            <hr>
            <h4>Post-Vaccine Vitals:</h4>
            <form>
            <strong>Pulse Rate:</strong>
            <br><input class='textInp' id='pulseR' type='text' placeholder='Enter pulse rate' name='vitals'>
            <br>
            <strong>Temperature:</strong> <br> <input class='textInp' type='text' id='tempR' placeholder='Enter temperature' name='vitals'>
            <br>
            <strong>Oxygen Saturation:</strong> <br> <input class='textInp' type='text' id='oxygenSat' placeholder='Enter oxygen saturation' name='vitals'>
            <br>
            <br>
            <strong>Blood Pressure (Diastolic/Systolic e.g. 120/80)</strong>
            <br>
            <strong>Diastolic:</strong> <br><input class='textInp' type='text' placeholder='millimetres of mercury' id='bpRDias' name='vitals'>
            <br>
            <strong>Systolic:</strong> <br><input class='textInp' type='text' placeholder='millimetres of mercury' id='bpRSys' name='vitals'>
            </form>
        </div>
    </div>

    <div class='col'> 
    <br>

    <hr>
    <h4>Vaccination Details - $vaccineStatus</h4>
        <div class='row'>
            <div class='col'>
                <h5>1st dose vaccination</h5>
                <h6>Schedule:</h6>
                <p>$sched1st</p>
                <h6>Vax Site:</h6>
                <p>$site1st</p>
                <h6>Vaccine:</h6>
                <p>$vaccineN1st ($vaccineM1st)</p>
                <h6>Lot No.:</h6>
                <p>$lot1st</p>
            </div>

            <div class='col'>
                <h5>2nd dose vaccination</h5>
                <h6>Schedule:</h6>
                <p>$sched2nd</p>
                <h6>Vax Site:</h6>
                <p>$site2nd</p>
                <h6>Vaccine:</h6>
                <p>$vaccineN2nd ($vaccineM2nd)</p>
                <h6>Lot No.:</h6>
                <p>$lot2nd</p>
            </div>
        </div>
    </div>
    <div class='modal-footer'>
    <button onclick=closeModal('postVacView') type='button' class='btn btn-danger'> Cancel</button>            
    <button onclick=btnViewPostVac() id='addButtonId' type='button' class='btn btn-success' value=$patientID> Save</button>
    </div>
    </div>";
}

if (isset($_POST['pulse'])) {
    require_once('../includes/configure.php');
    $pulseRR = $_POST['pulse'];
    $tempRR = $_POST['temp'];
    $oxygen = $_POST['oxygen'];
    $bpDiastolic = $_POST['diastolic'];
    $bpSystolic = $_POST['systolic'];
    $id = $_POST['id'];

    //Log purposes
    $logMessage = "Added the following post vitals: Pulse rate ($pulseRR), Temperature rate = $tempRR, Oxygen saturation ($oxygen), Blood Pressure ($bpDiastolic/$bpSystolic) for patient ID: $id";

    try {
        $querySelect = "SELECT * FROM patient WHERE patient_id = ?";
        $stmtselect = $database->prepare($querySelect);
        $stmtselect->execute([$id]);
        $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

        if ($row['first_dose_vaccination'] == 1 && $row['second_dose_vaccination'] == 1) {
            $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_2nd_dose = ?, post_vital_temp_rate_2nd_dose = ?, post_oxygen_saturation_2nd_dose = ?, post_vital_bpDiastolic_2nd_dose = ?, post_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $oxygen, $bpDiastolic, $bpSystolic, $id]);
        } else {
            $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_1st_dose = ?, post_vital_temp_rate_1st_dose = ?, post_oxygen_saturation_1st_dose = ?, post_vital_bpDiastolic_1st_dose = ?, post_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $oxygen, $bpDiastolic, $bpSystolic, $id]);
        }
    } catch (Exception $th) {
        echo $th->getMessage();
    }
}

function sortPatientVaccineDetails($patientID) {
    require('../includes/database.php');
    $query = 
    "SELECT
    patient_drive.vaccine_lot_id,
    vaccination_drive.vaccination_date,
    vaccination_sites.location,
    vaccine.vaccine_name,
    vaccine_information.vaccine_manufacturer
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
JOIN
    vaccine_information
ON
    vaccine_information.vaccine_id = vaccine_lot.vaccine_id
WHERE
    patient_drive.patient_id = $patientID
    ";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($vaccine_lot_id, $vaccination_date, $location, $vaccine_name, $vaccine_manufacturer);

    $vaccineDetails = [];
    while($stmt->fetch()){
        array_push($vaccineDetails ,array('lotID' => $vaccine_lot_id, 'vaccDate' => $vaccination_date, 'location' => $location, 'vaccName' => $vaccine_name, 'vaccManufacturer' => $vaccine_manufacturer));
    }
    
    if (empty($vaccineDetails)) {
        $vaccineDetails[0] = "";
        $vaccineDetails[1] = "";
    }

    return $vaccineDetails;
}