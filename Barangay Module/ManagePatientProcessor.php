<?php
include("../includes/database.php");
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($search === "") {
        $querySearch = "SELECT patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_full_name,  patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
    }
    echo "
    <thead>
            <tr>
                <th scope='col'>Patient Name</th>
                <th scope='col'>Category</th>
                <th scope='col'>Complete Address</th>
                <th scope='col'>Contact Number</th>
            </tr>
            </thead>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientName, $category, $patientAddress, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr>
                <td>$patientName</td>
                <td>$category</td>
                <td>$patientAddress</td>
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

//    $pet = $_POST['pet'];
//    $bite = $_POST['bite'];
//    $skin = $_POST['skin'];
//    $food = $_POST['food'];
//    $mold = $_POST['mold'];
//    $latex = $_POST['latex'];
//    $pollen = $_POST['pollen'];
//    $insect = $_POST['insect'];
//    $medication = $_POST['medication'];
//    if (empty($_POST['othersAllergies'])) {
//        $othersAllergies = "";
//    } else {
//        $othersAllergies = $_POST['othersAllergies'];
//    }
//
//    $cancer = $_POST['cancer'];
//    $asthma = $_POST['asthma'];
//    $diabetes = $_POST['diabetes'];
//    $hypertension = $_POST['hypertension'];
//    $heart = $_POST['heartDiseases'];
//    $kidney = $_POST['kidneyDiseases'];
//    if (empty($_POST['othersComorbidities'])) {
//        $othersComorbidities = "";
//    } else {
//        $othersComorbidities = $_POST['othersComorbidities'];
//    }

    $patientTableQuery = "INSERT INTO patient (patient_full_name) VALUE ('$fullName');";
    $database->query($patientTableQuery);

    $getPatientIdQuery = "SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getPatientIdQuery);
    $dbase->execute();
    $dbase->bind_result($patientid);
    $dbase->fetch();
    $dbase->close();

    $patient_detailsTableQuery = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$firstName', '$lastName', '$middleName', '$suffix', '$group', 'Other ID', '2191057', '$street', '$barangay', '$city', '$state', '$region', '$birthday', '20', '$gender', '$contactNumber', '$occupation');";
    $database->query($patient_detailsTableQuery);


//    $medical_backgroundTableQuery = "INSERT INTO medical_background (patient_id, skin_allergy, food_allergy, medication_allergy, insect_allergy, pollen_allergy, bite_allergy, latex_allergy, mold_allergy, pet_allergy, hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUE ('$patientid', '$skin', '$food', '$medication', '$insect', '$pollen', '$bite', '$latex', '$mold', '$pet', '$hypertension', '$heart', '$kidney', '$diabetes', '$asthma', '0', '$cancer', '');";
//    $database->query($medical_backgroundTableQuery);
    echo'<thead>
                <tr>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Complete Address</th>
                    <th scope="col">Contact Number</th>
                </tr>
                </thead>';

    require_once '../require/getPatientDetails.php';

    foreach ($patient_details as $pd) {
        $id = $pd->getPatientDeetPatId();
        $category = $pd->getPriorityGroup();
        $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
        $contact = $pd->getContact();

        if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
            $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
        } else if ($pd->getPatientSuffix() == null) {
            $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
        } else if ($pd->getPatientMName() == null) {
            $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
        } else {
            $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
        }

        echo "<tr>
                        <td>$name</td>
                        <td>$category</td>
                        <td>$fullAddress</td>
                        <td>$contact</td>
                    </tr>";
    }

}

if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE `patient_details` SET `Archived`= 1 WHERE `patient_id` = '$archivedId'";
        $database->query($query);

    } else if ($option == "UnArchive") {
        $query = "UPDATE `patient_details` SET `Archived`= 0 WHERE `patient_id` = '$archivedId'";
        $database->query($query);


        echo'<thead>
                <tr>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Complete Address</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>';

        require_once '../require/getPatientDetails.php';

        foreach ($patient_details as $pd) {
            if ($pd->getArchived() == 1) {
                $id = $pd->getPatientDeetPatId();
                $category = $pd->getPriorityGroup();
                $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
                $contact = $pd->getContact();

                if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
                } else if ($pd->getPatientSuffix() == null) {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
                } else if ($pd->getPatientMName() == null) {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
                } else {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
                }

                echo "<tr>
                        <td>$name</td>
                        <td>$category</td>
                        <td>$fullAddress</td>
                        <td>$contact</td>
                        <td>
                            <div style='text-align: left;'>
                                <button class='buttonTransparent hyperlink' onclick='archive(0, clickArchive, $id)'>unarchive<i class='fa fa-archive'></i></button>
                            </div>
                        </td>
                    </tr>";
            }
        }

    }
}

