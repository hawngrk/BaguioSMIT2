<?php 
//require_once('../includes/sessionHandling.php');
//checkRole('Screening');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Screening | Manage Users</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/VaccinationPersonnelModule.css" rel="stylesheet">

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

        <ul class="list-unstyled components">
            <hr>
            <h4 id="headingNav1">Screening</h4>
            <hr>
            <div class="timeBox">
                <p id="time"></p>
                <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
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
            <button type="button" class="btn btn-info signOutPersonnel" onclick='logout()'>
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <div class="tableContainer">
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input  id="searchPatientVaxPer" type="search" name="searchPatient" class="form-control" placeholder="Search" onkeyup="searchPatient()"/>
                            <!--                            <button type="submit" class="buttonTop5" name="managePatientBtn" onclick="searchPatient()">  <i class="fas fa-search"></i> </button>-->
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select filterButton" id="filterCat" name="filterCategory"
                                        onchange="filterCategory(this)">
                                    <option value="" selected disabled hidden>Filter By</option>
                                    <option value="" disabled >Select Category Group</option>
                                    <option value="None"> None </option>
                                    <option value="A1"> A1 </option>
                                    <option value="A2"> A2 </option>
                                    <option value="A3"> A3 </option>
                                    <option value="A4"> A4 </option>
                                    <option value="A5"> A5 </option>
                                    <option value="A6"> A6 </option>
                                    <option value="A7"> A7 </option>
                                </select>
                            </div>
                            <div class="sfDiv col-md-1.5 my-auto">
                                <select class="form-select sortButton" id="sortPatientName" name="sortPatient"
                                        onchange="sortByName(this)">
                                    <option value="" selected disabled hidden>Sort By</option>
                                    <option value="" disabled >Select Category Group</option>
                                    <option value="None"> None </option>
                                    <option value="Asc">Name Asc</option>
                                    <option value="Desc">Name Desc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Table Part-->
            <div class="tableScreening shadow tableScroll4">
                <table class="table table-row table-hover" id="patientTable">
                    <thead>
                    <tr class="table">
                        <th> Patient ID</th>
                        <th>Patient Name</th>
                        <th>Category</th>
                        <th>Complete Address</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                    include '../includes/showPatientDeets.php';
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

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
    $('#searchPatientVaxPer').on('input', function(e) {
        if('' == this.value) {
            $.ajax({
                url: 'screeningProcessor.php',
                type: 'POST',
                data: {"search": ""},
                success: function (result) {
                    document.getElementById("patientTable").innerHTML = result;
                }
            });
        }
    });

    function searchPatient() {
        var textSearch = document.getElementById("searchPatientVaxPer").value;
        $.ajax({
            url: 'screeningProcessor.php',
            type: 'POST',
            data: {"search": textSearch},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        });
    }

    function filterCategory(filter){
        var selectedFilter = filter.value;
        $.ajax({
            url: 'screeningProcessor.php',
            type: 'POST',
            data: {"filter": selectedFilter},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        })
    }

    function sortByName(sort){
        var selectedSort = sort.value;
        $.ajax({
            url: 'screeningProcessor.php',
            type: 'POST',
            data: {"sort": selectedSort},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        })
    }

    function clickModalRow(patientId) {
        // Modal Settings 
        preVacView.style.display = "block";
        newVaccineClose.onclick = function () {
            preVacView.style.display = "none";
        }

        // Fetching Data from the Database Code
        $.ajax({
            url: 'screeningProcessor.php',
            type: 'POST',
            data: {"modalScreening": patientId},
            success: function (data) {
                console.log(data);
                document.getElementById('patientRow').innerHTML = data;
            },
            error: function(data) {
                console.log(data);
            }
        })
    }

    function btnViewPostVac(param) {
        if (param == 'close') {
            preVacView.style.display = "none";
        }

        if (param == 'add') {
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
                        url: 'screeningSearchProcessor.php',
                        type: 'POST',
                        data: {'pulse': pulse, 'temp': temp, 'diastolic': bpDias, 'systolic': bpSys, 'id': id},
                        success: function (preVat) {
                            document.getElementById('preVacView').style.display = 'none';
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
<!--Logout script-->
<script src="../javascript/logout.js"></script>