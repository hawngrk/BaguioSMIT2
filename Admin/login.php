<?php 
    session_start();
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
        <form id="login-form" class="form" action="EmployeeLoginAuthentication.php" method="post">
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
                <input type="text" id="userN" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                </div>
                <input type="text" id="passW" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="form-button">
                <button id="login" name="loginButton" class="buttonLogin">Login</button>
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
                var userN = document.getElementById("username").value;
                var passW = document.getElementById("password").value;
                console.log("Data sent");
                $.ajax({    
                    method: 'POST',              
                    url: '../AdminBackEnd/EmployeeLoginAuthentication.php',
                    data: {username: userN, password: passW},
                    success: function (results) {
                        if ($.trim(results) == 'Barangay') {
                            message().success();
                            setTimeout("window.location.href = '../Barangay Module/homeBarangayModule.php'", 500);
                        } 
                        if ($.trim(results)  == 'Vaccinator') {
                            message().success();
                            setTimeout("windo`w.location.href = '../Vaccinator Module/ScanQR.php'", 500);
                        } 
                        if ($.trim(results)  == 'Monitoring') {
                            message().success();
                            setTimeout("window.location.href = '../Vaccinator Module/ScanQR.php'", 500);
                        } 
                        // if ($.trim(results)  == 'SSD') {
                        //    successMessage();
                        //     setTimeout("window.location.href = '../Vaccinator Module/ScanQR.php'", 500);
                        // } 
                        // if ($.trim(results)  == 'HSO') {
                        //    successMessage();
                        //     setTimeout("window.location.href = '../Vaccinator Module/ScanQR.php'", 500);
                        // }
                        // if ($.trim(results)  == 'EIR') {
                        //    successMessage();
                        //     setTimeout("window.location.href = '../Vaccinator Module/ScanQR.php'", 500);
                        // }
                        else {
                            message().error();
      
                        }
                    },
                    error: function(results) {
                        console.log('There was an error');
                    }
                })
                            }
            async function logout() {
                var logoutPhp = "windows.location.href = '../includes/logout.php'";
                message().confirmation(logoutPhp);
            }

            async function message() {
                function error() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Logged in',
                        showConfirmButton: false,
                        timer: 1500
                    });    
                }
                function success() {
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
            }
        </script>
        <div>
            © 2021 Copyright:
            <a href="https://baguiosmit+.com/">BaguioSmit+.com</a>
        </div>
    </footer>
</body>

</html>