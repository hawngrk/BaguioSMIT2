<?php
    require_once("../configure.php");

if(isset($_POST)){
    $patientId        = 0;
    $firstname        = $_POST['firstname'];
    $middlename       = $_POST['middlename'];
    $lastname         = $_POST['lastname'];
    $username         = $_POST['username'];
    $contactnumber    = $_POST['contact'];
    $picture          = NULL;
    $email            = $_POST['email'];
    $password         = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //Database queries
    $sql = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_picture, patient_email) VALUES(?,?,?,?,?)";
    
    $searchPatient = "SELECT * FROM patient_details WHERE patient_first_name = ? AND patient_last_name = ? AND patient_contact_number = ?";

    $searchUsername = "SELECT * FROM patient_account WHERE patient_username = ?";

    try {
        $stmselect = $database->prepare($searchPatient);
        $query = $stmselect->execute([$firstname, $lastname, 
        $contactnumber]);
        if ($stmselect->rowCount() > 0) {
            $checkUsername = $database->prepare($searchUsername);
            $verify = $checkUsername->execute([$username]);
            if(!$verify) {
                $patient = $stmselect->fetch(PDO::FETCH_ASSOC);
                $patientId = $patient["patient_id"];
                $stmtinsert = $database->prepare($sql);
                $result = $stmtinsert->execute([$patientId, $username, $password, $picture, $email]);
                if($result) {
                    echo 'Successfully registered.';
                } 
            } else {
                throw new Exception(header('HTTP/1.0 400 Username is already taken'));
            }
        } else {
            throw new Exception(header('HTTP/1.0 400 Patient does not exist'));
        }             
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    catch (PDOException $e) {
        die(header('HTTP/1.0 500 Database Server error'));
    } 
}