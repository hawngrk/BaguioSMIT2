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

    <script defer src="../includes/showDateAndTime.js"> </script>
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
            <h5 id="headingNav2"></p>
            </h5>
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

        <div class="buttonContainer">
            <button type="button" class="btn btn-outline-primary buttonTop3 float-left"> <i class="fas fa-filter"></i>
            </button>
            <button type="button" class="btn btn-outline-primary buttonTop3 float-left">
                <i class="fas fa-sort"></i>
            </button>

            <button type="button" class="btn btn-outline-dark buttonTop3 float-right" onclick="openModal('archived')">
                <i class="fas fa-inbox fa-lg"></i>
            </button>

            <button id="addPatientAccount" type="button" class="btn btn-primary buttonTop3">Add Patient Account</button>
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
                <form id="registrationForm" name="registrationForm" action="/action_page.php" onsubmit="return validateForm()" method="post">
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
                                    <label class="required" for="barangay"> Barangay  </label>
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
                                    <input type="checkbox" name="others" value="others" id="others"
                                           onclick="showOthersInput(this)">
                                    <label> Others </label>
                                </div>
                                <div class="col">
                                    <div id="otherTextField">
                                        <input type="text3" name="others" id="others" placeholder="Input Other Commorbidity">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addBtn" class="btn btn-success" onclick="addPatient()">Add</button>
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
                    <button id='submit' class="btn btn-primary" type="submit"> Submit</button>
                    <!--instead of close change to Done-->
                </div>
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
        var elem = document.getElementById('others');
        var others = document.getElementById('otherTextField');

        if (elem.checked == true) {
            others.style.display = "block";
        } else {
            var others = document.getElementById('otherTextField');
            others.style.display = "none";
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
        var gender = document.getElementById("gender").value;
        var birthdate = document.getElementById("date").value;
        var occupation = document.getElementById("occupation").value;
        var contact = document.getElementById("contactNum").value;
        var email = document.getElementById("email").value;

        //Category Information
        var priority = document.getElementById("priorityGroup").value;
        var id = document.getElementById("categoryID").value;
        var idNo = document.getElementById("categoryNo").value;
        var philHealth = document.getElementById("philHealth").value;
        var pwd = document.getElementById("pwdId").value;

        //Address Information
        var houseAddress = document.getElementById("houseAddress").value;
        var brgy = document.getElementById("barangay").value;
        var city = document.getElementById("city").value;
        var province = document.getElementById("province").value;
        var region = document.getElementById("region").value;

        //Clinical Information
        var allergy = document.getElementById("allergy").value;
        var comorbidity = document.getElementById("comorbidity").value;

        //Commorbidity Information
        var hypertension = $('#hypertension:checked').val();
        var diabetes = $('#diabetes:checked').val();
        var cancer = $('#cancer:checked').val();
        var heartDisease = $('#heartDisease:checked').val();
        var asthma = $('#asthma:checked').val();
        var kidneyDisease = $('#kidneyDisease:checked').val();
        var immunodeficiency = $('#immunodeficiency:checked').val();
        var other = document.getElementbyId('others').value;


        $.ajax({
            url: '../patient/authorization/pre_registration.php',
            type: 'POST',
            data: {
                //Personal Information
                lastname: last, 
                firstname: first, 
                middlename: middle, 
                suffix: suffix, 
                gender: gender, 
                occupation: occupation, 
                birthday: birthday, 

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
                region: region ,
                
                //Clinical Information
                allergy: allergy,
                commorbid: commorbidity,
                hypertension: hypertension,
                heartDisease: heartDisease,
                kidneyDisease: kidneyDisease,
                diabetesMellitus : diabetes,
                bronchialAsthma: asthma, 
                immunodeficiency: immunodeficiency,
                cancer: cancer,
                otherCommorbidity: other
                },
            success: function (result) {
                console.log(result);
                addButton.disabled = false;
                document.getElementById("patientTable").innerHTML = "";
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }
    
    //Show Comorbidity List
    var choice = document.getElementById("comorbidity");
    choice.onchange = function () {
        var showList = document.getElementById("comorbidityList");
        showList.style.display = (this.value == "none") ? "none" : "block";
    }

    //Displaying Modals
    //modals
    var addPatientModal = document.getElementById("addPatientModal");
    var notificationModal = document.getElementById("notifyModal");

    //buttons
    var addPatientAccountButton = document.getElementById("addPatientAccount");
    var closeAddPatientModal = document.getElementById("addPatientInfoClose");

    var sucess = document.getElementById("submit");

    //open
    addPatientAccountButton.onclick = function () {
        addPatientModal.style.display = "block";
    }

    //close
    closeAddPatientModal.onclick = function () {
        addPatientModal.style.display = "none";
    }


</script>
</body>
</html>




