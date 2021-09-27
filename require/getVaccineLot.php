<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccine_lot";
$vaccineLots = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($vaccineLotId, $vaccineLotVaccineId, $vaccineLotEmployee, $dateStored, $source, $vaccineBatchQty, $vaccineExp, $archived);

while ($stmt->fetch()){
    $vaccineLot = new vaccineLot($vaccineLotId, $vaccineLotVaccineId, $vaccineLotEmployee, $dateStored, $source, $vaccineBatchQty, $vaccineExp, $archived);
    $vaccineLots[] = $vaccineLot;
}
