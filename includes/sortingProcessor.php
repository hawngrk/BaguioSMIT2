<?php
include("../includes/database.php");


//sort
if (isset($_POST['sortPatient'])) {
    $querySort = '';
    $sort = $_POST['sortPatient'];
    echo "
      <thead>
            <tr class='tableCenterCont'>
                <th>Patient Id No.</th>
                <th>Patient Name</th>
                <th>Category</th>
                <th>Complete Address</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
            </thead>";

    if ($sort == 'Asc') {
        $querySort = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name ASC;";
    } else if ($sort == 'Desc'){
        $querySort = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name DESC;";
    } else {
        $querySort = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientName, $category, $patientAddress, $contactNum);

    while ($stmt->fetch()) {
        echo "<tr onclick='showPatient(this)' class='tableCenterCont'>
                <td>$patientId</td>
                <td>$patientName</td>
                <td>$category</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                <td>
                <div style='text-align: left;'>
                                <button class='buttonTransparent' onclick='event.stopPropagation();archive(1, clickArchive, $patientId)'><i class='fa fa-archive'></i></button>
                                <button type='button' class='viewReportBtn buttonTransparent' id='viewButton' onclick='viewPatient($patientId)'><i class='fas fa-eye'></i></button
                            </div>
</td>
                </tr>";
    }
}

//sort Vaccine
if (isset($_POST['sortVaccine'])) {
    $querySort = '';
    $sort = $_POST['sortVaccine'];
    echo "
      <thead>
            <tr class='tableCenterCont'>
              <th>Vaccine Lot ID</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Source</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Bottle Quantity</th>
                        <th>Action</th>
            </tr>
            </thead>";

    if ($sort == 'dateAsc') {
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.date_stored ASC;";
    } else if ($sort == 'dateDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.date_stored DESC;";
    } else if ($sort == 'expirationAsc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.vaccine_expiration ASC;";
    } else if ($sort == 'expirationDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.vaccine_expiration DESC;";
    } else if ($sort == 'bottleQAsc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.total_vaccine_vial_quantity ASC;";
    } else if ($sort == 'bottleQDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.total_vaccine_vial_quantity DESC;";
    } else {
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
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
                <td>   <div class='d-flex justify-content-center'>
                                      <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                                </div> </td>
                </tr>";
    }
}

//sort Deployment
if (isset($_POST['sortDeployment'])) {
    $querySort = '';
    $sort = $_POST['sortDeployment'];

    echo "
     <thead>
           <tr class='tableCenterCont'>
              <th>Drive Id</th>
              <th>Location</th>
              <th>Date</th>
              <th>Action</th>
           </tr>
     </thead>";

    if ($sort == 'Asc') {
        $querySort = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id ORDER BY vaccination_drive.vaccination_date ASC;";
    } else if ($sort == 'Desc'){
        $querySort = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id ORDER BY vaccination_drive.vaccination_date DESC;";
    } else {
        $querySort = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id;";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($driveId, $vaccinationSite, $date);
    while ($stmt->fetch()) {
        echo "<tr class='table-row tableCenterCont' onclick='showDrive(this)'>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                <button class='btn btn-sm bg-none' onclick=''><i class='far fa-edit'></i></button>
                           
                            </div>
                        </td>
             
                      </tr>";
    }
}

//sort Report
if (isset($_POST['sortReport'])) {
    $querySort = '';
    $sort = $_POST['sortReport'];
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

    if ($sort == 'nameAsc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name ASC;";
    } else if ($sort == 'nameDesc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name DESC;";
    } else if ($sort == 'dateAsc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY report.date_reported ASC;";
    } else if ($sort == 'dateDesc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY report.date_reported DESC;";
    } else{
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";

    }
    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported, $status);

    while ($stmt->fetch()) {
        if ($status != 'Invalidated') {
            foreach ($patients as $pat) {
                if ($patientId == $pat->getPatientId()) {
                    $reporter = $pat->getPatientFullName();
                }
            }
            echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                         
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td><button class='btn btn-success btn-sm' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td></tr>";
        }
    }
}
