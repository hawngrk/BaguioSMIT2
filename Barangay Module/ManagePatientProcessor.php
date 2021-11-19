<?php
include("../includes/database.php");
//include("../includes/recordActivityLog.php");
require_once "../require/getPriorityGroup.php";
require_once "../require/getBarangay.php";


//Starting session to access SESSION data
session_start();

$accountDetails = $_SESSION['account'];
$employeeID = $accountDetails['empId'];
$employeeRole = $accountDetails['role'];
$barangay_id = $accountDetails['barangay_id'];

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($search == "") {
        $querySearch = "SELECT patient.patient_full_name,  patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_full_name,  patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
    }
    echo "
    <thead>
            <tr>
                <th scope='col'>Patient Name</th>
                <th scope='col'>Contact Number</th>
            </tr>
            </thead>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientName, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr>
                <td>$patientName</td>
                <td>$contactNum</td>
                </tr>";
    }
}

if (isset($_POST['lastname'])) {
    $lastName = $_POST['lastname'];
    $firstName = $_POST['firstname'];
    $middleName = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $group = $_POST['priority'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $birthday = $_POST['birthday'];
    $contactNumber = $_POST['contactnumber'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $region = $_POST['region'];

    $fullName = $lastName . " " . $firstName . " " . $middleName . " ";

    foreach($priorityGroups as $priority){
        if($priority->getPriorityGroup() == $group){
            $priorityId = $priority->getPriorityGroupId();
        }
    }

    foreach ($barangays as $barangay){
        if($barangay->getBarangayName() == $barangay){
            $barangayId = $barangay->getBarangayId();
        }
    }

    $patientTableQuery = "INSERT INTO patient (patient_full_name) VALUE ('$fullName');";
    $database->query($patientTableQuery);

    $getPatientIdQuery = "SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getPatientIdQuery);
    $dbase->execute();
    $dbase->bind_result($patientid);
    $dbase->fetch();
    $dbase->close();

    $patient_detailsTableQuery = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix,patient_category_id, patient_category_number, patient_house_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation, Archived, barangay_id, priority_group_id) VALUE ('$patientid', '$firstName', '$lastName', '$middleName', '$suffix', 'Other ID', '2191057', '$street', '$city', '$state', '$region', '$birthday', '20', '$gender', '$contactNumber', '$occupation', '0', '$barangayId', '$priorityId' );";
    $database->query($patient_detailsTableQuery);

}

if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE `patient_details` SET `Archived`= 1 WHERE `patient_id` = '$archivedId'";
        $database->query($query);
//        insertLogs($employeeID, $employeeRole, 'Archive', 'Archived patient ID: '.$archivedId);

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

        $query1 = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";

        $stmt = $database->stmt_init();
        $stmt->prepare($query1);
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

if (isset($_POST['patientId'])) {
    require_once ('../require/getPatientDetails.php');
    require_once ('../require/getPatient.php');

    $patId = $_POST['patientId'];

    $query = "SELECT patient.patient_full_name, patient_details.patient_gender, patient_details.patient_contact_number, patient_details.patient_age, priority_groups.priority_group, patient_details.patient_occupation FROM patient_details JOIN patient on patient_details.patient_id = patient.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE patient_details.patient_id = $patId;";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name, $gender, $contact, $age, $group, $pOccupation);
    $stmt->fetch();
    $stmt->close();

    echo "      
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'><br>
                
                <h1> REGISTERED <i class='far fa-check-circle' style='color: green'></i></h1><br><br>
                
                <h5><b>Full Name: </b> $name</h5><br>
                <h5><b>Gender: </b> $gender</h5><br>
                <h5><b>Age: </b> $age</h5><br>
                <h5><b>Contact Number: </b> $contact</h5><br>
                <h5><b>Occupation: </b> $pOccupation</h5><br>
                <h5><b>Priority Group: </b> $group</h5><br>
                
                <button id='postVac' class='btn btn-success' type='submit' style='float: right' onclick='queuePatient($patId)'>Confirm Registration</button>";

}

