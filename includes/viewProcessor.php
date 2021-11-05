<?php
include ('../includes/database.php');

//View Vaccine
if (isset($_POST['viewVaccine'])) {
    $vacccineId = $_POST['viewVaccine'];
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
    <h4 class='ml-3'> $vaccine_name </h4>
    <div class='row'>
    <div class='col b'>
    <h7 class='ml-5 font-weight-bold'> Manufacturer </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_manufacturer </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Vaccine Type </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_type </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Efficacy </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_efficacy%</h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Date Stored </h7>
    </div>
    <div class='col'>
    <h7> $date_stored </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Expiration Date </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_expiration </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Life Span </h7>
    </div>
    <div class='col'>

    <h7> $vaccine_lifespan_in_months month/s </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Required </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_dosage_required doses </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Interval </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_dosage_interval days </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Total Quantity Vial </h7>
    </div>
    <div class='col'>
    <h7> $total_vaccine_vial_quantity </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Minimum Temperature  </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_minimum_temperature °C </h7>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Maximum Temperature </h7>
    </div>
    <div class='col'>
    <h7> $vaccine_maximum_temperature °C </h7>
    </div>
    </div>


    <br>
    <div class='row'>
    <h7 id='description' class='text-justify border border-secondary rounded mb-4'> <b> Description: </b> <br> $vaccine_description</h7>
    </div>
    </div>
    ";
}

?>