<?php
include("../includes/database.php");
require_once '../require/getVaccine.php';
require_once '../require/getVaccineBatch.php';
require_once '../require/getVaccineLot.php';

if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
    $queryFilter = '';
    echo "
      <thead >
            <tr class='tableCenterCont'>
                <th scope='col'>Vaccine Lot ID</th>
                <th scope='col'>Vaccine Name</th>
                <th scope='col'>Vaccine Source</th>
                <th scope='col'>Date Received</th>
                <th scope='col'>Date Expiration</th>
                <th scope='col'>Bottle Quantity</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";


    $temp = '';
    if ($filter == 'None') {
        $queryFilter = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source,vaccine_lot.date_stored, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id;";
    } else {
        $queryFilter = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source,vaccine_lot.date_stored, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.source LIKE '$filter%';";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccName, $vaccineSource,$dateStored, $vaccExp, $batchQty, $vaccQty);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont' onclick='showVaccine(this)'>
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

// return vaccine batch
if (isset($_POST['batch'])) {
    $batchNo = (int)$_POST['batch'];
    $counter = 1;
    echo "<table>
<tr>
<th>Batch No.</th>
<th>Vaccine Quantity</th>
<th>Date Manufactured</th>
<th>Date of Expiration</th>
</tr>";
    while ($counter <= $batchNo) {
        echo "<tr>
        <td><p>0$counter</p></td>
        <td><input class='vaccineName col-lg-12' type='input' name='batchVacQty[]'></td>
        <td><input type='date' name='batchDateManu[]'></td>
        <td><input type='date' name='batchDateExp[]'></td>
        </tr>";
        $counter++;
    }
    echo "</table>";
}

//Sort Vaccine
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
    $querySort = '';
    echo "
       <thead>
            <tr class='tableCenterCont'>
                <th scope='col'>Vaccine Lot ID</th>
                <th scope='col'>Vaccine Name</th>
                <th scope='col'>Vaccine Source</th>
                <th scope='col'>Date Received</th>
                <th scope='col'>Date Expiration</th>
                <th scope='col'>Bottle Quantity</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";

    if ($sort == 'expirationAsc') {
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.vaccine_expiration ASC;";
    } else if ($sort == 'expirationDesc'){
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id ORDER BY vaccine_lot.vaccine_expiration DESC;";
    } else {
        $querySort = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source,vaccine_lot.date_stored, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id;";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccName, $vaccineSource,$dateStored, $vaccExp, $batchQty, $vaccQty);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont' onclick='showVaccine(this)'>
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



if (isset($_POST['vaccId'])) {
    include '../includes/database.php';
    $selectedVaccine = $_POST['vaccId'];
    $Qty = $_POST['qty'];
    $dateStored = $_POST['stored'];
    $dateExp = $_POST['exp'];
    $source = $_POST['source'];

    $getVacIdQuery = "SELECT vaccine_id FROM vaccine WHERE vaccine_name='$selectedVaccine'";
    $dbase = $database->stmt_init();
    $dbase->prepare($getVacIdQuery);
    $dbase->execute();
    $dbase->bind_result($vaccineid);
    $dbase->fetch();
    $dbase->close();

    $query1 = "INSERT INTO vaccine_lot (vaccine_id, employee_account_id, date_stored, source, total_vaccine_vial_quantity, vaccine_expiration, Archived) VALUE ('$vaccineid', 1,'$dateStored', '$source', '$Qty', '$dateExp', 0);";
    $database->query($query1);

    echo " <thead class='tableCenterCont'>
                    <tr>
                        <th>Vaccine Lot ID</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Source</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Bottle Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>";

    $query1 = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived = 0;";
    $dbase = $database->stmt_init();
    $dbase->prepare($query1);
    $dbase->execute();
    $dbase->bind_result($vaccineLotId, $vaccName, $source, $dateStored, $vaccExp, $batchQty);
    while ($dbase->fetch()) {

        echo "<tr class='table-row tableCenterCont' onclick='showVaccine(this)'>
                            <td>$vaccineLotId</td>
                            <td>$vaccName</td>
                            <td>$source</td>
                            <td>$dateStored</td>
                            <td>$vaccExp</td>
                            <td>$batchQty</td>
                            <td>
                                <div class='d-flex justify-content-center'>
                                      <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                                </div>
                            </td>
                            </tr>";
    }

    echo"<div id='viewVaccineDetails' class='modal-window'></div>";

}

//add new vaccine
if (isset($_POST['vaccineName'])) {
    $vaccineName = $_POST['vaccineName'];
    $vaccineManufacturer = $_POST['vaccineManufacturer'];
    $vaccineDescription = $_POST['vaccineDescription'];
    $vaccineType = $_POST['vaccineType'];
    $vaccineEfficacy = (int)$_POST['vaccineEfficacy'];
    $dosage = $_POST['dosage'];
    $interval = $_POST['interval'];
    $minTemp = $_POST['minTemp'];
    $maxTemp = $_POST['maxTemp'];
    $lifeSpan = $_POST['lifeSpan'];


    $query1 = "INSERT INTO vaccine (vaccine_name, vaccine_type, vaccine_efficacy, vaccine_lifespan_in_months) VALUE ('$vaccineName', '$vaccineType', '$vaccineEfficacy', '$lifeSpan');";
    $database->query($query1);

    $getQuery = "SELECT vaccine_id FROM vaccine WHERE vaccine_name='$vaccineName'";
    $dbase = $database->stmt_init();
    $dbase->prepare($getQuery);
    $dbase->execute();
    $dbase->bind_result($vaccineid);
    $dbase->fetch();
    $dbase->close();

    $query2 = "INSERT INTO vaccine_information (vaccine_id, vaccine_manufacturer, vaccine_description, vaccine_dosage_required, vaccine_dosage_interval, vaccine_minimum_temperature, vaccine_maximum_temperature) VALUE ('$vaccineid', '$vaccineManufacturer', '$vaccineDescription', '$dosage', '$interval', '$minTemp', '$maxTemp');";
    $database->query($query2);

     echo" <option selected disabled> Select Vaccine Efficacy</option>";

                                    $getVaccinesQuery = "SELECT vaccine_name FROM vaccine";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($getVaccinesQuery);
                                    $stmt->execute();
                                    $stmt->bind_result($vaccine);
                                    while ($stmt->fetch()) {
                                        echo "<option>$vaccine</option>";
                                    }

}

//archive feature
if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE `vaccine_lot` SET `Archived`= 1 WHERE `vaccine_lot_id` = '$archivedId'";
        $database->query($query);

        echo " <thead class='tableCenterCont'>
                    <tr>
                        <th>Vaccine Lot ID</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Source</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Bottle Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>";

        $query1 = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived = 0;";
        $dbase = $database->stmt_init();
        $dbase->prepare($query1);
        $dbase->execute();
        $dbase->bind_result($vaccineLotId, $vaccName, $source, $dateStored, $vaccExp, $batchQty);
        while ($dbase->fetch()) {

            echo "<tr class='table-row tableCenterCont' onclick='showVaccine(this)'>
                            <td>$vaccineLotId</td>
                            <td>$vaccName</td>
                            <td>$source</td>
                            <td>$dateStored</td>
                            <td>$vaccExp</td>
                            <td>$batchQty</td>
                            <td>
                                <div class='d-flex justify-content-center'>
                                      <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                                </div>
                            </td>
                            </tr>";
        }

                    echo"<div id='viewVaccineDetails' class='modal-window'></div>";

    } else if ($option == "UnArchive") {
        $query = "UPDATE `vaccine_lot` SET `Archived`= 0 WHERE `vaccine_lot_id` = '$archivedId'";
        $database->query($query);

          echo" <table class='table table-row table-hover tableModal' id='vaccineTable'>
                    <thead class='tableHeader'>
                    <tr class='tableCenterCont'>
                        <th scope='col'>Vaccine Lot ID</th>
                        <th scope='col'>Vaccine Name</th>
                        <th scope='col'>Vaccine Source</th>
                        <th scope='col'>Date Received</th>
                        <th scope='col'>Expiration</th>
                        <th scope='col'>Bottle Quantity</th>
                        <th scope='col'>Action</th>
                    </tr>
                    </thead>
                    <div id='vaccineContent'>";



        $query1 = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.source, vaccine_lot.date_stored, vaccine_lot.vaccine_expiration, vaccine_lot.total_vaccine_vial_quantity FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.Archived = 1;";
        $dbase = $database->stmt_init();
        $dbase->prepare($query1);
        $dbase->execute();
        $dbase->bind_result($vaccineLotId, $vaccName, $source, $dateStored, $vaccExp, $batchQty);
        while ($dbase->fetch()) {


                                echo "<tr class='tableCenterCont'>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$source</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$batchQty</td>
                <td>
                    <div style='text-align: center;'>
                        <button class='btn btn-warning' onclick='archive(0, clickArchive, $vaccineLotId )'><i class='fas fa-box-open'></i> unarchive</button>
                    </div>
                </td>
                </tr>";
        }
    }
    echo"
</div>
</table>";
}

