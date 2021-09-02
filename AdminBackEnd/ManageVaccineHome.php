<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Title -->
    <title>SMIT+ | Manage Vaccine</title>
    <!--Favicon-->
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
            <h3 id="mainmenu">Main Menu</h3>
            <li>
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="active">
                <a href="ManageVaccineHome.php" ><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="#ManageUsersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-users"></i> Manage Users</a>
                <ul class="collapse list-unstyled" id="ManageUsersSubmenu">
                    <li>
                        <a href="ManagePersonnelHome.php">Personnel</a>
                    </li>
                    <li>
                        <a href="ManagePatientHome.php">Patients</a>
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

        <button id="addVaccineBtn" type="button" class="buttonTop">Add Vaccine</button>

        <form id='addVaccineForm' method="post" enctype="multipart/form-data">
            <div id="vaccineModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h2 id="headerAddVaccine"> Add Vaccine </h2>
                        <span id="addVaccineClose" class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <label for="selectedVaccine"> Select a Vaccine: </label>
                        <select class="form-select col-lg-12 vaccineType" id="selectedVaccine" name="selectedVaccine" onchange="updateVaccineInfo(this)">
                            <?php
                            include '../includes/database.php';
                            $getVaccinesQuery = "SELECT vaccine_name FROM vaccine";
                            $stmt = $database->stmt_init();
                            $stmt->prepare($getVaccinesQuery);
                            $stmt->execute();
                            $stmt->bind_result($vaccine);
                            $listVaccines = [];
                            while ($stmt->fetch()) {
                                $listVaccines[] = $vaccine;
                            }
                            foreach ($listVaccines as $vac) {
                                echo "<option>$vac</option>";
                            }
                            ?>
                        </select>

                        <label for="batchNo"> Batch Quantity Received </label>
                        <input type="number" id="batchNo" name="batchNo" min="1" max="15" value="1"
                               onkeyup="updateBatchList(this)" onclick="updateBatchList(this)">
                        <label for="dateStored">Date Stored</label>
                        <input type='date' id="dateStored" name="dateStored">
                        <div id="selectedVaccineInfo"></div>
                        <div id="vaccineBatch"></div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancelBtnVaccine">Cancel</button>
                        <?php
                        echo " <button type='submit' id='addBtnVaccine' name='addBtnVaccine' form='addVaccineForm'> Add </button>";
                        ?>
                    </div>
                </div>
            </div>
        </form>

        <button id="addNewVaccineBtn" type="button" class="buttonTop">Add New Vaccine</button>

        <form id='newVaccineForm' method="post" enctype="multipart/form-data">
            <div id="newVaccineModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h2 id="headerAddNewVaccine">Add New Vaccine</h2>
                        <span id="newVaccineClose" class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Vaccine Details</h4>
                                <label for="vaccineName"> Vaccine Name </label>
                                <input type="text3"  class="form-control" id="vaccineName" placeholder="Ex. Sinovac">

                                <label for="vaccineManufacturer"> Vaccine Manufacturer </label>
                                <input type="text3"  class="form-control" id="vaccineManufacturer" placeholder="Enter Manufacturer">

                                <label for="vaccineDescription"> Vaccine Description </label>
                                <input type="textDesc"  class="form-control" id="vaccineDescription" placeholder="Enter Description">
                            </div>
                            <div class="col-md-6">
                                <h4 class="addNewVaccineH3">Vaccine Characteristics</h4>
                                <label for="vaccineType"> Vaccine Type: </label>
                                <select id="vaccineType">
                                    <option selected disabled>Select Vaccine Type</option>
                                    <option value="Inactivated Virus">Inactivated Vaccine</option>
                                    <!--<option value="Live-attenuated Vaccine">Live-attenuated Vaccine</option>-->
                                    <option value="Viral vector">Viral vector Vaccine</option>
                                </select>
                                <label for="vaccineEfficacy"> Vaccine Efficacy: </label>
                                <select id="vaccineEfficacy">
                                    <option selected disabled>Select Vaccine Efficacy</option>
                                    <option value="90">90%</option>
                                    <option value="70">70%</option>
                                    <option value="50">50%</option>
                                </select>
                                <label for="dosageRequired"> Dosage Required </label>
                                <input type="text3"  class="form-control" id="dosageRequired" placeholder="Enter Dosage Required">
                                <label for="dosageInterval"> Dosage Interval </label>
                                <input type="text3"  class="form-control" id="dosageInterval" placeholder="Enter Dosage Interval">
                                <h4> Storage and Handling</h4>
                                <label for="minimumTemperature"> Minimum Temperature </label>
                                <input type="text3"  class="form-control" id="minimumTemperature" placeholder="Minimum Temperature">
                                <label for="maximumTemperature"> Maximum Temperature </label>
                                <input type="text3"  class="form-control" id="maximumTemperature" placeholder="Maximum Temperature">
                                <label for="lifeSpan"> Life Span </label>
                                <input type="text3"  class="form-control" id="lifeSpan" placeholder="Life Span">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button id="cancelBtnNewVaccine"> Cancel</button>
                        <?php
                        echo " <button type='submit' id='addBtnNewVaccine' name='addBtnNewVaccine' form='newVaccineForm'> Add </button>";
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="search-container">
            <input type="text" id="searchVaccine" class="searchHome" name="searchVaccine" placeholder="Search" onkeyup="searchVaccine()">
            <button type="submit" id="searchVaccineBtn" name="searchVaccineBtn" onclick="searchVaccine()"><i class="fa fa-search"></i></button>
        </div>

        <table class="table table-row table-hover" id="vaccineTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vaccine Lot ID</th>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Date Received</th>
                <th scope="col">Date Expiration</th>
                <th scope="col">Batch Quantity</th>
                <th scope="col">Bottle Quantity</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <?php
            require_once '../require/getVaccine.php';
            require_once '../require/getVaccineBatch.php';
            require_once '../require/getVaccineLot.php';

            $count = 0;
            foreach ($vaccineLots as $vl) {
                $count++;
                $vaccineLotId = $vl->getVaccLotId();
                $vaccLotVaccId = $vl->getVaccLotVaccId();
                $dateStored = $vl->getDateVaccStored();
                $batchQty = $vl->getVaccBatchQty();

                foreach ($vaccineBatches as $vb) {
                    if ($vb->getVaccBatchId() == $vaccineLotId) {
                        $vaccExp = $vb->getDateExp();
                    }
                }

                foreach ($vaccines as $vac) {
                    if ($vaccLotVaccId == $vac->getVaccId()) {
                        $vaccName = $vac->getVaccName();
                    }
                }

                $query = "SELECT SUM(vaccine_quantity) FROM vaccine_batch WHERE vaccine_lot_id = $vaccineLotId";

                $stmt = $database->stmt_init();
                $stmt->prepare($query);
                $stmt->execute();
                $stmt->bind_result($vaccQty);
                $stmt->fetch();

                echo "<tr>
                <td>$count</td>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$batchQty</td>
                <td>$vaccQty</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php
if (isset($_POST['addBtnVaccine'])) {
    include '../includes/database.php';
    $selectedVaccine = $_POST['selectedVaccine'];
    $batchNo = $_POST['batchNo'];
    $dateStored = $_POST['dateStored'];
    $batchVacQty = $_POST['batchVacQty'];
    $batchDateManu = $_POST['batchDateManu'];
    $batchDateExp = $_POST['batchDateExp'];

    $getVacIdQuery = "SELECT vaccine_id FROM vaccine WHERE vaccine_name='$selectedVaccine'";
    $dbase = $database->stmt_init();
    $dbase->prepare($getVacIdQuery);
    $dbase->execute();
    $dbase->bind_result($vaccineid);
    $dbase->fetch();
    $dbase->close();

    $query1 = "INSERT INTO vaccine_lot (vaccine_id, employee_account_id, vaccine_batch_quantity, date_stored) VALUE ('$vaccineid', 1, '$batchNo', '$dateStored');";
    $database->query($query1);

    $getVacLotIdQuery = "SELECT vaccine_lot_id FROM vaccine_lot ORDER BY vaccine_lot_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getVacLotIdQuery);
    $dbase->execute();
    $dbase->bind_result($vaccineLotId);
    $dbase->fetch();
    $dbase->close();

    $count = 0;
    while ($count < $batchNo) {
        $query2 = "INSERT INTO vaccine_batch (vaccine_lot_id, vaccine_id, vaccine_quantity, date_manufactured, date_of_expiration) VALUE ('$vaccineLotId', '$vaccineid', '$batchVacQty[$count]', '$batchDateManu[$count]', '$batchDateExp[$count]');";
        $database->query($query2);
        $count++;
    }
}
?>

<?php
if (isset($_POST['addBtnNewVaccine'])) {
    include '../includes/database.php';
    $vaccineName = $_POST['vaccineName'];
    $vaccineManufacturer = $_POST['vaccineManufacturer'];
    $vaccineDescription = $_POST['vaccineDescription'];
    $vaccineType = $_POST['vaccineType'];
    $vaccineEfficacy = (int)$_POST['vaccineEfficacy'];
    $dosage = $_POST['dosage'];
    $interval = $_POST['interval'];
    $minTemp = $_POST['minTemp'];
    $maxTemp = $_POST['maxTemp'];
    $lifeSpan = $_POST['lifeSpan'];


    $query1 = "INSERT INTO vaccine (vaccine_name, vaccine_type, vaccine_efficacy, vaccine_lifespan_in_months) VALUE ('$vaccineName', '$vaccineType', '$vaccineEfficacy', '$lifeSpan');";
    $database->query($query1);

    $getQuery = "SELECT vaccine_id FROM vaccine WHERE vaccine_name='$vaccineName'";
    $dbase = $database->stmt_init();
    $dbase->prepare($getQuery);
    $dbase->execute();
    $dbase->bind_result($vaccineid);
    $dbase->fetch();
    $dbase->close();

    $query2 = "INSERT INTO vaccine_information (vaccine_id, vaccine_manufacturer, vaccine_description, vaccine_dosage_required, vaccine_dosage_interval, vaccine_minimum_temperature, vaccine_maximum_temperature) VALUE ('$vaccineid', '$vaccineManufacturer', '$vaccineDescription', '$dosage', '$interval', '$minTemp', '$maxTemp');";
    $database->query($query2);
}
?>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
<!-- AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<script>
    function searchVaccine() {
        var textSearch = document.getElementById("searchVaccine").value;
        $.ajax({
            url: 'ManageVaccineProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("vaccineTable").innerHTML = result;
            }
        });
    }

    // Add Vaccine
    var addVaccineModal = document.getElementById("vaccineModal");
    var addVaccineBtn = document.getElementById("addVaccineBtn");
    var addVaccineClose = document.getElementById("addVaccineClose");
    var cancelAddVaccine = document.getElementById("cancelBtnVaccine");

    addVaccineBtn.onclick = function () {
        addVaccineModal.style.display = "block";
    }

    addVaccineClose.onclick = function () {
        addVaccineModal.style.display = "none";
    }

    cancelAddVaccine.onclick = function () {
        addVaccineModal.style.display = "none";
    }

    // Add New Vaccine
    var newVaccineModal = document.getElementById("newVaccineModal");
    var addNewVaccineBtn = document.getElementById("addNewVaccineBtn");
    var newVaccineClose = document.getElementById("newVaccineClose");
    var cancelNewVaccine = document.getElementById("cancelBtnNewVaccine");

    addNewVaccineBtn.onclick = function () {
        newVaccineModal.style.display = "block";
    }

    newVaccineClose.onclick = function () {
        newVaccineModal.style.display = "none";
    }

    cancelNewVaccine.onclick = function () {
        newVaccineModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === newVaccineModal) {
            newVaccineModal.style.display = "none";
        } else if (event.target === addVaccineModal) {
            addVaccineModal.style.display = "none";
        }
    }

    function updateVaccineInfo(vaccine) {
        $.ajax({
            url: 'ManageVaccineProcessor.php',
            type: 'POST',
            data: {"vaccine": vaccine.value},
            success: function (result) {
                document.getElementById("selectedVaccineInfo").innerHTML = result;
            }
        });
    }

    function updateBatchList(batch) {
        $.ajax({
            url: 'ManageVaccineProcessor.php',
            type: 'POST',
            data: {"batch": batch.value},
            success: function (result) {
                document.getElementById("vaccineBatch").innerHTML = result;
            }
        });
    }
</script>

<script>
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
<!--
<script>

    $(document).ready(function ($) {
        $(".table-row").click(function () {
            window.document.location = $(this).data("href");
        });
    });
</script>
 -->
</body>