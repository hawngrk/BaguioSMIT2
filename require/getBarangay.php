<?php
include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM barangay";
$barangays = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->bind_result($barangayId,$barangayHealthDistId, $barangayName);
$stmt->execute();

while ($stmt->fetch()){
    $barangay = new barangay($barangayId, $barangayHealthDistId, $barangayName);
    $barangays[] = $barangay;
}

