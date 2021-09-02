<?php
if (isset($_POST['search'])) {
    include("../includes/database.php");
    $search = $_POST['search'];
    if ($search === "") {
        $querySearch = "SELECT employee_id, CONCAT(employee_first_name, ' ', employee_middle_name, ' ', employee_last_name, ' ', employee_suffix), employee_role, employee_contact_number FROM employee;";
    } else {
        $querySearch = "SELECT employee_id, CONCAT(employee_first_name, ' ', employee_middle_name, ' ', employee_last_name, ' ', employee_suffix), employee_role, employee_contact_number FROM employee WHERE employee_id LIKE '$search%' OR employee_last_name LIKE '$search%' OR employee_first_name LIKE '$search%' OR employee_middle_name LIKE '$search%';";
    }
    echo "
   <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Personnel ID</th>
                <th scope='col'>Personnel Name</th>
                <th scope='col'>Position/Role</th>
                <th scope='col'>Contact Number</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";
    $count = 1;
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($employeeId, $employeeName, $role, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr>
                <td>$count</td>
                <td>$employeeId</td>
                <td>$employeeName</td>
                <td>$role</td>
                <td>$contactNum</td>
                </tr>";
        $count++;
    }
    $stmt->close();
}