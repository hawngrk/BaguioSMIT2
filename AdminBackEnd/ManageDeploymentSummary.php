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
    foreach ($patientDrives as $pd) {
        if ($pd->getPatientDriveDriveId() == $driverId) {
            $batches[] = $pd->getPatientDriveBatchId();
            $patientId = $pd->getPatientDrivePatientId();
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
    
    <button>View More</button>";
}
