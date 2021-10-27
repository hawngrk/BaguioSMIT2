<?php
include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccine_drive_2";
$vaccineDrive2 = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($driveId,$vaccineId, $firstDoseDate);

while ($stmt->fetch()){
    $vaccDrive2 = new vaccineDrive2($driveId,$vaccineId, $firstDoseDate);
    $vaccineDrive2[] = $vaccDrive2;
}