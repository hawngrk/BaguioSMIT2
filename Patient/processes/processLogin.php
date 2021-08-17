<?php
session_start();
require_once("../configure.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM patient_account WHERE patient_username = ? LIMIT 1";

try {
    $stmtselect = $database->prepare($sql);
    $result = $stmtselect->execute([$username]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $hash = $row['patient_password'];

    if(password_verify($password, $hash)) {
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userlogin'] = $user;
        echo '1';
    } else {
        echo 'Invalid username or password';
    }
} catch(PDOException $e) {
    echo 'Caught exception: ',  $e->getMessage();
}