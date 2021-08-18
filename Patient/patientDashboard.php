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

    <title>SMIT+ | Home</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../css/patientStyle.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <div class="reportWrapper">
        <h1 class="helpheader">Hi, Kit. Stay Safe and wear your Mask.</h1>
        <hr>

        <h3 class="helpheader">Baguio COVID Toll</h3>
        <div id="counters">
            <div class="row counters1">
                <div class="four col-md-3">
                    <div class="counter-box box1">
                        </i> <span class="counter">2147</span>
                        <p class="box1">Active Cases</p>
                    </div>
                </div>
                <div class="four col-md-3">
                    <div class="counter-box box2"><span class="counter">3275</span>
                        <p class="box2">Recovered</p>
                    </div>
                </div>
                <div class="four col-md-3">
                    <div class="counter-box box3"><span class="counter">289</span>
                        <p class="box3">Death Toll</p>
                    </div>
                </div>
                <div class="four col-md-3">
                    <div class="counter-box box4"><span class="counter">1563</span>
                        <p class="box4">Under Monitoring</p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="secondrow">
            <div id="myPlot"></div>

            <div class="counterNational">
                <h3>National COVID Toll</h3>
                <div class="row">
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section box11 "><span id="anim-number-pizza" class="counter-number"></span> <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
                        <p class="counter-title">Active Cases</p>
                    </div>
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section box22"><span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span> <span class="counter-title">Recovered</span> </div>
                    <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section box33"><span class="timer counter alt-font appear" data-to="810" data-speed="7000">810</span> <span class="counter-title">Death</span> </div>
                    <div class="col-md-3 col-sm-6 text-center counter-section box44"><span class="timer counter alt-font appear" data-to="600" data-speed="7000">600</span> <span class="counter-title">Monitoring</span> </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

</body>
<!--Plot Scipts -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script>
    var xArray = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    var yArray = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

    // Define Data
    var data = [{
        x: xArray,
        y: yArray,
        mode: "lines"
    }];

    // Define Layout
    var layout = {
        xaxis: {
            range: [40, 160],
            title: "Cases"
        },
        yaxis: {
            range: [5, 16],
            title: "Date"
        },
        title: "COVID Cases"
    };

    // Display using Plotly
    Plotly.newPlot("myPlot", data, layout);
</script>

</html>