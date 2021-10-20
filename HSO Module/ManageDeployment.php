<?php

//include ("../includes/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+ | Manage Deployment</title>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="../javascript/showDateAndTime.js"> </script>

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
            <h4 id="headingNav1"> Health Service Office </h4>
            <hr>
            <h5 id="headingNav2"> September 17, 2021 | 01:24 PM</h5>
            <hr>

            <li>
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="ManagePatientHome.php"><i class="fas fa-user-circle"></i> Manage Patients</a>
            </li>
            <li class="active">
                <a href="ManageDeployment.php"><i class="fas fa-truck"></i> Manage Deployment</a>
            </li>
            <li>
                <a href="ManageReportHome.php"><i class="fas fa-sticky-note"></i> Reports</a>
            </li>
            <li>
                <a href="aboutAdmin.html"><i class="fas fa-question"></i> About</a>
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

        <nav class="navbar navbar-expand-lg navbar-light bg-light upperBoxOG">
            <div class="container-fluid upperBox">

                <button class="btnTop btnBell">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </nav>

        <!-- Page Content  -->




        <form id='newDeploymentForm' method="post" enctype="multipart/form-data">
            <div id="DeployModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Deployment</h4>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModal('DeployModal')">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">

                                    <label for="site">Select Vaccination Site: </label>
                                    <select name="site" id="site">
                                        <?php
                                        require '../require/getVaccinationSites.php';
                                        foreach ($vaccinationSites as $vs) {
                                            $vacSite = $vs->getVaccinationSiteLocation();
                                            $id = $vs->getVaccinationSiteId();
                                            echo "<option value =$id>$vacSite</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="VaccineBr">Select Vaccine Brand: </label>
                                    <select name="vaccineBrand" id="VaccineBr">
                                        <?php
                                        require '../require/getVaccine.php';
                                        foreach ($vaccines as $vac) {
                                            $vacName = $vac->getVaccName();
                                            $vacId = $vac->getVaccId();
                                            echo "<option value = $vacId>$vacName</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="PatientCateg">Category of patients: </label>
                                    <select name="patientCategory" id="PatientCateg">
                                        <option value="A1: Health Care Workers">A1: Health Care Workers</option>
                                        <option value="A2: Senior Citizens">A2: Senior Citizens</option>
                                        <option value="A3: Adult with Comorbidity">A3: Adult with Comorbidity</option>
                                        <option value="A4: Frontline Personnel in Essential Sector">A4: Frontline
                                            Personnel
                                            in Essential Sector
                                        </option>
                                        <option value="A5: Indigent Population">A5: Indigent Population</option>
                                        <option value="A6: Rest Of The Population">A6: Rest Of The Population</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label>Date: </label><br>
                                    <input type="date" id="date" name="date" class="dateForm">
                                </div>
                            </div>

                        </div>

                        <label class='label' for="stubs">Number of Stubs: </label>
                        <input type="input" id="stubs" name="stubs" class="stubs" placeholder="ex. 100">

                        <hr>
                        <label for="district">Select Health District/s: </label>
                        <div id="district" class="AddHealthD-option">
                            <div id="districList">
                                <div class="row">
                                    <ul>
                                        <?php
                                        require_once "../require/getHealthDistrict.php";


                                        foreach ($health_district as $hd) {
                                            $hdId = $hd->getHealthDistrictId();
                                            $hdName = $hd->getHealthDistrictName();
                                            echo " <li>
                                    <input class = 'checkboxes' type='checkbox' onclick='selected($hdId)'>
                                    <label>$hdName</label><br>
                                </li> ";
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" onclick="closeModal('DeployModal')"> Cancel
                        </button>
                        <button type="button" class="btn btn-success" onclick="add('Deployment', addDep)"> Add</button>
                    </div>
                </div>
            </div>
        </form>


        <div id="HealthD" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Health Districts</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthD')">&times;
                    </button>
                </div>

                <div id="healthDMain" class="modal-body">
                    <button type="button" class="siteAddButton" onclick="openModal('HealthDModal')">
                        <i class="fas fa-plus"></i>
                        Add Health District
                    </button>
                    <div id="distContent">
                        <table class="table table-row table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Health District Id</th>
                                <th scope="col">District Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <?php
                            require_once '../require/getHealthDistrict.php';

                            $count = 0;
                            foreach ($health_district as $hd) {
                                $count++;
                                $districtId = $hd->getHealthDistrictId();
                                $districtName = $hd->getHealthDistrictName();
                                $number = $hd->getContact();

                                echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$count</td>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='buttonTransparent' onclick='event.stopPropagation(); del($districtId ,deleteDistrict)'><i class='fas fa-trash-alt'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div id="HealthDModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Health District</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthDModal')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <label>Name of Health District:</label>
                    <input class="districtWidth" type="text" id="newHealthDistrict" name="newHealthDistrict">

                    <label>Health District Contact Number:</label>
                    <input class="contactWidth" type="text" id="contactNumber" name="contactNumber">

                    <div>
                        <label for="optionBrgy">Select Barangay/s: </label>
                        <a href="#" class="w3-bar-item w3-button">All</a>
                        <a href="#" class="w3-bar-item w3-button">None</a>

                        <label class="sortPosition">Sort By:</label>
                        <select class="sortWidth" id="sort">
                            <option value="brgy1">None</option>
                        </select>
                    </div>

                    <div class="AddHealthD-option">
                        <div class="row">
                            <ul>
                                <?php
                                require_once "../require/getBarangay.php";


                                foreach ($barangays as $b) {
                                    $id = $b->getBarangayId();
                                    $name = $b->getBarangayName();
                                    echo " <li>
                                    <input class = 'checkboxes' type='checkbox' onclick='selected($id)'>
                                    <label>$name</label><br>
                                </li> ";
                                }
                                ?>
                            </ul>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" onclick="closeModal(HealthDModal)"> Cancel
                        </button>
                        <button type="button" class="btn btn-success" onclick="add('Health District', addDistrict)">
                            Add
                        </button>

                    </div>
                </div>
            </div>
        </div>


        <div id="HealthDView" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Health District</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthDView')">
                        &times;
                    </button>
                </div>

                <div id="healthDContent" class="modal-body">

                </div>

            </div>
        </div>

        <div id="HealthDBarangay" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Barangay</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthDBarangay')">
                        &times;
                    </button>
                </div>

                <div id="healthDBarangayContent" class="modal-body">

                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col my-auto">
                    <div class="search-container searchDept float-left">
                        <input id="searchDep" type="text" placeholder="Search" class="searchHome "name="searchPatient" onkeyup="searchPatient()">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <button type="button" class="btn btn-warning buttonTop3" onclick="openModal('archived')">
                        <i class="fas fa-inbox fa-lg"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="sfDiv col-md-1.5 my-auto">
                    <select class="form-select filterButton" id="filterReports" name="filterReports"
                            onchange="filterReport(this)">
                        <option value="" selected disabled hidden>Filter By</option>
                        <option>All</option>
                        <option>Dates</option>
                        <option>Location</option>
                        <option># of stubs</option>
                    </select>
                </div>
                <div class="sfDiv col-md-1.5 my-auto">
                    <select class="form-select sortButton" id="sortReports" name="sortReports"
                            onchange="sortReport(this)">
                        <option value="" selected disabled hidden>Sort By</option>
                        <option>Name Asc</option>
                        <option>Name Desc</option>
                        <option>Date Asc</option>
                        <option>Date Desc</option>
                        <option># of Stubs Asc</option>
                        <option># of Stubs Desc</option>
                    </select>
                </div>

                <div class="col">
                    <div class="col">
                        <button type="button" class=" buttonTop3" onclick="openModal('vaccSiteModal')">
                            <i class="fas fa-hospital"></i>
                             Vaccination Sites
                        </button>
                    </div>
                    <div class="col">
                        <button id="HealthDBtn" type="button" class="buttonTop3" onclick="openModal('HealthD')">
                            <i class="fas fa-file-medical"></i>
                             Health Districts
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="buttonTop3" onclick="openModal('DeployModal')">
                            <i class="fas fa-plus"></i>
                             Add Deployment
                        </button>
                    </div>
                </div>



            </div>


        </div>

        <div id="vaccSiteModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Vaccination Sites</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('vaccSiteModal')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="siteAddButton" onclick=" openModal('addVaccSite')">
                        <i class="fas fa-plus"></i>
                        Add Vaccination Site
                    </button>
                    <div id="siteContent">
                        <table class="table table-row table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vaccination Site Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <?php
                            require_once '../require/getVaccinationSites.php';

                            $count = 0;
                            foreach ($vaccinationSites as $vs) {
                                $count++;
                                $siteId = $vs->getVaccinationSiteId();
                                $vaccinationSite = $vs->getVaccinationSiteLocation();

                                echo "<tr class='table-row''>
                                    <td>$count</td>
                                    <td>$siteId</td>
                                    <td>$vaccinationSite</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='buttonTransparent' onclick = 'del($siteId,deleteSite)'><i class ='fas fa-trash-alt'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div id="addVaccSite" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Vaccination Site</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('addVaccSite')">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <label>Vaccine Site Location:</label>
                    <input class="districtWidth" type="text" id="newVaccinationSite" name="newVaccinationSite">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" onclick="closeModal('addVaccSite')"> Cancel
                        </button>
                        <button type="button" class="btn btn-success"
                                onclick='add("Vaccination Site",addSite, "vaccSiteModal")'> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="archived" class="modal-window">
            <div class="content-modal-table">
                <div class="modal-header">
                    <h4 class="modal-title">Archived Vaccination Drives</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                        &times;
                    </button>
                </div>
                <div id = 'archivedContent' class="modal-body">
                    <table class="table table-row table-hover tableModal">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Drive Id</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">No. of Stubs</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <?php
                        require_once '../require/getVaccinationDrive.php';
                        require_once '../require/getVaccinationSites.php';

                        $count = 0;
                        foreach ($vaccination_drive as $vd) {
                            if ($vd->getArchive() == 1) {
                                $count++;
                                $driveId = $vd->getDriveId();
                                $date = $vd->getVaccDate();
                                $stubs = $vd->getVaccStubs();


                                foreach ($vaccinationSites as $vs) {
                                    if ($vs->getVaccinationSiteId() == $vd->getVaccDriveVaccSiteId()) {
                                        $vaccinationSite = $vs->getVaccinationSiteLocation();
                                    }
                                }

                                echo "<tr class='table-row'>
                        <td>$count</td>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>$stubs</td>
                        <td>
                            <div style='text-align: left;'>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
                            </div>
                        </td>
             
                      </tr>";
                            }
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>


        <!-- Search Container-->
<!--        <div class="search-container">-->
<!--            <input type="text" id="searchDrive" name="searchDrive" placeholder="Search"-->
<!--                   onkeyup="searchDrive()">-->
<!--            <button type="submit" name="searchDriveBtn" onclick="searchDrive()"><i-->
<!--                        class="fa fa-search"></i></button>-->
<!--        </div>-->

        <div id="unarchiveContent" class="row">
            <div class="tableScroll1 col ">
                <table class="table table-row table-hover tableDep" id = "driveTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Drive Id</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date</th>
                        <th scope="col">No. of Stubs</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <?php
                    require_once '../require/getVaccinationDrive.php';
                    require_once '../require/getVaccinationSites.php';

                    $count = 0;
                    foreach ($vaccination_drive as $vd) {
                        if ($vd->getArchive() == 0) {
                            $count++;
                            $driveId = $vd->getDriveId();
                            $date = $vd->getVaccDate();
                            $stubs = $vd->getVaccStubs();


                            foreach ($vaccinationSites as $vs) {
                                if ($vs->getVaccinationSiteId() == $vd->getVaccDriveVaccSiteId()) {
                                    $vaccinationSite = $vs->getVaccinationSiteLocation();
                                }
                            }

                            echo "<tr class='table-row' onclick='showDrive(this)'>
                        <td>$count</td>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>$stubs</td>
                        <td>
                            <div style='text-align: left;'>
                                <button class='buttonTransparent' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                            </div>
                        </td>
             
                      </tr>";
                        }
                    }

                    ?>
                </table>
            </div>
            <div class="col-sm-auto">
                <div class="depSummary">
                    <div class="four listPatientRow">
                        <div class="listPatient-box colored">
                            <center><h3>Deployment Summary</h3></center>
                        </div>
                    </div>
                    <div class="four listPatientRow row2">
                        <div id="listPatientContent" class="listPatient-box colored">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        var list = document.getElementById("listPatientContent");
        var checkedValue = [];
        var id = "";
        var clicked = false;

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        window.onclick = function (event) {
            if (event.target == document.getElementById("DeployModal") || event.target == document.getElementById("HealthDModal") || event.target == document.getElementById("vaccSiteModal") || event.target == document.getElementById("HealthD")) {
                document.getElementById("DeployModal").style.display = "none";
                document.getElementById("HealthDModal").style.display = "none";
                document.getElementById("vaccSiteModal").style.display = "none";
                document.getElementById("HealthD").style.display = "none";

            }
        }

        function clickArchive(drive, option){
            console.log(drive)
            console.log(option)
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {archive: drive, option: option},
                success: function (result) {
                    if (option == "Archive") {
                        window.location.href = "ManageDeployment.php";

                    } else if(option == "UnArchive") {
                        document.getElementById("archivedContent").innerHTML = result;
                    }
                }
            })
        }

        function openModal(modal) {
            console.log(modal)
            document.getElementById(modal).style.display = "block";
        }

        function openList(val) {
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {barId: val},
                success: function (result) {
                    document.getElementById("healthDBarangayContent").innerHTML = result;
                    document.getElementById("HealthDBarangay").style.display = "block";
                }
            })
        }

        function closeModal(modal) {
            document.getElementById(modal).style.display = "none";
        }

        function showDrive(val) {
            console.log(val);
            var id = val.getElementsByTagName("td")[1].innerText;
            console.log(id);
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {id: id},
                success: function (result) {
                    // console.log('passed');
                    document.getElementById("listPatientContent").innerHTML = result;
                }
            })
        }

        function showDistrict(val) {

            id = val.getElementsByTagName("td")[1].innerText;
            var name = val.getElementsByTagName("td")[2].innerText;
            var number = val.getElementsByTagName("td")[3].innerText;

            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {healthName: name, number: number, healthId: id},
                success: function (result) {
                    document.getElementById('HealthDView').style.display = "block";
                    document.getElementById("healthDContent").innerHTML = result;
                }
            })
        }

        function addBarangay() {
            console.log(checkedValue)
            console.log(id)
            Swal.fire({
                icon: 'info',
                title: 'Do you want to add this Barangay?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'ManageDeploymentProcessor.php',
                        method: 'POST',
                        data: {
                            list: checkedValue,
                            hdId: id
                        },
                        success: function (result) {
                            document.getElementById("healthDContent").innerHTML = "";
                            document.getElementById("HealthDBarangay").style.display = "none";
                            document.getElementById("healthDContent").innerHTML = result;
                            console.log(result)
                        }
                    })
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

        function addDep() {
            var brand = document.getElementById("VaccineBr").value;
            var date = document.getElementById("date").value;
            var location = document.getElementById("site").value;
            var stubs = document.getElementById("stubs").value;
            var categ = document.getElementById("PatientCateg").value;
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {
                    districts: checkedValue,
                    stub: stubs,
                    date: date,
                    location: location,
                    brand: brand,
                    patient_category: categ
                },
                success: function (result) {
                    window.location.href = "ManageDeployment.php";
                }
            })

        }

        function addDistrict() {
            var healthDistrictName = document.getElementById("newHealthDistrict").value;
            var districtNumber = document.getElementById("contactNumber").value;

            console.log(healthDistrictName);
            console.log(checkedValue);
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {barangays: checkedValue, healthDistrictName: healthDistrictName, number: districtNumber},
                success: function (result) {
                    document.getElementById("HealthDModal").style.display = "none";
                    document.getElementById("distContent").innerHTML = result;
                }
            })
        }

        function addSite() {
            var siteName = document.getElementById("newVaccinationSite").value;
            console.log(siteName);
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {site: siteName},
                success: function (result) {
                    document.getElementById('addVaccSite').style.display = "none";
                    document.getElementById('siteContent').innerHTML = result;

                }
            })
        }

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

        function selected(id) {
            console.log(id);
            if (checkedValue.indexOf(id) < 0) {
                checkedValue.push(id);
            } else {
                var idx = checkedValue.indexOf(id);
                checkedValue.splice(idx, 1);
            }
        }

        function deleteDistrict(delDistId) {
            console.log('passed');
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {deleteDistId: delDistId},
                success: function (result) {
                    document.getElementById("distContent").innerHTML = "";
                    document.getElementById("distContent").innerHTML = result;
                }
            })

        }

        function deleteBarangay(barangayId) {
            console.log(barangayId)
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {brgyId: barangayId},
                success: function (result) {
                    document.getElementById('healthDContent').innerHTML = "";
                    document.getElementById('healthDContent').innerHTML = result;
                    console.log(result)

                }
            })
        }

        function deleteSite(siteId) {
            console.log(siteId);
            $.ajax({
                url: 'ManageDeploymentProcessor.php',
                method: 'POST',
                data: {deleteSiteId: siteId},
                success: function (result) {
                    document.getElementById('siteContent').innerHTML = result;
                }
            })
        }

        async function add(item, action) {
            Swal.fire({
                icon: 'info',
                title: 'Do you want to add this ' + item + '?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    action();
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

        async function del(item, action) {
            Swal.fire({
                icon: 'error',
                title: 'Are You Sure you Want to Delete?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    action(item);
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

        async function archive(archive, action, drive) {
            if(archive == 1){
                archiveText = "Archive";
            }else{
                archiveText = "UnArchive";
            }
            Swal.fire({
                icon: 'info',
                title: 'Are You Sure you Want to ' + archiveText + ' this item?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    action(drive, archiveText);
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

    </script>
</body>