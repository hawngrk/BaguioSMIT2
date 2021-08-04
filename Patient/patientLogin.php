<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        
    </head>
    <body>
        <form action="">
            <input type="text" name="username" id="username" placeholder="Enter username" required><br>
            <input type="password" name="password" id="password" placeholder="Enter password" required><br>
            <button type="button" name="button" id="login">Login</button><br>
            <a href="patientRegistration.php">Create an account</a><br>
            <a href="">Forgot password</a><br>
        </form>
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
                            alert(data);
                            if($.trim(data) === "1") {
                                setTimeout('window.location.href = "patientDashboard.php"', 2000);
                            } else {

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