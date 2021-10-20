<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';
$patient = $_POST['patient'];

$result = $database->query();