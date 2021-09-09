
<?php
    require_once("configure.php");
?>
<!DOCTYPE html>
<!--Author: Hudson Kit P. Natividad
    Date: August 7, 2021
    Description: Login HTML and CSS below-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Registration</title>
    <!--CSS-->
    <link rel="stylesheet" href="../css/patientLoginStyle.css">
    <!--Bootstrap-->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!--JS-->

</head>

<body>
    <!-- Log In -->
    <div class="loginow">
        <h3 class="logInToText pt-5">Registration</h3>
        <!--Favicon-->
        <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
        <form id="login-form" class="form" method="post">
            <img src="../img/SMIT+.png" class="logo" alt="">
            <div class="form-group">
                <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control formInpt" required>

                <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control formInpt" required>
            </div>
            <div class="form-group">
                <input type="tel" id="contact" name="contactNumber" placeholder="+63XXXXXXXXX" class="form-control formInpt" pattern="+63[0-9]{10}" required>
            </div>
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" class="form-control formInpt" required>
            </div>
            <div class="form-group">
                <input id="password" type="password" name="password" placeholder="Password" class="form-control formInpt" required>
            </div>
            <div class="form-button">
                <button name="loginButton" id="register" class="buttonLogin">Continue</button>
            </div>
            <div class="terms">
                <input type="radio" name="readT&C" value="" required>
                <p>I have read and accept the<a href="#" id="forgot_pswd"> Terms & Condition</a></p>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $('#register').click(function(e) {
                var valid = this.form.checkValidity();

                if(valid) {
                    var firstname = $('#firstname').val();
                    var middlename = $('#middlename').val();
                    var lastname = $('#lastname').val();
                    var username = $('#username').val();
                    var contact = $('#contact').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    
                    e.preventDefault();

                    $.ajax({
                        type: 'POST', 
                        url: 'processes/processRegistration.php',
                        data: {firstname: firstname, middlename: middlename, lastname: lastname, username: username, contact: contact, email: email, password: password},
                        success: function(data) {
                            Swal.fire({
                            'title': 'Successful',
                            'text' : data,
                            //'text' : 'Account was successfully registered',
                            'type' : 'success'
                            });
                            setTimeout('window.location.href = "patientLogin.php"', 1000);
                        },
                        error: function(data){
                            Swal.fire({
                            'title': 'Registration Error',
                            'text' : 'There was an error during the registration',
                            'type' : 'error'
                            });
                        }
                    });

                }
                else {
                    Swal.fire({
                            'title': 'Error',
                            'text' : 'Registration form is empty',
                            'type' : 'error'
                    }); 
                }
            });
        });
    </script>
</body>
</html>