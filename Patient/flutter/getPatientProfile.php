<?php
session_start();
require_once("../../includes/configure.php");

$id = $_POST['patient_id'];

$query = "SELECT * FROM patient WHERE patient_id = ?";
$stmtselect = $database->prepare($query);
$stmtselect->execute([$id]);
$row = $stmtselect->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);