if (isset($_POST['passport'])) {
    require_once ('../require/getPatientDetails.php');
    require_once ('../require/getPatient.php');

    $passportId = $_POST['passport'];

    $query = "SELECT patient.patient_full_name, patient_details.patient_gender, patient_details.patient_contact_number, patient_details.patient_age, priority_groups.priority_group FROM patient_details JOIN patient on patient_details.patient_id = patient.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE patient_details.patient_id = $passportId;";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name, $gender, $contact, $age, $group);
    $stmt->fetch();
    $stmt->close();

    echo "      
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'><br>
                
                <h1> REGISTERED <i class='far fa-check-circle' style='color: green'></i></h1><br><br>
                
                <h5>Full Name: $name</h5><br>
                <h5>Gender: $gender</h5><br>
                <h5>Age: $age</h5><br>
                <h5>Contact Number: $contact</h5><br>
                
                <button id='postVac' class='btn-success' type='submit' style='width: 50%; float: right' onclick='queuePatient($passportId)'>Confirm Registration</button>";

}

if (isset($_POST['queue'])){
    $queuedId = $_POST['queue'];


    $query = "UPDATE patient SET for_queue ='1' WHERE patient_id = $queuedId";
    $database->query($query);

    $query1 = "SELECT first_dose_queue FROM patient_barangay_queue WHERE barangay_id = '$barangay_id' ORDER BY first_dose_queue DESC LIMIT 1";
    $stmt = $database->stmt_init();
    $stmt->prepare($query1);
    $stmt->execute();
    $stmt->bind_result($nxtQueue);
    $stmt->fetch();
    $stmt->close();

    if ($nxtQueue == 0){
        $nxtQueue = 1;
    } else {
        $nxtQueue = $nxtQueue + 1;
    }

    $query2 = "INSERT INTO patient_barangay_queue (patient_id, barangay_id, first_dose_queue, second_dose_queue) VALUES ($queuedId, $barangay_id, $nxtQueue ,0)";
    $database->query($query2);

}

if (isset($_POST['notifStubs'])) {
    $query = "SELECT barangay_stubs.A1_stubs, barangay_stubs.A2_stubs, barangay_stubs.A3_stubs, barangay_stubs.A4_stubs, barangay_stubs.A5_stubs, barangay_stubs.A6_stubs, barangay_stubs.notif_opened, vaccination_sites.location, vaccination_drive.vaccination_date FROM barangay_stubs JOIN vaccination_drive ON vaccination_drive.drive_id = barangay_stubs.drive_id JOIN vaccination_sites ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id WHERE barangay_id = '113';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($A1, $A2, $A3, $A4, $A5, $A6, $opened, $locName, $date);
    while ($stmt->fetch()) {

        $availableStubs = [$A1, $A2, $A3, $A4, $A5, $A6];
        $priorityStub = [];
        $values = [];

        for ($i = 0; $i < 5; $i++) {
            if ($availableStubs[$i] != 0) {
                $priorityStub[] = "A" . $i + 1;
                $values[] = $availableStubs[$i];
            }
        }

        if ($opened == 1) {
            echo "
                                                        <div style='color: #9C9C9C'>
                                                            <p>Stubs:<br>";
            foreach ($priorityStub as $ps) {
                foreach ($values as $value)
                    echo " $ps: $value </p>";
            }

            echo "
                                                            <p>Vaccination Location: $locName<br>
                                                               Date: $date <br>
                                                            </p>
                                                        </div>
                                                      <hr style='width: 100%; background: azure'>
                                                      ";
        } else {

            echo "
                                                   <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>

                                                        <div style='background: lightgray'>
                                                             <h4>Stubs:</h4>";

            foreach ($priorityStub as $ps) {
                foreach ($values as $value)
                    echo " <h3>$ps: $value </h3> <br>";
            }

            echo "
                                                            <p>Vaccination Location: $locName<br>
                                                               Date: $date <br>
                                                            </p>
                                                        </div>
                                                      <hr style='width: 100%; background: azure'>";
        }
    }
}

