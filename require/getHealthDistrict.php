<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM health_district";
$health_district= [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($healthDistrictId, $healthDistrictName, $contact, $archived);

while ($stmt->fetch()){
    $healthDist = new healthDistrict($healthDistrictId, $healthDistrictName, $contact, $archived);
    $health_district[] = $healthDist;
}
