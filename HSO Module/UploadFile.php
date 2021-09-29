<?php
include '../includes/database.php';
$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
$count = count($_FILES['file']['name']);
if ($count > 1) {
    for ($i = 0; $i < $count; $i++) {
        if (!empty($_FILES['file']['name'][$i]) && in_array($_FILES['file']['type'][$i], $csvMimes)) {
            if (is_uploaded_file($_FILES['file']['tmp_name'][$i])) {
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                fgetcsv($csvFile);
                while (($row = fgetcsv($csvFile)) !== FALSE) {
                    $fName = $row[0];
                    $lName = $row[1];
                    $mName = $row[2];
                    $suffix = $row[3];
                    $priority = $row[4];
                    $category = $row[5];
                    $categoryId = $row[6];
                    $house = $row[7];
                    $barangay = $row[8];
                    $city = $row[9];
                    $province = $row[10];
                    $region = $row[11];
                    $birthdate = $row[12];
                    $age = $row[13];
                    $gender = $row[14];
                    $number = $row[15];
                    $occupation = $row[16];

                    $fullName = $fName . " " . $mName . " " . $lName . " " . $suffix;
                    $database->query("INSERT INTO patient (patient_full_name) VALUES ('$fullName');");
                    $dbase = $database->stmt_init();
                    $dbase->prepare("SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1");
                    $dbase->execute();
                    $dbase->bind_result($patientid);
                    $dbase->fetch();
                    $dbase->close();

                    $database->query("INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$fName', '$lName', '$mName', '$suffix', '$priority', '$category', '$categoryId', '$house', '$barangay', '$city', '$province', '$region', '$birthdate', '$age', '$gender', '$number', '$occupation');");
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
                $fName = $row[0];
                $lName = $row[1];
                $mName = $row[2];
                $suffix = $row[3];
                $priority = $row[4];
                $category = $row[5];
                $categoryId = $row[6];
                $house = $row[7];
                $barangay = $row[8];
                $city = $row[9];
                $province = $row[10];
                $region = $row[11];
                $birthdate = $row[12];
                $age = $row[13];
                $gender = $row[14];
                $number = $row[15];
                $occupation = $row[16];

                $fullName = $fName . " " . $mName . " " . $lName . " " . $suffix;
                $database->query("INSERT INTO patient (patient_full_name) VALUES ('$fullName');");
                $dbase = $database->stmt_init();
                $dbase->prepare("SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1");
                $dbase->execute();
                $dbase->bind_result($patientid);
                $dbase->fetch();
                $dbase->close();

                $database->query("INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$fName', '$lName', '$mName', '$suffix', '$priority', '$category', '$categoryId', '$house', '$barangay', '$city', '$province', '$region', '$birthdate', '$age', '$gender', '$number', '$occupation');");
            }
        }
    }
}