if (isset($_POST['delegations'])){
    $drId = $_POST['delegations'];
    $barangay_Id = $_POST['barangayId'];

    $query = "SELECT A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, ROAP, A3_Pedia, ROPP, second_dose FROM barangay_stubs WHERE drive_id = '$drId' AND barangay_id = '$barangay_Id';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($A1, $A2, $A3, $A4, $A5, $roap, $A3P, $ROPP, $secondStubs);
    $stmt->fetch();
    $stmt->close();

    $totalStubs = $A1 + $A2 + $A3 + $A4 + $A5 + $roap + $A3P + $ROPP;

    echo "<div id='stubDelegationNotice'>
                <center>
                    <h5>Stub Delegation Notice</h5>
                </center>
                <hr>
                <p> Special Service Division has sent $totalStubs  First Dose Stubs and $secondStubs Second dose stubs";

    echo"
             </div>
            <div id='availableStubs'>
                <center>
                    <h5>Available Stubs</h5>
                </center>
                <hr>
                <div class='priorityGroup'>
                    <h5>A1</h5>
                    <p>$A1</p>
                </div>
                <div class='priorityGroup'>
                    <h5>A2</h5>
                   <p>$A2</p>
                </div>
                <div class='priorityGroup'>
                    <h5>A3</h5>
                 <p>$A3</p>
                </div>
                <div class='priorityGroup'>
                    <h5>A4</h5>
                  <p>$A4</p>
                </div>
                <div class='priorityGroup'>
                    <h5>A5</h5>
                   <p>$A5</p>
                </div>
                <div class='priorityGroup'>
                    <h5>ROAP</h5>
                   <p>$roap</p>
                </div>
                <div class='priorityGroup'>
                    <h5>A3_Pedia</h5>
                   <p>$A3P</p>
                </div>
                <div class='priorityGroup'>
                    <h5>ROPP</h5>
                   <p>$ROPP</p>
                </div>
                <div class='priorityGroup'>
                    <h5>Second Dose</h5>
                    <p>$secondStubs</p>
                </div>
            </div>
        </div>";
}

if (isset($_POST['open'])){
    $query = "UPDATE barangay_stubs SET notif_opened = '1' WHERE notif_opened = '0'";
    $database->query($query);
}

if (isset($_POST['notification'])){

    $query = "SELECT barangay_stubs.drive_id, barangay_stubs.A1_stubs, barangay_stubs.A2_stubs, barangay_stubs.A3_stubs, barangay_stubs.A4_stubs, barangay_stubs.A5_stubs, barangay_stubs.ROAP, barangay_stubs.A3_Pedia, barangay_stubs.ROPP, barangay_stubs.second_dose, barangay_stubs.notif_opened, vaccination_sites.location, vaccination_drive.vaccination_date FROM barangay_stubs JOIN vaccination_drive ON vaccination_drive.drive_id = barangay_stubs.drive_id JOIN vaccination_sites ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id WHERE barangay_id = '$barangay_id';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($driveId, $A1, $A2, $A3, $A4, $A5, $roap, $secondStubs, $A3P, $ROPP, $opened, $locName, $date);
    echo "<table class='tableScroll7 px-4 py-2'>
                                        <tr><td><h4>Notifications<hr></h4></td></tr>";
    while ($stmt->fetch()) {

        $totalStubs = $A1 + $A2 + $A3 + $A4 + $A5 + $roap + $A3P + $ROPP;


        if ($opened == 1) {
            echo " <tr>
                                                       <td> First Dose Stubs: $totalStubs<br>
                                                            Second Dose Stubs: $secondStubs<br>
                                                            Vaccination Location: $locName<br>
                                                            Date: $date <br><hr>
                                                       </td>
                                                   </tr>";
        } else {
            echo "<tr onclick='updateBarangayHome($driveId, $barangay_id); closeModal(\"notificationModal\")'>
                                                       <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>
                                                       <td style='background: lightgray'>
                                                            First Dose Stubs: $totalStubs<br>
                                                            Second Dose Stubs: $secondStubs<br>
                                                            Vaccination Location: $locName<br>
                                                            Date: $date <br><hr>
                                                       </td>
                                                  </tr>
                                                                         ";
        }
    }
    echo "</table>";

}
