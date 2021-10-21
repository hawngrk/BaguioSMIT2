<?php 
    include("../includes/configure.php");
    //Temporary script for hashing password
    $id = 6;
    $newPassword = password_hash("employee1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();
?>