<?php 

    function insertLogs($employeeID, $employeeRole, $logType, $logDescription) {
        require_once("database.php");
        $query = "INSERT INTO activity_logs (employee_id, employee_role, log_type, log_description) VALUES ($employeeID, $employeeRole, $logType, $logDescription)";
        try {
            $database->query($query);
        } catch (PDOException $e) {
            echo 'Error in insert logs: ', $e->getMessage();
        }
    }
?>