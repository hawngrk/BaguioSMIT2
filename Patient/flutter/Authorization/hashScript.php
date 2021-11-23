<?php

    include("../../../includes/configure.php");
    //Temporary script for hashing password
    $id = 3;
    $username = 'patientLili';
    $newPassword = password_hash("patient1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE patient_account SET patient_username = '$username', patient_password = '$newPassword' WHERE patient_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();