<?php
    require_once("configure.php");
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
    $account = $_SESSION['userlogin'];
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>SMIT+ | Report Log</title>
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
        <h1>Report Log</h1>
        <div class='report-log-container' id='report-log'>
        <?php 
            require_once '../require/getReport.php';

            foreach ($reports as $reportLog) {
                $reportId = $reportLog->getReportId();
                $reporterId = $reportLog->getReportPatientId();
                $dateReported = $reportLog->getDateReported();
                if($account['patient_id'] == $reporterId) {
                    echo "<div id='report-log{$reportId}'>
                    <h3>{$dateReported}</h3>
                    <button class='view-more-btn' type='submit' value='$reportId'>View More</button>
                    </div>";
                }
            }
        ?>
        </div>

        <div class="view-report">

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("Im here");
            $(".view-more-btn").click(function(){
                var repId = $(this).attr("value");
                console.log(repId);
                $.ajax({
                    url: 'viewReportDetails.php',
                    type: 'POST',
                    data: {"report": repId},
                    success: function (result) {
                        document.querySelector(".view-report").innerHTML = result;
                    }
                });
            });
        });
    </script>
</body>