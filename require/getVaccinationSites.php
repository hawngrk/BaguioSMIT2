<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM vaccination_sites";
$vaccinationSites = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($vaccinationSiteId, $location);

while ($stmt->fetch()){
    $vaccinationSite = new vaccineSite($vaccinationSiteId, $location);
    $vaccinationSites[] = $vaccinationSite;
}
