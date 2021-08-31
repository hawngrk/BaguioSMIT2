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
            <h3 id="mainmenu">Main Menu</h3>
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
        <button id="uploadFile" type="button" class="buttonTop">Upload File</button>

        <!--Modal for uploading patient csv-->
        <!--To include uploading files limited to csv file only-->
        <div id="uploadFileModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h3> Upload File/s </h3>
                    <span id="close" class="close">&times;</span>
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
                    <button type="button" id="cancel1" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="add" class="btn btn-primary"> Add</button>
                </div>
            </div>
        </div>


        <!--Button for Adding Patient Details-->
        <button id="addPatientBtn" type="button" class="buttonTop">Add User</button>

        <!--Modal for Adding patient -->
        <div id="patientInformationModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add User | Patient - Information</h4>
                    <button type="button" id="addPatientInfoClose" class="close" data-dismiss="modal">&times;</button>
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
                                    <option value="">None</option>
                                    <option value="sr"> Sr</option>
                                    <option value="jr"> Jr</option>
                                    <option value="1"> I</option>
                                    <option value="2"> II</option>
                                    <option value="3"> III</option>
                                </select>
                                <br>
                                <!--Category-->
                                <label class="label1" for="priority"> Priority Group</label>
                                <select class="formControl" id="priority">
                                    <option value="" disabled selected hidden>Select a Category...</option>
                                    <option value="">Select</option>
                                    <option value="A1"> A1: Health Care Workers</option>
                                    <option value="A2"> A2: Senior Citizens</option>
                                    <option value="A3"> A3: Adult with Comorbidity</option>
                                    <option value="A4"> A4: Frontline Personnel in Essential Sector, including Uniformed
                                        Personnel
                                    </option>
                                    <option value="A5"> A5: Indigent Population</option>
                                    <option value="ROP"> ROP: Rest of the Population</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="fname">First Name</label><br>
                                <input type="text3" id="fname" class='input' name="firstname"
                                       placeholder="Input First Name">
                                <br>
                                <label class="label1" for="gender"> Gender </label>
                                <select class="formControl" id="gender">
                                    <option value="" disabled selected hidden>Select a Gender...</option>
                                    <option value="">Select</option>
                                    <option value="male"> Male</option>
                                    <option value="female"> Female</option>
                                </select>
                                <br>
                                <label class="label1" for="occupation">Occupation</label><br>
                                <input type="text3" id="occupation" class='details' name="postal"
                                       placeholder="Input Occupation">
                            </div>
                            <div class="col-md-4">
                                <label for="mname">Middle Name</label><br>
                                <input type="text3" id="mname" class='input' name="middlename"
                                       placeholder="Input Middle Name">
                                <br>
                                <label class="label1" for="date"> Birthdate </label>
                                <input type="date" id="date" name="date">
                                <br>
                                <label class="label1" for="number">Contact Number</label><br>
                                <input type="text3" id="number" class='details' name="postal" placeholder="+63XXXXXXXXX" pattern="+63[0-9]{10}" required>
                            </div>
                        </div>
                        <br>
                        <h5> Address </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="street">Street Name</label>
                                <input type="text3" id="street" class='input' name="street"
                                       placeholder="Input Street Name"><br>
                                <label class="label1" for="city">City/Town</label>
                                <input type="text3" id="city" class='input' name="city" placeholder="City/Town"
                                       disabled="disabled"><br>
                                <label class="label1" for="region">Region</label><br>
                                <input type="text3" id="region" class='input' name="region" placeholder="Region"
                                       disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="barangay"> Barangay </label>
                                <select class="formControl" id="barangay">
                                    <option value="" disabled selected hidden>Select a Barangay...</option>
                                    <option value="">Select</option>
                                    <option value="alfonsoTabora"> Alfonso Tabora</option>
                                    <option value="ambiong"> Ambiong</option>
                                    <option value="andresBonifacio"> Andres Bonifacio</option>
                                    <option value="apuganLoakane"> Apugan-Loakan</option>
                                    <option value="Irisan"> Irisan</option>
                                    <option value="Upper Dagsian"> Upper Dagsian</option>
                                    <option value="Lower Dagsian"> Lower Dagsian</option>
                                    <option value="Scout Barrio"> Scout Barrio</option>
                                </select>
                                <br>
                                <label class="label1" for="state">State/Province</label>
                                <input type="text3" id="state" class='input' name="state" placeholder="State/Province"
                                       disabled="disabled">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="nextBtnAddPatient" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>

        <div id="patientMedBackgroundModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add User | Patient - Medical Background</h4>
                    <button type="button" id="addPatientMedClose" class="close" data-dismiss="modal">&times;</button>
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
                                            <input class="form-check-input" type="checkbox" value="pet" id="pet">
                                            <label class="form-check-label" for="flexCheckDefault"> Pet </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="bite" id="bite">
                                            <label class="form-check-label" for="flexCheckDefault"> Bite </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="skin" id="skin">
                                            <label class="form-check-label" for="flexCheckDefault"> Skin </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="none" id="none">
                                            <label class="form-check-label" for="flexCheckDefault"> None </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="food" id="food">
                                            <label class="form-check-label" for="flexCheckDefault"> Food </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="mold" id="mold">
                                            <label class="form-check-label" for="flexCheckDefault"> Mold </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="latex" id="latex">
                                            <label class="form-check-label" for="flexCheckDefault"> Latex </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="pollen" id="pollen">
                                            <label class="form-check-label" for="flexCheckDefault"> Pollen </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="insect" id="insect">
                                            <label class="form-check-label" for="flexCheckDefault"> Insect </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="medication"
                                                   id="medication">
                                            <label class="form-check-label" for="flexCheckDefault"> Medication </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="text" id="others" placeholder="Others:" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5> Comorbidities </h5>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="cancer" id="cancer">
                                            <label class="form-check-label" for="flexCheckDefault"> Cancer </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="asthma" id="asthma">
                                            <label class="form-check-label" for="flexCheckDefault"> Asthma </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="diabetes" id="diabetes">
                                            <label class="form-check-label" for="flexCheckDefault"> Diabetes </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="none" id="none">
                                            <label class="form-check-label" for="flexCheckDefault"> None </label>
                                        </div>

                                    </div>

                                    <div class="col-md-5-pr-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="hypertension" id="hypertension">
                                            <label class="form-check-label" for="flexCheckDefault"> Hypertension </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="heartDiseases" id="heartDiseases">
                                            <label class="form-check-label" for="flexCheckDefault"> Heart Diseases </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="kidneyDiseases" id="kidneyDiseases">
                                            <label class="form-check-label" for="flexCheckDefault"> Kidney Diseases </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="text" id="others" placeholder="Others:" class="form-control"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type='button' id="prevBtnAddPatient" class="btn btn-outline-secondary mr-auto"> Previous
                    </button>
                    <button type="button" id="cancelBtnAddPatientMed" class="btn btn-secondary"> Cancel</button>
                    <button type="submit" id="addPatientConfirmBtn" class="btn btn-primary"> Add</button>
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
                    <button id='done' class="btn btn-primary" type="submit"> Done</button>
                    <!--instead of close change to Done-->
                </div>
            </div>
        </div>

        <!-- Search Container-->
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search" name="search" id="searchPatient">
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

        $fullName = $lastName . " " . $firstName . " " . $middleName . " ";

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
        $dbase = $database->stmt_init();
        $dbase->prepare($getPatientIdQuery);
        $dbase->execute();
        $dbase->bind_result($patientid);
        $dbase->fetch();
        $dbase->close();

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
        var notificationClose = document.getElementById("notificationClose");

        var cancelAddPatientInfo = document.getElementById("cancelBtnAddPatientInfo");
        var cancelAddPatientMed = document.getElementById("cancelBtnAddPatientMed");
        var cancel= document.getElementById("cancel1");

        var addPatientConfirmBtn = document.getElementById("addPatientConfirmBtn");

        var uploadFileModal = document.getElementById("uploadFileModal");
        var uploadFileBtn = document.getElementById("uploadFile");

        var notificationModal = document.getElementById("notifyModal");

        var done = document.getElementById("done");
        var close = document.getElementById("close");

        //upload file button
        uploadFileBtn.onclick = function () {
            uploadFileModal.style.display = "block";
        }

        cancel.onclick = function (){
            uploadFileModal.style.display = "none";
        }

        close.onclick = function () {
            uploadFileModal.style.display = "none";
        }

        addPatientBtn.onclick = function () {
            patientInformationModal.style.display = "block";
        }

        addPatientConfirmBtn.onclick = function () {
            patientMedBackgroundModal.style.display = "none";
            notificationModal.style.display = "block";

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

        done.onclick = function () {
            notificationModal.style.display = "none";
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

        notificationClose.onclick = function () {
            notificationModal.style.display = "none";
        }
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
