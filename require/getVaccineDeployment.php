<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccine_deployment";
$vaccineDeployment = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($deploymentDriveId,$deploymentVaccId);

while ($stmt->fetch()){
    $vaccineDep = new vaccineDeployment($deploymentDriveId,$deploymentVaccId);
    $vaccineDeployment[] = $vaccineDep;
}
