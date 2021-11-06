<?php
include_once("../includes/database.php");
require_once('../includes/sessionHandling.php');
checkRole('Barangay');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>Barangay | Home</title>

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
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

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

            <div class="timeBox">
                <p id="time"></p>  <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
            </div>

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
            <button type="button" class="btn btn-info" onclick="logout()">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Top Nav Bar -->


<!--    <div id="notificationModal" class="modal-window">-->
<!--        <div class="content-modal">-->
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title">Notifications</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal"-->
<!--                        onclick="closeModal('notificationModal')">-->
<!--                    &times;-->
<!--                </button>-->
<!--            </div>-->
<!--            <table>-->
<!--            <div class="modal-body" id="notificationContent">-->
<!--                --><?php
//                $query = "SELECT barangay_stubs.drive_id, barangay_stubs.A1_stubs, barangay_stubs.A2_stubs, barangay_stubs.A3_stubs, barangay_stubs.A4_stubs, barangay_stubs.A5_stubs, barangay_stubs.A6_stubs, barangay_stubs.notif_opened, vaccination_sites.location, vaccination_drive.vaccination_date FROM barangay_stubs JOIN vaccination_drive ON vaccination_drive.drive_id = barangay_stubs.drive_id JOIN vaccination_sites ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id WHERE barangay_id = '113';";
//                $stmt = $database->stmt_init();
//                $stmt->prepare($query);
//                $stmt->execute();
//                $stmt->bind_result($driveId,$A1, $A2, $A3, $A4, $A5, $A6, $opened, $locName, $date);
//                while ($stmt->fetch()) {
//
//                    $availableStubs = [$A1, $A2, $A3, $A4, $A5, $A6];
//                    $priorityStub = [];
//                    $values = [];
//
//                    for ($i = 0; $i < 6; $i++) {
//                        if ($availableStubs[$i] != 0) {
//                            $priorityStub[] = "A" . ($i + 1);
//                            $values[] = $availableStubs[$i];
//                        }
//                    }
//
//                    if ($opened == 1) {
//                        echo "<tr>
//                                                        <td style='color: #9C9C9C'>
//                                                            Stubs:<br>";
//                        foreach ($priorityStub as $ps) {
//                            foreach ($values as $value)
//                                echo " $ps: $value";
//                        }
//
//                        echo "
//                                                            Vaccination Location: $locName<br>
//                                                               Date: $date <br>
//
//
//                                                      <hr style='width: 100%; background: azure'>
//                                                     </td>
//                                                      </tr>
//                                                      ";
//                    } else {
//
//                        echo "<tr onclick='updateBarangayHome($driveId); ; closeModal(\"notificationModal\")'>
//                                                   <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>
//
//                                                        <td style='background: lightgray'>
//                                                             Stubs:";
//
//                        foreach ($priorityStub as $ps) {
//                            foreach ($values as $value)
//                                echo "$ps: $value<br>";
//                        }
//
//                        echo "
//                                                            Vaccination Location: $locName<br>
//                                                               Date: $date <br>
//
//
//                                                      <hr style='width: 100%; background: azure'>
//                                                      </td>
//                                                      </tr>";
//                    }
//                }
//                ?>
<!--            </div>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->

    <div id="content">
        <nav class="float-right mr-4">
            <div class="dropdown">
                <button class="btn btn-lg dropdown-toggle bg-none" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="marker" id="marker"></span>
                    <i class="fas fa-bell"></i>
                </button>
                <div class="dropdown-menu mr-4 border border-dark" aria-labelledby="dropdownMenuButton">
                    <?php
                                    $query = "SELECT barangay_stubs.drive_id, barangay_stubs.A1_stubs, barangay_stubs.A2_stubs, barangay_stubs.A3_stubs, barangay_stubs.A4_stubs, barangay_stubs.A5_stubs, barangay_stubs.A6_stubs, barangay_stubs.notif_opened, vaccination_sites.location, vaccination_drive.vaccination_date FROM barangay_stubs JOIN vaccination_drive ON vaccination_drive.drive_id = barangay_stubs.drive_id JOIN vaccination_sites ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id WHERE barangay_id = '113';";
                                    $stmt = $database->stmt_init();
                                    $stmt->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($driveId,$A1, $A2, $A3, $A4, $A5, $A6, $opened, $locName, $date);
                                    echo "<table class='tableScroll7 px-4 py-2'>
                                        <tr><td><h4>Notifications<hr></h4></td></tr>";
                                    while ($stmt->fetch()) {
                                        $availableStubs = [$A1, $A2, $A3, $A4, $A5, $A6];
                                        $priorityStub = [];
                                        $values = [];

                                        for ($i = 0; $i < 6; $i++) {
                                            if ($availableStubs[$i] != 0) {
                                                $priorityStub[] = "A" . ($i + 1);
                                                $values[] = $availableStubs[$i];
                                            }
                                        }

                                        if ($opened == 1) {
                                            echo " <tr>
                                                                            <td>
                                                                                Stubs:<br>";
                                            foreach ($priorityStub as $ps) {
                                                foreach ($values as $value)
                                                    echo " $ps: $value";
                                            }

                                            echo "
                                                                                Vaccination Location: $locName<br>
                                                                                   Date: $date <br>
                    
                    
                                                                          <hr>
                                                                         </td>
                                                                          </tr>
                                                                          ";
                                        } else {

                                            echo "<tr onclick='updateBarangayHome($driveId); ; closeModal(\"notificationModal\")'>
                                                                       <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>
                    
                                                                            <td style='background: lightgray'>
                                                                                 Stubs:";

                                            foreach ($priorityStub as $ps) {
                                                foreach ($values as $value)
                                                    echo "$ps: $value<br>";
                                            }

                                            echo "
                                                                                Vaccination Location: $locName<br>
                                                                                   Date: $date <br>
                    
                    
                                                                          <hr style='width: 100%; background: azure'>
                                                                          </td>
                                                                          </tr>
                                                                         ";
                                        }
                                    }

                                                                          echo "</table>";
                                    ?>
                </div>
            </div>
        </nav>
