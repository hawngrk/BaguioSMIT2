<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>EIR | Manage Users</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/EIRModule.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

    <!--jQuery-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
                <img src="../img/logoo.png" style="width: 104%; margin-bottom:-19%; margin-top:-5%;" alt="Baguio Logo">
            </div>
        </div>

        <ul class="list-unstyled components">
            <hr>
            <h4 id="headingNav1">Entry Immunization Register</h4>
            <hr>
            <div class="timeBox">
                <p id="time"></p>
                <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
            </div>
            <hr>
            <li>
                <a href="../EIR Module/EIRHomeScreening.php"><i class="fas fa-home"></i></i> Home</a>
            </li>
            <li class="active">
                <a href="../EIR Module/EIRManageUsersScreening.php"><i class="fas fa-users"></i> Manage Users</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info signOutPersonnel">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <!--Top Nav-->
        <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
            <div class="container-fluid">
                <div>
                    <button type="button" class="buttonTop3 float-left"
                            onclick="openModal('uploadFileModal')"><i
                                class="fas fa-upload"></i> Upload File
                    </button>
                    <button type="button" onclick="openModal('addPatientModal')"
                            class="buttonTop3"><i class="fas fa-user-plus"></i> Add User Account
                    </button>
                </div>
                <button type="button" class="btn btn-warning shadow-sm buttonTop3 float-right"
                        onclick="openModal('archived')"><i class="fas fa-inbox fa-lg"> </i> Archive
                </button>
            </div>
        </div>

        <!--Table Part-->
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchPatient" type="search" class="form-control" placeholder="Search" name="searchPatient" onkeyup="search()"/>
                            <button type="submit" class="buttonTop5" name="searchPatientBtn" onclick="searchPatient()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterCat" name="filterCategory"
                                        onchange="filterCategoryGroup(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value="" disabled >Select Category Group</option>
                                    <option value="None"> None </option>
                                    <option value="A1"> A1 </option>
                                    <option value="A2"> A2 </option>
                                    <option value="A3"> A3 </option>
                                    <option value="A4"> A4 </option>
                                    <option value="A5"> A5 </option>
                                    <option value="A6"> ROP </option>
                                    <option value="A7"> A7 </option>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortPatientName" name="sortPatient"
                                        onchange="sortByName(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option>Name Asc</option>
                                    <option>Name Desc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tablePatient shadow tableScroll2">
            <table class="table table-hover" id="patientTable">
                <thead>
                <tr class="labelRow tableCenterCont">
                    <th>Patient Id No.</th>
                    <th>Patient Name</th>
                    <th>Category</th>
                    <th>Complete Address</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
                </thead>
<!--                --><?php
//                include '../includes/showRegisteredPatients.php';
//                ?>
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
                            <div>
                                <button class='buttonTransparent' onclick='archive(1, clickArchive, $id)'><i class='fa fa-archive'></i></button>
                                <button type='button' class='viewReportBtn buttonTransparent' id='viewButton' onclick='viewPatient($id)'><i class='fas fa-eye'></i></button
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

<!--MODALS-->
<!--View Modal-->
<div id="viewPatientDetails" class="modal-window">
    <div class='content-modal' id="patientModalContent">
    </div>
</div>

<!--Patient Add User Modal-->
<div id="addPatientModal" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 class="modal-title">Add User | Patient - Information</h4>
            <button type="button" onclick="closeModal('addPatientModal')" class="close" data-dismiss="modal"><i class='fas fa-window-close'></i>
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
                            <label class="label1 required" for="email"> Email </label>
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
                                <option value="A7: 12-17">A7: 12-17 Years Old</option>
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
                                   placeholder="Input House Number/Lot/Block Number, Street, Alley etc." required>
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
                                <option value="None">None</option>
                                <option value="Yes">Yes</option>
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
                                <input type="checkbox" name="hypertension" value="1" id="hypertension">
                                <label> Hypertension</label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="heartDisease" value="1" id="heartDisease">
                                <label> Heart Disease</label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="kidneyDisease" value="1"
                                       id="kidneyDisease">
                                <label> Kidney Disease </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="checkbox" name="diabetes" value="1" id="diabetes">
                                <label> Diabetes Mellitus </label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="asthma" value="1" id="asthma">
                                <label> Bronchial Asthma </label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="immunodeficiency" value="1"
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
                                <input type="checkbox" name="other" value="other" id="other"
                                       onclick="showOthersInput(this)">
                                <label> Others </label>
                            </div>
                            <div class="col">
                                <div id="otherTextField">
                                    <input type="text3" name="other" id="other" class="otherInput"
                                           placeholder="Input Other Commorbidity">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeModal('addPatientModal')" class="btn btn-danger shadow-sm" >Cancel</button>
            <button type="button" id="addBtn" class="btn btn-success shadow-sm" onclick="addPatient()">Add</button>
        </div>
    </div>
