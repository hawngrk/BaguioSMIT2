<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+ | Manage Patients</title>

    <!-- Our Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet">

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
                <img style="width:150px;" src="../../img/SMIT+.png" alt="Baguio Logo">
            </div>
        </div>

        <ul class="list-unstyled components">
            <p id="mainmenu">Main Menu</p>
            <li>
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="../ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="#ManageUsersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Manage Users</a>
                <ul class="collapse list-unstyled" id="ManageUsersSubmenu">
                    <li>
                        <a href="ManagePersonnelHome.php">Personnel</a>
                    </li>
                    <li>
                        <a href="ManagePatientHome.php" class="active">Patients</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-truck"></i> Manage Deployment</a>
            </li>
            <li>
                <a href="../ManageReportHome.php"><i class="fas fa-sticky-note"></i> Reports</a>
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

        <!--Button for Adding Patient Details-->
        <button id="addVaccine" type="button" class="buttonTop">Add User</button>

        <!--Modal for Adding patient -->
        <div id="modal2" class="modal">
            <div class="modal-content container">
                <!-- <span id="exit1" class="close">&times;</span> -->
                <h3>Add User | Patient<span id="close2" class="close">&times;</span></h3>
                <div class="addUser-PopUp">
                    <h4> Basic Information</h4>
                    <input class="col-xs-12" type="input" name="lastName" placeholder="Last Name">
                    <input class="col-xs-12" type="input" name="firstName" placeholder="First Name">
                    <input class="col-xs-12" type="input" name="middleName" placeholder="Middle Name">
                    <label for="suffix"> Suffix Name </label>
                    <select class="formControl" id="suffix">
                        <option> Sr </option>
                        <option> Jr </option>
                        <option> I </option>
                        <option> II </option>
                        <option> III </option>
                    </select>

                    <label for="category"> Category </label>
                    <select class="formControl" id="category">
                        <option> A1 </option>
                        <option> A2 </option>
                        <option> A3 </option>
                        <option> A4 </option>
                        <option> A5 </option>
                    </select>

                    <h4> Address </h4>
                    <input class="col-xs-12" type="input" name="street" placeholder="Street Name">
                    <input class="col-xs-12" type="input" name="city" placeholder="City/Town">
                    <input class="col-xs-12" type="input" name="state" placeholder="State/Province">
                    <input class="col-xs-12" type="input" name="zip" placeholder="Postal/Zip Code">

                    <label for="date"> Birthdate </label>
                    <input type="date" id="date" name="date">

                    <label for="gender"> Gender </label>
                    <select class="formControl" id="gender">
                        <option> Male </option>
                        <option> Female </option>
                    </select>

                    <input class="col-xs-12" type="input" name="contactNum" placeholder="Contact Number">
                    <input class="col-xs-12" type="input" name="occupation" placeholder="Occupation">

                </div>
                <button id="next"> Next </button>
            </div>
        </div>

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
            require_once '../../require/getPatientDetails.php';

            $count = 0;
            foreach ($patient_details as $pd) {
                $count++;
                $id = $pd->getPatientDeetPatId();
                $compAdd = $pd->getHouseAdd(). ", ".$pd->getBrgy(). ", ".$pd->getCity(). ", ".$pd->getProvince();
                $contact = $pd->getContact();

                if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null){
                    $name = $pd->getPatientLName(). ", ".$pd->getPatientFName();
                } else if($pd->getPatientSuffix() == null) {
                    $name = $pd->getPatientLName().", ".$pd->getPatientFName(). " ". $pd->getPatientMName();
                } else if($pd->getPatientMName() == null){
                    $name = $pd->getPatientLName().", ".$pd->getPatientFName(). " ". $pd->getPatientSuffix();
                } else{
                    $name = $pd->getPatientLName().", ".$pd->getPatientFName(). " ". $pd->getPatientMName(). " ". $pd->getPatientSuffix();
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
        // Add Vaccine
        var addVaccineModal = document.getElementById("vaccineModal");
        var addVaccineBtn = document.getElementById("addVaccineBtn");
        var addVaccineClose = document.getElementById("addVaccineClose");
        var cancelAddVaccine = document.getElementById("cancelBtnVaccine");

        addVaccineBtn.onclick = function () {
            addVaccineModal.style.display = "block";
        }

        addVaccineClose.onclick = function () {
            addVaccineModal.style.display = "none";
        }

        cancelAddVaccine.onclick = function () {
            addVaccineModal.style.display = "none";
        }

        // Add New Vaccine
        var newVaccineModal = document.getElementById("newVaccineModal");
        var addNewVaccineBtn = document.getElementById("addNewVaccineBtn");
        var newVaccineClose = document.getElementById("newVaccineClose");
        var cancelNewVaccine = document.getElementById("cancelBtnNewVaccine");

        addNewVaccineBtn.onclick = function () {
            newVaccineModal.style.display = "block";
        }

        newVaccineClose.onclick = function () {
            newVaccineModal.style.display = "none";
        }

        cancelNewVaccine.onclick = function () {
            newVaccineModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == newVaccineModal) {
                newVaccineModal.style.display = "none";
            }
        }
        $(document).ready(function () {
            $('#selectedVaccine').change(function () {
                var option = $(this).find('option:selected');
                var vac = option.text();

                $.ajax({
                    url: 'ManageVaccineInputProcessor.php',
                    type: 'POST',
                    data: {"vaccine": vac},
                    success: function (result) {
                        document.getElementById("selectedVaccineInfo").innerHTML = result;
                    }
                })
            })
        });
        $(document).ready(function () {
            $('#batchNo').on('keyup change click', function () {
                var batch = $('#batchNo').val();
                $.ajax({
                    url: 'ManageVaccineInputProcessor.php',
                    type: 'POST',
                    data: {"batch": batch},
                    success: function (result) {
                        document.getElementById("vaccineBatch").innerHTML = result;
                    }
                })
            })
        });
    </script>

    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
</body>
