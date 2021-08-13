<?php
include("../includes/database.php");
require_once '../require/getVaccine.php';
require_once '../require/getVaccineBatch.php';
require_once '../require/getVaccineLot.php';

if (isset($_POST['search'])) {
    include("../includes/database.php");
    $search = $_POST['search'];
    $querySearch = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.date_stored, vaccine_batch.date_of_expiration, vaccine_lot.vaccine_batch_quantity, SUM(vaccine_batch.vaccine_quantity) FROM vaccine_lot LEFT JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id LEFT JOIN vaccine_batch ON vaccine_lot.vaccine_lot_id = vaccine_batch.vaccine_lot_id WHERE vaccine_lot.vaccine_lot_id LIKE '$search%' OR vaccine.vaccine_name LIKE '$search%' GROUP BY vaccine_lot.vaccine_lot_id;";
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

if (isset($_POST['cancel'])) {
    $querySearch = "SELECT vaccine_lot.vaccine_lot_id, vaccine.vaccine_name, vaccine_lot.date_stored, vaccine_batch.date_of_expiration, vaccine_lot.vaccine_batch_quantity, SUM(vaccine_batch.vaccine_quantity) FROM vaccine_lot JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_batch ON vaccine_lot.vaccine_lot_id = vaccine_batch.vaccine_lot_id GROUP BY vaccine_lot.vaccine_lot_id;";
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

