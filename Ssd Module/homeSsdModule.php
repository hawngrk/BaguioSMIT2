<?php
include_once("../includes/database.php");
$currentDate = date("Y-m-d", time());
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
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script defer src="../javascript/showDateAndTime.js"></script>
    <script defer src="../javascript/logout.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
                    <?php
                    $query = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date, SUM(vaccine_drive_1.stubs), SUM(vaccine_drive_2.stubs), vaccination_drive.notif_opened FROM vaccination_sites JOIN vaccination_drive ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id JOIN vaccine_drive_1 ON vaccine_drive_1.drive_id = vaccination_drive.drive_id JOIN vaccine_drive_2 ON vaccine_drive_2.drive_id = vaccination_drive.drive_id GROUP BY drive_id ORDER BY vaccination_drive.drive_id desc;";

                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($driveId, $locName, $date, $firstStubs, $secondStubs, $opened);
                    echo "<table class='tableScroll7 px-4 py-2'>
                                <tr><td><h4>Notifications<hr></h4></td></tr>";
                    while ($stmt->fetch()) {
                        if ($opened == 1) {
                            echo "<tr onclick='updateDeploymentDetails($driveId)'>

                                    <td>
                                        Location: $locName <br>
                                        Date: $date <br>
                                        Number of First Stubs: $firstStubs <br>
                                        Number of Second Stubs: $secondStubs <br>
                                        <br>
                                        <hr>
                                    </td>
                                </tr>
                                ";
                        } else {
                            echo "<tr onclick='updateDeploymentDetails($driveId)'>
                                    <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>
                                    <td  style='background: lightgray!important'>New!<br>Vaccination Location: $locName<br>
                                        Date: $date<br>
                                        Number of First Stubs: $firstStubs <br>
                                        Number of Second Stubs: $secondStubs<br>
                                        <hr>
                                    </td>
                                </tr>
                                ";
                        }
                    }
                    ?>
                    </table>
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
                        <div class="card bg-light mb-3 shadow" id="adultWithOneDose">
                            <div class="card-header">
                                <center><h3> Total Vaccinated Population </h3></center>
                                <center>
                                    <h8> As of <?php $currDate = date("F j, Y", time()); echo "$currDate";?></h8>
                                </center>
                            </div>
                            <div class="card-body" id="totalVaccinated">
                                <?php
                                $query = "SELECT COUNT(patient . patient_id) as count FROM patient JOIN patient_details ON patient . patient_id = patient_details . patient_id JOIN priority_groups ON patient_details . priority_group_id = priority_groups . priority_group_id WHERE first_dose_vaccination = 1 and second_dose_vaccination = 1 and date_of_second_dosage <= '$currentDate';";
                                $stmt=$database->stmt_init();
                                $stmt->prepare($query);
                                $stmt->execute();
                                $stmt->bind_result($total);
                                $stmt->fetch();
                                $stmt->close();

                                echo "<center>$total</center>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="totalPopulation">
                            <div id="totalVaccinated">
                                <div style="background-color: white">
                                    <div>
                                        <!--TABLE PART - DASHBOARD-->
                                        <table class="table border shadow" id="dashboardTable">
                                            <?php
                                            $values1 = [];
                                            $values2 = [];

                                            $groups = ['A1: Health Care Workers', 'A2: Senior Citizens', 'A3: Adult with Comorbidity', 'A4: Frontline Personnel in Essential Sector', 'A5: Indigent Population', 'Rest of Adult Population', 'A7: 12-17 Years Old', 'Rest of Pedia Population'];

                                            $dbase = $database->stmt_init();
                                            $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND second_dose_vaccination = 0 AND date_of_first_dosage <= '$currentDate';");

                                            for ($i = 0; $i < sizeof($groups); $i++) {
                                                $dbase->bind_param('s', $groups[$i]);
                                                $dbase->execute();
                                                $dbase->bind_result($val);
                                                $dbase->fetch();

                                                array_push($values1, $val);
                                            }

                                            $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND second_dose_vaccination = 1 AND date_of_second_dosage <= '$currentDate';");

                                            for ($i = 0; $i < sizeof($groups); $i++) {
                                                $dbase->bind_param('s', $groups[$i]);
                                                $dbase->execute();
                                                $dbase->bind_result($val);
                                                $dbase->fetch();

                                                array_push($values2, $val);
                                            }

                                            $dbase->close();
                                            echo "
    <thead class=\"text-center thead-dark\">
                        <tr>
                            <th scope=\"col\"> Priority Groups</th>
                            <th scope=\"col\"> With at least One Dose</th>
                            <th scope=\"col\"> Fully Vaccinated</th>
                            <th scope=\"col\"> Total</th>
                        </tr>
                        </thead>
                        <tbody class=\"text-center\">
    ";
                                            for ($i = 0; $i < sizeof($values1); $i++) {
                                                $priority = "A" . ($i + 1);
                                                $total = $values1[$i] + $values2[$i];
                                                echo "
        <tr>
                            <th scope=\"row\"> $priority</th>
                            <th scope=\"row\"> $values1[$i]</th>
                            <th scope=\"row\"> $values2[$i]</th>
                            <th scope=\"row\"> $total</th>
                        </tr>
        ";
                                            }
                                            echo "
    </tbody>
    ";
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>



            </div>

            <div class="row healthDistrict">
                <div id="totalPopulationPerHD">
                    <div class="card bg-light mb-3 shadow" id="adultWithOneDose">
                        <div class="card-header">
                            <center><h3> Total Vaccinated Population per Health District</h3></center>
                            <center>
                                <h8> As of <?php $currDate = date("F j, Y", time()); echo "$currDate";?></h8>
                            </center>
                        </div>
                        <div>
                            <div class="tableScroll2">
                            <table class="table border shadow" id="dashboardTable">
                                <thead class="text-left thead-light">
                                <th scope="col"> Health Districts</th>
                                <th scope="col"> Total Vaccinated</th>

                                </thead>

                                <tbody class="text-center">

                                <?php
                                require '../require/getHealthDistrict.php';
                                foreach ($health_district as $hd) {
                                    $id = $hd->getHealthDistrictId();
                                    $query = "SELECT health_district_name, COUNT(patient . patient_id) as count FROM patient JOIN patient_details ON patient . patient_id = patient_details . patient_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id JOIN health_district ON barangay.health_district_id = health_district.health_district_id WHERE first_dose_vaccination = 1 and second_dose_vaccination = 1 and date_of_second_dosage <= '$currentDate' AND health_district.health_district_id = '$id'";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($hName, $distCount);
                                    while($stmt->fetch()) {
                                        echo "
                                            <tr>
                                                <th scope='row'> $hName</th>
                                                <th scope='row'> $distCount</th>
                                              
                                            </tr>";
                                    }
                                    $stmt->close();
                                }
                                ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
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