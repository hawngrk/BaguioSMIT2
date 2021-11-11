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
                    $occupation = $row[4];
                    $gender = $row[5];
                    $unformattedDate= $row[6];
                    $formattedBirthdate = date('Y-m-d',strtotime($unformattedDate));
                    $birthdate = $formattedBirthdate;
                    
                    $age = calculateAge($formattedBirthdate);
                    $fullName = toFullName($firstName, $lastName, $middleName, $suffix);

                    //category Information
                    $category = $row[7];
                    $categoryID = $row[8];
                    $philHealthID = $row[9];
                    $pwdID = $row[10];

                    //Clinical Information
                    $allergyToVaccine = $row[11];
                    $hypertension = $row[12];
                    $diabetesMellitus = $row[13];
                    $heartDisease = $row[14];
                    $bronchialAsthma = $row[15];
                    $kidneyDisease = $row[16];
                    $immunodeficiency = $row[17];
                    $cancer = $row[18];
                    $otherCommorbidity = $row[19];

                    //Address Information
                    $houseAddress = $row[20];


                    // Contact Information
                    $contact = $row[21];
                    $email = $row[22];

                    //Foreign key ID from priority and barangay table
                    $priorityGroup = $row[23];
                    $barangay = $row[24];

                    $patientID = insertPatientUpload($fullName);
                    insertDetails($patientID['patient_id'], $firstName, $lastName, $middleName, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age, $gender, $contact, $occupation, $barangay, $priorityGroup);
                    insertMedicalBackground($patientID['patient_id'], $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity);
                    $accountDetails = createAccount($patientID['patient_id'], $firstName, $lastName, $email);
                    insertPatientVitals($patientID);
                }
            }
        }
    }
    insertLogs($employeeID, $employeeRole, 'Upload', 'Uploaded patient csv files');
} else {
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            while (($row = fgetcsv($csvFile)) !== FALSE) {
                //Personal Information
                $firstName = $row[0];
                $lastName = $row[1];
                $middleName = trim($row[2]);
                $suffix = trim($row[3]);
                $occupation = $row[4];
                $gender = $row[5];
                $unformattedDate= $row[6];
                $formattedBirthdate = date('Y-m-d',strtotime($unformattedDate));
                $birthdate = $formattedBirthdate;
                
                $age = calculateAge($formattedBirthdate);
                $fullName = toFullName($firstName, $lastName, $middleName, $suffix);

                //category Information
                $category = $row[7];
                $categoryID = $row[8];
                $philHealthID = $row[9];
                $pwdID = $row[10];

                //Clinical Information
                $allergyToVaccine = $row[11];
                $hypertension = $row[12];
                $diabetesMellitus = $row[13];
                $heartDisease = $row[14];
                $bronchialAsthma = $row[15];
                $kidneyDisease = $row[16];
                $immunodeficiency = $row[17];
                $cancer = $row[18];
                $otherCommorbidity = $row[19];

                //Address Information
                $houseAddress = $row[20];


                // Contact Information
                $contact = $row[21];
                $email = $row[22];

                //Foreign key ID from priority and barangay table
                $priorityGroup = $row[23];
                $barangay = $row[24];

                $patientID = insertPatientUpload($fullName);
                insertDetails($patientID['patient_id'], $firstName, $lastName, $middleName, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age, $gender, $contact, $occupation, $barangay, $priorityGroup);
                insertMedicalBackground($patientID['patient_id'], $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity);
                $accountDetails = createAccount($patientID['patient_id'], $firstName, $lastName, $email);
                insertPatientVitals($patientID);
                
            }
            insertLogs($employeeID, $employeeRole, 'Upload', 'Uploaded patient csv file');
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

function calculateAge($birthdate) {
    $currentDate = date("m/d/Y");
    $age = date_diff(date_create($birthdate), date_create($currentDate));
    return $age->format("%y");
}

//Inserts full name in the patient table
function insertPatientUpload($fullName) {
    $query = "INSERT INTO patient (patient_full_name, first_dose_vaccination, second_dose_vaccination, for_queue) VALUES (?, ?, ?, ?)";
    try {        
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$fullName, 0, 0, 0]);
        if($result) {
            $id = getPatientId($fullName);
            return $id;  
        }
    } catch (PDOException $e) {
        echo 'Error in insert patient', $e->getMessage();
    }
    //Preparing statements to improve performance and avoid sql injection vulnerability
}

//Insert patient's personal details in patient details table
function insertDetails($patientID, $firstName, $lastName, $middleName, $suffix, $priorityGroup, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $barangay, $cmAddress, $province, $region, $birthdate, $age, $gender, $contact, $occupation) {

    $query = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_category_id, patient_category_number, patient_philHealth, patient_pwd, patient_house_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation, barangay_id, priority_group_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CAST(? AS DATE), ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $stmtinsert->execute([$patientID, $firstName, $lastName, $middleName, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age, $gender, $contact, $occupation, $barangay, $priorityGroup]); 
    } catch (PDOException $e) {
        echo 'Error in patient details: ', $e->getMessage();
    }
}

//Insert patient's personal details in medical_background table
function insertMedicalBackground($patientID, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity) {
    $query = "INSERT INTO medical_background (patient_id, allergy_to_vaccine,hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$patientID, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity]);
    } catch (PDOException $e) {
        echo 'Error in patient Med background: ', $e->getMessage();
    }
}

function insertPatientVitals($patientID) {
    $query = "INSERT INTO patient_vitals (patient_id) VALUES (?)";
    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $stmtinsert->execute([$patientID['patient_id']]);
    } catch (PDOException $e) {
        echo 'Error in patient Vitals: ', $e->getMessage();
    }
}

//Searches for patient and returns patient_id
function getPatientId($fullName) {
    $query = "SELECT patient_id FROM patient WHERE patient_full_name = ?";
    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $result = $stmtselect->execute([$fullName]);
        if($result) {
            return $stmtselect->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo 'Error in get patient ID: ', $e->getMessage();
    }
}

//Insert patient account into the database
function createAccount($patientID, $firstName, $lastName, $email) {
    $query = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_email) VALUES(?,?,?,?)";
    $credentials = generateCredentials($patientID, $firstName, $lastName);

    $hashPassword = password_hash($credentials['password'], PASSWORD_DEFAULT);

    $stmtinsert = $GLOBALS['database']->prepare($query);
    $result = $stmtinsert->execute([$patientID, $credentials['username'], $hashPassword, $email]);

    return $result ? $credentials : '0';
}

//Generate login credentials using entered details of the patient
function generateCredentials($patientID, $firstName, $lastName) {
    $username = $firstName.$lastName;
    $toShuffle = $firstName.$lastName.$patientID;
    $password = str_shuffle($toShuffle);
    $credentials = array('username' => $username, 'password' => $password);
    return $credentials;
}

//Check if the patient exists in the database
function verifyPatient($firstName, $lastName, $contact) {
    $query = "SELECT * FROM patient_details WHERE patient_last_name = ? AND patient_first_name = ? AND patient_contact_number = ?";

    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $stmtselect->execute([$lastName, $firstName, $contact]);
        return $stmtselect->rowCount() > 0 ? '1' : '0';
    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
}

//Check if the patient already registered an account in the database
function verifyAccount($patientID) {
    $query = "SELECT * FROM patient_account WHERE patient_id = ?";

    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $stmtselect->execute([$patientID]);
    
        return $stmtselect->rowCount() > 0 ? '1' : '0';
    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
}
