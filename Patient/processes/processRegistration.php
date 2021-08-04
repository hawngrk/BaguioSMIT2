<?php
    require_once("../includes/database.php");
?>
<?php
if(isset($_POST)){
    echo $_POST;
    $patient_id       = 1;
    $username         = $_POST['username'];
    $contactnumber    = $_POST['contact'];
    $picture          = NULL;
    $email            = $_POST['email'];
    $password         = sha1($_POST['password']);
    $sql = "INSERT INTO patient_account (patient_id, patient_username, patient_password, patient_picture, patient_email) VALUES(?,?,?,?,?)";
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