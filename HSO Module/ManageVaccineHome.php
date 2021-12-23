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

    <script src="../javascript/openModal.js"></script>
    <script src="../javascript/closeModal.js"></script>

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
                    <a href="ManageInfographics.php"><i class="fas fa-file-alt"></i> Infographics</a>
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

    <!---View Modal--->
    <div id="editVaccineDetails" class="modal-window">

    </div>

    <!--Add Vaccine Lot Modal-->
    <div id="vaccineModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h2 id="headerAddVaccine"> Add Vaccine </h2>
                <span onclick="closeModal('vaccineModal')" class="close"><i
                            class='fas fa-window-close'></i></span>
            </div>
            <div class="modal-body">
                <form id="addVaccineLotForm" name="addVaccineLotForm" action="" method="post"
                      enctype="multipart/form-data" class="form">
                    <div>
                        <div class="row mx-3">
                            <div class="col-sm-6">
                                <label class="required" for="selectedVaccine"> Select a Vaccine Brand </label>
                                <select class="form-select vaccineType" id="selectedVaccine" name="selectedVaccine"
                                        onchange="updateVaccineInfo(this)">
                                    <option disabled selected> Select Vaccine</option>
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
                                <label class="label1 required" for="qty"> Total Vial Quantity Received </label>
                                <input type="text" id="qty" class="form-control" name="qty">

                                <label class="label1 required" for="source"> Vaccine Source: </label>
                                <select class="vaxSource required form-select" id="source" name="source" >
                                    <option disabled selected>Select Vaccine Source</option>
                                    <option value="National Government">National Government</option>
                                    <option value="Department Of Health">World Health Organization</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="dateStored" class="required">Date Stored</label><br>
                                <input type='date' id="dateStored" name="dateStored" class="form-control">
                                <label class="label1 required" for="dateExp">Date of Expiration</label>
                                <input type='date' id="dateExp" name="dateExp" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" onclick="closeModalForms('vaccineModal','addVaccineLotForm')" class="btn btn-danger shadow-sm"
                                value="Cancel">
                        </input>
                        <input  type="submit" class="btn btn-success" value="Add" onclick="event.preventDefault(); confMessage('vaccine lot', addVaccine, validationVaccineLot)">
                        </input>
                    </div>
                </form>
            </div>
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
                <form id='newVaccineBrandForm' name="newVaccineBrandForm" method="post" enctype="multipart/form-data" class="form">
                    <div>
                        <h5 class="ml-3">Vaccine Details</h5>
                        <div class="row mx-3">
                            <div class="col-sm-6">
                                <label for="vaccineName" class="required"> Vaccine Name </label>
                                <input type="text3" class="form-control" id="vaccineName" name="vaccineName" placeholder="Ex. Sinovac">

                                <label class="label1 required" for="vaccineManufacturer"> Vaccine Manufacturer </label>
                                <input type="text3" class="form-control" id="vaccineManufacturer" name="vaccineManufacturer"
                                       placeholder="Enter Manufacturer">

                                <label class="label1 required" for="vaccineDescription"> Vaccine Description </label>
                                <input type="text3" class="form-control" id="vaccineDescription" name="vaccineDescription"
                                       placeholder="Enter Description">

                                <h5 class="addNewVaccineH3 label1">Vaccine Characteristics</h5>
                                <label for="vaccineType" class="required"> Vaccine Type: </label>
                                <select id="vaccineType" class="form-select" name="vaccineType">
                                    <option disabled selected>Select Vaccine Type</option>
                                    <option value="Inactivated Virus">Inactivated Vaccine</option>
                                    <option value="Viral vector">Viral vector Vaccine</option>
                                </select>
                                <label class="label1 required" for="vaccineEfficacy"> Vaccine Efficacy: </label>
                                <select id="vaccineEfficacy" class="form-select" name="vaccineEfficacy">
                                    <option disabled selected>Select Vaccine Efficacy</option>
                                    <option value="90">90%</option>
                                    <option value="70">70%</option>
                                    <option value="50">50%</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="required" for="dosageRequired"> Dosage Required </label>
                                <input type="text3" class="form-control" id="dosageRequired" name="dosageRequired"
                                       placeholder="Enter Dosage Required">
                                <label class="label1 required" for="dosageInterval"> Dosage Interval (Days) </label>
                                <input type="text3" class="form-control" id="dosageInterval" name="dosageInterval"
                                       placeholder="Enter Dosage Interval">

                                <h5 class="label1"> Storage and Handling</h5>
                                <label class="required" for="minimumTemperature"> Minimum Temperature (Degree Celcius) </label>
                                <input type="text3" class="form-control" id="minimumTemperature"  name="minimumTemperature" placeholder="Minimum Temperature">
                                <label class="label1 required" for="maximumTemperature"> Maximum Temperature (Degree Celcius) </label>
                                <input type="text3" class="form-control" id="maximumTemperature" name="maximumTemperature" placeholder="Maximum Temperature">
                                <label class="label1 required" for="lifeSpan"> Life Span (Months) </label>
                                <input type="text3" class="form-control" id="lifeSpan" name="lifeSpan" placeholder="Life Span">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" onclick="closeModalForms('newVaccineModal','newVaccineBrandForm')" class="btn btn-danger shadow-sm"
                               value="Cancel">
                        </input>
                        <input  type="submit" class="btn btn-success" value="Add" onclick="event.preventDefault(); confMessage('vaccine brand', addNewVaccine, validationNewVaccineBrand)">
                        </input>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Archived Modal-->
    <div id="archived" class="modal-window">
        <div class="content-modal-table">
            <div class="modal-header">
                <h4 class="modal-title">Archived Vaccine Lots</h4>
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

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="../javascript/inputValidations.js"></script>

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
    })

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
                document.getElementById('addVaccineLotForm').reset();
            }
        });
    }

    //confMessage
    function confMessage(vax, action, validationMethod) {
        var formValidation = validationMethod();
        if (formValidation) {
            Swal.fire({
                icon: 'info',
                title: 'Add this ' + vax + '?',
                text: 'This ' + vax + ' will be added to the list.',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
                confirmButtonColor: '#28a745',
                denyButtonColor: '#dc3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    action();
                    Swal.fire({
                        icon: 'success',
                        text: 'Saved!',
                        focusConfirmButton: false,
                        showDenyButton: false,
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#808080',
                    })
                } else if(result.isDenied) {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Changes you made will not be saved.',
                        showDenyButton: false,
                        focusConfirmButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#808080',
                    })
                }
            })
        }
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
                document.getElementById('newVaccineModal').reset();
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
            icon: 'question',
            title: 'Archive Item',
            text: 'Are you sure you want to ' + archiveText + ' this item?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            confirmButtonColor: '#28a745',
            denyButtonColor: '#dc3545',
        }).then((result) => {
            if (result.isConfirmed) {
                action(drive, archiveText);
                Swal.fire({
                    icon: 'success',
                    text: 'Saved!',
                    showDenyButton: false,
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#28a745',
                })
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Changes you made will not be saved.',
                    showDenyButton: false,
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#28a745',
                })
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
                document.body.classList.add("scrollBody");
            }
        })
    }

    //edit vaccine details
    var editVaccineModal = document.getElementById("editVaccineDetails");
    var viewVaccineModal = document.getElementById("viewVaccineDetails");

    function editVaccineDetails(vaccineId) {
        $.ajax({
            url: '../includes/editProcessor.php',
            type: 'POST',
            data: {"editVaccine": vaccineId},
            success: function (result) {
                document.getElementById("editVaccineDetails").innerHTML = result;
                editVaccineModal.style.display = "block";
                viewVaccineModal.style.display = "none";

            }
        })
    }

    function validateDate(date1, date2, type){
        date1 = new Date(date1).getTime();
        date2 = new Date(date1).getTime();
        if (type == "stored"){
            if(date1 >= date2){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Stored Date can not be Later than the Expiration Date!'
                })
            }
        }else{
            if(date1 <= date2){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Expiration Date can not be Sooner than the Stored Date!'
                })
            }
        }
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
                document.body.classList.add("scrollBody");
            }
        })
    }
</script>

<!--Logout script-->
<script src="../javascript/logout.js"></script>
</body>