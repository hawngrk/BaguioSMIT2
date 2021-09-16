<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+(Ssd) | Home</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/ssdStyle.css" rel="stylesheet">

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

</head>

<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand-icon">
                <img style="width:150px;" src="../img/SMIT+.png" alt="Baguio Logo">
            </div>
        </div>

        <ul class="list-unstyled components">
            <h4 id="headingNav1"> Special Service Division</h4>
            <hr>
            <h5 id="headingNav2"> September 17, 2021 | 01:24 PM</h5>
            <hr>

            <li class="active">
                <a href="homeSsdModule.php"><i class="fas fa-home"></i>  Home</a>
            </li>
            <li>
                <a href="distributeStubSsdModule.php"><i class="fas fa-ticket-alt"></i>  Stub Distribute</a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Whole Page  -->
    <div id="content">
        <!-- Top Nav Bar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info" onclick="Toggle()">
                    <i class='fas fa-angle-left'></i> Menu
                </button>

                <button class="btnTop">
                    <i class="fas fa-bell"></i>
                </button>

                <button class="btnTop btnBell">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </nav>

        <!-- Page Content  -->
        <div class="row">
            <div class="col">
                <div class="row">
                    <div id="totalPopulation">
                        <center><h5> Total Vaccinated Population </h5></center>
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
                        <center><h5> Total Vaccinated Population per Health District</h5></center>
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
                    <h5> <center> Vaccine Deployments </center> </h5>
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