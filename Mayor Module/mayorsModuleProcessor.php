<?php
include("../includes/database.php");

if (isset($_POST['empDeets'])){
    $empModal = $_POST['empDeets'];

    $query = "SELECT * FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id WHERE employee.employee_id = $empModal";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($empID, $empFName, $empLName, $empMName, $empSuffix, $empRole, $brgyID, $empContactNumber, $empAccID,  $empNumID, $empUserName, $empPW, $empType, $empPic, $disabled);
    $stmt->fetch();
    $stmt->close();
    echo "<h4> $empFName $empMName $empLName </h4>
        <hr>
        <div class='row mayorsCnt'>
            <div class='col-6'>
                <div class='container'>
                    <dl class='row'>
                         <dt class='col-sm-5'>Username:</dt>
                         <dd class='col-sm-7'>$empUserName</dd>
                         <dt class='col-sm-5'>Employee Role:</dt>
                         <dd class='col-sm-7'>$empRole</dd> 
                         <dt class='col-sm-5'>Contact Number:</dt>
                         <dd class='col-sm-7'>$empContactNumber</dd>
                         <dt class='col-sm-5'>Account Type:</dt>
                         <dd class='col-sm-7'>$empType</dd>
                    </dl>
                </div>
            </div>
        </div>";
}

//search
if (isset($_POST['searchLog'])) {
    $search = $_POST['searchLog'];
    if ($search == "") {
        $querySearch = "SELECT activity_logs.log_id, activity_logs.log_entry_date, activity_logs.employee_id, activity_logs.employee_role, activity_logs.log_type, activity_logs.log_description FROM activity_logs;";
    } else {
        $querySearch = "SELECT activity_logs.log_id, activity_logs.log_entry_date, activity_logs.employee_id, activity_logs.employee_role, activity_logs.log_type, activity_logs.log_description FROM activity_logs WHERE activity_logs.employee_id = '$search%';";
    }
    echo "<thead>
             <tr class='tableCenterCont'>
                <th>Log Entry Date</th>
                <th>Employee ID</th>
                <th>Employee Role</th>
                <th>Log type</th>
                <th>Log Description</th>
             </tr>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($logId, $logEntryDate, $employeeId, $employeeRole, $logType, $logDescription);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td> $logEntryDate</td>
                <td> $employeeId </td>
                <td> $employeeRole</td>
                <td> $logType</td>
                <td> $logDescription</td>
              </tr>";
    }
}

//search
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($search == "") {
        $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id;";
    } else {
        $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id WHERE employee.employee_first_name LIKE '$search%' OR employee.employee_last_name LIKE '$search%';";
    }
    echo "
         <thead>
           <tr class='tableCenterCont'>
           <th>Employee Name</th>
           <th>Role</th>
           <th>Account Type</th>
           <th>Action</th>
           </tr>
         </thead>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td>$empFName $empMName $empLName</td>
                <td>$empRole </td>
                <td>$empAccType</td>
                <td><button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
              </tr>";
    }
}

//filter
if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
    $queryFilter = '';
    echo "
        <thead>
           <tr class='tableCenterCont'>
           <th>Employee Name</th>
           <th>Role</th>
           <th>Account Type</th>
           <th>Action</th>
           </tr>
         </thead>";
    $temp = "";
    if ($filter == 'None') {
        $queryFilter = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id;";
    } else {
        if ($filter == 'Mayor') {
            $filter = "Mayor\'s Office";
        }
        $queryFilter = 'SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id WHERE employee.employee_role = "'.$filter.'";';
    }
    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
    $stmt->execute();
    $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td>$empFName $empMName $empLName</td>
                <td>$empRole </td>
                <td>$empAccType</td>
                <td><button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
              </tr>";
    }
}

if (isset($_POST['filterUser'])) {
    $filter = $_POST['filterUser'];
    $queryFilter = '';
    echo "
         <thead>
             <tr class='tableCenterCont'>
                <th>Log Entry Date</th>
                <th>Employee ID</th>
                <th>Employee Role</th>
                <th>Log type</th>
                <th>Log Description</th>
             </tr>
         </thead>";
    $temp = "";
    if ($filter == 'None') {
        $queryFilter = "SELECT activity_logs.log_id, activity_logs.log_entry_date, activity_logs.employee_id, activity_logs.employee_role, activity_logs.log_type, activity_logs.log_description FROM activity_logs;";
    } else {
        if ($filter == 'Mayor') {
            $filter = "Mayor\'s Office";
        }
        $queryFilter = 'SELECT activity_logs.log_id, activity_logs.log_entry_date, activity_logs.employee_id, activity_logs.employee_role, activity_logs.log_type, activity_logs.log_description FROM activity_logs WHERE activity_logs.employee_role = "'.$filter.'";';
   }
    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
    $stmt->execute();
    $stmt->bind_result($logId, $logEntryDate, $employeeId, $employeeRole, $logType, $logDescription);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td> $logEntryDate</td>
                <td> $employeeId </td>
                <td> $employeeRole</td>
                <td> $logType</td>
                <td> $logDescription</td>
              </tr>";
    }
}

//sort
//sort
if (isset($_POST['sort'])) {
    $querySort = '';
    $sort = $_POST['sort'];
    echo "
        <thead>
             <tr class='tableCenterCont'>
                <th>Log Entry Date</th>
                <th>Employee ID</th>
                <th>Employee Role</th>
                <th>Log type</th>
                <th>Log Description</th>
             </tr>
        </thead>";

    if ($sort == 'Asc') {
        $querySort = "SELECT activity_logs.log_id, activity_logs.log_entry_date, activity_logs.employee_id, activity_logs.employee_role, activity_logs.log_type, activity_logs.log_description FROM activity_logs ORDER BY log_entry_date ASC;";
    } else {
        $querySort = "SELECT activity_logs.log_id, activity_logs.log_entry_date, activity_logs.employee_id, activity_logs.employee_role, activity_logs.log_type, activity_logs.log_description FROM activity_logs ORDER BY log_entry_date DESC;"; }

    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($logId, $logEntryDate, $employeeId, $employeeRole, $logType, $logDescription);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td> $logEntryDate</td>
                <td> $employeeId </td>
                <td> $employeeRole</td>
                <td> $logType</td>
                <td> $logDescription</td>
              </tr>";
    }
}

?>



