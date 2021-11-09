<?php

include_once "../includes/database.php";
require_once '../require/getHealthDistrict.php';
if (isset($_POST['search'])) {

    $search = $_POST['search'];
    if ($search == "") {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
    }
    echo "
    <thead>
            <tr>
              <th scope='col'>Drive Id</th>
                                <th scope='col'>Location</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>No. of Stubs</th>
                                <th scope='col'>Action</th>
            </tr>
            </thead>";

    $count = 1;
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($driveId, $vaccinationSite, $date, $stub);
    while ($stmt->fetch()) {
        echo "<tr onclick='showDrive(this)'>
                <td>$driveId</td>
                <td>$vaccinationSite</td>
                <td>$date</td>
                <td>$stub</td>
                <td> <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                <button class='buttonTransparent ml-2' onclick=''><i class='far fa-edit'></i></button>
                           
                            </td>
                </tr>";
        $count++;
    }
}

if (isset($_POST['id'])) {
    $drive = $_POST['id'];

    include '../includes/database.php';
    require_once '../require/getVaccinationDrive.php';
    require_once '../require/getVaccine.php';
    require_once '../require/getVaccineDrive1.php';
    require_once '../require/getVaccinationSites.php';
    require_once '../require/getHealthDistrictDrives.php';
    require_once '../require/getHealthDistrict.php';

    foreach ($vaccination_drive as $vd) {
        if ($drive == $vd->getDriveId()) {
            $name = $vd->getDriveId();
            $first_dose_stubs = $vd->getFirstDoseStubs();
            $second_dose_stubs = $vd->getSecondDoseStubs();
            $siteId = $vd->getVaccDriveVaccSiteId();
            $date = $vd->getVaccDate();
        }
    }


    foreach ($vaccinationSites as $vs) {
        if ($vs->getVaccinationSiteId() == $siteId) {
            $siteName = $vs->getVaccinationSiteLocation();
        }
    }

    $healthDistricts = [];
    foreach ($healthDistrictDrives as $hdd){
        if ($drive == $hdd->getDriveId()){
            $healthDistricts[] = $hdd->getDistrictId();

        }
    }

    $distNames = [];
    foreach ($healthDistricts as $hd){
        foreach ($health_district as $dist){
            if ($hd == $dist->getHealthDistrictId()){
                $distNames[] = $dist->getHealthDistrictName();
            }
        }

    }


    echo "
    <h7><b>Vaccination Site:</b></h7><br>
    <h8>$siteName</h8><br><br>
    <h7><b>Vaccination Brand/s:</b></h7><br>";
    foreach ($vaccineDrive1 as $drive1) {
        if ($drive == $drive1->getDriveId()) {
            foreach ($vaccines as $vac) {
                if ($drive1->getVaccineId() == $vac->getVaccId()) {
                    $firstDbrand = $vac->getVaccName();

                    echo"<h8>$firstDbrand</h8><br><br>";
                }
            }
        }
    }
    echo"
    <h7><b>Vaccination Date:</b></h7><br>
    <h8>$date</h8><br><br>
    <h7><b>Stubs For First Dose:</b></h7><br>
    <h8>$first_dose_stubs</h8><br><br>
    <h7><b>Stubs For Second Dose:</b></h7><br>
    <h8>$second_dose_stubs</h8><br><br>
    ";

    echo "<h7><b>Health District/s:</b></h7>";

    foreach ($distNames as $dn){
        echo "<li>$dn</li>";
    }
}

