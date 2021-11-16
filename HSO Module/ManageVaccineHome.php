<?php
require_once('../includes/sessionHandling.php');
checkRole('HSO');
//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Title -->
    <title>HSO | Manage Vaccine</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/HSOModule.css" rel="stylesheet">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--    <script src="../includes/commonJS.js"></script>-->

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
            <h5 id="headingNav2">
                <script src="../javascript/showDateAndTime.js"></script>
            </h5>
            <hr>
            <li>
                <a href="HSOdash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="active">
                <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="ManagePatientHome.php"><i class="fas fa-user-circle"></i> Manage Patients</a>
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
            <button type="button" class="btn btn-info" onclick='logout()'>
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Top Nav Bar  -->
    <div id="content">
        <!--Top Nav-->
        <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
            <div class="container-fluid">
                <div>
                    <button onclick="openModal('vaccineModal')" type="button" class="shadow-lg  buttonTop3 float-left">
                        <i
                                class="fas fa-plus"></i> Add Vaccine Lot
                    </button>
                    <button onclick="openModal('newVaccineModal')" type="button"
                            class="shadow-lg  buttonTop3 float-right"><i
                                class="fas fa-syringe"></i> Add New Vaccine Brand
                    </button>

                </div>
                <button type="button" class="btn btn-warning buttonTop3 float-right" onclick="openModal('archived')">
                    <i class="fas fa-inbox fa-lg"></i> Archive
                </button>
            </div>
        </div>

        <!-- Table Container-->
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchVacc" type="search" placeholder="Search" class="form-control"
                                   name="searchVaccine" onkeyup="searchVaccine()"/>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterVac" name="filterVaccines"
                                        onchange="filterVaccine(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value="" disabled>Select Source Group</option>
                                    <option value="All"> All</option>
                                    <option value="National Government"> National Government</option>
                                    <option value="Department Of Health"> Department of Health</option>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortReports" name="sortReports"
                                        onchange="sortVaccine(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option value="" disabled>Select Sort By</option>
                                    <option value="None"> None</option>
                                    <option value="dateAsc">Date Received ↑</option>
                                    <option value="dateDesc">Date Received ↓</option>
                                    <option value="expirationAsc">Expiration Date ↑</option>
                                    <option value="expirationDesc">Expiration Date ↓</option>
                                    <option value="bottleQAsc">Bottle Quantity ↑</option>
                                    <option value="bottleQDesc">Bottle Quantity ↓</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Table Content-->
            <div class="tableVaccine tableScroll2 shadow">
                <table class="table table-hover table-fixed" id="vaccineTable">
                    <thead class='tableCenterCont'>
                    <tr>
                        <th>Vaccine Lot ID</th>
                        <th>Vaccine Name</th>
                        <th>Vaccine Source</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Bottle Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                    require_once '../require/getVaccine.php';
                    require_once '../require/getVaccineBatch.php';
                    require_once '../require/getVaccineLot.php';

                    $count = 0;
                    foreach ($vaccineLots as $vl) {
                        if ($vl->getArchived() == 0) {
                            $count++;
                            $vaccineLotId = $vl->getVaccLotId();
                            $vaccLotVaccId = $vl->getVaccLotVaccId();
                            $dateStored = $vl->getDateVaccStored();
                            $batchQty = $vl->getVaccBatchQty();
                            $source = $vl->getSource();
                            $vaccExp = $vl->getExpiration();


                            foreach ($vaccines as $vac) {
                                if ($vaccLotVaccId == $vac->getVaccId()) {
                                    $vaccName = $vac->getVaccName();
                                }
                            }

                            echo "<tr class='table-row tableCenterCont' onclick='showVaccine(this)'>
                            <td>$vaccineLotId</td>
                            <td>$vaccName</td>
                            <td>$source</td>
                            <td>$dateStored</td>
                            <td>$vaccExp</td>
                            <td>$batchQty</td>
                            <td>
                                <div class='d-flex justify-content-center'>
                                      <button type='button' class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $vaccineLotId)'><i class='fa fa-archive'></i></button>
                                      <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewVaccineDetails($vaccineLotId)'><i class='fas fa-eye'></i></button>
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

    <!-----MODALS----->
    <!---View Modal--->
    <div id="viewVaccineDetails" class="modal-window">

    </div>

    <!--Add Vaccine Lot Modal-->
    <div id="vaccineModal" class="modal-window">
        <div class="content-modal">
            <form id='addVaccineLotForm' method="post" enctype="multipart/form-data" class="form">
                <div class="modal-header">
                    <h2 id="headerAddVaccine"> Add Vaccine </h2>
                    <span onclick="closeModal('vaccineModal')" class="close"><i class='fas fa-window-close'></i></span>
                </div>
                <div class="modal-body">
                    <div id="addVaccineModal">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="selectedVaccine" class="required"> Select a Vaccine Brand: </label>

                                <select class="form-select vaccineType" id="selectedVaccine" name="selectedVaccine"
                                        onchange="updateVaccineInfo(this)" required>
                                    <option value=""> Select Vaccine</option>
                                    <?php
                                    $getVaccinesQuery = "SELECT vaccine_name FROM vaccine";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($getVaccinesQuery);
                                    $stmt->execute();
                                    $stmt->bind_result($vaccine);
                                    while ($stmt->fetch()) {
                                        echo "<option>$vaccine</option>";
                                    }
                                    ?>
                                </select>
                                <label class="label1 required" for="qty"> Total Vial Quantity Received: </label>
                                <input type="text" id="qty" class="form-control" name="quantity" required>
                                <br>
                                <label class="label1 required" for="source"> Vaccine Source: </label>
                                <select class="vaxSource required form-select" id="source" name="quantity" required>
                                    <option value="">Select Vaccine Source</option>
                                    <option value="National Government">National Government</option>
                                    <option value="Department Of Health">Department Of Health</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="dateStored" class="required">Date Stored</label><br>
                                <input type='date' id="dateStored" name="dateStored" class="form-control" required><br>
                                <label class="label1 required" for="dateExp">Date of Expiration</label><br>
                                <input type='date' id="dateExp" name="dateExp" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="closeModal('vaccineModal')" class="btn btn-danger">Cancel</button>
                    <button id="addVaccineLotBtn" class="btn btn-success" type='submit'
                            onclick="event.preventDefault(); confMessage('Vaccine Lot', addVaccine)"> Add
                    </button>

                </div>
            </form>
        </div>
    </div>

    <!-- Add New Vaccine Brand Modal-->
    <div id="newVaccineModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h2 id="headerAddNewVaccine">Add New Vaccine</h2>
                <span onclick="closeModal('newVaccineModal')" class="close"><i
                            class='fas fa-window-close'></i></span>
            </div>
            <div class="modal-body">
                <form id='newVaccineBrandForm' method="post" enctype="multipart/form-data" class="form">
                    <div id="addNewVaccineModal">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Vaccine Details</h5>
                                <label for="vaccineName" class="required"> Vaccine Name </label>
                                <input type="text3" class="form-control" id="vaccineName" placeholder="Ex. Sinovac" required>

                                <label class="label1 required" for="vaccineManufacturer"> Vaccine Manufacturer </label>
                                <input type="text3" class="form-control" id="vaccineManufacturer"
                                       placeholder="Enter Manufacturer" required>

                                <label class="label1 required" for="vaccineDescription"> Vaccine Description </label>
                                <input type="text3" class="form-control" id="vaccineDescription"
                                       placeholder="Enter Description" required>

                                <h5 class="addNewVaccineH3 label1">Vaccine Characteristics</h5>
                                <label for="vaccineType" class="required"> Vaccine Type: </label>
                                <select id="vaccineType" class="form-select" required>
                                    <option value="">Select Vaccine Type</option>
                                    <option value="Inactivated Virus">Inactivated Vaccine</option>
                                    <option value="Viral vector">Viral vector Vaccine</option>
                                </select>
                                <label class="label1 required" for="vaccineEfficacy"> Vaccine Efficacy: </label>
                                <select id="vaccineEfficacy" class="form-select" required>
                                    <option value="">Select Vaccine Efficacy</option>
                                    <option value="90">90%</option>
                                    <option value="70">70%</option>
                                    <option value="50">50%</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="label1 required" for="dosageRequired" id="labelDosage"> Dosage
                                    Required </label>
                                <input type="text3" class="form-control" id="dosageRequired"
                                       placeholder="Enter Dosage Required" required>
                                <label class="label1 required" for="dosageInterval"> Dosage Interval (Days) </label>
                                <input type="text3" class="form-control" id="dosageInterval"
                                       placeholder="Enter Dosage Interval" required>

                                <h5 class="label1"> Storage and Handling</h5>
                                <label for="minimumTemperature" class="required"> Minimum Temperature (Degree
                                    Celcius) </label>
                                <input type="text3" class="form-control" id="minimumTemperature"
                                       placeholder="Minimum Temperature" required>
                                <label class="label1 required" for="maximumTemperature"> Maximum Temperature (Degree
                                    Celcius) </label>
                                <input type="text3" class="form-control" id="maximumTemperature"
                                       placeholder="Maximum Temperature" required>
                                <label class="label1 required" for="lifeSpan"> Life Span (Months) </label>
                                <input type="text3" class="form-control" id="lifeSpan" placeholder="Life Span" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('newVaccineModal')" class="btn btn-danger"> Cancel</button>
                <button type='submit' id='addBtnNewVaccine' class="btn btn-success" name='addBtnNewVaccine'
                        onclick="event.preventDefault(); confMessage('Vaccine Brand', addNewVaccine)"> Add
                </button>
            </div>
        </div>
    </div>

    <!--Archived Modal-->
    <div id="archived" class="modal-window">
        <div class="content-modal-table">
            <div class="modal-header">
                <h4 class="modal-title">Archived Vaccination Drives</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                    <i class='fas fa-window-close'></i>
                </button>
            </div>
            <div id='archivedContent' class="modal-body">

                <table class="table table-row table-hover tableModal" id="vaccineTable">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
                        <th scope="col">Vaccine Lot ID</th>
                        <th scope="col">Vaccine Name</th>
                        <th scope="col">Vaccine Source</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">Expiration</th>
                        <th scope="col">Bottle Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <div id="vaccineContent">
                        <?php
                        require_once '../require/getVaccine.php';
                        require_once '../require/getVaccineBatch.php';
                        require_once '../require/getVaccineLot.php';

                        foreach ($vaccineLots as $vl) {
                            if ($vl->getArchived() == 1) {
                                $vaccineLotId = $vl->getVaccLotId();
                                $vaccLotVaccId = $vl->getVaccLotVaccId();
                                $dateStored = $vl->getDateVaccStored();
                                $batchQty = $vl->getVaccBatchQty();
                                $source = $vl->getSource();
                                $vaccExp = $vl->getExpiration();


                                foreach ($vaccines as $vac) {
                                    if ($vaccLotVaccId == $vac->getVaccId()) {
                                        $vaccName = $vac->getVaccName();
                                    }
                                }

                                echo "<tr class='tableCenterCont'>
                <td>$vaccineLotId</td>
                <td>$vaccName</td>
                <td>$source</td>
                <td>$dateStored</td>
                <td>$vaccExp</td>
                <td>$batchQty</td>
                <td>
                    <div style='text-align: center;'>
                        <button class='btn btn-warning' onclick='archive(0, clickArchive, $vaccineLotId )'><i class='fas fa-box-open'></i> unarchive</button>
                    </div>
                </td>
                </tr>";
                            }
                        }
                        ?>
                    </div>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

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

<script>

    //clear search text field
    $('#searchVacc').on('input', function (e) {
        if ('' == this.value) {
            $.ajax({
                url: '../includes/searchProcessor.php',
                type: 'POST',
                data: {"searchVaccine": ""},
                success: function (result) {
                    document.getElementById("vaccineTable").innerHTML = result;
                }
            });
        }
    });

    //search vaccine
    function searchVaccine() {
        var textSearch = document.getElementById("searchVacc").value;
        $.ajax({
            url: '../includes/searchProcessor.php',
            type: 'POST',
            data: {"searchVaccine": textSearch},
            success: function (result) {
                document.getElementById("vaccineTable").innerHTML = result;
            }
        });
    }

    //filter vaccine source
    function filterVaccine(filterVac) {
        var selectedFilter = filterVac.value;
        $.ajax({
            url: '../includes/filterProcessor.php',
            type: 'POST',
            data: {"filterVaccine": selectedFilter},
            success: function (result) {
                document.getElementById("vaccineTable").innerHTML = result;
            }
        })
    }

    //sort vaccine
    function sortVaccine(sort) {
        var selectedSort = sort.value;
        $.ajax({
            url: '../includes/sortingProcessor.php',
            type: 'POST',
            data: {"sortVaccine": selectedSort},
            success: function (result) {
                document.getElementById("vaccineTable").innerHTML = result;
            }
        })
    }

    //close modal
    window.onclick = function (event) {
        if (event.target == document.getElementById("archived") || event.target == document.getElementById("vaccineModal") || event.target == document.getElementById("newVaccineModal")) {
            document.getElementById("archived").style.display = "none";
            document.getElementById("vaccineModal").style.display = "none";
            document.getElementById("newVaccineModal").style.display = "none";
        }
    }

    //update vaccine info
    function updateVaccineInfo(vaccine) {
        $.ajax({
            url: '../includes/searchProcessor.php',
            type: 'POST',
            data: {"searchVaccine": textSearch},
            success: function (result) {
                document.getElementById("vaccineTable").innerHTML = result;
            }
        });
    }

    //update batch list
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

    //add vaccine lot
    function addVaccine() {
        var vaccId = document.getElementById("selectedVaccine").value;
        var qty = document.getElementById('qty').value;
        var dateStored = document.getElementById('dateStored').value;
        var dateExp = document.getElementById('dateExp').value;
        var source = document.getElementById('source').value;
        $.ajax({
            url: 'ManageVaccineProcessor.php',
            type: 'POST',
            data: {vaccId: vaccId, qty: qty, stored: dateStored, exp: dateExp, source: source},
            success: function (result) {
                document.getElementById('vaccineTable').innerHTML = result;
                closeModal('vaccineModal');
            }
        });
    }

    //confMessage
    function confMessage(vax, action) {
        Swal.fire({
            icon: 'info',
            title: 'Are You Sure you Want to add this ' + vax + '?',
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

    //add new vaccine brand
    function addNewVaccine() {
        var vaccName = document.getElementById("vaccineName").value;
        var manu = document.getElementById('vaccineManufacturer').value;
        var desc = document.getElementById('vaccineDescription').value;
        var type = document.getElementById('vaccineType').value;
        var efficacy = document.getElementById('vaccineEfficacy').value;
        var dosage = document.getElementById('dosageRequired').value;
        var interval = document.getElementById('dosageInterval').value;
        var minTemp = document.getElementById('minimumTemperature').value;
        var maxTemp = document.getElementById('maximumTemperature').value;
        var lifeSpan = document.getElementById('lifeSpan').value;

        // console.log(vaccName);
        // console.log(manu);
        // console.log(desc);
        // console.log(type);
        // console.log(efficacy);
        // console.log(dosage);
        // console.log(interval);
        // console.log(minTemp);
        // console.log(maxTemp);
        // console.log(lifeSpan);
        $.ajax({
            url: 'ManageVaccineProcessor.php',
            type: 'POST',
            data: {
                vaccineName: vaccName,
                vaccineDescription: desc,
                vaccineManufacturer: manu,
                vaccineType: type,
                vaccineEfficacy: efficacy,
                dosage: dosage,
                interval: interval,
                minTemp: minTemp,
                maxTemp: maxTemp,
                lifeSpan: lifeSpan
            },
            success: function (result) {

                document.getElementById('selectedVaccine').innerHTML = result;
                closeModal('newVaccineModal');
            }
        });

    }

    //archive
    async function archive(archive, action, drive) {
        if (archive == 1) {
            archiveText = "Archive";
        } else {
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

    //click archive
    function clickArchive(drive, option) {
        $.ajax({
            url: 'ManageVaccineProcessor.php',
            method: 'POST',
            data: {archive: drive, option: option},
            success: function (result) {
                if (option == "Archive") {
                    document.getElementById('vaccineTable').innerHTML = result;
                    $.ajax({
                        url: 'ManageVaccineProcessor.php',
                        method: 'POST',
                        data: {showUpdatedArchive: ""},
                        success: function (result) {
                            document.getElementById('archivedContent').innerHTML = result;
                        }
                    })

                } else if (option == "UnArchive") {
                    document.getElementById("archivedContent").innerHTML = result;
                    $.ajax({
                        url: 'ManageVaccineProcessor.php',
                        method: 'POST',
                        data: {showUpdatedVaccine: ""},
                        success: function (result) {
                            document.getElementById('vaccineTable').innerHTML = result;
                        }
                    })
                }
            }
        })
    }

    //close modal
    function closeModal(modal) {
        document.getElementById(modal).style.display = "none";
        document.body.classList.remove("scrollBody");
    }

    //open modal
    function openModal(modal) {
        document.getElementById(modal).style.display = "block";
        document.body.classList.add("scrollBody");
    }

    //view vaccine details
    var viewVaccineModal = document.getElementById("viewVaccineDetails");

    function viewVaccineDetails(vaccineId) {
        $.ajax({
            url: '../includes/viewProcessor.php',
            type: 'POST',
            data: {"viewVaccine": vaccineId},
            success: function (result) {
                document.getElementById("viewVaccineDetails").innerHTML = result;
                viewVaccineModal.style.display = "block";
            }
        })
    }

    //edit vaccine details
    var editVaccineModal = document.getElementById("viewVaccineDetails");

    function editVaccineDetails(vaccineId) {
        $.ajax({
            url: '../includes/editProcessor.php',
            type: 'POST',
            data: {"editVaccine": vaccineId},
            success: function (result) {
                document.getElementById("viewVaccineDetails").innerHTML = result;
                editVaccineModal.style.display = "block";
            }
        })
    }

    //show vaccine - row
    function showVaccine(val) {
        var id = val.getElementsByTagName("td")[0].innerText;
        $.ajax({
            url: '../includes/viewProcessor.php',
            method: 'POST',
            data: {"viewVaccine": id},
            success: function (result) {
                document.getElementById("viewVaccineDetails").innerHTML = result;
                viewVaccineModal.style.display = "block";
            }
        })
    }


   // input validation -
    addVaccineLotForm = document.getElementById("addVaccineLotForm");
    $('#addVaccineLotBtn').click(async function (e) {
        if (addVaccineLotForm.checkValidity() != "") {
            addVaccine();
        } else {
            Swal.fire({icon: 'warning', title: 'Please fill the required fields', confirmButtonText: 'OK', confirmButtonColor: '#007bff'})
        }
    });

    addNewVaccineBrandForm = document.getElementById("newVaccineBrandForm");
    $('#addBtnNewVaccine').click(async function (e) {
        if (addNewVaccineBrandForm.checkValidity() != "") {
            addNewVaccine();
        } else {
            Swal.fire({icon: 'warning', title: 'Please fill the required fields', confirmButtonText: 'OK', confirmButtonColor: '#007bff'})
        }
    });
</script>

<!--Logout script-->
<script src="../javascript/logout.js"></script>
</body>