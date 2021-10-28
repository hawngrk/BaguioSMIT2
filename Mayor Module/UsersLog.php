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
            <button type="button" class="btn btn-info signOutPersonnel">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-lg navbarMonitoring">
                <div class="container-fluid">

                 <!--Search Input and Button-->
             <div class="search-containerMonitoring col">
                    <input id="searchPatientVaxPer" type="text" placeholder="Search" class="searchHome" name="searchPatient" onkeyup="searchPatient()">
                    <button type="submit" id="searchPatientBtn" name="searchPatientBtn" onclick="searchPatient()">
                        <i class="fa fa-search"></i>
                    </button>
            </div>
            <div class="col-sm-auto">
                         <button type="button" class="btn btn-outline-dark buttonTop3 float-right">
                            <i class="fas fa-sort-amount-down"></i>
                        </button>
                        <button type="button" class="btn btn-outline-dark buttonTop3 float-right">
                            <i class="fas fa-filter"></i>
                        </button>
            </div>

                </div>
            </nav>
    <table class="table table-row table-hover mayorTable tableMonitoring" id="employeesTable">
                <thead>
                    <tr class="labelRow">
                        <th class="columnName" scope="col">Log Entry Date</th>
                        <th class="columnName" scope="col">Employee ID</th>
                        <th class="columnName" scope="col">Employee Role</th>
                        <th class="columnName" scope="col">Log type</th>
                        <th class="columnName" scope="col">Log Description</th>
                        <th class="columnName" scope="col">Actions</th>
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
                            <td>
                                <button class='buttonTransparentMayors' onclick=''><i class='fas fa-eye'></i></button>
                            </td>
                        </tr>";
                    }
                ?>
                </thead>
    </table>
    </div>
</div>
</body>

</html>
