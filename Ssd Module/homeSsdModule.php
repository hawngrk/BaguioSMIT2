<?php
include_once("../includes/database.php");
require_once('../includes/sessionHandling.php');
checkRole('SSD');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SSD | Home</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/SSDModule.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="../javascript/showDateAndTime.js"> </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script defer src="../javascript/logout.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand-icon">
            <img src="../img/logoo.png" style="width: 104%; margin-bottom:-19%; margin-top:-5%;" alt="Baguio Logo">
            </div>
        </div>

        <ul class="list-unstyled components">
            <hr>
            <h4 id="headingNav1"> Special Service Division</h4>
            <hr>
            <div class="timeBox">
                    <p id="time"></p>  <p id="datee"></p>
                    <script src="../javascript/detailedDateAndTime.js"></script>
                    </div>
            <hr>

            <li class="active">
                <a href="homeSsdModule.php"><i class="fas fa-home"></i> Home </a>
            </li>
            <li>
                <a href="distributeStubSsdModule.php"><i class="fas fa-ticket-alt"></i> Stub Distribute</a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info" onclick='logout()'>
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Whole Page  -->
    <div id="content">
        <!-- Top Nav Bar  -->
        <nav class="float-right mr-4">
            <div class="dropdown">
                <button class="btn btn-lg dropdown-toggle bg-none" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="openNotif()">
                    <span class="marker" id="marker"><i class="fas fa-circle"></i></span>
                    <i class="fas fa-bell"></i>
                </button>
                <div id="notifications" class="dropdown-menu mr-4 border border-dark" style="width: 352px" aria-labelledby="dropdownMenuButton">

                </div>
            </div>
        </nav>

        <br>
        <br>
        <!-- Page Content  -->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div id="totalPopulation">
                        <center><h3> Total Vaccinated Population </h3></center>
                        <center>
                            <h8> As of September 16, 2021</h8>
                        </center>
                        <hr>
                        <p>
                        <center>96,815 / 281,000</center>
                        </p>
                    </div>
                </div>

                <div class="row healthDistrict">
                    <div id="totalPopulationPerHD">
                        <center><h3> Total Vaccinated Population per Health District</h3></center>
                        <center>
                            <h8> As of September 16, 2021</h8>
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col healthDistrict">
                                Asin Health District
                            </div>
                            <div class="col healthDistrict">
                                1000
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div id="vaccineDeployments">
                    <h3> <center> Vaccine Deployments </center> </h3>
                    <hr>
                    <div id="vaccineDeploymentContent">
                        <h4> September 21 , 2021 </h4>
                        <p> Dose: First Dose </p>
                        <p> Site: SLU Gym, UB Gym, Country Club </p>
                        <p> Brand: SINOVAC </p>
                        <p> Priority Group per site: </p>
                        <ul>
                            <li> A4 : 600 stubs</li>
                            <li> A5 : 400 stubs </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    var clicked = false;

    function Toggle() {
        var butt = document.getElementById('sidebarCollapse')
        if (!clicked) {
            clicked = true;
            butt.innerHTML = "Menu <i class = 'fas fa-angle-double-right'><i>";
        } else {
            clicked = false;
            butt.innerHTML = "<i class='fas fa-angle-left'></i> Menu";
        }
    }

    var pusher = new Pusher('8bde1d2aef3f7c91d16a', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('ssd');
    channel.bind('my-event', function(data) {
        var id = data.message;

        toastr.options.positionClass = 'toast-bottom-right';
        toastr.info('You Have Received A New Deployment!');

        document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important') ;
    });

    function openNotif() {
        $.ajax({
            url: 'selectDeployment.php',
            type: 'POST',
            data: {"showUpdatedNotif": ""},
            success: function (result) {
                document.getElementById('notifications').innerHTML = result
            }
        });
        $.ajax({
            url: 'selectDeployment.php',
            type: 'POST',
            data: {"open": "opened"},
            success: function () {
                document.getElementById('marker').setAttribute('style', 'color:transparent!important');

            }
        });
    }

    function updateDeploymentDetails(val) {
        window.location.href = "distributeStubSsdModule.php";
        $.ajax({
            url: 'selectDeployment.php',
            type: 'POST',
            data: {"deploymentId": val},
            success: function (result) {
                document.getElementById("labelling").innerHTML = result;
            }
        });

        $.ajax({
            url: 'selectDeployment.php',
            type: 'POST',
            data: {"healthDistrict": val},
            success: function (result) {
                document.getElementById("healthDistrictTable").innerHTML = result;
            }
        });
    }

</script>