<?php
 
require_once('../includes/sessionHandling.php');
checkRole("Mayor's Office");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mayor's Office | Manage Users</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/MayorModule.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXK`p4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
            <h4 id="headingNav1">Mayor's Office</h4>
            <hr>
            <div class="timeBox">
                <p id="time"></p>
                <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
            </div>
            <hr>
            <li>
                <a href="UsersLog.php"><i class="fas fa-warehouse"></i> Users Log</a>
            </li>
            <li class="active">
                <a href="manageUsersMayor.php"><i class="fas fa-users"></i> Manage Users</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info signOutPersonnel" onclick='logout()'>
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
                    <button type="button" onclick="openModal('addEmployeeModal')"
                            class="buttonTop3"><i class="fas fa-user-plus"></i> Add Employee Account
                    </button>
                </div>
                <button type="button" class="btn btn-warning shadow-sm buttonTop3 float-right"
                        onclick="openModal('disabledAccountsModal')"><i class="fas fa-inbox fa-lg"> </i> Disabled Accounts
                </button>
            </div>
        </div>

        <!-- Table Part -->
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">

                <div class="col">

                        <div class="input-group">

                            <input id="searchPersonnelInput" type="search" name="searchPersonnelInput" class="form-control"
                                   placeholder="Search" onkeyup="employeeSearch()"/>
                            <button type="submit" class="buttonTop5" name="searchPersonnelInput" onclick="employeeSearch()">
                                <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterEmp" name="filterEmployees"
                                        onchange="filterEmployee(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value="" disabled>Select Role Category</option>
                                    <option value="None"> None</option>
                                    <option value="HSO"> HSO </option>
                                    <option value="EIR"> EIR </option>
                                    <option value="SSD"> SSD </option>
                                    <option value="Screening"> Screening </option>
                                    <option value="Monitoring"> Monitoring </option>
                                    <option value="Vaccinator"> Vaccinator </option>
                                    <option value="Barangay"> Barangay </option>
                                    <option value="Mayor's Office"> Mayor's Office </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="tablePatient shadow tableScroll4">
                    <table class="table table-row table-hover mayorTable tableMonitoring" id="employeesTable">
                        <thead>
                        <tr class="tableCenterCont">
                            <th data-field="name">Employee Name</th>
                            <th data-field="role">Role</th>
                            <th data-field="account">Account Type</th>
                            <th data-field="action">Action</th>
                        </tr>
                        </thead>
                        <?php
                        include("../includes/database.php");
                        $querySearch = "SELECT employee.employee_id, employee.employee_first_name, employee.employee_middle_name, employee.employee_last_name ,employee.employee_role, employee_account.employee_account_type FROM `employee` JOIN employee_account ON employee.employee_id = employee_account.employee_id";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($querySearch);
                        $stmt->execute();
                        $stmt->bind_result($empID, $empFName, $empMName, $empLName, $empRole, $empAccType);
                        while ($stmt->fetch()) {
                        echo "<tr class='tableCenterCont'>
                                 <td>$empFName $empMName $empLName</td>
                                 <td>$empRole </td>
                                 <td>$empAccType</td>
                                 <td><button class='buttonTransparentMayors' onclick='showEmployeeDeets($empID)'><i class='fas fa-eye'></i></button</td>
                                 </tr>";
                        }
                        ?>
                    </table>

            </div>
            <div id="employeeView" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h3 class="modal-title">Employee Details</h3>
                        <span id="empClose" class="close"><i class='fas fa-window-close'></i></span>
                    </div>
                    <div class="modal-body" id="employeeDeets"></div>
                </div>
            </div>

        </div>
    </div>

    <!--Modal for uploading-->
    <div id="uploadFileModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h4 class="modal-title">Upload files</h4>
                <button type="button" onclick="closeModal('uploadFileModal')" class="close"><i
                            class='fas fa-window-close'></i></button>
            </div>
            <div class="modal-body">
                <div class="row" id="upload-content">
                    <div class="col">
                        <form id="uploadForm">
                            <div class="col-md-12 text-center form-group">
                                <button class="shadow-sm" id="iconBrowse"
                                        onclick="document.getElementById('fileUpload').click()">
                                    <label for="fileUpload">Browse files
                                </button>
                                <br>
                                <input id="fileUpload" type="file" style="display: none"
                                       onchange="getUploadedFiles(this)" multiple/>
                                <h6><br> Upload a list of patients (.csv) </h6>
                            </div>
                        </form>
                    </div>

                    <div class="col">
                        <h6> Uploaded Files </h6>
                        <div id="uploadedFiles">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="uploadFileCancelBtn" class="btn btn-danger"
                        onclick="closeModal('uploadFileModal')">
                    Cancel
                </button>
                <button type="button" id="uploadFileConfirmBtn" class="btn btn-success"
                        name="patientUploadFile" onclick="uploadFiles()">Add
                </button>
            </div>
        </div>
    </div>

    <!--Modal for adding personnel-->
    <div id="addEmployeeModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h4 class="modal-title">Add Employee Account</h4>
                <button type="button" onclick="closeModalForms('addEmployeeModal','addEmployeeForm')" class="close"><i
                            class='fas fa-window-close'></i></button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm" class="addEmployeeForm">
                    <div class="employeeInfo">
                        <h5> Employee Information </h5>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="required" for="lname">Last Name:</label>
                            </div>

                            <div class="col">
                                <input type="text3" id="lname" class='input form-control' name="lname"
                                       placeholder="Input last name">
                            </div>
                        </div>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="required" for="fname">First Name:</label>
                            </div>

                            <div class="col">
                                <input type="text3" id="fname" class='input form-control' name="fname"
                                       placeholder="Input first name">
                            </div>
                        </div>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="labe1" for="mname">Middle Name:</label>
                            </div>

                            <div class="col">
                                <input type="text3" id="mname" class='input form-control' name="mname"
                                       placeholder="Input middle name">
                            </div>
                        </div>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="label1" for="suffix">Suffix: </label><br>
                            </div>

                            <div class="col">
                                <select id="suffix" name="suffix" class="form-select form-select-lg">
                                    <option value="" disabled selected> Select Suffix...</option>
                                    <option value="none">None</option>
                                    <option value="sr">Sr</option>
                                    <option value="jr">Jr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="required" for="contactNum">Contact Number:</label>
                            </div>

                            <div class="col">
                                <input type="text3" id="contactNum" class='input form-control' name="contactNum"
                                       placeholder="09XX-XXX-XXXX" pattern="09[0-9]{9}">
                            </div>
                        </div>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="label1 required" for="type">Account Type: </label><br>
                            </div>

                            <div class="col">
                                <select id="type" name="type" class="form-select form-select-lg">
                                    <option value="" disabled selected> Select account type...</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="label1 required" for="role">Role: </label><br>
                            </div>

                            <div class="col">
                                <select id="role" name="role" class="form-select form-select-lg">
                                    <option value="" disabled selected> Select your Role...</option>
                                    <option value="Barangay">Barangay</option>
                                    <option value="HSO">HSO</option>
                                    <option value="SSD">SSD</option>
                                    <option value="Monitoring">Monitoring</option>
                                    <option value="Screening">Screening</option>
                                    <option value="Vaccinator">Vaccinator</option>
                                    <option value="Mayor's Office">Mayor's Office</option>
                                    <option value="EIR">EIR</option>
                                </select>
                            </div>
                        </div>
                        
                        <br>
                        <div class="row ml-5">
                            <div class="col-4">
                                <label class="label1 required" for="barangay"> Barangay: </label>
                            </div>
                            <div class="col">
                                <select id="barangay" name="barangay" class="form-select form-selet-lg">
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
                    <div class="modal-footer">
                        <input type="button" onclick="closeModalForms('addEmployeeModal','addEmployeeForm')" class="btn btn-danger shadow-sm" value="Cancel">
                        <input type="submit" onclick="event.preventDefault(); confMessage('employee', addEmployee, validation)" class="btn btn-success shadow-sm" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Disabled Modal-->
    <div id="disabledAccountsModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h4 class="modal-title">Disabled Employee Accounts</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal('disabledAccountsModal')">
                    <i class='fas fa-window-close'></i>
                </button>
            </div>
        </div>
    </div>

