<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccine_batch";
$vaccineBatches = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($vaccineBatchId, $vaccineBatchLotId, $vaccineBatchVaccId, $vaccineQty, $dateManufactured ,$dateOfExpiration);

while ($stmt->fetch()) {
    $vaccineBatch = new vaccineBatch($vaccineBatchId, $vaccineBatchLotId, $vaccineBatchVaccId, $vaccineQty, $dateManufactured ,$dateOfExpiration);
    $vaccineBatches[] = $vaccineBatch;
}
