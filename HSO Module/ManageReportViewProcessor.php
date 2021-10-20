<?php
if (isset($_POST['search'])) {
    include '../includes/database.php';
    $search = $_POST['search'];
    echo "
      <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Report ID</th>
                <th scope='col'>Name of Reporter</th>
                <th scope='col'>Date Reported</th>
                <th scope='col'>Report Verified</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>
            ";
    if (empty($search)) {
        $querySearch = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_id LIKE '$search%' OR patient_details.patient_last_name LIKE '$search%' OR patient_details.patient_first_name LIKE '$search%' OR patient_details.patient_middle_name LIKE '$search%';";
    }
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported, $status);

    while ($stmt->fetch()) {
        echo "<tr>
                <td>$reportId</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='badge badge-secondary' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }
}

if (isset($_POST['sort'])) {
    include '../includes/database.php';
    $querySort = '';
    $sort = $_POST['sort'];
    echo "
      <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Report ID</th>
                <th scope='col'>Name of Reporter</th>
                <th scope='col'>Date Reported</th>
                <th scope='col'>Report Verified</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>
            ";

    if ($sort == 'Name Asc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name ASC;";
    } else if ($sort == 'Name Desc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY patient_details.patient_last_name DESC;";
    } else if ($sort == 'Date Asc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY report.date_reported ASC;";
    } else if ($sort == 'Date Desc') {
        $querySort = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id ORDER BY report.date_reported DESC;";
    }
    $stmt = $database->stmt_init();
    $stmt->prepare($querySort);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported, $status);

    while ($stmt->fetch()) {
        echo "<tr>
                <td>$reportId</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='badge badge-secondary' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }
}

if (isset($_POST['filter'])) {
    include '../includes/database.php';
    $filter = $_POST['filter'];
    $queryFilter = '';
    echo "
      <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Report ID</th>
                <th scope='col'>Name of Reporter</th>
                <th scope='col'>Date Reported</th>
                <th scope='col'>Report Verified</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>
            ";

    if ($filter == 'All') {
        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else if ($filter == 'Unverified') {
        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Unverified';";
    } else if ($filter == 'Verified') {
        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Verified';";
    } else if ($filter == 'Invalidated') {
        $queryFilter = "SELECT report.report_id, patient.patient_full_name, report.date_reported, report.report_status FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Invalidated';";
    }
    $stmt = $database->stmt_init();
    $stmt->prepare($queryFilter);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported, $status);

    while ($stmt->fetch()) {
        echo "<tr>
                <td>$reportId</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='badge badge-secondary' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }
}

