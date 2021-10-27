<?php
include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccination_drive";
$vaccination_drive = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($driveId, $siteId, $date, $archive, $opened, $first_dose_stubs, $second_dose_stubs);

while ($stmt->fetch()) {
    $vaccDrive = new vaccinationDrive($driveId, $siteId, $date, $archive, $opened, $first_dose_stubs, $second_dose_stubs);
    $vaccination_drive[] = $vaccDrive;
}