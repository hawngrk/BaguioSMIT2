<?php
include_once("../includes/database.php") 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Title -->
        <title>SMIT+(Barangay) | Home</title>

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

    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-brand-icon">
                        <img style="width:150px;" src="../img/SMIT+.png" alt="Baguio Logo">
                    </div>
                </div>

                <ul class="list-unstyled components">
                    <h4 id="headingNav1">Bakakeng North/Sur</h4>
                    <hr>
                    <h5 id="headingNav2">September 17, 2021 | 01:24 PM</h5>
                    <hr>
                    <li class="active">
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

                <li>
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
            <div class="topNav row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button
                            type="button"
                            id="sidebarCollapse"
                            class="btn btn-info"
                            onclick="Toggle()">
                            <i class='fas fa-angle-left'></i>
                            Menu
                        </button>

                        <button class="btnTop">
                            <i class="fas fa-bell"></i>
                        </button>

                        <button class="btnTop btnBell">
                            <i class="fas fa-cog"></i>
                        </button>
                    </div>
                </nav>
            </div>
            <!--Page Content-->
            <div class="row">
                <div id="stubDelegationNotice">
                    <center>
                        <h5>Stub Delegation Notice</h5>
                    </center>
                    <hr>
                    <p>SDS Sent 63 A4 Stubs & 25 A5 stubs for Barangay Bakakeng.</p>
                </div>
                <div id="availableStubs">
                    <center>
                        <h5>Available Stubs</h5>
                    </center>
                    <hr>
                    <div class="priorityGroup">
                        <h5>A1</h5>
                        <?php
                    $query = "SELECT COUNT(patient_priority_group) FROM patient_details WHERE patient_priority_group = 'A1: Health Care Workers'";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($A1);
                    $stmt->fetch();
                    echo "<p>$A1</p>"
                    ?>
                    </div>
                    <div class="priorityGroup">
                            <h5>A2</h5>
                        <?php
                    $query = "SELECT COUNT(patient_priority_group) FROM patient_details WHERE patient_priority_group = 'A2: Senior Citizens'";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($A2);
                    $stmt->fetch();
                    echo "<p>$A2</p>"
                    ?>
                    </div>
                    <div class="priorityGroup">
                        <h5>A3</h5>
                        <?php
                    $query = "SELECT COUNT(patient_priority_group) FROM patient_details WHERE patient_priority_group = 'A3: Adult With Comorbidity'";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($A3);
                    $stmt->fetch();
                    echo "<p class='priorityGroups'>$A3</p>"
                    ?>
                    </div>
                    <div class="priorityGroup">
                        <h5>A4</h5>
                        <?php
                    $query = "SELECT COUNT(patient_priority_group) FROM patient_details WHERE patient_priority_group = 'A4: Frontline Personnel in Essential Sector'";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($A4);
                    $stmt->fetch();
                    echo "<p>$A4</p>"
                    ?>
                    </div>
                    <div class="priorityGroup">
                        <h5>A5</h5>
                        <?php
                    $query = "SELECT COUNT(patient_priority_group) FROM patient_details WHERE patient_priority_group = 'A5: Indigent Population'";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($A5);
                    $stmt->fetch();
                    echo "<p>$A5</p>"
                    ?>
                    </div>
                    <div class="priorityGroup">
                        <h5>A6</h5>
                        <?php
                    $query = "SELECT COUNT(patient_priority_group) FROM patient_details WHERE patient_priority_group = 'A6: Rest of Population'";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($A6);
                    $stmt->fetch();
                    if ($A6 == 0) {
                        echo "<p>0</p>";
                    } else {
                        echo "<p>$A6</p>";
                    }
                    ?>
                    </div>
                </div>
            </div>

            <div class=" row">
                <div class="counterCl">
                    <div class="col colCount">
                        <h5>CLAIMED</h5>
                        <?php
                    $query = "SELECT COUNT(notification) FROM patient WHERE notification = 1";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($claimed);
                    $stmt->fetch();
                    echo "<h5>$claimed</h5>"
                    ?>
                    </div>
                    <div class="col colCount">
                        <h5>UNCLAIMED</h5>
                        <?php
                    $query = "SELECT COUNT(notification) FROM patient WHERE notification = 0";
                    $stmt = $database->stmt_init();
                    $stmt->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($unclaimed);
                    $stmt->fetch();
                    echo "<h5>$unclaimed</h5>"
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<style>

#stubsLeft {
    font-size: 60%;
}
.priorityGroup {
    margin-left: 8%;
    display: inline-block;
}

.priorityGroup p {
    text-align: center;
}
.topNav {
    display: block;
}

.colCount {
    display: table-cell;
    text-align: center;
}

.colCount h5 {
    margin-top: 8%;
    margin-left:-10%;

}

.secondCounterCl {
    margin-left: 15% !important;
}
.counterCl {
    background-color: white;
    width: 30%;
    border-radius: 12px;
    display: block;
    margin-left: 12%;
    margin-top: 3%;
}

.firstCounterCl,
.secondCounterCl {
    display: table-cell;
}
#availableStubs {
    margin-left: 5%;
}
#availableStubs,
#stubDelegationNotice {
    background-color: white;
    width: 40%;
    border-radius: 12px;
    display: inline-block;
    margin-left: 7%;
}

#stubDelegationNotice p {
    text-align: center;
}

#stubDelegationNotice h5 {
    margin-bottom: 0;
    padding-bottom: 0;
}

hr {
    border: 0;
    clear: both;
    display: block;
    width: 96%;
    background-color: black;
    height: 1px;
    margin-top: 2%;
    margin-bottom: 2%;
}
</style>