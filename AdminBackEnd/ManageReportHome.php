<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SMIT+ | Manage Reports</title>

    <!-- Our Custom CSS -->
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
                        <a href="#">Personnel</a>
                    </li>
                    <li>
                        <a href="#">Patients</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-truck"></i> Manage Deployment</a>
            </li>
            <li>
                <a href="ManageReportHome.php" class="active"><i class="fas fa-sticky-note"></i> Reports</a>
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
        <button type="button" class="buttonTop" data-toggle="modal" data-target="#exampleModalLong">
            Generate Report
        </button>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Generate Report</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Search Input and Button-->
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text1" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i>
                </button>
            </form>
        </div>

            <div class = "counterColumn">

                <div class="four counterRow">
                    <div class="counter-box colored">
                        <?php
                        $query = "SELECT COUNT(*) FROM report ";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($totalReports);
                        $stmt->fetch();
                        echo "<span class='counter'> $totalReports </span>"
                        ?>
                        <p>Total Reports</p>
                    </div>
                </div>


                <div class="four counterRow">
                    <div class="counter-box">
                        <?php
                        $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Unverified'";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($unverifiedReports);
                        $stmt->fetch();
                        echo"<span class='counter'>$unverifiedReports</span>"
                        ?>
                        <p>Total of Unverified Reports</p>
                    </div>
                </div>


                <div class="four counterRow">
                    <div class="counter-box">
                        <?php
                        $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Verified'";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($verifiedReports);
                        $stmt->fetch();
                        echo"<span class='counter'>$verifiedReports</span>"
                        ?>
                        <p>Total of Verified Reports</p>
                    </div>
                </div>


                <div class="four counterRow">
                    <div class="counter-box">
                        <?php
                        $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Invalidated'";

                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($invalidatedReports);
                        $stmt->fetch();
                        echo"<span class='counter'>$invalidatedReports</span>"
                        ?>
                        <p>Total of Invalidated Reports</p>
                    </div>
                </div>
            </div>

        <!--Table Part-->
        <table class="table table-row table-hover tableReport">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Report ID</th>
                <th scope="col">Name of Reporter</th>
                <th scope="col">Date Reported</th>
                <th scope="col">Report Verified</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <?php
            require_once '../require/getReport.php';
            require_once '../require/getPatient.php';

            $count = 0;
            foreach ($reports as $rep) {
                $count++;
                $reportId = $rep->getReportId(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
                $patientId = $rep->getReportPatientId();
                $dateReported = $rep->getDateReported();
                $status = $rep->getReportStatus();

                foreach($patients as $pat){
                    if($patientId == $pat->getPatientId()){
                        $reporter = $pat->getPatientFullName();
                    }
                }
                echo "<tr>
                <td>$count</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button id='reviewReportBtn' type='submit' value='$reporter'>Review Report</button></td>
</tr>";
            }
            ?>

            <div id="myModal" class="modal">
                <div class="modal-content container">
                   <h2 id='headerAddNewVaccine'>Review Report <span id='close' class='close'>&times;</span></h2>

                    <div class="AddNewVaccine-PopUp">
                        <h4 class="addNewVaccineH3">Vaccine Details</h4>
                        <input class="vaccineName col-lg-12" type="input" name="vaccineName" placeholder="Vaccine Name">
                        <input class="vaccineManufacturer col-lg-12" type="input" name="vaccineManufacturer" placeholder="Vaccine Manufacturer">
                        <input class="vaccineDescription col-lg-12" type="input" name="vaccineDescription" placeholder="Vaccine Description">
                        <h4 class="addNewVaccineH3">Vaccine Characteristics</h4>
                        <!-- <input class="col-xs-12" type="input" name="vaccineType" placeholder="Vaccine Type"> -->
                        <select class="form-select col-lg-12 vaccineType">
                            <option selected disabled>Vaccine Type</option>
                            <option value="1">Inactivated Vaccine</option>
                            <option value="2">Live-attenuated Vaccine</option>
                            <option value="3">Viral vector Vaccine</option>
                        </select>


                        <select class="form-select col-lg-12 vaccineEfficacy">
                            <option selected disabled>Vaccine Efficacy</option>
                            <option value="1">90%</option>
                            <option value="1">70%</option>
                            <option value="1">50%</option>
                        </select>

                        <input class="col-lg-12 dosageRequired" type="input" name="vaccineType" placeholder="Dosage Required">
                        <input class="col-lg-12 dosageInterval" type="input" name="vaccineType" placeholder="Dosage Interval">

                        <h4 class="addNewVaccineH3"> Storage and Handling</h4>
                        <input class="col-lg-12 minimumTemperature" type="input" name="vaccineEfficacy" placeholder="Minimum Temperature">
                        <input class="col-lg-12 maximumTemperature" type="input" name="vaccineType" placeholder="Maximum Temperature">
                        <input class="col-lg-12 lifeSpan" type="input" name="vaccineType" placeholder="Life Span">
                    </div>
                    <div>
                        <button id="cancelBtn"> Cancel </button>
                        <button id="addBtn"> Add</button>
                    </div>
                </div>
            </div>
        </table>
    </div>


    <!-- Additional Scripts-->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script>
        var modal = document.getElementById("myModal");
        var reviewReport = document.getElementById("reviewReportBtn");
        var span = document.getElementById("close");
        var cancel = document.getElementById("cancel");
        var save = document.getElementById("save");

        reviewReport.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        cancel.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        save.onclick = function() {
            alert("changes has been saved!");
        }
    </script>

</body>


