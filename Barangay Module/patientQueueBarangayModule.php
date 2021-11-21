<?php
include_once("../includes/database.php");
require_once('../includes/sessionHandling.php');
checkRole('Barangay');

$accountDetails = $_SESSION['account'];
$barangay_id = $accountDetails['barangay_id'];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>Barangay | Patient Queue</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/BarangayModule.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script
            crossorigin="anonymous"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script
            crossorigin="anonymous"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script
            crossorigin="anonymous"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link
            crossorigin="anonymous"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script
            defer="defer"
            src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script
            defer="defer"
            src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../javascript/showDateAndTime.js"></script>

</head>

<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand-icon">
                <img src="../img/logoo.png" style="width: 104%; margin-bottom:-19%; margin-top:-5%;" alt="Baguio Logo">
            </div>
        </div>
        <br>
        <ul class="list-unstyled components">
            <hr>
            <?php
            $accountDetails = $_SESSION['account'];
            $barangay = $accountDetails['barangay'];
            echo "<h4 id='headingNav1'>$barangay</h4>";
            ?>
            <hr>
            <div class="timeBox">
                <p id="time"></p>
                <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
            </div>

            <hr>
            <li>
                <a href="../Barangay Module/homeBarangayModule.php">
                    <i class="fas fa-home"></i>
                    Home</a>
            </li>
            <li>
                <a href="../Barangay Module/managePatientBarangayModule.php">
                    <i class="fas fa-user"></i>
                    </i>
                    Manage Patient</a>
            </li>

            <li class="active">
                <a href="../Barangay Module/patientQueueBarangayModule.php">
                    <i class="fas fa-clipboard-list"></i>
                    Patient Queue</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info" onclick="logout()">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Top Nav Bar -->
    <div id="content">
        <!--Search Input and Button-->
        <nav class="brgyNav navbar-light bg-light rounded-lg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input id="searchPatientInput" type="search" name="searchPatient" class="form-control"
                                   placeholder="Search" onkeyup="searchPatient(this.value)"/>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterCat" name="filterCategory"
                                        onchange="filterCategoryGroup(this.value)">
                                    <option value='' selected disabled hidden>Filter By</option>
                                    <option value='' disabled>Select Category Group</option>
                                    <option value="All"> All</option>
                                    <?php
                                    require_once("../require/getPriorityGroup.php");
                                    foreach ($priorityGroups as $pg) {
                                        $id = $pg->getPriorityGroupId();
                                        $category = $pg->getPriorityGroup();
                                        echo "<option value=$id> $category </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortPatientName" name="sortPatient"
                                        onchange="sortByName(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option value="" disabled>Select Name Sort</option>
                                    <option value="None"> None</option>
                                    <option value="Asc">Name ↑</option>
                                    <option value="Desc">Name ↓</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>
        <br>

        <!--Page Content-->
        <div class="tableContainer">
            <div class="row">
                <div class="col patientQueueButtons">
                    <div class="patientQCounter" id="numberAvailable">
                        <h6 class="fontColor">Number of Available First Dose Stubs</h6>
                        <?php
                        $query = "SELECT A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, ROAP, A3_Pedia, ROPP FROM barangay_stubs WHERE drive_id =(SELECT drive_id FROM vaccination_drive WHERE vaccination_date = (SELECT min(vaccination_date) FROM vaccination_drive WHERE vaccination_date >= CURDATE())) AND barangay_id = '$barangay_id';";
                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($A1, $A2, $A3, $A4, $A5, $roap, $A3P, $ROPP);
                        $stmt->fetch();
                        $stmt->close();

                        $stubs = $A1 + $A2 + $A3 + $A4 + $A5 + $roap + $A3P + $ROPP;

                        echo "<p class='fontColor'>$stubs</p>";

                        ?>
                    </div>
                </div>

                <div class="col patientQueueButtons">
                    <div class="patientQCounter" id="numberSent">
                        <h6 class="fontColor">Number of Available Second Dose Stubs</h6>
                        <?php
                        $query = "SELECT second_dose FROM barangay_stubs WHERE drive_id =(SELECT drive_id FROM vaccination_drive WHERE vaccination_date = (SELECT min(vaccination_date) FROM vaccination_drive WHERE vaccination_date >= CURDATE())) AND barangay_id = '$barangay_id';";
                        $stmt = $database->stmt_init();
                        $stmt->prepare($query);
                        $stmt->execute();
                        $stmt->bind_result($second_dose);
                        $stmt->fetch();
                        $stmt->close();

                        if ($second_dose == null) {
                            $second_dose = 0;
                        }

                        echo "<p class='fontColor'>$second_dose</p>";
                        ?>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light navbarDep mb-4">
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <div class="row ">
                            <div class="col-sm-auto">
                                <li role="presentation" class="doseOption2 nav-item active">
                                    <a class="nav-link" id="FirstDose" role="tab" data-toggle="tab"
                                       href="#FirstDose"
                                       onclick="shiftTab('FirstDose', 'SecondDose', 'FirstDosePage', 'SecondDosePage')">First
                                        Dose</a>
                                </li>
                            </div>
                            <div class="col-sm-auto">
                                <li role="presentation" class="doseOption3 nav-item">
                                    <a class="nav-link" role="tab" id="SecondDose" data-toggle="tab"
                                       href="#SecondDose"
                                       onclick="shiftTab('SecondDose', 'FirstDose', 'SecondDosePage', 'FirstDosePage')">Second
                                        Dose</a>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="FirstDosePage">
                    <div class="col">
                        <div class="tablePatientQueue tableScroll4 shadow">
                            <table class="table table-row table-hover tableBrgy" id="FirstQueue">
                                <thead>
                                <tr class="labelRow text-center">
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Contact Number</th>
                                </tr>
                                </thead>
                                <?php
                                require_once "PHP Processes/showPatientInLine.php";
                                ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success"
                                    onclick="confirmSending(<?php echo "$barangay_id" ?>, 'first')"
                                    style="float: right">
                                Send Stubs Notification
                            </button>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="SecondDosePage">
                    <div class="col">
                        <div class="tablePatientQueue tableScroll4 shadow">
                            <table class="table table-row table-hover tableBrgy" id="secondQueue">
                                <thead>
                                <tr class="labelRow text-center">
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Contact Number</th>
                                </tr>
                                </thead>
                                <?php
                                require_once '../require/getPatientDetails.php';
                                require_once '../require/getPatient.php';
                                require_once '../require/getPriorityGroup.php';


                                foreach ($patients as $p) {
                                    if ($p->getFirstDosage() == 1 && $p->getSecondDosage() == 0 && $p->getForQueue() == 1 && $p->getNotification() != 1) {
                                        $id = $p->getPatientId();
                                        foreach ($patient_details as $pd) {
                                            if ($pd->getBarangayId() == $barangay_id && $pd->getPatientDeetPatId() == $id) {
                                                $contact = $pd->getContact();

                                                if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
                                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
                                                } else if ($pd->getPatientSuffix() == null) {
                                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
                                                } else if ($pd->getPatientMName() == null) {
                                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
                                                } else {
                                                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
                                                }

                                                echo "<tr>
                <td>$name</td>
                <td>$contact</td>
                </tr>";
                                            }
                                        }
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success"
                                    onclick="confirmSending(<?php echo "$barangay_id" ?>, 'second')"
                                    style="float: right">
                                Send Stubs Notification
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
</body>
</html>
<script>

    window.onload = (event) => {
        shiftTab('FirstDose', 'SecondDose', 'FirstDosePage', 'SecondDosePage')
    };

    function searchPatientQueue() {
        var textSearch = document.getElementById("searchPatientQueueInput").value;
        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    async function confirmSending(id, category) {
        Swal.fire({
            icon: 'info',
            title: 'Send Notification?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            confirmButtonColor: '#28a745',
            denyButtonText: `No`
        }).then((result) => {
            if (result.isConfirmed) {
                sendNotification(id, category);
                Swal.fire({
                    icon: 'success',
                    title: 'Notification Sent!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                })
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    title: 'Notification Cancelled',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#007bff'
                })
            }
        })
    }

    function sendNotification(id, categ) {
        if (categ == "first") {
            $.ajax({
                url: 'Sendnotification.php',
                type: 'POST',
                data: {"first": "", "type": "many", barangayId: id},
                success: function (result) {
                    console.log(result);
                    $.ajax({
                        url: 'ManagePatientProcessor.php',
                        type: 'POST',
                        data: {"showFirstQueue": ""},
                        success: function (result) {
                            document.getElementById('FirstQueue').innerHTML = result
                        }
                    });
                }
            });
        } else {
            $.ajax({
                url: 'Sendnotification.php',
                type: 'POST',
                data: {"second": "", "type": "many", barangayId: id, category: categ},
                success: function (result) {
                    console.log(result);
                    $.ajax({
                        url: 'ManagePatientProcessor.php',
                        type: 'POST',
                        data: {"showSecondQueue": ""},
                        success: function (result) {
                            document.getElementById('secondQueue').innerHTML = result
                        }
                    });
                }
            });
        }
    }

    function shiftTab(active, idle1, pageBlock, pageNone1) {
        document.getElementById(active).style.backgroundColor = "#1D7195";
        document.getElementById(active).style.color = "#FFFFFFFF";
        document.getElementById(active).style.borderRadius = "12px";
        document.getElementById(idle1).style.backgroundColor = "rgba(49,51,53,0)";
        document.getElementById(idle1).style.color = "#000000";
        document.getElementById(pageBlock).style.display = "block";
        document.getElementById(pageNone1).style.display = "none";
        document.getElementById(idle1).style.color = "#000000";
    }

</script>
<script src="../javascript/logout.js"></script>