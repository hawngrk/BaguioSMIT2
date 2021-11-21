<?php

include_once "../includes/database.php";

if (isset($_POST['id'])) {
    $drive = $_POST['id'];

    include '../includes/database.php';
    require_once '../require/getVaccinationDrive.php';
    require_once '../require/getVaccine.php';
    require_once '../require/getVaccineDrive1.php';
    require_once '../require/getVaccineDrive2.php';
    require_once '../require/getVaccinationSites.php';
    require_once '../require/getHealthDistrictDrives.php';
    require_once '../require/getHealthDistrict.php';
    require_once '../require/getPriorityDrive.php';
    require_once '../require/getPriorityGroup.php';

    foreach ($vaccination_drive as $vd) {
        if ($drive == $vd->getDriveId()) {
            $name = $vd->getDriveId();
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
    <h7><b>Vaccination Date:</b></h7><br>
    <h8>$date</h8><br><br>
    <h7><b>Priority Group/s:</b></h7><br>";

    foreach ($priorityDrives as $pDrive){
        if($pDrive->getDriveId() == $drive){
            $priorityId = $pDrive->getPriorityId();
            foreach($priorityGroups as $group){
                if ($group->getPriorityGroupId() == $priorityId){
                    $priority = $group->getPriorityGroup();
                    echo "<h8>$priority</h8><br>";
                }
            }
        }
    }
    echo "<br>";

    if ($vaccineDrive1 != null) {
        echo "<h7><b>First Dose</b></h7><br>
              <h7>Vaccine Brands: </h7><br>";
        foreach ($vaccineDrive1 as $drive1) {
            if ($drive1->getDriveId() == $drive) {
                foreach ($vaccines as $vac) {
                    if ($drive1->getVaccineId() == $vac->getVaccId()) {
                        $firstDbrand = $vac->getVaccName();
                        $fBrandStubs = $drive1->getStubs();

                        echo "<h8>$firstDbrand: $fBrandStubs stub/s</h8><br>";
                    }
                }
            }
        }
    }
    echo "<br>";

    if ($vaccineDrive2 != null) {
        echo "<h7><b>Second Dose</b></h7><br> 
          Criterias of First Dose:<br>";
        foreach ($vaccineDrive2 as $drive2) {
            if ($drive2->getDriveId() == $drive) {
                $sDate = $drive2->getFirstDoseDate();
                foreach ($vaccines as $vac) {
                    if ($drive2->getVaccineId() == $vac->getVaccId()) {
                        $secondDbrand = $vac->getVaccName();
                        $sBrandStubs = $drive2->getStubs();

                        echo "<h8>$secondDbrand - $sDate - $sBrandStubs stub/s</h8><br>";
                    }
                }
            }
        }
    }
    echo "<br>";

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
    $date = $_POST['date'];
    $location = $_POST['location'];

    $query1 = "INSERT INTO vaccination_drive (vaccination_site_id, vaccination_date, Archived, notif_opened, allocated) VALUE ('$location', '$date', 0, 0, 0);";
    $database->query($query1);

    $getDrive = "SELECT drive_id from vaccination_drive ORDER BY drive_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getDrive);
    $dbase->execute();
    $dbase->bind_result($driveId);
    $dbase->fetch();
    $dbase->fetch();
    $dbase->close();

    foreach ($firstBrands as $key => $value) {
        $query2 = "INSERT INTO vaccine_drive_1 (drive_id, vaccine_id, stubs) VALUE ('$driveId', '$key', '$value[0]');";
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

    foreach ($secondBrands as $brand => $values){
            $query5 = "INSERT INTO vaccine_drive_2 (drive_id, vaccine_id, first_dose_date, stubs) VALUE ('$driveId' , '$brand', '$values[0]', '$values[1]')";
            $database->query($query5);
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
    require_once '../require/getHealthDistrict.php';

    $barangayList = $_POST['barangays'];
    $healthDistrictName = $_POST['healthDistrictName'];
    $contact = $_POST['number'];

    echo "$healthDistrictName";
    echo "$contact";
    echo json_encode($barangayList);

    $query1 = "INSERT INTO health_district (health_district_name, hd_contact_number, Archived) VALUE ('$healthDistrictName', '$contact', 0);";
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

    echo '     <table class="table table-hover border">
                        <thead class="tableHeader">
                        <tr class="tableCenterCont">
                            <th scope="col">Health District Id</th>
                            <th scope="col">District Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';


    require_once '../require/getHealthDistrict.php';

    $count = 0;
    foreach ($health_district as $hd) {
        $districtId = $hd->getHealthDistrictId();
        $districtName = $hd->getHealthDistrictName();
        $number = $hd->getContact();
        $archived = $hd->getArchived();

        if ($archived == 0) {

            echo "<tr class='table-row tableCenterCont' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div class='d-flex justify-content-center'>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1,archiveDistrict, $districtId)'><i class='fa fa-archive'></i></button>
                                        </div>
                                    </td>
                                  </tr>";
        }
    }
    echo"</table>";
}

if (isset($_POST['site'])) {
    $newSite = $_POST['site'];

    $query1 = "INSERT INTO vaccination_sites (location) VALUE ('$newSite');";
    $database->query($query1);

    echo'   <table class="table table-row table-hover">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
                        <th>Vaccination Site Id</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>';

    require_once '../require/getVaccinationSites.php';

    foreach ($vaccinationSites as $vs) {
        $siteId = $vs->getVaccinationSiteId();
        $vaccinationSite = $vs->getVaccinationSiteLocation();

        echo "<tr class='table-row tableCenterCont'>
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

    echo "  <h5 class='ml-3'>Health District: </h5>
            <h7 class='ml-5'>$name</h7> <br><hr> 
            <h5 class='ml-3'>Contact Number:</h5>
            <h7 class='ml-5'> $number </h7><br><hr>
          
            <h5 <h7 class='ml-3'>Barangays: </h5><br> 
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
                                <button class='buttonTransparentHealth hyperlink' onclick='openList($id)'>+Add Barangay</i></button>
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

    echo'   <table class="table table-row table-hover">
                        <thead class="tableHeader">
                        <tr class="tableCenterCont">
                            <th>Vaccination Site Id</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>';

    require_once '../require/getVaccinationSites.php';

    foreach ($vaccinationSites as $vs) {
        $siteId = $vs->getVaccinationSiteId();
        $vaccinationSite = $vs->getVaccinationSiteLocation();

        echo "<tr class='table-row tableCenterCont'>
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

        echo'      <table class="table table-hover tableDep table-fixed" id="driveTable">
                            <thead>
                            <tr class="tableCenterCont">
                                <th scope="col">Drive Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>';

        $query = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 0 ORDER BY vaccination_drive.drive_id";
        $dbase = $database->stmt_init();
        $dbase->prepare($query);
        $dbase->execute();
        $dbase->bind_result($driveId, $date, $vaccinationSite);
        while ($dbase->fetch()) {

            echo "<tr class='table-row tableCenterCont' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                 <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDeployment(\"$driveId\", \"$vaccinationSite\", \"$date\")' style='float: right'><i class='far fa-edit'></i></button><br>
                            </div>
                        </td>

                      </tr>";

        }
        echo"</table>";

    } else if ($option == "UnArchive") {
        $query = "UPDATE `vaccination_drive` SET `Archived`= 0 WHERE `drive_id` = '$archivedId'";
        $database->query($query);

        echo'<table class="table table-row table-hover tableModal">
                <thead>
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

            echo "<tr class='table-row tableCenterCont'>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
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
    echo'       <table class="table table-hover tableDep table-fixed" id="driveTable">
                            <thead>
                            <tr class="tableCenterCont">
                                <th scope="col">Drive Id</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>';
    $query = "SELECT vaccination_drive.drive_id, vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.Archived = 0 ORDER BY vaccination_drive.drive_id";
    $dbase = $database->stmt_init();
    $dbase->prepare($query);
    $dbase->execute();
    $dbase->bind_result($driveId, $date, $vaccinationSite);
    while ($dbase->fetch()) {

        echo "<tr class='table-row tableCenterCont' onclick='showDrive(this)'>

                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1, clickArchive, $driveId)'><i class='fa fa-archive'></i></button>
                                 <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDeployment(\"$driveId\", \"$vaccinationSite\", \"$date\")' style='float: right'><i class='far fa-edit'></i></button><br>
                            </div>
                        </td>

                      </tr>";

    } echo"</table>";
}

if (isset($_POST['showUpdatedArchive'])){
    echo'<table class="table table-row table-hover tableModal">
                <thead>
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

        echo "<tr class='table-row tableCenterCont'>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>
                            <div>
                                <button class='btn btn-warning' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
                            </div>
                        </td>

                      </tr>";
    }
    echo'
            </table>';
}

if (isset($_POST['distArchive'])){
    $archivedDist = $_POST['distArchive'];
    $optionDist = $_POST['option'];

    if ($optionDist == "Archive"){
        $query = "UPDATE `health_district` SET `Archived`= 1 WHERE `health_district_id` = '$archivedDist'";
        $database->query($query);

        echo' 
                  <table class="table table-hover border">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
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

                echo "<tr class='table-row tableCenterCont' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div class='d-flex justify-content-center'>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1,archiveDistrict, $districtId)'><i class='fa fa-archive'></i></button>
                                             <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDistrict(\"$districtId\", \"$districtName\", \"$number\")' style='float: right'><i class='far fa-edit'></i></button><br>
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
    echo'
    <table class="table table-row table-hover tableModal">
                <thead class="tableHeader">
                <tr class="tableCenterCont">
                    <th scope="col">Health District Id</th>
                    <th scope="col">District Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
';

    require_once '../require/getHealthDistrict.php';

    foreach ($health_district as $hd) {
        $districtId = $hd->getHealthDistrictId();
        $districtName = $hd->getHealthDistrictName();
        $number = $hd->getContact();
        $archived = $hd->getArchived();

        if ($archived == 1) {

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
    }
                    echo"    
                    </table>";

}

if (isset($_POST['showUpdatedDist'])){
    echo'
                
                    <table class="table table-hover border">
                    <thead class="tableHeader">
                    <tr class="tableCenterCont">
                        <th scope="col">Health District Id</th>
                        <th scope="col">District Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>';

    require_once '../require/getHealthDistrict.php';

    foreach ($health_district as $hd) {
        $districtId = $hd->getHealthDistrictId();
        $districtName = $hd->getHealthDistrictName();
        $number = $hd->getContact();
        $archived = $hd->getArchived();

        if ($archived == 0) {

            echo "<tr class='table-row tableCenterCont' onclick='showDistrict(this)'>
                                    <td>$districtId</td>
                                    <td>$districtName</td>
                                    <td>$number</td>
                                    <td style= 'vertical-align: middle;'>
                                        <div class='d-flex justify-content-center'>
                                           <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); archive(1,archiveDistrict, $districtId)'><i class='fa fa-archive'></i></button>
                                             <button class='btn btn-sm bg-none' onclick='event.stopPropagation(); editDistrict(\"$districtId\", \"$districtName\", \"$number\")' style='float: right'><i class='far fa-edit'></i></button><br>
                                        </div>
                                    </td>
                                  </tr>";
        }
    }
                    echo"</table>";

}

if (isset($_POST['reset'])){
   echo'<div class="content-modal depMod">
                <div class="modal-header">
                    <h4 class="modal-title">Add Deployment</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal(\'DeployModal\')">
                        <i class="fas fa-window-close"></i>
                    </button>
                </div>
                <div class="modal-body ">
                    <div role="tabpanel" class="tab-pane active" id="GeneralPage"">
                    <h3 style="padding-bottom: 1%">General</h3>
                    <div class="row" style="padding-bottom: 1%">
                        <div class="col">
                            <div class="form-group">
                                <label for="site"><h6>Select Vaccination Site: </h6></label>
                                <select name="site" id="site">
                                    <option value="" disabled selected> Select Vaccination Site</option>';

                                    require '../require/getVaccinationSites.php';
                                    foreach ($vaccinationSites as $vs) {
                                        $vacSite = $vs->getVaccinationSiteLocation();
                                        $id = $vs->getVaccinationSiteId();
                                        echo "<option value =$id>$vacSite</option>";
                                    }
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-group ">
                                <label for="date"><h6>Date: </h6></label><br>
                                <input type="date" id="date" name="date" class="dateForm">
                            </div>
                        </div>
                    </div>
                    <label for="district"><h6>Select Health District/s: </h6></label>
                    <div id="district" style="padding: 2%; margin-bottom: 2%" name="district"  class="AddHealthD-option tableScroll3 border border-dark rounded">
                        <div id="districList">
                            <div class="row">
                                <ul style="columns: 3">';

                                    require_once "../require/getHealthDistrict.php";

                                    foreach ($health_district as $hd) {
                                        $hdId = $hd->getHealthDistrictId();
                                        $hdName = $hd->getHealthDistrictName();
                                        echo " <li>
                                                            <input id='districts' name='districts' class = 'checkboxes' type='checkbox' onclick='selected(\"healthDistricts\", $hdId)'>
                                                            <label for='districts'>$hdName</label><br>
                                                          </li> ";
                                    }
                                    echo'
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light navbarDep mb-4">
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <div class ="row ">
                                <div class="col-sm-auto">
                                    <li role="presentation" class="doseOption2 nav-item active">
                                        <a class="nav-link" id="FirstDose" role="tab" data-toggle="tab"
                                           href="#FirstDose"
                                           onclick="shiftTab(\'FirstDose\', \'SecondDose\', \'FirstDosePage\', \'SecondDosePage\')">First Dose</a>
                                    </li>
                                </div>
                                <div class="col-sm-auto">
                                    <li role="presentation" class="doseOption3 nav-item">
                                        <a class="nav-link" role="tab" id="SecondDose" data-toggle="tab"
                                           href="#SecondDose"
                                           onclick="shiftTab(\'SecondDose\', \'FirstDose\', \'SecondDosePage\', \'FirstDosePage\')">Second Dose</a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </nav>

                <!-- Tab panes -->
                <div class="tab-content border border-dark rounded p-4">
                    <div role="tabpanel" class="tab-pane" id="FirstDosePage">
                        <h3>First Dose</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <h6 class="ml-3">Select Vaccine Brand/s: </h6>
                                        <div class="col ml-4">
                                            <input id="noStubsFirst" class = "checkboxes mr-auto" type="checkbox" onclick="disableCheck(this, \'firstDoseStubs\', \'first\')"">
                                            <label>No Stubs</label>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>

                                    <div class="border border-dark tableScroll3 rounded" id = "firstDoseStubs"
                                         style="columns:2; padding: 2%; list-style-type: none; height: auto!important">';

                                        require '../require/getVaccine.php';
                                        foreach ($vaccines as $vac) {
                                            $vacName = $vac->getVaccName();
                                            $vacId = $vac->getVaccId();
                                            echo "<li>
                                                                   <input class = 'checkboxes' type='checkbox' onclick='showStubs(this, $vacId)' value='$vacId'>
                                                                   <label>$vacName</label>
                                                                   
                                                               </li> ";
                                        }
                                        echo'
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <h6 style="float: left">Select Priority Group/s: </h6>
                                    <div class="border border-dark tableScroll3 rounded"
                                         style="columns:2; padding: 2%; list-style-type: none; height: auto!important">
                                        <li>';

                                            require '../require/getPriorityGroup.php';
                                            foreach ($priorityGroups as $group) {
                                                $priorityGroup = $group->getPriorityGroup();
                                                $priorityGroupId = $group->getPriorityGroupId();
                                                echo " <li>
                                                                            <input class = 'checkboxes' type='checkbox' onclick='selected(\"priorityGroups\", $priorityGroupId)'>
                                                                            <label>$priorityGroup</label><br>
                                                                           </li> ";
                                            }
                                            echo'
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="sendStubs" type="button" class="btn btn-primary" onclick="shiftTab(\'SecondDose\', \'FirstDose\', \'SecondDosePage\', \'FirstDosePage\')">
                                Next </button>
                        </div>
                    </div>

                   <div role="tabpanel" class="tab-pane" id="SecondDosePage" >
                        <input id="noStubsFirst" class = "checkboxes p-4" type="checkbox" onclick="disableCheck(this, \'secondDoseTable\', \'second\')">
                        <label>No Stubs</label>
                        <h3>Second Dose</h3>
                        <div class="AddHealthD-option">
                            <table id="secondDoseTable">
                                <tr>
                                    <td style="width: 35%">
                                        <label for="VaccineBr"><h6>Select First Dose Vaccine Brand:</h6></label>
                                        <select style="width: 72%" name="vaccineBrand" id="VaccineBr">
                                            <option value="" disabled selected> Select First Dose Brand</option>';

                                            require '../require/getVaccine.php';
                                            foreach ($vaccines as $vac) {
                                                $vacName = $vac->getVaccName();
                                                $vacId = $vac->getVaccId();

                                                echo "<option value = $vacId>$vacName</option>";
                                            }
                                            echo'
                                        </select>
                                    </td>

                                    <td>
                                        <label><h6>Select First Dose Date: </h6></label>
                                        <div class="form-inline">
                                            <input type="date" id="secondDoseDate" name="secondDoseDate" class="dateForm form-control">
                                        </div>
                                    </td>

                                    <td >
                                        <label><h6>Number of Stubs: </h6></label>
                                        <div class="form-inline">
                                            <input type="input" placeholder="Number of Stubs" class="dateForm form-control">
                                            <button class="buttonTransparent delButt" onclick="event.preventDefault(); removeRow(this)"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                            <button class="hyperlink add_another" style="font-size: 15px; background-color: transparent; border-color: transparent" onclick="event.preventDefault();">+Add New Classification</button>
                        </div>

                        <div class="modal-footer">
                            <button id="sendStubs" type="button" class="btn btn-secondary mr-auto"onclick="shiftTab(\'FirstDose\',  \'SecondDose\', \'FirstDosePage\',  \'SecondDosePage\')">Back</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" onclick="closeModalForms(\'DeployModal\',\'newDeploymentForm\')" value="Cancel">
                    <input type="submit" class="btn btn-success" onclick="event.preventDefault(); add(\'Deployment\', addDep, validationDeployment)" value="Add">


                </div>
            </div>

            </div>';

}