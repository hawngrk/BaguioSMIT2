<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+(Ssd) | Stub Distribute</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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
            <hr>
            <h4 id="headingNav1"> Special Service Division</h4>
            <hr>
            <div class="timeBox">
                    <p id="time"></p>  <p id="datee"></p>
                    <script src="../javascript/detailedDateAndTime.js"></script>
                    </div>
            <hr>

            <li>
                <a href="homeSsdModule.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="active">
                <a href="distributeStubSsdModule.php"><i class="fas fa-ticket-alt"></i> Stub Distribute</a>
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
        <!-- Page Content  -->
            <div class="container-fluid">
                <button id="buttonMarker" class="notif float-right" onclick="openNotif('notificationModal')">
                    <!-- <span class="marker" id="marker"><i class="fas fa-circle"></i></span> -->
                    <i class="fas fa-bell"></i>
                </button>
            </div>
        <br>
        <br>
        <div class="row">
        <div id="selectDeployment">
                        <select class="form-select" id="selectHealthDistrict" onchange="updateDeploymentDetails(this.value)">
                            <option value='' disabled selected hidden> Select Deployment </option>
                            <?php
                            require_once("../require/getVaccinationDrive.php");
                            foreach ($vaccination_drive  as $vaccinationDrive) {
                                $id = $vaccinationDrive->getDriveId();
                                echo "<option value=$id> $id </option>";
                            }
                            ?>
                        </select>
                    </div>
            <div class="col">
                <div class="row">
                    <div id="hDistrictContainer">
                        <h2> Health Center Districts </h2>
                        <table class="table table-hover" id="healthDistrictTable">
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div id="deploymentSummary">
                        <h2>Deployment Summary</h2>
                        <div id="labelling">
                            <h5> Site: </h5>
                            <br>
                            <h5> Brand: </h5>
                            <br>
                            <h5> Scheduled Date: </h5>
                            <br>
                            <h5> Priority Group: </h5>
                            <br>
                            <h5> Number Of Stubs: </h5>
                            <br>
                            <h5> Health Districts: </h5>

                        </div>
                    </div>
                </div>
            </div>

            <div id="barangayModal" class="modal-window">
            </div>
        </div>
    </div>

    <div id="notificationModal" class="modal-window">
        <div class="content-modal">
            <div class="modal-header">
                <h4 class="modal-title">Notifications</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="window.location.href = 'distributeStubSsdModule.php'">
                    &times;
                </button>
            </div>
            <div class="modal-body" id="notificationContent">
                <?php
                $query = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date, vaccination_drive.stubs, vaccination_drive.notif_opened FROM vaccination_sites JOIN vaccination_drive ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id ORDER BY drive_id desc;";
                $vaccination_drive = [];

                $stmt = $database->stmt_init();
                $stmt->prepare($query);
                $stmt->execute();
                $stmt->bind_result($driveId, $locName, $date, $stubs, $opened);

                while ($stmt->fetch()) {
                    if ($opened== 1){
                        echo "
                                                   
                                                      
                                                        <div id='$driveId' style='color: #9C9C9C'>
                                                            <p>Vaccination Location: $locName<br>
                                                               Date: $date <br>
                                                               Number of Stubs: $stubs <br>
                                                            </p>
                                                        </div>
                                                      <hr style='width: 100%; background: azure'>
                                                 
                                                      ";
                    } else{

                        echo "
                                                   <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>
                                                      
                                                        <div id='$driveId' style='background: lightgray'>
                                                            <p>Vaccination Location: $locName<br>
                                                               Date: $date <br>
                                                               Number of Stubs: $stubs <br>
                                                            </p>
                                                        </div>
                                                      <hr style='width: 100%; background: azure'>
                                                 
                                                      ";

                    }

                }
                ?>

            </div>
        </div>
    </div>
    <script>
        var pusher = new Pusher('8bde1d2aef3f7c91d16a', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('ssd');
        channel.bind('my-event', function(data) {
            var id = data.message;

            toastr.options.positionClass = 'toast-bottom-right';
            toastr.info('You Have Received A New Deployment!');

            document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important') ;
            document.getElementById("notificationContent").innerHTML = "";
            document.getElementById("selectDeployment").innerHTML = "";

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"notifDrive": "notifDrive"},
                success: function (result) {
                    document.getElementById("notificationContent").innerHTML = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"notifListDrives": "list"},
                success: function (result) {
                    document.getElementById("selectDeployment").innerHTML = result;
                }
            });
        });

        function openNotif(modal){
            document.getElementById(modal).style.display = "block";
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"open": "opened"},
                success: function (result) {
                    setTimeout(function(){ document.getElementById('marker').setAttribute('style', 'color:transparent!important'); }, 5000);
                }
            });
        }

        function sendStubs(drive){
            var result = {};
            var trs = document.getElementById('healthDStubs').getElementsByTagName("tr");
            for(var idx = 1; idx < trs.length; idx++) {
                var tds = trs[idx].getElementsByTagName("td");
                result[trs[idx].id] = [];
                for (var index = 0; index < tds.length; index++) {
                    var val = tds[index].firstChild.value;
                    result[trs[idx].id].push(val);
                }
            }
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"sendStubs": result, "stubsDrive": drive },
                success: function (result) {
                    closeModal('barangayModal');
                }
            });

        }

        var counter = 500;
        function countStubs(num, oldnum, item){
            if (num == undefined || num == "") {
                num = 0;
            }

            if(oldnum == undefined || oldnum == ""){

                oldnum = 0;
            }

            if (num > counter){
                alert('Number Exceeds Number Of Left Stubs!');
                item.value = 0;
            }else if (num < oldnum){
                counter = counter + parseInt(oldnum);
                counter = counter - parseInt(num);
                console.log('if',counter);
            }else{
                counter = counter - parseInt(num);
                console.log('else',counter);
            }

            document.getElementById('counter').innerHTML = "";
            document.getElementById('counter').innerHTML = "<center><p><i class='fas fa-ticket-alt'></i> number of Stubs Left: " + counter + "</p> </center>";
        }

        function checkZero(item){
            if(counter == 0){
                alert('No more stubs');
                item.value = 0;
            }
        }


        function updateDeploymentDetails(val){
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"deploymentId": val},
                success: function (result) {
                    document.getElementById("labelling").innerHTML = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"healthDistrict": val},
                success: function (result) {
                    document.getElementById("healthDistrictTable").innerHTML = result;
                }
            });
        }

        function viewBarangays(id, driveId, prioGroup, stubs){
            console.log('passed')
            counter = stubs;
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"viewBarangays": id, drive: driveId},
                success: function (result) {
                    document.getElementById("barangayModal").innerHTML = result;
                    document.getElementById("barangayModal").style.display ="block";
                    disable(prioGroup);

                }
            });
        }

        function disable(group){
            var input =  document.getElementsByClassName(group);
            for (var i = 0; i < input.length; i++) {
                input[i].disabled = false;
            }
        }

        function closeModal(modal){
            document.getElementById(modal).style.display ="none";
        }

        function openModal(modal) {
            document.getElementById(modal).style.display = "block";
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

</body>
</html>
