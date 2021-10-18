<?php
include '../includes/database.php';
include '../Patient/flutter/Authorization/generate_credentials.php';

$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
$count = count($_FILES['file']['name']);
if ($count > 1) {
    for ($i = 0; $i < $count; $i++) {
        if (!empty($_FILES['file']['name'][$i]) && in_array($_FILES['file']['type'][$i], $csvMimes)) {
            if (is_uploaded_file($_FILES['file']['tmp_name'][$i])) {
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                fgetcsv($csvFile);
                while (($row = fgetcsv($csvFile)) !== FALSE) {
                    //Personal Information
                    $lName = $row[0];
                    $mName = $row[1];
                    $suffix = $row[2];
                    $occupation = $row[3];
                    $age = $row[4];
                    $gender = $row[5];
                    $birthdate = $row[6];
                    
                    $fName = toFullName($firstName, $lastName, $middleName, $suffix);

                    //category Information
                    $priority = $row[7];
                    $category = $row[8];
                    $categoryId = $row[9];
                    $philHealthID = $row[10];
                    $pwdID = $row[11];

                    //Clinical Information
                    $allergyToVaccine = $row[12];
                    $hypertension = $row[13];
                    $diabetes = $row[14];
                    $heartDisease = $row[15];
                    $asthma = $row[16];
                    $kidneyDisease = $row[17];
                    $immunodificiency = $row[18];
                    $cancer = $row[19];
                    $otherCommorbidity = $row[20];

                    //Address Information
                    $house = $row[21];
                    $barangay = $row[22];
                    $city = $row[23];
                    $province = $row[24];
                    $region = $row[25];

                    // Contact Information
                    $number = $row[26];
                    $email = $row[27];

                    $database->query("INSERT INTO patient (patient_full_name) VALUES ('$fullName');");
                    $dbase = $database->stmt_init();
                    $dbase->prepare("SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1");
                    $dbase->execute();
                    $dbase->bind_result($patientid);
                    $dbase->fetch();
                    $dbase->close();

                    //Insert details of the patient
                    $database->query("INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_philHealth, patient_pwdID, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$fName', '$lName', '$mName', '$suffix', '$priority', '$category', '$categoryId', '$philHealthID', '$pwdID', '$house', '$barangay', '$city', '$province', '$region', CAST('$birthdate' AS DATE), '$age', '$gender', '$number', '$occupation');");

                    $database->query("INSERT INTO medical_background (patient_id, allergy_to_vaccine,hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUES ($patientid, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetes, $asthma, $immunodificiency, $cancer, $otherCommorbidity)");
                    createAccount($patientid, $firstName, $lastName, $email);
                }
            }
        }
    }
} else {
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            while (($row = fgetcsv($csvFile)) !== FALSE) {
                //Personal Information
                $lName = $row[0];
                $mName = $row[1];
                    $suffix = $row[2];
                    $occupation = $row[3];
                    $age = $row[4];
                    $gender = $row[5];
                    $birthdate = $row[6];
                    
                    $fName = toFullName($firstName, $lastName, $middleName, $suffix);

                    //category Information
                    $priority = $row[7];
                    $category = $row[8];
                    $categoryId = $row[9];
                    $philHealthID = $row[10];
                    $pwdID = $row[11];

                    //Clinical Information
                    $allergyToVaccine = $row[12];
                    $hypertension = $row[13];
                    $diabetes = $row[14];
                    $heartDisease = $row[15];
                    $asthma = $row[16];
                    $kidneyDisease = $row[17];
                    $immunodificiency = $row[18];
                    $cancer = $row[19];
                    $otherCommorbidity = $row[20];

                    //Address Information
                    $house = $row[21];
                    $barangay = $row[22];
                    $city = $row[23];
                    $province = $row[24];
                    $region = $row[25];

                    // Contact Information
                    $number = $row[26];
                    $email = $row[27];

                    $database->query("INSERT INTO patient (patient_full_name) VALUES ('$fullName');");
                    $dbase = $database->stmt_init();
                    $dbase->prepare("SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1");
                    $dbase->execute();
                    $dbase->bind_result($patientid);
                    $dbase->fetch();
                    $dbase->close();

                    //Insert details of the patient
                    $database->query("INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_philHealth, patient_pwdID, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$fName', '$lName', '$mName', '$suffix', '$priority', '$category', '$categoryId', '$philHealthID', '$pwdID', '$house', '$barangay', '$city', '$province', '$region', CAST('$birthdate' AS DATE), '$age', '$gender', '$number', '$occupation');");

                    $database->query("INSERT INTO medical_background (patient_id, allergy_to_vaccine,hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUES ($patientid, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetes, $asthma, $immunodificiency, $cancer, $otherCommorbidity)");
                    createAccount($patientid, $firstName, $lastName, $email);
            }
        }
    }
}
function toFullName($firstName, $lastName, $middleName, $suffix) {

    $name = $lastName . ", " . $firstName . " " . $middleName . " " . $suffix;
    if ($middleName == "" && $suffix == "") {
        $name = $lastName . ", " . $firstName;
        return $name;
    } else if ($suffix == "" && $middleName != "") {
        $name = $lastName . ", " . $firstName . " " . $middleName;
        return $name;
    } else if ($middleName == "" && $suffix != "") {
        $name = $lastName . ", " . $firstName . " " . $suffix;
        return $name;
    } else {
        return $name;
    }
}
               