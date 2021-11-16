<?php
include_once "../includes/database.php";

//if (isset($_POST['search'])) {
//    include '../includes/database.php';
//    $search = $_POST['search'];
//    echo "
//      <thead>
//            <tr class='tableCenterCont'>
//                <th scope='col'>Report ID</th>
//                <th scope='col'>Name of Reporter</th>
//                <th scope='col'>Date Reported</th>
//                <th scope='col'>Report Verified</th>
//                <th scope='col'>Action</th>
//            </tr>
//            </thead>
//            ";
//    if (empty($search)) {
//        $querySearch = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
//    } else {
//        $querySearch = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_id LIKE '$search%' OR patient_details.patient_last_name LIKE '$search%' OR patient_details.patient_first_name LIKE '$search%' OR patient_details.patient_middle_name LIKE '$search%';";
//    }
//    $stmt = $database->stmt_init();
//    $stmt->prepare($querySearch);
//    $stmt->execute();
//    $stmt->bind_result($reportId, $reporter, $dateReported, $status);
//
//    while ($stmt->fetch()) {
//        echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
//                <td>$reportId</td>
//                <td>$reporter</td>
//                <td>$dateReported</td>
//                <td>$status</td>
//                <td><button class='btn btn-success btn-sm' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
//                </tr>";
//    }
//}

//if (isset($_POST['sort'])) {
//    include '../includes/database.php';
//    $querySort = '';
//    $sort = $_POST['sort'];
//    echo "
//      <thead>
//            <tr class='tableCenterCont'>
//                <th scope='col'>Report ID</th>
//                <th scope='col'>Name of Reporter</th>
//                <th scope='col'>Date Reported</th>
//                <th scope='col'>Report Verified</th>
//                <th scope='col'>Action</th>
//            </tr>
//            </thead>
//            ";
//
//    if ($sort == 'Name Asc') {
//        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name ASC;";
//    } else if ($sort == 'Name Desc') {
//        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name DESC;";
//    } else if ($sort == 'Date Asc') {
//        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY report.date_reported ASC;";
//    } else if ($sort == 'Date Desc') {
//        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY report.date_reported DESC;";
//    }
//    $stmt = $database->stmt_init();
//    $stmt->prepare($querySort);
//    $stmt->execute();
//    $stmt->bind_result($reportId, $reporter, $dateReported, $status);
//
//    while ($stmt->fetch()) {
//        echo "<tr class='tableCenterCont'>
//                <td>$reportId</td>
//                <td>$reporter</td>
//                <td>$dateReported</td>
//                <td>$status</td>
//                <td><button class='btn btn-success btn-sm' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
//                </tr>";
//    }
//}
//
//if (isset($_POST['filter'])) {
//    include '../includes/database.php';
//    $filter = $_POST['filter'];
//    $queryFilter = '';
//    echo "
//      <thead>
//            <tr class='tableCenterCont'>
//                <th scope='col'>Report ID</th>
//                <th scope='col'>Name of Reporter</th>
//                <th scope='col'>Date Reported</th>
//                <th scope='col'>Report Verified</th>
//                <th scope='col'>Action</th>
//            </tr>
//            </thead>
//            ";
//
//    if ($filter == 'All') {
//        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
//    } else if ($filter == 'Unverified') {
//        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Unverified';";
//    } else if ($filter == 'Verified') {
//        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Verified';";
//    } else if ($filter == 'Invalidated') {
//        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Invalidated';";
//    }
//    $stmt = $database->stmt_init();
//    $stmt->prepare($queryFilter);
//    $stmt->execute();
//    $stmt->bind_result($reportId, $reporter, $dateReported, $status);
//
//    while ($stmt->fetch()) {
//        echo "<tr class='tableCenterCont'>
//                <td>$reportId</td>
//                <td>$reporter</td>
//                <td>$dateReported</td>
//                <td>$status</td>
//                <td><button class='btn btn-success btn-sm' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
//                </tr>";
//    }
//}

