<?php 
    require_once("configure.php");

    function insertLogs($employeeID, $employeeRole, $logType, $logDescription) {
        $query = "INSERT INTO activity_logs (employee_id, employee_role, log_type, log_description) VALUES (?, ?, ?, ?)";
        try {
            $stmtinsert = $GLOBALS['database']->prepare($query);
            $stmtinsert->execute([$employeeID, $employeeRole, $logType, $logDescription]);
        } catch (PDOException $e) {
            echo 'Error in insert logs: ', $e->getMessage();
        }
    }
?>