if (isset($_POST['showUpdatedArchive'])){
     echo'<table class="table table-row table-hover tableModal" id="vaccineTable">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
                        <th scope="col">Vaccine Lot ID</th>
                        <th scope="col">Vaccine Name</th>
                        <th scope="col">Vaccine Source</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">Expiration</th>
                        <th scope="col">Bottle Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <div id="vaccineContent">';

                        require_once '../require/getVaccine.php';
                        require_once '../require/getVaccineBatch.php';
                        require_once '../require/getVaccineLot.php';

                        $count = 0;
                        foreach ($vaccineLots as $vl) {
                            if ($vl->getArchived() == 1) {
                                $vaccineLotId = $vl->getVaccLotId();
                                $vaccLotVaccId = $vl->getVaccLotVaccId();
                                $dateStored = $vl->getDateVaccStored();
                                $batchQty = $vl->getVaccBatchQty();
                                $source = $vl->getSource();
                                $vaccExp = $vl->getExpiration();


                                foreach ($vaccines as $vac) {
                                    if ($vaccLotVaccId == $vac->getVaccId()) {
                                        $vaccName = $vac->getVaccName();
                                    }
                                }

                                echo "<tr class='tableCenterCont'>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$source</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$batchQty</td>
                <td>
                    <div style='text-align: center;'>
                        <button class='btn btn-warning' onclick='archive(0, clickArchive, $vaccineLotId )'><i class='fas fa-box-open'></i> unarchive</button>
                    </div>
                </td>
                </tr>";
                            }
                        }
                        echo"
                    </div>
                </table>";
}

