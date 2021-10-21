<?php
include("../includes/configure.php");

$username = $_POST["username"];
$password = $_POST["password"];
// $username = 'EmployeeMonica';
// $password = 'employee1';

$accountData = "SELECT * FROM employee_account WHERE employee_username = ?";

try {
    $stmtacc = $database->prepare($accountData);
    $accountQuery = $stmtacc->execute([$username]);
    $accountDetails = $stmtacc->fetch(PDO::FETCH_ASSOC);
    $employeeID = $accountDetails['employee_id']; 

    if(password_verify($password, $accountDetails['employee_password'])) {
        //Get employee data
        $employeeData = "SELECT * FROM employee WHERE employee_id = ?";
        $stmtemp = $database->prepare($employeeData);
        $empQuery = $stmtemp->execute([$employeeID]);
        $employeeDetails = $stmtemp->fetch(PDO::FETCH_ASSOC);

        //Get barangay name if employee is a barangay official
        $brId = $employeeDetails['barangay_id'];

        $barangayData = "SELECT * FROM barangay WHERE barangay_id = ?";
        $stmtbar = $database->prepare($barangayData);
        $brQuery = $stmtbar->execute([$brId]);
        $brDetails = $stmtbar->fetch(PDO::FETCH_ASSOC);
        $accountInformation = empToArray($employeeDetails, 
        $brDetails);

        $_SESSION['account'] = $accountInformation;
        
        //Returns the role of the employee for redirection to its designated page
        echo $accountInformation['role'];

    } else {
        throw new Exception(header('HTTP/1.0 400 Invalid username or password'));

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

function empToArray($empData, $brDetails) {
    $fullName = $empData['employee_first_name']." ".$empData['employee_last_name'];  
    $account = array('empId' => $empData['employee_id'], 'name' => $fullName, 'role' => $empData['employee_role'], 'barangay' => $brDetails['barangay_name'], 'barangay_id' => $brDetails['barangay_id']);
    return $account;
}