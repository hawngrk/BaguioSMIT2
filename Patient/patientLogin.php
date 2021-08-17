<?php
    session_start();
    if(isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Baguio SMIT+ | Login</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!--CSS-->
    <link rel="stylesheet" href="../css/patientLoginStyle.css">
    <!--Bootstrap-->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    </head>
    <body>
        <div class="loginow">
            <h3 class="logInToText pt-5">Login to Baguio SMIT+</h3>
            <form id="login-form" class="form" action="EmployeeLoginAuthentication.php" method="post">
                <img src="../img/SMIT+.png" class="logo" alt="">
                <div class="form-group">
                    <input type="username" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="form-button">
                    <button name="loginButton" id="login" class="buttonLogin">Login</button>
                </div>
                <div class="form-button">
                    <button name="registerButton" class="buttonRegister" href="patientRegistration.php">Resgister</button>
                </div>
                <div class="form-link">
                    <a href="patientVerification.php" id="forgot_pswd">Forget password?</a>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(function(){
                $('#login').click(function(e){

                    var valid = this.form.checkValidity();

                    if(valid) {
                        var username = $('#username').val();
                        var password = $('#password').val();
                    }

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'processes/processLogin.php',
                        data: {username: username, password: password},
                        success: function(data) {
                            if($.trim(data) === "1") {
                                setTimeout('window.location.href = "patientDashboard.php"', 1000);
                            } else {
                                alert(data)
                            }
                        },
                        error: function(data) {
                            alert('there were errors encountered');
                        }
                    });
                });            
            });
        </script>
    </body>
</html>