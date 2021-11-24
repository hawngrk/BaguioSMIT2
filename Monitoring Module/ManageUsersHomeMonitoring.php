<?php //
require_once('../includes/sessionHandling.php');
checkRole('Monitoring');
//?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Monitoring | Manage Patients</title>

    <!-- Our Custom CSS -->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/VaccinationPersonnelModule.css" rel="stylesheet">

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
    <script src="../javascript/openModal.js"></script>
    <script src="../javascript/closeModal.js"></script>
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
                <h4 id="headingNav1">Monitoring</h4>
                    <hr>
                    <div class="timeBox">
                    <p id="time"></p>  <p id="datee"></p>
                    <script src="../javascript/detailedDateAndTime.js"></script>
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
                                        onchange="filterCategoryGroup(this.value)">
                                    <option value='' selected disabled hidden>Filter By</option>
                                    <option value='' disabled>Select Category Group</option>
                                    <option value="All"> All</option>
                                    <?php
                                    require_once("../require/getPriorityGroup.php");
                                    foreach ($priorityGroups as $pg) {
                                        $id = $pg->getPriorityGroupId();
                                        $category = $pg->getPriorityGroup();
                                        echo "<option value=$id> $category </option>";
                                    }
                                    ?>
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
                        <th class="columnName">ID</th>
                        <th class="columnName">Patient Name</th>
                        <th class="columnName">Category</th>
                        <th class="columnName">Complete Address</th>
                        <th class="columnName">Contact Number</th>
                        <th class="columnName">Action</th>
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
            <div id="postVacView" class="modal-window">
                <div class="content-modal">
                <div class="modal-header">
                        <h3 class="modal-title">Post-Vaccine Vitals</h3>
                        <span id="newVaccineClose" class="close" onclick="closeModal('postVacView')"><i class='fas fa-window-close'></i></span>
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
    function filterCategoryGroup(filter){
        $.ajax({
            url: '../includes/filterProcessor.php',
            type: 'POST',
            data: {"filterScreeningPatient": filter},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        })
    }

    function sortByName(sort) {
        var selectedSort = sort.value;
        $.ajax({
            url: '../includes/sortingProcessor.php',
            type: 'POST',
            data: {"sortScreeningPatient": selectedSort},
            success: function (result) {
                document.getElementById("patientTable").innerHTML = result;
            }
        })
    }

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
        openModal('postVacView');

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

    function btnViewPostVac() {
        var id = document.getElementById('addButtonId').value;
        var pulse = document.getElementById('pulseR').value;
        var temp = document.getElementById('tempR').value;
        var oxygen = document.getElementById('oxygenSat').value;
        var bpDias = document.getElementById('bpRDias').value;
        var bpSys = document.getElementById('bpRSys').value;

        Swal.fire({
            title: 'Add these vitals?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            confirmButtonColor: '#28a745',
            denyButtonColor: '#dc3545',
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'screeningProcessor.php',
                    type: 'POST',
                    data: {'pulse': pulse, 'temp': temp, 'oxygen': oxygen ,'diastolic': bpDias, 'systolic': bpSys, 'id': id},
                    success: function (preVat) {
                        console.log(preVat)
                        document.getElementById('preVacView').style.display = 'none';
                    }
                });
                Swal.fire({
                    icon: 'success',
                    text: 'Saved!',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#077bff',
                });
            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Changes you made will not be saved.',
                    showDenyButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#077bff',
                });
            }
        })
    }

</script>
<!--Logout script-->
<script src="../javascript/logout.js"></script>

