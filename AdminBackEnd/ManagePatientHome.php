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
                <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li class="active">
                <a href="#ManageUsersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-users"></i> Manage Users</a>
                <ul class="collapse list-unstyled" id="ManageUsersSubmenu">
                    <li>
                        <a href="ManagePersonnelHome.php">Personnel</a>
                    </li>
                    <li class="active">
                        <a href="ManagePatientHome.php" class="active">Patients</a>
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

        <!--Button for Uploading File-->
        <button id="addNewVaccineBtn" type="button" class="buttonTop">Upload File</button>

        <!--Modal for uploading patient csv-->
        <!--To include uploading files limited to csv file only-->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <h3> Upload File/s<span id="close" class="close">&times;</span></h3>
                <div id="uploadingFile">
                    <p>Upload a list of patients (.csv) <br> or </p>
                    <input type="file" class="form-control" id="fileUpload" multiple/>
                    <button id="browse" type="button" class="'button4 btn-primary"> Browse</button>
                </div>

                <div id="listFile">
                    <!--temporary uploading-->
                    <h6> Uploaded Files </h6>
                    <p> prereg_09-19-2021_validates.csv</p>
                    <p> prereg_09-21-2021_validates.csv</p>
                </div>
            </div>
        </div>

        <!--Button for Adding Patient Details-->
        <button id="addPatientBtn" type="button" class="buttonTop">Add User</button>

        <!--Modal for Adding patient -->
        <form id='addPatientForm' method="post" enctype="multipart/form-data">
            <div id="patientInformationModal" class="modal">
                <div class="modal-content container">
                    <!-- <span id="exit1" class="close">&times;</span> -->
                    <h3 id="addPatientHeader">Add User | Patient - Information<span id="addPatientInfoClose" class="close">&times;</span></h3>
                    <div class="addUser-PopUp">
                        <h4> Basic Information</h4>
                        <input class="col-xs-12" type="text" id="lastName" name="lastName" placeholder="Last Name">
                        <input class="col-xs-12" type="text" id="firstName" name="firstName" placeholder="First Name">
                        <input class="col-xs-12" type="text" id="middleName" name="middleName" placeholder="Middle Name">
                        <label for="suffix"> Suffix Name </label>
                        <select class="formControl" id="suffix" name="suffix">
                            <option> Sr </option>
                            <option> Jr </option>
                            <option> I </option>
                            <option> II </option>
                            <option> III </option>
                            <option selected> None </option>
                        </select>

                        <label for="group"> Priority Group </label>
                        <select class="formControl" id="group" name="group">
                            <option> A1: Health Care Workers </option>
                            <option> A2: Senior Citizens </option>
                            <option> A3: Adult with Comorbidity </option>
                            <option> A4: Frontline Personnel in Essential Sector, including Uniformed Personnel </option>
                            <option> A5: Indigent Population </option>
                            <option> ROP: Rest of Population </option>
                        </select>

                        <label for="category"> Category ID </label>
                        <select class="formControl" id="category" name="category">
                            <option> Professional Commision Regulation ID </option>
                            <option> Office of Senior Citizen Affairs ID </option>
                            <option> Facility ID </option>
                            <option> Other ID </option>
                        </select>

                        <label for="categoryNumber"> Category Number </label>
                        <input type="text" class="formControl" id="categoryNumber" name="categoryNumber">

                        <h4> Address </h4>
                        <input class="col-xs-12" type="text" id="house" name="house" placeholder="House Address">
                        <input class="col-xs-12" type="text" id="barangay" name="barangay" placeholder="Barangay">
                        <input class="col-xs-12" type="text" id="city" name="city" placeholder="City/Town">
                        <input class="col-xs-12" type="text" id="state" name="state" placeholder="State/Province">
                        <input class="col-xs-12" type="text" id="zip" name="zip" placeholder="Postal/Zip Code">
                        <input class="col-xs-12" type="text" id="region" name="region" placeholder="Region">

                        <label for="date"> Birthdate </label>
                        <input type="date" id="birthdate" name="birthdate">

                        <input class="col-xs-12" type="text" id="age" name="age" placeholder="Age">

                        <label for="gender"> Gender </label>
                        <select class="formControl" id="gender" name="gender">
                            <option> Male </option>
                            <option> Female </option>
                        </select>

                        <input class="col-xs-12" type="text" id="contactNum" name="contactNum" placeholder="Contact Number">
                        <input class="col-xs-12" type="text" id="occupation" name="occupation" placeholder="Occupation">
                    </div>
                    <button type='button' id="cancelBtnAddPatientInfo"> Cancel </button>
                    <button type="button" id="nextBtnAddPatient"> Next </button>
                </div>
            </div>

            <div id="patientMedBackgroundModal" class="modal">
                <div class="modal-content container">
                    <!-- <span id="exit1" class="close">&times;</span> -->
                    <h3 id="addPatientInfoHeader">Add User | Patient - Medical Background<span id="addPatientMedClose" class="close">&times;</span></h3>
                    <div class="addUser-PopUp">
                        <h4> Medical Background </h4>
                        <label for="skin"> Skin </label>
                        <input type="hidden" name="skin" value="0">
                        <input type="checkbox" id="skin" name="skin" value="1">

                        <label for="food"> Food </label>
                        <input type="hidden" name="food" value="0">
                        <input type="checkbox" id="food" name="food"  value="1">

                        <label for="medication"> Medication </label>
                        <input type="hidden" name="medication" value="0">
                        <input type="checkbox" id="medication" name="medication" value="1">

                        <label for="insect"> Insect </label>
                        <input type="hidden" name="insect" value="0">
                        <input type="checkbox" id="insect" name="insect" value="1">

                        <label for="pollen"> Pollen </label>
                        <input type="hidden" name="pollen" value="0">
                        <input type="checkbox" id="pollen" name="pollen" value="1">

                        <label for="bite"> Bite </label>
                        <input type="hidden" name="bite" value="0">
                        <input type="checkbox" id="bite" name="bite" value="1">

                        <label for="latex"> Latex </label>
                        <input type="hidden" name="latex" value="0">
                        <input type="checkbox" id="latex" name="latex" value="1">

                        <label for="mold"> Mold </label>
                        <input type="hidden" name="mold" value="0">
                        <input type="checkbox" name="mold" value="1" id="mold">

                        <label for="pet"> Pet </label>
                        <input type="hidden" name="pet" value="0">
                        <input type="checkbox" id="pet" name="pet" value="1">

                        <h4> Comorbidities </h4>
                        <label for="hypertension"> Hypertension </label>
                        <input type="hidden" name="hypertension" value="0">
                        <input type="checkbox" id="hypertension" name="hypertension" value="1">

                        <label for="heart"> Heart Diseases </label>
                        <input type="hidden" name="heart" value="0">
                        <input type="checkbox" id="heart" name="heart" value="1">

                        <label for="kidney"> Kidney Diseases </label>
                        <input type="hidden" name="kidney" value="0">
                        <input type="checkbox" name="kidney" value="1" id="kidney">

                        <label for="diabetes"> Diabetes </label>
                        <input type="hidden" name="diabetes" value="0">
                        <input type="checkbox" id="diabetes" name="diabetes" value="1">

                        <label for="asthma"> Asthma </label>
                        <input type="hidden" name="asthma" value="0">
                        <input type="checkbox" id="asthma" name="asthma" value="1">

                        <label for="immunodeficiency"> Immunodeficiency </label>
                        <input type="hidden" name="immunodeficiency" value="0">
                        <input type="checkbox" id="immunodeficiency" name="immunodeficiency" value="1">

                        <label for="cancer"> Cancer </label>
                        <input type="hidden" name="cancer" value="0">
                        <input type="checkbox" id="cancer" name="cancer" value="1">

                        <br>
                        <label for="others"> Others (Please indicate): </label>
                        <input class="col-xs-12" type="text" id="others" name="others">
                    </div>
                    <button type="button" id="cancelBtnAddPatientMed"> Cancel </button>
                    <button type='button' id="prevBtnAddPatient"> Previous </button>
                    <button type="submit" id="addPatientConfirmBtn" name="addPatientConfirmBtn"> Add </button>
                </div>
            </div>
        </form>

        <!-- Search Container-->
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i>
                </button>
            </form>
        </div>

        <table class="table table-row table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Complete Address</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <?php
            require_once '../require/getPatientDetails.php';

            $count = 0;
            foreach ($patient_details as $pd) {
                $count++;
                $id = $pd->getPatientDeetPatId();
                $compAdd = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
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
                <td>$count</td>
                <td>$id</td>
                <td>$name</td>
                <td>$compAdd</td>
                <td>$contact</td>
                
</tr>";
            }
            ?>
        </table>
    </div>

    <?php
    if (isset($_POST['addPatientConfirmBtn'])) {
        include '../includes/database.php';
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $suffix = $_POST['suffix'];
        if ($suffix == 'None') {
            $suffix = "";
        }
        $group = $_POST['group'];
        $category = $_POST['category'];
        $categoryNumber = $_POST['categoryNumber'];

        $house = $_POST['house'];
        $barangay = $_POST['barangay'];
        $cityTown = $_POST['city'];
        $state = $_POST['state'];
        $region = $_POST['region'];
        $birthday = $_POST['birthdate'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contactNumber = $_POST['contactNum'];
        $occupation = $_POST['occupation'];

        $fullName = $lastName." ".$firstName." ".$middleName." ";

        $skin = $_POST['skin'];
        $food = $_POST['food'];
        $medication = $_POST['medication'];
        $insect = $_POST['insect'];
        $pollen = $_POST['pollen'];
        $bite = $_POST['bite'];
        $latex = $_POST['latex'];
        $mold = $_POST['mold'];
        $pet = $_POST['pet'];

        $hypertension = $_POST['hypertension'];
        $heart = $_POST['heart'];
        $kidney = $_POST['kidney'];
        $diabetes = $_POST['diabetes'];
        $asthma = $_POST['asthma'];
        $immunodeficiency = $_POST['immunodeficiency'];
        $cancer = $_POST['cancer'];

        if (empty($_POST['others'])) {
            $others = "";
        } else {
            $others = $_POST['others'];
        }

        $patientTableQuery = "INSERT INTO patient (patient_full_name, vaccination_status) VALUE ('$fullName', 'Not Vaccinated');";
        $database->query($patientTableQuery);

        $getPatientIdQuery = "SELECT patient_id FROM patient WHERE patient_full_name='$fullName'";
        $dbase= $database->stmt_init();
        $dbase ->prepare($getPatientIdQuery);
        $dbase ->execute();
        $dbase ->bind_result($patientid);
        $dbase ->fetch();
        $dbase ->close();

        $patient_detailsTableQuery = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$firstName', '$lastName', '$middleName', '$suffix', '$group', '$category', '$categoryNumber', '$house', '$barangay', '$cityTown', '$state', '$region', '$birthday', '$age', '$gender', '$contactNumber', '$occupation');";
        $database->query($patient_detailsTableQuery);


        $medical_backgroundTableQuery = "INSERT INTO medical_background (patient_id, skin_allergy, food_allergy, medication_allergy, insect_allergy, pollen_allergy, bite_allergy, latex_allergy, mold_allergy, pet_allergy, hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUE ('$patientid', '$skin', '$food', '$medication', '$insect', '$pollen', '$bite', '$latex', '$mold', '$pet', '$hypertension', '$heart', '$kidney', '$diabetes', '$asthma', '$immunodeficiency', '$cancer', '$others');";
        $database->query($medical_backgroundTableQuery);
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
        var patientInformationModal = document.getElementById("patientInformationModal");
        var patientMedBackgroundModal = document.getElementById("patientMedBackgroundModal");
        var addPatientBtn = document.getElementById("addPatientBtn");
        var nextBtnAddPatient = document.getElementById("nextBtnAddPatient");
        var prevBtnAddPatient = document.getElementById("prevBtnAddPatient");
        var addPatientInfoClose = document.getElementById("addPatientInfoClose");
        var addPatientMedClose = document.getElementById("addPatientMedClose");
        var cancelAddPatientInfo = document.getElementById("cancelBtnAddPatientInfo");
        var cancelAddPatientMed = document.getElementById("cancelBtnAddPatientMed");

        addPatientBtn.onclick = function () {
            patientInformationModal.style.display = "block";
        }

        nextBtnAddPatient.onclick = function () {
            patientInformationModal.style.display = "none";
            patientMedBackgroundModal.style.display = "block";
        }

        prevBtnAddPatient.onclick = function () {
            patientMedBackgroundModal.style.display = "none";
            patientInformationModal.style.display = "block";
        }

        addPatientInfoClose.onclick = function () {
            patientInformationModal.style.display = "none";
        }

        addPatientMedClose.onclick = function () {
            patientMedBackgroundModal.style.display = "none";
        }

        cancelAddPatientInfo.onclick = function () {
            patientInformationModal.style.display = "none";
        }

        cancelAddPatientMed.onclick = function () {
            patientMedBackgroundModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target === patientInformationModal) {
                patientInformationModal.style.display = "none";
            } else if (event.target === patientMedBackgroundModal) {
                patientMedBackgroundModal.style.display = "none";
            }
        }
    </script>

    <script>
        $(document).ready(function ($) {
            $(".table-row").click(function () {
                window.document.location = $(this).data("href");
            });
        });
    </script>
</body>
