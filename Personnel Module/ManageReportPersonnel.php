<?php
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SMIT+ | Manage Reports</title>

    <!-- Our Custom CSS -->
<!--    <link href="../css/style.css" rel="stylesheet">-->
    <link href="../css/personnelStyle.css" rel="stylesheet">

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
            <p id="mainmenu">Main Menu</p>
            <li>
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="../Personnel Module/ManageVaccinePersonnel.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="../Personnel Module/ManageVaccinePersonnel.php"><i class="fas fa-users"></i> Manage Patient</a>
            </li>
            <li>
                <a href="../Personnel Module/ViewDeploymentPersonnel.html"><i class="fas fa-truck"></i> View Deployment</a>
            </li>
            <li class="active">
                <a href="../Personnel Module/ManageReportPersonnel.php"><i class="fas fa-sticky-note"></i> Reports</a>
            </li>
            <li>
                <a href="../Personnel Module/aboutPersonnel.html"><i class="fas fa-question"></i> About</a>
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
        <button type="button" class="buttonTop" id="generateReportBtn" onclick="generateReport()">Generate Report
        </button>

        <!--Search Input and Button-->
        <div class="search-container">
            <input type="text" id="searchReport" name="searchReport" placeholder="Search" onkeyup="searchReport()">
            <button type="submit" id="searchReportBtn" name="searchReportBtn" onclick="searchReport()"><i
                        class="fa fa-search"></i></button>
        </div>

        <div>
            <select class="form-select col-lg-12 vaccineType" id="sortReports" name="sortReports"
                    onchange="sortReport(this)">
                <option>Name Asc</option>
                <option>Name Desc</option>
                <option>Date Asc</option>
                <option>Date Desc</option>
            </select>
            <select class="form-select col-lg-12 vaccineType" id="filterReports" name="filterReports"
                    onchange="filterReport(this)">
                <option selected>All</option>
                <option>Unverified</option>
                <option>Verified</option>
                <option>Invalidated</option>
            </select>
        </div>

        <div class="counterColumn">
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
                    echo "<span class='counter'>$unverifiedReports</span>"
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
                    echo "<span class='counter'>$verifiedReports</span>"
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
                    echo "<span class='counter'>$invalidatedReports</span>"
                    ?>
                    <p>Total of Invalidated Reports</p>
                </div>
            </div>
        </div>

        <!--Table Part-->
        <table class="table table-row table-hover tableReport" id="reportsTable">
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

                foreach ($patients as $pat) {
                    if ($patientId == $pat->getPatientId()) {
                        $reporter = $pat->getPatientFullName();
                    }
                }
                echo "<tr>
                <td>$count</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='btn-outline-primary viewReportBtn' type='button' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td></tr>";
            }
            ?>

            <div id="generateReportOptions">

            </div>

            <div id="viewReportModal" class="modal">
                <div class='modal-content container'>
                    <h2 id='headerReviewReport'><span id='viewReportClose' class='close'>&times;</span></h2>
                </div>
            </div>
        </table>
    </div>
</div>


<!-- Additional Scripts-->
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
    function searchReport() {
        var textSearch = document.getElementById("searchReport").value;
        if (textSearch === "") {
            $.ajax({
                url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
                type: 'POST',
                data: {"cancel": textSearch},
                success: function (result) {
                    document.getElementById("reportsTable").innerHTML = result;
                }
            });
        } else {
            $.ajax({
                url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
                type: 'POST',
                data: {"search": textSearch},
                success: function (result) {
                    document.getElementById("reportsTable").innerHTML = result;
                }
            });
        }
    }

    function sortReport(sort) {
        var selectedSort = sort.value;
        $.ajax({
            url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
            type: 'POST',
            data: {"sort": selectedSort},
            success: function (result) {
                document.getElementById("reportsTable").innerHTML = result;
            }
        })
    }

    function filterReport(filter) {
        var selectedFilter = filter.value;
        $.ajax({
            url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
            type: 'POST',
            data: {"filter": selectedFilter},
            success: function (result) {
                document.getElementById("reportsTable").innerHTML = result;
            }
        })
    }

    function generateReport() {
        $.ajax({
            url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
            type: 'POST',
            data: {"generate": 1},
            success: function (result) {
                document.getElementById("reportsTable").innerHTML = result;
            }
        });

        $.ajax({
            url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
            type: 'POST',
            data: {"options": 1},
            success: function (result) {
                document.getElementById("generateReportOptions").innerHTML = result;
            }
        });
    }

    function cancelGenerateReport() {
        $.ajax({
            url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
            type: 'POST',
            data: {"cancel": 1},
            success: function (result) {
                document.getElementById("reportsTable").innerHTML = result;
                document.getElementById("generateReportOptions").innerHTML = "";
            }
        });
    }

    var viewReportModal = document.getElementById("viewReportModal");

    window.onclick = function (event) {
        if (event.target === viewReportModal) {
            viewReportModal.style.display = "none";
        }
    }

    function viewReport(reportId) {
        console.log('ok');
        $.ajax({
            url: '../PersonnelBackEnd/ManageReportPersonnelProcessor.php',
            type: 'POST',
            data: {"report": reportId},
            success: function (result) {
                document.getElementById("viewReportModal").innerHTML = result;
            }
        })
        viewReportModal.style.display = "block";
    }

    function closeViewReport() {
        viewReportModal.style.display = "none";
    }
</script>
</body>
