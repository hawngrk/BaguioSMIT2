<?php
require_once('../includes/sessionHandling.php');
checkRole('HSO');
include ("../AdminbackEnd/sessionHandling.php");
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
            <button type="button" class="btn btn-info" onclick='logout()'>
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <div id="content">
        <!-- Page Content  -->
        <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
            <div class="container-fluid">
                <div>
                    <button type="button" class="buttonTop3 float-left" id="uploadFileBtn"
                            onclick="openModal('uploadFileModal')"><i
                                class="fas fa-upload"></i> Upload File
                    </button>
                    <button type="button" onclick="openModal('patientInformationModal')"
                            class="buttonTop3"><i class="fas fa-user-plus"></i> Add User Account
                    </button>
                </div>
                <button type="button" class="btn btn-warning shadow-sm buttonTop3 float-right"
                        onclick="openModal('archived')"><i class="fas fa-inbox fa-lg"> </i> Archive
                </button>
            </div>
        </div>

        <!-- Table  -->
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchPatientInput" type="search" name="searchPatient" class="form-control" placeholder="Search" onkeyup="searchPatient(this.value)"/>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterCat" name="filterCategory"
                                        onchange="filterCategoryGroup(this.value)">
                                    <option value='' selected disabled hidden>Filter By</option>
                                    <option value='' disabled>Select Category Group</option>
                                    <option value="All"> All</option>
                                    <?php
                                    require_once("../require/getPriorityGroup.php");
                                    foreach ($priorityGroups as $pg) {
                                        $id = $pg->getPriorityGroupId();
                                        $category = $pg->getPriorityGroup();
                                        echo "<option value=$id> $category </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortPatientName" name="sortPatient"
                                        onchange="sortByName(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option value="" disabled>Select Name Sort</option>
                                    <option value="None"> None</option>
                                    <option value="Asc">Name ↑</option>
                                    <option value="Desc">Name ↓</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tablePatient shadow tableScroll2" id="mainPatient">
                <!--Table Part-->
                <table class="table table table-hover tablePatient" id="patientTable1">
                    <thead>
                    <tr class="tableCenterCont">
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
                    $query = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($patientId, $fullname, $category, $patientAddress, $contactNum);
                    while ($stmt->fetch()) {
                        echo "<tr class='tableCenterCont' onclick='showPatient(this)'>
                                <td>$patientId</td>
                                <td>$fullname</td>
                                <td>$category</td>
                                <td>$patientAddress</td>
                                <td>$contactNum</td>
                                <td>
                                    <div class ='d-flex justify-content-center'>
                                        <button class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(1, clickArchive, $patientId)'><i class='fa fa-archive'></i></button>
                                        <button type='button' class='btn btn-sm bg-none' id='viewButton' onclick='viewPatient($patientId)'><i class='fas fa-eye'></i></button
                                    </div>
                                </td>
                            </tr>";
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
        <<div id="uploadFileModal" class="modal-window">
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
                            <form id="uploadForm">
                                <div class="col-md-12 text-center form-group">
                                    <button class="shadow-sm form-control-file" id="iconBrowse" type="button"
                                            onclick="document.getElementById('fileUpload').click()">
                                        Browse files
                                    </button>
                                    <br>
                                    <input id="fileUpload" type="file" style="display: none"
                                           onchange="getUploadedFiles(this)" multiple/>
                                    <h6><br> Upload a list of patients (.csv) </h6>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <h5> Uploaded Files </h5>
                            <div id="uploadedFiles">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal('uploadFileModal')">
                        Cancel
                    </button>
                    <button type="button" id="uploadFileConfirmBtn" class="btn btn-primary"
                            name="patientUploadFile" onclick="uploadFiles()">Add
                    </button>
                </div>
            </div>
        </div>

        <!--Add Patient Modal-->
        <div id="patientInformationModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h4 class="modal-title">Add Profile Information </h4>
                    <button type="button" onclick="closeModal('patientInformationModal')" class="close"><i
                                class='fas fa-window-close'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm" name="registrationForm" action="" method="post"
                          class="form">
                        <div class="personalInfo">
                            <h5> Personal Information </h5>
                            <div class="row">
                                <div class="col">
                                    <label class="required" for="lname">Last Name</label>
                                    <input type="text3" id="lname" class='input form-control' name="lname"
                                           placeholder="Input Answer Here">
                                </div>
                                <div class="col">
                                    <label class="required" for="fname">First Name </label>
                                    <input type="text3" id="fname" class='input form-control' name="fname"
                                           placeholder="Input Answer Here">

                                </div>
                                <div class="col">
                                    <label for="mname">Middle Name </label>
                                    <input type="text3" id="mname" class='input form-control' name="middlename"
                                           placeholder="Input Answer Here">
                                </div>

                                <div class="col">
                                    <label class="label1 required" for="suffix">Suffix </label><br>
                                    <select id="suffix" name="suffix" class="form-select form-select-lg" required>
                                        <option value=""> Select Suffix...</option>
                                        <option value="none">None</option>
                                        <option value="sr">Sr</option>
                                        <option value="jr">Jr</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <label class="label1 required" for="date"> Birthdate </label>
                                    <input type="date" id="date" name="birthdate" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="gender"> Sex </label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="">Select a Sex...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="civilStatus"> Civil Status </label>
                                    <select class="form-select" id="civilStatus" name="civilStatus">
                                        <option value="">Please Select...</option>
                                        <option value="Not Applicable">Not Applicable</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widow/Widower">Widow/Widower</option>
                                        <option value="Separated/Anulled">Separated/Anulled</option>
                                        <option value="Living with Partner">Living with Partner</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="occupation">Occupation </label>
                                    <input type="text3" id="occupation" class='input form-control' name="occupation"
                                           placeholder="Input Answer Here">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="label1 required" for="contactNum">Contact Number </label>
                                    <input type="text3" id="contactNum" class='input form-control' name="contactNum"
                                           placeholder="09XX-XXX-XXXX" pattern="09[0-9]{9}">
                                </div>
                                <div class="col">
                                    <label class="label1 required" for="email"> Email Address </label>
                                    <input type="email" id="email" class='input form-control' name="email"
                                           placeholder="email@example.org">
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
                                    <select class="form-select" id="priorityGroup" name="priorityGroup" required>
                                        <option disabled selected>Select a Category Group...</option>
                                        <?php
                                        require_once("../require/getPriorityGroup.php");
                                        foreach ($priorityGroups as $priority) {
                                            $id = $priority->getPriorityGroupId();
                                            $name = $priority->getPriorityGroup();
                                            echo "<option value=$id>$name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="required" for="categoryID">Category ID</label><br>
                                    <select id="categoryID" name="categoryID" class="form-select" required>
                                        <option disabled selected>Select a Category ID...</option>
                                        <option value="Professional Regulation Comission Id">Professional Regulation
                                            Commission
                                            ID
                                        </option>
                                        <option value="Office of Senior Citizen Affairs Id">Office of Senior Citizen
                                            Affairs
                                            ID
                                        </option>
                                        <option value="Facility Id"> Facility ID</option>
                                        <option value="Other Id"> Other ID</option>
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
                                           placeholder="Input Philhealth ID">
                                </div>
                                <div class="col-4">
                                    <label class="label1" for="pwdID"> PWD ID No.</label>
                                    <input type="text3" id="pwdID" class='input' name="pwdID"
                                           placeholder="Input PWD ID">
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
                                    <input type="text3" id="houseAddress" class='input form-control' name="houseAddress"
                                           placeholder="Input House Number/Lot/Block Number, Street, Alley etc."
                                           required>
                                </div>
                                <div class="col-4">
                                    <div id="barangayList">
                                        <label class="required" for="barangay"> Barangay </label>
                                        <select id="barangay" name="barangay"
                                                onchange="updateBarangayDetails(this.value)"
                                                class="form-select" required>
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
                                    <input type="text3" id="city" class='input form-control' name="city"
                                           disabled="disabled">
                                </div>
                                <div class="col">
                                    <label class="label1" for="province">Province</label>
                                    <input type="text3" id="province" class='input form-control' name="province"
                                           disabled="disabled">
                                </div>

                                <div class="col">
                                    <label class="label1" for="region">Region</label>
                                    <input type="text3" id="region" class='input form-control' name="region"
                                           disabled="disabled">
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
                                    <select class="form-select" id="allergy" name="allergy" required>
                                        <option value="">Select Answer...</option>
                                        <option value="none">None</option>
                                        <option value="yes" required>Yes</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="required" for="comorbidity"> With Comorbidity? </label>
                                    <select class="form-select" id="comorbidity" name="comorbidity" required>
                                        <option value="">Select Answer...</option>
                                        <option value="none"> None</option>
                                        <option value="yes"> Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="comorbidityList">
                            <h5> Comorbidity Information</h5>
                            <div class="listOfComorbidity">
                                <label class="required" for="comorbidities"> Select that blessed </label>
                                <select id="comorbidities" name="comorbidities" class="form-select" required>
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

                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="hypertension" value="hypertension"
                                               id="hypertension" class="form-select">
                                        <label> Hypertension</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="heartDisease" value="heartDisease"
                                               id="heartDisease" class="form-select">
                                        <label> Heart Disease</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="kidneyDisease" value="kidneyDisease"
                                               id="kidneyDisease" class="form-select">
                                        <label> Kidney Disease </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="diabetes" value="diabetes" id="diabetes">
                                        <label> Diabetes Mellitus </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="asthma" value="asthma" id="asthma"
                                               class="form-select">
                                        <label> Bronchial Asthma </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="immunodeficiency" value="immunodeficiency"
                                               id="immunodeficiency" class="form-select">
                                        <label> Immunodeficiency </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="checkbox" name="cancer" value="cancer" id="cancer"
                                               class="form-select">
                                        <label> Cancer </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="others" value="others" id="othersComorbidity"
                                               onclick="showOthersInput(this)" class="form-select">
                                        <label for="other" id="others"> Others </label>
                                    </div>
                                    <div class="col">
                                        <div id="otherTextField">
                                            <input type="text3" name="otherCom" id="otherCom"
                                                   placeholder="Input Other Comorbidity" class="form-select">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" onclick="closeModalForms('patientInformationModal','registrationForm')"
                                   class="btn btn-danger shadow-sm" value="Cancel">
                            <input type="submit" class="btn btn-success shadow-sm" value="Add"
                                   onclick="event.preventDefault(); confMessage('patient', addPatient, validationPatient)">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Notification modal-->
        <div id="notifyModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
            <span id="notificationClose" onclick="closeModal('patientInformationModal')" class="close"><i
                        class='fas fa-window-close'></i></span>
                </div>
                <div class="modal-body">
                    <img src="../../img/checkmark.png" alt="confirm" id="confirm">
                    <p>
                    <center> Patient successfully added.</center>
                    </p>
                </div>
                <div class="modal-footer">
                    <button id='notificationDoneBtn' onclick="closeModal('patientInformationModal')"
                            class="btn btn-primary"
                            type="submit"> Done
                    </button>
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
                        <tr class="tableCenterCont">
                            <th>Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Complete Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <?php
                        require_once '../require/getPatientDetails.php';
                        $query = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id  WHERE patient_details.Archived = 1;";
                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($patientId, $fullname, $category, $patientAddress, $contactNum);
                        while ($stmt->fetch()) {

                            echo "<tr class='tableCenterCont'>
                        <td>$patientId</td>
                        <td>$fullname</td>
                        <td>$category</td>
                        <td>$patientAddress</td>
                        <td>$contactNum</td>
                        <td>
                            <div>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $patientId)'><i class='fa fa-archive'></i> unarchive</button>
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

<!-- Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="../javascript/inputValidations.js"></script>


<script>

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

    //clear search text field
    $('#searchPatientInput').on('input', function (e) {
        if ('' == this.value) {
            $.ajax({
                url: '../includes/searchProcessor.php',
                type: 'POST',
                data: {"searchPatient": ""},
                success: function (result) {
                    document.getElementById("mainPatient").innerHTML = result;
                }
            });
        }
    });

    //search patient
    function searchPatient(textSearch) {
        console.log(textSearch);
        $.ajax({
            url: '../includes/searchProcessor.php',
            type: 'POST',
            data: {"searchPatient": textSearch},
            success: function (result) {
                document.getElementById("mainPatient").innerHTML = result;
            }
        });
    }

    //filter category group
    function filterCategoryGroup(filter) {
        $.ajax({
            url: '../includes/filterProcessor.php',
            type: 'POST',
            data: {"filterPatient": filter},
            success: function (result) {
                document.getElementById("mainPatient").innerHTML = result;
            }
        })
    }

    function sortByName(sort) {
        var selectedSort = sort.value;
        $.ajax({
            url: '../includes/sortingProcessor.php',
            type: 'POST',
            data: {"sortPatient": selectedSort},
            success: function (result) {
                document.getElementById("mainPatient").innerHTML = result;
            }
        })
    }

    function viewPatient(patientId) {
        $.ajax({
            url: '../includes/viewProcessor.php',
            type: 'POST',
            data: {"viewPatient": patientId},
            success: function (result) {
                document.getElementById("patientModalContent").innerHTML = result;
                openModal('viewPatientDetails');
            }
        })
    }

    function showPatient(val) {
        var id = val.getElementsByTagName("td")[0].innerText;
        $.ajax({
            url: '../includes/viewProcessor.php',
            method: 'POST',
            data: {"viewPatient": id},
            success: function (result) {
                document.getElementById("patientModalContent").innerHTML = result;
                openModal('viewPatientDetails');
            }
        })
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
        var elem = document.getElementById('othersComorbidity');
        var others = document.getElementById('otherTextField');

        if (elem.checked == true) {
            others.style.display = "block";
            document.getElementById('otherCom').required;
        } else {
            others.style.display = "none";
        }
    }

    function confMessage(vax, action, validationMethod) {
        var formValidation = validationMethod();
        if (formValidation) {
            Swal.fire({
                icon: 'info',
                title: 'Are You Sure you Want to add this ' + vax + '?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`
            }).then((result) => {
                if (result.isConfirmed) {
                    action();
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
    }

    //Show Comorbidity List
    var choice = document.getElementById("comorbidity");
    choice.onchange = function () {
        var showList = document.getElementById("comorbidityList");
        showList.style.display = (this.value == "none") ? "none" : "block";
    }

    //add patient
    function addPatient() {
        //Personal Information
        var last = document.getElementById("lname").value;
        var first = document.getElementById("fname").value;
        var middle = document.getElementById("mname").value;
        var suffix = document.getElementById("suffix").value;
        var occupation = document.getElementById("occupation").value;
        var gender = document.getElementById("gender").value;
        var civilStat = document.getElementById("civilStatus").value;
        var birthdate = document.getElementById("date").value;
        var dob = new Date(document.getElementById("date").value);
        var age = getAge(dob);

        //Contact Information
        var contact = document.getElementById("contactNum").value;
        var email = document.getElementById("email").value;

        //Category Information
        var priorityId = document.getElementById("priorityGroup").value;
        var id = document.getElementById("categoryID").value;
        var idNo = document.getElementById("categoryNo").value;
        var philHealth = document.getElementById("philHealth").value;
        var pwd = document.getElementById("pwdID").value;
        //Address Information
        var houseAddress = document.getElementById("houseAddress").value;
        var brgyId = document.getElementById("barangay").value;

        //Clinical Information
        var allergyInput = document.getElementById("allergy").value;
        allergy = allergyInput == "None" ? 0 : 1
        var commorbidity = document.getElementById("comorbidity").value;

        //Commorbidity Information
        var hypertension = verifyCommorbidity($('#hypertension:checked').val());
        var diabetes = verifyCommorbidity($('#diabetes:checked').val());
        var cancer = verifyCommorbidity($('#cancer:checked').val());
        var heartDisease = verifyCommorbidity($('#heartDisease:checked').val());
        var asthma = verifyCommorbidity($('#asthma:checked').val());
        var kidneyDisease = verifyCommorbidity($('#kidneyDisease:checked').val());
        var immunodeficiency = verifyCommorbidity($('#immunodeficiency:checked').val());
        var other = $('#other:checked').val();
        var enteredCommorbidity = other ? document.querySelector('.otherInput').value : "";

        $.ajax({
            url: '../EIR Module/EIRAddPatient.php',
            type: 'POST',
            data: {
                //Personal Information
                lastname: last,
                firstname: first,
                middlename: middle,
                suffix: suffix,
                gender: gender,
                occupation: occupation,
                birthdate: birthdate,
                age: age,
                civilStat: civilStat,

                //Contact Information
                contact: contact,
                email: email,

                //Priority Group
                priority: priorityId,
                category: id,
                categoryID: idNo,
                philhealthID: philHealth,
                pwdID: pwd,

                //Address Information
                houseAddress: houseAddress,
                barangay: brgyId,

                //Clinical Information
                allergy: allergy,
                commorbid: commorbidity,
                hypertension: hypertension,
                heartDisease: heartDisease,
                kidneyDisease: kidneyDisease,
                diabetesMellitus: diabetes,
                bronchialAsthma: asthma,
                immunodeficiency: immunodeficiency,
                cancer: cancer,
                otherCommorbidity: enteredCommorbidity
            },
            success: function (result) {
                closeModal('patientInformationModal')
                reloadPatient();
            }
        });
    }

    //Change unchecked commorbidity to 0
    function verifyCommorbidity(commorbidity) {
        return !commorbidity ? 0 : 1;
    }

    //Calculates the age of the patient using its birthday
    function getAge(dob) {
        var month_diff = Date.now() - dob.getTime();
        var age_dt = new Date(month_diff);
        var year = age_dt.getUTCFullYear();
        var age = Math.abs(year - 1970);
        return age;
    }

    //reload
    function reloadPatient() {
        $.ajax({
            url: '../Barangay Module/ManagePatientProcessor.php',
            method: 'POST',
            data: {showUpdatedPatient: ""},
            success: function (result) {
                document.getElementById('mainPatient').innerHTML = result;
            }
        })
    }

    //archive
    async function archive(archive, action, patient) {
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
                action(patient, archiveText);
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    }

    //click archive
    function clickArchive(patient, option) {
        $.ajax({
            url: '../Barangay Module/ManagePatientProcessor.php',
            method: 'POST',
            data: {archive: patient, option: option},
            success: function (result) {

                if (option == "Archive") {
                    document.getElementById('mainPatient').innerHTML = result;
                    $.ajax({
                        url: '../Barangay Module/ManagePatientProcessor.php',
                        method: 'POST',
                        data: {showUpdatedArchive: ""},
                        success: function (result) {
                            document.getElementById('archivedContent').innerHTML = result;
                        }
                    })

                } else if (option == "UnArchive") {
                    document.getElementById("archivedContent").innerHTML = result;
                    $.ajax({
                        url: '../Barangay Module/ManagePatientProcessor.php',
                        method: 'POST',
                        data: {showUpdatedPatient: ""},
                        success: function (result) {
                            document.getElementById('mainPatient').innerHTML = result;
                        }
                    })
                }
            }
        })
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
                console.log(result);
                uploadFileModal.style.display = "none";
                Swal.fire('Added Patient', '', 'success');
            }
        });
    }
</script>
<!--Logout script-->
<script src="../javascript/logout.js"></script>
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
