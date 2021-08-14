<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+ | Manage Patients</title>

    <!-- Our Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">

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
            <p id="mainmenu">Main Menu</p>
            <li>
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="#ManageUsersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-users"></i> Manage Users</a>
                <ul class="collapse list-unstyled" id="ManageUsersSubmenu">
                    <li>
                        <a href="ManagePersonnelHome.php">Personnel</a>
                    </li>
                    <li>
                        <a href="ManagePatientHome.php" class="active">Patients</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="ManageDeployment.php"><i class="fas fa-truck"></i> Manage Deployment</a>
            </li>
            <li>
                <a href="ManageReportHome.php"><i class="fas fa-sticky-note"></i> Reports</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-question"></i> About</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Top Nav Bar  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Menu</span>
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


        <div class="listPatientColumn">
            <div class="four listPatientRow">
                <div class="listPatient-box colored">
                    <center><p>Deployment Summary</p></center>
                </div>
            </div>
            <div class="four listPatientRow row2">
                <div id="listPatientContent" class="listPatient-box colored">
                </div>
            </div>
        </div>

        <button id="addDepBtn" type="button" class="buttonTop">
            Add Deployment
        </button>


        <div id="DeployModal" class="modal">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Deployment</h4>
                    <button type="button" id="close1" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <div class="form-group">
                                <label for="district">Select Health District: </label>
                                <select name="district" id="district">
                                    <option value="d1">District 1</option>
                                    <option value="d2">District 2</option>
                                    <option value="d3">District 3</option>
                                    <option value="d4">District 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="VaccineBr">Select Vaccine Brand: </label>
                                <select name="VaccineB" id="VaccineBr">
                                    <option value="V1">V1</option>
                                    <option value="V2">V2</option>
                                    <option value="V3">V3</option>
                                    <option value="V4">V4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="form-group">
                                <label for="PatientCateg">Category of patients: </label>
                                <select name="PatientCateg" id="PatientCateg">
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="VaccineLot">Select Vaccine Lot: </label>
                                <select name="VaccineLot" id="VaccineLot">
                                    <option value="VL1">VL1</option>
                                    <option value="VL2">VL2</option>
                                    <option value="VL3">VL3</option>
                                    <option value="VL4">VL4</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-2 col-sm-4">
                            <div class="form-group">
                                <label for="date">Date: </label>
                                <input type="date" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="VaccineBat">Select Vaccine Batch: </label>
                                <select name="VaccineLot" id="VaccineBat">
                                    <option value="bat1">bat1</option>
                                    <option value="bat2">bat2</option>
                                    <option value="bat3">bat3</option>
                                    <option value="bat4">bat4</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button id="cancel1" type="button" class="button5"> Cancel</button>
                    <button id='add1' type="button" class="button5"> Add</button>
                </div>
            </div>
        </div>

        <div id="DeployModalConf" class="modal">
            <div class="content-modal">
                <span id="close3" class="close">&times;</span>
                <div class="AddDeploymentConf-PopUp">
                    <h3> Are you sure to add this deployment? </h3>
                    <button id="no1" type="button" class="button5"> No</button>
                    <button id="yes1" type="button" class="button5"> Yes</button>
                </div>
            </div>
        </div>

        <button id="addHealthDBtn" type="button" class="buttonTop">
            Add Health District
        </button>

        <div id="HealthDModal" class="modal">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Health District</h4>
                    <button type="button" id="close2" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="search-container">
                        <form action="/action_page.php">
                            <label>Name of Health District:</label>
                            <input type="text" placeholder="Search" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="dropdown">
                        <label for="optionBrgy">Select Barangay/s: </label>
                        <a href="#" class="w3-bar-item w3-button">All</a>
                        <a href="#" class="w3-bar-item w3-button">None</a>
                        <select id="optionBrgy">
                            <option value="brgy1">brgy1</option>
                            <option value="brgy2">brgy2</option>
                            <option value="brgy3">brgy3</option>
                            <option value="brgy4">brgy4</option>
                        </select>
                    </div>

                    <div class="AddHealthD-PopUp">
                        <input type="checkbox" id="D1" name="D1" value="Bike">
                        <label for="D1"> District 1</label><br>
                        <input type="checkbox" id="D2" name="D2" value="Car">
                        <label for="D2"> District 2</label><br>
                        <input type="checkbox" id="D3" name="vehicle3" value="Boat">
                        <label for="D3"> District 3</label><br>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel2" type="button" class="button5"> Cancel</button>
                        <button id='add2' type="button" class="button5"> Add</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="HealthDModalConf" class="modal">
            <div class="modal-content">
                <span id="close4" class="close">&times;</span>
                <div class="AddDeploymentConf-PopUp">
                    <h3> Are you sure to add this Health District? </h3>
                    <button id="no2" type="button" class="button5"> No</button>
                    <button id='yes2' type="button" class="button5"> Yes</button>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="column column1">
                <table class="table">
                    <thead>
                        <th>List Patients View</th>
                    </thead>
                </table>
            </div>
            <div class="column column2">
                <table class="table table-condensed table-striped table-hover table-bordered" id="tableDeploy">
                    <thead>
                        <th>Vaccine ID</th>
                        <th>Brand/s</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
        </div> -->

        <!-- Search Container-->
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <table class="table tableDep table-row table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vaccination Drive Id</th>
                <th scope="col">Brand</th>
                <th scope="col">Health District</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <?php
            require_once '../require/getVaccinationDrive.php';
            require_once '../require/getVaccineDeployment.php';
            require_once '../require/getHealthDistrict.php';
            require_once '../require/getVaccine.php';

            $count = 0;
            foreach ($vaccination_drive as $vd) {
                $count++;
                $driveId = $vd->getDriveId();
                $location = $vd->getVaccLocation();
                $date = $vd->getVaccDate();


                foreach ($vaccineDeployment as $vDep) {
                    if ($driveId == $vDep->getDeploymentDriveId()) {
                        foreach ($vaccines as $vac) {
                            if ($vDep->getDeploymentVaccId() == $vac->getVaccId()) {
                                $brand = $vac->getVaccName();
                            }
                        }
                    }
                }

                foreach ($health_district as $hd) {
                    if ($vd->getHealthDistId() == $hd->getHealthDistrictId()) {
                        $healthDistrict = $hd->getHealthDistrictName();
                    }
                }
                echo "<tr onclick = 'showDrive(this)'>
                <td>$count</td>
                <td>$driveId</td>
                <td>$brand</td>
                <td>$healthDistrict</td>
                <td>$location</td>
                <td>$date</td>
</tr>";
            }
            ?>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script>
        var modal1 = document.getElementById("DeployModal");
        var modal2 = document.getElementById("HealthDModal");
        var modal3 = document.getElementById("DeployModalConf");
        var modal4 = document.getElementById("HealthDModalConf");
        var addDepButt = document.getElementById("addDepBtn");
        var addHealthD = document.getElementById("addHealthDBtn");
        var cancel1 = document.getElementById("cancel1");
        var cancel2 = document.getElementById("cancel2");
        var add1 = document.getElementById("add1");
        var add2 = document.getElementById("add2");
        var no1 = document.getElementById("no1");
        var yes1 = document.getElementById("yes1");
        var no2 = document.getElementById("no2");
        var yes = document.getElementById("yes2");
        var close1 = document.getElementById("close1")
        var close2 = document.getElementById("close2")
        var close3 = document.getElementById("close3")
        var close4 = document.getElementById("close4")
        var list = document.getElementById("listPatientContent")

        addDepButt.onclick = function () {
            modal1.style.display = "block";
        }

        cancel1.onclick = function () {
            modal1.style.display = "none";
        }

        add1.onclick = function () {
            modal3.style.display = "block";
        }

        no1.onclick = function () {
            modal3.style.display = "none";
        }

        yes1.onclick = function () {
            //enter code to add deployment here
        }

        addHealthD.onclick = function () {
            modal2.style.display = "block";
        }

        cancel2.onclick = function () {
            modal2.style.display = "none";
        }

        add2.onclick = function () {
            modal4.style.display = "block";
        }

        no2.onclick = function () {
            modal4.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal1 || event.target == modal2) {
                modal1.style.display = "none";
                modal2.style.display = "none";
            }
        }

        close1.onclick = function () {
            modal1.style.display = "none";
        }
        close2.onclick = function () {
            modal2.style.display = "none";
        }
        close3.onclick = function () {
            modal3.style.display = "none";
        }
        close4.onclick = function () {
            modal4.style.display = "none";
        }

        function showDrive (val) {
            console.log(val);
            var id = val.getElementsByTagName("td")[1].innerText;
            console.log(id);
            $.ajax({
                url: 'ManageDeploymentSummary.php',
                method: 'POST',
                data: {id: id},
                success: function (result) {
                    console.log('passed');
                    document.getElementById("listPatientContent").innerHTML = result;
                }
            })
        }

    </script>
</body>

