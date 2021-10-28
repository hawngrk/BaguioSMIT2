<?php
include("../includes/database.php");

$querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id";

$stmt = $database->stmt_init();
$stmt->prepare($querySearch);
$stmt->execute();
$stmt->bind_result($empID,$empFName,$empMName,$empLName, $empRole,$empAccType);

while($stmt->fetch()) {
    echo"<tr class='labelRow'>
            <td><p class='columnCnt'>$empFName $empMName $empLName</p></td>
            <td class='columnName'>$empRole </td>
            <td class='columnName'>$empAccType</td>
            <td class='columnName'><button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
</tr>";
}


?>