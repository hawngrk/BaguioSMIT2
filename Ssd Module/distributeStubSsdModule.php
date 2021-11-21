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
            <div class="col">
                <div class="row">
                    <div id="hDistrictContainer">
                        <h2> Vaccination Deployments </h2>

                        <table class="table table-hover" id="healthDistrictTable">
                            <?php
                            require_once("../require/getVaccinationDrive.php");
                            require_once("../require/getVaccinationSites.php");
                            foreach ($vaccination_drive as $vaccinationDrive) {
                                $id = $vaccinationDrive->getDriveId();
                                $location = $vaccinationDrive->getVaccDriveVaccSiteId();
                                $date = date("d-m-Y", strtotime($vaccinationDrive->getVaccDate()));
                                $allocated = $vaccinationDrive->getAllocated();
                                foreach ($vaccinationSites as $site) {
                                    if ($site->getVaccinationSiteId() == $location) {
                                        $locName = $site->getVaccinationSiteLocation();
                                        //echo "<option value=$id> $date - $locName </option>";
                                        echo "<tr onclick=\"updateDeploymentDetails($id)\">
                                                <th scope='col' class='barangay'> $date - $locName </th>
                                                <th scope='col-sm-auto' class='float-right'>";
                                        if ($allocated == 0) {
                                            echo "<button type='button' id='allocateButton' class='btn btn-info' onclick='view($id)'> ALLOCATE </button>";
                                        } else {
                                            echo "<button type='button' id='allocateButton' class='btn btn-info' onclick='view($id)'> VIEW </button>";
                                        }
                                        echo "     
                                                </th>
                                             </tr>";
                                    }
                                }
                            }
                            ?>
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
                <div id='stubsModal' class='content-modal tableModal'>
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
                                                   onclick="shiftTab('firstDose', 'secondDose','firstDosePage', 'secondDosePage')">First
                                                    Dose</a>
                                            </li>
                                        </div>
                                        <div class="col-sm-auto">
                                            <li role="presentation" class="doseOption2 nav-item">
                                                <a class="nav-link" id="secondDose" role="tab" data-toggle="tab"
                                                   href="#secondDose"
                                                   onclick="shiftTab('secondDose', 'firstDose', 'secondDosePage', 'firstDosePage')">Second
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
                    <div class='modal-footer' id="confirmStubs">

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

        function updateDeploymentDetails(val) {
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"deploymentId": val},
                success: function (result) {
                    document.getElementById("labelling").innerHTML = result;
                }
            });
        }

        function openModal(modal) {
            document.getElementById(modal).style.display = "block";
            document.body.classList.add("scrollBody");
        }

        function closeModal(modal) {
            document.getElementById(modal).style.display = "none";
        }

        var firstStubs = 0;
        var firstCounter = 0;
        var secondStubs = 0;
        var secondCounter = 0;
        function allocate(id) {
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"sendButton": id},
                success: function (result) {
                    document.getElementById("confirmStubs").innerHTML = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"firstDose": id},
                success: function (result) {
                    document.getElementById("firstDosePage").innerHTML = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"secondDose": id},
                success: function (result) {
                    document.getElementById("secondDosePage").innerHTML = result;
                    document.getElementById("barangayModal").style.display = "block";
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"vaccineStubs": id, "type": "firstDose"},
                dataType:"JSON",
                success: function (result) {
                    console.log(result);
                    firstStubs = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"vaccineStubs": id, "type": "firstDose"},
                dataType:"JSON",
                success: function (result) {
                    console.log(result);
                    firstCounter = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"vaccineStubs": id, "type": "secondDose"},
                dataType:"JSON",
                success: function (result) {
                    console.log(result);
                    secondStubs = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"vaccineStubs": id, "type": "secondDose"},
                dataType:"JSON",
                success: function (result) {
                    console.log(result);
                    secondCounter = result;
                }
            });
        }

        function view(id) {
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"okButton": id},
                success: function (result) {
                    document.getElementById("confirmStubs").innerHTML = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"viewFirst": id},
                success: function (result) {
                    document.getElementById("firstDosePage").innerHTML = result;
                }
            });

            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"viewSecond": id},
                success: function (result) {
                    document.getElementById("secondDosePage").innerHTML = result;
                    document.getElementById("barangayModal").style.display = "block";
                }
            });
        }

        function countStubs(num, oldnum, item, vaccine) {
            console.log(vaccine);
            console.log(firstStubs);
            console.log(firstCounter);
            var vac = vaccine.concat("", "1");

            if (oldnum == null) {
                oldnum = '';
            }

            if (num.includes("%")) {
                num = num.replace(/%/g, '');
                num = (firstStubs[`${vac}`] / 100) * num;
            }

            if (oldnum.includes("%")) {
                oldnum = oldnum.replace(/%/g, '');
                oldnum = (firstStubs[`${vac}`] / 100) * oldnum;
            }

            if (num == undefined || num == "") {
                num = 0;
            }

            if (oldnum == undefined || oldnum == "") {

                oldnum = 0;
            }

            firstCounter[`${vac}`] = firstCounter[`${vac}`] + parseInt(oldnum);
            if (num > firstCounter[`${vac}`]) {
                Swal.fire({icon: 'warning', title: 'Number exceeds number of left stubs!', confirmButtonText: 'OK', confirmButtonColor: '#007bff'});
                //alert('Number Exceeds Number Of Left Stubs!');
                firstCounter[`${vac}`] += parseInt(oldnum);
                item.value = 0;
            } else {
                firstCounter[`${vac}`] = firstCounter[`${vac}`] - parseInt(num);
            }

            console.log(firstStubs[`${vac}`]);
            console.log(firstCounter[`${vac}`]);

            document.getElementById(`${vac}`).innerHTML = "";
            document.getElementById(`${vac}`).innerHTML = vaccine.concat(" = ", firstCounter[`${vac}`]);
        }

        function countStubs2(num, oldnum, item, vaccine) {
            console.log(vaccine);
            console.log(firstStubs);
            console.log(firstCounter);
            var vac = vaccine.concat("", "2");

            if (oldnum == null) {
                oldnum = '';
            }

            if (num.includes("%")) {
                num = num.replace(/%/g, '');
                num = (secondStubs[`${vac}`] / 100) * num;
            }

            if (oldnum.includes("%")) {
                oldnum = oldnum.replace(/%/g, '');
                oldnum = (secondStubs[`${vac}`] / 100) * oldnum;
            }

            if (num == undefined || num == "") {
                num = 0;
            }

            if (oldnum == undefined || oldnum == "") {

                oldnum = 0;
            }

            secondCounter[`${vac}`] = secondCounter[`${vac}`] + parseInt(oldnum);
            if (num > secondCounter[`${vac}`]) {
                Swal.fire({icon: 'warning', title: 'Number exceeds number of left stubs!', confirmButtonText: 'OK', confirmButtonColor: '#007bff'});
                //alert('Number Exceeds Number Of Left Stubs!');
                secondCounter[`${vac}`] += parseInt(oldnum);
                item.value = 0;
            } else {
                secondCounter[`${vac}`] = secondCounter[`${vac}`] - parseInt(num);
            }

            console.log(secondStubs[`${vac}`]);
            console.log(secondCounter[`${vac}`]);

            document.getElementById(`${vac}`).innerHTML = "";
            document.getElementById(`${vac}`).innerHTML = vaccine.concat(" = ", secondCounter[`${vac}`]);
        }

        /*
        function checkZero(item, type) {
            if (type == 'first') {
                var counter = firstCounter;
            } else {
                var counter = secondCounter
            }

            if (counter == 0) {
                Swal.fire({icon: 'warning', title: 'No more stubs left!', confirmButtonText: 'OK', confirmButtonColor: '#007bff'});
                //alert('No more stubs');
                item.value = 0;
            }
        }

         */

        function shiftTab(active, idle1, pageBlock, pageNone1) {
            document.getElementById(active).style.backgroundColor = "#1D7195";
            document.getElementById(active).style.color = "#ffffff";
            document.getElementById(active).style.borderRadius = "12px";
            document.getElementById(idle1).style.backgroundColor = "rgba(162,176,162,0)";
            document.getElementById(idle1).style.color = "#000000";
            document.getElementById(pageBlock).style.display = "block";
            document.getElementById(pageNone1).style.display = "none";
            document.body.classList.add("scrollBody");
        }

        function shiftHealthDistrict(active, idles, pageBlock, pageNone) {
            document.getElementById(active).style.backgroundColor = "#1D7195";
            document.getElementById(active).style.color = "#ffffff";
            document.getElementById(active).style.borderRadius = "12px";

            for (var i = 0; i < idles.length; i++) {
                if (idles[i] != active) {
                    console.log(idles[i]);
                    document.getElementById(idles[i]).style.backgroundColor = "rgba(162,176,162,0)";
                    document.getElementById(idles[i]).style.color = "#000000";
                    document.getElementById(pageNone[i]).style.display = "none";
                }
            }
            document.getElementById(pageBlock).style.display = "block";
            document.body.classList.add("scrollBody");
        }

        function nextHealthDistrict(active, idles, pageBlock, pageNone) {
            document.getElementById(active).style.backgroundColor = "rgba(162,176,162,0)";
            document.getElementById(active).style.color = "#000000";
            document.getElementById(pageBlock).style.display = "none";

            for (var i = 0; i < idles.length; i++) {
                if (idles[i] == active) {
                    console.log(idles[i]);
                    document.getElementById(idles[i + 1]).style.backgroundColor = "#1D7195";
                    document.getElementById(idles[i + 1]).style.color = "#ffffff";
                    document.getElementById(idles[i + 1]).style.borderRadius = "12px";
                    document.getElementById(pageNone[i + 1]).style.display = "block";
                }
            }
            document.body.classList.add("scrollBody");
        }

        function backHealthDistrict(active, idles, pageBlock, pageNone) {
            document.getElementById(active).style.backgroundColor = "rgba(162,176,162,0)";
            document.getElementById(active).style.color = "#000000";
            document.getElementById(pageBlock).style.display = "none";

            for (var i = 0; i < idles.length; i++) {
                if (idles[i] == active) {
                    console.log(idles[i]);
                    document.getElementById(idles[i - 1]).style.backgroundColor = "#1D7195";
                    document.getElementById(idles[i - 1]).style.color = "#ffffff";
                    document.getElementById(idles[i - 1]).style.borderRadius = "12px";
                    document.getElementById(pageNone[i - 1]).style.display = "block";
                }
            }
            document.body.classList.add("scrollBody");
        }

        function confirmSending(drive, priorities) {
            Swal.fire({
                icon: 'info',
                title: 'Do you want to finalize stub distribution?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: '#28a745',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    archiveAllocation(drive);
                    sendStubs(drive, priorities);
                    Swal.fire({icon: 'success', title: 'Stubs successfully sent!', confirmButtonText: 'OK', confirmButtonColor: '#007bff'})
                } else if (result.isDenied) {
                    Swal.fire({icon: 'info', title: 'Cancelled', confirmButtonText: 'OK', confirmButtonColor: '#007bff'})
                }
            })
        }

        function archiveAllocation(drive) {
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"healthDistricts": drive},
                dataType: "JSON",
                success: function (result) {
                    for (var key in result) {
                        var barangays = document.getElementsByClassName(`${result[key]}`);
                        for (var i = 0; i < barangays.length; i++) {
                            var barangay = barangays[i].id;

                            var first = document.getElementById(barangay).getElementsByTagName('input');
                            for (var k = 0; k < first.length; k++) {
                                first[k].setAttribute('value', first[k].value);
                                first[k].setAttribute('disabled', true);
                            }
                            var second = document.getElementById(barangay.concat('', '2')).getElementsByTagName("input");
                            for (var m = 0; m < first.length; m++) {
                                second[m].setAttribute('value', second[m].value);
                                second[m].setAttribute('disabled', true);
                            }
                            var content1 = document.getElementById(barangay).innerHTML;
                            var content2 = document.getElementById(barangay.concat('', '2')).innerHTML;

                            console.log(content1);
                            console.log(content2);

                            $.ajax({
                                url: 'selectDeployment.php',
                                type: 'POST',
                                data: {
                                    "saveAllocation": drive,
                                    "barangay": barangay,
                                    "content1": content1,
                                    "content2": content2
                                },
                                success: function (result) {
                                    console.log(result);
                                },
                                fail: function (result) {
                                    console.log('fail');
                                }
                            });
                        }
                    }
                }
            })
        }

        function sendStubs(drive, priorities) {
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"healthDistricts": drive},
                dataType: "JSON",
                success: function (result) {
                    for (var key in result) {
                        var barangays = document.getElementsByClassName(`${result[key]}`);
                        for (var i = 0; i < barangays.length; i++) {
                            var barangay = barangays[i].id;

                            var groups = {'A1: Health Care Workers':0, 'A2: Senior Citizens':0,  'A3: Adult with Comorbidity':0, 'A4: Frontline Personnel in Essential Sector':0, 'A5: Indigent Population':0, 'Rest of Adult Population':0, 'A3. Pedia: 12-17 Years Old with Commorbidity':0, 'Rest of Pedia Population':0, 'Second Dose': 0};

                            var secondDoses = document.getElementById(barangay.concat('', '2')).getElementsByTagName("input");
                            var count2 = 0;
                            for (var n = 0; n < secondDoses.length; n++) {
                                count2 += secondDoses[n].value;
                            }

                            for (var j = 0; j < priorities.length; j++) {
                                var inputs = barangays[i].getElementsByClassName(`${priorities[j]}`);
                                var count = 0;
                                for (var x = 0; x < inputs.length; x++) {
                                    count += parseInt(inputs[x].value);
                                }
                                groups[`${priorities[j]}`] = count;
                            }
                            groups['Second Dose'] = count2;
                            $.ajax({
                                url: 'selectDeployment.php',
                                type: 'POST',
                                data: {"sendStubs": drive, "barangay": barangay, "stubs": JSON.stringify(groups)},
                                success: function (result) {
                                    console.log(result);
                                },
                                fail: function(result) {
                                    console.log('fail');
                                }
                            })
                        }
                    }

                    $.ajax({
                        url: 'selectDeployment.php',
                        type: 'POST',
                        data: {"updateDrive": drive},
                        success: function (result) {
                            console.log(result);
                        },
                        fail: function(result) {
                            console.log('fail');
                        }
                    })
                }
            });
        }
    </script>
</body>
</html>
