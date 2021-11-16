<?php
include ('../includes/database.php');

//edit vaccine details
if (isset($_POST['editVaccine'])) {
    $vacccineId = $_POST['editVaccine'];
    $query = "SELECT * FROM `vaccine_lot` JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_information ON vaccine_information.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.vaccine_lot_id = $vacccineId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($vaccine_lot_id, $vaccine_id, $employee_account_id, $date_stored, $source, $total_vaccine_vial_quantity, $vaccine_expiration, $archive, $vaccine_id, $vaccine_name, $vaccine_type, $vaccine_efficacy, $vaccine_lifespan_in_months, $vaccine_id, $vaccine_manufacturer, $vaccine_description, $vaccine_dosage_required, $vaccine_dosage_interval, $vaccine_minimum_temperature, $vaccine_maximum_temperature);
    $stmt->fetch();
    $stmt->close();

    echo "
    <div class='content-modal'>
    <div class='modal-header'>
        <h4 class='modal-title'> Vaccine Details </h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"viewVaccineDetails\")'>
            <i class='fas fa-window-close'></i>
        </button>
    </div>";

    echo "
    <div class='modal-body'>
    <div class='vacinneInfo'>
    <div class='row'>
    <div class='col-10'>
    <h3 class='ml-4'> $vaccine_name </h3>
    </div>
    </div>
    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Manufacturer </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value='$vaccine_manufacturer' class='w-75 mb-3'> 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Vaccine Type </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_type class='w-75 mb-3'> 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Efficacy </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_efficacy% class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Date Stored </h7>
    </div>
    <div class='col'>
    <input type='text'contenteditable='true' value=$date_stored class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Expiration Date </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_expiration class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Life Span (in months) </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_lifespan_in_months class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Interval (in months) </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_dosage_interval class='w-75 mb-3'>
    </div>
    </div>
    
    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Required </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_dosage_required class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Total Quantity Vial </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$total_vaccine_vial_quantity class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Minimum Temperature (°C) </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_minimum_temperature class='w-75 mb-3'>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Maximum Temperature (°C) </h7>
    </div>
    <div class='col'>
    <input type='text' contenteditable='true' value=$vaccine_maximum_temperature class='w-75 mb-3'>
    </div>
    </div>
    
    <br>
    
    <div class='row'>
    <div class='text-justify border border-secondary rounded mx-5 p-2 mb-3' style='overflow: auto;'>
    <textarea contenteditable='true'> $vaccine_description </textarea>
    </div>
    </div>
    </div>
    <div class='modal-footer'>
    <button type='button' class='btn btn-danger float-right' onclick='closeModal(\"viewVaccineDetails\")'>Cancel</button>
    <button type='button' class='btn btn-success float-right' onclick=''> Save </button>
    </div>
    ";
}

//edit date Deployment
if (isset($_POST['editDeployment'])) {
    $drive = $_POST['editDeployment'];

    require_once '../require/getVaccinationDrive.php';
    require_once '../require/getVaccine.php';
    require_once '../require/getVaccineDrive1.php';
    require_once '../require/getVaccinationSites.php';
    require_once '../require/getHealthDistrictDrives.php';
    require_once '../require/getHealthDistrict.php';

    foreach ($vaccination_drive as $vd) {
        if ($drive == $vd->getDriveId()) {
            $name = $vd->getDriveId();
            $first_dose_stubs = $vd->getFirstDoseStubs();
            $second_dose_stubs = $vd->getSecondDoseStubs();
            $siteId = $vd->getVaccDriveVaccSiteId();
            $date = $vd->getVaccDate();
        }
    }


    foreach ($vaccinationSites as $vs) {
        if ($vs->getVaccinationSiteId() == $siteId) {
            $siteName = $vs->getVaccinationSiteLocation();
        }
    }

    $healthDistricts = [];
    foreach ($healthDistrictDrives as $hdd) {
        if ($drive == $hdd->getDriveId()) {
            $healthDistricts[] = $hdd->getDistrictId();

        }
    }

    $distNames = [];
    foreach ($healthDistricts as $hd) {
        foreach ($health_district as $dist) {
            if ($hd == $dist->getHealthDistrictId()) {
                $distNames[] = $dist->getHealthDistrictName();
            }
        }
    }
    echo "
    <div class='content-modal'>
        <div class='modal-header'>
            <h4 class='modal-title'> Deployment Summary </h4>
            <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"editModal\")'>
                <i class='fas fa-window-close'></i>
            </button>
        </div>";

    echo "
        <div class='modal-body'>
            <div class='deploymentInfo'>
                <div class='row'>
                    <h4 class='ml-3'> Please edit Vaccination Date</h4>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h7 class='ml-5 font-weight-bold'> Vaccination Date </h7>
                    </div>
                    <div class='col' contenteditable='true'>
                        <input type='date' value='$date' class='w-75' style='outline-color:blue' id='editDate'>
                    </div>
                </div>
                <br>
                <div class='row'>
                    <h5 class='ml-3'> Deployment Details </h5>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h7 class='ml-5 font-weight-bold'> Vaccination Site </h7>
                    </div>
                    <div class='col'>
                       <h7> $siteName </h7>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <h7 class='ml-5 font-weight-bold'> Vaccination Brand/s </h7>
                    </div> 
                                        ";
    foreach ($vaccineDrive1 as $drive1) {
        if ($drive == $drive1->getDriveId()) {
            foreach ($vaccines as $vac) {
                if ($drive1->getVaccineId() == $vac->getVaccId()) {
                    $firstDbrand = $vac->getVaccName();

                    echo "
                    <div class='col'>
                        $firstDbrand
                    </div>
            </div>   
    ";
                }
            }
        }
    }

    echo "
            <div class='row'>
                <div class='col'>
                    <h7 class='font-weight-bold' style='margin-left: 12%'> Stub for First Dose </h7>
                </div>
                <div class='col'>
                    $first_dose_stubs
                </div>
            </div>
             <div class='row'>
                <div class='col'>
                    <h7 class='font-weight-bold' style='margin-left: 12%'> Stub for Second Dose </h7>
                </div>
                <div class='col'>
                   $second_dose_stubs
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <h7 class='font-weight-bold' style='margin-left: 12%'> Covered Health Districts </h7>
                </div>
                ";


    foreach ($distNames as $dn) {
        echo "  <div class='col'>
                    $dn
                </div>
         <!--End of deployment Info div-->
            </div> 
        <!--End of modal-body div-->
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-danger float-right' onclick='closeModal(\"editModal\")'>Cancel</button>
            <button type='button' class='btn btn-success float-right' onclick=''> Save </button>
        </div>
    </div>";
    }
}