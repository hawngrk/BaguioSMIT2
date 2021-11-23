<?php
session_start();
require("../../includes/configure.php");
require("../../includes/recordActivityLog.php");

// $username = $_POST["username"];
// $password = $_POST["password"];

//Test data
$username = "employeeJecelito";
$password = "employeeBatac";

$accountData = "SELECT * FROM employee_account JOIN employee ON employee.employee_id = employee_account.employee_id WHERE employee_username = ? ";

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

        $accountInformation = empToArray($employeeDetails);

        $_SESSION['account'] = $accountInformation;
        
        $logType = 'Login';
        $logDescription = 'Successfully logged in';

        insertLogs($accountInformation['employee']['empId'], $accountInformation['employee']['role'], $logType, $logDescription);
        //Returns the role of the employee for redirection to its designated page
        //echo json_encode($accountInformation);
        var_dump($accountInformation);

    } else {
        echo "Invalid username or password";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

function empToArray($empData) {
    $fullName = $empData['employee_first_name']." ".$empData['employee_last_name'];
    $account = [];
    $empArray = array('empId' => $empData['employee_id'], 'name' => $fullName, 'role' => $empData['employee_role']);
    $account['employee'] = $empArray;
    return $account;
}