if (isset($_POST['showUpdatedVaccine'])){
    echo " <thead class='tableCenterCont'>
                    <tr>
                        <th>Vaccine Lot ID</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Source</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Bottle Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>";

    foreach ($vaccineLots as $vl) {
        if ($vl->getArchived() == 0) {
            $vaccineLotId = $vl->getVaccLotId();
            $vaccLotVaccId = $vl->getVaccLotVaccId();
            $dateStored = $vl->getDateVaccStored();
            $batchQty = $vl->getVaccBatchQty();
            $source = $vl->getSource();
            $vaccExp = $vl->getExpiration();


            foreach ($vaccines as $vac) {
                if ($vaccLotVaccId == $vac->getVaccId()) {
                    $vaccName = $vac->getVaccName();
                }
            }

            echo "<tr class='table-row tableCenterCont' onclick='showVaccine(this)'>
                            <td>$vaccineLotId</td>
                            <td>$vaccName</td>
                            <td>$source</td>
                            <td>$dateStored</td>
                            <td>$vaccExp</td>
                            <td>$batchQty</td>
                            <td>
                                <div class='d-flex justify-content-center'>
                                      <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
                                </div>
                            </td>
                            </tr>";
        }
    }

    echo"<div id='viewVaccineDetails' class='modal-window'></div>";
}


//view vaccine details
if (isset($_POST['vaccine'])) {

    $vacccineId = $_POST['vaccine'];
    $query = "SELECT * FROM `vaccine_lot` JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_information ON vaccine_information.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.vaccine_lot_id = $vacccineId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($vaccine_lot_id, $vaccine_id, $employee_account_id, $date_stored, $source, $total_vaccine_vial_quantity, $vaccine_expiration, $archive, $vaccine_id, $vaccine_name, $vaccine_type, $vaccine_efficacy, $vaccine_lifespan_in_months, $vaccine_id, $vaccine_manufacturer, $vaccine_description, $vaccine_dosage_required, $vaccine_dosage_interval, $vaccine_minimum_temperature, $vaccine_maximum_temperature);
    $stmt->fetch();
    $stmt->close();
}

//filter
if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
    $queryFilter = '';
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