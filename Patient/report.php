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

    <title>NavTemplate</title>
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
            <h1 class="helpheader">Report Symptoms</h1>
            <p class="headerWrapper"><i>**(Please understand that upon filling up this form,
                you are allowing us to process and use the data. As
                well as providing us true information and not just a made up one.
                Providing false information is punishable by law.)
            </i></p>
            <hr>
        </div>
        <div class="reportWrapper reportWrapperbg">
            <form action="processes/processReport.php" method="post" id="report-form">
                <h5>1. Date the last time you went out</h5>
                <input type="date" class="dateBtn" name="date" id="date">

                <hr>

                <h5>2. Select the vaccine side effect/s that applies:</h5>

                <input type="hidden" name="chills" value="">
                <input type="radio" id="chills" class="radioBtn" name="chills value="Chills">   
                <label for="chills">Chills</label><br>

                <input type="hidden" name="sFever" value="">
                <input type="radio" id="sFever" name="sFever" class="radioBtn" name="side_effect" value="Fever">   
                <label for="fever">Fever</label><br>

                <input type="hidden" name="headache" value="">                
                <input type="radio" id="sHeadache" class="radioBtn" name="sHeadache" value="Headache">   
                <label for="headache">Headache</label><br>

                <input type="hidden" name="musclePain" value="">
                <input type="radio" id="musclePain" class="radioBtn" name="musclePain" value="Muscle Pain">   
                <label for="musclePain">Muscle Pain</label><br>

                <input type="hidden" name="nausea" value="">
                <input type="radio" id="nausea" class="radioBtn" name="nausea" value="Nausea">
                <label for="nausea">Nausea</label><br>

                <input type="hidden" name="tiredness" value="">
                <input type="radio" id="tiredness" class="radioBtn" name="tiredness" value="tiredness">   
                <label for="nausea">Tiredness</label><br>

                <input type="hidden" name="other" value="">
                <input type="radio" id="otherSide" class="radioBtn" name="other" value="Please specify here">

                <label for="otherSide"> 
                <input type="text" id="otherSide" name="other " value="Please specify here"></label><br>

                <hr>
                <h5>3.Select the COVID-19 symtom/s that applies</h5>


                <input type="hidden" name="cough" value="">
                <input type="radio" id="cough" class="radioBtn" name="cough" value="Cough"> 
                <label for="cough">Cough</label><br>

                <input type="hidden" name="cFever" value="">
                <input type="radio" id="cFever" class="radioBtn" name="side_effect" value="Fever"> 
                <label for="fever">Fever</label><br>

                <input type="hidden" name="diff" value="">
                <input type="radio" id="diff" class="radioBtn" name="diff" value="Difficulty Breathing or Shortness of Breath"> 
                <label for="diff">Difficulty Breathing or Shortness of Breath</label><br>
                
                <input type="hidden" name="ache" value="">
                <input type="radio" id="ache" class="radioBtn" name="sache" value="Muscle or Body Ache"> 
                <label for="ache">Muscle or Body Ache</label><br>

                <input type="hidden" name="cHeadache" value="">
                <input type="radio" id="head" class="radioBtn" name="cHeadache" value="Headache"> <label for="head">Headache</label><br>

                <input type="hidden" name="fatigue" value="">
                <input type="radio" id="fatigue" class="radioBtn" name="fatigue" value="Fatigue"> <label for="fatigue">Fatigue</label><br>

                <input type="hidden" name="runny" value="">
                <input type="radio" id="runny" class="radioBtn" name="runny" value="Runny Nose"> <label for="runny">Runny Nose</label><br>

                <input type="hidden" name="diarrhea" value="">
                <input type="radio" id="diarrhea" class="radioBtn" name="diarrhea" value="Diarrhea"> <label for="head">Diarrhea</label><br>

                <input type="hidden" name="sore" value="">
                <input type="radio" id="sore" class="radioBtn" name="sore" value="Sore Throat"> <label for="head">Sore Throat</label><br>

                <input type="hidden" name="loss" value="">
                <input type="radio" id="loss" class="radioBtn" name="loss" value="Loss of Smell and taste"> <label for="head">Loss of Smell and taste</label><br>

                <button type="submit" name="processReport" form="report-form" class="helpBtn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>