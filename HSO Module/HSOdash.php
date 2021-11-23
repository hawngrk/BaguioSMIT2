<?php
require_once('../includes/sessionHandling.php');
checkRole('HSO');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HSO | Dashboard</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">
    <!--<link href="../css/HSOModule.css" rel="stylesheet">-->

    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!--jQuery-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <!-- SWAL-->
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
        <br>
        <ul class="list-unstyled components">
            <hr>
            <h4 id="headingNav1"> Health Service Office </h4>
            <hr>
            <h5 id="headingNav2">
                <script src="../javascript/showDateAndTime.js"></script>
            </h5>
            <hr>

            <li class="active">
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
            <li>
                <a href="ManageReportHome.php"><i class="fas fa-sticky-note"></i> Reports</a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info signOutPersonnel" onclick='logout()'>
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <div class="container-fluid" style="padding:3%;">
            <div>
                <center>
                    <h2> BAGUIO COVID-19 VACCINATION STATUS <br></h2>
                    <!--To include the word "As of Now"-->
                    <h3 id="dashBoardDate">
                        <script src="../javascript/showDateAndTime.js"></script>
                    </h3>
                </center>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    Start Date: <input type="date" id="startDate"  class="w-100" onchange="updateDashboard()" value="<?php echo date('Y-m-d'); ?>">

                </div>
                <div class="col-3">
                    End Date: <input type="date" id="endDate" class="w-100" onchange="updateDashboard()" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="cardContainer">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <h4 class="ml-3 mt-3 mb-3 text-center">ADULT POPULATION</h4>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card text-white bg-secondary mb-3 shadow" id="adultWithOneDose">
                                    <div class="card-header">
                                        <h5>With One Dose</h5>
                                    </div>
                                    <div class="card-body">
                                        250,170
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card text-white bg-primary mb-3 shadow" id="adultWithFullDose">
                                    <div class="card-header">
                                        <h5>Fully Vaccinated</h5>
                                    </div>
                                    <div class="card-body">
                                        200,025
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col">
                        <div class="row">
                            <h4 class=" ml-3 mt-3 mb-3 text-center">PEDIATIC POPULATION</h4>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card bg-light mb-3 shadow" id="pediaWithOneDose">
                                    <div class="card-header">
                                        <h5>With One Dose</h5>
                                    </div>
                                    <div class="card-body">
                                        10,996
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card text-white bg-dark mb-3 shadow" id="pediaWithFullDose">
                                    <div class="card-header">
                                        <h5>Fully Vaccinated</h5>
                                    </div>
                                    <div class="card-body">
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style="background-color: #fafafa">
                        <div class="row">
                            <canvas id="barGraphAdult" style="width:100%;max-width:500px; padding: 3%"></canvas>
                        </div>
                    </div>
                    <div class="col" style="background-color: #fafafa">
                        <div class="row">
                            <canvas id="barGraphPedia"  style="width:100%;max-width:500px; padding: 3%"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4">
                    <div class="card text-white bg-success mb-3" id="adultVaccinated">
                        <div class="card-header">
                            <h5>Total Vaccines for the Day (Adult Population)</h5>
                        </div>
                        <div class="card-body">
                            604
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-warning mb-3" id="pediaVaccinated">
                        <div class="card-header">
                            <h5>Total Vaccines for the Day (Pediatic Population)</h5>
                        </div>
                        <div class="card-body">
                            1,319
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg-danger mb-3" id="totalVaccinated">
                        <div class="card-header">
                            <h5>Total Vaccine Administered </h5>
                        </div>
                        <div class="card-body">
                            429, 423
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row rounded shadow" style="background-color: #fafafa; padding: 3%">
                <div class="col">
                    <!--TABLE PART - DASHBOARD-->
                    <table class="table border shadow" id="dashboardTable">
                        <thead class="text-center thead-dark">
                        <th scope="col"> Priority Groups</th>
                        <th scope="col"> Individuals with at least One Dose</th>
                        <th scope="col"> Fully Vaccinated</th>
                        <th scope="col"> Total</th>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <th scope="row"> A1</th>
                            <th scope="row"> 25,256</th>
                            <th scope="row"> 23, 252</th>
                            <th scope="row"> 48, 508</th>
                        </tr>
                        <tr>
                            <th scope="row"> A2</th>
                            <th scope="row"> 31,134</th>
                            <th scope="row"> 29,762</th>
                            <th scope="row"> 60,896</th>
                        </tr>
                        <tr>
                            <th scope="row"> A3</th>
                            <th scope="row"> 54,837</th>
                            <th scope="row"> 49,584</th>
                            <th scope="row"> 102,421</th>
                        </tr>
                        <tr>
                            <th scope="row"> A4</th>
                            <th scope="row"> 111,572</th>
                            <th scope="row"> 82,777</th>
                            <th scope="row"> 192,349</th>
                        </tr>
                        <tr>
                            <th scope="row"> A5</th>
                            <th scope="row"> 18,629</th>
                            <th scope="row"> 12,495</th>
                            <th scope="row"> 31,124</th>
                        </tr>
                        <tr>
                            <th scope="row"> ROAP</th>
                            <th scope="row"> 10,742</th>
                            <th scope="row"> 2,155</th>
                            <th scope="row"> 12,897</th>
                        </tr>
                        <tr>
                            <th scope="row"> A3. Pedia</th>
                            <th scope="row"> 1,912</th>
                            <th scope="row"> 0</th>
                            <th scope="row"> 1,912</th>
                        </tr>
                        <tr>
                            <th scope="row"> ROPP</th>
                            <th scope="row"> 9,084</th>
                            <th scope="row"> 0</th>
                            <th scope="row"> 9,084</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <canvas id="pieChart" style="width:100%;max-width:450px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--        <div class="container-fluid">-->
