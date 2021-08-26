<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT health_district_id, health_district_name FROM health_district";
$health_district= [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($healthDistrictId, $healthDistrictName);

while ($stmt->fetch()){
    $healthDist = new healthDistrict($healthDistrictId, $healthDistrictName);
    $health_district[] = $healthDist;
}
