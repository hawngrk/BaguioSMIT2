<?php
//include("../Admin/login.html");
include("../includes/configure.php");
//$username = $_POST["username"];
//$password = $_POST["password"];
$username = 'CMBing';
$password = 'WriteFromYourFullSizedAorticPump';


$accountData = "SELECT * FROM employee_account WHERE employee_username = ?";

try {
    $stmtacc = $database->prepare($accountData);
    $accountQuery = $stmtacc->execute([$username]);
    $accountDetails = $stmtacc->fetch(PDO::FETCH_ASSOC);
    $employeeID = $accountDetails['employee_id']; 

    if($username == $accountDetails['employee_username'] && $password ==    $accountDetails['employee_password']) {

        $employeeData = "SELECT * FROM employee WHERE employee_id = ?";
        $stmtemp = $database->prepare($employeeData);
        $empQuery = $stmtemp->execute([$employeeID]);
        $employeeDetails = $stmtemp->fetch(PDO::FETCH_ASSOC);
        $brId = $employeeDetails['barangay_id'];
        $barangayData = "SELECT * FROM barangay WHERE barangay_id = ?";
        $stmtbar = $database->prepare($barangayData);
        $brQuery = $stmtbar->execute([$brId]);
        $brDetails = $stmtbar->fetch(PDO::FETCH_ASSOC);
        $accountInformation = empToArray($accountDetails, $employeeDetails, 
        $brDetails);

        
        $_SESSION['account'] = $accountInformation;
        echo $accountInformation['barangay'];
    } else {
        throw new Exception(header('HTTP/1.0 400 Invalid username or password'));
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}


function empToArray($accData, $empData, $brDetails) {
    $fullName = $empData['employee_first_name']." ".$empData['employee_last_name'];  
    $account = array('empId' => $empData['employee_id'], 'name' => $fullName, 'role' => $empData['employee_role'], 'barangay' => $brDetails['barangay_name'], 'barangay_id' => $brDetails['barangay_id']);
    return $account;
}