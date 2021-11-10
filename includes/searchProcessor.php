<?php
include("../includes/database.php");


//search for patients
if (isset($_POST['searchPatient'])) {
    $searchPatient = $_POST['searchPatient'];
    if ($searchPatient == "") {
        $querySearchPatient = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";
    } else {
        $querySearchPatient = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 AND patient_details.patient_id LIKE '$searchPatient%' OR barangay.barangay_name LIKE '$searchPatient%' OR patient_details.patient_first_name LIKE '$searchPatient%' OR patient_details.patient_last_name LIKE '$searchPatient%';";
    }

    echo '
    <table class="table table table-hover tablePatient" id="patientTable1">
                    <thead>
                    <tr class="tableCenterCont">
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Category</th>
                        <th>Complete Address</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>';


    $stmt = $database->stmt_init();
    $stmt->prepare($querySearchPatient);
    $stmt->execute();
    $stmt->bind_result($patientId, $fullname, $category, $patientAddress, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr onclick='showPatient(this)' class='tableCenterCont'>
                                <td>$patientId</td>
                                <td>$fullname</td>
                                <td>$category</td>
                                <td>$patientAddress</td>
                                <td>$contactNum</td>
                                <td>
                                    <div class ='d-flex justify-content-center'>
                                        <button class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $patientId)'><i class='fa fa-archive'></i></button>
                                        <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewPatient($patientId)'><i class='fas fa-eye'></i></button
                                    </div>
                                </td>
                            </tr>";
    }
    echo'
                </table>';
}

//search for vaccines
if (isset($_POST['searchVaccine'])) {
    $search = $_POST['searchVaccine'];
    if ($search == "") {
        $querySearch = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id;";
    } else {
        $querySearch = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.vaccine_lot_id LIKE '$search%' OR vaccine.vaccine_name LIKE '$search%';";
    }

    echo "
     <thead>
            <tr class='tableCenterCont'>
                <th>Vaccine Lot ID</th>
                <th>Vaccine Name</th>
                <th>Vaccine Source</th>
                <th>Date Received</th>
                <th>Expiration Date</th>
                <th>Batch Quantity</th>
                <th>Action</th>
            </tr>
     </thead>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccineName, $vaccineSource, $dateReceived, $expirationDate, $totalQuantity);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont' onclick='showVaccine(this)'>
                <td>$vaccineLotId</td>
                <td>$vaccineName</td>
                <td>$vaccineSource</td>
                <td>$dateReceived</td>
                <td>$expirationDate</td>
                <td>$totalQuantity</td>
                <td>   <div>
                                      <button type='button' class='buttonTransparent actionButt' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='viewReportBtn buttonTransparent actionButt' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                                </div> </td>
                </tr>";
    }
}

//search for deployment
if (isset($_POST['searchDeployment'])) {
    $search = $_POST['searchDeployment'];
    if ($search == "") {
        $querySearch = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id;";
    } else {
        $querySearch = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.drive_id LIKE '$search%';";
    }

    echo "
     <thead>
           <tr class='tableCenterCont'>
              <th>Drive Id</th>
              <th>Location</th>
              <th>Date</th>
              <th>Action</th>
           </tr>
     </thead>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($driveId, $vaccinationSite, $date);
    while ($stmt->fetch()) {
        echo "<tr class='table-row tableCenterCont' onclick='showDrive(this)'>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div>
                                <button class='buttonTransparent actionButt' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                <button class='buttonTransparent actionButt' onclick=''><i class='far fa-edit'></i></button>
                           
                            </div>
                        </td>
             
                      </tr>";
    }
}

//search for reports
if (isset($_POST['searchReport'])) {
    $search = $_POST['searchReport'];
    echo "
      <thead>
            <tr class='tableCenterCont'>
                <th>Report ID</th>
                <th>Name of Reporter</th>
                <th>Date Reported</th>
                <th>Report Verified</th>
                <th>Action</th>
            </tr>
            </thead>
            ";
    if (empty($search)) {
        $querySearch = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_id LIKE '$search%' OR patient_details.patient_last_name LIKE '$search%' OR patient_details.patient_first_name LIKE '$search%' OR patient_details.patient_middle_name LIKE '$search%';";
    }
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported, $status);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='btn btn-success btn-sm' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }
}