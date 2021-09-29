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
                    <h5 id="headingNav2">September 17, 2021 | 01:24 PM</h5>
                    <hr>
                <li class="active">
                    <a href="../Monitoring Module/ScanQRMonitoring.php"><i class="fas fa-qrcode"></i> Scan QR</a>
                </li>
                <li>
                    <a href="../Monitoring Module/ManageUsersHomeScreening.php"><i class="fas fa-users"></i> Manage Users</a>
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

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info" onclick="Toggle()">
                        <i class='fas fa-angle-left'></i> Menu
                    </button>
                </div>
            </nav>
            <h2 id="scannerTxt">Scan Patients QR Code</h2>
            <video id="preview"></video>
            <script type="text/javascript" src="../javascript/instascan.min.js"></script>
            <script type="text/javascript">
            let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
            });

            scanner.addListener('scan', function (content) {
                window.open(content,"_self")
                console.log(content)
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
                <i class="fas fa-info-circle "></i>
                <input id="passportId" type="text" placeholder="Passport ID"><i class="fas fa-sign-in-alt""></i>
            </div>
            

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

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

<style>
    
    #passportInt {
        width: 40%;

        background-color: transparent;
        margin-left:31%;
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
