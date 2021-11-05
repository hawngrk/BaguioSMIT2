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
} 

function checkRole($currentPage) {
    $empRole = $_SESSION['account'];
    if($empRole['role'] != $currentPage) {
        if ($empRole['role'] == 'Barangay') {
            header("Location:../Barangay Module/homeBarangayModule.php");
        }
        
        if ($empRole['role'] == 'Monitoring') {
            header("Location:../Monitoring Module/ScanQRMonitoring.php");
        }
        
        if ($empRole['role'] == 'Screening') {
            header("Location:../Barangay Module/homeBarangayModule.php");
        }

        if ($empRole['role'] == 'HSO') {
            header("Location:../HSO Module/HSOdash.php");
        }

        if ($empRole['role'] == 'EIR') {
            header("Location:../EIR Module/EIRHomeScreening.php");
        }

        if ($empRole['role'] == 'SSD') {
            header("Location:../Ssd Module/homeSsdModule.php");
        }

        if ($empRole['role'] == "Mayor's Office") {
            header("Location:../Mayor Module/UsersLog.php");
        }
    }
}
?>