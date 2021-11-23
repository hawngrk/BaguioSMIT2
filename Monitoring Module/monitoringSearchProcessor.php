<?php
include("../includes/database.php");

if (isset($_POST['search'])) {
    $searchPatient = $_POST['search'];
    if ($searchPatient == "") {
        $querySearchPatient = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0;";
    } else {
        $querySearchPatient = "SELECT patient.patient_id, CONCAT(patient_details.patient_last_name,', ',patient_details.patient_first_name,' ',COALESCE(patient_details.patient_middle_name,''),' ',COALESCE(patient_details.patient_suffix,'')) AS full_name, priority_groups.priority_group, CONCAT(patient_details.patient_house_address, ' ', barangay.barangay_name,' ',barangay.city,' ', barangay.province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN priority_groups ON priority_groups.priority_group_id = patient_details.priority_group_id WHERE patient_details.Archived = 0 AND patient_details.patient_id LIKE '$searchPatient%' OR barangay.barangay_name LIKE '$searchPatient%' OR patient_details.patient_first_name LIKE '$searchPatient%' OR patient_details.patient_last_name LIKE '$searchPatient%';";
    }
    echo "
    <thead>
            <tr class='tableCenterCont'>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Category</th>
                <th>Complete Address</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
            </thead>";
            
    $stmt = $database->stmt_init();
    $stmt->prepare($querySearchPatient);
    $stmt->execute();
    $stmt->bind_result($patientID, $fullname, $category, $patientAddress, $contactNum);

    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td class='columnName'>$patientID</td>
                <td class='columnName'>$fullname</td>
                <td class='columnName'>$category</td>
                <td class='columnName'>$patientAddress</td>
                <td class='columnName'>$contactNum</td>
                <td class='columnName'>
                <button class='addVitals btn-success btn-info' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button>
                </td>
                </tr>";
    }
}

