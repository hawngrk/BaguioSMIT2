<?php

include("../includes/constructor.php");
include("../Admin/login.html");
include("../includes/database.php");

$data = "SELECT employee_username, employee_password, employee_account_type, employee_picture FROM employee_account";

$accounts = [];

$result = $database->query($data);

while($row = $result->fetch_assoc()) {
    $accounts[] = new employeeAccounts($row['employee_username'], $row['employee_password'], $row['employee_account_type'], $row['employee_picture']) ;
}

if(isset($_POST['loginButton'])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    foreach ($accounts as $accs){
        $accInfo = $accs->getEmpUsername();
        $passInfo = $accs->getEmpPassword();

        if ($accInfo == $username && $passInfo == $password) {
            session_start();
            header("Location: ../Admin/index.html");
            $_SESSION['username'] = $username;
        }
    }

    echo "<script>alert('Username or Password incorrect!')</script>";
    echo "<script>location.href='EmployeeLoginAuthentication.php'</script>";
}

?>

