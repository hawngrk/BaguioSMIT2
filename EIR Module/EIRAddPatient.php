<?php
    require_once('../includes/configure.php');

    //Personal Information
    $firstname        = $_POST['firstname'];
    $lastname         = $_POST['lastname'];
    $middlename       = $_POST['middlename'];
    $suffix           = $_POST['suffix'];
    $birthdate        = $_POST['birthdate'];
    $age              = $_POST['age'];
    $gender           = $_POST['gender'];
    $occupation       = $_POST['occupation'];
    
    //Category Information
    $priorityGroup    = $_POST['priority'];
    $category         = $_POST['category'];
    $categoryID       = $_POST['categoryID'];
    $philHealthID     = $_POST['philhealthID'];
    $pwdID            = $_POST['pwdID'];
    
    //Address Information
    $houseAddress     = $_POST['houseAddress'];
    $barangay         = $_POST['barangay'];

    //For patient_account table
    $email            = $_POST['email'];
    $contact          = $_POST['contact'];

    //Inputs for patient_medical_background table
    $allergyToVaccine  = $_POST['allergy'];
    $hypertension      = $_POST['hypertension'];
    $heartDisease      = $_POST['heartDisease'];
    $kidneyDisease    = $_POST['kidneyDisease'];
    $diabetesMellitus  = $_POST['diabetesMellitus'];
    $bronchialAsthma   = $_POST['bronchialAsthma'];
    $immunodeficiency  = $_POST['immunodeficiency'];
    $cancer            = $_POST['cancer'];
    $otherCommorbidity = $_POST['otherCommorbidity'];



   if (verifyPatient($firstname, $lastname, $contact) == '1') {
     echo "Patient already exist";
   } else {
        $patientID = insertPatient($firstname, $lastname, $middlename, $suffix);
        insertDetails($patientID['patient_id'], $firstname, $lastname, $middlename, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $cmAddress, $province, $region, $birthdate, $age, $gender, $contact, $occupation, $priorityGroup, $barangay);
        insertMedicalBackground($patientID['patient_id'], $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity);
        $accountDetails = createAccount($patientID['patient_id'], $firstname, $lastname, $email);
        insertPatientVitals($patientID['patient_id']);
        //insertLogs($employeeID, $employeeRole, 'Add', 'Added patient ID: '.$patientID['patient_id']);
   }

//Inserts full name in the patient table
function insertPatient($firstname, $lastname, $middlename, $suffix) {
    $query = "INSERT INTO patient (patient_full_name, first_dose_vaccination, second_dose_vaccination, for_queue, token) VALUES (?, ?, ?, ?, ?)";
    try {        
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $fullName = toFullName($firstname, $lastname, $middlename, $suffix);
        $result = $stmtinsert->execute([$fullName, 0, 0, 0, 0]);
        if($result) {
            $id = getPatientId($fullName);

            return $id;

        }
    } catch (PDOException $e) {
        echo 'Error in insert patient', $e->getMessage();
    }
}

//Insert patient's personal details in patient details table
function insertDetails($patientID, $firstname, $lastname, $middlename, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age,$gender, $contact, $occupation, $barangay, $priority) {

    $query = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_category_id, patient_category_number, patient_philHealth, patient_pwd, patient_house_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation, Archived, barangay_id, priority_group_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CAST(? AS DATE), ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$patientID, $firstname, $lastname, $middlename, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age,$gender, $contact, $occupation, 0, $barangay, $priority]);
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
        $stmtinsert->execute([$patientID]);
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

function toFullName($firstName, $lastName, $middleName, $suffix) {
    $name = $lastName . ", " . $firstName . " " . $middleName . " " . $suffix;
    if ($middleName == " " && $suffix == "") {
        $name = $lastName . ", " . $firstName;
        return $name;
    } else if ($suffix == " " && $middleName != "") {
        $name = $lastName . ", " . $firstName . " " . $middleName;
        return $name;
    } else if ($middleName == "" && $suffix != "") {
        $name = $lastName . ", " . $firstName . " " . $suffix;
        return $name;
    } else {
        return $name;
    }
}

function createAccount($patientID, $firstname, $lastname, $email) {
    $query = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_email) VALUES(?,?,?,?)";
    $credentials = generateCredentials($patientID, $firstname, $lastname);

    $hashPassword = password_hash($credentials['password'], PASSWORD_DEFAULT);

    $stmtinsert = $GLOBALS['database']->prepare($query);
    $result = $stmtinsert->execute([$patientID, $credentials['username'], $hashPassword, $email]);

    return $result ? $credentials : '0';
}

//Generate login credentials using entered details of the patient
function generateCredentials($patientID, $firstname, $lastname) {
    $username = $firstname.$lastname;
    $toShuffle = $firstname.$lastname.$patientID;
    $password = str_shuffle($toShuffle);
    $credentials = array('username' => $username, 'password' => $password);
    return $credentials;
}

function verifyPatient($firstname, $lastname, $contact) {
    $query = "SELECT * FROM patient_details WHERE patient_last_name = ? AND patient_first_name = ? AND patient_contact_number = ?";

    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $stmtselect->execute([$lastname, $firstname, $contact]);
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

?>