<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM health_district_drives";
$healthDistrictDrives = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($driveId, $districtId);

while ($stmt->fetch()) {
    $healthDistrictDrive = new healthDistrictDrive($driveId, $districtId);
    $healthDistrictDrives[] = $healthDistrictDrive;
}