if (isset($_POST['districts'])){
    $district = $_POST['districts'];
    $priorities = $_POST['priorities'];
    $firstBrands = $_POST['firstBrands'];
    $secondBrands = $_POST['secondBrands'];
    $secondDates = $_POST['secondDates'];
    $firstDoseStubs = $_POST['firstDoseStubs'];
    $secondDoseStubs = $_POST['secondDoseStubs'];
    $date = $_POST['date'];
    $location = $_POST['location'];

    $query1 = "INSERT INTO vaccination_drive (vaccination_site_id, vaccination_date, Archived, notif_opened, first_dose_stubs, second_dose_stubs) VALUE ('$location', '$date', 0, 0, '$firstDoseStubs', '$secondDoseStubs');";
    $database->query($query1);

    $getDrive = "SELECT drive_id from vaccination_drive ORDER BY drive_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getDrive);
    $dbase->execute();
    $dbase->bind_result($driveId);
    $dbase->fetch();
    $dbase->fetch();
    $dbase->close();

    foreach ($firstBrands as $firstDoseBrands) {
        $query2 = "INSERT INTO vaccine_drive_1 (drive_id, vaccine_id) VALUE ('$driveId', '$firstDoseBrands');";
        $database->query($query2);
    }

    foreach ($district as $d){
        $query3 = "INSERT INTO health_district_drives (drive_id, health_district_id) VALUE ('$driveId' , '$d' )";
        $database->query($query3);
    }

    foreach ($priorities as $priorityGroup){
        $query4 = "INSERT INTO priority_drive (drive_id, priority_id) VALUE ('$driveId' , '$priorityGroup' )";
        $database->query($query4);
    }

    foreach ($secondBrands as $secondDoseBrand){
        foreach ($secondDates as $secondDoseDate){
            $query5 = "INSERT INTO vaccine_drive_2 (drive_id, vaccine_id, first_dose_date) VALUE ('$driveId' , '$secondDoseBrand', '$secondDoseDate')";
            $database->query($query5);
        }
    }

    echo"  <table class='table table-hover tableDep table-fixed' id='driveTable'>
                            <thead>
                            <tr class='tableCenterCont'>
                                <th scope='col'>Drive Id</th>
                                <th scope='col'>Location</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>Action</th>
                            </tr>
                            </thead>";

                            $query = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 0";
                $dbase = $database->stmt_init();
                $dbase->prepare($query);
                $dbase->execute();
                $dbase->bind_result($driveId, $date, $vaccinationSite);
                while($dbase->fetch()){

                    echo "<tr class='table-row tableCenterCont' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                <button class='btn btn-sm bg-none' onclick=''><i class='far fa-edit'></i></button>

                            </div>
                        </td>

                      </tr>";

                            }
                       echo" </table>";

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

    $data['message'] = $driveId;
    $pusher->trigger('ssd', 'my-event', $data);
}

if (isset($_POST['barangays'])) {
    $barangayList = $_POST['barangays'];
    $healthDistrictName = $_POST['healthDistrictName'];
    $contact = $_POST['number'];

    echo "$healthDistrictName";
    echo "$contact";
    echo json_encode($barangayList);

    $query1 = "INSERT INTO health_district (health_district_name, hd_contact_number) VALUE ('$healthDistrictName', '$contact');";
    $database->query($query1);

    $getDistrict = "SELECT health_district_id from health_district ORDER BY health_district_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getDistrict);
    $dbase->execute();
    $dbase->bind_result($districtId);
    $dbase->fetch();
    $dbase->close();

    foreach ($barangayList as $bl) {
        $query2 = "UPDATE barangay SET health_district_id = '$districtId' where barangay_id = '$bl'";
        $database->query($query2);
    }

    echo '  <table class="table table-row table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Health District Id</th>
                            <th scope="col">District Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';


    require_once '../require/getHealthDistrict.php';

    $count = 0;
    foreach ($health_district as $hd) {
        $count++;
        $districtId = $hd->getHealthDistrictId();
        $districtName = $hd->getHealthDistrictName();
        $number = $hd->getContact();

        echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$count</td>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='buttonTransparent' onclick='event.stopPropagation(); del($districtId ,deleteDistrict())'><i class='fas fa-trash-alt'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
    }

    echo"</table>";
}

if (isset($_POST['site'])) {
    $newSite = $_POST['site'];

    $query1 = "INSERT INTO vaccination_sites (location) VALUE ('$newSite');";
    $database->query($query1);

    echo'  <div id="siteContent" class="tableScroll6 border">
                    <table class="table table-row table-hover">
                        <thead class="tableHeader">
                        <tr class="tableCenterCont">
                            <th>Vaccination Site Id</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>';

    require_once '../require/getVaccinationSites.php';


    foreach ($vaccinationSites as $vs) {
        $count++;
        $siteId = $vs->getVaccinationSiteId();
        $vaccinationSite = $vs->getVaccinationSiteLocation();

        echo "<tr class='table-row''>
                                    <td>$siteId</td>
                                    <td>$vaccinationSite</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='buttonTransparent' onclick = 'del($siteId,deleteSite)'><i class ='fas fa-trash-alt'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
    }

    echo '</table>';

}

