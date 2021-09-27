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