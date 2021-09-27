<?php
include("../includes/database.php");
require_once '../require/getVaccine.php';
require_once '../require/getVaccineBatch.php';
require_once '../require/getVaccineLot.php';

if (isset($_POST['search'])) {
    include("../includes/database.php");
    $search = $_POST['search'];
    if ($search === "") {
        $querySearch = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.date_stored, vaccine_batch.date_of_expiration, vaccine_lot.vaccine_batch_quantity, SUM(vaccine_batch.vaccine_quantity) FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_batch ON vaccine_lot.vaccine_lot_id = vaccine_batch.vaccine_lot_id GROUP BY vaccine_lot.vaccine_lot_id;";
    } else {
        $querySearch = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.date_stored, vaccine_batch.date_of_expiration, vaccine_lot.vaccine_batch_quantity, SUM(vaccine_batch.vaccine_quantity) FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_batch ON vaccine_lot.vaccine_lot_id = vaccine_batch.vaccine_lot_id WHERE vaccine_lot.vaccine_lot_id LIKE '$search%' OR vaccine.vaccine_name LIKE '$search%' GROUP BY vaccine_lot.vaccine_lot_id;";
    }

    echo "
     <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Vaccine Lot ID</th>
                <th scope='col'>Vaccine Name</th>
                <th scope='col'>Date Received</th>
                <th scope='col'>Date Expiration</th>
                <th scope='col'>Batch Quantity</th>
                <th scope='col''>Bottle Quantity</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";

    $count = 1;
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccName, $dateStored, $vaccExp, $batchQty, $vaccQty);
    while ($stmt->fetch()) {
        echo "<tr>
                <td>$count</td>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$batchQty</td>
                <td>$vaccQty</td>
                </tr>";
        $count++;
    }
}

if (isset($_POST['vaccine'])) {
    $vacName = $_POST['vaccine'];
    $vacID = '';
    $vacType = '';
    $vacEff = '';
    $vacLife = '';
    foreach ($vaccines as $vac) {
        if ($vac->getVaccName() == $vacName) {
            $vacID = $vac->getVaccId();
            $vacType = $vac->getVaccType();
            $vacEff = $vac->getVaccEfficacy();
            $vacLife = $vac->getVaccLifeSpan();
        }
    }
    $getManuQuery = "SELECT vaccine_manufacturer FROM vaccine_information WHERE vaccine_id = '$vacID';";
    $dbase = $database->stmt_init();
    $dbase->prepare($getManuQuery);
    $dbase->execute();
    $dbase->bind_result($vacManu);
    $dbase->fetch();
    $dbase->close();
    echo "
<p>Vaccine Comapany: $vacManu</p>
<p>Vaccine Type: $vacType</p>
<p>Vaccine Efficacy: $vacEff %</p>
<p>Vaccine Lifespan: $vacLife months</p>";
}

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

if (isset($_POST['viewVaccine'])) {
    include '../includes/database.php';
    $lot = $_POST['viewVaccine'];
    $getVaccineLotQuery = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.date_stored, vaccine_batch.date_of_expiration, vaccine_lot.vaccine_batch_quantity, SUM(vaccine_batch.vaccine_quantity) FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_batch ON vaccine_lot.vaccine_lot_id = vaccine_batch.vaccine_lot_id WHERE vaccine_lot.vaccine_lot_id = $lot GROUP BY vaccine_lot.vaccine_lot_id;";

    $stmt = $database->stmt_init();
    $stmt->prepare($getVaccineLotQuery);
    $stmt->execute();
    $stmt->bind_result($vaccineLotId, $vaccName, $dateStored, $vaccExp, $batchQty, $vaccQty);
    $stmt->fetch();

    echo "
    <div class='modal-content container'>
    <h2 id='headerReviewVaccine'>EDIT VACCINE - $vaccineLotId . " - ". $vaccName <span id='viewReportClose' class='close' onclick='viewVaccineClose()'>&times;</span></h2>
    <div class='ReviewVaccine-PopUp'>
    <h4>Vaccine Lot Information</h4>
    <p>Vaccine Lot ID: $vaccineLotId</p>
    <p>Vaccine Name: $vaccName</p>
    <p>Date Received: $dateStored</p>
    <p>Date of Expiration: $vaccExp</p>
    <p>Batch Quantity: $batchQty</p>
    <p>Bottle Quantity: $vaccQty</p>
    </div>";
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

    $query1 = "INSERT INTO vaccine_lot (vaccine_id, employee_account_id, date_stored, source, total_vaccine_vial_quantity, vaccine_expiration) VALUE ('$vaccineid', 1,'$dateStored', '$source', '$Qty', '$dateExp');";
    $database->query($query1);

    require_once '../require/getVaccine.php';
    require_once '../require/getVaccineBatch.php';
    require_once '../require/getVaccineLot.php';

    $count = 0;
    foreach ($vaccineLots as $vl) {
        $count++;
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

        echo "<tr>
                <td>$count</td>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$source</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$batchQty</td>
                </tr>";
    }

}

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


}

if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE `vaccine_lot` SET `Archived`= 1 WHERE `vaccine_lot_id` = '$archivedId'";
        $database->query($query);

    } else if ($option == "UnArchive") {
        $query = "UPDATE `vaccine_lot` SET `Archived`= 0 WHERE `vaccine_lot_id` = '$archivedId'";
        $database->query($query);


    }
}
