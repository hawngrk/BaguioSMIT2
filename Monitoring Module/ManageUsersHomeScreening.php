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
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!--jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- SWAL-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <h4 id="headingNav1">Monitoring</h4>
                    <hr>
                    <div class="timeBox">
                    <p id="time"></p>  <p id="datee"></p>
                    <script src="../includes/detailedDateAndTime.js"></script>
                    </div>
                    <hr>
                <li>
                    <a href="ScanQRMonitoring.php"><i class="fas fa-qrcode"></i> Scan QR</a>
                </li>
                <li class="active">
                    <a href="ManageUsersHomeMontoring.php"><i class="fas fa-users"></i> Manage Users</a>
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
                    <input id="searchPatientVaxPer" type="text" placeholder="Search" class="searchHome" name="searchPatient" onkeyup="searchPatient()">
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
            <div id="postVacView" class="modal-window">
                <div class="content-modal">
                <div class="modal-header">
                        <h3 class="modal-title">Post-Vaccine Vitals</h3>
                        <span id="newVaccineClose" class="close">&times;</span>
                    </div>
                    <div class="modal-body" id="patientRow"></div>
                </div>
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
            url: 'monitoringSearchProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function clickModalRow(patientId) {
        // Modal Settings
        postVacView.style.display = "block";
        newVaccineClose.onclick = function () {
            postVacView.style.display = "none";
        }

        // Fetching Data from the Database Code
        $.ajax({
            url: 'monitoringSearchProcessor.php',
            type: 'POST',
            data: {"modalRes": patientId},
            success: function (data){
                document.getElementById('patientRow').innerHTML = data;
            }
        })
    }

    function btnViewPostVac(param) {
        if (param == 'close') {
            postVacView.style.display = "none";
        } 
        
        if(param == 'add') {
            var id = document.getElementById('addButtonId').value;
            var pulse = document.getElementById('pulseR').value;
            var temp = document.getElementById('tempR').value;
            var bpDias = document.getElementById('bpRDias').value;
            var bpSys = document.getElementById('bpRSys').value;

            Swal.fire({
                    title: 'Add these vitals?',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url: 'monitoringSearchProcessor.php',
                        type: 'POST',
                        data: {'pulse':pulse, 'temp':temp, 'diastolic':bpDias, 'systolic': bpSys, 'id': id, 'vitals':'post'},
                        success: function(postVat) {
                            document.getElementById('postVacView').style.display = 'none';
                        }
                        });
                        Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
            
        }
    }
</script>

