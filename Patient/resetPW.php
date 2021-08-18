<?php
    session_start();
    if(!isset($_SESSION['resetpassword'])) {
        header("Location: patientLogin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<title> Reset Password</title>
<!--Favicon-->
<link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">

<!--CSS-->
<link rel="stylesheet" href="../css/patientLoginStyle.css">
<!--Bootstrap-->
<link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
</head>

<body>
    <h1 class="logInToText">Reset Password</h1>
    <div id="resetPasContainer">
        <img src="../img/SMIT+.png" class="logo" alt="">
        <div>
            <p>
                <center>Please enter your new password</center>
            </p>
            <input type="password" id="newPassword" class="newPassword" name="newPassword" placeholder='Enter your new password' required><br>
            <input type="password" id="retypePassword" class="retypePassword" name="retypePassword" placeholder='Retype your new password' required><br>
        </div>
        <input type="submit" id="resetbutton">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <script> 
        $(function(){
            $('#resetbutton').click(function(e){
                var newPassword = $('#newPassword').val();
                var retypePassword = $('#retypePassword').val();

                console.log(newPassword, '===', retypePassword);
                if (newPassword == retypePassword) {
                    $.ajax({
                        type: 'POST',
                        url: 'processes/resetPassword.php',
                        data: {password: newPassword},
                        success: function(data) {
                            alert(data);
                            setTimeout("window.location.href = 'patientLogin.php'", 1000);
                        },
                    });
                } else {
                    alert('password does not match');
                }
            });  
        });
    </script>
</body>
</html>