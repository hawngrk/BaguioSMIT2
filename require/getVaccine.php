<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccine";
$vaccines = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($vaccineId, $vaccineName, $vaccineType, $vaccineEfficacy, $vaccineLifeSpan);

while ($stmt->fetch()){
    $vaccine = new vaccine($vaccineId, $vaccineName, $vaccineType, $vaccineEfficacy, $vaccineLifeSpan);
    $vaccines[] = $vaccine;
}
