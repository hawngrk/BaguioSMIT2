<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Title-->
    <title>SMIT+ | Manage Personnel</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS-->
    <!-- <link href="../../css/cssAdmin.css" rel="stylesheet"> -->
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
                    <li class="active">
                        <a href="ManagePersonnelHome.php" class="active">Personnel</a>
                    </li>
                    <li>
                        <a href="ManagePatientHome.php">Patients</a>
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

        <!--Button for Uploading File-->
        <!--To include uploading files limited to csv file only-->
        <button id="uploadFileBtn" type="button" class="buttonTop" data-toggle="modal" data-target="#upload-File">
            Upload File
        </button>

        <!--Modal for uploading personnel-->
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
                                <p><br>Upload a list of patients (.csv) </p>
                                <!--<p>Upload a list of patients (.csv) <br></p>
                                <input type="file" class="form-control" id="fileUpload" multiple/>
                                <button id="browse" type="button" class="'button4 btn-primary"> Browse </button> -->
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
                    <button id="uploadFileConfirmBtn" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>

        <!--Button for Adding Personnel Details-->
        <button id="addPersonnelBtn" type="button" class="buttonTop">Add User</button>

        <!--Modal for adding personnel-->
        <form id='addPersonnelForm' method="post" enctype="multipart/form-data">
            <div id="personnelModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h4 class="modal-title">Add USER-Personnel</h4>
                        <button type="button" id="addPersonnelClose" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Basic Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="lName">Last Name</label>
                                <input type="text3" class="form-control basicInfoSizes" id="lName" name="lName"
                                       placeholder="Enter Last Name">
                                <label class="infoPosition" for="fName">First Name</label>
                                <input type="text3" class="form-control basicInfoSizes" id="fName" name="fName"
                                       placeholder="Enter First Name">
                                <label class="infoPosition" for="mName">Middle Name</label>
                                <input type="text3" class="form-control basicInfoSizes" id="mName" name="mName"
                                       placeholder="Enter Middle Name">
                            </div>
                            <div class="col-md-6">
                                <label for="suffix">Suffix</label>
                                <select id="suffix" name="suffix">
                                    <option value="">None</option>
                                    <option>Sr</option>
                                    <option>Jr</option>
                                    <option>I</option>
                                    <option>II</option>
                                    <option>III</option>
                                </select>
                                <label class="infoPosition" for="role">Role</label>
                                <select id="role" name="role">
                                    <option disabled selected>Select Role...</option>
                                    <option>City Hall Employee</option>
                                    <option>Vaccination Personnel</option>
                                </select>
                                <label class="infoPosition" for="contactNum">Contact Number</label>
                                <input type="text3" class="form-control basicInfoSizes" id="contactNum"
                                       name="contactNum" placeholder="+63XXXXXXXXX" pattern="+63[0-9]{10}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="addPersonnelCancelBtn" class="btn btn-secondary"
                                    data-dismiss="modal">Cancel
                            </button>
                            <button type="button" id="addPersonnelConfirmBtn" class="btn btn-primary">Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal for Personnel Credentials-->
            <div id="credentialsModal" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <span id="credentialsClose" class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <h5> Here are the personnel credentials. </h5>
                        <label class="cred" for="username"> Username</label>
                        <input type="text" id="username" name="username" disabled="disabled">

                        <label class="cred" for="password">Password</label>
                        <input class="passwordPos" type="text" id="password" name="password" disabled="disabled">
                    </div>

                    <div class="modal-footer">
                        <button type='button' id="addPersonnelPrevBtn" class="btn btn-outline-secondary mr-auto">
                            Previous
                        </button>
                        <button type="submit" id="addPersonnelSaveBtn" name="addPersonnelSaveBtn"
                                form="addPersonnelForm" class="btn btn-success"> Save
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!--Notification modal-->
        <div id="notifyModal" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <span id="notificationClose" class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <img src="../../img/checkmark.png" alt="confirm" id="confirm">
                    <p>
                    <center> User Personnel successfully added.</center>
                    </p>
                </div>
                <div class="modal-footer">
                    <button id='notificationDoneBtn' class="btn btn-primary">Done</button>
                    <!--instead of close change to Done-->
                </div>
            </div>
        </div>

        <!--Search-->
        <div class="search-container">
            <input type="text" placeholder="Search" id="searchPersonnel" name="searchPersonnel" onkeyup="searchPersonnel()">
            <button type="submit" id="searchPersonnelBtn" name="searchPersonnelBtn" onclick="searchPersonnel()"><i class="fa fa-search"></i></button>
        </div>
        <table class="table table-row table-hover" id="personnelTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Personnel ID</th>
                <th scope="col">Personnel Name</th>
                <th scope="col">Position/Role</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <?php
            require_once '../require/getEmployee.php';

            $count = 0;
            foreach ($employees as $emp) {
                $count++;
                $id = $emp->getEmployeeId();
                $role = $emp->getEmployeeRole();
                $contact = $emp->getEmployeeContact();

                if ($emp->getEmployeeMiddleName() == null && $emp->getEmployeeSuffix() == null) {
                    $name = $emp->getEmployeeLastName() . ", " . $emp->getEmployeeFirstName();
                } else if ($emp->getEmployeeSuffix() == null) {
                    $name = $emp->getEmployeeLastName() . ", " . $emp->getEmployeeFirstName() . " " . $emp->getEmployeeMiddleName();
                } else if ($emp->getEmployeeMiddleName() == null) {
                    $name = $emp->getEmployeeLastName() . ", " . $emp->getEmployeeFirstName() . " " . $emp->getEmployeeSuffix();
                } else {
                    $name = $emp->getEmployeeLastName() . ", " . $emp->getEmployeeFirstName() . " " . $emp->getEmployeeMiddleName() . " " . $emp->getEmployeeSuffix();
                }

                echo "<tr>
                <td>$count</td>
                <td>$id</td>
                <td>$name</td>
                <td>$role</td>
                <td>$contact</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php
if (isset($_POST['addPersonnelSaveBtn'])) {
    include '../includes/database.php';
    $lastName = $_POST['lName'];
    $firstName = $_POST['fName'];
    $middleName = $_POST['mName'];
    $suffix = $_POST['suffix'];
    $role = $_POST['role'];
    $contactNumber = $_POST['contactNum'];

    $employeeTableQuery = "INSERT INTO employee (employee_first_name, employee_last_name, employee_middle_name, employee_suffix, employee_role, employee_contact_number)  VALUE ('$lastName', '$firstName', '$middleName', '$suffix', '$role', '$contactNumber');";
    $database->query($employeeTableQuery);

    $username = str_replace(' ', '', $firstName);
    $password = str_replace(' ', '', $lastName);

    $getEmployeeIdQuery = "SELECT employee_id FROM employee ORDER BY employee_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getEmployeeIdQuery);
    $dbase->execute();
    $dbase->bind_result($employeeid);
    $dbase->fetch();
    $dbase->close();

    $employee_accountTableQuery = "INSERT INTO employee_account (employee_id, employee_username, employee_password, employee_account_type) VALUE ('$employeeid', '$username', '$password', 'Client');";
    $database->query($employee_accountTableQuery);
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
    //Sidebar
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

    //Add Personnel
    var addPersonnelBtn = document.getElementById("addPersonnelBtn");
    var personnelModal = document.getElementById("personnelModal");
    var addPersonnelClose = document.getElementById("addPersonnelClose");
    var addPersonnelCancelBtn = document.getElementById("addPersonnelCancelBtn");
    var addPersonnelConfirmBtn = document.getElementById("addPersonnelConfirmBtn");

    addPersonnelBtn.onclick = function () {
        personnelModal.style.display = "block";
    }

    addPersonnelClose.onclick = function () {
        personnelModal.style.display = "none";
    }

    addPersonnelCancelBtn.onclick = function () {
        personnelModal.style.display = "none";
    }

    addPersonnelConfirmBtn.onclick = function () {
        personnelModal.style.display = "none";
        credentialsModal.style.display = "block";
    }

    //Credentials
    var credentialsModal = document.getElementById("credentialsModal");
    var credentialsClose = document.getElementById("credentialsClose");
    var addPersonnelPrevBtn = document.getElementById("addPersonnelPrevBtn")
    var addPersonnelSaveBtn = document.getElementById("addPersonnelSaveBtn");

    credentialsClose.onclick = function () {
        credentialsModal.style.display = "none";
    }

    addPersonnelPrevBtn.onclick = function () {
        credentialsModal.style.display = "none";
        personnelModal.style.display = "block";
    }

    addPersonnelSaveBtn.onclick = function () {
        credentialsModal.style.display = "none";
        notifyModal.style.display = "block";
    }

    //Notification
    var notifyModal = document.getElementById("notifyModal");
    var notificationClose = document.getElementById("notificationClose");
    var notificationDoneBtn = document.getElementById("notificationDoneBtn");

    notificationClose.onclick = function () {
        notifyModal.style.display = "none";
    }

    notificationDoneBtn.onclick = function () {
        notifyModal.style.display = "none";
    }

    //Upload
    var uploadFileBtn = document.getElementById("uploadFileBtn");
    var uploadFileModal = document.getElementById("uploadFileModal");
    var uploadFileClose = document.getElementById("uploadFileClose");
    var uploadFileCancelBtn = document.getElementById("uploadFileCancelBtn");
    var uploadFileConfirmBtn = document.getElementById("uploadFileConfirmBtn");

    uploadFileBtn.onclick = function () {
        uploadFileModal.style.display = "block";
    }

    uploadFileClose.onclick = function () {
        uploadFileModal.style.display = "none";
    }

    uploadFileCancelBtn.onclick = function () {
        uploadFileModal.style.display = "none";
    }

    uploadFileConfirmBtn.onclick = function () {
        uploadFileModal.style.display = "none";
    }

    function searchPersonnel() {
        var textSearch = document.getElementById("searchPersonnel").value;
        $.ajax({
            url: 'ManagePersonnelProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("personnelTable").innerHTML = result;
            }
        });
    }
</script>
</body>