<?php 
    require_once("configure.php");
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
<!--JS-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <h1 class="logInToText">Reset Password</h1>
    <div id="resetPasContainer">
        <img src="../img/SMIT+.png" class="logo" alt="">
        <div>
            <form id="findUsername" method="post">
            <p>
                <center>Please enter your username</center>
            </p>
            <input type="text" id="resetReq1" name="username" placeholder='Username'><br>
        </div>
        <input type="submit" name="resetButton" value="Continue">
        </form>
        <?php 
            if(isset($_POST['resetButton'])) {
                $username = $_POST['username'];

                $sql = "SELECT * FROM patient_account where patient_username = ?";

                try {
                    $stmtselect = $database->prepare($sql);
                    $result = $stmtselect->execute([$username]);
                    if($result) {
                        if($stmtselect->rowCount()> 0) {
                            $_SESSION['resetpassword'] = $username;
                            header("Location:resetPW.php");
                            exit();
                        } else {
                            echo 'Username does not exist';
                        }
                    }
                } catch(PDOException $e) {}
            }
        ?>
    </div>
</body>
</html>