if (isset($_POST['invalidated'])) {
    include '../includes/database.php';
    $queryInvalidated = "SELECT report.report_id, patient.patient_full_name, report.date_reported FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Invalidated';";
    echo "
    <div class='content-modal'>
    <div class='modal-header'>
        <h4>Invalidated Reports</h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeInvalidatedReports()'>
            &times;
        </button>
    </div>
    
    
    <div class='modal-body'>
      <table class='table table-row table-hover'>
      <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Report ID</th>
                <th scope='col'>Name of Reporter</th>
                <th scope='col'>Date Reported</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>
            ";
    $stmt = $database->stmt_init();
    $stmt->prepare($queryInvalidated);
    $stmt->execute();
    $stmt->bind_result($reportId, $reporter, $dateReported);

    while ($stmt->fetch()) {
        echo "<tr>
                <td>$reportId</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td><button class='badge badge-secondary' type='submit' value='$reportId' onclick='viewInvalidatedReport($reportId)'>Review Report</button></td>
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

    foreach ($patient_details as $pat_det) {
        if ($pat_det->getPatientDeetPatId() == $patientId) {
            $patientName = $pat_det->getPatientFName(). " " .$pat_det->getPatientMName(). " " .$pat_det->getPatientLName();
            $patientAddress = $pat_det->getHouseAdd(). ", " .$pat_det->getBrgy(). ", " .$pat_det->getCity(). ", " .$pat_det->getProvince();
            $patientNum = $pat_det->getContact();
        }
    }
    echo "
    <div class='content-modal'>
    <div class='modal-header'>
        <h4 class='modal-title'>Review report - $patientName</h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeViewReport(\"$reportStatus\")'>
            &times;
        </button>
    </div>";

    echo "
    <div class='modal-body'>
    <div class='ReviewReport-PopUp '>
    <div id='repInfo'>
    <h3 class='reviewReport'>Report Information</h3>
    <h7>Report ID: $reportId</h7>
    <br>
    <h7>Report Type: $reportType</h7>
    <br>
    <h7>Date of recent travel: $dateRecentTravel</h7>
    <br>
    <br>
    </div>
    <div id='sympExpr'>
    <h3 class='reviewReport'>Symptoms Experienced</h3>
    <div id='vacSideEffect'>
    <h5>Vaccine Side Effect:</h5>
    <ul>
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
    <div id='covidSymp'>
    <h5>Applicable COVID-19 Symptoms:</h5>
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
    <div id='repDetails'>
    <h5>Additional Details:</h5>
    <h7>$reportDetails</h7>
    <br>
    <br>
    </div>
    </div>
    <div id='patInfo'>
    <h3 class='reviewReportH3'>Patient Information</h3>
    <h7>Patient Address: $patientAddress</h7>
    <h7>Contact Number: $patientNum</h7>
    </div>";
    if ($view == 1) {
        echo "<h7>Report Status: $reportStatus</h7>
        </div> ";
        if ($reportStatus === 'Invalidated') {
            echo "<button type='button' id='backInvalidatedReport' onclick='showInvalidatedReports()'>Back</button>";
        }
    } else if ($view == 2) {
        echo "<p>Report Status: </p>";
        if ($reportStatus == 'Verified') {
            echo "
            <select class='form-select col-lg-12' id='statusSelection'>
            <option selected>Verify</option>
            <option>Invalidate</option>
            </select>";
        } else if ($reportStatus == 'Invalidated') {
            echo "
            <select class='form-select col-lg-12' id='statusSelection'>
            <option>Verify</option>
            <option selected>Invalidate</option>
            </select>";
        }
        echo"
        </div>";
        if ($reportStatus === 'Invalidated') {
            echo "<button id='cancelBtnEditReport' onclick='viewInvalidatedReport($reportId)'> Cancel </button>";
        } else {
            echo "<button id='cancelBtnEditReport' onclick='viewReport($reportId)'> Cancel </button>";
        }
        echo "
        <button id='confirmBtnEditReport' name='confirmBtnEditReport' onclick='changeRepStatus($reportId, \"$reportStatus\")'> Confirm        </button>
        </div>";
    }


echo"
    <div class='modal-footer'>
    ";
if ($view == 1) {
    if ($reportStatus === 'Invalidated') {
        echo "<button class='btn btn-primary editRepBtn' value='$reportId' onclick='editInvalidatedReport($reportId)'>Change report status</button>";
    } else {
        echo "<button class='btn btn-primary editRepBtn' value='$reportId' onclick='editReport($reportId)'>Change report status</button>";
    }
}
echo"
    </div>
    </div>
    </div>
    ";
}


if (isset($_POST['changeStatus'])) {
    $reportId = $_POST['reportid'];
    $status = $_POST['changeStatus'];
}

if (isset($_POST['generate'])) {
    echo "
        <div class='content-modal-table1'>
            <div class='modal-header'>
                <h4>Generate Reports</h4>
                <button type='button' class='close' data-dismiss='modal' onclick='closeGenerateReports()'>
                    &times;
                </button>
            </div>
    
    
        <div class='modal-body'>
            <table class='table table-row table-hover'>
            <thead>
            <tr>
                <th onclick=selectHighlight(this); scope='col'>Select</th>
                <th onclick=selectHighlight(this); scope='col'>#</th>
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

    $count = 0;
    foreach ($reports as $rep) {
        $count++;
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
            <tr>
                <td><input type='checkbox' onclick='selectHighlight(this)' class='reportList' value='$reportId'></td>
                <td>$count</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='badge badge-secondary' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }

    echo "
        </table>
        </div>
        <div class='modal-footer'>
        
        <h10 id='DlRepNote' class='mr-auto'>Note: select report/s you want to download</h10>
        <button type='button' class='btn btn-secondary genButton' id='cancelGenerateReportBtn' onclick='closeGenerateReports()'>Cancel</button>
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
