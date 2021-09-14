<?php
/***
 * @Author Hudson Kit P. Natividad
 * Date Created: June 28, 2021
 * Description: allow session to start when credentials needed are entered correctly.
 */

//initial session handling subject to change - Natividad Hudson Kit P.
session_start();
if(!isset($_SESSION['account'])) {
    header("Location: ../admin/login.php");
}
