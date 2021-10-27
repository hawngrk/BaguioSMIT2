<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>HSO | Manage Patients</title>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="../javascript/showDateAndTime.js"></script>
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
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li class="active">
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
            <button type="button" class="btn btn-info">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <div id="content">
        <!-- Page Content  -->
        <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
            <div class="container-fluid">
                <div>
                    <button id="uploadFileBtn" onclick="openModal('uploadFileModal')" type="button" class="buttonTop3"><i class="fas fa-upload"></i> Upload
                        File
                    </button>

                    <button onclick="openModal('patientInformationModal')" type="button"  class="buttonTop3 ml-50"><i class="fas fa-plus"></i> Add User
                    </button>
                </div>
                <button type="button" class="btn btn-warning buttonTop3 float-right" onclick="openModal('archived')">
                    <i class="fas fa-inbox fa-lg"></i> Archive
                </button>
            </div>
        </div>

        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchPatientHSO" type="search" name="searchPatient" class="form-control" placeholder="Search" onkeyup="searchPatient()"/>
                            <button type="submit" class="buttonTop5" name="managePatientBtn" onclick="searchPatient()">  <i class="fas fa-search"></i> </button>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterReports" name="filterReports"
                                        onchange="filterReport(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option>All</option>
                                    <option>Unverified</option>
                                    <option>Verified</option>
                                    <option>Invalidated</option>
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
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tablePatient shadow tableScroll2">
                <!--Table Part-->
                <table class="table table table-hover tablePatient" id="patientTable1">
                    <thead>
                    <tr class="labelRow tableCenterCont">
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Category</th>
                        <th>Complete Address</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <?php
                    require_once '../require/getPatientDetails.php';

                    foreach ($patient_details as $pd) {
                        if ($pd->getArchived() == 0) {
                            $id = $pd->getPatientDeetPatId();
                            $category = $pd->getPriorityGroup();
                            $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
                            $contact = $pd->getContact();

                            if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
                                $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
                            } else if ($pd->getPatientSuffix() == null) {
                                $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
                            } else if ($pd->getPatientMName() == null) {
                                $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
                            } else {
                                $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
                            }

                            echo "<tr class='table-row tableCenterCont' onclick='showPatient(this)'>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$category</td>
                        <td>$fullAddress</td>
                        <td>$contact</td>
                        <td>
                            <div class='tableCenterCont'>
                                <button class='actionButt buttonTransparent' onclick='event.stopPropagation();archive(1, clickArchive, $id)'><i class='fa fa-archive'></i></button>
                                <button type='button' class='actionButt viewReportBtn buttonTransparent' id='viewButton' onclick='viewPatient($id)'><i class='fas fa-eye'></i></button
                            </div>
                        </td>
                    </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>


        <!--MODALS-->
        <!--View Modal-->
        <div id="viewPatientDetails" class="modal-window">
            <div class='content-modal' id="patientModalContent">
            </div>


        </div>

        <!--Modal for uploading patient csv-->
        <!--To include uploading files limited to csv file only-->
        <div id="uploadFileModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h3> Upload File/s </h3>
                    <span onclick="closeModal('uploadFileModal')" class="close">
                        <i class='fas fa-window-close'></i>
                    </span>
                </div>

                <div class="modal-body">
                    <div class="row" id="upload-content">
                        <div class="col">
                            <div class="col-md-12 text-center">
                                <button class="shadow-sm" id="iconBrowse"
                                        onclick="document.getElementById('fileUpload').click()">
                                    Browse files
                                </button>
                                <br>
                                <input id="fileUpload" type="file" style="display: none"
                                       onchange="getUploadedFiles(this)" multiple/>
                                <h6><br> Upload a list of patients (.csv) </h6>
                            </div>
                        </div>

                        <div class="col">
                            <h5> Uploaded Files </h5>
                            <div id="uploadedFiles">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal('uploadFileModal')" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" id="uploadFileConfirmBtn" class="btn btn-primary"
                            name="patientUploadFile" onclick="uploadFiles()">Add
                    </button>
                </div>
            </div>
        </div>


        <!--Button for Adding Patient Details-->
        <div id="patientInformationModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add User | Patient - Information</h4>
                    <button type="button" onclick="closeModal('patientInformationModal')" class="close" data-dismiss="modal">
                        <i class='fas fa-window-close'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm" name="registrationForm" action="/action_page.php"
                          onsubmit="return validateForm()" method="post">
                        <div class="personalInfo">
                            <h5> Personal Information </h5>
                            <div class="row">
                                <div class="col">
                                    <label class="required" for="lname">Last Name</label>
                                    <input type="text3" id="lname" class='input' name="lastname"
                                           placeholder="Input Answer Here" required>
                                </div>
                                <div class="col">
                                    <label class="required" for="fname">First Name </label>
                                    <input type="text3" id="fname" class='input' name="firstname"
                                           placeholder="Input Answer Here" required>

                                </div>
                                <div class="col">
                                    <label class="required" for="mname">Middle Name </label>
                                    <input type="text3" id="mname" class='input' name="middlename"
                                           placeholder="Input Answer Here" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="label1 required" for="suffix">Suffix </label><br>
                                    <select id="suffix" name="suffix" required>
                                        <option selected value="">None</option>
                                        <option value="sr">Sr</option>
                                        <option value="jr">Jr</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="gender"> Gender </label>
                                    <select class="formControl" id="gender" name="gender" required>
                                        <option disabled selected>Select a Gender...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="date"> Birthdate </label>
                                    <input type="date" id="date" name="birthdate" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="label1 required" for="occupation">Occupation </label>
                                    <input type="text3" id="occupation" class='input' name="middlename"
                                           placeholder="Input Answer Here" required>
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="contactNum">Contact Number </label>
                                    <input type="text3" id="contactNum" class='input' name="contactNum"
                                           placeholder="09XX-XXX-XXXX" required>
                                </div>

                                <div class="col">
                                    <label class="label1 required" for="email"> Email Address </label>
                                    <input type="text3" id="email" class='input' name="email"
                                           placeholder="@email.com" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="categoryInfo">
                            <h5> Category Information </h5>
                            <div class="row">
                                <div class="col">
                                    <label class="required" for="priorityGroup">Priority Group </label>
                                    <select class="formControl" id="priorityGroup" name="priorityGroup" required>
                                        <option disabled selected>Select a Category Group...</option>
                                        <option value="A1: Health Care Workers">A1: Health Care Workers</option>
                                        <option value="A2: Senior Citizens">A2: Senior Citizens</option>
                                        <option value="A3: Adult with Comorbidity">A3: Adult with Comorbidity</option>
                                        <option value="A4: Frontliner">A4: Frontline Personnel in Essential Sector,
                                            including
                                            Uniformed
                                            Personnel
                                        </option>
                                        <option value="A5: Indigent">A5: Indigent Population</option>
                                        <option value="A6: ROP">A6: Rest of the Population</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="required" for="categoryID">Category ID</label><br>
                                    <select id="categoryID" name="categoryID" required>
                                        <option disabled selected>Select a Category ID...</option>
                                        <option value="prc">Professional Regulation Commission ID</option>
                                        <option value="senior">Office of Senior Citizen Affairs ID</option>
                                        <option value="facility"> Facility ID</option>
                                        <option value="others"> Other ID</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="required" for="categoryNo"> Category ID No.</label>
                                    <input type="text3" id="categoryNo" class='input' name="categoryNo"
                                           placeholder="Input Answer Here" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="label1" for="philHealth"> PhilHealth ID No.</label>
                                    <input type="text3" id="philHealth" class='input' name="philHealth"
                                           placeholder="Input Answer Here">
                                </div>
                                <div class="col-4">
                                    <label class="label1" for="pwdID"> PWD ID No.</label>
                                    <input type="text3" id="pwdID" class='input' name="pwdID"
                                           placeholder="Input Answer Here">
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="addressInfo">
                            <h5> Address Information </h5>
                            <div class="row">
                                <div class="col-8">
                                    <label class="required" for="houseAddress">House Address </label>
                                    <input type="text3" id="houseAddress" class='input' name="houseAddress"
                                           placeholder="Input House Number/Lot/Block Number, Street, Alley etc."
                                           required>
                                </div>
                                <div class="col-4">
                                    <div id="barangayList">
                                        <label class="required" for="barangay"> Barangay </label>
                                        <select id="barangay" onchange="updateBarangayDetails(this.value)">
                                            <option value="" disabled selected> Select Barangay</option>
                                            <?php
                                            require_once("../require/getBarangay.php");
                                            foreach ($barangays as $barangay) {
                                                $id = $barangay->getBarangayId();
                                                $name = $barangay->getBarangayName();
                                                echo "<option value=$id>$name</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="barangayDetails">
                                <div class="col">
                                    <label class="label1" for="city">City/Municipality</label>
                                    <input type="text3" id="city" class='input' name="city" disabled="disabled">
                                </div>
                                <div class="col">
                                    <label class="label1" for="province">Province</label>
                                    <input type="text3" id="province" class='input' name="province" disabled="disabled">
                                </div>

                                <div class="col">
                                    <label class="label1" for="region">Region</label>
                                    <input type="text3" id="region" class='input' name="region" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="medicalInfo">
                            <h5> Medical Information </h5>
                            <div class="row">
                                <div class="col-4">
                                    <label class="required" for="allergy"> Allergy with Vaccine?</label>
                                    <select class="formControl" id="allergy" name="allergy" required>
                                        <option selected disabled>Select Answer...</option>
                                        <option value="none">None</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="required" for="comorbidity"> With Comorbidity? </label>
                                    <select class="" id="comorbidity" name="comorbidity" required>
                                        <option selected disabled>Select Answer...</option>
                                        <option value="none"> None</option>
                                        <option value="yes"> Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="comorbidityList">
                            <h5> Comorbidity Information</h5>
                            <div class="listOfComorbidity">
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="hypertension" value="hypertension"
                                               id="hypertension">
                                        <label> Hypertension</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="heartDisease" value="heartDisease"
                                               id="heartDisease">
                                        <label> Heart Disease</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="kidneyDisease" value="kidneyDisease"
                                               id="kidneyDisease">
                                        <label> Kidney Disease </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="diabetes" value="diabetes" id="diabetes">
                                        <label> Diabetes Mellitus </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="asthma" value="asthma" id="asthma">
                                        <label> Bronchial Asthma </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="immunodeficiency" value="immunodeficiency"
                                               id="immunodeficiency">
                                        <label> Immunodeficiency </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="checkbox" name="cancer" value="cancer" id="cancer">
                                        <label> Cancer </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="others" value="others" id="others"
                                               onclick="showOthersInput(this)">
                                        <label> Others </label>
                                    </div>
                                    <div class="col">
                                        <div id="otherTextField">
                                            <input type="text3" name="others" id="others"
                                                   placeholder="Input Other Commorbidity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeModal('patientInformationModal')" class="btn btn-danger"
                            data-dismiss="modal" >Cancel
                    </button>
                    <button type="button" id="addPatientNextBtn" class="btn btn-success">Add</button>
                </div>
            </div>

        </div>

        <!--Notification modal-->
        <div id="notifyModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <span id="notificationClose" onclick="closeModal('patientInformationModal')" class="close"><i class='fas fa-window-close'></i></span>
                </div>
                <div class="modal-body">
                    <img src="../../img/checkmark.png" alt="confirm" id="confirm">
                    <p>
                    <center> Patient successfully added.</center>
                    </p>
                </div>
                <div class="modal-footer">
                    <button id='notificationDoneBtn' onclick="closeModal('patientInformationModal')" class="btn btn-primary" type="submit"> Done</button>
                    <!--instead of close change to Done-->
                </div>
            </div>
        </div>


        <div id="archived" class="modal-window">
            <div class="content-modal-table">
                <div class="modal-header">
                    <h4 class="modal-title">Archived Patients</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                        <i class='fas fa-window-close'></i>
                    </button>
                </div>
                <div id='archivedContent' class="modal-body">
                    <table class="table table-row table-hover tableModal" id="patientTable1">
                        <thead>
                        <tr>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Complete Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <?php
                        require_once '../require/getPatientDetails.php';

                        foreach ($patient_details as $pd) {
                            if ($pd->getArchived() == 1) {
                                $id = $pd->getPatientDeetPatId();
                                $category = $pd->getPriorityGroup();
                                $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
                                $contact = $pd->getContact();

                                if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
                                } else if ($pd->getPatientSuffix() == null) {
                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
                                } else if ($pd->getPatientMName() == null) {
                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
                                } else {
                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
                                }

                                echo "<tr>
                        <td>$name</td>
                        <td>$category</td>
                        <td>$fullAddress</td>
                        <td>$contact</td>
                        <td>
                            <div style='text-align: left;'>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $id)'><i class='fa fa-archive'></i> unarchive</button>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<script>
    // Sidebar
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

    // Add Patient
    var addPatientBtn = document.getElementById("addPatientBtn");
    var patientInformationModal = document.getElementById("patientInformationModal");
    var patientMedBackgroundModal = document.getElementById("patientMedBackgroundModal");

    var addPatientNextBtn = document.getElementById("addPatientNextBtn");



    // Upload File
    var uploadFileBtn = document.getElementById("uploadFileBtn");
    var uploadFileModal = document.getElementById("uploadFileModal");

    uploadFileBtn.onclick = function () {
        document.getElementById("uploadedFiles").innerHTML = '';
        uploadFileModal.style.display = "block";
    }

    // Add Patient Notification
    var notificationModal = document.getElementById("notifyModal");
    var notificationDoneBtn = document.getElementById("notificationDoneBtn");
    var notificationClose = document.getElementById("notificationClose");

    notificationDoneBtn.onclick = function () {
        notificationModal.style.display = "none";
    }
    notificationClose.onclick = function () {
        notificationModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === patientInformationModal) {
            patientInformationModal.style.display = "none";
        } else if (event.target === patientMedBackgroundModal) {
            patientMedBackgroundModal.style.display = "none";
        } else if (event.target === uploadFileModal) {
            uploadFileModal.style.display = "none";
        }
    }


    function searchPatient() {
        var textSearch = document.getElementById("searchPatientHSO").value;
        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable1").innerHTML = result;
            }
        });
    }

    function updateBarangayDetails(val) {
        $.ajax({
            url: '../EIR Module/EIRManageUserProcessor.php',
            type: 'POST',
            data: {"barangayName": val},
            success: function (result) {
                document.getElementById("barangayDetails").innerHTML = "";
                document.getElementById("barangayDetails").innerHTML = result;
            }
        });
    }

    function showOthersInput() {
        var elem = document.getElementById('others');
        var others = document.getElementById('otherTextField');

        if (elem.checked == true) {
            others.style.display = "block";
        } else {
            var others = document.getElementById('otherTextField');
            others.style.display = "none";
        }
    }

    //Show Comorbidity List
    var choice = document.getElementById("comorbidity");
    choice.onchange = function () {
        var showList = document.getElementById("comorbidityList");
        showList.style.display = (this.value == "none") ? "none" : "block";
    }

    function addPatient() {
        notificationModal.style.display = "block";
        var last = document.getElementById("lname").value;
        var first = document.getElementById("fname").value;
        var middle = document.getElementById("mname").value;
        var suffix = document.getElementById("suffix").value;
        var priority = document.getElementById("priority").value;
        var gender = document.getElementById("gender").value;
        var occupation = document.getElementById("occupation").value;
        var birthday = document.getElementById("date").value;
        var contact = document.getElementById("number").value;
        var street = document.getElementById("street").value;
        var brgy = document.getElementById("barangay").value;
        var city = document.getElementById("city").value;
        var state = document.getElementById("state").value;
        var region = document.getElementById("region").value;

        $.ajax({
            url: '../Barangay Module/ManagePatientProcessor.php',
            type: 'POST',
            data: {
                lastname: last,
                firstname: first,
                middlename: middle,
                suffix: suffix,
                priority: priority,
                gender: gender,
                occupation: occupation,
                birthday: birthday,
                contactnumber: contact,
                street: street,
                barangay: brgy,
                city: city,
                state: state,
                region: region
            },
            success: function (result) {
                document.getElementById("patientMedBackgroundModal").style.display = "none";
                document.getElementById("patientTable1").innerHTML = "";
                document.getElementById("patientTable1").innerHTML = result;
            }
        });
    }

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

    function clickArchive(drive, option) {
        $.ajax({
            url: '../Barangay Module/ManagePatientProcessor.php',
            method: 'POST',
            data: {archive: drive, option: option},
            success: function (result) {
                if (option == "Archive") {
                    window.location.href = "ManagePatientHome.php";

                } else if (option == "UnArchive") {
                    document.getElementById("patientTable1").innerHTML = "";
                    document.getElementById("patientTable1").innerHTML = result;
                }
            }
        })
    }

    function closeModal(modal) {
        document.getElementById(modal).style.display = "none";
    }

    function openModal(modal) {
        console.log(modal);
        document.getElementById(modal).style.display = "block";
    }

    function getUploadedFiles(item) {
        for (var i = 0; i < item.files.length; i++) {
            var element = document.createElement('li');
            element.innerHTML = item.files[i].name;
            document.getElementById("uploadedFiles").insertAdjacentElement("beforeend", element);
        }
    }

    function uploadFiles() {
        var files = document.getElementById("fileUpload").files;
        var formData = new FormData();
        formData.append('file', files[0]);
        $.ajax({
            url: 'UploadFile.php',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formData,
            success: function (result) {
                uploadFileModal.style.display = "none";
                Swal.fire('Added Patient', '', 'success');
            }
        });
    }

    function viewPatient(patientId){
        $.ajax({
            url:'ManagePatientProcessor.php',
            type:'POST',
            data:{"patient": patientId},
            success:function (result){
                document.getElementById("patientModalContent").innerHTML = result;
                openModal('viewPatientDetails');
            }
        })
    }

    function showPatient(val) {
        var id = val.getElementsByTagName("td")[0].innerText;
        $.ajax({
            url: 'ManagePatientProcessor.php',
            method: 'POST',
            data: {patient: id},
            success: function (result) {
                document.getElementById("patientModalContent").innerHTML = result;
                openModal('viewPatientDetails');
            }
        })
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
