<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccine_drive_1";
$vaccineDrive1 = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($driveId,$vaccineId);

while ($stmt->fetch()){
    $vaccDrive1 = new vaccineDrive1($driveId,$vaccineId);
    $vaccineDrive1[] = $vaccDrive1;
}