</div>
<div id="uploadFileModal" class="modal-window">
    <div class="content-modal">
        <div class="modal-header">
            <h4 class="modal-title">Upload files</h4>
            <button type="button" onclick="closeModal('uploadFileModal')" class="close"><i class='fas fa-window-close'></i></button>
        </div>
        <div class="modal-body">
            <div class="row" id="upload-content">
                <div class="col">
                    <div class="col-md-12 text-center">
                        <button class="button" id="iconBrowse"
                                onclick="document.getElementById('fileUpload').click()">
                            <label for="fileUpload"><i class="fas fa-upload"></i></label>
                        </button>
                        <input id="fileUpload" type="file" style="display: none"
                               onchange="getUploadedFiles(this)" multiple/>
                        <p><br> Upload a list of patients (.csv) </p>
                    </div>
                </div>

                <div class="col">
                    <h6> Uploaded Files </h6>
                    <div id="uploadedFiles">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="uploadFileCancelBtn" class="btn btn-secondary"
                    onclick="document.getElementById('uploadFileModal').style.display= 'none'">
                Cancel
            </button>
            <button type="button" id="uploadFileConfirmBtn" class="btn btn-primary"
                    name="patientUploadFile" onclick="uploadFiles()">Add
            </button>
        </div>
    </div>