if (isset($_POST['patientId'])) {
    require_once ('../require/getPatientDetails.php');
    require_once ('../require/getPatient.php');

    $patId = $_POST['patientId'];

    foreach ($patient_details as $patient){
        if($patient->getPatientDeetPatId() == $patId){
            $group = $patient->getPriorityGroup();
            $age = $patient->getAge();
            $gender = $patient->getGender();
            $contact = $patient->getContact();
        }
    }

    foreach ($patients as $pat){
        if ($pat->getPatientId() == $patId){
            $name = $pat->getPatientFullName();
        }
    }

    echo "      
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'><br>
                
                <h1> REGISTERED <i class='far fa-check-circle' style='color: green'></i></h1><br><br>
                
                <h5>Full Name: $name</h5><br>
                <h5>Gender: $gender</h5><br>
                <h5>Age: $age</h5><br>
                <h5>Contact Number: $contact</h5><br>
                
                <button id='postVac' class='btn-success' type='submit' style='width: 50%; float: right' onclick='queuePatient($patId)'>Confirm Registration</button>";

}

if (isset($_POST['passport'])) {
    require_once ('../require/getPatientDetails.php');
    require_once ('../require/getPatient.php');

    $passportId = $_POST['passport'];

    foreach ($patient_details as $patient){
        if($patient->getPatientDeetPatId() == $passportId){
            $group = $patient->getPriorityGroup();
            $age = $patient->getAge();
            $gender = $patient->getGender();
            $contact = $patient->getContact();
        }
    }

    foreach ($patients as $pat){
        if ($pat->getPatientId() == $passportId){
            $patientId = $pat->getPatientId();
            $name = $pat->getPatientFullName();
        }
    }

    echo "      
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'><br>
                
                <h1> REGISTERED <i class='far fa-check-circle' style='color: green'></i></h1><br><br>
                
                <h5>Full Name: $name</h5><br>
                <h5>Gender: $gender</h5><br>
                <h5>Age: $age</h5><br>
                <h5>Contact Number: $contact</h5><br>
                
                <button id='postVac' class='btn-success' type='submit' style='width: 50%; float: right' onclick='queuePatient($patientId)'>Confirm Registration</button>";

}

if (isset($_POST['queue'])){
    $queuedId = $_POST['queue'];

    $query = "UPDATE patient SET for_queue ='1' WHERE patient_id = $queuedId";
    $database->query($query);
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

if (isset($_POST['delegation'])){

    $drId = $_POST['delegation'];

    $query = "SELECT A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, A6_stubs FROM barangay_stubs WHERE drive_id = '$drId' AND barangay_id = '113';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($A1, $A2, $A3, $A4, $A5, $A6);
    $stmt->fetch();
    $stmt->close();

    echo '<div id="stubDelegationNotice">
                <center>
                    <h5>Stub Delegation Notice</h5>
                </center>
                <hr>
                <p> Special Service Division has sent:</p>';

    $availableStubs = [$A1, $A2, $A3, $A4, $A5, $A6];
    $priorityStub = [];
    $values = [];

    for ($i = 0; $i < 5; $i++) {
        if ($availableStubs[$i] != 0) {
            $priorityStub[] = "A" . $i + 1;
            $values[] = $availableStubs[$i];
        }
    }

    foreach ($priorityStub as $ps) {
        foreach ($values as $value)
            echo "<p> $value $ps stubs</p><br>";
    }

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
                    <h5>A6</h5>
                   <p>$A6</p>
                </div>
            </div>
        </div>";
}

if (isset($_POST['open'])){
    $query = "UPDATE barangay_stubs SET notif_opened = '1' WHERE notif_opened = '0'";
    $database->query($query);
}