<?php 
    require("generate_credentials.php");
    
    //Inputs for Patient_details table
    $firstname        = $_POST['firstname'];
    $lastname         = $_POST['lastname'];
    $middlename       = $_POST['middlename'];
    $suffix           = $_POST['suffix'];
    $priorityGroup    = $_POST['priority'];
    $category         = $_POST['category'];
    $categoryID       = $_POST['categoryID'];
    $houseAddress     = $_POST['houseAdress'];
    $barangay         = $_POST['barangay'];
    $cmAddress        = $_POST['cmAddress'];
    $province         = $_POST['province'];
    $region           = $_POST['region'];
    $birthdate        = $_POST['birthdate'];
    $age              = $_POST['age'];
    $gender           = $_POST['gender'];
    $occupation       = $_POST['occupation'];
    
    //For patient_account table
    $email            = $_post['email'];
    $contact          = $_POST['contact'];

    //Inputs for patient_medical_background table
    $allergyToVaccine  = $_POST['allergy'];
    $hypertension      = $_POST['hypertension'];
    $heartDisease      = $_POST['heartDisease'];
    $kidneyDiesease    = $_POST['kidneyDiesease'];
    $diabetesMellitus  = $_POST['diabetesMellitus'];
    $bronchialAsthma   = $_POST['bronchialAsthma'];
    $immunodeficiency  = $_POST['immunodeficiency'];
    $cancer            = $_POST['cancer'];
    $otherCommorbidity = $_POST['otherCommorbidity'];

    

//Inserts full name in the patient table
function insertPatient($firstname, $lastname) {
    require_once("../../configure.php");
    $query = "INSERT INTO patient (patient_full_name) VALUES (CONCAT($firstname,' ',$lastname))";

    //Preparing statements to improve performance and avoid sql injection vulnerability
    $stmtinsert = $database->prepare($sql);
    $result = $stmtinsert->execute();
    if($result) {
        //Add something here
    } else {
        //Add something here
    }   
}

//Searches for patient and returns patient_id
function searchPatient($firstname, $lastname) {
    require_once("../../configure.php");
    $fullName = $lastname + " " + $firstname;
    $query = "SELECT patient_id FROM patient WHERE ?";
    $stmtselect = $database->prepare($query);
    $result = $stmtselect->execute([$fullName]);

    if($result) {
        return $stmtselect->fetch(PDO::FETCH_ASSOC);
    }
}

//Insert patient's personal details in patient details table
function insertDetails($patientID, $firstname, $lastname, $middlename, $suffix, $priority, $category, $categoryID, $houseAddress, $barangay, $cmAddress, $province, $region, $birthdate, $age,$gender, $contact, $occupation) {
    require_once("../../configure.php");
    $query = "INSERT INTO `patient_details` (`patient_id`, `patient_first_name`, `patient_last_name`, `patient_middle_name`, `patient_suffix`, `patient_priority_group`, `patient_category_id`, `patient_category_number`, `patient_house_address`, `patient_barangay_address`, `patient_CM_address`, `patient_province`, `patient_region`, `patient_birthdate`, `patient_age`, `patient_gender`, `patient_contact_number`, `patient_occupation`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmtinsert = $database->prepare($query);
    $result = $stmtinsert->execute([$patientID, $firstname, $lastname, $middlename, $suffix, $priority, $category, $categoryID, $houseAddress, $barangay, $cmAddress, $province, $region, $birthdate, $age,$gender, $contact, $occupation]); 
    if($result) {
        echo 'Successful';
    } else {
        echo 'Existing';
    }
}

//Insert patient's personal details in medical_background table
function insertMedicalBackground($patientID, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDiesease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity) {
    require_once("../../configure.php");
    $query = "INSERT INTO `medical_background` (`patient_id`, `hypertension`, `heart_disease`, `kidney_disease`, `diabetes_mellitus`, `bronchial_asthma`, `immunodeficiency`, `cancer`, `other_commorbidity`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtinsert = $database->prepare($query);
    $result = $stmtinsert->exectute([$patientID, $allergyToVaccine, $hypertension, $heartDisease, $kidneyDiesease, $diabetesMellitus, $bronchialAsthma, $immunodeficiency, $cancer, $otherCommorbidity]);

    if($result) {
        echo 'success';
    } else {
        echo "query failed";
    }
}