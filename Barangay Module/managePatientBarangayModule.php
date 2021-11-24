<?php
require_once('../includes/sessionHandling.php');
checkRole('Barangay');

$accountDetails = $_SESSION['account'];
$barangay_id = $accountDetails['barangay_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>Barangay | ManagePatient</title>

    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/BarangayModule.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Bootstrap-->
    <script
            crossorigin="anonymous"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script
            crossorigin="anonymous"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script
            crossorigin="anonymous"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link
            crossorigin="anonymous"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script
            defer="defer"
            src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script
            defer="defer"
            src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="../javascript/showDateAndTime.js"> </script>

</head>

<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand-icon">
            <img src="../img/logoo.png" style="width: 104%; margin-bottom:-19%; margin-top:-5%;" alt="Baguio Logo">
            </div>
        </div>
        <br>
        <ul class="list-unstyled components">
        <hr>
            <?php
            $accountDetails = $_SESSION['account'];
            $barangay = $accountDetails['barangay'];
            echo "<h4 id='headingNav1'>$barangay</h4>";
            ?>
            <hr>
            <div class="timeBox">
                <p id="time"></p>
                <p id="datee"></p>
                <script src="../javascript/detailedDateAndTime.js"></script>
            </div>

            <hr>
            <h5 id="headingNav2"></h5>
            <hr>
            <li>
                <a href="../Barangay Module/homeBarangayModule.php">
                    <i class="fas fa-home"></i>
                    Home</a>
            </li>
            <li class="active">
                <a href="../Barangay Module/managePatientBarangayModule.php">
                    <i class="fas fa-user"></i>
                    </i>
                    Manage Patient</a>
            </li>

            <li>
                <a href="../Barangay Module/patientQueueBarangayModule.php">
                    <i class="fas fa-clipboard-list"></i>
                    Patient Queue</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <button type="button" class="btn btn-info" onclick="logout()">
                <span>Sign Out</span>
            </button>
        </ul>
    </nav>

    <!-- Top Nav Bar -->
    <div id="content">
        <div id="qrView1" class="modal-window">
            <div class="content-modal">
                <div class="modal-header">
                    <h3 class="modal-title">Patient Information</h3>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal('qrView1')"><i class='fas fa-window-close'></i></button>
                </div>
                <div class="modal-body" id="qr"></div>
            </div>
        </div>

        <h2 id="scannerTxt">Scan Patients QR Code</h2>
        <video id="preview"></video>
        <script type="text/javascript" src="../javascript/instascan.min.js"></script>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            scanner.addListener('scan', function (content) {
                qr(content);

            });

            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        </script>
        <div id="passportInt">
            <h2 id="inputTxt"> Input Manually </h2>
            <div>
                <i class="fas fa-info-circle "></i>
                <input id="passportId" type="text" placeholder="Passport ID">
                <button class="buttonTransparent" onclick="passport(document.getElementById('passportId').value)"><i class="fas fa-sign-in-alt"></i></button>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">

    function qr(content){
        console.log(content)
        $.ajax({
            url: 'ManagePatientProcessor.php',
            method: 'POST',
            data: {patientId: content},
            success: function (result) {
                document.getElementById('qrView1').style.display = "block";
                document.getElementById('qr').innerHTML = result;
                document.body.classList.add("scrollBody");
            }
        })
    }

    function passport(passportId){
        $.ajax({
            url: 'ManagePatientProcessor.php',
            method: 'POST',
            data: {patientId: passportId},
            success: function (result) {
                document.getElementById('qrView1').style.display = "block";
                document.getElementById('qr').innerHTML = result;
                document.body.classList.add("scrollBody");
            }
        })
    }

    function queuePatient(id){
        $.ajax({
            url: 'ManagePatientProcessor.php',
            method: 'POST',
            data: {queue: id},
            success: function (result) {
                closeModal('qrView1');
            }
        })
    }

    function closeModal(modal){
        document.getElementById(modal).style.display = "none";
        document.body.classList.remove("scrollBody");
    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../javascript/logout.js"></script>
</body>

</html>

<style>

    #passportInt {
        width: 55%;
        background-color: transparent;
        margin-left: 23%;
    }

    #passportId{
        border-bottom: solid black 1px;
        width: 90%;
    }

    input[type='text']::placeholder
    {
        text-align: center;      /* for Chrome, Firefox, Opera */
    }

    #scannerTxt {
        text-align: center;
    }

    #inputTxt{
        text-align: center;
        margin-top: 3%;
    }

    #preview {
        border-radius: 12px;
        width: 50%;
        height: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
