<?php
if (isset($_POST['vaccine'])) {
    include '../includes/database.php';
    require '../require/getVaccine.php';
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
    $batchNo = (int) $_POST['batch'];
    $counter = 1;
    echo "<table>
<tr>
<th>Batch No.</th>
<th>Vaccine Quantity</th>
<th>Date Manufactured</th>
<th>Date of Expiration</th>
</tr>";
    while($counter <= $batchNo) {
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

