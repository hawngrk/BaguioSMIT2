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
    $password         = sha1($_POST['password']);

    //Database queries
    $sql = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_picture, patient_email) VALUES(?,?,?,?,?)";
    
    $searchPatient = "SELECT * FROM patient_details WHERE patient_first_name = ? AND patient_last_name = ? AND patient_contact_number = ?";

    try {
        $stmselect= $database->prepare($searchPatient);
        $query = $stmselect->execute([$firstname, $lastname, 
        $contactnumber]);
        $patient = $stmselect->fetch(PDO::FETCH_ASSOC);
        if ($stmselect->rowCount() > 0) {
            $patientId = $patient["patient_id"];
            $stmtinsert = $database->prepare($sql);
            $result = $stmtinsert->execute([$patientId, $username, $password, $picture, $email]);
            if($result) {
                echo 'Successfully registered.';
            } else {
                die(header("Account was not registered"));
            }
        } else {
            throw new Exception(header('HTTP/1.0 400 Patient does not exist'));
        }             
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    catch (PDOException $e) {
        die(header('HTTP/1.0 500 Server error'));
    } 
}