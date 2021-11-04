<?php
/***
 * @Author Hudson Kit P. Natividad
 * Date Created: June 28, 2021
 * Description: allow session to start when credentials needed are entered correctly.
 */

//initial session handling subject to change - Natividad Hudson Kit P.
session_start();


if(!isset($_SESSION['account'])) {
    header("Location:../Admin/login.php");
} else {
    $accountDetails = $_SESSION['account'];
    if ($accountDetails['role'] == 'Barangay') {
        header("Location:../Barangay Module/homeBarangayModule.php");
    }
    
    if ($accountDetails['role'] == 'Monitoring') {
        header("Location:../Monitoring Module/ScanQRMonitoring.php");
    }
    
    if ($accountDetails['role'] == 'Screening') {
        header("Location:../Barangay Module/homeBarangayModule.php");
    }

    if ($accountDetails['role'] == 'HSO') {
        header("Location:../HSO Module/HSOdash.php");
    }

    if ($accountDetails['role'] == 'EIR') {
        header("Location:../EIR Module/.php");
    }

    if ($accountDetails['role'] == 'SSD') {
        header("Location:../Ssd Module/homeSsdModule.php");
    }

    if ($accountDetails['role'] == "Mayor's Office") {
        header("Location:../Mayor Module/UsersLog.php");
    }

}
?>