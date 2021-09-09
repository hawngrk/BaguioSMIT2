<?php
session_start();
require_once("../configure.php");

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$patientId = $_SESSION['resetpassword'];

$sql = "UPDATE patient_account SET patient_password = ? WHERE patient_id = ?";

try {
    $stmtupdate = $database->prepare($sql);
    $result = $stmtupdate->execute([$password, $patientId]);
    if($result) {
        unset($_SESSION['resetpassword']);
        echo 'Password successfully changed';
        
    } else {
        echo 'Something went wrong';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}