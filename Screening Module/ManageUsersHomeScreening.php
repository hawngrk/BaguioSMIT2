<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Baguio SMIT+</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
     <!--jQuery-->
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
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
                    <img style="width:150px;" src="../img/SMIT+.png" alt="Baguio Logo">
                </div>
            </div>

            <ul class="list-unstyled components">
                <h4 id="headingNav1">Screening</h4>
                    <hr>
                    <div class="timeBox">
                    <p id="time"></p>  <p id="datee"></p>
                    </div>
                    <hr>
                <li>
                    <a href="../Screening Module/ScanQRScreening.php"><i class="fas fa-qrcode"></i></i> Scan QR</a>
                </li>
                <li class="active">
                    <a href="../Screening Module/ManageUsersHomeScreening.php"><i class="fas fa-users"></i> Manage Users</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <button type="button" class="btn btn-info signOutPersonnel">
                    <span>Sign Out</span>
                </button>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light upperBoxOG">
                <div class="container-fluid upperBox">

                    <!-- <button type="button" id="sidebarCollapse" class="btn btn-info" onclick="Toggle()">
                        <i class='fas fa-angle-left'></i> Menu
                    </button> -->

                    <button class="btnTop">
                    <i class="fas fa-bell"></i>
                    </button>

                    <button class="btnTop">
                    <i class="fas fa-cog"></i>
                    </button>
                </div>
            </nav>

             <!--Search Input and Button-->
             <div class="search-container">
                    <input id="searchPatientVaxPer" type="text" placeholder="Search" class="searchHome"name="searchPatient" onkeyup="searchPatient()">
                    <button type="submit" id="searchPatientBtn" name="searchPatientBtn" onclick="searchPatient()">
                        <i class="fa fa-search"></i>
                    </button>
            </div>

            <!--Table Part-->
            <table class="table table-row table-hover tableBrgy" id="patientTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Complete Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                include '../includes/showPatientDeets.php';
                ?>
            </table>

            <div id="preVacView" class="modal-window">
                <div class="content-modal">
                <div class="modal-header">
                        <h4 class="modal-title">Pre-Vaccine Vitals</h4>
                        <span id="newVaccineClose" class="close">&times;</span>
                    </div>
                    <div class="modal-body" id="patientRow"></div>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>

<script>
     function searchPatient() {
        var textSearch = document.getElementById("searchPatientVaxPer").value; 
        $.ajax({
            url: 'screeningSearchProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function clickModalRow(patientId) {
        // Modal Settings 
        preVacView.style.display = "block";
        newVaccineClose.onclick = function () {
            preVacView.style.display = "none";
        }

        // Fetching Data from the Database Code
        $.ajax({
            url: 'screeningSearchProcessor.php',
            type: 'POST',
            data: {"modalScreening": patientId},
            success: function (data){
                document.getElementById('patientRow').innerHTML = data;
            }
        })
    }

    function btnViewPostVac(param) {
        if (param == 'close') {
            preVacView.style.display = "none";
        } else {
            var pulse = getElementById('pulseR');
            var temp = getElementById('tempR');
            var bp = getElementById('bpR');

            $.ajax({
                url: 'screeningSearchProcessor.php',
                type: 'POST',
                data: {'pulse':pulse, 'temp':temp, 'bp':bp},
                success: function(postVat) {
                    alert('Successfully Added to the Database.');
                }
            })
        }
    }
</script>

<script> 
    // var timeDisplay = document.getElementById("time");

    // function refreshTime() {
    // var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    // var dateString = new Date().toLocaleString(undefined, options);

    // timeDisplay.innerHTML = dateString;
    // }

    var timeDisplay = document.getElementById("time");
    var dateDisplay = document.getElementById("datee");

    function refreshTime() {
        var dateString = new Date().toLocaleTimeString("en-US", {timeZone: "Asia/Manila"});
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var timeString = new Date().toLocaleDateString(undefined, options);
        // var formattedString = dateString.replace(", ", " - ");
        timeDisplay.innerHTML = dateString;
        dateDisplay.innerHTML = timeString;
    }

    setInterval(refreshTime, 1000);

    </script>

<!-- <script type="text/javascript">
$(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
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
</script> -->


<!-- <script>
    function searchPatient() {
        var textSearch = document.getElementById("searchPatientVaxPer").value; 
        $.ajax({
            url: 'screeningSearchProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function clickModalRow(patientId) {
        // Modal Settings 
        preVacView.style.display = "block";
        newVaccineClose.onclick = function () {
            preVacView.style.display = "none";
        }
        // Fetching Data from the Database Code
        $.ajax({
            url: 'screeningSearchProcessor.php',
            type: 'POST',
            data: {"modalScreening": patientId},
            success: function (data){
                document.getElementById('patientRow').innerHTML = data;
            }
        })
    }
</script> -->
