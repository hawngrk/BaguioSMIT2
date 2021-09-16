<?php

require_once("../require/getVaccinationDrive.php");
require_once("../require/getVaccinationSites.php");


if (isset($_POST['deploymentId'])) {
    $driveId = $_POST['deploymentId'];
    $query = "SELECT vaccination_date,location,vaccine_name FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id JOIN vaccine_deployment ON vaccine_deployment.drive_id = vaccination_drive.drive_id JOIN vaccine ON vaccine_deployment.vaccine_id = vaccine.vaccine_id WHERE vaccination_drive.drive_id = $driveId ";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($schedule, $site, $brand);
    $stmt->fetch();
    $stmt->close();

    echo "<h2>Deployment Summary</h2>
            <h5> Site: $site </h5>
            <br>
            <h5> Brand: $brand </h5>
            <br>
            <h5> Schedule: $schedule</h5>";
}

if (isset($_POST['healthDistrict'])) {
    $driveId = $_POST['healthDistrict'];
    $query = "SELECT health_district_name,health_district.health_district_id FROM vaccination_drive JOIN health_district_drives ON vaccination_drive.drive_id = health_district_drives.drive_id JOIN health_district ON health_district_drives.health_district_id = health_district.health_district_id WHERE vaccination_drive.drive_id = $driveId";

    echo "<tbody>";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrict, $healthDistrictId);
    while ($stmt->fetch()) {
        echo "<tr>
                    <th scope='row' class='barangay'> $healthDistrict </th>
                     <th scope='row'>
                      <button type='button' id='allocateButton' class='btn btn-info' onclick='viewBarangays($healthDistrictId)'> ALLOCATE </button>
                      </th>
                      </tr>";
    }
    echo "</tbody>";
}

if (isset($_POST['viewBarangays'])) {
    $healthDistrictId = $_POST['viewBarangays'];
    //$healthDistrict = $_POST['healthDistrict'];

    $query = "SELECT barangay_name FROM barangay WHERE health_district_id = $healthDistrictId";

    echo "
            <div class='content-modal'>
                <div class='modal-header'>
                <h3> $healthDistrict </h3>
                <span id='closeModal' class='close' onclick='closeModal()'> &times;</span>
                </div>
                <div class='modal-body'>
                    <div class='stubNumbersContainer'>
                        <div class='row'>
                            <div class='col'>
                                <center> <h6> BARANGAY LIST </h6></center>
                            </div>
                            <div class='col'>
                                <center> <h6> Enter the number of stubs per Category </h6></center>
                            </div>
                        </div>
                        
                        <table class='table table-borderless'>
                            <thead>
                                <tr>
                                    <th scope='col'> Covered Barangays </th>
                                    <th scope='col'> A1 </th> 
                                    <th scope='col'> A2 </th>
                                    <th scope='col'> A3 </th>
                                    <th scope='col'> A4 </th>
                                    <th scope='col'> A5 </th> 
                                    <th scope='col'> ROP </th>   
                                </tr>
                            </thead> ";

    echo "<tbody>";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($barangay);
    while ($stmt->fetch()) {
        echo "            <tr>
                                <th scope='row'> $barangay</th>
                                <td><input type='number' min='0' max='100'></td>
                                <td><input type='number' min='0' max='100'></td>
                                <td><input type='number' min='0' max='100'></td>
                                <td><input type='number' min='0' max='100'></td>
                                <td><input type='number' min='0' max='100'></td>
                                <td><input type='number' min='0' max='100'></td>
                          </tr>";
    }
    $stmt->close();

    echo "             </tbody>
                        </table>
                    </div>
                </div>
                <div class='modal-footer'>
                <button id='sendStubs' type='button' class='btn btn-success'><i
                                    class='fas fa-paper-plane'></i> Send Stubs </button>
                </div>
            </div>";
}




