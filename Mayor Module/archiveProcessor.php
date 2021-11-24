<?php
require_once("../includes/configure.php");
require_once("../includes/recordActivityLog.php");

//Starting session to access SESSION data
session_start();

$accountDetails = $_SESSION['account'];
$employeeID = $accountDetails['empId'];
$employeeRole = $accountDetails['role'];
$barangay_id = $accountDetails['barangay_id'];

if (isset($_POST['archive'])){
    require_once("../includes/database.php");
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE employee_account SET employee_account.disabled = 1 WHERE employee_account.employee_id = $archivedId";
        $database->query($query);

        echo '
                   <table class="table table-row table-hover tableModal" id="employeeTable">
                        <thead>
                        <tr class="tableCenterCont">
                            <th scope="col">Employee Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

                        $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name, employee.employee_role, employee_account.employee_account_type FROM employee JOIN employee_account ON employee.employee_id = employee_account.employee_id AND employee_account.disabled = 1";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($querySearch);
                        $stmt->execute();
                        $stmt->bind_result($id, $empFName, $empMName, $empLname, $empRole, $empType);
                        while ($stmt->fetch()) {

                        echo "<tr class='tableCenterCont'>
                        <td>$empFName $empMName $empLname</td>
                        <td>$empRole</td>
                        <td>$empType</td>
                        <td>
                            <div>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $id)'><i class='fa fa-archive'></i> unarchive</button>
                            </div>
                        </td>
                    </tr>";

                        }


    } else if ($option == "UnArchive") {
        require_once("../includes/database.php");
        $query = "UPDATE employee_account SET employee_account.disabled = 0 WHERE employee_account.employee_id = $archivedId";
        $database->query($query);
       //insertLogs($employeeID, $employeeRole, 'Unarchive', 'Unarchived patient ID: '.$archivedId);

       $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id AND employee_account.disabled = 1";

       $stmt = $database->stmt_init();
       $stmt->prepare($querySearch);
       $stmt->execute();
       $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
       while ($stmt->fetch()) {
       echo "<tr class='tableCenterCont'>
                <td>$empFName $empMName $empLName</td>
                <td>$empRole </td>
                <td>$empAccType</td>
                <td>
                <button class='buttonTransparentMayors' onclick='event.stopPropagation();archive(1, clickArchive, $empID)'><i class='fas fa-archive'></i></button>
                <button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
                </tr>";
       
       }
    }
}

if (isset($_POST['showUpdatedArchive'])){
    require_once("../includes/database.php");
    $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id AND employee_account.disabled = 0";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
    while ($stmt->fetch()) {
    echo "<tr class='tableCenterCont'>
             <td>$empFName $empMName $empLName</td>
             <td>$empRole </td>
             <td>$empAccType</td>
             <td>
             <button class='buttonTransparentMayors' onclick='event.stopPropagation();archive(1, clickArchive, $empID)'><i class='fas fa-archive'></i></button>
             <button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
             </tr>";
    
    }
}

if (isset($_POST['showUpdatedEmployee'])){
    require_once("../includes/database.php");
                        $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id AND employee_account.disabled = 1";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($querySearch);
                        $stmt->execute();
                        $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
                        while ($stmt->fetch()) {
                            echo "<tr class='tableCenterCont'>
                            <td>$empFName $empMName $empLName</td>
                            <td>$empRole</td>
                            <td>$empAccType</td>
                            <td>
                                <div>
                                    <button class='btn btn-warning' onclick='archive(0, clickArchive, $empID)'><i class='fa fa-archive'></i> unarchive</button>
                                </div>
                            </td>";
                        }
}