if (isset($_POST['invalidated'])) {
    include '../includes/database.php';
    $queryInvalidated = "SELECT report.report_id, patient.patient_full_name, report.date_reported FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Invalidated';";
    echo "
    <div class='content-modal'>
    <div class='modal-header'>
        <h4>Invalidated Reports</h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeInvalidatedReports()'>
            <i class='fas fa-window-close'></i>
        </button>
    </div>
    
    
    <div class='modal-body'>
      <table class='table table-row table-hover'>
      <thead class='tableHeader'>
            <tr class='tableCenterCont'>
                <th>Report ID</th>
                <th>Name of Reporter</th>
                <th>Date Reported</th>
                <th>Action</th>
            </tr>
            </thead>
            ";
    $stmt = $database->stmt_init();
    $stmt->prepare($queryInvalidated);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td><button class='btn btn-sm bg-none' type='submit' value='$reportId' onclick='viewInvalidatedReport($reportId)'><i class='fas fa-eye'></i></button></td>
                </tr>";
    }
    echo "
    </table>
    </div>
    </div>
    ";
}

if (isset($_POST['report'])) {
    include '../includes/database.php';
    require '../require/getReport.php';
    require '../require/getPatientDetails.php';
    require '../require/getVaccine.php';
    $reportId = $_POST['report'];
    $view = $_POST['view'];
    $patientId = '';
    $reportType = '';
    $dateRecentTravel = '';
    $vaccineSymptoms = '';
    $covid19Symptoms = '';
    $reportDetails = '';
    $reportStatus = '';
    $patientName = '';
    $patientAddress = '';
    $patientNum = '';
    $vacName = '';
    $vacDate = '';
    $vacDosage = '';

    foreach ($reports as $rep) {
        if ($rep->getReportId() == $reportId) {
            $patientId = $rep->getReportPatientId();
            $reportType = $rep->getReportType();
            $dateRecentTravel = $rep->getLastOut();
            $vaccineSymptoms = $rep->getVaccineSymptomsReported();
            $covid19Symptoms = $rep->getCovid19SymptomsReported();
            $reportDetails = $rep->getReportDetails();
            $reportStatus = $rep->getReportStatus();
        }
    }
    $vaccineSymptoms = explode(',', $vaccineSymptoms);
    $covid19Symptoms = explode(',', $covid19Symptoms);

    $query1 = "SELECT patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_details.patient_contact_number FROM patient_details JOIN patient ON patient.patient_id = patient_details.patient_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id WHERE patient_details.patient_id = $patientId ;";
    $dbase = $database->stmt_init();
    $dbase->prepare($query1);
    $dbase->execute();
    $dbase->bind_result($patientName, $patientAddress, $patientNum);
    $dbase->fetch();
    $dbase->close();


    echo "
    <div class='content-modal'>
    <div class='modal-header'>
        <h4 class='modal-title'> Review Report - $patientName</h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeViewReport(\"$reportStatus\")'>
            <i class='fas fa-window-close'></i>
        </button>
    </div>";

    echo "
    <div class='modal-body'>
    <div class='container-fluid'>
    <div class='row'>
        <div class='col'>
            <h5 class='reviewReport'><b>Report Information</b></h5>
            <h7 class='paddingLeft'><b>Report ID:</b> $reportId</h7>
            <br>
            <h7 class='paddingLeft'><b>Report Type:</b> $reportType</h7>
            <br>
            <h7 class='paddingLeft'><b>Date of recent travel:</b> $dateRecentTravel</h7>
            <br>
            </div>
        <div class='col'>
        <h5 class='reviewReport'>Symptoms Experienced</h5>
        <h7 class='ml-2'> <b> Vaccine Side Effect: </b></h7>
        <ul class='ml-2'>
        ";
        if ($vaccineSymptoms[0] === "") {
            echo "<li>None</li>";
        } else {
            foreach ($vaccineSymptoms as $vacSymp) {
                echo "<li>$vacSymp</li>";
            }
        }

        echo "
        </ul>
        </div>
        </div>
        <br>
    <div class='row'>
    <div class='col'>
        <h5>Applicable COVID-19 Symptoms:</h5>
        <div id='covidSymp'>
        <ul>";
        if ($covid19Symptoms[0] === "") {
            echo "<li>None</li>";
        } else {
            foreach ($covid19Symptoms as $covSymp) {
                echo "<li>$covSymp</li>";
            }
        }

        echo "
    </ul>
    </div>
    </div>
    
    <div class='col'>
        <h5>Additional Details:</h5>
        <h7 class='ml-4'>$reportDetails</h7>
    </div>
    </div>
    <br>
    <div class='row'>
    <div class='col-12'>
    <h5 class='reviewReportH3 padd'>Patient Information</h5>
    <h7 class='paddingLeft'><b> Patient Address: </b>   $patientAddress</h7>
    <br>
    <h7 class='paddingLeft'> <b> Contact Number: </b>  $patientNum</h7>
    <br>
    <h7 class='paddingLeft'><b> Report Status: </b>  $reportStatus</h7>
    </div> 
    </div>
    ";
    if ($view == 1) {
        if ($reportStatus === 'Invalidated') {
            echo "
             <div class='modal-footer'>
             <button type='button' class='btn btn-secondary' id='backInvalidatedReport' onclick='showInvalidatedReports()'> Back </button></div>";
        }
    } else if ($view == 2) {
        echo "<hr>
            <div class='col'>
            <h7 class='paddingLeft'> <b>Report Status: </b> </h7>";
        if ($reportStatus == 'Verified') {
            echo "
            <select id='statusSelection' style='margin-left: 3%; margin-top:1%;'>
            <option value='Verified' selected>Verify</option>
            <option value='Invalidate'>Invalidate</option>
            </select>
            </div>
            </div>";
        } else if ($reportStatus == 'Invalidated') {
            echo "
            <select class='form-select col-lg-12' id='statusSelection'>
            <option value='Invalidate' selected>Invalidate</option>
            <option value='Verify'> Verify</option>
            </select>
            </div>
            </div>";
        } else {
            echo "
            <select class='form-select col-lg-12' id='statusSelection'>
            <option value='Pending' selected disabled>Pending</option>
            <option value='Invalidate'>Invalidate</option>
            <option value='Verify'> Verify</option>
            </select>
            </div>
            </div>";
        }
        echo"
        </div>";
        if ($reportStatus === 'Invalidated') {
            echo "
                <div class='modal-footer'>
                
                <button type='button' class='btn btn-secondary reportButtongenButton' id='cancelBtnEditReport' onclick='viewInvalidatedReport($reportId)'> Cancel </button>
                ";
        } else {
            echo "
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary reportButton genButton' id='cancelBtnEditReport' onclick='viewReport($reportId)'> Cancel </button>
                ";
        }
        echo "
        <button type='button' class='btn btn-success genButton' id='confirmBtnEditReport' name='confirmBtnEditReport' onclick='changeRepStatus($reportId, \"$reportStatus\")'> Confirm </button>
        
    </div>
    </div>
   
    <br>
    </div>
    
    <div id='sympExpr'>
    
    </div>
    
    </div>
    <div id='repDetails'>

    <br>
    <br>
    </div>
    </div>
    <div id='patInfo'>
    </div>";
    }


echo"
    
    ";
if ($view == 1) {
    if ($reportStatus === 'Invalidated') {
       // echo "
        //<div class='modal-footer'>
        //<button class='btn btn-primary editRepBtn' value='$reportId' onclick='editInvalidatedReport($reportId)'>Change report status</button>";
    } else {
        echo "
<div class='modal-footer'>
<button class='btn btn-primary editRepBtn' value='$reportId' onclick='editReport($reportId)'> Change report status</button>
</div>";

    }
}
echo"
    </div>
    </div>
    </div>
    ";
}


if (isset($_POST['changeStatus'])) {
    include ('../includes/database.php');
    $reportId = $_POST['reportid'];
    $status = $_POST['changeStatus'];

    $database->query("UPDATE report SET report_status = '$status' WHERE report_id = '$reportId';");
}

if (isset($_POST['generate'])) {
    echo "
        <div class='content-modal-table1'>
            <div class='modal-header'>
                <h4>Generate Reports</h4>
                <button type='button' class='close' data-dismiss='modal' onclick='closeGenerateReports()'>
                    <i class='fas fa-window-close'></i>
                </button>
            </div>
    
    
        <div class='modal-body'>
            <table class='table table-row table-hover'>
            <thead class='tableHeader'>
            <tr class='tableCenterCont'>
                <th onclick=selectHighlight(this); scope='col'>Select</th>
                <th onclick=selectHighlight(this); scope='col'>Report ID</th>
                <th onclick=selectHighlight(this); scope='col'>Name of Reporter</th>
                <th onclick=selectHighlight(this); scope='col'>Date Reported</th>
                <th onclick=selectHighlight(this); scope='col'>Report Verified</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>
            ";

    require_once '../require/getReport.php';
    require_once '../require/getPatient.php';

    foreach ($reports as $rep) {
        $reportId = $rep->getReportId();
        $patientId = $rep->getReportPatientId();
        $dateReported = $rep->getDateReported();
        $status = $rep->getReportStatus();

        foreach ($patients as $pat) {
            if ($patientId == $pat->getPatientId()) {
                $reporter = $pat->getPatientFullName();
            }
        }
        echo "
            <tr class='tableCenterCont'>
                <td><input type='checkbox' onclick='selectHighlight(this)' class='reportList' value='$reportId'></td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='btn btn-sm bg-none' type='submit' value='$reportId' onclick='viewReport($reportId)'><i class='fas fa-eye'></i></button></td>
                </tr>";
    }

    echo "
        </table>
        </div>
        <div class='modal-footer'>
        
        <h10 id='DlRepNote' class='mr-auto'>Note: select report/s you want to download</h10>
        <button type='button' class='btn btn-danger genButton' id='cancelGenerateReportBtn' onclick='closeGenerateReports()'>Cancel</button>
        <button type='button' class='btn btn-success genButton' id='downloadGenerateReportBtn' onclick='downloadReports()'>Download Files</button>
        </div>
        </div>
        </div>";
}

require '../vendor/autoload.php';
use PhpOffice\PhpWord\PhpWord;
if (isset($_POST['download'])) {
    include '../includes/database.php';
    $stmt = $database->stmt_init();
    $reports = $_POST['download'];
    mkdir('reports');

    foreach ($reports as $rep) {
        $getReportsQuery = "SELECT report.report_id, report.report_type, report.report_details, report.report_status, CONCAT(patient_details.patient_first_name, ' ', patient_details.patient_middle_name, ' ', patient_details.patient_last_name) AS full_name, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_details.patient_contact_number FROM report JOIN patient_details ON report.patient_id = patient_details.patient_id WHERE report.report_id = $rep";
        $stmt->prepare($getReportsQuery);
        $stmt->execute();
        $stmt->bind_result($reportId, $reportType, $reportDetails, $reportStatus, $patientName, $patientAddress, $patientNum);
        $stmt->fetch();

        $phpWord = new PhpWord();
        $phpWord->addFontStyle('titleFont', array('bold' => true, 'italic' => false, 'size' => 20));
        $phpWord->addParagraphStyle('title', array('align' => 'center', 'spaceAfter' => 100));
        $phpWord->addFontStyle('heading', array('bold' => true, 'italic' => false, 'size' => 12));
        $phpWord->addFontStyle('text', array('bold' => false, 'italic' => false, 'size' => 11));
        $body = $phpWord->addSection();
        $body->addText('REVIEW REPORT -' . " " . $patientName, 'titleFont', 'title');
        $body->addText('');
        $body->addText('Report Information', 'heading');
        $body->addText('Report ID: ' . $reportId, 'text');
        $body->addText('Report Type: ' . $reportType, 'text');
        $body->addText('Report Details:', 'text');
        $textbox = $body->addTextBox(
            array(
                'alignment'   => \PhpOffice\PhpWord\SimpleType\Jc::START,
                'width'       => 450,
                'height'      => 100,
                'borderColor' => '#000000',
                'borderSize'  => 1,
            )
        );
        $textbox->addText($reportDetails, 'text');
        $body->addText('');
        $body->addText('Patient Information', 'heading');
        $body->addText('Patient Address: ' . $patientAddress, 'text');
        $body->addText('Contact Number: ' . $patientNum, 'text');
        $body->addText('');
        $body->addText('Vaccine Information', 'heading');
        $body->addText('Vaccine Name: ', 'text');
        $body->addText('Vaccination Date: ', 'text');
        $body->addText('Current Dosage: ', 'text');
        $body->addText('Report Status: ' . $reportStatus, 'text');

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('reports/' . $reportId . " - ". $patientName. '.docx');
    }
}

if (isset($_POST['archive'])) {
    $archivedId = $_POST['archive'];
    $option = $_POST['option'];

    if ($option == "Archive") {
        $query = "UPDATE report SET Archived = 1 WHERE `report_id` = '$archivedId'";
        $database->query($query);

        echo '   <table class="table table-row table-hover tableModal" id="vaccineTable">
                        <thead>
                        <tr class="tableCenterCont">
                            <th scope="col">Report ID</th>
                            <th scope="col">Name of Reporter</th>
                            <th scope="col">Date Reported</th>
                            <th scope="col">Report Verified</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

        $query1 = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.patient_id = patient.patient_id WHERE report.Archived = 0 and report.report_status != 'Invalidated';";
        $dbase = $database->stmt_init();
        $dbase->prepare($query1);
        $dbase->execute();
        $dbase->bind_result($reportId, $reporter, $dateReported, $status);
        while ($dbase->fetch()) {

            echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td>
                                          <button class='btn btn-sm bg-none' type='submit' value='$reportId' onclick='viewReport($reportId)'><i class='fas fa-eye'></i></button>
                                          <button class='buttonTransparent actionButt' onclick='archive(1, clickArchive, $reportId)'><i class='fa fa-archive'></i></button>
                                          </td></tr>";

        }
        echo "</div></table>";

    } else if ($option == "UnArchive") {
        $query = "UPDATE report SET `Archived`= 0 WHERE `report_id` = '$archivedId'";
        $database->query($query);

        echo '   <table class="table table-row table-hover tableModal" id="vaccineTable">
                        <thead>
                        <tr class="tableCenterCont">
                            <th scope="col">Report ID</th>
                            <th scope="col">Name of Reporter</th>
                            <th scope="col">Date Reported</th>
                            <th scope="col">Report Verified</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

        $query1 = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.patient_id = patient.patient_id WHERE report.Archived = 1;";
        $dbase = $database->stmt_init();
        $dbase->prepare($query1);
        $dbase->execute();
        $dbase->bind_result($reportId, $reporter, $dateReported, $status);
        while ($dbase->fetch()) {

            echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td>
                                            <div style='text-align: left;'>
                                                 <button class='btn btn-warning' onclick='archive(0, clickArchive, $reportId )'> unarchive <i class='fas fa-box-open'></i></button>
                                            </div>
                                          </td></tr>";

        }
        echo "</div></table>";
    }
}

if (isset($_POST['showUpdatedReport'])){

     echo'<table class="table table-row table-hover tableModal" id="vaccineTable">
                        <thead>
                        <tr class="tableCenterCont">
                            <th scope="col">Report ID</th>
                            <th scope="col">Name of Reporter</th>
                            <th scope="col">Date Reported</th>
                            <th scope="col">Report Verified</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

                            require_once '../require/getReport.php';
                            require_once '../require/getPatient.php';

                            foreach ($reports as $rep) {
                                if ($rep->getArchived() == 0) {

                                    $reportId = $rep->getReportId(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
                                    $patientId = $rep->getReportPatientId();
                                    $dateReported = $rep->getDateReported();
                                    $status = $rep->getReportStatus();

                                    if ($status != 'Invalidated') {
                                        foreach ($patients as $pat) {
                                            if ($patientId == $pat->getPatientId()) {
                                                $reporter = $pat->getPatientFullName();
                                            }
                                        }
                                        echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td>
                                            <button class='btn btn-sm bg-none ' type='submit' value='$reportId' onclick='viewReport($reportId)'><i class='fas fa-eye'></i></button>
                                          <button class='buttonTransparent actionButt' onclick='archive(1, clickArchive, $reportId)'><i class='fa fa-archive'></i></button>
                                          </td></tr>";
                                    }
                                }
                            }
                            echo"
                        </div>
                    </table>";
}

if (isset($_POST['showUpdatedArchive'])){
    echo'<table class="table table-row table-hover tableModal" id="vaccineTable">
                        <thead>
                        <tr class="tableCenterCont">
                            <th scope="col">Report ID</th>
                            <th scope="col">Name of Reporter</th>
                            <th scope="col">Date Reported</th>
                            <th scope="col">Report Verified</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>';

    require_once '../require/getReport.php';
    require_once '../require/getPatient.php';

    foreach ($reports as $rep) {
        if ($rep->getArchived() == 1) {

            $reportId = $rep->getReportId(); //replace this part based on the column name mentioned above in chronological order - NATIVIDAD HUDSON
            $patientId = $rep->getReportPatientId();
            $dateReported = $rep->getDateReported();
            $status = $rep->getReportStatus();

            if ($status != 'Invalidated') {
                foreach ($patients as $pat) {
                    if ($patientId == $pat->getPatientId()) {
                        $reporter = $pat->getPatientFullName();
                    }
                }
                echo "<tr class='tableCenterCont' onclick='viewReport($reportId)'>
                                          <td>$reportId</td>
                                          <td>$reporter</td>
                                          <td>$dateReported</td>
                                          <td>$status</td>
                                          <td>
                                            <div style='text-align: left;'>
                                                 <button class='btn btn-warning' onclick='archive(0, clickArchive, $reportId )'>unarchive <i class='fas fa-box-open'></i></button>
                                            </div>
                                          </td></tr>";
            }
        }
    }
    echo"
                        </div>
                    </table>";
}
