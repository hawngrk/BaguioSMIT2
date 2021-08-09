<?php
    include("../../includes/database.php");
    include("../../includes/constructor.php");

    $query = "SELECT * FROM employee";
    $employees = [];

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_result($employeeId, $employeeLastName, $employeeFirstName, $employeeMiddleName, $employeeSuffix, $employeeRole, $employeeContactNumber);
    $stmt->execute();

    while ($stmt->fetch()){
        $employee = new employeeInfo($employeeId, $employeeLastName, $employeeFirstName, $employeeMiddleName, $employeeSuffix, $employeeRole, $employeeContactNumber);
        $employees[] = $employee;
    }
