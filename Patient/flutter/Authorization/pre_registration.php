<?php 
    header("Access-Control-Allow-Origin: *");
    require_once("validate_details.php");
    require_once("generate_credentials.php");
    require_once("../../../includes/configure.php");

    //Personal Information
    $firstname        = $_POST['firstname'];
    $lastname         = $_POST['lastname'];
    $middlename       = $_POST['middlename'];
    $suffix           = $_POST['suffix'];
    $birthdateRaw        = $_POST['birthdate'];
    $gender           = $_POST['gender'];
    $occupation       = $_POST['occupation'];
    
    $birthdate        = calculateAge($birthdateRaw);
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
        insertDetails($patientID['patient_id'], $firstname, $lastname, $middlename, $suffix, $priorityGroup, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age, $gender, $contact, $occupation, $barangay, $priority);
        insertMedicalBackground($patientID['patient_id'], $allergyToVaccine, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity);
        $accountDetails = createAccount($patientID['patient_id'], $firstname, $lastname, $email);
        insertPatientVitals($patientID);
        echo json_encode($accountDetails);
    }
    
//Inserts full name in the patient table
function insertPatient($firstname, $lastname, $middlename, $suffix) {
    $query = "INSERT INTO patient (patient_full_name, first_dose_vaccination, second_dose_vaccination, for_queue) VALUES (?, ?, ?, ?)";
    try {        
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $fullName = toFullName($firstname, $lastname, $middlename, $suffix);
        $result = $stmtinsert->execute([$fullName, 0, 0, 0]);
        if($result) {
            $id = getPatientId($fullName);
            return $id;  

        }
    } catch (PDOException $e) {
        echo 'Error in insert patient', $e->getMessage();
    }
}

//Insert patient's personal details in patient details table
function insertDetails($patientID, $firstname, $lastname, $middlename, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age, $civilStat, $gender, $contact, $occupation, $barangay, $priority) {

    $query = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_category_id, patient_category_number, patient_philHealth, patient_pwd, patient_house_address, patient_birthdate, patient_age, civil_status,patient_gender, patient_contact_number, patient_occupation, Archived, barangay_id, priority_group_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CAST(? AS DATE), ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$patientID, $firstname, $lastname, $middlename, $suffix, $category, $categoryID, $philHealthID, $pwdID, $houseAddress, $birthdate, $age, $civilStat, $gender, $contact, $occupation, 0, $barangay, $priority]);
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

function calculateAge($birthdate) {
    $currentDate = date("m/d/Y");
    $age = date_diff(date_create($birthdate), date_create($currentDate));
    return $age->format("%y");
}
}