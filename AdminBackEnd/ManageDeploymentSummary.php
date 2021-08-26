<?php

include_once "../includes/database.php";

if (isset($_POST['id'])) {
    $driverId = $_POST['id'];
    include '../includes/database.php';
    require_once '../require/getVaccinationDrive.php';
    require_once '../require/getHealthDistrict.php';
    require_once '../require/getPatientDrive.php';
    require_once '../require/getPatientDetails.php';
    require_once '../require/getVaccine.php';
    require_once '../require/getVaccineLot.php';
    require_once '../require/getVaccineBatch.php';
    require_once '../require/getVaccineDeployment.php';
    require_once '../require/getPatient.php';

    foreach ($vaccination_drive as $vd) {
        if ($vd->getDriveId() == $driverId) {
            $date = $vd->getVaccDate();
            foreach ($health_district as $hd) {
                if ($vd->getHealthDistId() == $hd->getHealthDistrictId()) {
                    $healthDistrict = $hd->getHealthDistrictName();
                }
            }
        }
    }

    foreach ($vaccineDeployment as $vDep) {
        if ($driverId == $vDep->getDeploymentDriveId()) {
            foreach ($vaccines as $vac) {
                if ($vDep->getDeploymentVaccId() == $vac->getVaccId()) {
                    $brand = $vac->getVaccName();
                }
            }
        }
    }

    $batches = [];
    $patientList =[];
    foreach ($patientDrives as $pd) {
        if ($pd->getPatientDriveDriveId() == $driverId) {
            $batches[] = $pd->getPatientDriveBatchId();
            $patientId = $pd->getPatientDrivePatientId();
            $patientList[] = $patientId;
        }
    }

    $patientListName =[];
    foreach ($patients as $p){
        foreach ($patientList as $pl){
        if($pl == $p->getPatientId()) {
            $name = $p-> getPatientFullName();
            $patientListName[] = $name;
            }
        }
    }


    foreach ($patient_details as $patD) {
        $p = $patD->getPatientDeetPatId();
        if ($patD->getPatientDeetPatId() == $patientId) {
            $category = $patD->getPriorityGroup();
            break;
        }
    }


    $vaccineLot = [];
    foreach ($vaccineBatches as $vb) {
        foreach ($batches as $batch) {
            if ($vb->getVaccBatchId() == $batch) {
                if (in_array($vb->getVaccBatchLotId(), $vaccineLot)) {

                } else {
                    $vaccineLot[] = $vb->getVaccBatchLotId();
                }
            }
        }
    }


    echo "
    <p><b>Health District:</b></p>
    <center><p>$healthDistrict</p></center>
    <p><b>Category Of Patient:</b></p>
    <center><p>$category</p></center>
    <p><b>Vaccine Lot/s:</b></p>";

    foreach ($vaccineLot as $vl) {
        echo "<center><p>$vl</p></center>";
    }

    echo "<p><b> Vaccine Batch / es:</b ></p >";

    foreach ($batches as $bt) {
        echo "<center><p >$bt</p ></center >";
    }

    echo "
    <p><b>Vaccine Brand:</b></p>
    <center><p>$brand</p></center>
    <p><b>Date:</b></p>
    <center><p>$date</p></center>
    
    <p><b>List Of Patients:</b></p>";

    foreach ($patientListName as $pln) {
        echo "<center><p >$pln</p ></center >";
    }

    echo "<button>View More</button>";
}

if (isset($_POST['district'])){
    $district = $_POST['district'];
    $category = $_POST['category'];
    $patient = [];
    include_once '../includes/database.php';

    require_once '../require/getPatientDetails.php';
    require_once '../require/getBarangay.php';

    $barangayList = [];
    foreach($barangays as $bar){
        if($bar->getBarangayHealthDistrictId() == $district){
            $barangayList[] = $bar->getBarangayName();
        }
    }

    foreach($patient_details as $pd){
        if ($pd->getPriorityGroup() == $category){
            foreach ($barangayList as $bl){
                if($pd->getBrgy() == $bl){
                    if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
                        $patient['id'] = $pd->getPatientDeetPatId();
                        $patient['name'] = $pd->getPatientLName() . ", " . $pd->getPatientFName();

                        echo json_encode($patient);
                    } else if ($pd->getPatientSuffix() == null) {
                        $patient['id'] = $pd->getPatientDeetPatId();
                        $patient['name'] =  $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();

                        echo json_encode($patient);
                    } else if ($pd->getPatientMName() == null) {
                        $patient['id'] = $pd->getPatientDeetPatId();
                        $patient['name'] =  $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();

                        echo json_encode($patient);
                    } else {
                        $patient['id'] = $pd->getPatientDeetPatId();
                        $patient['name'] =   $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();

                        echo json_encode($patient);
                    }

                }
            }
        }
    }
}

if (isset($_POST['brand'])){
    $patientIdList = $_POST['patientListId'];
    $district = $_POST['district'];
    $brand = $_POST['brand'];
    $lot = $_POST['lot'];
    $batch = $_POST['batch'];
    $date = $_POST['date'];
    $location = $_POST['location'];

    $query1 = "INSERT INTO vaccination_drive (health_district_id, vaccination_location, vaccination_date) VALUE ('$district', '$location', '$date');";
    $database->query($query1);

    $getDrive = "SELECT drive_id from vaccination_drive ORDER BY drive_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getDrive);
    $dbase->execute();
    $dbase->bind_result($driveId);
    $dbase->fetch();
    $dbase->close();

    $query2 = "INSERT INTO vaccine_deployment (drive_id, vaccine_id) VALUE ('$driveId', '$brand');";
    $database->query($query2);


    foreach ($patientIdList as $pil) {
        $query3 = "INSERT INTO patient_drive (patient_id, drive_id, vaccine_batch_id) VALUE ('$pil', '$driveId', '$batch');";
        $database->query($query3);
    }
}

if (isset($_POST['barangays'])) {
    $barangayList = $_POST['barangays'];
    $healthDistrictName = $_POST['healthDistrictName'];
    $contact = $_POST['number'];

    $query1 = "INSERT INTO health_district (health_district_name, hd_contact_number) VALUE ('$healthDistrictName', '$contact');";
    $database->query($query1);

    $getDistrict = "SELECT health_district_id from health_district ORDER BY health_district_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getDistrict);
    $dbase->execute();
    $dbase->bind_result($districtId);
    $dbase->fetch();
    $dbase->close();

    foreach ($barangayList as $bl) {
        $query2 = "UPDATE barangay SET health_district_id = '$districtId' where barangay_id = '$bl'";
        $database->query($query2);
    }
}
