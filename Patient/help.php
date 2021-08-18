<?php
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SMIT+ | Help</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../css/patientStyle.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<!--Navigation Bar-->
<nav class="navbar navbar-expand-md">
<img src="../img/faviSMIT+ copy.png" class="logoImg" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="patientDashboard.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php"><i class="fas fa-file"></i> Report</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="settings.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="infographics.php"><i class="fas fa-file-image"></i> Infographics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="help.php"><i class="fas fa-question-circle"></i> Help</a>
                        <a class="dropdown-item" href="about.php"><i class="fas fa-info-circle"></i> About</a>
                        <a class="dropdown-item" href="reportlog.php"><i class="fas fa-info-circle"></i> Report Log</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <button id="signOut" class="signoutBtn" type="button"><i class="fas fa-sign-out-alt"></i></button>
        </div>
        <script>
        $(function(){
            $('#signOut').click(function(e){
                setTimeout('window.location.href = "logout.php"', 1000);
            });            
            });
        </script>
    </nav>


    <!-- Page Content-->
    <div class="reportWrapper">
        <div>
            <h1 class="helpheader">Help</h1>
            <hr>
        </div>
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body helpCard">
                            <h5 class="card-title"><i class="fas fa-question"></i> Ask a question</h5>
                            <p class="card-text">Contact one of our representatives to cater your problem.</p>
                            <a href="#collapseAskNow" data-toggle="collapse" class="btn btn-primary" role="button" aria-expanded="false" aria-controls="collapseAskNow">Ask now</a>
                            <div class="collapse" id="collapseAskNow">

                                <p><b>Reminder:</b> We DO NOT have any support channels on Messenger, Facebook, or other social media websites.Please be wary of websites or messaging platforms that claim to be an official Baguio SMIT+.</p>
                                <p>For any GCash-related concern, you can reach SMIT+ Personnel through any of the following support channels:<br>
                                    <br>
                                    <i>Email: baguioSmitSupport@gmail.com<br>
                                   Mobile Number: +639212876543</i> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body helpCard">
                            <h5 class="card-title"><i class="fas fa-unlock-alt"></i> Forgot Credentials</h5>
                            <p class="card-text">Know how to reset your password.</p>
                            <a href="#collapseResetPass" data-toggle="collapse" class="btn btn-primary" role="button" aria-expanded="false" aria-controls="collapseResetPass">Reset Password</a>
                            <div class="collapse" id="collapseResetPass">

                                <p>To reset your password if you're not logged in to SMIT+: <br> 1. Go to the LOGIN page.<br> 2. Click <i>Forgot Password</i> below the Login button.<br> 3. Enter your username <i>associated to your account</i> and click next.<br>                                    4. A OTP (One-Time Password) will be sent to your Mobile Number associated to your account. <i>This is to confirm your identity.</i><br> 5. When verifieid, you will be directed to a page where you can set a new password
                                    for your account.<br>
                                    <br>If you're still having trouble, we can help you recover your account by contacting us.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body helpCard">
                            <h5 class="card-title"><i class="fas fa-id-card"></i> Contact LGU</h5>
                            <p class="card-text">Get in touch with your Local Government</p>
                            <a href="#collapseContact" data-toggle="collapse" class="btn btn-primary" role="button" aria-expanded="false" aria-controls="collapseContact">Contact</a>
                            <div class="collapse" id="collapseContact">
                                <iframe src="http://122.55.59.4/contact" height="700px" width="500px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body helpCard">
                            <h5 class="card-title"><i class="fas fa-eye"></i> View Vaccination Schedule</h5>
                            <p class="card-text">Know when will be your next dose vaccination</p>
                            <a href="#collapseSched" data-toggle="collapse" class="btn btn-primary" role="button" aria-expanded="false" aria-controls="collapseSched">View</a>
                            <div class="collapse" id="collapseSched">
                                <br>
                                <h5>
                                    Your next dose for vaccination will be on:
                                </h5>
                                <input type="date" value="2021-08-22" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>