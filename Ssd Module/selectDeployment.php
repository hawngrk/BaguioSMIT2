<?php
require_once("../require/getVaccinationDrive.php");
require_once("../require/getVaccinationSites.php");
require_once ("../require/getBarangay.php");
include_once ('../includes/database.php');

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

if (isset($_POST['showUpdatedNotif'])){
    $query = "SELECT vaccination_drive.drive_id, vaccination_sites.location, vaccination_drive.vaccination_date, vaccination_drive.first_dose_stubs, vaccination_drive.second_dose_stubs, vaccination_drive.notif_opened FROM vaccination_sites JOIN vaccination_drive ON vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id ORDER BY vaccination_drive.drive_id desc;";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($driveId, $locName, $date, $firstStubs, $secondStubs, $opened);
    echo "<table class='tableScroll7 px-4 py-2'>
                            <tr><td><h4>Notifications<hr></h4></td></tr>";
    while ($stmt->fetch()) {
        if ($opened == 1) {
            echo "<tr onclick='updateDeploymentDetails($driveId)'>

                                                         <td>
                                                            Location: $locName <br>
                                                            Date: $date <br>
                                                            Number of First Stubs: $firstStubs <br>
                                                            Number of Second Stubs: $secondStubs <br>
                                                            <br>
                                                            <hr>
                                                            </td>
                                                       </tr>
                                                                          ";
        } else {
            echo "<tr onclick='updateDeploymentDetails($driveId)'>
                                                                       <script>document.getElementById('marker').setAttribute('style', 'color:#c10d0d!important');</script>
                                                            <td  style='background: lightgray!important'>New!<br>Vaccination Location: $locName<br>
                                                                Date: $date<br>
                                                                Number of First Stubs: $firstStubs <br>
                                                                Number of Second Stubs: $secondStubs<br>
                                                            <hr>
                                                            </td>
                                                            </tr>
                                                                          ";
        }
    }
    echo "</table>";
}

