<?php

//include ("../AdminbackEnd/sessionHandling.php");
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

        <form id='newDeploymentForm' method="post" enctype="multipart/form-data">
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
                                        <?php
                                        require '../require/getHealthDistrict.php';
                                        foreach ($health_district as $hd) {
                                            $distName = $hd->getHealthDistrictName();
                                            $id = $hd->getHealthDistrictId();
                                            echo "<option value =$id>$distName</option>";
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
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label for="PatientCateg">Category of patients: </label>
                                    <select name="patientCategory" id="PatientCateg">
                                        <option value="A1: Health Care Workers">A1: Health Care Workers</option>
                                        <option value="A2: Senior Citizens">A2: Senior Citizens</option>
                                        <option value="A3: Adult with Comorbidity">A3: Adult with Comorbidity</option>
                                        <option value="A4: Frontline Personnel in Essential Sector">A4: Frontline Personnel
                                            in Essential Sector
                                        </option>
                                        <option value="A5: Indigent Population">A5: Indigent Population</option>
                                        <option value="A6: Rest Of The Population">A6: Rest Of The Population</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="VaccineLot">Select Vaccine Lot: </label>
                                    <select name="vaccineLot" id="VaccineLot">
                                        <?php
                                        require '../require/getVaccineLot.php';
                                        foreach ($vaccineLots as $vd) {
                                            $lot = $vd->getVaccLotId();
                                            echo "<option value = $lot>$lot</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-2 col-sm-4 datePos">
                                <div class="form-group ">
                                    <label for="date">Date: </label>
                                    <input type="date" id="date" name="date">
                                </div>
                                <div class="form-group batchForm">
                                    <label for="VaccineBat">Select Vaccine Batch: </label>
                                    <select name="vaccineBatch" id="VaccineBat">
                                        <?php
                                        require '../require/getVaccineBatch.php';
                                        foreach ($vaccineBatches as $vb) {
                                            $batch = $vb->getVaccBatchId();
                                            echo "<option value = $batch>$batch</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <label class = 'label' for="location" >Deployment Location: </label>
                            <input type="input" id="location" name="location" class="location" placeholder="ex. Aurora Hill Health Center">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel1" type="button" class="btn btn-outline-dark"> Cancel</button>
                        <button id='depNext' type="button" class="btn btn-primary"> Next </button>
                    </div>
                </div>
            </div>
        </form>

        <div id="DeployPatientModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Deployment</h4>
                    <button type="button" id="closeDep" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <hr><h3>List Patients</h3>
                    <div id="addPatientListContainer" class="addPatient">
                        <div id = "names">

                            <button class="position link" id="genNames" onclick=generate()>Generate Names</button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id='depPrev' type="button" class="btn btn-outline-dark"> Previous </button>
                    <button id="cancelDep" type="button" class="btn btn-outline-dark"> Cancel</button>
                    <button id='depAdd' type="button" class="btn btn-success" onclick=addDep()> Add </button>
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
                    <label>Name of Health District:</label>
                    <input class = "districtWidth" type="text" name="newHealthDistrict">

                    <label>Health District Contact Number:</label>
                    <input class = "contactWidth" type="text" name="contactNumber">

                    <div class="sortPortion">
                        <label for="optionBrgy">Select Barangay/s: </label>
                        <a href="#" class="w3-bar-item w3-button">All</a>
                        <a href="#" class="w3-bar-item w3-button">None</a>

                        <label class = "sortPosition">Sort By:</label>
                        <select class="sortWidth" id="sort">
                            <option value="brgy1" >None</option>
                        </select>
                    </div>

                    <div class="AddHealthD-option">
                        <div class="row">
                            <ul>
                                <?php
                                require_once "../require/getBarangay.php";


                                foreach ($barangays as $b){
                                    $id = $b->getBarangayId();
                                    $name = $b->getBarangayName();
                                    echo " <li>
                                    <input class = 'checkboxes' type='checkbox' value='$id'>
                                    <label>$name</label><br>
                                </li> ";
                                }
                                ?>
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
                <th scope="col">Vaccine Name</th>
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
                echo "<tr class='table-row' onclick = 'showDrive(this)'>
                <td>$count</td>
                <td>$driveId</td>
                <td>$brand</td>
                <td>$healthDistrict</td>
                <td>$location</td>
                <td>$date</td>
                <td style= 'vertical-align: middle;'>
                    <div style='text-align: left;'>
                        <button class='fa fa-eye'></button>
                        <button class='fa fa-archive'></button>
                    </div>
                </td>
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
        var modal5 = document.getElementById("DeployPatientModal");
        var addDepButt = document.getElementById("addDepBtn");
        var addHealthD = document.getElementById("addHealthDBtn");
        var depAdd = document.getElementById("depAdd");
        var cancel1 = document.getElementById("cancel1");
        var cancel2 = document.getElementById("cancel2");
        var cancel3 = document.getElementById("cancelDep");
        var add2 = document.getElementById("add2");
        var no1 = document.getElementById("no1");
        var yes1 = document.getElementById("yes1");
        var no2 = document.getElementById("no2");
        var yes = document.getElementById("yes2");
        var close1 = document.getElementById("close1");
        var close2 = document.getElementById("close2");
        var close3 = document.getElementById("close3");
        var close4 = document.getElementById("close4");
        var close5 = document.getElementById("closeDep");
        var nextBtn = document.getElementById("depNext");
        var prevBtn = document.getElementById("depPrev");
        var list = document.getElementById("listPatientContent");

        nextBtn.onclick = function () {
            modal1.style.display = "none";
            modal5.style.display = "block";
        }

        prevBtn.onclick = function () {
            modal5.style.display = "none";
            modal1.style.display = "block";
        }

        addDepButt.onclick = function () {
            modal1.style.display = "block";
        }

        cancel1.onclick = function () {
            modal1.style.display = "none";
        }

        no1.onclick = function() {
            modal1.style.display = "block";
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

        cancel3.onclick = function () {
            modal5.style.display = "none";
        }

        add2.onclick = function () {
            modal4.style.display = "block";
        }

        no2.onclick = function() {
            modal2.style.display = "block";
            modal4.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal1 || event.target == modal2 || event.target == modal5) {
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal5.style.display = "none";
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

        close5.onclick = function () {
            modal5.style.display = "none";
        }

        function showDrive(val) {
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

        var id = [];

        function generate(){
            var dist = document.getElementById("district").value;
            var categ = document.getElementById("PatientCateg").value;

            $.ajax({
                url: 'ManageDeploymentSummary.php',
                method: 'POST',
                data: {district: dist, category: categ},
                success: function (result) {
                    var patient =  JSON.parse(result)


                    id.push(patient.id);

                    document.getElementById("names").innerHTML = patient.name;
                }
            })

        }

        function addDep(){
            var district = document.getElementById("district").value;
            var brand = document.getElementById("VaccineBr").value;
            var lot = document.getElementById("VaccineLot").value;
            var date = document.getElementById("date").value;
            var batch = document.getElementById("VaccineBat").value;
            var location = document.getElementById("location").value;
            $.ajax({
                url: 'ManageDeploymentSummary.php',
                method: 'POST',
                data: {district: district, brand: brand, lot: lot, date: date, batch: batch, location: location, patientListId: id},
                success: function (result) {

                    console.log(result);
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

        var checkedValue = [];
        var inputElements = document.getElementsByClassName('checkboxes');
        for(var i=0; inputElements[i]; ++i){
            if(inputElements[i].checked){
                checkedValue.push(inputElements[i].value);
            }
        }
    </script>
</body>