</body>
</html>

<!-- Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="../javascript/inputValidations.js"></script>

<script>
    function validation() {
        var form = $('#addEmployeeForm');
        form.validate({
                rules: {
                    lname: "required",
                    fname: "required",
                    suffix: "required",
                    type: "required",
                    role: "required",
                    contactNum: "required",
                    barangay: "required"
                }
            });
        return form.valid();
    }

    function showEmployeeDeets(empID) {
        document.getElementById("employeeView").style.display = "block";
        empClose.onclick = function () {
            employeeView.style.display = "none";
        }
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'POST',
            data: {"empDeets": empID},
            success: function (data) {
                document.getElementById('employeeDeets').innerHTML = data;
            }
        })
    }
    

    function showCreds(){
        var content = document.getElementById("creds");
        var pword = prompt("Please enter your password:");
        var realPW = "hudsonPogi";
        if (realPW == pword) {
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    }

    function employeeSearch(){
        var textSearch = document.getElementById("searchPersonnelInput").value;
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("employeesTable").innerHTML = result;
            }
        });
    }

    function addEmployee() {
        var last = $.trim(document.getElementById("lname").value);
        var first = $.trim(document.getElementById("fname").value);
        var middle = $.trim(document.getElementById("mname").value);
        var suffix = $.trim(document.getElementById("suffix").value);
        var brgyId = $.trim(document.getElementById("barangay").value);

        var contact = $.trim(document.getElementById("contactNum").value);
        var type = document.getElementById("type").value;
        var role = document.getElementById("role").value;

        $.ajax({
            url: 'mayorsModuleProcessor',
            type: 'POST',
            data: {
                last: last,
                first: first,
                middle: middle,
                suffix: suffix,
                brgyId: brgyId,
                contact: contact,
                type: type,
                role: role
            },
            success: function(result) {
                reloadEmployee();
                closeModal('addEmployeeModal');
            }
        });
    }

    function reloadEmployee() {
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'GET',
            data: {reload: " "},
            success: function (result) {
                document.getElementById("employeesTable").innerHTML = "";
                document.getElementById("employeesTable").innerHTML = result;
            }
        })
    }

    function confMessage(employee, action, validationMethod) {
        var formValidation = validationMethod();
        if (formValidation) {
            Swal.fire({
                icon: 'info',
                title: 'Are You Sure you Want to add this ' + employee + '?',
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


    function filterEmployee(filterEmp){
        var selectedFilter = filterEmp.value;
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'POST',
            data: {"filter": selectedFilter},
            success: function (result) {
                document.getElementById("employeesTable").innerHTML = result;
            }
        })
    }


</script>

<!--Logout script-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../javascript/logout.js"></script>