if (isset($_POST['healthName'])){
    $id = $_POST['healthId'];
    $name = $_POST['healthName'];
    $number = $_POST['number'];

    echo "  <h5>Health District: </h5>
            $name <br><hr> 
            <h5>Contact Number:</h5>
            $number<br><hr>
          
            <h5>Barangays: </h5><br> 
            <div class='tableScroll6 border border-dark p-3' id='barangayList'>";

    require_once '../require/getBarangay.php';


    foreach ($barangays as $b) {
        $hId = $b->getBarangayHealthDistrictId();
        if ($id == $hId) {
            $name = $b->getBarangayName();
            $bId = $b->getBarangayId();
            echo "<ul>
                                               <label>$name</label>
                                               <div style='float: right'>
                                                    <button class='btn btn-danger' onclick='del($bId, deleteBarangay)'>delete</i></button>
                                               </div>
                                               </ul>
                                               <br>
                                               
                                             ";
        }
    }

    echo "   </div>
                           <div>
                                <button class='buttonTransparent hyperlink' onclick='openList($id)'>+Add Barangay</i></button>
                           </div>

                       ";

}

if (isset($_POST['brgyId'])){
    require_once '../require/getBarangay.php';

    $brgyId = $_POST['brgyId'];

    $query1 = "SELECT health_district_id FROM barangay WHERE barangay_id = '$brgyId'";
    $dbase = $database->stmt_init();
    $dbase->prepare($query1);
    $dbase->execute();
    $dbase->bind_result($barDistId);
    $dbase->fetch();
    $dbase->close();

    $query = "UPDATE barangay SET health_district_id = NULL WHERE barangay_id = '$brgyId';";
    $database->query($query);

    $query2 = "SELECT barangay_id, barangay_name FROM barangay WHERE health_district_id = '$barDistId'";
    $dbase = $database->stmt_init();
    $dbase->prepare($query2);
    $dbase->bind_result( $barangayId, $barangayName);
    $dbase->execute();
    while ($dbase->fetch()) {

                echo "<li>
                                               <label>$barangayName</label>
                                               <div style='float: right'>
                                                    <button class='buttonTransparent hyperlink' onclick='del($barangayId, deleteBarangay)'>delete</i></button>
                                               </div>
                                               </li>
                                               <br>
                                               
                                             ";

    }

}

if (isset($_POST['deleteSiteId'])){
    $delSite = $_POST['deleteSiteId'];
    $site = "addVaccSite";


    $query = "DELETE FROM vaccination_sites WHERE vaccination_site_id = '$delSite'";
    $database->query($query);

    echo'  <div id="siteContent" class="tableScroll6 border">
                    <table class="table table-row table-hover">
                        <thead class="tableHeader">
                        <tr class="tableCenterCont">
                            <th>Vaccination Site Id</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>';

    require_once '../require/getVaccinationSites.php';

    $count = 0;
    foreach ($vaccinationSites as $vs) {

        $siteId = $vs->getVaccinationSiteId();
        $vaccinationSite = $vs->getVaccinationSiteLocation();

        echo "<tr class='table-row''>
                                    <td>$siteId</td>
                                    <td>$vaccinationSite</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='buttonTransparent' onclick = 'del($siteId,deleteSite)'><i class ='fas fa-trash-alt'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
    }

    echo '</table>';

}

if (isset($_POST['deleteDistId'])){
    $delDistId = $_POST['deleteDistId'];

    $query1 = "UPDATE `barangay` SET `health_district_id`= NULL WHERE `health_district_id` = '$delDistId'";
    $database->query($query1);

    $query = "DELETE FROM `health_district` WHERE `health_district_id` = '$delDistId'";
    $database->query($query);

    echo'<table class="table table-row table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Health District Id</th>
                            <th scope="col">District Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';


    require_once '../require/getHealthDistrict.php';

    $count = 0;
    foreach ($health_district as $hd) {
        $count++;
        $districtId = $hd->getHealthDistrictId();
        $districtName = $hd->getHealthDistrictName();
        $number = $hd->getContact();

        echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$count</td>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                            <button class='buttonTransparent' onclick='event.stopPropagation(); del($districtId ,deleteDistrict)'><i class='fas fa-trash-alt'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
    }

    echo"</table>";
}

if (isset($_POST['barId'])){

    $chosenId = $_POST['barId'];

    echo ' <div class="AddHealthD-option">
                        <ul>';

    require_once "../require/getBarangay.php";


    foreach ($barangays as $b) {
        if($b->getBarangayHealthDistrictId() != $chosenId) {
            $id = $b->getBarangayId();
            $name = $b->getBarangayName();
            echo " <li>
                                    <input class = 'checkboxes' type='checkbox' onclick='selected(\"barangay\", $id)'>
                                    <label>$name</label><br>
                                    </li> ";
        }
    }

    echo"  </ul>

                        <button type='button' class='btn btn-success editButton' onclick='addBarangay($chosenId)'> Add</button>

                    </div>";
}

if (isset($_POST['list'])) {
    $list = $_POST['list'];
    $heDiId = $_POST['hdId'];

    require '../require/getBarangay.php';
    foreach ($list as $l){
        $query = "UPDATE barangay SET health_district_id = '$heDiId'  WHERE barangay_id = '$l'";
        $database->query($query);
    }


    $query3 = "SELECT barangay_id, barangay_name FROM barangay WHERE health_district_id = '$heDiId'";
    $dbase = $database->stmt_init();
    $dbase->prepare($query3);
    $dbase->bind_result( $barangayId, $barangayName);
    $dbase->execute();
    while ($dbase->fetch()) {

        echo "<li>
                                               <label>$barangayName</label>
                                               <div style='float: right'>
                                                    <button class='buttonTransparent hyperlink' onclick='del($barangayId, deleteBarangay)'>delete</i></button>
                                               </div>
                                               </li>
                                               <br>
                                               
                                             ";

    }
}

if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE `vaccination_drive` SET `Archived`= 1 WHERE `drive_id` = '$archivedId'";
        $database->query($query);

        echo' <table class="table table-hover tableDep tableScroll2 mb-2" id="driveTable">
                            <thead>
                            <tr class="tableCenterCont">
                                <th scope="col">Drive Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>';

                            $query1 = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 0 ORDER BY vaccination_drive.drive_id";
                $dbase = $database->stmt_init();
                $dbase->prepare($query1);
                $dbase->execute();
                $dbase->bind_result($driveId, $date, $vaccinationSite);
                while($dbase->fetch()){

                                    echo "<tr class='table-row' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                <button class='btn btn-sm bg-none' onclick=''><i class='far fa-edit'></i></button>
                            </div>
                        </td>
                      </tr>";
                            }

                        echo"</table>";

    } else if ($option == "UnArchive") {
        $query = "UPDATE `vaccination_drive` SET `Archived`= 0 WHERE `drive_id` = '$archivedId'";
        $database->query($query);

        echo'<table class="table table-row table-hover tableModal ">
                <thead class="tableHeader">
                <tr>
                    <th scope="col">Drive Id</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>';

               $query = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 1 ORDER BY vaccination_drive.drive_id";
                $dbase = $database->stmt_init();
                $dbase->prepare($query);
                $dbase->execute();
                $dbase->bind_result($driveId, $date, $vaccinationSite);
                while($dbase->fetch()){

                        echo "<tr class='table-row'>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
                            </div>
                        </td>

                      </tr>";
                }
                echo'
            </table>';

        }

        echo "</table>";
}

if (isset($_POST['showUpdatedDrive'])){
    echo ' <table class="table table-hover tableDep" id="driveTable">
                            <thead>
                            <tr class="tableCenterCont">
                                <th scope="col">Drive Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>';

    $query1 = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 0 ORDER BY vaccination_drive.drive_id";
    $dbase = $database->stmt_init();
    $dbase->prepare($query1);
    $dbase->execute();
    $dbase->bind_result($driveId, $date, $vaccinationSite);
    while ($dbase->fetch()) {

        echo "<tr class='table-row' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                <button class='btn btn-sm bg-none' onclick=''><i class='far fa-edit'></i></button>
                            </div>
                        </td>
                      </tr>";
    }

    echo "</table>";
}