if (isset($_POST['modalRes'])) {
    $patientID = $_POST['modalRes'];
    require('../includes/configure.php');

    $queryDetails = 
    "SELECT 
        patient.patient_full_name,
        patient.date_of_first_dosage,
        patient.date_of_second_dosage,
        patient.first_dose_vaccination,
        patient.second_dose_vaccination,
        patient_vitals.pre_vital_pulse_rate_1st_dose,
        patient_vitals.pre_vital_temp_rate_1st_dose,
        patient_vitals.pre_oxygen_saturation_1st_dose,
        patient_vitals.pre_vital_bpDiastolic_1st_dose,
        patient_vitals.pre_vital_bpSystolic_1st_dose,
        patient_vitals.pre_vital_pulse_rate_2nd_dose,
        patient_vitals.pre_vital_temp_rate_2nd_dose,
        patient_vitals.pre_oxygen_saturation_2nd_dose,
        patient_vitals.pre_vital_bpDiastolic_2nd_dose,
        patient_vitals.pre_vital_bpSystolic_2nd_dose,
        medical_background.allergy_to_vaccine,
        medical_background.hypertension,
        medical_background.heart_disease,
        medical_background.kidney_disease,
        medical_background.diabetes_mellitus,
        medical_background.bronchial_asthma,
        medical_background.immunodeficiency,
        medical_background.cancer,
        medical_background.other_commorbidity,
    CONCAT(
        patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    ) AS full_address,
        priority_groups.priority_group
    FROM
        patient
    JOIN
        medical_background
    ON  
        medical_background.patient_id = $patientID
    JOIN
        patient_vitals
    ON
        patient_vitals.patient_id = $patientID
    JOIN 
        patient_details 
    ON 
        patient_details.patient_id = $patientID
    JOIN
        barangay
    ON 
        barangay.barangay_id = patient_details.barangay_id
    JOIN
        priority_groups
    ON
        priority_groups.priority_group_id = patient_details.priority_group_id
    WHERE 
    	patient.patient_id = $patientID
    ";

    $stmtinsert = $database->prepare($queryDetails);
    $stmtinsert->execute();
    $patientDetails = $stmtinsert->fetch(PDO::FETCH_ASSOC);

    //Personal Information
    $fullName = $patientDetails['patient_full_name'];
    $fullAddress = $patientDetails['full_address'];
    $category = $patientDetails['priority_group'];

    //Medical Information
    $allergyToVaccine = checkAllergy($patientDetails['allergy_to_vaccine']);
    $hypertension = checkbox($patientDetails['hypertension'], "Hypertension");
    $heartDisease = checkbox($patientDetails['heart_disease'], "Heart Disease");
    $kidneyDisease = checkbox($patientDetails['kidney_disease'], "Kidney Disease");
    $diabetesMellitus = checkbox($patientDetails['diabetes_mellitus'], "Diabetes Mellitus");
    $bronchialAsthma = checkbox($patientDetails['bronchial_asthma'], "Bronchial Asthma");
    $immunodeficiency = checkbox($patientDetails['immunodeficiency'], "immunodeficiency");
    $cancer = checkbox($patientDetails['cancer'], "cancer");
    $otherCommorbidity = otherCommorbidity($patientDetails['other_commorbidity']);

    //Pre vital information
    $pulseRate1st = trim($patientDetails['pre_vital_pulse_rate_1st_dose']) != "" ? $patientDetails['pre_vital_pulse_rate_1st_dose'] : 'N/A';
    $tempRate1st = trim($patientDetails['pre_vital_temp_rate_1st_dose']) != "" ? $patientDetails['pre_vital_temp_rate_1st_dose'] : 'N/A';
    $oxygen1st = trim($patientDetails['pre_oxygen_saturation_1st_dose']) != "" ? $patientDetails['pre_oxygen_saturation_1st_dose'] : 'N/A';
    $bloodPressure1st = trim($patientDetails['pre_vital_bpDiastolic_1st_dose']) != "" ? $patientDetails['pre_vital_bpDiastolic_1st_dose']."/".$patientDetails['pre_vital_bpSystolic_1st_dose'] : 'N/A';
    
    $pulseRate2nd = trim($patientDetails['pre_vital_pulse_rate_2nd_dose']) != "" ? $patientDetails['pre_vital_pulse_rate_2nd_dose'] : 'N/A';
    $tempRate2nd = trim($patientDetails['pre_vital_temp_rate_2nd_dose']) != "" ? $patientDetails['pre_vital_temp_rate_2nd_dose'] : 'N/A';
    $oxygen2nd = trim($patientDetails['pre_oxygen_saturation_2nd_dose']) != "" ? $patientDetails['pre_oxygen_saturation_2nd_dose'] : 'N/A';
    $bloodPressure2nd = trim($patientDetails['pre_vital_bpDiastolic_2nd_dose']) != "" ? $patientDetails['pre_vital_bpDiastolic_2nd_dose']."/".$patientDetails['pre_vital_bpSystolic_2nd_dose'] : 'N/A';

    $sortPatientVaccine = sortPatientVaccineDetails($patientID);
        
    //Vaccination Information
    $sched1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['vaccDate']: 'N/A';
    $site1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['location'] : 'N/A';
    $vaccineN1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['vaccName'] : 'N/A';
    $vaccineM1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['vaccManufacturer'] : '' ;
    $lot1st = $sortPatientVaccine[0] != "" ? $sortPatientVaccine[0]['lotID'] : 'N/A';

    $sched2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['vaccDate']: 'N/A';
    $site2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['location'] : 'N/A';
    $vaccineN2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['vaccName'] : 'N/A';
    $vaccineM2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['vaccManufacturer'] : '' ;
    $lot2nd = $sortPatientVaccine[1] != "" ? $sortPatientVaccine[1]['lotID'] : 'N/A';



    echo "<h3 class='ml-3'>$fullName</h3>
    <hr>
    <div class='row'>
        <div class='col'>
            <div class='row ml-4'> <h5> Address: </h5> </div>
            <div class='row ml-5'> <h7> $fullAddress </h7> </div>
            <br>
            <div class='row ml-4'> <h5> Category:</h5> </div>
            <div class='row ml-5'> <h7> $category</h7> </div>
            <br>
        </div>
    ";

    $vaccineStatus = 'Not vaccinated';
    if($patientDetails['first_dose_vaccination'] == 1 && $patientDetails['second_dose_vaccination'] == 1) {
        $vaccineStatus = 'Fully vaccinated';
        echo "
            <div class='col'>
                <h5>Medical Background</h5>
                <h6>Allergies:</h6><br>
                 <div class='ml-5'>$allergyToVaccine</div> 
                     <h6>Commorbidities:</h6><br>
                     <div class='row'>
                         <div class='col ml-5' style='columns: 2;'> 
                             $hypertension
                             $heartDisease
                             $kidneyDisease
                             $diabetesMellitus
                             $bronchialAsthma
                             $immunodeficiency
                             $cancer
                             $otherCommorbidity 
                         </div>
                     </div>
                 </div>
            </div>
        </div>
        <br>
        <h5 class='ml-4 mt-2'> Vaccination Details - &ensp; $vaccineStatus </h5> 
        <div class='row'>
            <div class='col'>
                <h5 class='ml-4' style='color: #68A0B8'>First Dose Vaccination</h5>
                <div class='row ml-5'>
                    <h7><b> Schedule:  &ensp;</b> </h7> <p style='margin-left: 14%;'> $sched1st </p> 
                </div>
                <div class='row ml-5'>
                     <h7><b> Vax Site:  &ensp;</b> </h7> <p style='margin-left: 15%;'> $site1st </p> 
                </div>
                <div class='row ml-5'>
                     <h7><b> Vaccine Brand:  &ensp;</b> </h7> <p style='margin-left: 7%'> $vaccineN1st ($vaccineM1st) </p> 
                </div>
                <div class='row ml-5'>
                      <h7><b> Vaccine Lot:  &ensp;</b> </h7> <p style='margin-left: 11%;'> $lot1st </p> 
                </div>
            </div>
            
            <div class='col'>
                <h5 class='ml-4' style='color: #68A0B8'>Second Dose Vaccination</h5>
                <div class='row ml-5'>
                    <h7><b> Schedule:  &ensp;</b> </h7> <p style='margin-left: 14%;'> $sched2nd </p> 
                </div>
                <div class='row ml-5'>
                     <h7><b> Vax Site:  &ensp;</b> </h7> <p style='margin-left: 15%;'> $site2nd </p> 
                </div>
                <div class='row ml-5'>
                     <h7><b> Vaccine Brand:  &ensp;</b> </h7> <p style='margin-left: 7%;'> $vaccineM2nd ($vaccineN2nd)</p> 
                </div>
                <div class='row ml-5'>
                      <h7><b> Vaccine Lot:  &ensp;</b> </h7> <p style='margin-left: 11%;'> $lot2nd</p> 
                </div>
            </div>
        </div>
        <div class='modal-footer'>
            <button onclick=closeModal('qrView') type='button' class='btn btn-danger'> Close </button>   
        </div>
        </form>
        ";
    } else if($patientDetails['first_dose_vaccination'] == 1 && $patientDetails['second_dose_vaccination'] == 0) {
        $vaccineStatus = 'Partially vaccinated';

        echo "
                <div class='col border rounded' style='padding:1%; margin-right:3%'>
                    <div class='row'> <h5 class='ml-3' style='color: #68A0B8'> Vaccination Details - $vaccineStatus </h5> </div>
                    <div class='row'>
                        <h6 class='ml-4'> <b> <u>Post-Vaccine Vitals</u></b></h6>
                    </div>
                    <div class='row'>
                        <h7 class='ml-5'><b> Pulse Rate:  &ensp;</b> </h7> <p style='margine-left:13%'> $pulseRate1st </p>
                    </div>
                    <div class='row'>
                        <h7  class='ml-5'><b> Temperature Rate:  &ensp;</b> </h7> <p style='margine-left:4%'> $tempRate1st </p> 
                    </div>
                    <div class='row'>
                         <h7  class='ml-5'><b>Oxygen saturation:  &ensp;</b> </h7> <p style='margine-left:2%'> $oxygen1st </p> 
                    </div>
                    <div class='row'>
                          <h7  class='ml-5'><b> Blood Presure Rate:  &ensp;</b> </h7> <p style='margine-left:1%'> $bloodPressure1st </p> 
                    </div>
                    <!--End of div for vaccination details-->
                </div>
                <!--End div for the address, name and others-->
            </div>
            <br>
            <div class='row'>
                <div class='col'>
                    <h5 class='ml-4'>Medical Background</h5>
                    <h6 class='ml-4'>Allergies:</h6><br>
                     <div class='ml-5'>$allergyToVaccine</div> 
                         <h6 class='ml-4'>Commorbidities:</h6><br>
                         <div class='row'>
                             <div class='col ml-5' style='columns: 2;'> 
                                 $hypertension
                                 $heartDisease
                                 $kidneyDisease
                                 $diabetesMellitus
                                 $bronchialAsthma
                                 $immunodeficiency
                                 $cancer
                                 $otherCommorbidity 
                             </div>
                         </div>
                 </div>
                
                <div class='col ml-3'>
                    <div class='row'><h5>Post-Vaccine Vitals:</h5></div>
                    <div class='row'>
                        <div class='col-4'>
                            <label for='pulseR'> <strong>Pulse Rate:</strong> </label>
                        </div>
                        <div class='col'>
                         <input class='textInp vitalsInput w-75' id='pulseR' placeholder='Enter pulse rate' name='pulseR'>
                        </div>   
                    </div>
                    <br>
                    <div class='row'>
                        <div class='col-4'>
                            <label for='tempR'> <strong>Temperature:</strong> </label>
                        </div>
                        <div class='col'>
                           <input class='textInp vitalsInput w-75 id='tempR' placeholder='Enter temperature' name='tempR'>
                        </div>   
                    </div>
                    <br>
                    <div class='row'>
                        <div class='col-4'>
                            <label for='oxygenSat'> <strong>Oxygen Saturation:</strong> </label>
                        </div>
                        <div class='col'>
                            <input class='textInp vitalsInput w-75' id='oxygenSat' placeholder='Enter oxygen saturation' name='vitoxygenSatals'>
                        </div>   
                    </div>
                    <br>
                    <strong>Blood Pressure (Diastolic/Systolic e.g. 120/80)</strong>
                    <br>
                    <div class='row'>
                        <div class='col-4'>
                            <label for='bpRDias'> <strong>Diastolic:</strong> </label>
                        </div>
                        <div class='col'>
                            <input class='textInp vitalsInput w-75' placeholder='millimetres of mercury' id='bpRDias' name='bpRDias'>
                        </div>   
                    </div>
                    <br>
                    <div class='row'>
                        <div class='col-4'>
                            <label for='bpRSys'> <strong>Systolic:</strong> </label>
                        </div>
                        <div class='col'>
                            <input class='textInp vitalsInput w-75' placeholder='millimetres of mercury' id='bpRSys' name='bpRSys'>
                        </div>   
                    </div>
                </div>
               
            </div>
            </div>
            <div class='modal-footer'>
                <button onclick=closeModal('preVacView') type='button' class='btn btn-danger'> Cancel</button>            
                <button onclick=btnViewPostVac() id='addButtonId' type='button' class='btn btn-success' value=$patientID> Save</button>
            </div>
            </form>
            ";

    } else {
        $vaccineStatus = 'Pending';
        echo "
                <div class='col border rounded' style='padding:1%; margin-right:3%'>
                    <div class='row'> <h5 class='ml-3' style='color: #68A0B8'> Vaccination Details - $vaccineStatus </h5> </div>
                    <div class='row'>
                        <h5 class='ml-4' style='color: #68A0B8'>Pre-Vaccine Vitals</h5>
                    </div>
                    <div class='row'>
                        <h7 class='ml-5'><b> Pulse Rate:  &ensp;</b> </h7> <p style='margine-left:13%'> $pulseRate1st </p>
                    </div>
                    <div class='row'>
                        <h7  class='ml-5'><b> Temperature Rate:  &ensp;</b> </h7> <p style='margine-left:4%'> $tempRate1st </p> 
                    </div>
                    <div class='row'>
                         <h7  class='ml-5'><b>Oxygen saturation:  &ensp;</b> </h7> <p style='margine-left:2%'> $oxygen1st </p> 
                    </div>
                    <div class='row'>
                          <h7  class='ml-5'><b> Blood Presure Rate:  &ensp;</b> </h7> <p style='margine-left:1%'> $bloodPressure1st </p> 
                    </div>
                    <!--End of div for vaccination details-->
                </div>
                <!--End div for the address, name and others-->
            </div>
            <br>
            <div class='row'>
                <div class='col'>
                    <h5 class='ml-4'>Medical Background</h5>
                    <h6 class='ml-4'>Allergies:</h6><br>
                     <div class='ml-5'>$allergyToVaccine</div> 
                         <h6 class='ml-4'>Commorbidities:</h6><br>
                         <div class='row'>
                             <div class='col ml-5' style='columns: 2;'>
            $hypertension
                                 $heartDisease
                                 $kidneyDisease
                                 $diabetesMellitus
                                 $bronchialAsthma
                                 $immunodeficiency
                                 $cancer
                                 $otherCommorbidity
                                 </div>
                         </div>
                 </div>
                
                <div class='col ml-3'>
                    <div class='row'><h5>Post-Vaccine Vitals:</h5></div>
                    <div class='row ml-3'>
                        <div class='col-6'>
                            <label for='pulseR'> <strong>Pulse Rate:</strong> </label>
                            <input class='textInp vitalsInput w-100 ml-3' id='pulseR' placeholder='Enter pulse rate' name='pulseR'>
                        
                        </div>
                    </div>
                    <div class='row ml-3'>
                        <div class='col-6'>
                            <label for='tempR'> <strong>Temperature:</strong> </label>
                            <input class='textInp vitalsInput w-100 ml-3' id='tempR' placeholder='Enter temperature' name='tempR'>
                        </div>
                    </div>
                    <div class='row ml-3'>
                        <div class='col-6'>
                            <label for='oxygenSat'> <strong>Oxygen Saturation:</strong> </label>
                            <input class='textInp vitalsInput w-100 ml-3' id='oxygenSat' placeholder='Enter oxygen saturation' name='vitoxygenSatals'>
                       
                        </div>
                    </div>
                    <div class='row ml-3 mt-3'> <strong>Blood Pressure </strong>  (Diastolic/Systolic e.g. 120/80)</div>
                      <div class='row ml-3'>
                        <div class='col-6'>
                            <label for='bpRDias'> <strong>Diastolic:</strong> </label>
                            <input class='textInp vitalsInput w-100 ml-3' placeholder='millimetres of mercury' id='bpRDias' name='bpRDias'>
                        
                        </div>
                    </div>
                    <div class='row ml-3'>
                        <div class='col-6'>
                            <label for='bpRSys'> <strong>Systolic:</strong> </label>
                            <input class='textInp vitalsInput w-100 ml-3' placeholder='millimetres of mercury' id='bpRSys' name='bpRSys'>
                        </div>
                    </div>
                </div>
               
            </div>
            </div>
            <div class='modal-footer'>
                <button onclick=closeModal('preVacView') type='button' class='btn btn-danger'> Cancel</button>            
                <button onclick=btnViewPostVac() id='addButtonId' type='button' class='btn btn-success' value=$patientID> Save</button>
            </div>
            </form>";
    }
}

