<?php 
session_start();

if(isset($_SESSION['account'])) {
    $accountDetails = $_SESSION['account'];
    echo json_encode($_SESSION);
    if ($accountDetails['role'] == 'Barangay') {
        header("Location: ../Barangay Module/homeBarangayModule.php");
    }
    
    if ($accountDetails['role'] == 'Monitoring') {
        header("Location: ../Monitoring Module/ScanQRMonitoring.php");
    }
    
    if ($accountDetails['role'] == 'Screening') {
        header("Location: ../Barangay Module/homeBarangayModule.php");
    }

    if ($accountDetails['role'] == 'HSO') {
        header("Location: ../HSO Module/HSOdash.php");
    }

    if ($accountDetails['role'] == 'EIR') {
        header("Location: ../EIR Module/.php");
    }

    if ($accountDetails['role'] == 'SSD') {
        header("Location: ../Ssd Module/homeSsdModule.php");
    }

    if ($accountDetails['role'] == "Mayor's Office") {
        header("Location: ../Mayor Module/UsersLog.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!---
Author Dominic Austin Sicat, Hudson Kit Natividad
Date Created: June 27, 2021
Description: Login HTML Elements for receiving credentials from the users
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Baguio SMIT+ | Login</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!--Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!--JS-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  

    <!--CSS-->
    <link href="../css/login.css" rel="stylesheet">
</head>

<body>
    <!-- Top Nav Bar-->
    <div id="topBar">
        <strong>Thursday, January 12, 2021 | 6:32 PM</strong>
    </div>

    <!-- Log In -->
    <div class="loginow">
        <h3 class="logInToText pt-5">Login to Baguio Vaccination SMIT+ System</h3>
        <!-- <div class="loginRow"> -->
        <form id="login-form" class="form">
            <img src="../img/SMIT+.png" class="logo" alt="">
            <!-- <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        </div> -->
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Username</span>
                </div>
                <input type="text" id="userN" name="username"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                </div>
                <input type="password" id="passW" name="password" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="form-button">
                <button type="button" id="login" name="loginButton" class="buttonLogin">Login</button>
            </div>
            <div class="form-link">
                <a href="resetPW.html" id="forgot_pswd">Forget password?</a>
            </div>
        </form>
        <!-- <div id="backdrop2"><img id="backdrop" src="../img/backdrop.jpeg" class="loginColumn loginImg" alt=""></div> -->
        <!-- </div> -->
    </div>
    <footer>
    
        <script>
            $('#login').click(async function(e) {
                login();

            }); 

            $('#logout').click(async function(e){
                logout();
            });
           async function login() {
                var userN = document.getElementById("userN").value;
                var passW = document.getElementById("passW").value;
                // console.log(userN);
                // console.log(passW);
                $.ajax({    
                    method: 'POST',              
                    url: '../AdminBackEnd/EmployeeLoginAuthentication.php',
                    data: {username: userN, password: passW},
                    success: function (results) {
                        console.log(results);
                        if ($.trim(results) == 'Barangay') {
                            success();
                            setTimeout("window.location.href = '../Barangay Module/homeBarangayModule.php'", 500);
                        } 
                        if ($.trim(results)  == 'Monitoring') {
                            success();
                            setTimeout("window.location.href = '../Monitoring Module/ScanQRMonitoring.php'", 500);
                        } 
                        if ($.trim(results)  == 'Screening') {
                            success();
                            setTimeout("window.location.href = '../Screening Module/ScanQRScreening.php'", 500);
                        } 
                        if ($.trim(results)  == 'SSD') {
                           success();
                            setTimeout("window.location.href = '../Ssd Module/homeSsdModule.php'", 500);
                        } 
                        if ($.trim(results)  == 'HSO') {
                           success();
                            setTimeout("window.location.href = '../HSO Module/ManageVaccineHome.php'", 500);
                        }
                        if ($.trim(results)  == 'EIR') {
                           success();
                            setTimeout("window.location.href = '../EIR Module/EIRHomeScreening.php'", 500);
                        }
                        if (results  == "Mayor's Office") {
                            success();
                            setTimeout("window.location.href = '../Mayor Module/UsersLog.php'", 500);
                        } 
                    },
                    error: function(results) {
                        console.log('There was an error');
                    }
                });
            }
            async function logout() {
                var logoutPhp = "windows.location.href = '../includes/logout.php'";
                message().confirmation(logoutPhp);
            }
            function success() {
                Swal.fire({
                    icon: 'info',
                    title: 'Successfully Logged in',
                    showConfirmButton: false,
                    timer: 1500
                });    
            }
            function error() {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid username or password',
                    showConfirmButton: false,
                    timer: 1500
                });
            }

            function confirmation(link) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(link);
                    }
                })
            }
        </script>
        <div>
            © 2021 Copyright:
            <a href="https://baguiosmit+.com/">BaguioSmit+.com</a>
        </div>
    </footer>
</body>

</html>