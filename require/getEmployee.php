<?php
    include("../includes/database.php");
    include("../includes/constructor.php");

    $query = "SELECT * FROM employee";
    $employees = [];

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_result($employeeId, $employeeLastName, $employeeFirstName, $employeeMiddleName, $employeeSuffix, $employeeRole, $employeeContactNumber);
    $stmt->execute();

    while ($stmt->fetch()){
        $patient = new patientInfo($employeeId, $employeeLastName, $employeeFirstName, $employeeMiddleName, $employeeSuffix, $employeeRole, $employeeContactNumber);
        $employees[] = $employees;
    }
