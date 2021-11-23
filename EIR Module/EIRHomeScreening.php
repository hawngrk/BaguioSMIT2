<?php 
require_once('../includes/sessionHandling.php');
checkRole('EIR');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>EIR | Home</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/EIRModule.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">


    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
            <h4 id="headingNav1">Entry Immunization Register</h4>
            <hr>
            <div class="timeBox">
                    <p id="time"></p>  <p id="datee"></p>
                    <script src="../javascript/detailedDateAndTime.js"></script>
                    </div>
            <hr>
            <li class="active">
                <a href="../EIR Module/EIRHomeScreening.php"><i class="fas fa-home"></i></i> Home</a>
            </li>
            <li>
                <a href="../EIR Module/EIRManageUsersScreening.php"><i class="fas fa-users"></i> Manage Users</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info signOutPersonnel" onclick="logout()">
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
                </div>
            </div>
        </div>
    </div>
</div>

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


    function updateDashboard() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;

        $.ajax({
            url: '../HSO Module/HSOdashProcessor.php',
            type: 'POST',
            data: {"adult": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                document.getElementById("adultWithOneDose").children[1].innerHTML = result.split(',')[0];
                document.getElementById("adultWithFullDose").children[1].innerHTML = result.split(',')[1];
            }
        });

        $.ajax({
            url: '../HSO Module/HSOdashProcessor.php',
            type: 'POST',
            data: {"pedia": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                document.getElementById("pediaWithOneDose").children[1].innerHTML = result.split(',')[0];
                document.getElementById("pediaWithFullDose").children[1].innerHTML = result.split(',')[1];
            }
        });

        $.ajax({
            url: '../HSO Module/HSOdashProcessor.php',
            type: 'POST',
            data: {"barAdult": 1, "startDate": startDate, "endDate": endDate},
            success: function (result) {
                barAdultValues = $.parseJSON(result);
                barGraphAdult.data.datasets[0].data = barAdultValues;
                barGraphAdult.update();
            }
        });

        $.ajax({
            url: '../HSO Module/HSOdashProcessor.php',
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
            url: '../HSO Module/HSOdashProcessor.php',
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

    }
</script>
</body>
</html>
