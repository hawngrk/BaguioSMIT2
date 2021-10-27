<?php

require_once("../require/getVaccinationDrive.php");
require_once("../require/getVaccinationSites.php");
include("../includes/database.php");


if (isset($_POST['deploymentId'])) {
    require "../require/getHealthDistrictDrives.php";
    require "../require/getHealthDistrict.php";
    $driveId = $_POST['deploymentId'];

    $query = "SELECT vaccination_drive.vaccination_date, vaccination_sites.location, vaccination_drive.first_dose_stubs, vaccination_drive.second_dose_stubs FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.drive_id = $driveId ";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($schedule, $site, $firstStubs, $secondStubs);
    $stmt->fetch();
    $stmt->close();


    echo "
            <h5> Vaccination Site/Location: </h5> <p> $site </p>
            <h5> Scheduled Date: </h5> <p> $schedule </p>
            <h5>Priority Group: </h5> ";

    $query2 = "SELECT priority_groups.priority_group FROM priority_drive JOIN priority_groups ON priority_drive.priority_id = priority_groups.priority_group_id WHERE priority_drive.drive_id = $driveId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query2);
    $stmt->execute();
    $stmt->bind_result($group);
    while ($stmt->fetch()) {

        echo"<p> $group</p><br>";
    }
            echo"<h5> First Dose Number of Stubs: </h5> <p> $firstStubs </p>
                <h5> Second Dose Number of Stubs: </h5> <p> $secondStubs </p>
            <h5> Health Districts: </h5>";

    foreach ($healthDistrictDrives as $hdd){
        if($hdd->getDriveId() == $driveId){
            foreach ($health_district as $hd){
                if ($hd->getHealthDistrictId() == $hdd->getDistrictId()){
                    $hName = $hd->getHealthDistrictName();

                    echo "
                                <li>
                                    <label>$hName</label>
                                </li>
                                ";
                }
            }
        }
    }

}

if (isset($_POST['healthDistrict'])) {
    include "../require/getVaccinationDrive.php";
    $driveId = $_POST['healthDistrict'];
    $priorities = [];

    foreach ($vaccination_drive as $vd){
        if($vd->getDriveId() == $driveId){
            $firstDoseStubs = $vd->getFirstDoseStubs();
            $secondDoseStubs = $vd->getSecondDoseStubs();
        }
    }



    $query2 = "SELECT priority_groups.priority_group FROM priority_groups JOIN priority_drive ON priority_groups.priority_group_id = priority_drive.priority_id WHERE priority_drive.drive_id = $driveId";
    $stmt = $database->stmt_init();
    $stmt->prepare($query2);
    $stmt->execute();
    $stmt->bind_result($priorityGroup);
    while ($stmt->fetch()){
        $priorities[] = $priorityGroup;
    }

    $priorityGroups = json_encode($priorities);


    $query = "SELECT health_district.health_district_name, health_district.health_district_id FROM vaccination_drive JOIN health_district_drives ON vaccination_drive.drive_id = health_district_drives.drive_id JOIN health_district ON health_district_drives.health_district_id = health_district.health_district_id WHERE vaccination_drive.drive_id = $driveId";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrict, $healthDistrictId);
    while ($stmt->fetch()) {
        echo "<tr>
                    <th scope='col' class='barangay'> $healthDistrict </th>
                    <th scope='col-sm-auto' class='float-right'>
                      <button type='button' id='allocateButton' class='btn btn-info' onclick='viewBarangays( $healthDistrictId, $driveId, $priorityGroups, $firstDoseStubs, $secondDoseStubs)'> ALLOCATE </button>
                      </th>
                      </tr>";
    }

}

