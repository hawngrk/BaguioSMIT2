<?php

include_once "../includes/database.php";

if (isset($_POST['id'])) {
    $drive = $_POST['id'];

    include '../includes/database.php';
    require_once '../require/getVaccinationDrive.php';
    require_once '../require/getVaccine.php';
    require_once '../require/getVaccineDeployment.php';
    require_once '../require/getVaccinationSites.php';
    require_once '../require/getHealthDistrictDrives.php';
    require_once '../require/getHealthDistrict.php';

    foreach ($vaccination_drive as $vd) {
        if ($drive == $vd->getDriveId()) {
            $name = $vd->getDriveId();
            $stubs = $vd->getVaccStubs();
            $siteId = $vd->getVaccDriveVaccSiteId();
            $date = $vd->getVaccDate();
            $group = $vd->getPriorityGroup();
        }
    }


    foreach ($vaccinationSites as $vs) {
        if ($vs->getVaccinationSiteId() == $siteId) {
            $siteName = $vs->getVaccinationSiteLocation();
        }
    }

    foreach ($vaccineDeployment as $vDep) {
        if ($drive == $vDep->getDeploymentDriveId()) {
            foreach ($vaccines as $vac) {
                if ($vDep->getDeploymentVaccId() == $vac->getVaccId()) {
                    $brand = $vac->getVaccName();
                }
            }
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
    <p><b>Vaccination Site:</b></p>
    <center><p>$siteName</p></center>
    <p><b>Vaccination Brand:</b></p>
    <center><p>$brand</p></center>
    <p><b>Category Of Patient:</b></p>
    <center><p>$group</p></center>
    <p><b>Vaccination Date:</b></p>
    <center><p>$date</p></center>
    <p><b>Number of Stubs:</b></p>
    <center><p>$stubs</p></center>
    ";

    echo "<p><b>Health Districts:</b></p>";

    foreach ($distNames as $dn){
        echo "<center><p>$dn</p></center>";
    }
}

if (isset($_POST['districts'])){

    $stubs = $_POST['stub'];
    $brand = $_POST['brand'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $patientCategory = $_POST['patient_category'];
    $district = $_POST['districts'];

    $query1 = "INSERT INTO vaccination_drive (vaccination_site_id, vaccination_date, stubs, priority_group) VALUE ('$location', '$date', '$stubs', '$patientCategory');";
    $database->query($query1);

    $getDrive = "SELECT drive_id from vaccination_drive ORDER BY drive_id DESC LIMIT 1";
    $dbase = $database->stmt_init();
    $dbase->prepare($getDrive);
    $dbase->execute();
    $dbase->bind_result($driveId);
    $dbase->fetch();
    $dbase->fetch();
    $dbase->close();

    $query2 = "INSERT INTO vaccine_deployment (drive_id, vaccine_id) VALUE ('$driveId', '$brand');";
    $database->query($query2);

    foreach ($district as $d){
        $query3 = "INSERT INTO health_district_drives (drive_id, health_district_id) VALUE ('$driveId' , '$d' )";
        $database->query($query3);
    }

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

    echo'  <table class="table table-row table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vaccination Site Id</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

    require_once '../require/getVaccinationSites.php';

    $count = 0;
    foreach ($vaccinationSites as $vs) {
        $count++;
        $siteId = $vs->getVaccinationSiteId();
        $vaccinationSite = $vs->getVaccinationSiteLocation();

        echo "<tr class='table-row''>
                                    <td>$count</td>
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

    echo "  <div class='editButton'>
                <button class='buttonTransparent'><i class='fas fa-edit'></i></button><br>
            </div>
  
            <h3>Health District: </h3><br>
            $name <br><hr> 
            <h3>Contact Number:</h3><br>
            $number<br><hr>
          
            <h3>Barangays: </h3><br>
            ";

    echo " 
                            <ul>";

    require_once '../require/getBarangay.php';


    foreach ($barangays as $b) {
        $hId = $b->getBarangayHealthDistrictId();
        if ($id == $hId) {
            $name = $b->getBarangayName();
            $bId = $b->getBarangayId();
            echo "<li>
                                               <label>$name</label>
                                               <div style='float: right'>
                                                    <button class='buttonTransparent hyperlink' onclick='del($bId, deleteBarangay)'>delete</i></button>
                                               </div>
                                               </li>
                                               <br>
                                               
                                             ";
        }
    }

    echo "       
                           <div>
                                <button class='buttonTransparent hyperlink' onclick='openList($id)'>+Add Barangay</i></button>
                           </div>

                       ";

}

if (isset($_POST['brgyId'])){
    require_once '../require/getBarangay.php';
    require_once '../require/getHealthDistrict.php';
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


    foreach ($health_district as $hd){
        if ($hd->getHealthDistrictId() == $barDistId){
            $healthName = $hd->getHealthDistrictName();
            $contactNumber = $hd->getContact();
        }
    }

    $barangaysLists = [];

    $query2 = "SELECT * FROM barangay WHERE health_district_id = '$barDistId'";
    $dbase = $database->stmt_init();
    $dbase->prepare($query2);
    $dbase->bind_result( $barangayId,$barangayHealthDistId, $barangayName);
    $dbase->execute();

    while ($dbase->fetch()){
        $barangaysLists[] = [$barangayId, $barangayHealthDistId, $barangayName] ;
    }




    echo " <div class='editButton'>
                <button class='buttonTransparent'><i class='fas fa-edit'></i></button><br>
            </div>

            <h3>Health District: </h3><br>
                $healthName <br><hr>
            <h3>Contact Number:</h3><br>
                $contactNumber<br><hr>
            <h3>Barangays: </h3><br>
    ";

    echo "
                            <ul>";

    foreach ($barangaysLists as $b) {
        echo "<li>
                                               <label>$b[2]</label>
                                               <div style='float: right'>
                                                    <button class='buttonTransparent hyperlink' onclick='del($b[1], deleteBarangay)'>delete</i></button>
                                               </div>
                                               </li>
                                               <br>

    ";
    }

    echo "
                           <div>
                                <button class='buttonTransparent hyperlink' onclick='openList($barDistId)'>+Add Barangay</i></button>
                           </div>

    ";

}

if (isset($_POST['deleteSiteId'])){
    $delSite = $_POST['deleteSiteId'];
    $site = "addVaccSite";


    $query = "DELETE FROM vaccination_sites WHERE vaccination_site_id = '$delSite'";
    $database->query($query);

    echo'  <table class="table table-row table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vaccination Site Id</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

    require_once '../require/getVaccinationSites.php';

    $count = 0;
    foreach ($vaccinationSites as $vs) {
        $count++;
        $siteId = $vs->getVaccinationSiteId();
        $vaccinationSite = $vs->getVaccinationSiteLocation();

        echo "<tr class='table-row''>
                                    <td>$count</td>
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
                                    <input class = 'checkboxes' type='checkbox' onclick='selected($id)'>
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

    $query2 = "SELECT * FROM barangay WHERE health_district_id = '$heDiId'";
    $dbase = $database->stmt_init();
    $dbase->prepare($query2);
    $dbase->bind_result( $barangayId,$barangayHealthDistId, $barangayName);
    $dbase->execute();

    while ($dbase->fetch()){
        $barangaysLists[] = [$barangayId, $barangayHealthDistId, $barangayName] ;
    }

    $query3 = "SELECT * FROM health_district WHERE health_district_id = '$heDiId'";
    $dbase = $database->stmt_init();
    $dbase->prepare($query3);
    $dbase->bind_result( $hdId,$hdName, $hdNumber);
    $dbase->execute();
    $dbase->fetch();
    $dbase->close();

    echo " <div class='editButton'>
                <button class='buttonTransparent'><i class='fas fa-edit'></i></button><br>
            </div>

            <h3>Health District: </h3><br>
                $hdName <br><hr>
            <h3>Contact Number:</h3><br>
                $hdNumber<br><hr>
            <h3>Barangays: </h3><br>
    ";

    echo "
                            <ul>";

    foreach ($barangaysLists as $b) {
        echo "<li>
                                               <label>$b[2]</label>
                                               <div style='float: right'>
                                                    <button class='buttonTransparent hyperlink' onclick='del($b[1], deleteBarangay)'>delete</i></button>
                                               </div>
                                               </li>
                                               <br>

    ";
    }

    echo "
                           <div>
                                <button class='buttonTransparent hyperlink' onclick='openList($heDiId)'>+Add Barangay</i></button>
                           </div>

    ";
}

if (isset($_POST['archive'])){
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive"){
        $query = "UPDATE `vaccination_drive` SET `Archived`= 1 WHERE `drive_id` = '$archivedId'";
        $database->query($query);

    } else if ($option == "UnArchive") {
        $query = "UPDATE `vaccination_drive` SET `Archived`= 0 WHERE `drive_id` = '$archivedId'";
        $database->query($query);

     echo'
                    <table class="table table-row table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Drive Id</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">No. of Stubs</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

                        require_once '../require/getVaccinationDrive.php';
                        require_once '../require/getVaccinationSites.php';

                        $count = 0;
                        foreach ($vaccination_drive as $vd) {
                            if ($vd->getArchive() == 1) {
                                $count++;
                                $driveId = $vd->getDriveId();
                                $date = $vd->getVaccDate();
                                $stubs = $vd->getVaccStubs();


                                foreach ($vaccinationSites as $vs) {
                                    if ($vs->getVaccinationSiteId() == $vd->getVaccDriveVaccSiteId()) {
                                        $vaccinationSite = $vs->getVaccinationSiteLocation();
                                    }
                                }

                                echo "<tr class='table-row' >
                        <td>$count</td>
                        <td>$driveId</td>
                        <td>$vaccinationSite</td>
                        <td>$date</td>
                        <td>$stubs</td>
                        <td>
                            <div style='text-align: left;'>
                                <button class='buttonTransparent hyperlink' onclick='archive(0, clickArchive, $driveId )'>unarchive <i class='fas fa-box-open'></i></button>
                            </div>
                        </td>
             
                      </tr>";
                            }
                        }

                    echo "</table>";
    }
}

//if (isset($_POST['search'])) {
//    $search = $_POST['search'];
//    if ($search === "") {
//        $querySearch = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.date, vaccination_drive.stubs FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_site.vaccination_site_id;";
//    } else {
//        $querySearch = "SELECT  vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.date, vaccination_drive.stubs FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_site.vaccination_site_id WHERE vaccination_site.vaccination_site_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
//    }
//    echo '
//    <thead>
//                        <tr>
//                            <th scope="col">#</th>
//                            <th scope="col">Drive Id</th>
//                            <th scope="col">Location</th>
//                            <th scope="col">Date</th>
//                            <th scope="col">No. of Stubs</th>
//                            <th scope="col">Action</th>
//                        </tr>
//                        </thead>';
//
//    $count = 1;
//    $stmt = $database->stmt_init();
//    $stmt->prepare($querySearch);
//    $stmt->execute();
//    $stmt->bind_result($driveId, $vaccinationLocation, $date, $stubs);
//    while ($stmt->fetch()) {
//        echo "<tr>
//                <td>$count</td>
//                <td>$driveId</td>
//                <td>$vaccinationLocation</td>
//                <td>$date</td>
//                <td>$contactNum</td>
//                </tr>";
//        $count++;
//    }
//}