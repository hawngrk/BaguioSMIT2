<?php
    require_once("../configure.php");
?>
<?php
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
    $sql = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_picture, patient_email) VALUES(?,?,?,?,?)";
    
    $searchPatient = "SELECT * FROM patient_details WHERE patient_first_name = ? AND patient_last_name = ? AND patient_contact_number = ?";

    try {
        $stmselect= $database->prepare($searchPatient);
        $query = $stmselect->execute([$firstname, $lastname, 
        $contactnumber]);
        $patient = $stmselect->fetch(PDO::FETCH_ASSOC);
        if ($stmselect->rowCount() > 0) {
            $patientId = $patient["patient_id"];
        } elseif ($patientId = 0) {
            throw new Exception('Patient was not found in the database');
        } 

    } catch (PDOException $e) {
        echo '<p>There were errors while finding the patient</p>';
    } catch (Exception $e) {
        echo $e;
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
        echo 'Caught exception: ',  $e->getMessage();
    }
}