if (isset($_POST['viewBarangays'])) {
    require '../require/getHealthDistrict.php';

    $healthDistrictId = $_POST['viewBarangays'];
    $vaccDrive = $_POST['drive'];
    $first_dose = $_POST['firstStubs'];
    $second_dose = $_POST['secondStubs'];

    foreach ($health_district as $hd){
        if($hd->getHealthDistrictId() == $healthDistrictId){
            $healthDistrict = $hd->getHealthDistrictName();
        }
    }

    echo "
            <div id='stubsModal' class='content-modal'>
                <div class='modal-header'>
                <h3 style='padding-right:50%'> $healthDistrict </h3>
                    <select name='Type' style='width: 14%' onchange='(this)'>
                        <option value='percentage'>Percentage </option>
                        <option value='whole'>Whole Number</option>
                    </select>
                <button id='closeModal' class='close' onclick='closeModal(\"barangayModal\")'> &times;</button>
                </div>
                <div class='modal-body' id='healthDStubs'>


                    <div class='stubNumbersContainer'>
                    <div id='counter' class='bold'>
                               <center><p><i class='fas fa-ticket-alt'></i> number of Stubs Left: $first_dose</p> </center>
                            </div>
                        <div class='row'>
                            <div class='col bold barangayList'>
                                 <p> BARANGAY LIST </p>
                            </div>
                            <div class='col bold barangayList'>
                                <p> Priority Groups </p>
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

    $query = "SELECT barangay_id, barangay_name FROM barangay WHERE health_district_id = $healthDistrictId";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($barangay_id, $barangay);
    while ($stmt->fetch()) {
        echo "            <tr id='$barangay_id'>
                                <th scope='row'> $barangay</th>
                                <td><input class='A1: Health Care Workers' type='number' min='0' max='100' onchange='countStubs(this.value, this.oldValue, this); this.oldValue = this.value' onkeypress='checkZero(this) ' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' value='0' disabled><span id='percent' style='display: none'>%</span></td>
                                <td><input class='A2: Senior Citizens' type='number' min='0' max='100' onchange='countStubs(this.value, this.oldValue, this); this.oldValue = this.value' onkeypress='checkZero(this) ' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' value='0' disabled></td>
                                <td><input class='A3: Adult with Comorbidity' type='number' min='0' max='100' onchange='countStubs(this.value, this.oldValue, this); this.oldValue = this.value' onkeypress='checkZero(this) ' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' value='0' disabled></td>
                                <td><input class='A4: Frontline Personnel in Essential Sector' type='number' min='0' max='100' onchange='countStubs(this.value, this.oldValue, this); this.oldValue = this.value' onkeypress='checkZero(this) ' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' value='0' disabled></td>
                                <td><input class='A5: Indigent Population' type='number' min='0' max='100' onchange='countStubs(this.value, this.oldValue, this); this.oldValue = this.value' onkeypress='checkZero(this) ' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' value='0' disabled></td>
                                <td><input class='A6: Rest Of The Population' type='number' min='0' max='100' onchange='countStubs(this.value, this.oldValue, this); this.oldValue = this.value' onkeypress='checkZero(this) ' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' value='0' disabled></td>
                          </tr>";
    }
    $stmt->close();

    echo "             </tbody>
                        </table>
                    </div>
                </div>
                <div class='modal-footer'>
                <button id='sendStubs' type='button' class='btn btn-success' onclick='sendStubs($vaccDrive)'>
                <i class='fas fa-paper-plane'></i> Send Stubs </button>
                </div>
            </div>";


}

if (isset($_POST['notifDrive'])) {
    $query = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date, vaccination_drive.stubs, vaccination_drive.notif_opened FROM vaccination_sites JOIN vaccination_drive ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id ORDER BY drive_id desc;";
    $vaccination_drive = [];

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($driveId, $locName, $date, $stubs, $opened);

    while ($stmt->fetch()) {
        if ($opened== 1){
            echo "


                                                        <div id='$driveId' style='color: #9C9C9C'>
                                                            <p>Vaccination Location: $locName<br>
                                                               Date: $date <br>
                                                               Number of Stubs: $stubs <br>
                                                            </p>
                                                        </div>
                                                      <hr style='width: 100%; background: azure'>

                                                      ";
        } else{

            echo "
                                                   <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>

                                                        <div id='$driveId' style='background: lightgray'>
                                                            <p>Vaccination Location: $locName<br>
                                                               Date: $date <br>
                                                               Number of Stubs: $stubs <br>
                                                            </p>
                                                        </div>
                                                      <hr style='width: 100%; background: azure'>

                                                      ";

        }

    }


}

if (isset($_POST['notifListDrives'])){



    echo '<select onchange="updateDeploymentDetails(this.value)">
                            <option value="" disabled selected hidden> Select Deployment </option>';

    require_once("../require/getVaccinationDrive.php");

    foreach ($vaccination_drive  as $vaccinationDrive) {
        $id = $vaccinationDrive->getDriveId();
        echo "<option value=$id> $id </option>";
    }

    echo" </select>";
}

if (isset($_POST['open'])){
    $query = "UPDATE vaccination_drive SET notif_opened = '1' WHERE notif_opened = '0'";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();
}

if (isset($_POST['sendStubs'])){

    $result = $_POST['sendStubs'];
    $driveStubs = $_POST['stubsDrive'];

    foreach ($result as $key => $value){
        $query = "INSERT into barangay_stubs (barangay_id, drive_id, A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, A6_stubs, notif_opened) VALUE ($key, $driveStubs,$value[0], $value[1], $value[2], $value[3], $value[4], $value[5], 0)";
        $database->query($query);
    }

    require '../vendor/autoload.php';

    $options = array(
        'cluster' => 'ap1',
    );

    $pusher = new Pusher\Pusher(
        '8bde1d2aef3f7c91d16a',
        '5a55c8609c4d84200725',
        '1273036',
        $options
    );

    $data['message'] = $driveStubs;
    $pusher->trigger('barangay', 'my-event', $data);
}


