<?php

//include ("../AdminbackEnd/sessionHandling.php");
include_once("../includes/database.php") ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SMIT+ | Manage Reports</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
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

    <script defer src="../javascript/showDateAndTime.js"> </script>

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
            <h4 id="headingNav1"> Health Service Office </h4>
            <hr>
            <h5 id="headingNav2"> September 17, 2021 | 01:24 PM</h5>
            <hr>

            <li>
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
            </li>
            <li>
                <a href="ManagePatientHome.php"><i class="fas fa-user-circle"></i> Manage Patients</a>
            </li>
            <li>
                <a href="ManageDeployment.php"><i class="fas fa-truck"></i> Manage Deployment</a>
            </li>
            <li class="active">
                <a href="ManageReportHome.php" class="active"><i class="fas fa-sticky-note"></i> Reports</a>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light upperBoxOG">
            <div class="container-fluid upperBox">

                <button class="btnTop ">
                    <i class="fas fa-bell"></i>
                </button>

                <button class="btnTop btnBell ">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </nav>

        <!-- Page Content  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col my-auto">
                    <div class="search-container">
                        <input type="text" class="searchReport" id="searchReportHSO" name="searchReport" placeholder="Search" onkeyup="searchReport()">
                        <!--                    <button type="submit" id="searchReportBtn" name="searchReportBtn" onclick="searchReport()"><i-->
                        <!--                                class="fa fa-search"></i></button>-->
                    </div>
                </div>
                <div class="col-sm-auto">
                    <button type="button" class="buttonTop3" id="generateReportBtn" onclick="generateReport()"><i class="fas fa-print"></i> Generate Report</button>
                    <button type="button" class="buttonTop3" id="invalidatedReportBtn" onclick="showInvalidatedReports()"><i class="fas fa-list-alt"></i> Invalidated Reports</button>
                </div>


                <!--Search Input and Button-->
            </div>
            <div class="sfDiv row">
                <div class="col-md-1.5">
                    <div class="sfDiv col-sm-auto">
                        <select class="form-select sortButton" id="sortReports" name="sortReports"
                                onchange="sortReport(this)">
                            <option value="" selected disabled hidden>Sort By</option>
                            <option>Name Asc</option>
                            <option>Name Desc</option>
                            <option>Date Asc</option>
                            <option>Date Desc</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1.5">
                    <select class="form-select filterButton" id="filterReports" name="filterReports"
                            onchange="filterReport(this)">
                        <option value="" selected disabled hidden>Filter By</option>
                        <option>All</option>
                        <option>Unverified</option>
                        <option>Verified</option>
                        <option>Invalidated</option>
                    </select>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="tableScroll1 col">
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
                <td><button class='badge badge-secondary' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td></tr>";
                    }
                    ?>



                    <div id="invalidatedReportsModal" class="modal-window"></div>
                    <div id="generateReportModal" class="modal-window"></div>
                    <div id="viewReportModal" class="modal-window"></div>

                </table>
            </div>
            <div class="col-sm-auto">
                <div class="counterColumn">
                    <div class="four counterRow">
                        <div class="counter-box colored1">
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
                        <div class="counter-box colored2">
                            <?php
                            $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Pending'";
                            $stmt = $database->stmt_init();
                            $stmt->prepare($query);
                            $stmt->execute();
                            $stmt->bind_result($unverifiedReports);
                            $stmt->fetch();
                            echo "<span class='counter'>$unverifiedReports</span>"
                            ?>
                            <p>Total of Pending Reports</p>
                        </div>
                    </div>

                    <div class="four counterRow">
                        <div class="counter-box colored3">
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
                        <div class="counter-box colored4">
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
            </div>
        </div>


        <!--Table Part-->

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
        var textSearch = document.getElementById("searchReportHSO").value;
        if (textSearch === "") {
            $.ajax({
                url: 'ManageReportViewProcessor.php',
                type: 'POST',
                data: {"search": textSearch},
                success: function (result) {
                    document.getElementById("reportsTable").innerHTML = result;
                }
            });
        } else {
            $.ajax({
                url: 'ManageReportViewProcessor.php',
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
            url: 'ManageReportViewProcessor.php',
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
            url: 'ManageReportViewProcessor.php',
            type: 'POST',
            data: {"filter": selectedFilter},
            success: function (result) {
                document.getElementById("reportsTable").innerHTML = result;
            }
        })
    }

    var invalidatedReportsModal = document.getElementById("invalidatedReportsModal");

    function showInvalidatedReports() {
        $.ajax({
            url: 'manageReportViewProcessor.php',
            type: 'POST',
            data: {"invalidated": 1},
            success: function (result) {
                document.getElementById("invalidatedReportsModal").innerHTML = result;
                invalidatedReportsModal.style.display = "block";
            }
        });
    }


    function viewInvalidatedReport(reportId) {
        $.ajax({
            url: 'manageReportViewProcessor.php',
            type: 'POST',
            data: {"report": reportId, "view": 1},
            success: function (result) {
                document.getElementById("invalidatedReportsModal").innerHTML = result;
                invalidatedReportsModal.style.display = "block";
            }
        });
    }

    function editInvalidatedReport(reportId) {
        $.ajax({
            url: 'manageReportViewProcessor.php',
            type: 'POST',
            data: {"report": reportId, "view": 2},
            success: function (result) {
                document.getElementById("invalidatedReportsModal").innerHTML = result;
                invalidatedReportsModal.style.display = "block";
            }
        });
    }

    function closeInvalidatedReports() {
        invalidatedReportsModal.style.display = "none";
    }

    var viewReportModal = document.getElementById("viewReportModal");

    function viewReport(reportId) {
        $.ajax({
            url: 'manageReportViewProcessor.php',
            type: 'POST',
            data: {"report": reportId, "view": 1},
            success: function (result) {
                document.getElementById("viewReportModal").innerHTML = result;
                viewReportModal.style.display = "block";
            }
        });
    }

    function editReport(reportId) {
        $.ajax({
            url: 'manageReportViewProcessor.php',
            type: 'POST',
            data: {"report": reportId, "view": 2},
            success: function (result) {
                document.getElementById("viewReportModal").innerHTML = result;
                viewReportModal.style.display = "block";
            }
        });
    }

    function closeViewReport(status) {
        if (status === 'Invalidated') {
            invalidatedReportsModal.style.display = "none";
        } else {
            viewReportModal.style.display = "none";
        }
    }

    function changeRepStatus(reportid, status) {
        var selectedStatus = document.getElementById('statusSelection').value;
        if (selectedStatus !== status) {
            $.ajax({
                url: 'manageReportViewProcessor.php',
                type: 'POST',
                data: {"changeStatus": selectedStatus, "reportid": reportid},
                success: function (result) {
                    showInvalidatedReports();
                }
            });
        } else {
            showInvalidatedReports();
        }
    }

    var generateReportsModal = document.getElementById("generateReportModal");

    function generateReport() {
        $.ajax({
            url: 'manageReportViewProcessor.php',
            type: 'POST',
            data: {"generate": 1},
            success: function (result) {
                document.getElementById("generateReportModal").innerHTML = result;
                generateReportsModal.style.display = "block";
            }
        });
    }

    function closeGenerateReports() {
        generateReportsModal.style.display = "none";
    }

    function downloadReports() {
        var reports = document.getElementsByClassName("reportList");
        var reportsIds = [];
        for (i = 0; i < reports.length; i++) {
            if (reports[i].checked === true) {
                reportsIds.push(parseInt(reports[i].value));
            }
        }
        $.ajax({
            url: 'ManageReportViewProcessor.php',
            type: 'POST',
            data: {"download": reportsIds},
            success: function (result) {
                window.location.href = "DownloadFile.php";
                //generateReport(2)
                console.log('ok');
                console.log(result);
            }
        });
    }

    window.onclick = function (event) {
        if (event.target === viewReportModal) {
            viewReportModal.style.display = "none";
        } else if (event.target === invalidatedReportsModal) {
            invalidatedReportsModal.style.display = "none";
        } else if (event.target === generateReportsModal) {
            generateReportsModal.style.display = "none";
        }
    }

    var clicked =false;
    function Toggle(){
        var butt = document.getElementById('sidebarCollapse')
        if(!clicked){
            clicked = true;
            butt.innerHTML = "Menu <i class = 'fas fa-angle-double-right'><i>";
        }
        else{
            clicked = false;
            butt.innerHTML = "<i class='fas fa-angle-left'></i> Menu";
        }
    }

    function selectHighlight(row) {
        if (row.checked == true) {
           row.parentNode.parentNode.style.backgroundColor = "#b3b3b3";
        }
        else {
            row.parentNode.parentNode.style.backgroundColor = "white";
         }
    }
</script>
</body>