if (isset($_POST['pulse'])) {
    require_once('../includes/configure.php');
    $pulseRR = $_POST['pulse'];
    $tempRR = $_POST['temp'];
    $oxygen = $_POST['oxygen'];
    $bpDiastolic = $_POST['diastolic'];
    $bpSystolic = $_POST['systolic'];
    $id = $_POST['id'];

    //Log purposes
    $logMessage = "Added the following post vitals: Pulse rate ($pulseRR), Temperature rate = $tempRR, Oxygen saturation ($oxygen), Blood Pressure ($bpDiastolic/$bpSystolic) for patient ID: $id";

    try {
        $querySelect = "SELECT * FROM patient WHERE patient_id = ?";
        $stmtselect = $database->prepare($querySelect);
        $stmtselect->execute([$id]);
        $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

        if ($row['first_dose_vaccination'] == 1 && $row['second_dose_vaccination'] == 1) {
            $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_2nd_dose = ?, post_vital_temp_rate_2nd_dose = ?, post_oxygen_saturation_2nd_dose = ?, post_vital_bpDiastolic_2nd_dose = ?, post_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $oxygen, $bpDiastolic, $bpSystolic, $id]);
        } else {
            $query = ("UPDATE patient_vitals SET post_vital_pulse_rate_1st_dose = ?, post_vital_temp_rate_1st_dose = ?, post_oxygen_saturation_1st_dose = ?, post_vital_bpDiastolic_1st_dose = ?, post_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $oxygen, $bpDiastolic, $bpSystolic, $id]);
        }
    } catch (Exception $th) {
        echo $th->getMessage();
    }
}

