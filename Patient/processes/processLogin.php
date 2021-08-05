<?php
session_start();
require_once("../configure.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM patient_account WHERE patient_username = ? AND patient_password = ? LIMIT 1";

try {
    $stmtselect = $database->prepare($sql);
    $result = $stmtselect->execute([$username, $password]);
    
    if($result) {
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0) {
            $_SESSION['userlogin'] = $user;
            echo '1';
        } else {
            echo 'Invalid username or password';
        }
    } else {
        echo 'There were errors while connecting to database.';
    }
} catch(PDOException $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 
