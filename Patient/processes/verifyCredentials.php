<?php 
    session_start();
    require_once("../configure.php");

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];


    $sql = "SELECT * FROM patient_details where patient_first_name = ? AND patient_last_name = ? AND patient_contact_number = ?";

    try {
        $stmtselect = $database->prepare($sql);
        $result = $stmtselect->execute([$firstname, $lastname, $contact]);
        $row = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0) {
            $_SESSION['resetpassword'] = $row['patient_id'];
            echo '1';
        } else {
            echo 'The information does not exist';
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }