<?php
session_start();
require_once("../configure.php");

$user = $_SESSION['userlogin'];
$category = $_POST['category'];
$password = $_POST['password'];

$selectUser = "SELECT * FROM patient_account WHERE patient_id = ?";
$changeCategory = "UPDATE patient_details SET patient_priotity_group = ? where patient_id = ?";

try {
    $stmtselect = $database ->prepare($selectUser);
    $patientAccount = $stmtselect->execute([$user['patient_id']]);
    $accountDetails = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $hashedPassword = $accountDetails['patient_password'];

    if(password_verify($password, $hashedPassword)) {
        $stmtinsert = $database->prepare($changeCategory);
        $result = $stmtinsert->execute([$category, $user['patient_id']]);                                  
        if($result) {
            echo 'Contact number sucessfully changed';
        } else {
            throw new Exception(header('HTTP/1.0 400 Something went wrong while changing the contact number'));
        }
    } else {
        throw new Exception(header('HTTP/1.0 400 The password entered is invalid'));
    }
} catch(PDOException $e) {
    die(header('HTTP/1.0 500 Database Server error'));
} catch(Exception $e) {
    echo 'Caught exception: ', $e->getMessage();
}