if (isset($_POST['showUpdatedArchive'])){
    echo ' <table class="table table-hover tableDep" id="driveTable">
                            <thead>
                            <tr class="tableCenterCont">
                                <th scope="col">Drive Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>';

    $query1 = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 1 ORDER BY vaccination_drive.drive_id";
    $dbase = $database->stmt_init();
    $dbase->prepare($query1);
    $dbase->execute();
    $dbase->bind_result($driveId, $date, $vaccinationSite);
    while ($dbase->fetch()) {

        echo "<tr class='table-row' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                         <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
                            </div>
                        </td>
                      </tr>";
    }

    echo "</table>";
}

if (isset($_POST['distArchive'])){
    $archivedDist = $_POST['distArchive'];
    $optionDist = $_POST['option'];

    if ($optionDist == "Archive"){
        $query = "UPDATE `health_district` SET `Archived`= 1 WHERE `health_district_id` = '$archivedDist'";
        $database->query($query);

        echo' 
                    <table class="table table-row table-hover tableModal">
                        <thead class="tableHeader">
                        <tr>
                            <th scope="col">Health District Id</th>
                            <th scope="col">District Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';


        $query1 = "SELECT health_district_id, health_district_name, hd_contact_number FROM health_district WHERE Archived = 0";
        $dbase = $database->stmt_init();
        $dbase->prepare($query1);
        $dbase->execute();
        $dbase->bind_result($districtId, $districtName, $number);
        while ($dbase->fetch()) {

                echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1,archiveDistrict, $districtId)'><i class='fa fa-archive'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
        }

        echo"</table>";

    } else if ($optionDist == "UnArchive") {
        $query = "UPDATE `health_district` SET `Archived`= 0 WHERE `health_district_id` = '$archivedDist'";
        $database->query($query);

        echo' <table class="table table-row table-hover tableModal">
                        <thead class="tableHeader">
                        <tr>
                            <th scope="col">Health District Id</th>
                            <th scope="col">District Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';


        $query1 = "SELECT health_district_id, health_district_name, hd_contact_number FROM health_district WHERE Archived = 1";
        $dbase = $database->stmt_init();
        $dbase->prepare($query1);
        $dbase->execute();
        $dbase->bind_result($districtId, $districtName, $number);
        while ($dbase->fetch()) {

                echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                         <div style='text-align: left;'>
                                            <button class='btn btn-warning' onclick='event.stopPropagation(); archive(0, archiveDistrict, $districtId )'>unarchive <i class='fas fa-box-open'></i></button>
                                         </div>
                                    </td>
                                  </tr>";
        }

        echo'
            </table>';

    }

    echo "</table>";
}

if (isset($_POST['showUpdatedDistArchive'])){
    echo"
     <table class='table table-row table-hover tableModal'>
                        <thead class='tableHeader'>
                        <tr>
                            <th scope='col'>Health District Id</th>
                            <th scope='col'>District Name</th>
                            <th scope='col'>Contact Number</th>
                            <th scope='col'>Action</th>
                        </tr>
                        </thead>";

                        foreach ($health_district as $hd) {
                            $districtId = $hd->getHealthDistrictId();
                            $districtName = $hd->getHealthDistrictName();
                            $number = $hd->getContact();
                            $archived = $hd->getArchived();

                            if($archived == 1) {

                                echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td class='d-flex justify-content-center'>
                                            <button class='btn btn-sm bg-none' onclick='event.stopPropagation();archive(0, archiveDistrict, $districtId )'>unarchive <i class='fas fa-box-open'></i></button>
                                    </td>
                                  </tr>";
                            }
                        }
                    echo"    
                    </table>";

}

if (isset($_POST['showUpdatedDist'])){
    echo"
                
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col'>Health District Id</th>
                            <th scope='col'>District Name</th>
                            <th scope='col'>Contact Number</th>
                            <th scope='col'>Action</th>
                        </tr>
                        </thead>";

                        foreach ($health_district as $hd) {
                            $districtId = $hd->getHealthDistrictId();
                            $districtName = $hd->getHealthDistrictName();
                            $number = $hd->getContact();
                            $archived = $hd->getArchived();

                            if($archived == 0) {

                                echo "<tr class='table-row' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div style='text-align: left;'>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1,archiveDistrict, $districtId)'><i class='fa fa-archive'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
                            }
                        }
                    echo"</table>";

}