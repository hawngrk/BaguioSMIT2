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
                                    <option value="Mayor"> Mayor's Office </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tableContainer">
                <div class="tablePatient shadow tableScroll2">
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
            </div>
            <div id="employeeView" class="modal-window">
                <div class="content-modal">
                    <div class="modal-header">
                        <h3 class="modal-title">Employee Details</h3>
                        <span id="empClose" class="close">&times;</span>
                    </div>
                    <div class="modal-body" id="employeeDeets"></div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>

<!--<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>-->

<script>
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

    // $(document).on("change",'#filterEmp',function () {
    //     var filterAlgorithm = $(this).val()
    //     $('#table').bootstrapTable('filterBy',{role: filterAlgorithm})
    // })


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
<script src="../javascript/logout.js"></script>



