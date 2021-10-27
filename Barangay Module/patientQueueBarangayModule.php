<?php
include_once("../includes/database.php")
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>Barangay | Patient Queue</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
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
    <script defer src="../javascript/showDateAndTime.js"> </script>

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

        <ul class="list-unstyled components">
            <hr>
            <?php
                session_start();
                $accountDetails = $_SESSION['account'];
                $barangay = $accountDetails['barangay'];
                echo "<h4 id='headingNav1'>$barangay</h4>";
            ?>
            <hr>
            <h5 id="headingNav2">September 17, 2021 | 01:24 PM</h5>
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
            <li>
                <a href="../Barangay Module/notificationSummaryBarangayModule.php">
                    <i class="fas fa-envelope-open"></i>
                    Notification Summary</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info">
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
                <div class="col my-auto">
                    <div class="input-group">
                        <input id="searchPatientQueue" type="search" placeholder="Search" class="searchHome"name="searchPatient" onkeyup="searchPatient()">
                        <button type="submit" class="buttonTop5" name="searchPatientBtn" onclick="searchPatient()">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

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

        </div>
        </nav>
        <br>

        <!--Page Content-->
        <div class="tableContainer">
            <div class="patientQueueButtons">
                <div class="patientQCounter">
                    <h6>Number of Available Stubs</h6>
                    <?php
                    $query = "SELECT drive_id, A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, A6_stubs FROM barangay_stubs WHERE drive_id =(SELECT drive_id FROM vaccination_drive WHERE vaccination_date = (SELECT min(vaccination_date) FROM vaccination_drive WHERE vaccination_date >= CURDATE())) AND barangay_id = '113';";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($drive, $A1, $A2, $A3, $A4, $A5, $A6);
                    $stmt->fetch();
                    $stmt->close();

                    $stubs = $A1 + $A2 + $A3 + $A4 + $A5 + $A6;

                    echo "<p>$stubs</p>";

                    ?>
                </div>
                <div class="patientQCounter">
                    <h6>Number of Sent Confirmation</h6>
                    <p>0</p>
                </div>
                <div class="patientQCounter">
                    <h6>Number of Claimed Stub</h6>
                    <p>0</p>
                </div>
                <div class="patientQCounter">
                    <h6>Number of Redirected Stub</h6>
                    <p>0</p>
                </div>
                <div>
                    <button id="confirmationNotif" onclick="sendNotification()">
                        Send<br>
                        Confirmation
                        <br>Notification
                    </button>
                </div>
            </div>

            <div class="tablePatientQueue tableScroll4 shadow">
                <table class="table table-row table-hover tableBrgy" id="patientTable">
                    <thead>
                    <tr class="labelRow">
                        <th scope="col">Patient Name</th>
                        <th scope="col">Contact Number</th>
                    </tr>
                    </thead>
                    <?php
                    require_once "PHP Processes/showPatientInLine.php";
                    ?>
                </table>
            </div>


        </div>



    </div>
</div>
</body>
</html>
<script>
    function searchPatient() {
        var textSearch = document.getElementById("searchPatientQueue").value;
        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function sendNotification() {
        $.ajax({
            url: 'Sendnotification.php',
            type: 'POST',
            success: function (result) {
                console.log(result);
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    var clicked = false;

    function Toggle() {
        var butt = document.getElementById('sidebarCollapse')
        if (!clicked) {
            clicked = true;
            butt.innerHTML = "Menu <i class = 'fas fa-angle-double-right'><i>";
        } else {
            clicked = false;
            butt.innerHTML = "<i class='fas fa-angle-left'></i> Menu";
        }
    }
</script>
