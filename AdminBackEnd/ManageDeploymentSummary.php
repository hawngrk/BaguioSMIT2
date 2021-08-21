<?php
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
                        $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
                    } else if ($pd->getPatientSuffix() == null) {
                        $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
                    } else if ($pd->getPatientMName() == null) {
                        $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
                    } else {
                        $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
                    }

                    echo "<p>$name</p>";
                }
            }
        }
    }


}
