<?php
session_start();
require_once('recordActivityLog.php');

$accountInformation = $_SESSION['account'];

$logType = 'Logout';
$logDescription = 'Successfully logged out';

insertLogs($accountInformation['empId'], $accountInformation['role'], $logType, $logDescription);

session_destroy();