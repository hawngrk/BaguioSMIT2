<?php
    require_once('pre_registration.php');
    require_once('validate_details.php');
    require_once("../../../includes/configure.php");

    //Insert patient account into the database
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