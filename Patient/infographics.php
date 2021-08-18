<?php
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientLogin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SMIT+ | Infographics</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../css/patientStyle.css">
    <!--Bootstrap-->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    
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

    <!--Page Content-->
    <div class="bodyWrapper">
        <div>
            <h1 class="helpheader">Infographics</h1>
            <hr>
        </div>
        <div class="reportWrapper infoWrapper">
            <div class="card infographics">
                <img src="../img/2019-nCoV.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">DOH Case of Pneumonia.</p>
                </div>
            </div>
            <div class="card infographics">
                <img src="../img/2019-nCoVHealthAdvisory.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Health Advisory</p>
                </div>
            </div>
            <div class="card infographics">
                <img src="../img/orig_facemask.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">How to wear a facemask</p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>