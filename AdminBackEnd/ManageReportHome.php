<?php

/***
 * @Author Hudson Kit P. Natividad
 * Date Created: June 28, 2021
 * Description: Main page of Manage Reports
 */

include ("../AdminbackEnd/sessionHandling.php"); ?>
<head>
    <meta charset="UTF-8">
    <title>Manage Report</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/cssAdmin.css" rel="stylesheet">
</head>
<body>
<div class="top">
    <button class="btn">
        <img id="notif" src="../img/notif.png">
    </button>

    <button class="btn">
        <img id="settings" src="../img/settings.png">
    </button>
</div>

<div class="second">
    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Search" name="search">
            <button type="submit"><i class="fa fa-search"></i>
                <img id="searchButton" src="../img/magnifying-glass.png">
            </button>
        </form>
    </div>

    <form action="">
        <button class="button4" type="button">
            Generate Report
        </button>
    </form>
</div>

<div class="tables table table-hover">
    <div class='path-links'>
        <pre><a href='index.php' target='_self'>Dashboard</a> / <a href='albums.php' target='_self'><b>Manage Report</b></a></pre>
    </div>
    <div id="manageReportHome" class="overflow-auto">
        <table id="manageReportTable" class='tables'>
            <thead class='thead-dark'>
            <tr>
                <th scope='col'>INSERT COLUMN NAME</th>
                <th scope='col'>INSERT COLUMN NAME</th>
                <th scope='col'>INSERT COLUMN NAME</th>
                <th scope='col'>INSERT COLUMN NAME</th>
                <th scope='col'>INSERT COLUMN NAME</th>
                <th scope='col'></th>
            </tr>
            </thead>
            <tbody>
            <?php
            require 'require/getReport.php';
           // foreach ($albums as $alb) {
              //  $albumid = $alb->get_albumid(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
              //  $albumimg = $alb->get_albumimg(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
              //  $albumname = $alb->get_albumname(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
             //   $artistname = $alb->get_artistname(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
             //   $releaseddate = $alb->get_releaseddate(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON


        //        echo "<tr '>
                          // insert the javascript for this table - NATIVIDAD HUDSON KIT P.
        //    }
            ?>
            </tbody>
        </table>
</div>

</body>

<?php include '../includes/footer.php'?>