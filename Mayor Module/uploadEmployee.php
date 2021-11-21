<?php
require_once('../includes/configure.php');
require_once('../includes/recordActivityLog.php');
session_start();

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

                while (($row = fgetcsv($csvFile)) !== FALSE) {
                    //Personal Information
                    $firstName = $row[0];
                    $lastName = $row[1];
                    $middleName = trim($row[2]);
                    $suffix = trim($row[3]);
                    $role = $row[4];
                    $barangay = trim($row[5]) != "" ?  $row[5] : "";
                    $contact = $row[6];
                    $type = $row[7];

                    $uploadCounter = $i;
                }
            }
        }
    }
    insertLogs($employeeID, $employeeRole, 'Upload', "Uploaded employee csv files with $uploadCounter rows");
} else {
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $uploadCounter = 0;
            while (($row = fgetcsv($csvFile)) !== FALSE) {
                $firstName = $row[0];
                $lastName = $row[1];
                $middleName = trim($row[2]);
                $suffix = trim($row[3]);
                $role = $row[4];
                $barangay = trim($row[5]) != "" ?  $row[5] : "";
                $contact = $row[6];
                $type = $row[7];


                $uploadCounter++;
            }
            insertLogs($employeeID, $employeeRole, 'Upload', 'Uploaded patient csv file');
        }
    }
}


function insertEmployee($firstName, $lastName, $middleName, $suffix, $role, $barangay, $contact) {
    $query = "INSERT INTO employee(employee_first_name, employee_last_name, employee_middle_name, employee_suffix, employee_role, barangay_id, employee_contact_number) VALUES(?, ?, ?, ?, ?, ?, ?) RETURN ";

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $stmtinsert->execute([$firstName, $lastName, $middleName, $suffix, $role, $barangay, $contact]);
        $id = getEmployeeId($firstName, $lastName, $contact);
        return $id;
    } catch(PDOException $e) {
        //echo 'Caught exception: ', $e->getMessage();
        throw new Exception(header('HTTP/1.0 400 Invalid csv file uploaded'));
    } catch(Exception $e) {
        //echo 'Caught exception: ', $e->getMessage();
        throw new Exception(header('HTTP/1.0 400 Invalid csv file uploaded'));
    }

}

//Searches for patient and returns patient_id
function getEmployeeId($firstName, $lastName, $contact) {
    $query = "SELECT employee FROM employee WHERE employee_first_name = ? AND employee_last_name = ? AND employee_contact_number = ?";
    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $result = $stmtselect->execute([$firstName, $lastName, $contact]);
        if($result) {
            return $stmtselect->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo 'Error in get patient ID: ', $e->getMessage();
    }
}

function insertCredentials($id, $firstName, $lastName, $type) {
    $query = 
    "INSERT INTO employee_account(employee_id, employee_username, employee_password, employee_account_type) VALUES(?,?,?,?)";

    $username = "e$id"."$firstName";
    $password = "employee$id"."$lastName";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmtinsert = $GLOBALS['database']->prepare($query);
    $result = $stmtinsert->execute([$id, $username, $hashedPassword, $type]);
}