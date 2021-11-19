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
        <h4 class='modal-title'> Vaccine Details - EDIT</h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"editVaccineDetails\"); openModal(\"viewVaccineDetails\")'>
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
    
    
    <div class='row'>
    <h7 class='ml-5 mb-1 font-weight-bold'>Vaccine Description</h7>
    <div class='text-justify rounded mx-5 p-2' style='width:100%; overflow: auto;'>
    <textarea contenteditable='true' style='width:100%; height: 30vh'> $vaccine_description </textarea>
    </div>
    </div>
    </div>
    <div class='modal-footer'>
    <button type='button' class='btn btn-danger float-right' onclick='closeModal(\"editVaccineDetails\"); openModal(\"viewVaccineDetails\")'>Cancel</button>
    <button type='button' class='btn btn-success float-right' onclick=''> Save </button>
    </div>
    ";
}

//edit date Deployment
if (isset($_POST['editDeployment'])) {
    require "../require/getVaccinationSites.php";
    $driveId = $_POST['editDeployment'];
    $location = $_POST['site'];
    $date = $_POST['date'];

    foreach ($vaccinationSites as $vs) {
        if ($vs->getVaccinationSiteLocation() == $location) {
            $locationId = $vs->getVaccinationSiteId();
        }
    }

    echo "
    <div class='content-modal'>
        <div class='modal-header'>
            <h4 class='modal-title'> Deployment Summary </h4>
            <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"editModal\")'>
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div class='modal-body'>
            <div class='deploymentInfo'>
                <div class='row'>
                    <h5 class='ml-3'> Edit the following information of the deployment</h5>
                </div>
                <br>
                <div class='row'>
                    <div class='col'>
                        <h6 class='ml-5 font-weight-bold'> Vaccination Date </h6>
                    </div>
                    <div class='col' contenteditable='true'>
                        <input type='date' value='$date' class='w-75' style='outline-color:blue' id='editDate'>
                    </div>
                </div>
                <br>
                <div class='row'>
                    <div class='col'>
                        <h6 class='ml-5 font-weight-bold'> Vaccination Site </h6>
                    </div>
                    <div class='col'>
                   <div class='form-group'>
                                        <select name='editSite' id='editSite' class='w-75'> 
                                        <option value=$locationId>$location</option>";
                                            require '../require/getVaccinationSites.php';
                                            foreach ($vaccinationSites as $vs) {
                                                if($vs->getVaccinationSiteId() != $locationId) {
                                                    $vacSite = $vs->getVaccinationSiteLocation();
                                                    $id = $vs->getVaccinationSiteId();
                                                    echo "<option value =$id>$vacSite</option>";
                                                }
                                            }

                                            echo"
                                        </select>
                                    </div>
                                    </div>
                </div>
                                     
        <div class='modal-footer'>
            <button type='button' class='btn btn-danger float-right' onclick='closeModal(\"editModal\")'>Cancel</button>
            <button type='button' class='btn btn-success float-right' onclick='edit(editDrive, $driveId)'> Save </button>
        </div>
    </div>";
}

if (isset($_POST['editedDate'])){
    $editedDrive = $_POST['editedDrive'];
    $newLoc = $_POST['editedSite'];
    $newDate = $_POST['editedDate'];

    $query = "UPDATE vaccination_drive SET vaccination_site_id =  $newLoc, vaccination_date = '$newDate' WHERE drive_id = $editedDrive ";
    $database->query($query);
}

if (isset($_POST['editedDistrict'])) {
    $districtId = $_POST['editedDistrict'];
    $name = $_POST['newDistName'];
    $contact = $_POST['newContact'];

    echo "
    <div class='content-modal'>
        <div class='modal-header'>
            <h4 class='modal-title'> Health District </h4>
            <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"editDistrictModal\")'>
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div class='modal-body'>
            <div class='deploymentInfo'>
                <div class='row'>
                    <h5 class='ml-3'> Edit the following information of a Health District</h5>
                </div>
                <div class='row'>
                 <div class='col mt-3'>
                        <h6 class='ml-5 font-weight-bold'> Health District Name </h6>
                    </div>
                    <div class='col mt-3' contenteditable='true'>
                        <input type='text' value='$name' class='w-75' id='editDistName'>
                    </div>
                 </div>
                <br>
                 <div class='row'>
                    <div class='col'>
                        <h6 class='ml-5 font-weight-bold'> Contact Number </h6>
                    </div>
                    <div class='col' contenteditable='true'>
                        <input type='text' value='$contact' class='w-75' style='outline-color:blue' id='editDistContact'>
                    </div>
                </div>                
            </div>
        </div>
                                     
        <div class='modal-footer'>
            <button type='button' class='btn btn-danger float-right' onclick='closeModalForms(\"editDistrictModal\",\"editHealthDistrictForm\")'> Cancel </button>
            <button type='submit' class='btn btn-success float-right' onclick='edit(editDist, $districtId)'> Save </button>
        </div>
    </div>";
}

if (isset($_POST['editedDistName'])) {
    $newName = $_POST['editedDistName'];
    $newContact = $_POST['editedDistContact'];
    $district = $_POST['editedDist'];

    $query = "UPDATE `health_district` SET `health_district_name`='$newName',`hd_contact_number`='$newContact' WHERE health_district_id = '$district'";
    $database->query($query);
}