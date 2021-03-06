<?php
require_once('../includes/sessionHandling.php');
checkRole('HSO');
include_once("../includes/database.php") ?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>HSO | Manage Deployment</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                    <a href="ManageInfographics.php"><i class="fas fa-file-alt"></i> Infographics</a>
            </li>

        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info" onclick='logout()'>
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <!-- Top Nav Bar  -->
        <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
            <div class="container-fluid">
                <div>
                    <button type="button" class="buttonTop3 float-left" onclick="openModal('DeployModal');
                            shiftTab('FirstDose', 'SecondDose', 'FirstDosePage', 'SecondDosePage')">
                        <i class="fas fa-plus"></i>
                        Add Deployment
                    </button>

                    <button id="HealthDBtn" type="button" class="buttonTop3 float-left" onclick="openModal('HealthD')">
                        <i class="fas fa-file-medical"></i>
                        Health Districts
                    </button>

                    <button type="button" class=" buttonTop3" onclick="openModal('vaccSiteModal')">
                        <i class="fas fa-hospital"></i>
                        Vaccination Sites
                    </button>
                </div>

                <button type="button" class="btn btn-warning buttonTop3" onclick="openModal('archived')">
                    <i class="fas fa-inbox fa-lg"></i> Archive
                </button>
            </div>
        </div>

        <!--Table Content-->
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id='searchDeploymentInput' type="search" class="form-control" placeholder="Search"
                                   name="searchDeployment" onkeyup="searchDeployment()"/>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterSites" name="filterSite"
                                        onchange="filterVaccinationSites(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value="" disabled>Select Location</option>
                                    <option value="All">All</option>
                                    <?php
                                    require_once("../require/getVaccinationSites.php");
                                    foreach ($vaccinationSites as $vaccinationSite) {
                                        $id = $vaccinationSite->getVaccinationSiteId();
                                        $location = $vaccinationSite->getVaccinationSiteLocation();
                                        echo "<option value=$id> $location </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortReports" name="sortReports"
                                        onchange="sortDeploymentDate(this)">
                                    <option value="" disabled>Select Date Sort</option>
                                    <option value="None"> None</option>
                                    <option value="Asc">Date ???</option>
                                    <option value="Desc">Date ???</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 d-none d-md-block"></div>

                    <div id="mainDrive" class="tableDep tableScroll1 col">
                        <table class="table table-hover tableDep table-fixed" id="driveTable">
                            <thead>
                            <tr class='tableCenterCont'>
                                <th scope="col">Drive Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <?php
                            $query = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 0 ORDER BY vaccination_drive.drive_id";
                            $dbase = $database->stmt_init();
                            $dbase->prepare($query);
                            $dbase->execute();
                            $dbase->bind_result($driveId, $date, $vaccinationSite);
                            while ($dbase->fetch()) {

                                echo "<tr class='table-row tableCenterCont' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                 <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDeployment(\"$driveId\", \"$vaccinationSite\", \"$date\")' style='float: right'><i class='far fa-edit'></i></button><br>
                            </div>
                        </td>

                      </tr>";

                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-sm-auto">
                        <div class="depSummary" id="deploymentSummaryContainer">
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
        </div>
    </div>

    <!--MODALS-->
    <!--Deployment Form Modal-->
    <form id='newDeploymentForm' method="post" enctype="multipart/form-data">
        <div id="DeployModal" class="modal-window">
            <div class="content-modal depMod">
                <div class="modal-header">
                    <h4 class="modal-title">Add Deployment</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('DeployModal')">
                        <i class='fas fa-window-close'></i>
                    </button>
                </div>
                <div class="modal-body ">
                    <div role="tabpanel" class="tab-pane active" id="GeneralPage"">
                    <h3 style="padding-bottom: 1%">General</h3>
                    <div class="row" style="padding-bottom: 1%">
                        <div class="col">
                            <div class="form-group">
                                <label for="site"><h6>Select Vaccination Site: </h6></label>
                                <select name="site" id="site">
                                    <option value="" disabled selected> Select Vaccination Site</option>
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
                        </div>
                        <div class="col">

                            <div class="form-group ">
                                <label for="date"><h6>Date: </h6></label><br>
                                <input type="date" id="date" name="date" class="dateForm">
                            </div>
                        </div>
                    </div>
                    <label for="district"><h6>Select Health District/s: </h6></label>
                    <div id="district" style="padding: 2%; margin-bottom: 2%" name="district"  class="AddHealthD-option tableScroll3 border border-dark rounded">
                        <div id="districList">
                            <div class="row">
                                <ul style="columns: 3">
                                    <?php
                                    require_once "../require/getHealthDistrict.php";

                                    foreach ($health_district as $hd) {
                                        $hdId = $hd->getHealthDistrictId();
                                        $hdName = $hd->getHealthDistrictName();
                                        echo " <li>
                                                            <input id='districts' name='districts' class = 'checkboxes' type='checkbox' onclick='selected(\"healthDistricts\", $hdId)'>
                                                            <label for='districts'>$hdName</label><br>
                                                          </li> ";
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light navbarDep mb-4">
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <div class ="row ">
                                <div class="col-sm-auto">
                                    <li role="presentation" class="doseOption2 nav-item active">
                                        <a class="nav-link" id="FirstDose" role="tab" data-toggle="tab"
                                           href="#FirstDose"
                                           onclick="shiftTab('FirstDose', 'SecondDose', 'FirstDosePage', 'SecondDosePage')">First Dose</a>
                                    </li>
                                </div>
                                <div class="col-sm-auto">
                                    <li role="presentation" class="doseOption3 nav-item">
                                        <a class="nav-link" role="tab" id="SecondDose" data-toggle="tab"
                                           href="#SecondDose"
                                           onclick="shiftTab('SecondDose', 'FirstDose', 'SecondDosePage', 'FirstDosePage')">Second Dose</a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </nav>

                <!-- Tab panes -->
                <div class="tab-content border border-dark rounded p-4">
                    <div role="tabpanel" class="tab-pane" id="FirstDosePage">
                        <h3>First Dose</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <h6 class="ml-3">Select Vaccine Brand/s: </h6>
                                        <div class="col ml-4">
                                            <input id="noStubsFirst" class = 'checkboxes mr-auto' type='checkbox' onclick="disableCheck(this, 'firstDoseStubs', 'first')">
                                            <label>No Stubs</label>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>

                                    <div class="border border-dark tableScroll3 rounded" id = "firstDoseStubs"
                                         style="columns:2; padding: 2%; list-style-type: none; height: auto!important">
                                        <?php
                                        require '../require/getVaccine.php';
                                        foreach ($vaccines as $vac) {
                                            $vacName = $vac->getVaccName();
                                            $vacId = $vac->getVaccId();
                                            echo "<li>
                                                                   <input class = 'checkboxes' type='checkbox' onclick='showStubs(this, $vacId)' value='$vacId'>
                                                                   <label>$vacName</label>
                                                                   
                                                               </li> ";
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <h6 style="float: left">Select Priority Group/s: </h6>
                                    <div class="border border-dark tableScroll3 rounded"
                                         style="columns:2; padding: 2%; list-style-type: none; height: auto!important">
                                        <li>
                                            <?php
                                            require '../require/getPriorityGroup.php';
                                            foreach ($priorityGroups as $group) {
                                                $priorityGroup = $group->getPriorityGroup();
                                                $priorityGroupId = $group->getPriorityGroupId();
                                                echo " <li>
                                                                            <input class = 'checkboxes' type='checkbox' onclick='selected(\"priorityGroups\", $priorityGroupId)'>
                                                                            <label>$priorityGroup</label><br>
                                                                           </li> ";
                                            }
                                            ?>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button id='sendStubs' type='button' class='btn btn-primary' onclick="shiftTab('SecondDose', 'FirstDose', 'SecondDosePage', 'FirstDosePage')">
                                Next </button>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="SecondDosePage" >
                        <input id="noStubsFirst" class = 'checkboxes p-4' type='checkbox' onclick="disableCheck(this, 'secondDoseTable', 'second')">
                        <label>No Stubs</label>
                        <h3>Second Dose</h3>
                        <div class="AddHealthD-option">
                            <table id="secondDoseTable">
                                <tr>
                                    <td style="width: 35%">
                                        <label for="VaccineBr"><h6>Select First Dose Vaccine Brand:</h6></label>
                                        <select style="width: 72%" name="vaccineBrand" id="VaccineBr">
                                            <option value="" disabled selected> Select First Dose Brand</option>
                                            <?php
                                            require '../require/getVaccine.php';
                                            foreach ($vaccines as $vac) {
                                                $vacName = $vac->getVaccName();
                                                $vacId = $vac->getVaccId();

                                                echo "<option value = $vacId>$vacName</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td>
                                        <label><h6>Select First Dose Date: </h6></label>
                                        <div class="form-inline">
                                            <input type="date" id="secondDoseDate" name="secondDoseDate" class="dateForm form-control">
                                        </div>
                                    </td>

                                    <td >
                                        <label><h6>Number of Stubs: </h6></label>
                                        <div class="form-inline">
                                            <input type="input" placeholder="Number of Stubs" class="dateForm form-control">
                                            <button class="buttonTransparent delButt" onclick="event.preventDefault(); removeRow(this)"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                            <button class="hyperlink add_another" style="font-size: 15px; background-color: transparent; border-color: transparent" onclick="event.preventDefault();insertNewRow(this)">+Add New Classification</button>
                        </div>

                        <div class="modal-footer">
                            <button id='sendStubs' type='button' class='btn btn-secondary mr-auto'
                                    onclick="shiftTab('FirstDose',  'SecondDose', 'FirstDosePage',  'SecondDosePage')">
                                Back
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" onclick="closeModalForms('DeployModal','newDeploymentForm')" value="Cancel">
                    <input type="submit" class="btn btn-success" onclick="event.preventDefault(); add('Deployment', addDep, validationDeployment)" value="Add">


                </div>
            </div>

        </div>

</div>
</form>

<!--Health District Modal-->
<div id="HealthD" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 class="modal-title">Health Districts</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthD')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>

        <div>
            <div class="d-flex float-right m-2">
                <button type="button" class="btn btn-warning buttonTop3 " onclick="openModal('archivedDistricts')">
                    <i class="fas fa-inbox fa-lg"></i> Archive
                </button>
            </div>
            <div id="distContent" class="tableScroll5 mb-2 ">
                <table class="table table-hover border">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
                        <th scope="col">Health District Id</th>
                        <th scope="col">District Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <?php
                    require_once '../require/getHealthDistrict.php';

                    foreach ($health_district as $hd) {
                        $districtId = $hd->getHealthDistrictId();
                        $districtName = $hd->getHealthDistrictName();
                        $number = $hd->getContact();
                        $archived = $hd->getArchived();

                        if ($archived == 0) {

                            echo "<tr class='table-row tableCenterCont' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div class='d-flex justify-content-center'>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1,archiveDistrict, $districtId)'><i class='fa fa-archive'></i></button>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDistrict(\"$districtId\", \"$districtName\", \"$number\")' style='float: right'><i class='far fa-edit'></i></button><br>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger float-right" onclick="closeModal('HealthD')">Cancel
            </button>
            <button type="button" class="btn btn-primary float-right" onclick="openModal('HealthDModal')">
                <i class="fas fa-plus"></i>
                Add Health District
            </button>
        </div>
    </div>
</div>

<!--Edit Modal-->
<div id="editModal" class="modal-window">
</div>

<div id="editDistrictModal" class="modal-window">
</div>


<!--Archive Health District Modal-->
<div id="archivedDistricts" class="modal-window">
    <div class="content-modal-table">
        <div class="modal-header">
            <h4 class="modal-title">Archived Health Districts</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archivedDistricts')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div id='archivedDistrictContent' class="modal-body">
            <table class="table table-row table-hover tableModal">
                <thead class="tableHeader">
                <tr class="tableCenterCont">
                    <th scope="col">Health District Id</th>
                    <th scope="col">District Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <?php
                require_once '../require/getHealthDistrict.php';

                foreach ($health_district as $hd) {
                    $districtId = $hd->getHealthDistrictId();
                    $districtName = $hd->getHealthDistrictName();
                    $number = $hd->getContact();
                    $archived = $hd->getArchived();

                    if ($archived == 1) {

                        echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='btn btn-warning' onclick='event.stopPropagation(); archive(0, archiveDistrict, $districtId )'>unarchive <i class='fas fa-box-open'></i></button>
                                            
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

<!--Add Health district Modal-->

<div id="HealthDModal" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 class="modal-title">Add Health District</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthDModal')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>

        <div class="modal-body" style="padding: 4%">
            <form id="healthDistrictForm" name="healthDistrictForm"  method="post" enctype="multipart/form-data" class="form">
            <div class="row mb-4">
                <div class="col-8">
                    <label>Name of Health District:</label>
                    <input class="districtWidth float-right" type="text" id="newHealthDistrict"
                           name="newHealthDistrict">
                </div>
                <div class="w-100 d-none d-md-block"></div>
                <div class="col-8">
                    <label>Health District Contact Number:</label>
                    <input class="contactWidth float-right" type="text" id="contactNumber" name="contactNumber">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="optionBrgy">Select Barangay/s: </label>
                </div>
            </div>


            <div class="AddHealthD-option border border-dark rounded">
                <div class="tableScroll2">
                    <ul>
                        <?php
                        require_once "../require/getBarangay.php";

                        foreach ($barangays as $b) {
                            $id = $b->getBarangayId();
                            $name = $b->getBarangayName();
                            echo " <li>
                                    <input name='barangay' class ='checkboxes' type='checkbox' onclick='selected(\"barangay\", $id)'>
                                    <label for='barangay'>$name</label><br>
                                </li> ";
                        }
                        ?>
                    </ul>

                </div>
        </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="closeModalForms('HealthDModal')"> Cancel
                </button>
                <button type="button" class="btn btn-success" onclick="add('Health District', addDistrict, validationHealthDistrict)">
                    Add
                </button>

            </div>
        </div>
    </div>
</div>


<!--View Health district modal-->
<div id="HealthDView" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 id="chosenDistrict" class="modal-title">Health District</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthDView')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>

        <div id="healthDContent" class="modal-body">

        </div>

    </div>
</div>

<!--Add Health district modal-->
<div id="HealthDBarangay" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 class="modal-title">Add New Barangay</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('HealthDBarangay')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>

        <div id="healthDBarangayContent" class="modal-body">
            <h3 id="hd"></h3><br><br>
            <hr>
            <h3 id="contact"></h3><br><br>
            <hr>
            <h3>Barangays: </h3><br>
            <div id="barangayList">
            </div>
        </div>

    </div>
</div>

<!--Vaccination Sites Modal-->
<div id="vaccSiteModal" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 class="modal-title">Vaccination Sites</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('vaccSiteModal')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div>
            <div id="siteContent" class="tableScroll6 border">
                <table class="table table-row table-hover">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
                        <th>Vaccination Site Id</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <?php
                    require_once '../require/getVaccinationSites.php';

                    foreach ($vaccinationSites as $vs) {
                        $siteId = $vs->getVaccinationSiteId();
                        $vaccinationSite = $vs->getVaccinationSiteLocation();

                        echo "<tr class='table-row tableCenterCont'>
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
        <div class="modal-footer">
            <button type="button" class="btn btn-danger float-right" onclick="closeModal('vaccSiteModal')">Cancel
            </button>
            <button type="button" class="btn btn-primary float-right" onclick="openModal('addVaccSite')">
                <i class="fas fa-plus"></i>
                Add Vaccination Site
            </button>
        </div>
    </div>
</div>

<!--Add Vaccination Sites Modal-->
<div id="addVaccSite" class="modal-window">
    <div class="content-modal tableModal">
        <div class="modal-header">
            <h4 class="modal-title">Add Vaccination Site</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('addVaccSite')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addVaccinationSiteForm" name="addVaccinationSiteForm"  method="post" enctype="multipart/form-data" class="form">
                <label for="vaccinationLoc">Vaccine Site Location:</label>
                <input class="VaxSiteWidth" type="text" id="vaccinationLoc" name="vaccinationLoc">

                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" onclick="closeModalForms('addVaccSite','addVaccinationSiteForm')" value="Cancel">
                    </input>
                    <input type="submit" class="btn btn-success"
                           onclick="event.preventDefault(); add('Vaccination Site', addSite, validationSite)" value="Add">
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Archive Modal-->
<div id="archived" class="modal-window">
    <div class="content-modal-table">
        <div class="modal-header">
            <h4 class="modal-title">Archived Vaccination Drives</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div id='archivedContent' class="modal-body">
            <table class="table table-row table-hover tableModal">
                <thead>
                <tr>
                    <th scope="col">Drive Id</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <?php
                $query = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 1 ORDER BY vaccination_drive.drive_id";
                $dbase = $database->stmt_init();
                $dbase->prepare($query);
                $dbase->execute();
                $dbase->bind_result($driveId, $date, $vaccinationSite);
                while($dbase->fetch()){
                    echo "<tr class='table-row tableCenterCont'>
                                   <td>$driveId</td>
                                   <td>$vaccinationSite</td>
                                   <td>$date</td>
                                   <td>
                                        <div>
                                            <button class='btn btn-warning' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
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

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="../javascript/inputValidations.js"></script>

<script>
    var list = document.getElementById("listPatientContent");
    var healthDistricts = [];
    var priorityGroups = [];
    var barangays = [];
    var id = "";
    var clicked = false;


    function insertNewRow(event){
        var table = document.getElementById('secondDoseTable');
        var row = table.insertRow();
        row.innerHTML = '<td style="width: 35%"><label for="VaccineBr"><h6>Select First Dose Vaccine Brand: </h6></label> <select style="width: 72%" name="vaccineBrand" id="VaccineBr">  <option value="" disabled selected> Select First Dose Brand</option> <?php require '../require/getVaccine.php'; foreach ($vaccines as $vac) { $vacName = $vac->getVaccName(); $vacId = $vac->getVaccId(); echo "<option value = $vacId>$vacName</option>";}?> </select></td> <td><label><h6>Select First Dose Date: </h6></label><div class="form-inline"> <input type="date" id="secondDoseDate" name="secondDoseDate" class="dateForm form-control"></div> <td><label><h6>Number of Stubs: </h6></label>  <div class="form-inline"> <input type="input" placeholder="Number of Stubs" class="dateForm form-control"> <button class="buttonTransparent delButt" onclick="event.preventDefault(); removeRow(this)"><i class="fas fa-trash"></i></button></div></td>'

    }


    window.onclick = function (event) {
        if (event.target == document.getElementById("archived") || event.target == document.getElementById("DeployModal") || event.target == document.getElementById("HealthDModal") || event.target == document.getElementById("vaccSiteModal") || event.target == document.getElementById("HealthD")) {
            document.getElementById("DeployModal").style.display = "none";
            document.getElementById("HealthDModal").style.display = "none";
            document.getElementById("vaccSiteModal").style.display = "none";
            document.getElementById("HealthD").style.display = "none";
            document.getElementById("archived").style.display = "none";

        }
    }

    function shiftTab(active, idle1, pageBlock, pageNone1) {
        document.getElementById(active).style.backgroundColor = "#1D7195";
        document.getElementById(active).style.color = "#FFFFFFFF";
        document.getElementById(active).style.borderRadius = "12px";
        document.getElementById(idle1).style.backgroundColor = "rgba(49,51,53,0)";
        document.getElementById(idle1).style.color = "#000000";
        document.getElementById(pageBlock).style.display = "block";
        document.getElementById(pageNone1).style.display = "none";
        document.getElementById(idle1).style.color = "#000000";
    }

    //clear search text field
    $('#searchDeploymentInput').on('input', function (e) {
        if ('' == this.value) {
            $.ajax({
                url: '../includes/searchProcessor.php',
                type: 'POST',
                data: {"searchDeployment": ""},
                success: function (result) {
                    document.getElementById("driveTable").innerHTML = result;
                    document.getElementById("listPatientContent").innerText = '';
                }
            });
        }
    });

    function disableCheck(checkbox, id, type) {
        if (type == 'first') {
            var li = document.getElementById(id).getElementsByTagName('li');
            if (checkbox.checked == true) {
                for (var index = 0; index < li.length; index++) {
                    li[index].children[1].children[0].disabled = true;
                    li[index].children[1].children[0].value = 0;
                }
            } else {
                for (var index = 0; index < li.length; index++) {
                    li[index].children[1].children[0].disabled = false;
                }
            }
        }else{
            var tr = document.getElementById(id).getElementsByTagName('tr');
            if (checkbox.checked == true) {
                for (var index = 0; index < tr.length; index++) {
                    tr[index].children[2].children[1].children[0].disabled = true;
                    tr[index].children[2].children[1].children[0].value = 0;
                }
            }else{
                for (var index = 0; index < tr.length; index++) {
                    tr[index].children[2].children[1].children[0].disabled = false;
                }
            }
        }
    }

    function showStubs(div, vacId){
        if (div.checked == true) {
            div.parentNode.children[1].innerHTML += '<input type="input" class="ml-2" placeholder="Number of Stubs">'
        } else{
            var label = div.parentNode.children[1];
            console.log(label.children[0]);
            label.children[0].outerHTML = "";

        }
    }

    function removeRow(row){
        var tr = row.parentNode.parentNode.parentNode;

        document.getElementById('secondDoseTable').deleteRow(tr.rowIndex);
    }

    //search deployment
    function searchDeployment() {
        var textSearch = document.getElementById("searchDeploymentInput").value;
        $.ajax({
            url: '../includes/searchProcessor.php',
            type: 'POST',
            data: {"searchDeployment": textSearch},
            success: function (result) {
                document.getElementById("driveTable").innerHTML = result;
            }
        });
    }

    //filter vaccination sites
    function filterVaccinationSites(filter) {
        var selectedFilter = filter.value;
        $.ajax({
            url: '../includes/filterProcessor.php',
            type: 'POST',
            data: {"filterDeployment": selectedFilter},
            success: function (result) {
                document.getElementById("driveTable").innerHTML = result;
            }
        })
    }

    //sort date deployment
    function sortDeploymentDate(sort) {
        var selectedSort = sort.value;
        $.ajax({
            url: '../includes/sortingProcessor.php',
            type: 'POST',
            data: {"sortDeployment": selectedSort},
            success: function (result) {
                document.getElementById("driveTable").innerHTML = result;
            }
        })
    }


    function clickArchive(drive, option) {
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {archive: drive, option: option},
            success: function (result) {
                if (option == "Archive") {
                    document.getElementById('mainDrive').innerHTML = result;
                    $.ajax({
                        url: 'ManageDeploymentProcessor.php',
                        method: 'POST',
                        data: {showUpdatedArchive: ""},
                        success: function (result) {
                            document.getElementById('archivedContent').innerHTML = result;
                        }
                    })

                } else if (option == "UnArchive") {
                    document.getElementById("archivedContent").innerHTML = result;
                    $.ajax({
                        url: 'ManageDeploymentProcessor.php',
                        method: 'POST',
                        data: {showUpdatedDrive: ""},
                        success: function (result) {
                            document.getElementById('mainDrive').innerHTML = result;
                        }
                    })
                }
            }
        })
    }

    function archiveDistrict(id, option) {
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {distArchive: id, option: option},
            success: function (result) {
                if (option == "Archive") {
                    document.getElementById('distContent').innerHTML = result;
                    $.ajax({
                        url: 'ManageDeploymentProcessor.php',
                        method: 'POST',
                        data: {showUpdatedDistArchive: ""},
                        success: function (result) {
                            document.getElementById('archivedDistrictContent').innerHTML = result;
                        }
                    })

                } else if (option == "UnArchive") {
                    document.getElementById("archivedDistrictContent").innerHTML = result;
                    $.ajax({
                        url: 'ManageDeploymentProcessor.php',
                        method: 'POST',
                        data: {showUpdatedDist: ""},
                        success: function (result) {
                            document.getElementById('distContent').innerHTML = result;
                        }
                    })
                }
            }
        })
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
        document.body.classList.remove("scrollBody");
    }

    function openModal(modal) {

        document.getElementById(modal).style.display = "block";
        document.body.classList.add("scrollBody");
    }

    function showDrive(val) {
        var id = val.getElementsByTagName("td")[0].innerText;
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {id: id},
            success: function (result) {
                document.getElementById("listPatientContent").innerHTML = result;
            }
        })
    }

    function editDistrict(districtId, name, contact) {
        $.ajax({
            url: '../includes/editProcessor.php',
            type: 'POST',
            data: {"editedDistrict": districtId, newDistName: name, newContact: contact},
            success: function (result) {
                document.getElementById("editDistrictModal").innerHTML = result;
                document.getElementById("editDistrictModal").style.display = "block";
            }
        })
    }

    function editDeployment(deploymentId, site, date) {
        $.ajax({
            url: '../includes/editProcessor.php',
            type: 'POST',
            data: {"editDeployment": deploymentId, site: site, date: date},
            success: function (result) {
                document.getElementById("editModal").innerHTML = result;
                document.getElementById("editModal").style.display = "block";
                document.body.classList.add("scrollBody");
            }
        })
    }

    function editDist(district) {
        var newDistName = document.getElementById('editDistName').value;
        var newDistContact = document.getElementById('editDistContact').value;
        $.ajax({
            url: '../includes/editProcessor.php',
            type: 'POST',
            data: {"editedDistName": newDistName, editedDistContact: newDistContact, editedDist: district},
            success: function () {
                closeModal('editDistrictModal');
            }
        })

        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {showUpdatedDist: ""},
            success: function (result) {
                document.getElementById('distContent').innerHTML = result;
            }
        })
    }


    function editDrive(drive){
        var newDate = document.getElementById('editDate').value;
        var newSite = document.getElementById('editSite').value;
        $.ajax({
            url: '../includes/editProcessor.php',
            type: 'POST',
            data: {"editedDate": newDate, editedSite: newSite, editedDrive: drive},
            success: function (result) {
                closeModal('editModal');
            }
        })
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {showUpdatedDrive: ""},
            success: function (result) {
                document.getElementById('mainDrive').innerHTML = result;
            }
        })

    }

    function showDistrict(val) {
        id = val.getElementsByTagName("td")[0].innerText;
        var name = val.getElementsByTagName("td")[1].innerText;
        var number = val.getElementsByTagName("td")[2].innerText;

        document.getElementById('chosenDistrict').innerText = name;

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
        Swal.fire({
            icon: 'info',
            title: 'Do you want to add this Barangay?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            confirmButtonColor: '#28a745',
            denyButtonColor: '#dc3545',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'ManageDeploymentProcessor.php',
                    method: 'POST',
                    data: {
                        list: barangays,
                        hdId: id
                    },
                    success: function (result) {
                        document.getElementById("HealthDBarangay").style.display = "none";
                        document.getElementById("barangayList").innerHTML = result;
                        barangays = [];

                    }
                })
                Swal.fire({
                    icon: 'success',
                    text: 'Saved!',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff',
                })
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Changes you made will not be saved.',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff',
                })
            }
        })
    }

    function addDep() {
        var secondDoseBrands = {};

        var firstDoseVaccineBrands = {};

        var trs = document.getElementById('secondDoseTable').getElementsByTagName("tr");
        var li = document.getElementById('firstDoseStubs').getElementsByTagName("li");

        for(var idx = 0; idx < trs.length; idx++) {
            var tds = trs[idx].getElementsByTagName("td");
            secondDoseBrands[tds[0].children[1].value] = [];
            secondDoseBrands[tds[0].children[1].value].push(tds[1].children[1].children[0].value);
            secondDoseBrands[tds[0].children[1].value].push(tds[2].children[1].children[0].value)
        }

        for(var i = 0; i < li.length; i++) {
            if(li[i].children[0].checked == true){
                var vaccine = li[i].children[0].value;
                firstDoseVaccineBrands[vaccine] = [];
                firstDoseVaccineBrands[vaccine].push(li[i].children[1].children[0].value);
            }
        }

        var date = document.getElementById("date").value;
        var location = document.getElementById("site").value;

        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {
                districts: healthDistricts,
                priorities: priorityGroups,
                firstBrands: firstDoseVaccineBrands,
                secondBrands: secondDoseBrands,
                date: date,
                location: location,
            },
            success: function (result) {
                closeModal('DeployModal');
                document.getElementById('mainDrive').innerHTML = result;
                healthDistricts = [];
                priorityGroups = [];
                $.ajax({
                    url: 'ManageDeploymentProcessor.php',
                    method: 'POST',
                    data: {reset: ""},
                    success: function (result) {
                        document.getElementById("DeployModal").innerHTML = result;
                    }
                })
            }
        })

    }

    function addDistrict() {
        var healthDistrictName = document.getElementById("newHealthDistrict").value;
        var districtNumber = document.getElementById("contactNumber").value;
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {barangays: barangays, healthDistrictName: healthDistrictName, number: districtNumber},
            success: function (result) {
                closeModal('HealthDModal');
                document.getElementById("distContent").innerHTML = result;
                document.getElementById('healthDistrictForm').reset();
                barangays = [];
            }
        })
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {showUpdatedDist: ""},
            success: function (result) {
                document.getElementById('distContent').innerHTML = result;
            }
        })
    }

    function addSite() {
        var siteName = document.getElementById("vaccinationLoc").value;
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {site: siteName},
            success: function (result) {
                document.getElementById('addVaccSite').style.display = "none";
                document.getElementById('siteContent').innerHTML = result;
                document.getElementById('addVaccinationSiteForm').reset();

            }
        })
    }

    function deleteDistrict(delDistId) {
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

        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {brgyId: barangayId},
            success: function (result) {
                document.getElementById('barangayList').innerHTML = result;
            }
        })
    }

    function deleteSite(siteId) {
        $.ajax({
            url: 'ManageDeploymentProcessor.php',
            method: 'POST',
            data: {deleteSiteId: siteId},
            success: function (result) {
                document.getElementById('siteContent').innerHTML = result;
            }
        })
    }

    async function add(item, action, validationMethod) {
        var formValidation = validationMethod();
        if(formValidation){
            Swal.fire({
                icon: 'info',
                text: 'Do you want to add this ' + item + '?',
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
                        showDenyButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#077bff',
                    })
                } else if (result.isDenied) {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Changes you made will not be saved.',
                        showDenyButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#077bff',
                    })
                }
            })
        }
    }

    async function edit(action, item) {
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure you want to edit this Deployment?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            confirmButtonColor: '#28a745',
            denyButtonColor: '#dc3545',
        }).then((result) => {
            if (result.isConfirmed) {
                action(item);
                Swal.fire({
                    icon: 'success',
                    text: 'Saved!',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff',
                })
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Changes you made will not be saved.',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#077bff',
                })
            }
        })
    }

    async function del(item, action) {
        Swal.fire({
            icon: 'error',
            title: 'Are You Sure you want to Delete?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            confirmButtonColor: '#28a745',
            denyButtonColor: '#dc3545',
        }).then((result) => {
            if (result.isConfirmed) {
                action(item);
                Swal.fire({
                    icon: 'success',
                    text: 'Saved!',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff',
                })
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Changes you made will not be saved.',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff',
                })
            }
        })
    }

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
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#077bff',
                })
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Changes you made will not be saved.',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#077bff',
                })
            }
        })
    }

    function selected(array, id) {
        if (array == "barangay") {
            array = barangays;
        } else if (array == "priorityGroups") {
            array = priorityGroups;
        }else {
            array = healthDistricts;
        }

        if (array.indexOf(id) < 0) {
            array.push(id);
        } else {
            var idx = array.indexOf(id);
            array.splice(idx, 1);
        }
    }


</script>
<!--Logout script-->
<script src="../javascript/logout.js"></script>
</body>