<!--        <div class="topNav row">-->
<!--            <div class="container-fluid">-->
<!--                <button id="buttonMarker" class="notif float-right" onclick="openNotif('notificationModal')">-->
<!--                    <span class="marker" id="marker"><i class="fas fa-circle"></i></span>-->
<!--                    <i class="fas fa-bell"></i>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
        <br>
        <br>
        <!--Page Content-->
        <div>
           <div class="row">
               <div id="selectDeployment" class="col-sm-auto">
                   <select class="form-select" id="selectHealthDistrict"
                       onchange="updateBarangayHome(this.value)">
                       <option value='' disabled selected hidden> Select Deployment</option>
                       <?php
                       require_once("../require/getVaccinationDrive.php");
                       require_once("../require/getVaccinationSites.php");
                       $query = "SELECT drive_id FROM barangay_stubs WHERE barangay_id = '113'";
                       $stmt = $database->stmt_init();
                       $stmt->prepare($query);
                       $stmt->execute();
                       $stmt->bind_result($id);
                       while ($stmt->fetch()) {
                           foreach ($vaccination_drive as $drive) {
                               if ($drive->getDriveId() == $id) {
                                   $location = $drive->getVaccDriveVaccSiteId();
                                   $date = date("d-m-Y", strtotime($drive->getVaccDate()));
                                   foreach ($vaccinationSites as $site) {
                                       if ($site->getVaccinationSiteId() == $location) {
                                           $locName = $site->getVaccinationSiteLocation();


                                           echo "<option value=$id> $date - $locName </option>";
                                       }
                                   }
                               }
                           }
                       }
                       ?>
                   </select>
               </div>
           </div>
            <br>
            <div class="row" id="barangayHomeContent">
                <div id="stubDelegationNotice">
                    <center>
                        <h5>Stub Delegation Notice</h5>
                    </center>
                    <hr>
                </div>
                <div id="availableStubs">
                    <center>
                        <h5>Available Stubs</h5>
                    </center>
                    <hr>
                    <div class="priorityGroup">
                        <h5>A1</h5>
                        <p>0</p>
                    </div>
                    <div class="priorityGroup">
                        <h5>A2</h5>
                        <p>0</p>
                    </div>
                    <div class="priorityGroup">
                        <h5>A3</h5>
                        <p>0</p>
                    </div>
                    <div class="priorityGroup">
                        <h5>A4</h5>
                        <p>0</p>
                    </div>
                    <div class="priorityGroup">
                        <h5>A5</h5>
                        <p>0</p>
                    </div>
                    <div class="priorityGroup">
                        <h5>A6</h5>
                        <p>0</p>
                    </div>
                    <div class="priorityGroup">
                        <h5>Second Dose</h5>
                        <p>0</p>
                    </div>
                </div>
            </div>
            <div class="row">
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
<script type="text/javascript">
    var clicked = false;

    var pusher = new Pusher('8bde1d2aef3f7c91d16a', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('barangay');
    channel.bind('my-event', function () {
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.info('You Have Received a New Set Of Stubs!');

        document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');
        document.getElementById("notificationContent").innerHTML = "";


        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"notifStubs": ""},
            success: function (result) {
                document.getElementById("notificationContent").innerHTML = result;
            }
        });
    });

    function openNotif(modal) {
        document.getElementById(modal).style.display = "block";
        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"open": "opened"},
            success: function (result) {
                setTimeout(function () {
                    document.getElementById('marker').setAttribute('style', 'color:transparent!important');
                }, 2000);
                console.log(result)
            }
        });
    }

    function closeModal(modal) {
        document.getElementById("notificationContent").innerHTML = "";
        document.getElementById(modal).style.display = "none";

        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"notifStubs": ""},
            success: function (result) {
                document.getElementById("notificationContent").innerHTML = result;

            }
        });

    }

    function updateBarangayHome(driveId){
        $.ajax({
            url: 'ManagePatientProcessor.php',
            type: 'POST',
            data: {"delegations": driveId},
            success: function (result) {
                document.getElementById("barangayHomeContent").innerHTML = result;
            }
        });
    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../javascript/logout.js"></script>
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
        margin-left: -10%;

    }

    .secondCounterCl {
        margin-left: 15% !important;
    }

    .counterCl {
        background-color: #f6f6f6;
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
        background-color: #f6f6f6;
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


</style>
