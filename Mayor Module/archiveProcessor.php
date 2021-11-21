<?php
$accountDetails = $_SESSION['account'];
$barangay_id = $accountDetails['barangay_id'];
include("../includes/database.php");
include("../includes/recordActivityLog.php");
require_once "../require/getPriorityGroup.php";
require_once "../require/getBarangay.php";

//Starting session to access SESSION data
session_start();

$accountDetails = $_SESSION['account'];
$employeeID = $accountDetails['empId'];
$employeeRole = $accountDetails['role'];
$barangay_id = $accountDetails['barangay_id'];

if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id";

        $stmt = $database->stmt_init();
        $stmt->prepare($querySearch);
        $stmt->execute();
        $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
        while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                 <td>$empFName $empMName $empLName</td>
                 <td>$empRole </td>
                 <td>$empAccType</td>
                 <td>
                 <button class='buttonTransparentMayors' onclick='event.stopPropagation();archive(1, clickArchive, $empID)'><i class='fas fa-archive'></i></button>
                 <button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
                 </tr>";
        }

    } else if ($option == "UnArchive") {
        $query = "UPDATE `patient_details` SET `Archived`= 0 WHERE `patient_id` = '$archivedId'";
        $database->query($query);
//        insertLogs($employeeID, $employeeRole, 'Unarchive', 'Unarchived patient ID: '.$archivedId);

        echo'<table class="table table-row table-hover tableModal" id="patientTable1">
                        <thead>
                        <tr class="tableCenterCont">
                            <th>Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Complete Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

        $query1 = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id  WHERE patient_details.Archived = 1;";
        $stmt = $database->stmt_init();
        $stmt->prepare($query1);
        $stmt->execute();
        $stmt->bind_result($patientId, $fullname, $category, $patientAddress, $contactNum);
        while ($stmt->fetch()) {

            echo "<tr class='tableCenterCont'>
                        <td>$patientId</td>
                        <td>$fullname</td>
                        <td>$category</td>
                        <td>$patientAddress</td>
                        <td>$contactNum</td>
                        <td>
                            <div>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $patientId)'><i class='fa fa-archive'></i> unarchive</button>
                            </div>
                        </td>
                    </tr>";

        }
        echo"
                    </table>";
    }
}

if (isset($_POST['showUpdatedPatient'])){

      echo'<table class="table table table-hover tablePatient" id="patientTable1">
                    <thead>
                    <tr class="tableCenterCont">
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Category</th>
                        <th>Complete Address</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>';

                    $query = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";

                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($patientId, $fullname, $category, $patientAddress, $contactNum);
                    while ($stmt->fetch()) {
                    echo "<tr onclick='showPatient(this)' class='tableCenterCont'>
                                <td>$patientId</td>
                                <td>$fullname</td>
                                <td>$category</td>
                                <td>$patientAddress</td>
                                <td>$contactNum</td>
                                <td>
                                    <div class ='d-flex justify-content-center'>
                                        <button class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $patientId)'><i class='fa fa-archive'></i></button>
                                        <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewPatient($patientId)'><i class='fas fa-eye'></i></button
                                    </div>
                                </td>
                            </tr>";
                    }
                    echo'
                </table>';
}

if (isset($_POST['showUpdatedArchive'])){
    echo'<table class="table table-row table-hover tableModal" id="patientTable1">
                        <thead>
                        <tr class="tableCenterCont">
                            <th>Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Complete Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

                    $query = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id  WHERE patient_details.Archived = 1;";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($patientId, $fullname, $category, $patientAddress, $contactNum);
                    while ($stmt->fetch()) {

                                echo "<tr class='tableCenterCont'>
                        <td>$patientId</td>
                        <td>$fullname</td>
                        <td>$category</td>
                        <td>$patientAddress</td>
                        <td>$contactNum</td>
                        <td>
                            <div>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $patientId)'><i class='fa fa-archive'></i> unarchive</button>
                            </div>
                        </td>
                    </tr>";

                        }
                        echo"
                    </table>";
}
