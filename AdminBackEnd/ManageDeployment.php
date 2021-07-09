<?php
/**
 * @Author Dominic Austin S. Sicat
 */

include ("../AdminbackEnd/sessionHandling.php"); ?>

<head>
    <meta charset="UTF-8">
    <title>Manage Deployment</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
</head>
<div class="container">
    <div class="rows">
        <div class="search-box">
            <form action="ManageDeployment.php" method="GET">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"><i class="fa fa-search"></i>
                    <img id="searchButton" src="../img/magnifying-glass.png">
                </button>
            </form>
            <a href="AddDeployment.php" title="AddDeployment">Add Deployment</a>
            <a href="AddHealthD.php" title="AddHealthD">Add Health District</a>
        </div>

        <table>
            <thead>
                <tr>
                    //Enter columns here
                </tr>
            </thead>
        </table>
    </div>
</div>
<body>
