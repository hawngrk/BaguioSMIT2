<?php
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION);
        header("location: patientLogin.php");
    }

    $account = $_SESSION['userlogin'];
    
    //Preview account
    echo '<pre>';
    echo($account['patient_id']);
    echo '</pre>';
?>

<h1>Welcome User</h1>

<a href="patientDashboard.php?logout=true">Logout</a>