<?php
include "../includes/database.php";
if (isset($_POST['empDeets'])){
    $empModal = $_POST['empDeets'];
    
    $query = "SELECT * FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id WHERE employee.employee_id = $empModal";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($empID, $empFName, $empLName, $empMName, $empSuffix, $empRole, $brgyID, $empContactNumber, $empNumID, $empAccID, $empUserName, $empPW, $empType, $empPic);
    $stmt->fetch();
    $stmt->close();
        echo "<h4> $empFName $empMName $empLName </h4>
        <hr>
        <div class='row mayorsCnt'>
            <div class='col'>
            <h5>Employee Role:</h5><p>$empRole</p>
            <h5>Contact Number:</h5><p>$empContactNumber</p>
            <h5>Account Type:</h5><p>$empType</p>
            </div>
            <div class='col'>
            <h5>Employee Credentials:</h5>
            <button id='showEmpCreds' class='btn btn-outline-primary' onclick='showCreds()'>Show Credentials</button>
            <div id='creds' style='display:none'>
            <h7>Username:</h7><p>$empUserName</p>
            <h7>Password:</h7><p>$empPW</p>
            </div>
            </div>
        </div>";
}
?>