<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM priority_drive";
$priorityDrives = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($driveId,$priorityId);

while ($stmt->fetch()){
    $priorityDrive = new priorityDrive($driveId, $priorityId);
    $priorityDrives[] = $priorityDrive;
}
