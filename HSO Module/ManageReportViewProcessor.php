<?php
include_once "../includes/database.php";

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
            $dateRecentTravel = $rep->getLastOut();
            $vaccineSymptoms = $rep->getVaccineSymptomsReported();
            $covid19Symptoms = $rep->getCovid19SymptomsReported();
            $reportDetails = $rep->getReportDetails();
            $reportStatus = $rep->getReportStatus();
        }
    }
    $vaccineSymptoms = explode(',', $vaccineSymptoms);
    $covid19Symptoms = explode(',', $covid19Symptoms);

    $query1 = "SELECT patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province) AS full_address, patient_details.patient_contact_number, patient.date_of_first_dosage, date_of_second_dosage FROM patient_details JOIN patient ON patient.patient_id = patient_details.patient_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id WHERE patient_details.patient_id = $patientId ;";
    $dbase = $database->stmt_init();
    $dbase->prepare($query1);
    $dbase->execute();
    $dbase->bind_result($patientName, $patientAddress, $patientNum, $firstDate, $secondDate);
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
            <h5>Patient Information</h5>
            <h7 class='ml-4'><b> Address: </b> &nbsp; $patientAddress</h7>
            <br>
            <br>
            <h5>Vaccination Information</h5>
            <h7 class='paddingLeft ml-4'> <b> First Dose Date: &nbsp; </b>
            ";
    if ($firstDate != ""){
        echo "$firstDate</h7>";
    }else {
        echo "Not Vaccinated </h7>";
    }
    echo" <br>
    <h7 class='paddingLeft ml-4'> <b> Second Dose Date: &nbsp; </b>";

    if ($secondDate != ""){
        echo "$secondDate</h7>";
    }else {
        echo "Not Vaccinated </h7>";
    }

    echo"
            <h5><br>Report Information</h5>
            <h7 class='ml-4'><b>Report ID:</b> &nbsp; $reportId</h7>
            <br>
            <h7 class='ml-4'><b>Date of recent travel:</b> &nbsp;$dateRecentTravel</h7>
            <br>
            <h7 class='ml-4'><b> Report Status: </b> &nbsp; $reportStatus</h7>
            </div>
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
        <h5 class='reviewReport'>Symptoms Experienced</h5>
        <h7 class='ml-4'> <b> Vaccine Side Effect: </b></h7>
        <ul class='ml-5'>
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
        <br>
        <br>
        <div class='row mx-4 mt-3'>
         <div class='text-justify border border-secondary rounded p-3 w-100'>
            <h5 class='reviewReport'>Additional Details:</h5>
            <h7 class='ml-2'> $reportDetails</h7>
           </div>
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
    
    
        <div class='modal-body tableScroll3'>
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
use PhpOffice\PhpWord\TemplateProcessor;
if (isset($_POST['download'])) {
    include '../includes/database.php';
    $stmt = $database->stmt_init();
    $reports = $_POST['download'];
    mkdir('reports');

    foreach ($reports as $rep) {
        $getReportsQuery = "SELECT report.report_id, report.report_details, report.report_status, patient.patient_full_name, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient.date_of_second_dosage, patient.date_of_first_dosage, patient.second_dose_vaccination, patient.first_dose_vaccination, patient_details.patient_contact_number, vaccine.vaccine_name FROM report JOIN patient ON report.patient_id = patient.patient_id JOIN patient_details ON report.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN patient_drive ON patient.patient_id = patient_drive.patient_id JOIN vaccine_lot ON patient_drive.vaccine_lot_id = vaccine_lot.vaccine_lot_id JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id WHERE report.report_id = $rep;";
        $stmt->prepare($getReportsQuery);
        $stmt->execute();
        $stmt->bind_result($reportId, $reportDetails, $reportStatus, $patientName, $patientAddress, $dateSecond, $dateFirst, $dosageSecond, $dosageFirst, $patientNum, $vaccine);
        $stmt->fetch();

        //$phpWord = new PhpWord();
        $dosage = '';
        $date = '';
        if ($dosageSecond == '1') {
            $dosage = 'Fully Vaccinated';
            $date = $dateSecond;
        } else if ($dosageFirst == '1') {
            $dosage = 'First Dose';
            $date = $dateFirst;
        } else {
            $dosage = 'Not Yet Vaccinated';
            $date = 'N/A';
        }

        $template = new TemplateProcessor('ReportTemplate.docx');
        $template->setValue('name', $patientName);
        $template->setValue('id', $reportId);
        $template->setValue('details', $reportDetails);
        $template->setValue('address', $patientAddress);
        $template->setValue('number', $patientNum);
        $template->setValue('status', $reportStatus);
        $template->setValue('vaccine', $vaccine);
        $template->setValue('date', $date);
        $template->setValue('dosage', $dosage);
        /*
        $phpWord->addFontStyle('titleFont', array('bold' => true, 'italic' => false, 'size' => 20));
        $phpWord->addParagraphStyle('title', array('align' => 'center', 'spaceAfter' => 100));
        $phpWord->addFontStyle('heading', array('bold' => true, 'italic' => false, 'size' => 12));
        $phpWord->addFontStyle('text', array('bold' => false, 'italic' => false, 'size' => 11));
        $body = $phpWord->addSection();
        $body->addText('REVIEW REPORT -' . " " . $patientName, 'titleFont', 'title');
        $body->addText('');
        $body->addText('Report Information', 'heading');
        $body->addText('Report ID: ' . $reportId, 'text');
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
        */

        $pathToSave = 'reports/' . $reportId . " - ". $patientName. '.docx';
        $template->saveAs($pathToSave);
        //$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        //$objWriter->save('reports/' . $reportId . " - ". $patientName. '.docx');
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
