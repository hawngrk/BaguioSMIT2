<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';
$patient = $_POST['patient'];
$token = $_POST['token'];

$result = $database->query("UPDATE patient SET token = '$token' WHERE patient_id = '$patient';");