<?php
require_once("validate_details.php");
require_once("generate_credentials.php");
require_once("pre_registration.php");

// Test variables
// $firstname = 'Josh'; 
// $lastname = 'Radnor';
// $contact = '+6923003948';
// $email = 'JoshRadnor@gmail.com';


//Instantiate variable from user inputs 
$firstname = $_POST['John']; 
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];
$email = $_POST['email'];

//Account fully
if (verifyPatient($firstname, $lastname, $contact) == '1') {
    $id = getPatientId($firstname, $lastname);
    if (verifyAccount($id) == '1') {
        echo 'Account is already registered';
    } else {
        $accountDetails = createAccount($id['patient_id'], $firstname, $lastname, $email);
        echo json_encode($accountDetails);
    }
} else {
    echo 'Patient credentials does not exist';
}
