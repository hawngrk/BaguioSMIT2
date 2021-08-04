
<?php
    include("../includes/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <div>
        <form action="patientRegistration.php" method="POST">
            <div class="container">   
                <h1>Registration</h1>
            
                <input type="text" name="firstname" id="firstname" placeholder="Enter first name" required><br>
                <input type="text" name="middlename" id="middlename" placeholder="Enter middle name" required><br>
                <input type="text" name="lastname" id="lastname" placeholder="Enter last name" required><br>
                <input type="text" name="username" id="username" placeholder="Enter username" required><br>
                <input type="text" name="contact" id="contact" placeholder="Enter contact number" required><br>
                <input type="email" name="email" id="email" placeholder="Enter email address"><br>
                <input type="password" name="password" id="password" placeholder="Enter password" minlength="8" required><br>    
                <label for="readT&C"><input type="radio" name="readT&C" value="" required> I have read the <a>Terms & Conditions</a> </label><br>
                <input type="submit" name="register" id="register" value="Register">
            </div>
            <div class="terms-and-conditions" hidden>
                <!-- Appears when the user interacts with the anchor tag  -->
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

                    $.ajax ({
                        type: 'POST', 
                        url: 'processes/processRegistration.php',
                        data: {firstname: firstname, middlename: middlename, lastname: lastname, username: username, contact: contact, email: email, password: password},
                        success: function(data) {
                            Swal.fire({
                            'title': 'Successful',
                            'text' : data,
                            // 'text' : 'Account was successfully registered',
                            'type' : 'success'
                            })
                        },
                        error: function(data){
                            Swal.fire({
                            'title': 'Registration Error',
                            'text' : 'There was an error during the registration',
                            'type' : 'error'
                            })
                        }
                    });

                } else {
                }
            });
        });
    </script>
</body>
</html>