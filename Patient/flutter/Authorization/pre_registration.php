<?php 
    require_once("validate_details.php");
    require_once("generate_credentials.php");
    require_once("../../../includes/configure.php");

    $firstname        = $_POST['firstname'];
    $lastname         = $_POST['lastname'];
    $middlename       = $_POST['middlename'];
    $suffix           = $_POST['suffix'];
    $priorityGroup    = $_POST['priority'];
    $category         = $_POST['category'];
    $categoryID       = $_POST['categoryID'];
    $categoryID       = $_POST['philhealthID'];
    $categoryID       = $_POST['pwdID'];
    $houseAddress     = $_POST['houseAdress'];
    $barangay         = $_POST['barangay'];
    $cmAddress        = $_POST['cmAddress'];
    $province         = $_POST['province'];
    $region           = $_POST['region'];
    $birthdate        = $_POST['birthdate'];
    $age              = getAge($birthdate);
    $gender           = $_POST['gender'];
    $occupation       = $_POST['occupation'];
    
    //For patient_account table
    $email            = $_post['email'];
    $contact          = $_POST['contact'];

    //Inputs for patient_medical_background table
    $allergyToVaccine  = $_POST['allergy'];
    $hypertension      = $_POST['hypertension'];
    $heartDisease      = $_POST['heartDisease'];
    $kidneyDiesease    = $_POST['kidneyDisease'];
    $diabetesMellitus  = $_POST['diabetesMellitus'];
    $bronchialAsthma   = $_POST['bronchialAsthma'];
    $immunodeficiency  = $_POST['immunodeficiency'];
    $cancer            = $_POST['cancer'];
    $otherCommorbidity = $_POST['otherCommorbidity'];
    if (verifyPatient($firstname, $lastname, $contact) == '1') {
      echo "Patient already exist";  
    } else {
        $patientID = insertPatient($firstname, $lastname);
        echo 'Patient_ID', $patientID['patient_id'];
        insertDetails($patientID['patient_id'], $firstname, $lastname, $middlename, $suffix, $priorityGroup, $category, $categoryID, $houseAddress, $barangay, $cmAddress, $province, $region, $birthdate, $age, $gender, $contact, $occupation);
        insertMedicalBackground($patientID['patient_id'], $allergyToVaccine, $hypertension, $heartDisease, $kidneyDiesease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity);
        $accountDetails = createAccount($patientID['patient_id'], $firstname, $lastname, $email);
        echo json_encode($accountDetails);
    }
    
//Inserts full name in the patient table
function insertPatient($firstname, $lastname) {
    $query = "INSERT INTO patient (patient_full_name) VALUES (CONCAT(?,' ',?))";
    try {        
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$firstname, $lastname]);
        if($result) {
            $id = getPatientId($firstname, $lastname);
            return $id;  
        }
    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
    //Preparing statements to improve performance and avoid sql injection vulnerability
}

//Insert patient's personal details in patient details table
function insertDetails($patientID, $firstname, $lastname, $middlename, $suffix, $priority, $category, $categoryID, $houseAddress, $barangay, $cmAddress, $province, $region, $birthdate, $age,$gender, $contact, $occupation) {

    $query = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CAST(? AS DATE), ?, ?, ?, ?)";

    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$patientID, $firstname, $lastname, $middlename, $suffix, $priority, $category, $categoryID, $houseAddress, $barangay, $cmAddress, $province, $region, $birthdate, $age,$gender, $contact, $occupation]); 
    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
}

//Insert patient's personal details in medical_background table
function insertMedicalBackground($patientID, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDiesease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity) {
    $query = "INSERT INTO medical_background (patient_id, allergy_to_vaccine,hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try {
        $stmtinsert = $GLOBALS['database']->prepare($query);
        $result = $stmtinsert->execute([$patientID, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDiesease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity]);
    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
}

//Searches for patient and returns patient_id
function getPatientId($firstname, $lastname) {
    $query = "SELECT patient_id FROM patient WHERE patient_full_name = CONCAT (?, ' ', ? )";
    try {
        $stmtselect = $GLOBALS['database']->prepare($query);
        $result = $stmtselect->execute([$firstname, $lastname]);
        if($result) {
            return $stmtselect->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
}

function getAge($birthDate) {
    //explode the date to get month, day and year
    $birthDate = explode("/", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));

    return $age;

}