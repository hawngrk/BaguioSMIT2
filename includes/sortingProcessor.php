<?php
include("../includes/database.php");


//sort
if (isset($_POST['sortPatient'])) {
    $querySort = '';
    $sort = $_POST['sortPatient'];
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

    if ($sort == 'Asc') {
        $querySort = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 ORDER BY patient_details.patient_last_name ASC;";
    } else if ($sort == 'Desc'){
        $querySort = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 ORDER BY patient_details.patient_last_name DESC;";
    } else {
        $querySort = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";
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

//sort screening patient
if (isset($_POST['sortScreeningPatient'])) {
    $querySort = '';
    $sort = $_POST['sortScreeningPatient'];
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

    if ($sort == 'Asc') {
        $querySort = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 ORDER BY patient_details.patient_last_name ASC;";
    } else if ($sort == 'Desc'){
        $querySort = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 ORDER BY patient_details.patient_last_name DESC;";
    } else {
        $querySort = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($patientID, $fullname, $category, $patientAddress, $contactNum);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td>$patientID</td>
                <td>$fullname</td>
                <td>$category</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                <td>
                <button class='addVitals btn-info btn-sm' type='submit' onclick='clickModalRow(1)'>Add Vitals</button>
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
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1 ORDER BY vaccine_lot.date_stored ASC;";
    } else if ($sort == 'dateDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1 ORDER BY vaccine_lot.date_stored DESC;";
    } else if ($sort == 'expirationAsc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1 ORDER BY vaccine_lot.vaccine_expiration ASC;";
    } else if ($sort == 'expirationDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1 ORDER BY vaccine_lot.vaccine_expiration DESC;";
    } else if ($sort == 'bottleQAsc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1 ORDER BY vaccine_lot.total_vaccine_vial_quantity ASC;";
    } else if ($sort == 'bottleQDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1 ORDER BY vaccine_lot.total_vaccine_vial_quantity DESC;";
    } else {
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived != 1";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccineName, $vaccineSource, $dateReceived, $expirationDate, $totalQuantity);

    while ($stmt->fetch()) {
        echo "<tr class='table-row tableCenterCont' onclick='showVaccine(this)'>
                            <td>$vaccineLotId</td>
                            <td>$vaccineName</td>
                            <td>$vaccineSource</td>
                            <td>$dateReceived</td>
                            <td>$expirationDate</td>
                            <td>$totalQuantity</td>
                            <td>
                                <div class='d-flex justify-content-center'>
                                      <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                                </div>
                            </td>
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
        $querySort = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived != 1 ORDER BY vaccination_drive.vaccination_date ASC;";
    } else if ($sort == 'Desc'){
        $querySort = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived != 1 ORDER BY vaccination_drive.vaccination_date DESC;";
    } else {
        $querySort = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived != 1;";
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
                                 <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDeployment(\"$driveId\", \"$vaccinationSite\", \"$date\")' style='float: right'><i class='far fa-edit'></i></button><br>
                            </div>
                        </td>

                      </tr>";
    }
}

//sort Report
if (isset($_POST['sortReport'])) {
    $querySort = '';
    $sort = $_POST['sortReport'];
    echo '
      <thead>
                        <tr class="tableCenterCont">
                            <th scope="col">Report ID</th>
                            <th scope="col">Name of Reporter</th>
                            <th scope="col">Date Reported</th>
                            <th scope="col">Report Verified</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
            ';

    if ($sort == 'nameAsc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.Archived != 1 ORDER BY patient_details.patient_last_name ASC;";
    } else if ($sort == 'nameDesc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.Archived != 1 ORDER BY patient_details.patient_last_name DESC;";
    } else if ($sort == 'dateAsc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.Archived != 1 ORDER BY report.date_reported ASC;";
    } else if ($sort == 'dateDesc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.Archived != 1 ORDER BY report.date_reported DESC;";
    } else{
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.Archived != 1;";

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
                                          <td>
                                          <div class='d-flex justify-content-center'>
                                          <button class='btn btn-sm bg-none' type='submit' value='$reportId' onclick='event.stopPropagation(); viewReport($reportId)'><i class='fas fa-eye'></i></button>
                                          <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $reportId)'><i class='fa fa-archive'></i></button>
                                          </div></td></tr>";
        }
    }
}
