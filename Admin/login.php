<?php
session_start();

if (isset($_SESSION['account'])) {
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
        header("Location: ../EIR Module/EIRHomeScreening.php");
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
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
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
    <p id="time"></p>
    <br>
    <p id="datee"></p>
    <script src="../javascript/detailedDateAndTime.js"></script>
</div>

<!-- Log In -->
<div class="loginow">
    <!-- <div class="loginRow"> -->
    <form id="login-form" class="form">
        <img src="../img/logoo.png" class="logo" alt="">
        <!-- <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div> -->
        <div class="input-group input-group-lg mb-3">
            <input type="text" id="userN" name="username" class="form-control" aria-label="Large"
                   aria-describedby="inputGroup-sizing-sm" placeholder="Enter username" required>
        </div>
        <div class="input-group input-group-lg mb-3">
            <input type="password" id="passW" name="password" class="form-control" aria-label="Large"
                   aria-describedby="inputGroup-sizing-sm" placeholder="Enter password" required>
        </div>
        <div class="form-button d-flex justify-content-center">
            <button type="button" id="login" name="loginButton" class="buttonLogin font-weight-bold my-2">Login</button>
        </div>
        <div class="form-link">
            <a href="resetPW.html" id="forgot_pswd" class="text-light">Forget password?</a>
        </div>
    </form>
    <!-- <div id="backdrop2"><img id="backdrop" src="../img/backdrop.jpeg" class="loginColumn loginImg" alt=""></div> -->
    <!-- </div> -->
</div>
<footer>
    <script>
        var forms = document.getElementById('login-form');
        var userN = document.getElementById("userN");
        var passW = document.getElementById("passW");

        $('#login').click(async function (e) {
            if (forms.checkValidity() && passW.value.trim() != "") {
                login();
            } else {
                Swal.fire('Please fill the required fields');
                !userN.value.trim() ? errorBorder(userN) : userN.style.border = null;
                !passW.value.trim() ? errorBorder(passW) : passW.style.border = null;
            }
        });

        function errorBorder(element) {
            element.style.border = "0.8px groove #E52B50";
            element.value = element.value.trim();
        }

        async function login() {
            var userN = document.getElementById("userN").value;
            var passW = document.getElementById("passW").value;

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
                    if ($.trim(results) == 'Monitoring') {
                        success();
                        setTimeout("window.location.href = '../Monitoring Module/ScanQRMonitoring.php'", 500);
                    }
                    if ($.trim(results) == 'Screening') {
                        success();
                        setTimeout("window.location.href = '../Screening Module/ScanQRScreening.php'", 500);
                    }
                    if ($.trim(results) == 'SSD') {
                        success();
                        setTimeout("window.location.href = '../Ssd Module/homeSsdModule.php'", 500);
                    }
                    if ($.trim(results) == 'HSO') {
                        success();
                        setTimeout("window.location.href = '../HSO Module/HSOdash.php'", 500);
                    }
                    if ($.trim(results) == 'EIR') {
                        success();
                        setTimeout("window.location.href = '../EIR Module/EIRHomeScreening.php'", 500);
                    }
                    if (results == "Mayor's Office") {
                        success();
                        setTimeout("window.location.href = '../Mayor Module/UsersLog.php'", 500);
                    }
                },
                error: function (results) {
                    console.log('There was an error');
                }
            });
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
    </script>
</footer>
</body>

</html>