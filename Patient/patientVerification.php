<?php
    session_start();
    if(isset($_SESSION['resetpassword'])) {
        echo $_SESSION['resetpassword'];
        header("Location: resetPW.php");
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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
</head>

<body>
    <h1 class="logInToText">Reset Password</h1>
    <div id="resetPasContainer">
        <img src="../img/SMIT+.png" class="logo" alt="">
        <div>
            <form id="findUsername" method="post">
            <p>
                <center>Please provide necessary information for verifcation purposes.</center>
            </p>
            <input type="text" class="first-name" id="resetReq1" name="firstname" placeholder='Enter your first name' required><br>
            <input type="text" class="last-name" id="resetReq1" name="lastname" placeholder='Enter your last name' required><br>
            <input type="tel" class="contact" id="resetReq1" name="contact" placeholder="Enter your current contact number" required><br>
            <input type="submit" name="resetButton" id="resetbutton" value="Continue">
            </form>
        </div>
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <script> 
        $(function(){
            $('#resetbutton').click(function(e){
                var firstName = $('.first-name').val();
                var lastName = $('.last-name').val();
                var contact = $('.contact').val();

                $.ajax({
                    type: 'POST',
                    url: 'processes/verifyCredentials.php',
                    data: {firstname: firstName, lastname: lastName, contact: contact},
                    success: function(data) {
                        if($.trim(data) === "1"){
                            setTimeout('window.location.href = "resetPW.php"', 1000);
                        } else {
                            alert(data);
                        }                      
                    },
                    error: function(data) {
                        alert(data);
                    }
                });
            });  
        });
    </script>
</body>
</html>