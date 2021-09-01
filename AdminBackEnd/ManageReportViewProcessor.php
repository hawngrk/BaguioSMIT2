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
                <td><button class='viewReportBtn' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
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
                <td><button class='viewReportBtn' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
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
                <td><button class='viewReportBtn' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }
}

if (isset($_POST['invalidated'])) {
    include '../includes/database.php';
    $queryInvalidated = "SELECT report.report_id, patient.patient_full_name, report.date_reported FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Invalidated';";
    echo "
    <div class='modal-content container'>
    <h2 id='headerInvalidatedReports'><span id='invalidatedReportsClose' class='close' onclick='closeInvalidatedReports()'>&times;</span>Invalidated Reports</h2>
    <div class='ViewInvalidated-PopUp'>
      <table class='table table-row table-hover tableReport'>
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
                <td><button class='viewReportBtn' type='submit' value='$reportId' onclick='viewInvalidatedReport($reportId)'>Review Report</button></td>
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
    <div class='modal-content container'>
    <h2 id='headerReviewReport'>REVIEW REPORT - $patientName<span id='viewReportClose' class='close' onclick='closeViewReport(\"$reportStatus\")'>&times;</span></h2>";
    if ($view == 1) {
        if ($reportStatus === 'Invalidated') {
            echo "<button class='viewReportBtn' value='$reportId' onclick='editInvalidatedReport($reportId)'>Edit</button>";
        } else {
            echo "<button class='viewReportBtn' value='$reportId' onclick='editReport($reportId)'>Edit</button>";
        }
    }
    echo "
    <div class='ReviewRerport-PopUp'>
    <div id='repInfo'>
    <h4 class='reviewReportH3'>Report Information</h4>
    <p>Report ID: $reportId</p>
    <p>Report Type: $reportType</p>
    <p>Date of recent travel: $dateRecentTravel</p>
    </div>
    <div id='sympExpr'>
    <h4 class='reviewReportH3'>Symptoms Experienced</h4>
    <div id='vacSideEffect'>
    <p>Vaccine Side Effect:</p>
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
    <p>Applicable COVID-19 Symptoms:</p>
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
    <p>Additional Details:</p>
    <p>$reportDetails</p>
    </div>
    </div>
    <div id='patInfo'>
    <h4 class='reviewReportH3'>Patient Information</h4>
    <p>Patient Address: $patientAddress</p>
    <p>Contact Number: $patientNum</p>
    </div>";
    if ($view == 1) {
        echo "<p>Report Status: $reportStatus</p>
        </div> ";
        if ($reportStatus === 'Invalidated') {
            echo "<button type='button' id='backInvalidatedReport' onclick='showInvalidatedReports()'>Back</button>";
        }
        echo "</div>";
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
}

if (isset($_POST['changeStatus'])) {
    $reportId = $_POST['reportid'];
    $status = $_POST['changeStatus'];
}

if (isset($_POST['generate'])) {
    $view = $_POST['generate'];
    echo "
      <thead>
            <tr>";
    if ($view == 1) {
        echo   "<th scope='col'>Select All/Clear</th>";
    } echo"
                <th scope='col'>#</th>
                <th scope='col'>Report ID</th>
                <th scope='col'>Name of Reporter</th>
                <th scope='col'>Date Reported</th>
                <th scope='col'>Report Verified</th>
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
        echo "<tr>";
        if ($view == 1) {
            echo "<td><input type='checkbox' class='reportList' value='$reportId'></td>";
        }
        echo "
                <td>$count</td>
                <td>$reportId</td>
                <td>$reporter</td>
                <td>$dateReported</td>
                <td>$status</td>
                <td><button class='viewReportBtn' type='submit' value='$reportId' onclick='viewReport($reportId)'>Review Report</button></td>
                </tr>";
    }
}

if (isset($_POST['options'])) {
    echo "
    <button type='button' class='buttonTop' id='downloadGenerateReportBtn' onclick='downloadReports()'>Download Files</button>
    <button type='button' class='buttonTop' id='cancelGenerateReportBtn' onclick='generateReport(2)'>Cancel</button>";
}

if (isset($_POST['download'])) {
    include '../includes/database.php';
    $stmt = $database->stmt_init();
    $reports = $_POST['download'];
    "SELECT report.report_id, patient.patient_full_name, report.date_reported FROM report JOIN patient ON report.report_id = patient.patient_id JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE report.report_status = 'Invalidated';";
    foreach ($reports as $rep) {
        $getReportsQuery = "SELECT * FROM report WHERE report_id=$rep;";
        $stmt->prepare($getReportsQuery);
        $stmt->execute();
        $stmt->bind_result($reportId, $reporter, $dateReported);
    }
}
