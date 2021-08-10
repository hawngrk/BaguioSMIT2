<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

</head>
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
<script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
<!-- Font Awesome JS -->
<script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
                <a href="ManageVaccineHome.php" class="active"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="#ManageUsersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Manage Users</a>
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
                <a href="#"><i class="fas fa-truck"></i> Manage Deployment</a>
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
        <button id="addVaccineBtn" type="button" class="buttonTop">Add Vaccine</button>

        <form id='addVaccineForm' method="post" enctype="multipart/form-data">
            <div id="vaccineModal" class="modal">
                <div class="modal-content container">
                    <h2 id="headerAddVaccine"> Add Vaccine <span id="addVaccineClose" class="close">&times;</span></h2>
                    <div class="AddVaccine-PopUp">
                        <label for="selectedVaccine"> Select a Vaccine: </label>
                        <select class="form-select col-lg-12 vaccineType" id="selectedVaccine" name="selectedVaccine">
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
                        <input type="number" id="batchNo" name="batchNo" min="1" max="15" value="1">
                        <label for="dateStored">Date Stored</label>
                        <input type='date' id="dateStored" name="dateStored">
                        <div id="selectedVaccineInfo"></div>
                        <div id="vaccineBatch"></div>
                        <div>
                            <button id="cancelBtnVaccine">Cancel</button>
                            <?php
                            echo " <button type='submit' id='addBtnVaccine' name='addBtnVaccine' form='addVaccineForm'> Add </button>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <button id="addNewVaccineBtn" type="button" class="buttonTop">Add New Vaccine</button>

        <form id='newVaccineForm' method="post" enctype="multipart/form-data">
            <div id="newVaccineModal" class="modal">
                <div class="modal-content container">
                    <h2 id="headerAddNewVaccine">Add New Vaccine<span id="newVaccineClose" class="close">&times;</span>
                    </h2>
                    <div class="AddNewVaccine-PopUp">
                        <h4 class="addNewVaccineH3">Vaccine Details</h4>
                        <input class="vaccineName col-lg-12" type="input" name="vaccineName" placeholder="Vaccine Name">
                        <input class="vaccineManufacturer col-lg-12" type="input" name="vaccineManufacturer"
                               placeholder="Vaccine Manufacturer">
                        <input class="vaccineDescription col-lg-12" type="input" name="vaccineDescription"
                               placeholder="Vaccine Description">
                        <h4 class="addNewVaccineH3">Vaccine Characteristics</h4>
                        <!-- <input class="col-xs-12" type="input" name="vaccineType" placeholder="Vaccine Type"> -->
                        <select class="form-select col-lg-12 vaccineType" name="vaccineType">
                            <option selected disabled>Vaccine Type</option>
                            <option>Inactivated Vaccine</option>
                            <option>Live-attenuated Vaccine</option>
                            <option>Viral vector Vaccine</option>
                        </select>

                        <select class="form-select col-lg-12 vaccineEfficacy" name="vaccineEfficacy">
                            <option selected disabled>Vaccine Efficacy</option>
                            <option>90%</option>
                            <option>70%</option>
                            <option>50%</option>
                        </select>

                        <input class="col-lg-12 dosageRequired" type="input" name="dosage"
                               placeholder="Dosage Required">
                        <input class="col-lg-12 dosageInterval" type="input" name="interval"
                               placeholder="Dosage Interval">

                        <h4 class="addNewVaccineH3"> Storage and Handling</h4>
                        <input class="col-lg-12 minimumTemperature" type="input" name="minTemp"
                               placeholder="Minimum Temperature">
                        <input class="col-lg-12 maximumTemperature" type="input" name="maxTemp"
                               placeholder="Maximum Temperature">
                        <input class="col-lg-12 lifeSpan" type="input" name="lifeSpan" placeholder="Life Span">
                    </div>
                    <div>
                        <button id="cancelBtnNewVaccine"> Cancel</button>
                        <?php
                        echo " <button type='submit' id='addBtnNewVaccine' name='addBtnNewVaccine' form='newVaccineForm'> Add </button>";
                        ?>
                    </div>
                </div>
            </div>
        </form>

        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <table class="table table-row table-hover">
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
                $vaccineLotId = $vl->getVaccLotId(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
                $vaccLotVaccId = $vl->getVaccLotVaccId();
                $dateStored = $vl->getDateVaccStored();
                $batchQty = $vl->getVaccBatchQty();

                foreach($vaccineBatches as $vb){
                    if($vb->getVaccBatchId() == $vaccineLotId){
                        $vaccExp = $vb->getDateExp();
                    }
                }

                foreach($vaccines as $vac){
                    if ($vaccLotVaccId == $vac->getVaccId()){
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

        $getVacLotIdQuery = "SELECT vaccine_lot_id FROM vaccine_lot ORDER BY  vaccine_lot_id DESC LIMIT 1";
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script>
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
            if (event.target == newVaccineModal) {
                newVaccineModal.style.display = "none";
            }
        }
        $(document).ready(function () {
            $('#selectedVaccine').change(function () {
                var option = $(this).find('option:selected');
                var vac = option.text();

                $.ajax({
                    url: 'ManageVaccineInputProcessor.php',
                    type: 'POST',
                    data: {"vaccine": vac},
                    success: function (result) {
                        document.getElementById("selectedVaccineInfo").innerHTML = result;
                    }
                })
            })
        });
        $(document).ready(function () {
            $('#batchNo').on('keyup change click', function () {
                var batch = $('#batchNo').val();
                $.ajax({
                    url: 'ManageVaccineInputProcessor.php',
                    type: 'POST',
                    data: {"batch": batch},
                    success: function (result) {
                        document.getElementById("vaccineBatch").innerHTML = result;
                    }
                })
            })
        });
    </script>

    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
</body>