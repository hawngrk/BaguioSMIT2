<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+ | Manage Patients</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
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
            <h4 id="mainmenu">Main Menu</h4>
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
                        <a href="ManagePatientHome.php" >Patients</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="ManageDeployment.php" ><i class="fas fa-truck"></i> Manage Deployment</a>
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

        <div class="listPatientColumn">
            <div class="four listPatientRow">
                <div class="listPatient-box colored">
                    <center><h5>Deployment Summary</h5></center>
                </div>
            </div>
            <div class="four listPatientRow row2">
                <div id="listPatientContent" class="listPatient-box colored">
                </div>
            </div>
        </div>

        <button id="addDepBtn" type="button" class="buttonTop">
            <i class="fas fa-plus"></i>
            Add Deployment
        </button>

        <div id="DeployModal" class="modal-window">
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
                    <div id="uploadListPatient">
                        <h4> List Patients </h4>
                        <div>
                            <a href="url">Generate File</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancel1" type="button" class="btn btn-outline-dark"> Cancel </button>
                    <button id='add1' type="button" class="btn btn-success""> Add</button>
                </div>
            </div>
        </div>

        <div id="DeployModalConf" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Deployment</h4>
                    <span id="close3" class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <h3> Are you sure to add this deployment? </h3>
                </div>
                <div class="modal-footer">
                    <button id="no1" type="button" class="btn btn-outline-dark"> No </button>
                    <button id="yes1" type="button" class="btn btn-success""> Yes </button>
                </div>
            </div>
        </div>

        <button id="addHealthDBtn" type="button" class="buttonTop">
            <i class="fas fa-plus"></i>
            Add Health District
        </button>

        <div id="HealthDModal" class="modal-window">
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

                    <div class="AddHealthD-option">
                        <div class="row">
                            <ul>
                                <li>
                                    <input type="checkbox" id="D1" name="D1" value="D1">
                                    <label for="D1"> District 1</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="D2" name="D2" value="D2">
                                    <label for="D2"> District 2</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="D3" name="D3" value="D3">
                                    <label for="D3"> District 3</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="D3" name="D3" value="D3">
                                    <label for="D3"> District 3</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="D3" name="D3" value="D3">
                                    <label for="D3"> District 3</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="D3" name="D3" value="D3">
                                    <label for="D3"> District 3</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="D3" name="D3" value="D3">
                                    <label for="D3"> District 3</label><br>
                                </li>

                            </ul>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="cancel2" type="button" class="btn btn-outline-dark"> Cancel </button>
                        <button id='add2' type="button" class="btn btn-success"> Add</button>

                    </div>
                </div>
            </div>
        </div>

        <div id="HealthDModalConf" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Health District</h4>
                    <span id="close4" class="close">&times;</span>
                </div>

                <div class="modal-body">
                    <h3> Are you sure to add this Health District? </h3>
                </div>
                <div class="modal-footer">
                    <button id="no2" type="button" class="btn btn-outline-dark"> No </button>
                    <button id='yes2' type="button" class="btn btn-success"> Yes </button>
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

        <table class="table table-row table-hover tableDep">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vaccine ID</th>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-row" data-href="www.google.com">
                <th scope="row">1</th>
                <td>SINOVAC001</td>
                <td>SINOVAC</td>
                <td>SINOVAC MANUFACTURER</td>
                <td>COVAX Facility</td>
                <td>DECEMBER 17, 2021</td>
                <td style= 'vertical-align: middle;'>
                    <div style="text-align: left;">
                        <button class="fa fa-eye"></button>
                        <button class="fa fa-archive"></button>
                    </div>
                </td>

            </tr>
            </tbody>
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

        addDepButt.onclick = function() {
            modal1.style.display = "block";
        }

        cancel1.onclick = function() {
            modal1.style.display = "none";
        }

        add1.onclick = function() {
            modal1.style.display = "none";
            modal3.style.display = "block";
        }

        no1.onclick = function() {
            modal1.style.display = "block";
            modal3.style.display = "none";
        }

        yes1.onclick = function() {
            //enter code to add deployment here
        }

        addHealthD.onclick = function() {
            modal2.style.display = "block";
        }

        cancel2.onclick = function() {
            modal2.style.display = "none";
        }

        add2.onclick = function() {
            modal2.style.display = "none";
            modal4.style.display = "block";
        }

        no2.onclick = function() {
            modal2.style.display = "block";
            modal4.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal1 || event.target == modal2) {
                modal1.style.display = "none";
                modal2.style.display = "none";
            }
        }

        close1.onclick = function() {
            modal1.style.display = "none";
        }
        close2.onclick = function() {
            modal2.style.display = "none";
        }
        close3.onclick = function() {
            modal3.style.display = "none";
        }
        close4.onclick = function() {
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

        var clicked =false;
        function Toggle(){
            var butt = document.getElementById('sidebarCollapse')
            if(!clicked){
                clicked = true;
                butt.innerHTML = "Menu <i class = 'fas fa-angle-double-right'><i>";
            }
            else{
                clicked = false;
                butt.innerHTML = "<i class='fas fa-angle-left'></i> Menu";
            }
        }


    </script>
</body>