<!--            <div class="row dashboardCont">-->
<!--                <div class="col">-->
<!--                    <div class="row">-->
<!--                        <div class="col portionDash jabsPortion">-->
<!--                            <h4 class="dashHeads"> Vaccination Jabs / <strong>Today</strong></h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col portionDash vaxStats">-->
<!--                            <h4 class="dashHeads">Vaccination Status / <strong>per District</strong></h4>-->
<!--                        </div>-->
<!--                        <div class="col-sm-4 portionDash vaxStats">-->
<!--                            <h4 class="dashHeads"><strong> per Priority Group</strong></h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="col-md-auto portionDash vaxInv">-->
<!--                        <h4 class="dashHeads">Vaccines <strong>Inventory</strong></h4>-->
<!--                    </div>-->
<!--                    <div class="displayDash2 portionDash vaxCount">-->
<!--                        <h4 class="dashHeads smallBoxDash">Total Vaccines Administered</h4>-->
<!--                        <br>-->
<!--                        <h4 class="dashHeads smallBoxDash">Fully Vaccinated</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
</div>
</div>
</body>
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!--Logout script-->
<script src="../javascript/logout.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var barAdultLabels = ["A1", "A2", "A3", "A4", "A5", "A6"];
    var barAdultValues = [28, 13, 46, 262, 55, 200];
    var barAdultColors = ["red", "green", "blue", "orange", "brown", "pink"];

    const barGraphAdult = new Chart("barGraphAdult", {
        type: "bar",
        data: {
            labels: barAdultLabels,
            datasets: [{
                backgroundColor: barAdultColors,
                data: barAdultValues
            }]
        },
        options: {
            legend: {display: false},
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text : "Number of Adult Vaccinees for the Day by Priority Groups"
            }
        }
    });

    var barPediaLabels = ["A3:Pedia", "ROPP"];
    var barPediaValues = [415, 904];
    var barPediaColors = ["red", "green"];

    const barGraphPedia = new Chart("barGraphPedia", {
        type: "bar",
        data: {
            labels: barPediaLabels,
            datasets: [{
                backgroundColor: barPediaColors,
                data: barPediaValues
            }]
        },
        options: {
            legend: {display: false},
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text : "Number of Pediatic Population Group"
            }
        }
    });

    var pieLabels = ["A1", "A2", "A3", "A4", "A5", "ROAP", "A3.PEDIA", "ROPP"];
    var pieValues = [48508, 60896, 102421, 192349, 31124, 12897, 1912, 9084];
    var pieColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145",
        "#1e7146",
        "#1e7148",
        "#1e7150",

    ];

    const pieChart = new Chart("pieChart", {
        type: "pie",
        data: {
            labels: pieLabels,
            datasets: [{
                backgroundColor: pieColors,
                data: pieValues
            }]
        }
    });

    function updateDashboard() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;

        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"adult": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                document.getElementById("adultWithOneDose").children[1].innerHTML = result.split(',')[0];
                document.getElementById("adultWithFullDose").children[1].innerHTML = result.split(',')[1];
            }
        });

        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"pedia": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                document.getElementById("pediaWithOneDose").children[1].innerHTML = result.split(',')[0];
                document.getElementById("pediaWithFullDose").children[1].innerHTML = result.split(',')[1];
            }
        });

        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"barAdult": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                barAdultValues = $.parseJSON(result);
                barGraphAdult.data.datasets[0].data = barAdultValues;
                barGraphAdult.update();
            }
        });

        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"barPedia": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                barPediaValues = $.parseJSON(result);
                console.log(barPediaValues);
                barGraphPedia.data.datasets[0].data = barPediaValues;
                barGraphPedia.update();
            }
        });

        var sum1 = 0;
        var sum2 = 0;
        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"barAdult": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                var values = $.parseJSON(result);
                for (var i = 0; i < values.length; i++) {
                    sum1 += values[i];
                }
                document.getElementById("adultVaccinated").children[1].innerHTML = sum1;

                $.ajax({
                    url: 'HSOdashProcessor.php',
                    type: 'POST',
                    data: {"barAdult": 1, "startDate": startDate, "endDate": endDate},
                    success: function (result) {
                        var values = $.parseJSON(result);
                        for (var i = 0; i < values.length; i++) {
                            sum2 += values[i];
                        }
                        document.getElementById("pediaVaccinated").children[1].innerHTML = sum2;
                        document.getElementById("totalVaccinated").children[1].innerHTML = parseInt(sum1) + parseInt(sum2);
                    }
                });
            }
        });

        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"table": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                document.getElementById("dashboardTable").innerHTML = result;
            }
        });

        $.ajax({
            url: 'HSOdashProcessor.php',
            type: 'POST',
            data: {"pie": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                console.log(result);
                pieValues = $.parseJSON(result);
                console.log(pieValues);
                pieChart.data.datasets[0].data = pieValues;
                pieChart.update();
            }
        });
    }
</script>
</html>
