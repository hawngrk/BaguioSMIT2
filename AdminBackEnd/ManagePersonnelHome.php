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
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

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
            <li>
                <a href="#ManageUsersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Manage Users</a>
                <ul class="collapse list-unstyled" id="ManageUsersSubmenu">
                    <li>
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

        <!--Button for Uploading File-->
        <!--To include uploading files limited to csv file only-->
        <button id="uploadFile" type="button" class="buttonTop" data-toggle="modal" data-target="#upload-File">
            Upload File
        </button>

        <!--Modal for adding personnel-->
        <div id="uploadFileModal" class="modal">
            <div class="modal-content">
                <span id="close" class="close">&times;</span>
                <div id="uploadingFile">
                    <h3> Upload File/s </h3>
                    <p>Upload a list of patients (.csv) <br> or </p>
                    <input type="file" class="form-control" id="fileUpload" multiple/>
                    <button id="browse" type="button" class="'button4 btn-primary"> Browse </button>
                </div>

                <div id="listFile">
                    <!--temporary uploading-->
                    <h6> Uploaded Files </h6>
                    <p> prereg_09-19-2021_validates.csv</p>
                    <p> prereg_09-21-2021_validates.csv</p>
                </div>

            </div>

        </div>

        <!--Button for Adding Personnel Details-->
        <button id="addUserBtn" type="button" class="buttonTop">
            Add User
        </button>

        <!--Modal for adding personnel-->
        <div id="personnelModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add USER-Personnel</h4>
                    <button type="button" id="close1" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="AddNewVaccine-PopUp">
                        <h5> Basic Information</h5>
                        <div class="row">
                            <div class="col-sm">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" class='input' name="lastname" placeholder="Input Last Name"><br>

                                <label for="fname">First Name</label><br>
                                <input type="text" id="fname" class='input' name="firstname" placeholder="Input First Name"><br>

                                <label for="mname">Middle Name</label><br>
                                <input type="text" id="mname" class='input' name="middlename" placeholder="Input Middle Name">

                                <label for="suffix">Suffix</label><br>
                                <select id="suffix" name="suffix">
                                    <option value="">None</option>
                                    <option value="sr"> Sr </option>
                                    <option> Jr </option>
                                    <option> I </option>
                                    <option> II </option>
                                    <option> III </option>
                                </select>

                            </div>
                            <div class="col-sm">
                                <label for="role">Role</label><br>
                                <select id="role" name="suffix">
                                    <option value="" disabled selected hidden>Select a Role...</option>
                                    <option> City Hall Employee </option>
                                    <option> Vaccination Personnel </option>
                                </select>
                                <label for="contactNumber"> Contact Number </label>
                                <input type="text" class="formControl" id="contactNumber" name="contactNumber" placeholder="+639">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" id="next" class="btn btn-primary" data-dismiss="modal">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal for personnel credentials-->
            <div id="addButtonModal" class="modal">
                <div class="modal-content">
                    <span id="close2" class="close">&times;</span>
                    <h5> Here are the patients credentials. </h5>
                    <input class="col-xs-12" type="input" name="username" placeholder="Username" disabled>
                    <input class="col-xs-12" type="input" name="password" placeholder="Password" disabled>
                    <button id='save'> Save </button>
                </div>

            </div>

            <!--Modal for successful notification-->
            <div id="notifyModal" class="modal">
                <div class="modal-content">
                    <span id="close3" class="close">&times;</span>
                    <br>
                    <img src="../img/checkmark.png">
                    <p>
                    <center> User Personnel successfully added. </center>
                    </p>
                    <button id='exit'> Close </button>
                </div>
                <!--instead of close change to Done-->

            </div>

        </div>

        <!--Search-->
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <table class="table table-row table-hover">
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

                if ($emp->getEmployeeMiddleName() == null && $emp->getEmployeeSuffix() == null){
                    $name = $emp->getEmployeeLastName(). ", ".$emp->getEmployeeFirstName();
                } else if($emp->getEmployeeSuffix() == null) {
                    $name = $emp->getEmployeeLastName(). ", ".$emp->getEmployeeFirstName(). " ". $emp->getEmployeeMiddleName();
                } else if($emp->getEmployeeMiddleName() == null){
                    $name = $emp->getEmployeeLastName(). ", ".$emp->getEmployeeFirstName(). " ". $emp->getEmployeeSuffix();
                } else{
                    $name = $emp->getEmployeeLastName(). ", ".$emp->getEmployeeFirstName(). " ". $emp->getEmployeeMiddleName(). " ". $emp->getEmployeeSuffix();
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
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<script>
    //modals
    var modal = document.getElementById("personnelModal");
    var addModal = document.getElementById("addButtonModal");
    var notifyModal = document.getElementById("notifyModal");
    var uploadFileModal = document.getElementById("uploadFileModal")

    //buttons
    var addUserBtn = document.getElementById("addUserBtn");
    var uploadFileBtn = document.getElementById("uploadFile")

    //cancel
    var span = document.getElementById("close");
    var span1 = document.getElementById("close1");
    var span2 = document.getElementById("close2");
    var span3 = document.getElementById("close3");
    var cancel = document.getElementById("cancel");

    var exit = document.getElementById('exit')
    var next = document.getElementById("next");
    var save = document.getElementById("save");


    //upload file button
    uploadFileBtn.onclick = function() {
        uploadFileModal.style.display = "block";
    }
    // add button for Add User
    addUserBtn.onclick = function() {
        modal.style.display = "block";
    }

    // add button after input of personnel basic info
    next.onclick = function() {
        modal.style.display = "none";
        addModal.style.display = "block";
    }

    save.onclick = function() {
        modal.style.display = "none";
        addModal.style.display = "none";
        notifyModal.style.display = "block";
    }

    span.onclick = function() {
        uploadFileModal.style.display = "none";
    }

    span1.onclick = function() {
        modal.style.display = "none";
    }

    span2.onclick = function() {
        modal.style.display = "none";
        addModal.style.display = "none";
    }

    span3.onclick = function() {
        modal.style.display = "none";
        addModal.style.display = "none";
        notifyModal.style.display = "none";
    }

    exit.onclick = function() {
        modal.style.display = "none";
        addModal.style.display = "none";
        notifyModal.style.display = "none";
    }

    cancel.onclick = function() {
        modal.style.display = "none";
        addModal.style.display = "none";
        notifyModal.style.display = "none"
    }

    window.onclick = function(event) {
        if (event.target == modal || event.target == addModal || event.target == notifyModal || event.target == uploadFileModal) {
            modal.style.display = "none";
            addModal.style.display = "none";
            uploadFileModal.style.display = "none";
            notifyModal.style.display = "none";
        }
    }
</script>
</body>