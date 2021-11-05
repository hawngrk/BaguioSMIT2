<?php
include("../includes/database.php");

//filter for patient
if (isset($_POST['filterPatient'])) {
    $filter = $_POST['filterPatient'];
    $queryFilter = '';
    echo "
      <thead>
            <tr class='tableCenterCont'>
                <th scope='col'>Patient Id No.</th>
                <th scope='col'>Patient Name</th>
                <th scope='col'>Category</th>
                <th scope='col'>Complete Address</th>
                <th scope='col'>Contact Number</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";

    $temp = "";
    if ($filter == 'All') {
        $queryFilter = "SELECT patient.patient_id, patient.patient_full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id = barangay.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id;";
    } else {
        $queryFilter = "SELECT patient.patient_id, patient.patient_full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id = barangay.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE priority_groups.priority_group LIKE '$filter%';";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
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


//filter for vaccine
if (isset($_POST['filterVaccine'])) {
    $filter = $_POST['filterVaccine'];
    $queryFilter = '';
    echo "
      <thead>
            <tr class='tableCenterCont'>
                <th scope='col'>Vaccine Lot ID</th>
                <th scope='col'>Vaccine Name</th>
                <th scope='col'>Vaccine Source</th>
                <th scope='col'>Date Received</th>
                <th scope='col'>Expiration Date</th>
                <th scope='col'>Bottle Quantity</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";


    $temp = '';
    if ($filter == 'All') {
        $queryFilter = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source,vaccine_lot.date_stored, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id;";
    } else {
        $queryFilter = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source,vaccine_lot.date_stored, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.source LIKE '$filter%';";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccName, $vaccineSource,$dateStored, $vaccExp, $batchQty, $vaccQty);

    while ($stmt->fetch()) {
        echo "<tr class='table-row tableCenterCont' onclick='showVaccine(this)'>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$vaccineSource</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$vaccQty</td>
                <td>   
                <div class='d-flex justify-content-center'>
                   <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                   <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='event.stopPropagation();viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                </div> 
                </td>
                </tr>";
    }
}

//filter for deployment
if (isset($_POST['filterDeployment'])) {
    $filter = $_POST['filterDeployment'];
    $queryFilter = '';

    echo "
     <thead>
           <tr class='tableCenterCont'>
              <th>Drive Id</th>
              <th>Location</th>
              <th>Date</th>
              <th>Action</th>
           </tr>
     </thead>";

    $temp = "";
    if ($filter == 'All') {
        $queryFilter = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id;";
    } else {
        $queryFilter = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_sites.location = '$filter';";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
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

//filter report
if (isset($_POST['filterReport'])) {
    $filter = $_POST['filterReport'];
    $queryFilter = '';
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

    if ($filter == 'All') {
        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status LIKE '$filter%';";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
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