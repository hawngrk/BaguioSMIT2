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

    <title>Mayor's Office | Users Log
    </title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                <p id="time"></p>  <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
            </div>
            <hr>
            <li  class="active">
                <a href="UsersLog.php"><i class="fas fa-warehouse"></i> Users Log</a>
            </li>
            <li>
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
        <div class="tableContainer">
            <div class="table-tile">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchUserLog" type="search" class="form-control" placeholder="Search"
                                   onkeyup="searchUsers()"/>
                            <button type="submit" class="buttonTop5" onclick="searchUsers()"><i
                                        class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterEmp" name="filterEmployees"
                                        onchange="filterUsers(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value="" disabled>Select Role Category</option>
                                    <option value="None"> None</option>
                                    <option value="HSO"> HSO</option>
                                    <option value="EIR"> EIR</option>
                                    <option value="SSD"> SSD</option>
                                    <option value="Screening"> Screening</option>
                                    <option value="Monitoring"> Monitoring</option>
                                    <option value="Vaccinator"> Vaccinator</option>
                                    <option value="Barangay"> Barangay</option>
                                    <option value="Mayor's"> Mayor's Office</option>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortPatientName" name="sortPatient"
                                        onchange="sortByLog(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option value="" disabled>Select Category Group</option>
                                    <option value="Asc">Date and Time Asc</option>
                                    <option value="Desc">Date and Time Desc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tablePatient shadow tableScroll2">
                <table class="table table-row table-hover mayorTable tableMonitoring" id="employeesTable">
                    <thead>
                    <tr class="tableCenterCont">
                        <th>Log Entry Date</th>
                        <th>Employee ID</th>
                        <th>Employee Role</th>
                        <th>Log type</th>
                        <th>Log Description</th>
                    </tr>

                    <?php
                    require_once '../require/getActivityLogs.php';

                    foreach ($activityLogs as $al) {
                        $date = $al->getLogEntryDate();
                        $ID = $al->getEmployeeId();
                        $role = $al->getEmployeeRole();
                        $type = $al->getLogType();
                        $description = $al->getLogDescription();

                        echo "<tr class='table-row tableCenterCont'>
                                <td>$date</td>
                                <td>$ID</td>
                                <td>$role</td>
                                <td>$type</td>
                                <td>$description</td>
                              </tr>";
                    }
                    ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
    function searchUsers() {
        var textSearch = document.getElementById("searchUserLog").value;
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'POST',
            data: {"searchLog": textSearch},
            success: function (result) {
                document.getElementById("employeesTable").innerHTML = result;
            }
        });
    }

    function filterUsers(filterUser) {
        var selectedFilter = filterUser.value;
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'POST',
            data: {"filterUser": selectedFilter},
            success: function (result) {
                document.getElementById("employeesTable").innerHTML = result;
            }
        })
    }

    function sortByLog(sortLog){
        var selectedSort = sortLog.value;
        $.ajax({
            url: 'mayorsModuleProcessor.php',
            type: 'POST',
            data: {"sort": selectedSort},
            success: function (result) {
                document.getElementById("employeesTable").innerHTML = result;
            }
        })
    }
</script>
<!--Logout script-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../javascript/logout.js"></script>