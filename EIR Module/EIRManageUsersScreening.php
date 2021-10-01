<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Baguio SMIT+ | EIR Manage Users</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
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
            <h4 id="headingNav1">Entry Immunization Register</h4>
            <hr>
            <h5 id="headingNav2">September 17, 2021 | 01:24 PM</h5>
            <hr>
            <li>
                <a href="../EIR Module/EIRHomeScreeningg.php"><i class="fas fa-home"></i></i> Home</a>
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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info" onclick="Toggle()">
                    <i class='fas fa-angle-left'></i> Menu
                </button>
            </div>
        </nav>

        <button id="addPatientAccount" type="button" class="buttonTop">Add Patient Account</button>

        <!--Search Input and Button-->
        <div class="search-container">
            <input id="searchPatientEIR" type="text" placeholder="Search" class="searchHome" name="searchPatient"
                   onkeyup="searchPatient()">
            <button type="submit" name="searchPatientEIRBtn" onclick="searchPatient()">
                <i class="fa fa-search"></i>
            </button>
        </div>

        <!--Table Part-->
        <table class="table table-row table-hover tableBrgy" id="patientTable">
            <thead>
            <tr class="labelRow">
                <th scope="col"> Patient ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Category</th>
                <th scope="col">Complete Address</th>
                <th scope="col">Contact Number</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <?php
            include '../includes/showRegisteredPatients.php';
            ?>
        </table>
    </div>
    <!--Patient Add User Modal-->
    <div id="addPatientModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h4 class="modal-title">Add User | Patient - Information</h4>
                <button type="button" id="addPatientInfoClose" class="close" data-dismiss="modal">&times;
                </button>
            </div>
            <div class="modal-body">
                <div class="personalInfo">
                    <h5> Personal Information </h5>
                    <div class="row">
                        <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text3" id="lname" class='input' name="lastname"
                                   placeholder="Input Answer Here">
                        </div>
                        <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text3" id="fname" class='input' name="firstname"
                                   placeholder="Input Answer Here">

                        </div>
                        <div class="col">
                            <label for="mname">Middle Name</label>
                            <input type="text3" id="mname" class='input' name="middlename"
                                   placeholder="Input Answer Here">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="label1" for="suffix">Suffix</label><br>
                            <select id="suffix" name="suffix">
                                <option selected value="">None</option>
                                <option value="sr">Sr</option>
                                <option value="jr">Jr</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="label1" for="gender"> Gender </label>
                            <select class="formControl" id="gender" name="gender">
                                <option disabled selected>Select a Gender...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="label1" for="date"> Birthdate </label>
                            <input type="date" id="date" name="birthdate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="label1" for="occupation">Occupation</label>
                            <input type="text3" id="occupation" class='input' name="middlename"
                                   placeholder="Input Answer Here">
                        </div>
                        <div class="col-4">
                            <label class="label1" for="contactNum">Contact Number</label>
                            <input type="text3" id="contactNum" class='input' name="contactNum"
                                   placeholder="09XX-XXX-XXXX">
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="categoryInfo">
                    <h5> Category Information </h5>
                    <div class="row">
                        <div class="col">
                            <label for="priorityGroup">Priority Group</label>
                            <select class="formControl" id="priorityGroup" name="priorityGroup">
                                <option disabled selected>Select a Category Group...</option>
                                <option value="A1: Health Care Workers">A1: Health Care Workers</option>
                                <option value="A2: Senior Citizens">A2: Senior Citizens</option>
                                <option value="A3: Adult with Comorbidity">A3: Adult with Comorbidity</option>
                                <option value="A4: Frontliner">A4: Frontline Personnel in Essential Sector, including
                                    Uniformed
                                    Personnel
                                </option>
                                <option value="A5: Indigent">A5: Indigent Population</option>
                                <option value="A6: ROP">A6: Rest of the Population</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="categoryID">Category ID</label><br>
                            <select id="categoryID" name="categoryID">
                                <option disabled selected>Select a Category ID...</option>
                                <option value="passport">PASSPORT</option>
                                <option value="birth">BIRTH</option>
                                <option value="others"> OTHER ID</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="categoryNo"> Category ID No.</label>
                            <input type="text3" id="categoryNo" class='input' name="categoryNo"
                                   placeholder="Input Answer Here">
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
                            <label for="street">Street Name</label>
                            <input type="text3" id="street" class='input' name="street"
                                   placeholder="Input Street Name">
                        </div>
                        <div class="col-4">
                            <div id="barangayList">
                                <label for="barangay"> Barangay </label>
                                <select>
                                    <option value="" disabled selected hidden> Select Barangay</option>
                                    <option value=""> Select Barangay</option>
                                    <?php
                                    require_once("../require/getBarangay.php");
                                    foreach ($barangays as $barangay) {
                                        $id = $barangay->getBarangayName();
                                        echo "<option value=$id>$id</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                            <label for="allergy"> Allergy with Vaccine? </label>
                            <select class="formControl" id="allergy" name="allergy">
                                <option selected disabled>Select Answer...</option>
                                <option value="none">None</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="comorbidity"> With Comorbidity? </label>
                            <select class="" id="comorbidity" name="comorbidity">
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
                                <input type="checkbox" name="hypertension" value="hypertension" id="hypertension">
                                <label> Hypertension</label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="heartDisease" value="heartDisease" id="heartDisease">
                                <label> Heart Disease</label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="kidneyDisease" value="kidneyDisease" id="kidneyDisease">
                                <label> Kidney Disease </label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="diabetes" value="diabetes" id="diabetes">
                                <label> Diabetes Mellitus </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="checkbox" name="asthma" value="asthma" id="asthma">
                                <label> Bronchial Asthma </label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="immunodeficiency" value="immunodeficiency"
                                       id="immunodeficiency">
                                <label> Immunodeficiency </label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="cancer" value="cancer" id="cancer">
                                <label> Cancer </label>
                            </div>
                            <div class="col">
                                <input type="text3" id="others" class='form-control' name="others"
                                       placeholder="Other Commorbidity">
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="consent">
                    <input type="checkbox" name="accept" value="accept" id="accept">
                    <label> I have accept and understand the <a href="#"> Terms and Condition. </a> </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="addPatientBtn" class="btn btn-success" onclick="addPatient()">Done</button>
        </div>
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
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
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
</script>
</body>

</html>

<script>
    function searchPatient() {
        var textSearch = document.getElementById("searchPatient").value;
        $.ajax({
            url: 'EIRSearchProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
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
            url: '../Barangay Module/PHP Processes/ManagePatientProcessor.php',
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
                document.getElementById("patientTable").innerHTML = "";
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

</script>

<script>
    var choice = document.getElementById("comorbidity");

    choice.onchange = function () {
        var showList = document.getElementById("comorbidityList");
        showList.style.display = (this.value == "none") ? "none" : "block";
    }
    //modals
    var addPatientModal = document.getElementById("addPatientModal");

    //buttons
    var addPatientAccountButton = document.getElementById("addPatientAccount");
    var closeAddPatientModal = document.getElementById("addPatientInfoClose");

    var sucess = document.getElementById("addPatientBtn");


    //open
    addPatientAccountButton.onclick = function () {
        addPatientModal.style.display = "block";
    }

    //close
    closeAddPatientModal.onclick = function () {
        addPatientModal.style.display = "none";
    }

    //success
    sucess.onclick = function () {
        addPatientModal.style.display = "none";
    }

</script>



