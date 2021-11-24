<?php 
    
    
    function insertLogs($employeeID, $employeeRole, $logType, $logDescription) {
        require_once("configure.php");
        $query = "INSERT INTO activity_logs (employee_id, employee_role, log_type, log_description) VALUES (? ,? ,? ,?)";
        try {
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$employeeID, $employeeRole, $logType, $logDescription]);
        } catch (PDOException $e) {
            echo 'Error in insert logs: ', $e->getMessage();
        }
    }
?>