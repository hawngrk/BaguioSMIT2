<?php
include_once("../includes/database.php") 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Title -->
        <title>SMIT+(Barangay) | Notification Summary</title>

        <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
        <!-- Our Custom CSS -->
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

    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-brand-icon">
                        <img style="width:150px;" src="../img/SMIT+.png" alt="Baguio Logo">
                    </div>
                </div>

                <ul class="list-unstyled components">
                    <h4 id="headingNav1">Bakakeng North/Sur</h4>
                    <hr>
                    <h5 id="headingNav2">September 17, 2021 | 01:24 PM</h5>
                    <hr>
                    <li>
                        <a href="../Barangay Module/homeBarangayModule.php">
                            <i class="fas fa-home"></i>
                            Home</a>
                    </li>
                    <li>
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
                <li class="active">
                    <a href="../Barangay Module/notificationSummaryBarangayModule.php">
                        <i class="fas fa-envelope-open"></i>
                        Notification Summary</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <button type="button" class="btn btn-info">
                    <span>Sign Out</span>
                </button>
            </ul>
        </nav>

        <!-- Top Nav Bar -->

        <div id="content">
            <div class="topNav row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button
                            type="button"
                            id="sidebarCollapse"
                            class="btn btn-info"
                            onclick="Toggle()">
                            <i class='fas fa-angle-left'></i>
                            Menu
                        </button>

                        <button class="btnTop">
                            <i class="fas fa-bell"></i>
                        </button>

                        <button class="btnTop btnBell">
                            <i class="fas fa-cog"></i>
                        </button>
                    </div>
                </nav>
            </div>

            <!--Search Input and Button-->
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search" name="search">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <!--Page Content-->
            <table class="table table-row table-hover tableBrgy">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Complete Address</th>
                        <th scope="col">Contact Number</th>
                    </tr>
                </thead>
            <?php
                require_once "PHP processes/showNotifiedPatients.php";
                ?>
            </table>
        </div>
    </div>
</body>
</html>
<style>
.topNav {
    display: block;
}
</style>