if (isset($_POST['deploymentId'])) {
    require "../require/getHealthDistrictDrives.php";
    require "../require/getHealthDistrict.php";
    $driveId = $_POST['deploymentId'];

    $query = "SELECT vaccination_drive.vaccination_date, vaccination_sites.location FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id WHERE vaccination_drive.drive_id = $driveId ";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($schedule, $site);
    $stmt->fetch();
    $stmt->close();


    echo "
            <h5> Vaccination Site/Location: </h5> <p> $site </p>
            <h5> Scheduled Date: </h5> <p> $schedule </p>
            <h5> Priority Group: </h5> ";

    $query2 = "SELECT priority_groups.priority_group FROM priority_drive JOIN priority_groups ON priority_drive.priority_id = priority_groups.priority_group_id WHERE priority_drive.drive_id = $driveId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query2);
    $stmt->execute();
    $stmt->bind_result($group);
    while ($stmt->fetch()) {
        echo"<li>
                  <label>$group</label>
             </li>";;
    }

    echo"<h5> First Dose Number Of Stubs: </h5>";

    $query3 = "SELECT vaccine_name, stubs FROM vaccine_drive_1 JOIN vaccine ON vaccine_drive_1.vaccine_id = vaccine.vaccine_id WHERE drive_id = $driveId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query3);
    $stmt->execute();
    $stmt->bind_result($vaccine, $stub);
    if ($stmt->num_rows()) {
        while ($stmt->fetch()) {
            echo "<li>
                  <label>$vaccine - $stub</label>
             </li>";
        }
    } else {
        echo "<li>
                  <label>None</label>
             </li>";
    }

    echo"<h5> Second Dose Number of Stubs: </h5>";

    $query3 = "SELECT vaccine_name, stubs FROM vaccine_drive_2 JOIN vaccine ON vaccine_drive_2.vaccine_id = vaccine.vaccine_id WHERE drive_id = $driveId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query3);
    $stmt->execute();
    $stmt->bind_result($vaccine, $stub);
    if ($stmt->num_rows()) {
        while ($stmt->fetch()) {
                echo "<li>
                  <label>$vaccine - $stub</label>
             </li>";
        }
    } else {
        echo "<li>
                  <label>None</label>
             </li>";
    }

    echo"<h5> Health Districts: </h5>";

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

if (isset($_POST['sendButton'])) {
    $drive = $_POST['sendButton'];
    $priorities = [];

    $query = "SELECT priority_groups.priority_group FROM priority_groups JOIN priority_drive ON priority_groups.priority_group_id = priority_drive.priority_id JOIN vaccination_drive ON priority_drive.drive_id = vaccination_drive.drive_id WHERE vaccination_drive.drive_id = '$drive';";
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($priority);
    while ($stmt->fetch()) {
        $priorities[] = $priority;
    }

    $priorities = json_encode($priorities);
    echo "
    <button id='sendStubs' type='button' class='btn btn-success' onclick='sendStubs($drive, $priorities)'>
                            <i class='fas fa-paper-plane'></i> Send Stubs </button>
    ";
}

if (isset($_POST['firstDose'])) {
    $drive = $_POST['firstDose'];
    $healthDistrictTab = [];
    $healthDistrictPage = [];
    $vaccines = [];
    $priorities = [];

    echo "
    <div class='bold counter'>
        <h5 ><i class='fas fa-ticket-alt'></i> Number of Stubs Left</h5>
        <ul id='vaccineStubCount'>";
    $query = "SELECT vaccine_drive_1.stubs, vaccine.vaccine_name FROM vaccine JOIN vaccine_drive_1 ON vaccine.vaccine_id = vaccine_drive_1.vaccine_id WHERE vaccine_drive_1.drive_id = '$drive';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($stubs, $vaccine);
    while ($stmt->fetch()) {
        $vaccines[] = $vaccine;
        $vacId = $vaccine.'1';
        echo "<li id='$vacId'>$vaccine = $stubs</li>";
    }

    $query = "SELECT priority_groups.priority_group_id, priority_groups.priority_group FROM priority_groups JOIN priority_drive ON priority_groups.priority_group_id = priority_drive.priority_id JOIN vaccination_drive ON priority_drive.drive_id = vaccination_drive.drive_id WHERE vaccination_drive.drive_id = '$drive';";
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($priorityId, $priority);
    while ($stmt->fetch()) {
        $priorities[] = $priority;
    }

    $query = "SELECT health_district.health_district_id, health_district_name FROM health_district JOIN health_district_drives ON health_district.health_district_id = health_district_drives.health_district_id WHERE health_district_drives.drive_id = '$drive'";

    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrictId, $healthDistrict);
    while ($stmt->fetch()) {
        $healthDistrictTab[] = $healthDistrict . '1';
        $healthDistrictPage[] = $healthDistrict . '1Page';
    }
    $healthDistrictTabs = json_encode($healthDistrictTab);
    $healthDistrictPages = json_encode($healthDistrictPage);
    echo"
    </ul>
    </div>
    <nav class=\"navbar navbar-expand-lg navbar-light navbarDep\">
                            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                                <ul class=\"navbar-nav\">
                                    <div class=\"row\">
                     ";
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrictId, $healthDistrict);
    while ($stmt->fetch()) {
        $tab = $healthDistrict . '1';
        $page = $healthDistrict . '1Page';
        echo"<div class=\"col-sm-auto\">
                                            <li role=\"presentation\" class=\"healthDistrict1 nav-item\">
                                                <a class=\"nav-link\" role=\"tab\" id=\"$tab\" data-toggle=\"tab\"
                                                   href=\"#$healthDistrict\"
                                                   onclick='shiftHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>$healthDistrict</a>
                                            </li>
                                        </div>";
    }

    echo "
    </div>


                                </ul>
                            </div>
                        </nav>
    <!-- Tab panes -->
                        <div class=\"tab-content\">";

    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrictId, $healthDistrict);
    while ($stmt->fetch()) {
        $page = $healthDistrict . '1Page';
        echo"
              <div role=\"tabpanel\" class=\"tab-pane tableScroll3\" id=\"$page\">";

        foreach ($barangays as $barangay) {
            if ($barangay->getBarangayHealthDistrictId() == $healthDistrictId) {
                $name = $barangay->getBarangayName();
                echo"
                <hr>
                <h2>$name</h2>
                <hr><br>";

                echo "

                    <div class='stubNumbersContainer'>
                    <div class='tableAllocate'>
                    <table class='table table-borderless tableModal $healthDistrict' id='$name'>
                            <thead>
                                <tr>
                                    <th> Vaccines </th>";
                foreach ($priorities as $priority) {
                    switch ($priority) {
                        case 'A1: Health Care Workers':
                            echo "<th> A1 </th>";
                            break;
                        case "A2: Senior Citizens":
                            echo "<th> A2 </th>";
                            break;
                        case "A3: Adult with Comorbidity":
                            echo "<th> A3 </th>";
                            break;
                        case "A4: Frontline Personnel in Essential Sector":
                            echo "<th> A4 </th>";
                            break;
                        case "A5: Indigent Population":
                            echo "<th> A5 </th>";
                            break;
                        case "Rest of Adult Population":
                            echo "<th> ROAP </th>";
                            break;
                        case "A3. Pedia: 12-17 Years Old with Commorbidity":
                            echo "<th> A3. Pedia </th>";
                            break;
                        case "Rest of Pedia Population":
                            echo "<th> ROPP </th>";
                            break;
                        default:
                            echo "";
                    }
                }
                echo"
                                </tr>
                            </thead>
                ";

                echo "<tbody>";
                foreach ($vaccines as $vaccine) {
                    echo "            <tr>
                                <th scope='row'> $vaccine</th>";
                    foreach ($priorities as $priority) {
                        echo "<td><input class='$priority' type='text' onchange='countStubs(this.value, this.oldValue, this, \"$vaccine\"); this.oldValue = this.value' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' size='1' value='0'><span id='percent' style='display: none'>%</span></td>";
                    }
                    echo"</tr>";
                }
                echo "             
             </tbody>
             </table>
             </div>
             </div>";

            }

        }
        echo "
        <div class='modal-footer'>";
        $tab = $healthDistrict . '1';
        $page = $healthDistrict . '1Page';
        if ($healthDistrict . '1' == reset($healthDistrictTab)) {
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='nextHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Next </button>";
        } else if ($healthDistrict . '1' == end($healthDistrictTab)) {
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='backHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Back </button>";
        } else {
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='backHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Back </button>";
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='nextHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Next </button>";
        }
        echo"
                </div>
        </div>";
    }
    $stmt->close();
    echo "                        
                        </div>
    ";
}

