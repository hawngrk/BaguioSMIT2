<?php
require_once("../configure.php");

$password = sha1($_POST['password']);
$username = $_SESSION['resetpassword'];

$sql = "UPDATE patient_account SET patient_password = ? WHERE patient_username = ?";

try {
    $stmtupdate = $database->prepare($sql);
    $result = $stmtupdate->execute([$password, $username]);
    if($result) {
        echo 'Password successfully changed';
    } else {
        echo 'Something went wrong';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}