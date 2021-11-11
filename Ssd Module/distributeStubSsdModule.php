<?php
include "../includes/database.php";
require_once('../includes/sessionHandling.php');
checkRole('SSD');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SSD | Stub Distribute</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/SSDModule.css" rel="stylesheet">

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
    <script defer src="../javascript/showDateAndTime.js"></script>
    <script defer src="../javascript/logout.js"></script>
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
            <h4 id="headingNav1"> Special Service Division</h4>
            <hr>
            <div class="timeBox">
                <p id="time"></p>
                <p id="datee"></p>
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
            <button type="button" class="btn btn-info" onclick="logout()">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Top Nav Bar  -->
    <div id="content">
        <!-- Page Content  -->
        <div class="row">
            <div class="col-12">

                <nav class="float-right mr-4">
                    <div class="dropdown">

                        <button class="btn btn-lg dropdown-toggle bg-none" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="openNotif()">
                            <span class="marker" id="marker"><i class="fas fa-circle"></i></span>
                            <i class="fas fa-bell"></i>
                        </button>

                        <div id = "notifications" class="dropdown-menu mr-4 border border-dark" style="width: 352px" aria-labelledby="dropdownMenuButton">

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--            <div class="float-right">-->
        <!--                <button id="buttonMarker" class="btn btn-lg bg-none" onclick="openNotif('notificationModal')">-->
        <!--                    <span class="markerid="marker"" ></span>-->
        <!--                    <i class="fas fa-bell"></i>-->
        <!--                </button>-->
        <!--            </div>-->
        <br>
        <div class="row">
            <div id="selectDeployment">
                <select class="form-select" id="selectHealthDistrict" onchange="updateDeploymentDetails(this.value)">
                    <option value='' disabled selected hidden> Select Deployment</option>
                    <?php
                    require_once("../require/getVaccinationDrive.php");
                    require_once("../require/getVaccinationSites.php");
                    foreach ($vaccination_drive as $vaccinationDrive) {
                        $id = $vaccinationDrive->getDriveId();
                        $location = $vaccinationDrive->getVaccDriveVaccSiteId();
                        $date = date("d-m-Y", strtotime($vaccinationDrive->getVaccDate()));
                        foreach ($vaccinationSites as $site) {
                            if ($site->getVaccinationSiteId() == $location) {
                                $locName = $site->getVaccinationSiteLocation();


                                echo "<option value=$id> $date - $locName </option>";
                            }
                        }
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
                        <h2>Vaccination Deployment Summary</h2>
                        <hr>
                        <div id="labelling">
                            <h5> Vaccination Site/Location: </h5>
                            <br>
                            <h5> Scheduled Date: </h5>
                            <br>
                            <h5> Priority Groups: </h5>
                            <br>
                            <h5> First Dose Number Of Stubs: </h5>
                            <br>
                            <h5> Second Dose Number Of Stubs: </h5>
                            <br>
                            <h5> Health Districts: </h5>
                            <br>

                        </div>
                    </div>
                </div>
            </div>

            <div id="barangayModal" class="modal-window">
                <div id='stubsModal' class='content-modal'>
                    <div class='modal-header'>
                        <h3 style='padding-right:50%' id="header"></h3>
                        <button id='closeModal' class='close' onclick='closeModal("barangayModal")'><i
                                    class='fas fa-window-close'></i></button>
                    </div>
                    <div class='modal-body' id='healthDStubs'>
                        <nav class="navbar navbar-expand-lg navbar-light navbarDep">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <li role="presentation" class="doseOption1 nav-item">
                                                <a class="nav-link" role="tab" id="firstDose" data-toggle="tab"
                                                   href="#firstDose"
                                                   onclick="shiftTab(firstDose, secondDose,'firstDosePage', 'secondDosePage')">First
                                                    Dose</a>
                                            </li>
                                        </div>
                                        <div class="col-sm-auto">
                                            <li role="presentation" class="doseOption2 nav-item">
                                                <a class="nav-link" id="secondDose" role="tab" data-toggle="tab"
                                                   href="#secondDose"
                                                   onclick="shiftTab(secondDose, firstDose, 'secondDosePage', 'firstDosePage')">Second
                                                    Dose</a>
                                            </li>
                                        </div>
                                    </div>


                                </ul>
                            </div>
                        </nav>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="firstDosePage">
                            </div>
                            <div role="tabpanel" class="tab-pane" id="secondDosePage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var pusher = new Pusher('8bde1d2aef3f7c91d16a', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('ssd');
        channel.bind('my-event', function (data) {
            var id = data.message;

            toastr.options.positionClass = 'toast-bottom-right';
            toastr.info('You Have Received A New Deployment!');

            document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');
            document.getElementById("notificationContent").innerHTML = "";
            document.getElementById("selectDeployment").innerHTML = "";

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"notifListDrives": "list"},
                success: function (result) {
                    document.getElementById("selectDeployment").innerHTML = result;
                }
            });
        });

        function openNotif() {
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"showUpdatedNotif": ""},
                success: function (result) {
                    document.getElementById('notifications').innerHTML = result
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"open": "opened"},
                success: function () {
                    document.getElementById('marker').setAttribute('style', 'color:transparent!important');
                }
            });
        }

        function sendStubs(drive) {
            var result1 = {};
            var trs = document.getElementById('firstDosePage').getElementsByTagName("tr");
            for (var idx = 1; idx < trs.length; idx++) {
                var tds = trs[idx].getElementsByTagName("td");
                result1[trs[idx].id] = [];
                for (var index = 0; index < tds.length; index++) {
                    var val = tds[index].firstChild.value;
                    result1[trs[idx].id].push(val);
                }
            }
            var result2 = [];
            var trs2 = document.getElementById('secondDosePage').getElementsByTagName("tr");
            for (var i = 1; i < trs2.length; i++) {
                var tds2 = trs2[i].getElementsByTagName("td");
                for (var ind = 0; ind < tds2.length; ind++) {
                    var val2 = tds2[ind].firstChild.value;
                    result2.push(val2);
                }
            }
            console.log(result2);
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"sendStubs": result1, "stubsDrive": drive, "second_dose": result2},
                success: function () {
                    closeModal('barangayModal');
                }
            });

        }

        var firstCounter = 0;

        function countStubs(num, oldnum, item) {

            if (num.includes("%")) {
                num = num.replace(/%/g, '');
                num = (firstCounter / 100) * num;
            }

            if (num == undefined || num == "") {
                num = 0;
            }

            if (oldnum == undefined || oldnum == "") {

                oldnum = 0;
            }


            if (num > firstCounter) {
                alert('Number Exceeds Number Of Left Stubs!');
                firstCounter += parseInt(oldnum);
                item.value = 0;
            } else {
                firstCounter = firstCounter + parseInt(oldnum);
                firstCounter = firstCounter - parseInt(num);
            }

            document.getElementById('firstCounter').innerHTML = "";
            document.getElementById('firstCounter').innerHTML = "<center><p><i class='fas fa-ticket-alt'></i> Number of Stubs Left: " + firstCounter + "</p> </center>";
        }

        var secondCounter = 0;

        function countStubs2(num, oldnum, item) {

            if (num.includes("%")) {
                num = num.replace(/%/g, '');
                num = (secondCounter / 100) * num;
            }

            if (num == undefined || num == "") {
                num = 0;
            }

            if (oldnum == undefined || oldnum == "") {

                oldnum = 0;
            }


            if (num > secondCounter) {
                alert('Number Exceeds Number Of Left Stubs!');
                secondCounter += parseInt(oldnum);
                item.value = 0;
            } else {
                secondCounter = secondCounter + parseInt(oldnum);
                secondCounter = secondCounter - parseInt(num);
            }

            document.getElementById('secondCounter').innerHTML = "<center><p class='float-left'><i class='fas fa-ticket-alt'></i> Number of Stubs Left: " + secondCounter + "</p> </center>";
        }

        function checkZero(item, type) {
            if (type == 'first') {
                var counter = firstCounter;
            } else {
                var counter = secondCounter
            }

            if (counter == 0) {
                alert('No more stubs');
                item.value = 0;
            }
        }


        function updateDeploymentDetails(val) {
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

        function viewBarangays(id, district, driveId, priorities, firstDoseStubs, secondDoseStubs) {
            firstCounter = firstDoseStubs;
            secondCounter = secondDoseStubs;

            document.getElementById('header').innerText = district;
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"viewBarangays": id, "drive": driveId, "firstStubs": firstDoseStubs},
                success: function (result) {
                    document.getElementById("firstDosePage").innerHTML = result;
                    disable(priorities);

                }
            });
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"viewBarangays2": id, "drive": driveId, "secondStubs": secondDoseStubs},
                success: function (result) {
                    document.getElementById("secondDosePage").innerHTML = result;
                    document.getElementById("barangayModal").style.display = "block";
                }
            });
        }

        function disable(group) {
            for (var idx = 0; idx < group.length; idx++) {
                var input = document.getElementsByClassName(group[idx]);
                for (var i = 0; i < input.length; i++) {
                    input[i].disabled = false;
                }
            }
        }

        function chooseInput(type) {
            console.log('In')
            if (type.value == 'percentage') {
                console.log('passed');
                var trs = document.getElementById('healthDStubs').getElementsByTagName("tr");
                for (var idx = 1; idx < trs.length; idx++) {
                    var tds = trs[idx].getElementsByTagName("td");
                    for (var index = 0; index < tds.length; index++) {
                        tds[index].children[2].style.display = "block";
                    }

                }
            }
        }

        function closeModal(modal) {
            document.getElementById(modal).style.display = "none";
        }

        function openModal(modal) {
            document.getElementById(modal).style.display = "block";
            document.body.classList.add("scrollBody");
        }

        function shiftTab(active, idle1, pageBlock, pageNone1) {
            active.style.backgroundColor = "#1D7195";
            active.style.color = "#ffffff";
            active.style.borderRadius = "12px";
            idle1.style.backgroundColor = "rgba(162,176,162,0)";
            idle1.style.color = "#000000";
            document.getElementById(pageBlock).style.display = "block";
            document.getElementById(pageNone1).style.display = "none";
            document.body.classList.add("scrollBody");
        }

    </script>


</body>
</html>
