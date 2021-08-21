<?php
session_start();
require_once("../configure.php");

$user = $_SESSION['userlogin'];
$oldPassword = $_POST['oldPassword'];
$newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

$selectUser = "SELECT * FROM patient_account WHERE patient_id = ?";
$changePs = "UPDATE patient_account SET patient_password = ? where patient_id = ?";

try {
    $stmtselect = $database ->prepare($selectUser);
    $patientAccount = $stmtselect->execute([$user['patient_id']]);
    $accountDetails = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $hashedPassword = $accountDetails['patient_password'];

    if(password_verify($oldPassword, $hashedPassword)) {
        $stmtinsert = $database->prepare($changePs);
        $result = $stmtinsert->execute([$newPassword, $user['patient_id']]);                                  
        if($result) {
            echo 'Password sucessfully changed';
        } else {
            throw new Exception(header('HTTP/1.0 400 Something went wrong while changing the password'));
        }
    } else {
        throw new Exception(header('HTTP/1.0 400 The password entered is invalid'));
    }
} catch(PDOException $e) {
    die(header('HTTP/1.0 500 Database Server error'));
} catch(Exception $e) {
    echo 'Caught exception: ', $e->getMessage();
}