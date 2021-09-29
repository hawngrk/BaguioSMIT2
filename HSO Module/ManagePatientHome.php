<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+ | Manage Patients</title>
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

        <!--Button for Uploading File-->
        <button type="button" class="buttonTransparent buttonTop archive" onclick="openModal('archived')">
            <i class="fas fa-inbox"></i>
        </button>
<!--        <button id="uploadFileBtn" type="button" class="buttonTop">Upload File</button>-->

        <!--Modal for uploading patient csv-->
        <!--To include uploading files limited to csv file only-->
        <div id="uploadFileModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h3> Upload File/s </h3>
                    <span id="uploadFileClose" class="close">&times;</span>
                </div>

                <div class="modal-body">
                    <div class="row" id="upload-content">
                        <div class="col">
                            <div class="col-md-12 text-center">
                                <button class="button" id="iconBrowse"><i class="fas fa-upload"></i></i></button>
                                <p><br> Upload a list of patients (.csv) </p>
                            </div>
                        </div>

                        <div class="col">
                            <!--temporary uploading-->
                            <h6> Uploaded Files </h6>
                            <p> prereg_09-19-2021_validates.csv</p>
                            <p> prereg_09-21-2021_validates.csv</p>
                            <!--insert backend process for reading the uploaded files-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="uploadFileCancelBtn" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button id="uploadFileConfirmBtn" class="btn btn-success"> Add</button>
                </div>
            </div>
        </div>


        <!--Button for Adding Patient Details-->
        <button id="addPatientBtn" type="button" class="buttonTop">Add User</button>

            <div id="patientInformationModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User | Patient - Information</h4>
                        <button type="button" id="addPatientInfoClose" class="close" data-dismiss="modal">&times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-section">
                            <h4> Basic Information</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="lname">Last Name</label>
                                    <input type="text3" id="lname" class='input' name="lastname"
                                           placeholder="Input Last Name">
                                    <br>
                                    <label class="label1" for="suffix">Suffix</label><br>
                                    <select id="suffix" name="suffix">
                                        <option selected value="">None</option>
                                        <option value="sr">Sr</option>
                                        <option value="jr">Jr</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                    <br>
                                    <!--Category-->
                                    <label class="label1" for="priority"> Priority Group</label>
                                    <select class="formControl" id="priority" name="priority">
                                        <option disabled selected>Select a Category...</option>
                                        <option value="A1: Health Care Workers">A1: Health Care Workers</option>
                                        <option value="A2: Senior Citizens">A2: Senior Citizens</option>
                                        <option value="A3: Adult with Comorbidity">A3: Adult with Comorbidity</option>
                                        <option>A4: Frontline Personnel in Essential Sector, including Uniformed
                                            Personnel
                                        </option>
                                        <option>A5: Indigent Population</option>
                                        <option>ROP: Rest of the Population</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="fname">First Name</label><br>
                                    <input type="text3" id="fname" class='input' name="firstname"
                                           placeholder="Input First Name">
                                    <br>
                                    <label class="label1" for="gender"> Gender </label>
                                    <select class="formControl" id="gender" name="gender">
                                        <option disabled selected>Select a Gender...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <br>
                                    <label class="label1" for="occupation">Occupation</label><br>
                                    <input type="text3" id="occupation" class='details' name="occupation"
                                           placeholder="Input Occupation">
                                </div>
                                <div class="col-md-4">
                                    <label for="mname">Middle Name</label><br>
                                    <input type="text3" id="mname" class='input' name="middlename"
                                           placeholder="Input Middle Name">
                                    <br>
                                    <label class="label1" for="date"> Birthdate </label>
                                    <input type="date" id="date" name="birthdate">
                                    <br>
                                    <label class="label1" for="number">Contact Number</label><br>
                                    <input type="text3" id="number" class='details' name="contactnumber"
                                           placeholder="+09XXXXXXXXX">
                                </div>
                            </div>
                            <br>
                            <h5> Address </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="street">Street Name</label>
                                    <input type="text3" id="street" class='input' name="street"
                                           placeholder="Input Street Name">
                                    <br>
                                    <label class="label1" for="city">City/Town</label>
                                    <input type="text3" id="city" class='input' name="city" placeholder="City/Town"
                                           disabled="disabled">
                                    <br>
                                    <label class="label1" for="region">Region</label>
                                    <br>
                                    <input type="text3" id="region" class='input' name="region" placeholder="Region"
                                           disabled="disabled">
                                </div>
                                <div class="col-md-6">
                                    <label for="barangay"> Barangay </label>
                                    <select class="formControl" id="barangay" name="barangay"
                                            onchange="updateAddress()">
                                        <option disabled selected>Select a Barangay...</option>
                                        <option value="Alfonso tabora">Alfonso Tabora</option>
                                        <option>Ambiong</option>
                                        <option>Andres Bonifacio</option>
                                        <option>Apugan-Loakan</option>
                                        <option value="Irisan">Irisan</option>
                                        <option>Upper Dagsian</option>
                                        <option>Lower Dagsian</option>
                                        <option>Scout Barrio</option>
                                    </select>
                                    <br>
                                    <label class="label1" for="state">State/Province</label>
                                    <input type="text3" id="state" class='input' name="state"
                                           placeholder="State/Province" disabled="disabled">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="addPatientInfoCancelBtn" class="btn btn-secondary"
                                data-dismiss="modal">Cancel
                        </button>
                        <button type="button" id="addPatientNextBtn" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>


            <div id="patientMedBackgroundModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User | Patient - Medical Background</h4>
                        <button type="button" id="addPatientMedClose" class="close" data-dismiss="modal">&times;
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="modal-section">
                            <h4>Medical Background</h4>
                            <div id="allergies" class="row">
                                <div class="col-md-6">
                                    <h5> Allergies</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="hidden" name="pet" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="pet"
                                                       name="pet">
                                                <label class="form-check-label" for="flexCheckDefault"> Pet </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="bite" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="bite"
                                                       name="bite">
                                                <label class="form-check-label" for="flexCheckDefault"> Bite </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="skin" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="skin"
                                                       name="skin">
                                                <label class="form-check-label" for="flexCheckDefault"> Skin </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="none"
                                                       name="noneAllergies" onclick="disableAllergies(this)">
                                                <label class="form-check-label" for="flexCheckDefault"> None </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="hidden" name="food" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="food"
                                                       name="food">
                                                <label class="form-check-label" for="flexCheckDefault"> Food </label>
                                            </div>

                                            <div class="form-check">
                                                <input type="hidden" name="mold" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="mold"
                                                       name="mold">
                                                <label class="form-check-label" for="flexCheckDefault"> Mold </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="latex" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="latex"
                                                       name="latex">
                                                <label class="form-check-label" for="flexCheckDefault"> Latex </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="hidden" name="pollen" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="pollen"
                                                       name="pollen">
                                                <label class="form-check-label" for="flexCheckDefault"> Pollen </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="insect" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="insect"
                                                       name="insect">
                                                <label class="form-check-label" for="flexCheckDefault"> Insect </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="medication" value="0">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       id="medication" name="medication">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Medication </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="text" id="others" name="othersAllergies" placeholder="Others:"
                                               class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h5> Comorbidities </h5>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                <input type="hidden" name="cancer" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="cancer"
                                                       name="cancer">
                                                <label class="form-check-label" for="flexCheckDefault"> Cancer </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="asthma" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="asthma"
                                                       name="asthma">
                                                <label class="form-check-label" for="flexCheckDefault"> Asthma </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="diabetes" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="diabetes"
                                                       name="diabetes">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Diabetes </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="none"
                                                       name="noneComorbidities" onclick="disableComorbidities(this)">
                                                <label class="form-check-label" for="flexCheckDefault"> None </label>
                                            </div>

                                        </div>

                                        <div class="col-md-5-pr-3">
                                            <div class="form-check">
                                                <input type="hidden" name="hypertension" value="0">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       id="hypertension" name="hypertension">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Hypertension </label>
                                            </div>

                                            <div class="form-check">
                                                <input type="hidden" name="heartDiseases" value="0">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       id="heartDiseases" name="heartDiseases">
                                                <label class="form-check-label" for="flexCheckDefault"> Heart
                                                    Diseases </label>
                                            </div>

                                            <div class="form-check">
                                                <input type="hidden" name="kidneyDiseases" value="0">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       id="kidneyDiseases" name="kidneyDiseases">
                                                <label class="form-check-label" for="flexCheckDefault"> Kidney
                                                    Diseases </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="text" id="others" name="othersComobidities" placeholder="Others:"
                                               class="form-control"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type='button' id="addPatientPrevBtn" class="btn btn-outline-secondary mr-auto">
                            Previous
                        </button>
                        <button type="button" id="addPatientMedCancelBtn" class="btn btn-secondary"> Cancel</button>
                        <button type="button" class="btn btn-success" onclick="addPatient()"> Add </button>
                    </div>
                </div>
            </div>


        <!--Notification modal-->
        <div id="notifyModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <span id="notificationClose" class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <img src="../../img/checkmark.png" alt="confirm" id="confirm">
                    <p>
                    <center> Patient successfully added.</center>
                    </p>
                </div>
                <div class="modal-footer">
                    <button id='notificationDoneBtn' class="btn btn-primary" type="submit"> Done</button>
                    <!--instead of close change to Done-->
                </div>
            </div>
        </div>


        <div id="archived" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Archived Vaccination Drives</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                        &times;
                    </button>
                </div>
                <div id = 'archivedContent' class="modal-body">
                    <table class="table table-row table-hover tableBrgy" id="patientTable">
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
                                <button class='buttonTransparent hyperlink' onclick='archive(0, clickArchive, $id)'>unarchive<i class='fa fa-archive'></i></button>
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

            <div class="search-container">
                <input id="searchPatient" type="text" placeholder="Search" class="searchHome"name="searchPatient" onkeyup="searchPatient()">
                <button type="submit" id="searchPatientBtn" name="searchPatientBtn" onclick="searchPatient()">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <!--Table Part-->
            <table class="table table-row table-hover tableBrgy" id="patientTable">
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
                        if($pd->getArchived() == 0) {
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
                                <button class='buttonTransparent' onclick='archive(1, clickArchive, $id)'><i class='fa fa-archive'></i></button>
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
    var addPatientPrevBtn = document.getElementById("addPatientPrevBtn");
    var addPatientInfoCancelBtn = document.getElementById("addPatientInfoCancelBtn");
    var addPatientMedCancelBtn = document.getElementById("addPatientMedCancelBtn");

    var addPatientInfoClose = document.getElementById("addPatientInfoClose");
    var addPatientMedClose = document.getElementById("addPatientMedClose");

    addPatientBtn.onclick = function () {
        patientInformationModal.style.display = "block";
    }

    addPatientNextBtn.onclick = function () {
        patientInformationModal.style.display = "none";
        patientMedBackgroundModal.style.display = "block";
    }

    addPatientPrevBtn.onclick = function () {
        patientMedBackgroundModal.style.display = "none";
        patientInformationModal.style.display = "block";
    }
    addPatientInfoCancelBtn.onclick = function () {
        patientInformationModal.style.display = "none";
    }

    addPatientMedCancelBtn.onclick = function () {
        patientMedBackgroundModal.style.display = "none";
    }


    addPatientInfoClose.onclick = function () {
        patientInformationModal.style.display = "none";
    }

    addPatientMedClose.onclick = function () {
        patientMedBackgroundModal.style.display = "none";
    }

    // Upload File
    // var uploadFileBtn = document.getElementById("uploadFileBtn");
    var uploadFileModal = document.getElementById("uploadFileModal");
    var uploadFileCancelBtn = document.getElementById("uploadFileCancelBtn");
    var uploadFileConfirmBtn = document.getElementById("uploadFileConfirmBtn");
    var uploadFileClose = document.getElementById("uploadFileClose");

    // uploadFileBtn.onclick = function () {
    //     uploadFileModal.style.display = "block";
    // }

    uploadFileCancelBtn.onclick = function () {
        uploadFileModal.style.display = "none";
    }

    uploadFileClose.onclick = function () {
        uploadFileModal.style.display = "none";
    }

    uploadFileConfirmBtn.onclick = function () {
        uploadFileModal.style.display = "none";
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

    function updateAddress() {
        document.getElementById("city").value = "Baguio City";
        document.getElementById("state").value = "Benguet";
        document.getElementById("region").value = "Cordillera Administrative Region";
    }

    function disableAllergies(elem) {
        if (elem.checked) {
            document.getElementById('pet').disabled = true;
            document.getElementById('bite').disabled = true;
            document.getElementById('skin').disabled = true;
            document.getElementById('food').disabled = true;
            document.getElementById('mold').disabled = true;
            document.getElementById('latex').disabled = true;
            document.getElementById('pollen').disabled = true;
            document.getElementById('insect').disabled = true;
            document.getElementById('medication').disabled = true;
        } else {
            document.getElementById('pet').disabled = false;
            document.getElementById('bite').disabled = false;
            document.getElementById('skin').disabled = false;
            document.getElementById('food').disabled = false;
            document.getElementById('mold').disabled = false;
            document.getElementById('latex').disabled = false;
            document.getElementById('pollen').disabled = false;
            document.getElementById('insect').disabled = false;
            document.getElementById('medication').disabled = false;
        }
    }

    function disableComorbidities(elem) {
        if (elem.checked) {
            document.getElementById('cancer').disabled = true;
            document.getElementById('asthma').disabled = true;
            document.getElementById('diabetes').disabled = true;
            document.getElementById('hypertension').disabled = true;
            document.getElementById('heartDiseases').disabled = true;
            document.getElementById('kidneyDiseases').disabled = true;
        } else {
            document.getElementById('cancer').disabled = false;
            document.getElementById('asthma').disabled = false;
            document.getElementById('diabetes').disabled = false;
            document.getElementById('hypertension').disabled = false;
            document.getElementById('heartDiseases').disabled = false;
            document.getElementById('kidneyDiseases').disabled = false;
        }
    }

    function searchPatient() {
        var textSearch = document.getElementById("searchPatient").value;
        $.ajax({
            url: '../Barangay Module/ManagePatientProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function addPatient(){
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
            data: {lastname: last, firstname: first, middlename: middle, suffix: suffix, priority: priority, gender: gender, occupation: occupation, birthday: birthday, contactnumber: contact, street: street, barangay: brgy, city: city, state: state, region: region },
            success: function (result) {
                document.getElementById("patientMedBackgroundModal").style.display = "none";
                document.getElementById("patientTable").innerHTML = "";
                document.getElementById("patientTable").innerHTML = result;
            }
        });
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

    function clickArchive(drive, option){
        $.ajax({
            url: '../Barangay Module/ManagePatientProcessor.php',
            method: 'POST',
            data: {archive: drive, option: option},
            success: function (result) {
                if (option == "Archive") {
                    window.location.href = "ManagePatientHome.php";

                } else if(option == "UnArchive") {
                    document.getElementById("patientTable").innerHTML = "";
                    document.getElementById("patientTable").innerHTML = result;
                }
            }
        })
    }

    function closeModal(modal) {
        document.getElementById(modal).style.display = "none";
    }

    function openModal(modal) {
        console.log(modal)
        document.getElementById(modal).style.display = "block";
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