if (isset($_POST['secondDose'])) {
    $drive = $_POST['secondDose'];
    $healthDistrictTab = [];
    $healthDistrictPage = [];
    $vaccines = [];
    $priorities = [];

    echo "
    <div class='bold counter'>
        <h5 ><i class='fas fa-ticket-alt'></i> Number of Stubs Left</h5>
        <ul id='vaccineStubCount'>";
    $query = "SELECT vaccine_drive_2.stubs, vaccine.vaccine_name FROM vaccine JOIN vaccine_drive_2 ON vaccine.vaccine_id = vaccine_drive_2.vaccine_id WHERE vaccine_drive_2.drive_id = '$drive';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($stubs, $vaccine);
    while ($stmt->fetch()) {
        $vaccines[] = $vaccine;
        $vacId = $vaccine.'2';
        echo "<li id='$vacId'>$vaccine = $stubs</li>";
    }

    $query = "SELECT priority_groups.priority_group_id, priority_groups.priority_group FROM priority_groups JOIN priority_drive ON priority_groups.priority_group_id = priority_drive.priority_id JOIN vaccination_drive ON priority_drive.drive_id = vaccination_drive.drive_id WHERE vaccination_drive.drive_id = '$drive';";
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($priorityId, $priority);
    while ($stmt->fetch()) {
        $priorities[] = $priority;
    }

    $query = "SELECT health_district.health_district_id, health_district_name FROM health_district JOIN health_district_drives ON health_district.health_district_id = health_district_drives.health_district_id WHERE health_district_drives.drive_id = '$drive'";

    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrictId, $healthDistrict);
    while ($stmt->fetch()) {
        $healthDistrictTab[] = $healthDistrict . '2';
        $healthDistrictPage[] = $healthDistrict . '2Page';
    }

    $healthDistrictTabs = json_encode($healthDistrictTab);
    $healthDistrictPages = json_encode($healthDistrictPage);
    echo"
    </ul>
    </div>
    <nav class=\"navbar navbar-expand-lg navbar-light navbarDep\">
                            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                                <ul class=\"navbar-nav\">
                                    <div class=\"row\">
                     ";
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrictId, $healthDistrict);
    while ($stmt->fetch()) {
        $tab = $healthDistrict . '2';
        $page = $healthDistrict . '2Page';
        echo"<div class=\"col-sm-auto\">
                                            <li role=\"presentation\" class=\"healthDistrict1 nav-item\">
                                                <a class=\"nav-link\" role=\"tab\" id=\"$tab\" data-toggle=\"tab\"
                                                   href=\"#$healthDistrict\"
                                                   onclick='shiftHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>$healthDistrict</a>
                                            </li>
                                        </div>";
    }

    echo "
    </div>


                                </ul>
                            </div>
                        </nav>
    <!-- Tab panes -->
                        <div class=\"tab-content\">";

    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrictId, $healthDistrict);
    while ($stmt->fetch()) {
        $page = $healthDistrict . '2Page';
        echo"
              <div role=\"tabpanel\" class=\"tab-pane tableScroll3\" id=\"$page\">";

        foreach ($barangays as $barangay) {
            if ($barangay->getBarangayHealthDistrictId() == $healthDistrictId) {
                $name = $barangay->getBarangayName();
                $inputId = $name . '2';
                echo"
                <hr>
                <h2>$name</h2>
                <hr><br>";

                echo "

                    <div class='stubNumbersContainer'>
                    <div class='tableAllocate'>
                    <table class='table table-borderless tableModal'>
                            <thead>
                                <tr>
                                    <th> Vaccines </th>
                                    <th> Number of Stubs </th>
                                </tr>
                            </thead>
                ";

                echo "<tbody>";
                foreach ($vaccines as $vaccine) {
                    echo "<tr>
                                <th scope='row'> $vaccine</th>
                                <td><input id='$inputId' type='text' onchange='countStubs2(this.value, this.oldValue, this, \"$vaccine\"); this.oldValue = this.value' oninput='this.value = this.value.replace(/[^0-9.\%]/g, \"\").replace(/(\..*)\./g, \"$1\");' size='1' value='0'><span id='percent' style='display: none'>%</span></td>
                         </tr>";
                }
                echo "             
             </tbody>
             </table>
             </div>
             </div>";

            }

        }
        echo "
        <div class='modal-footer'>";
        $tab = $healthDistrict . '2';
        $page = $healthDistrict . '2Page';
        if ($healthDistrict . '2' == reset($healthDistrictTab)) {
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='nextHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Next </button>";
        } else if ($healthDistrict . '2' == end($healthDistrictTab)) {
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='backHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Back </button>";
        } else {
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='backHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Back </button>";
            echo "<button id='sendStubs' type='button' class='btn btn-primary' onclick='nextHealthDistrict(\"$tab\", $healthDistrictTabs, \"$page\" , $healthDistrictPages)'>
                 Next </button>";
        }
        echo"
                </div>
        </div>";
    }
    $stmt->close();
    echo "                        
                        </div>
    ";
}