</div>
</div>
<div id="archived" class="modal-window">
    <div class="content-modal-table">
        <div class="modal-header">
            <h4 class="modal-title">Archived Users</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                <i class='fas fa-window-close'></i>
            </button>
        </div>
        <div id='archivedContent' class="modal-body">
            <table class="table table-row table-hover tableModal">
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
                require_once '../require/getVaccinationDrive.php';
                require_once '../require/getVaccinationSites.php';

                $count = 0;
                foreach ($vaccination_drive as $vd) {
                    if ($vd->getArchived() == 1) {
                        $count++;
                        $driveId = $vd->getDriveId();
                        $date = $vd->getVaccDate();
                        $stubs = $vd->getVaccStubs();

                        foreach ($vaccinationSites as $vs) {
                            if ($vs->getVaccinationSiteId() == $vd->getVaccDriveVaccSiteId()) {
                                $vaccinationSite = $vs->getVaccinationSiteLocation();
                            }
                        }

                        echo "<tr class='table-row'>
                        <td>$count</td>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>$stubs</td>
                        <td>
                            <div style='text-align: left;'>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
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

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

<script type="text/javascript">

    function search() {
        var textSearch = document.getElementById("searchPatient").value;
        $.ajax({
            url: 'EIRManageUserProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function filterCategoryGroup(filter){
        var selectedFilter = filter.value;
        $.ajax({
            url: 'EIRManageUserProcessor.php',
            type: 'POST',
            data: {"filter": selectedFilter},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        })
    }

    function sortByName(sort){
        var selectedSort = sort.value;
        $.ajax({
            url: 'EIRManageUserProcessor.php',
            type: 'POST',
            data: {"sort": selectedSort},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        })
    }

    function updateBarangayDetails(val) {
        $.ajax({
            url: 'EIRManageUserProcessor.php',
            type: 'POST',
            data: {"barangayName": val},
            success: function (result) {
                document.getElementById("barangayDetails").innerHTML = "";
                document.getElementById("barangayDetails").innerHTML = result;
            }
        });
    }

    function showOthersInput() {
        var elem = document.getElementById('other');
        var other = document.getElementById('otherTextField');

        if (elem.checked == true) {
            other.style.display = "block";
        } else {
            var other = document.getElementById('otherTextField');
            other.style.display = "none";
        }
    }

    //Submit Button Clicked
    function addPatient() {
        var addButton = document.getElementById("addBtn");

        //Personal Information
        var last = document.getElementById("lname").value;
        var first = document.getElementById("fname").value;
        var middle = document.getElementById("mname").value;
        var suffix = document.getElementById("suffix").value;
        var occupation = document.getElementById("occupation").value;
        var gender = document.getElementById("gender").value;
        var birthdate = document.getElementById("date").value;
        var dob = new Date(document.getElementById("date").value);
        var age = getAge(dob);

        //Contact Information
        var contact = document.getElementById("contactNum").value;
        var email = document.getElementById("email").value;

        //Category Information
        var priority = document.getElementById("priorityGroup").value;
        var id = document.getElementById("categoryID").value;
        var idNo = document.getElementById("categoryNo").value;
        var philHealth = document.getElementById("philHealth").value;
        var pwd = document.getElementById("pwdID").value;
        //Address Information
        var houseAddress = document.getElementById("houseAddress").value;
        var brgy = document.getElementById("barangay").value;
        var city = document.getElementById("city").value;
        var province = document.getElementById("province").value;
        var region = document.getElementById("region").value;

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
            url: 'EIRAddPatient.php',
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

                //Contact Information
                contact: contact,
                email: email,

                //Priority Group
                priority: priority,
                category: id,
                categoryID: idNo,
                philhealthID: philHealth,
                pwdID: pwd,

                //Address Information
                houseAddress: houseAddress,
                barangay: brgy,
                cmAddress: city,
                province: province,
                region: region,

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
                console.log(result);
                Swal.fire('Added Patient', '', 'success');
                reloadPatient();
                addButton.disabled = true;
            }
        });
    }
    function openModal(modal) {
        console.log(modal)
        document.getElementById(modal).style.display = "block";
    }

    function closeModal(modal) {
        document.getElementById(modal).style.display = "none";
    }

    //Change unchecked commorbidity to 0
    function verifyCommorbidity(commorbidity) {
        return !commorbidity ? 0 : 1;
    }

    function reloadPatient() {
        $.ajax({
            url: '../includes/showRegisteredPatients.php',
            type: 'GET',
            success: function (result) {
                document.getElementById("patientTable").innerHTML = "";
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    //Calculates the age of the patient using its birthday
    function getAge(dob) {
        var month_diff = Date.now() - dob.getTime();
        var age_dt = new Date(month_diff);
        var year = age_dt.getUTCFullYear();
        var age = Math.abs(year - 1970);
        return age;
    }

    //Show Comorbidity List
    var choice = document.getElementById("comorbidity");
    choice.onchange = function () {
        var showList = document.getElementById("comorbidityList");
        showList.style.display = (this.value == "none") ? "none" : "block";
    }

    var sucess = document.getElementById("submit");
    function getUploadedFiles(item) {
        for (var i = 0; i < item.files.length; i++) {
            var element = document.createElement('p');
            element.innerHTML = item.files[i].name;
            document.getElementById("uploadedFiles").insertAdjacentElement("beforeend", element);
        }
    }

    function uploadFiles() {
        var files = document.getElementById("fileUpload").files;
        var formData = new FormData();
        formData.append('file', files[0]);
        $.ajax({
            url: '../HSO Module/UploadFile.php',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formData,
            success: function (result) {
                uploadFileModal.style.display = "none";
                Swal.fire('Added Patient', '', 'success');
                reloadPatient();
            }
        });
    }

    function showPatient(val) {
        var id = val.getElementsByTagName("td")[0].innerText;
        $.ajax({
            url: 'EIRManageUserProcessor.php',
            method: 'POST',
            data: {patient: id},
            success: function (result) {
                document.getElementById("patientModalContent").innerHTML = result;
                openModal('viewPatientDetails');
            }
        })
    }

    function viewPatient(patientId){
        $.ajax({
            url:'EIRManageUserProcessor.php',
            type:'POST',
            data:{"patient": patientId},
            success:function (result){
                document.getElementById("patientModalContent").innerHTML = result;
                openModal('viewPatientDetails');
            }
        })
    }
</script>
</body>
</html>
























