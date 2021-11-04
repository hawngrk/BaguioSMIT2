<?php
header("Access-Control-Allow-Origin: *");
require_once("../../../includes/configure.php");

$username = $_POST['username'];
$passswrd = $_POST['password'];

//Test variables
// $username = "TedMosby";
// $password = "patient1";

$query = "SELECT * FROM patient_account WHERE patient_username = ? LIMIT 1";

try {
    $stmtselect = $database->prepare($query);
    $stmtselect->execute([$username]);
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
    $hash = $row['patient_password'];
    if (password_verify($password, $hash)) {
        $credentials = getPatientDetails($row['patient_id']);
        echo json_encode($credentials);
    } else {
        echo 'Invalid username or password';
    }
} catch(PDOException $e) {
    echo 'Caught exception: ' , $e->getMessage();
}

//Searches for patient credentials and returns
function getPatientDetails($id) {
    $query = "SELECT * FROM patient WHERE patient_id = ?";
    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $stmtselect ->execute([$id]);
        $patientDetails = $stmtselect->fetch(PDO::FETCH_ASSOC);
        return $patientDetails;
    } catch (PDOException $e) {
        echo 'Error in get patient ID: ', $e->getMessage();
    }
}