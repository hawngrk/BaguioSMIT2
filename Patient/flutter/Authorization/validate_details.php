<?php
require_once("../../../includes/configure.php");
//Check if the patient exists in the database
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