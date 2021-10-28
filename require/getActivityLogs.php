<?php
include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM activity_logs";
$activityLogs = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->bind_result($logId, $logEntryDate, $employeeId, $employeeRole, $logType, $logDescription);
$stmt->execute();
echo $logEntryDate;

while ($stmt->fetch()) {
    $activityLog = new activityLogs($logId, $logEntryDate, $employeeId, $employeeRole, $logType, $logDescription);
    $activityLogs[] = $activityLog;
}

