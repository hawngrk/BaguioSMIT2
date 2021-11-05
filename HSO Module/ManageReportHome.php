<?php 
include_once("../includes/database.php");
require_once('../includes/sessionHandling.php');
checkRole('HSO');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HSO | Manage Reports</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/HSOModule.css" rel="stylesheet">


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
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <h4 id="headingNav1"> Health Service Office </h4>
            <hr>
            <h5 id="headingNav2">
                <script src="../javascript/showDateAndTime.js"></script>
            </h5>
            <hr>

            <li>
                <a href="HSOdash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
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
            <button type="button" class="btn btn-info" onclick='logout()'> 
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <!-- Top Nav  -->
        <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
            <div class="container-fluid">
                <div>
                    <button type="button" class="buttonTop3" id="invalidatedReportBtn"
                            onclick="showInvalidatedReports()"><i class="fas fa-list-alt"></i> Invalidated Reports
                    </button>
                    <button type="button" class="buttonTop3" id="generateReportBtn" onclick="generateReport()"><i
                                class="fas fa-print"></i> Generate Report
                    </button>
                </div>
                <button type="button" class="btn btn-warning buttonTop3 float-right" onclick="openModal('archived')">
                    <i class="fas fa-inbox fa-lg"></i> Archive
                </button>
            </div>
        </div>

        <!-- Table Part-->
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchReportHSO" type="search" name="searchReport" class="form-control" placeholder="Search" onkeyup="searchReport()"/>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterReportsInput" name="filterReports"
                                        onchange="filterReport(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value='' disabled >Select Status</option>
                                    <option value="All">All</option>
                                    <option value="Unverified">Unverified</option>
                                    <option value="Verified">Verified</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortReports" name="sortReports"
                                        onchange="sortReport(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option value="" disabled >Select Sort By </option>
                                    <option value="None"> None </option>
                                    <option value="nameAsc">Name Asc</option>
                                    <option value="nameDesc">Name Desc</option>
                                    <option value="dateAsc">Date Asc</option>
                                    <option value="dateDesc">Date Desc</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 d-none d-md-block"></div>
                    <!--Table Content-->
                    <div class="tableReport tableScroll1 col" id="mainReport">
                        <table class="table table-hover tableReport" id="reportsTable">
                            <thead>
                            <tr class="tableCenterCont">
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

                            foreach ($reports as $rep) {
                                if ($rep->getArchived() == 0) {

                                    $reportId = $rep->getReportId(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
                                    $patientId = $rep->getReportPatientId();
                                    $dateReported = $rep->getDateReported();
                                    $status = $rep->getReportStatus();

                                    if ($status != 'Invalidated') {
                                        foreach ($patients as $pat) {
                                            if ($patientId == $pat->getPatientId()) {
                                                $reporter = $pat->getPatientFullName();
                                            }
                                        }
                                        echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td>
                                          <button class='btn btn-success btn-sm' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button>
                                          <button class='buttonTransparent actionButt' onclick='event.stopPropagation(); archive(1, clickArchive, $reportId)'><i class='fa fa-archive'></i></button>
                                          </td></tr>";
                                    }
                                }
                            }
                            ?>
                            <div id="invalidatedReportsModal" class="modal-window"></div>
                            <div id="generateReportModal" class="modal-window"></div>
                            <div id="viewReportModal" class="modal-window"></div>
                        </table>
                    </div>

                    <!--Counter Container-->
                    <div class="col-sm-auto">
                        <div class="counterColumn">
                            <div class="four counterRow">
                                <div class="counter-box colored1" style="align-content: center">

                                    <p>Total Reports</p>
                                    <?php
                                    $query = "SELECT COUNT(*) FROM report ";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($totalReports);
                                    $stmt->fetch();
                                    echo "<span class='d-flex justify-content-center'> $totalReports </span>"
                                    ?>
                                </div>
                            </div>

                            <div class="four counterRow">
                                <div class="counter-box colored2">
                                    <p class="p-0">Total of Pending Reports</p>
                                    <?php
                                    $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Pending'";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($unverifiedReports);
                                    $stmt->fetch();
                                    echo "<span class='d-flex justify-content-center'>$unverifiedReports</span>"
                                    ?>

                                </div>
                            </div>

                            <div class="four counterRow">
                                <div class="counter-box colored3">
                                    <p>Total of Verified Reports</p>
                                    <?php
                                    $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Verified'";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($verifiedReports);
                                    $stmt->fetch();
                                    echo "<span class='d-flex justify-content-center'>$verifiedReports</span>"
                                    ?>
                                </div>
                            </div>

                            <div class="four counterRow">
                                <div class="counter-box colored4">
                                    <p>Total of Invalidated Reports</p>
                                    <?php
                                    $query = "SELECT COUNT(report_status) FROM report WHERE report_status = 'Invalidated'";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($invalidatedReports);
                                    $stmt->fetch();
                                    echo "<span class='d-flex justify-content-center'>$invalidatedReports</span>"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Archive Modal  -->
        <div id="archived" class="modal-window">
            <div class="content-modal-table">
                <div class="modal-header">
                    <h4 class="modal-title">Archived Reports</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('archived')">
                        <i class='fas fa-window-close'></i>
                    </button>
                </div>
                <div id='archivedContent' class="modal-body">

                    <table class="table table-row table-hover tableModal" id="vaccineTable">
                        <thead>
                        <tr class="tableCenterCont">
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

                            foreach ($reports as $rep) {
                                if ($rep->getArchived() == 1) {

                                    $reportId = $rep->getReportId(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
                                    $patientId = $rep->getReportPatientId();
                                    $dateReported = $rep->getDateReported();
                                    $status = $rep->getReportStatus();

                                    if ($status != 'Invalidated') {
                                        foreach ($patients as $pat) {
                                            if ($patientId == $pat->getPatientId()) {
                                                $reporter = $pat->getPatientFullName();
                                            }
                                        }
                                        echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td>
                                            <div style='text-align: left;'>
                                                 <button class='btn btn-warning' onclick='event.stopPropagation();archive(0, clickArchive, $reportId )'>unarchive <i class='fas fa-box-open'></i></button>
                                            </div>
                                          </td></tr>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </table>
                </div>
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


        <script>
            //opening modal
            function openModal(modal) {
                console.log(modal)
                document.getElementById(modal).style.display = "block";
                document.getElementById(modal).removeClass('hidden');
                overlay.trigger('show');
            }

            //close modal
            function closeModal(modal) {
                document.getElementById(modal).style.display = "none";
            }

            //clear search text field
            $('#searchReportHSO').on('input', function(e) {
                if('' == this.value) {
                    $.ajax({
                        url: '../includes/searchProcessor.php',
                        type: 'POST',
                        data: {"searchReport": ""},
                        success: function (result) {
                            document.getElementById("reportsTable").innerHTML = result;
                        }
                    });
                }
            });

            //search report
            function searchReport() {
                var textSearch = document.getElementById("searchReportHSO").value;
                $.ajax({
                    url: '../includes/searchProcessor.php',
                    type: 'POST',
                    data: {"searchReport": textSearch},
                    success: function (result) {
                        document.getElementById("reportsTable").innerHTML = result;
                    }
                })
            }

            //sort report
            function sortReport(sort) {
                var selectedSort = sort.value;
                $.ajax({
                    url: '../includes/sortingProcessor.php',
                    type: 'POST',
                    data: {"sortReport": selectedSort},
                    success: function (result) {
                        document.getElementById("reportsTable").innerHTML = result;
                    }
                })
            }

            //filter report
            function filterReport(filter) {
                var selectedFilter = filter.value;
                $.ajax({
                    url: '../includes/filterProcessor.php',
                    type: 'POST',
                    data: {"filterReport": selectedFilter},
                    success: function (result) {
                        document.getElementById("reportsTable").innerHTML = result;
                    }
                })
            }

            //show invalidated reports
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

            // view invalidated report
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

            //edit invalidated report
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

            //close invalidated reports
            function closeInvalidatedReports() {
                invalidatedReportsModal.style.display = "none";
            }

            //view report
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

            //edit report
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

            //close view report
            function closeViewReport(status) {
                if (status === 'Invalidated') {
                    invalidatedReportsModal.style.display = "none";
                } else {
                    viewReportModal.style.display = "none";
                }
            }

            //change status
            function changeRepStatus(reportid, status) {
                var selectedStatus = document.getElementById('statusSelection').value;
                if (selectedStatus !== status) {
                    if (selectedStatus === 'Verify') {
                        selectedStatus = 'Verified';
                    } else {
                        selectedStatus = 'Invalidated';
                    }
                    console.log(reportid);
                    console.log(selectedStatus);
                    $.ajax({
                        url: '../includes/searchProcessor.php',
                        type: 'POST',
                        data: {"changeStatus": selectedStatus, "reportid": reportid},
                        success: function (result) {
                            viewReportModal.style.display = "none";
                        }
                    });
                } else {
                    viewReportModal.style.display = "none";
                }
            }

            //generate report
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

            //close generate report
            function closeGenerateReports() {
                generateReportsModal.style.display = "none";
            }

            //download report
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

            //close window
            window.onclick = function (event) {
                if (event.target === viewReportModal) {
                    viewReportModal.style.display = "none";
                } else if (event.target === invalidatedReportsModal) {
                    invalidatedReportsModal.style.display = "none";
                } else if (event.target === generateReportsModal) {
                    generateReportsModal.style.display = "none";
                } else if (event.target == document.getElementById("archived")){
                    document.getElementById("archived").style.display = "none";
                }
            }

            // highlight selected row
            function selectHighlight(row) {
                if (row.checked == true) {
                    row.parentNode.parentNode.style.backgroundColor = "#b3b3b3";
                } else {
                    row.parentNode.parentNode.style.backgroundColor = "white";
                }
            }

            function clickArchive(report, option) {
                $.ajax({
                    url: 'ManageReportViewProcessor.php',
                    method: 'POST',
                    data: {archive: report, option: option},
                    success: function (result) {
                        if (option == "Archive") {
                            document.getElementById('mainReport').innerHTML = result;
                            $.ajax({
                                url: 'ManageReportViewProcessor.php',
                                method: 'POST',
                                data: {showUpdatedArchive: ""},
                                success: function (result) {
                                    document.getElementById('archivedContent').innerHTML = result;
                                }
                            })

                        } else if (option == "UnArchive") {
                            document.getElementById("archivedContent").innerHTML = result;
                            $.ajax({
                                url: 'ManageReportViewProcessor.php',
                                method: 'POST',
                                data: {showUpdatedReport: ""},
                                success: function (result) {
                                    document.getElementById('mainReport').innerHTML = result;
                                }
                            })
                        }
                    }
                })
            }

            async function archive(archive, action, report) {
                if (archive == 1) {
                    archiveText = "Archive";
                } else {
                    archiveText = "UnArchive";
                }
                Swal.fire({
                    icon: 'info',
                    title: 'Are you sure you want to ' + archiveText + ' this item?',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        action(report, archiveText);
                        Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            }
        </script>
        <!--Logout script-->
<script src="../javascript/logout.js"></script>
</body>