if (isset($_POST['vaccineStubs'])) {
    $drive = $_POST['vaccineStubs'];
    $type = $_POST['type'];

    if ($type == 'firstDose') {
        $query = "SELECT vaccine_drive_1.stubs, vaccine.vaccine_name FROM vaccine JOIN vaccine_drive_1 ON vaccine.vaccine_id = vaccine_drive_1.vaccine_id WHERE vaccine_drive_1.drive_id = '$drive';";
    } else {
        $query = "SELECT vaccine_drive_2.stubs, vaccine.vaccine_name FROM vaccine JOIN vaccine_drive_2 ON vaccine.vaccine_id = vaccine_drive_2.vaccine_id WHERE vaccine_drive_2.drive_id = '$drive';";
    }

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($stubs, $vaccine);
    while ($stmt->fetch()) {
        if ($type == 'firstDose') {
            $var = $vaccine . '1';
        } else {
            $var = $vaccine . '2';
        }
        $vaccines["$var"] = $stubs;
    }

    echo json_encode($vaccines);
}

if (isset($_POST['healthDistricts'])) {
    $drive = $_POST['healthDistricts'];
    $healthDistricts = [];

    $query = "SELECT health_district_name FROM health_district JOIN health_district_drives ON health_district.health_district_id = health_district_drives.health_district_id WHERE health_district_drives.drive_id = '$drive'";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($healthDistrict);
    while ($stmt->fetch()) {
        $healthDistricts[] = $healthDistrict;
    }

    echo json_encode($healthDistricts);
}

if (isset($_POST['sendStubs'])) {
    $drive = $_POST['sendStubs'];
    $barangay = $_POST['barangay'];
    $stubs = json_decode($_POST['stubs'], true);

    $A1 = $stubs['A1: Health Care Workers'];
    $A2 = $stubs['A2: Senior Citizens'];
    $A3 = $stubs['A3: Adult with Comorbidity'];
    $A4 = $stubs['A4: Frontline Personnel in Essential Sector'];
    $A5 = $stubs['A5: Indigent Population'];
    $A6 = $stubs['Rest of Adult Population'];
    $secondDose = $stubs['Second Dose'];

    $query = "SELECT barangay_id FROM barangay WHERE barangay_name = '$barangay';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($barangayId);
    $stmt->fetch();
    $stmt->close();

    //$query = "INSERT INTO barangay_stubs (barangay_id, drive_id, A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, ROAP, A3_Pedia, ROPP, second_dose, notif_opened, sent_stubs) VALUE ('$barangay', '$drive', '$stubs[0]', '$stubs[1]', '$stubs[2]', '$stubs[3]', '$stubs[4]', '$stubs[5]', '$stubs[6]', '$stubs[7]', '$stubs[8]', 0, 0)";

    $query = "INSERT INTO barangay_stubs (barangay_id, drive_id, A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, A6_stubs, second_dose, notif_opened) VALUE ('$barangayId', '$drive', '$A1', '$A2', '$A3', '$A4', '$A5', '$A6', '$secondDose', 0);";
    $database->query($query);

    /*
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
    */
}