function sortPatientVaccineDetails($patientID) {
    require('../includes/database.php');
    $query = 
    "SELECT
    patient_drive.vaccine_lot_id,
    vaccination_drive.vaccination_date,
    vaccination_sites.location,
    vaccine.vaccine_name,
    vaccine_information.vaccine_manufacturer
from 
    patient_drive
JOIN
    vaccine_lot
ON
    vaccine_lot.vaccine_lot_id = patient_drive.vaccine_lot_id
JOIN
    vaccination_drive
ON
    vaccination_drive.drive_id = patient_drive.drive_id 
JOIN
    vaccination_sites
ON
    vaccination_sites.vaccination_site_id = vaccination_drive.vaccination_site_id
JOIN
    vaccine
ON
    vaccine.vaccine_id = vaccine_lot.vaccine_id
JOIN
    vaccine_information
ON
    vaccine_information.vaccine_id = vaccine_lot.vaccine_id
WHERE
    patient_drive.patient_id = $patientID
    ";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($vaccine_lot_id, $vaccination_date, $location, $vaccine_name, $vaccine_manufacturer);
    $vaccineDetails = [];

    $vaccineDetails[0] = "";
    $vaccineDetails[1] = "";
    while ($stmt->fetch()) {
        array_push($vaccineDetails, array('lotID' => $vaccine_lot_id, 'vaccDate' => $vaccination_date, 'location' => $location, 'vaccName' => $vaccine_name, 'vaccManufacturer' => $vaccine_manufacturer));
    }
    return $vaccineDetails;
}

