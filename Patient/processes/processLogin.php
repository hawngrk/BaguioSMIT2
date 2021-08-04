<?php
    require_once("../../includes/database.php");


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM patient_account WHERE patient_username = ? AND patient_password = ? LIMIT 1";
$stmtselect = $database->prepare($sql);
$result = $stmtselect->execute([$username, $password]);


if($result) {
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if($stmtselect->rowCount() > 0) {
        echo '1';
    } else {
        echo 'Invalid username or password';
    }
} else {
    echo 'There were erros while connecting to database.';
}
 
