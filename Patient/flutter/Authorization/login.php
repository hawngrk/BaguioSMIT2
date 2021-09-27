<?php
session_start();
require_once("../../../includes/configure.php");

$username = $_POST['username'];
$passswrd = $_POST['password'];

$query = "SELECT * FROM patient_account WHERE patient_username = ? LIMIT 1";

try {
    $stmtselect = $database->prepare($query);
    $stmtselect->execute([$username]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $hash = $row['patient_password'];

    return password_verify($password, $hash) ? '1' : '0';
} catch(PDOException $e) {
    echo 'Caught exception: ' , $e->getMessage();
}