function checkbox($commorbidity, $commorbidityName) {
    $ls = trim(strtolower($commorbidityName));
    if($commorbidity == 0) {
        return "
        <input type='checkbox' name='$ls' value='1' disabled>
        <label for='$ls'>$commorbidityName</label><br>
        ";
    } else {
        return "
        <input type='checkbox' name='$ls' value='1' checked disabled>
        <label for='$ls'>$commorbidityName</label><br>
        ";
    }
}

function checkAllergy($allergy) {
    if($allergy == 0) {
        return "
        <div class='row'>
        <div class='col-2'>
        <input type='checkbox' name='allergy' value='1' onclick='allergy(this)' disabled>
        <label for='yes'>Yes</label><br>
        </div>
        <div class='col-2'>
        <input type='checkbox' name='allergy' value='0' onclick='allergy(this)' checked disabled>
        <label for='no'>No</label><br>
        </div>
        </div>
        ";
    } else {
        return 
        "
        <div class='row'>
        <div class='col-2'>
        <input type='checkbox' name='allergy' value='1' onclick='allergy(this)' checked disabled>
        <label for='yes'>Yes</label><br>
        </div>
        <div class='col-2'>
        <input type='checkbox' name='allergy' value='0' onclick='allergy(this)' disabled>
        <label for='no'>No</label><br>
        </div>
        </div>
        ";
    }
}

function otherCommorbidity($commorbidity) {
        return "<label for='other'>Other Commorbidity: </label>
        <input type='text' name='other' value=$commorbidity disabled><br>";
}