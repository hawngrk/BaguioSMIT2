<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>SMIT+(SSD) | Stub Distribute</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/ssdStyle.css" rel="stylesheet">

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
            <h4 id="headingNav1"> Special Service Division</h4>
            <hr>
            <h5 id="headingNav2"> September 17, 2021 | 01:24 PM</h5>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info" onclick="Toggle()">
                    <i class='fas fa-angle-left'></i> Menu
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
        <div class="row">
            <div class="col">
                <div class="row">
                    <div id="selectDeployment">
                        <h5>Select Deployment:</h5>
                        <select id="selectDeploymentSSD" onchange="updateDeploymentDetails(this.value)">
                            <option value='' disabled selected hidden> Click here to select deployment </option>
                        <?php
                        require_once("../require/getVaccinationDrive.php");
                        foreach ($vaccination_drive  as $vaccinationDrive) {
                            $id = $vaccinationDrive->getDriveId();
                            echo "<option value=$id> $id </option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row healthDistrict">
                    <div id="healthDistrictContainer">
                        <h2 class="labels"> Health Center Districts: </h2>
                        <table class="table table-hover" id="healthDistrictTable">
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div id="deploymentSummary">
                        <div class="labels" id="labelling">
                            <h2>Deployment Summary</h2>
                            <h5> Site: </h5>
                            <br>
                            <h5> Brand: </h5>
                            <br>
                            <h5> Schedule: </h5>
                        </div>
                    </div>
                </div>
                <!--<div class="row healthDistrict">
                    <div id="deploymentQueue">
                        <div class="labels">
                            <h2>Deployment Queue</h2>
                            <p> QUEZON HILL HEALTH DISTRICT CENTER - Deployment 4</p>
                            <p> IRISAN HEALTH DISTRICT CENTER - Deployment 5</p>
                        </div>
                    </div>
                </div>-->
            </div>

            <div id="barangayModal" class="modal-window">
            </div>
        </div>
    </div>
    <script>

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
        function viewBarangays(id){
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                data: {"viewBarangays": id},
                success: function (result) {
                    document.getElementById("barangayModal").innerHTML = result;
                    document.getElementById("barangayModal").style.display ="block";
                }
            });
        }

        function closeModal(){
            $.ajax({
                url: 'selectDeployment.php',
                type: 'POST',
                success: function () {
                    document.getElementById("barangayModal").style.display ="none";
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

</body>
</html>
