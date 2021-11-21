<?php
require_once('../includes/configure.php');
require_once('mayorsModuleProcessor.php');

//Starting session to access SESSION data
$accountDetails = $_SESSION['account'];
$employeeID = $accountDetails['empId'];
$employeeRole = $accountDetails['role'];

//include '../Patient/flutter/Authorization/generate_credentials.php';
$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
$count = count($_FILES['file']['name']);
if ($count > 1) {
    $uploadCounter = 0;
    for ($i = 0; $i < $count; $i++) {
        if (!empty($_FILES['file']['name'][$i]) && in_array($_FILES['file']['type'][$i], $csvMimes)) {
            if (is_uploaded_file($_FILES['file']['tmp_name'][$i])) {
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                fgetcsv($csvFile);
                
                $uploadCounter = 0;
                while (($row = fgetcsv($csvFile)) !== FALSE) {
                    //Personal Information
                    $first = $row[0];
                    $last = $row[1];
                    $middle = trim($row[2]);
                    $suffix = trim($row[3]);
                    $role = $row[4];
                    $barangay = trim($row[5]) != "" ?  $row[5] : "";
                    $contact = $row[6];
                    $type = $row[7];

                    insertEmployee($first, $last, $middle, $suffix, $role, $barangay, $contact);
                    $id = getEmployeeId($first, $last, $contact);
                    insertCredentials($id['employee_id'], $first, $last, $type);
                    $uploadCounter++;
                }
            }
        }
    }
    insertLogs($employeeID, $employeeRole, 'Upload', "Uploaded employee CSV files with $uploadCounter rows");
} else {
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $uploadCounter = 0;
            while (($row = fgetcsv($csvFile)) !== FALSE) {
                $first = $row[0];
                $last = $row[1];
                $middle = trim($row[2]);
                $suffix = trim($row[3]);
                $role = $row[4];
                $barangay = trim($row[5]) != "" ?  $row[5] : "";
                $contact = $row[6];
                $type = $row[7];

                insertEmployee($first, $last, $middle, $suffix, $role, $barangay, $contact);
                $id = getEmployeeId($first, $last, $contact);
                insertCredentials($id['employee_id'], $first, $last, $type);
                $uploadCounter++;
            }
            insertLogs($employeeID, $employeeRole, 'Upload', "Uploaded employee CSV file with $uploadCounter rows");
        }
    }
}