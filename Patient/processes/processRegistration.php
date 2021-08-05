<?php
    require_once("../includes/database.php");
?>
<?php
if(isset($_POST)){
    $patient_id       = 0;
    $firstname        = $_POST['firstname'];
    $middlename       = $_POST['middlename'];
    $lastname         = $_POST['lastname'];
    $username         = $_POST['username'];
    $contactnumber    = $_POST['contact'];
    $picture          = NULL;
    $email            = $_POST['email'];
    $password         = sha1($_POST['password']);
    $sql = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_picture, patient_email) VALUES(?,?,?,?,?)";
    
    $searchPatient = "SELECT * FROM patient_details WHERE patient_first_name = ? AND patient_last_name = ? AND patient_contact_number = ? LIMIT 1";
    try {
        $stmselect= $database ->prepare($searchPatient);
        $patient = $stmselect->execute([$firstname, $lastname, $contactnumber]);
    } catch (PDOException $e) {

    }
    try {
        $stmtinsert = $database->prepare($sql);
        $result = $stmtinsert->execute([$patient_id, $username, $password, $picture, $email]);
        if($result) {
            echo 'Successfully registered.';
        } else {
            echo 'There were errors while saving the data';
        }
    } catch(PDOException $e) {
        echo 'There were errors while saving the data';
    }

 } else {
        echo 'No data';
}