<?php 
    include("../includes/configure.php");
    //Temporary script for hashing password
    $id = 1;
    $username = 'employeeChandler';
    $newPassword = password_hash("employee1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_username = '$username', employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();

    $id = 2;
    $username = 'employeeMonica';
    $newPassword = password_hash("employee1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_username = '$username', employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();

    $id = 3;
    $username = 'employeeRoss';
    $newPassword = password_hash("employee1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_username = '$username', employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();

    $id = 4;
    $username = 'employeeJoseph';
    $newPassword = password_hash("employee1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_username = '$username', employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();

    $id = 5;
    $username = 'employeeRachel';
    $newPassword = password_hash("employee1", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_username = '$username', employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();

    $id = 9;
    $username = 'employeeJecelito';
    $newPassword = password_hash("employee9Batac", PASSWORD_DEFAULT);
    $updateQuery = "UPDATE employee_account SET employee_username = '$username', employee_password = '$newPassword' WHERE employee_account_id = '$id'";

    $stmtupdate = $database->prepare($updateQuery);
    $stmtupdate->execute();
?>