<?php
include("../includes/database.php");


if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($search == "") {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name,  patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
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
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientID, $patientName, $category, $patientAddress, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr class='tableCenterCont'>
                <td>$patientID</td>
                <td>$patientName</td>
                <td>$category</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                <td><button id='postVac' class='viewReportBtn btn-success' type='submit' onclick='clickModalRow($patientID)'>Add Vitals</button></td></td>
                </tr>";
    }
}

//filter
if (isset($_POST['filter'])) {
    echo "passed";
}

if (isset($_POST['modalScreening'])) {
    $modalRes = $_POST['modalScreening'];
    require('../includes/configure.php');
    
    $queryDetails = 
    "SELECT 
        patient_details.patient_first_name,
        patient_details.patient_last_name,
    CONCAT(
        patient_details.patient_house_address, ' ', barangay.barangay_name, ' ', barangay.city, ' ', barangay.province 
    ) AS full_address,
        priority_groups.priority_group
    FROM
        patient
    JOIN 
        patient_details 
    ON 
        patient_details.patient_id = $modalRes
    JOIN
        barangay
    ON 
        barangay.barangay_id = patient_details.barangay_id
    JOIN
        priority_groups
    ON
        priority_groups.priority_group_id = patient_details.priority_group_id
    WHERE 
    	patient.patient_id = $modalRes
    ";        
    $stmtinsert = $database->prepare($queryDetails);
    $stmtinsert->execute();
    $patientDetails = $stmtinsert->fetch(PDO::FETCH_ASSOC);

    $id = $modalRes;
    $fullName = $patientDetails['patient_last_name'].', '.$patientDetails['patient_first_name'];
    $fullAddress = $patientDetails['full_address'];
    $category = $patientDetails['priority_group'];

    echo "<h3>$fullName</h3>
    <hr>
    <div class='row'>
    <div class='col'>
        <h4>Address: </h4> <p>$fullAddress<p>
        <hr>
        <h4>Category:</h4><p>$category</p>
        <hr>
        <h4>Medical Background</h4>
        <h6>Allergies:</h6>
        <p>*Allergies Here*</p>
        <h6>Commorbidities::</h6>
        <p>*Commorbidities Here*</p>
        <hr>
        <h4>Vaccination Details</h4>
        <h6>Schedule:</h6>
        <p>*Sample Sched*</p>
        <h6>Vax Site:</h6>
        <p>*Sample VaxSite*</p>
        <h6>Vaccine:</h6>
        <p>*Sample Vax*</p>
        <h6>Lot No.:</h6>
        <p>*Sample Lot No*</p>
        
    </div>
    <div class='col-md-6'>
    <h4>Pre-Vaccine Vitals:</h4>
    <form>
    <strong>Pulse Rate:</strong>
    <br><input class='textInp'type='text' placeholder='Beats Per Minute' name='vitals'>
    <br>
    <strong>Temperature:</strong> <br> <input class='textInp' type='text' placeholder='in Celcius' name='vitals'>
    <br>
    <br>
    <strong>Blood Pressure</strong>
    <br>
    Diastolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    <br>
    Systolic: <br><input class='textInp' type='text' placeholder='millimetres of mercury' name='vitals'>
    </form>
    </div>
    </div>
    <div class='modal-footer'>
    <button onclick=closeModal('preVacView') type='button' class='btn btn-danger'> Cancel</button>            
    <button onclick=btnViewPostVac('add') id='addButtonId' type='button' class='btn btn-success' value=$id> Add</button>
    </div>
    </div>
    ";
}
    


if (isset($_POST['pulse'])) {
    require_once('../includes/configure.php');
    $pulseRR = $_POST['pulse'];
    $tempRR = $_POST['temp'];
    $bpDiastolic = $_POST['diastolic'];
    $bpSystolic = $_POST['systolic'];
    $id = $_POST['id'];

    try {
        $querySelect = "SELECT * FROM patient WHERE patient_id = ?";
        $stmtselect = $database->prepare($querySelect);
        $stmtselect->execute([$id]);
        $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

        if ($row['first_dose_vaccination'] == 1 && $row['second_dose_vaccination'] == 0) {
            $query = ("UPDATE patient_vitals SET pre_vital_pulse_rate_2nd_dose = ?, pre_vital_temp_rate_2nd_dose = ?, pre_vital_bpDiastolic_2nd_dose = ?, pre_vital_bpSystolic_2nd_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
        } else {
            $query = ("UPDATE patient_vitals SET pre_vital_pulse_rate_1st_dose = ?, pre_vital_temp_rate_1st_dose = ?, pre_vital_bpDiastolic_1st_dose = ?, pre_vital_bpSystolic_1st_dose = ? WHERE patient_vitals.patient_id = ?");
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$pulseRR, $tempRR, $bpDiastolic, $bpSystolic, $id]);
        }
    } catch (Exception $th) {
        echo $th->getMessage();
    }
    echo 'added';
}

if (isset($_POST['patientId'])) {

    $patId = $_POST['patientId'];

    $query = "SELECT patient.patient_full_name, patient_details.patient_gender, patient_details.patient_contact_number, patient_details.patient_age, patient_details.patient_house_address,
       patient_details.barangay_id,barangay.barangay_name, barangay.city, barangay.region, priority_groups.priority_group, patient.date_of_first_dosage, patient.date_of_second_dosage, 
       patient.first_dose_vaccination, patient.second_dose_vaccination, patient.first_dose_vaccinator, patient.second_dose_vaccinator,medical_background.patient_id, medical_background.allergy_to_vaccine, medical_background.hypertension, 
       medical_background.heart_disease, medical_background.kidney_disease, medical_background.diabetes_mellitus, medical_background.bronchial_asthma, medical_background.immunodeficiency, 
       medical_background.cancer, medical_background.other_commorbidity FROM patient_details JOIN patient ON patient_details.patient_id = patient.patient_id JOIN priority_groups
           ON patient_details.priority_group_id = priority_groups.priority_group_id JOIN barangay ON barangay.barangay_id = patient_details.barangay_id JOIN medical_background 
               ON medical_background.patient_id = patient_details.patient_id WHERE patient_details.patient_id = '$patId';";
    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name, $gender, $contact, $age, $houseAddress, $barangayId, $barangayName, $city, $region,$group, $fDate, $sDate, $first, $second,$firstVacVaccinator, $secondVacVaccinator, $idPatient, $allergy, $hypertension, $heartDisease, $kidneyDisease, $diabetesMellitus, $asthma, $immunodeficiency, $cancer, $otherCommorbidity);
    $stmt->fetch();
    $stmt->close();


    echo "    
                <h3 class='ml-3'>PERSONAL INFORMATION</h3>
                <hr>
                <div class='perInfo'>
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Full Name: </h5>
                        </div>
                        <div class='col'>
                            <h5> $name </h5>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Gender: </h5>
                        </div>
                        <div class='col'>
                            <h5> $gender </h5>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Age: </h5>
                        </div>
                        <div class='col'>
                            <h5> $age </h5>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Contact Number: </h5>
                        </div>
                        <div class='col'>
                            <h5> $contact </h5>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Complete Address: </h5>
                        </div>
                        <div class='col'>
                            <h5> $houseAddress $barangayName <br> $city, $region </h5>
                        </div>
                    </div>
                </div>    
               ";

    echo "     <br>
               <h3 class='ml-3'>MEDICAL INFORMATION</h3>
               <hr>
               <div>
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Allergic to Vaccine: </h5>
                        </div>
                       
                        <div class='col'>
        ";
    if($allergy == 0){
        echo" <h5> NO </h5>";
    } else{
        echo "<h5> YES </h5>";
    }

    echo "
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col ml-5'>
                            <h5> Comorbidity: </h5>
                        </div>
                        <div class='col'>
                        
                        </div>
                        ";


    echo"
                    </div>     
               </div>
               <br>
               <h3 class='ml-3'>VACCINATION INFORMATION</h3>
               <hr>
               <div>
                   <div class='row ml-4'>    
                      <h5> <b> FIRST DOSE VACCINATION </b> </h5>
                   </div>
                   <div class='row'>
                        <div class='col ml-5'>
                            <h5> First Dose Date: </h5>
                        </div>
                        <div class='col'>
                        ";
    if($first == 0){
        echo "<h5> (Pending) </h5>
                </div>
                </div>
                <br>
               <h3 class='ml-3'>ADD PRE-VITAL SIGNS</h3>
               <hr>
               <div class='row'>
                    <div class='col ml-5'>  
                        <h5> Temperature: </h5>
                        <h5> Temperature: </h5>
                        <h5> Temperature: </h5>
                        <h5> Temperature: </h5>
                    </div>
                    <div class='col'>
                        <input type='text3' value='' placeholder='Enter temperature'>
                        <input type='text3' value='' placeholder='Enter temperature'>
                        <input type='text3' value='' placeholder='Enter temperature'>
                        <input type='text3' value='' placeholder='Enter temperature'>
                    </div>
               </div>
               </div>
               <div class='modal-footer'>
                    <button id='postVac' class='btn btn-success float-right' type='submit'> Save </button>
               </div>
            ";
    } else {
        echo "
                            <h5> $fDate </h5>
                        </div>
                   </div>
                   <div class='row'>
                       <div class='col ml-5'>
                            <h5> Vaccinator: </h5>
                       </div>
                       <div class='col'>
                             <h5> $firstVacVaccinator </h5>
                       </div>
                   </div>
                   <div>
                   <div class='row ml-4'>
                      <h5> <b> SECOND DOSE VACCINATION </b> </h5>
                   </div>
                   <div class='row'>
                      <div class='col ml-5'>
                        <h5> Second Dose Date: </h5>
                      </div>
                      <div class='col'>
                      ";
        if ($second == 1) {
            echo "
                        <h5> $sDate</h5>
                      </div>
                   </div>  
                   <div class='row'>
                       <div class='col ml-5'>
                             <h5> Vaccinator: </h5>
                       </div>
                       <div class='col'>
                            <h5> $secondVacVaccinator</h5>
                       </div>
                   </div>
                   </div>
                   </div>
                    <div class='modal-footer'>
                        <button id='postVac' class='btn btn-success float-right' type='button' onclick='closeModal(\"qrView\")'>Close</button>
                    </div>
                  ";
        } else {
            echo"<h5> Pending </h5>
                      </div>
                   </div> 
                   <div>
                    <br>
               <h3 class='ml-3'>ADD PRE-VITAL SIGNS</h3>
               <hr>
                    <div class='row'>
                        <div class='col ml-5'>  
                            <h5> Temperature: </h5>
                            <h5> Temperature: </h5>
                            <h5> Temperature: </h5>
                            <h5> Temperature: </h5>
                        </div>
                        <div class='col'>
                            <input type='text3' value='' placeholder='Enter temperature'>
                            <input type='text3' value='' placeholder='Enter temperature'>
                            <input type='text3' value='' placeholder='Enter temperature'>
                            <input type='text3' value='' placeholder='Enter temperature'>
                        </div>
                    </div>
                    </div>
                    <div class='modal-footer'>
                        <button id='postVac' class='btn btn-success float-right' type='submit'>Save</button>
                    </div>
                    ";

        }
    }

//    if ($second == 0) {
//        echo "
//            ";
//    } else {
//        echo "  <h5> $sDate </h5>
//                        </div>
//                   </div>
//                   <div class='row'>
//                       <div class='col ml-5'>
//                            <h5> Vaccinator: </h5>
//                       </div>
//                       <div class='col'>
//                             <h5> $secondVacVaccinator </h5>
//                       </div>
//                   </div>
//                  </div>
//                  ";
//
//    }

//    if ($sDate == 0 ){
//        echo " <h5> $sDate (Pending) </h5>
// </div>";
//    } else {
//        echo "<h5> $sDate </h5>
//                    </div>
//               </div>
//               <div class='row'>
//                   <div class='col ml-5'>
//                      <h5> Vaccinator: </h5>
//                   </div>
//                   <div class='col'>
//                      <h5> $secondVacVaccinator </h5>
//                   </div>
//               </div>
//                 ";
//    }


//    if ($first == 0){
//        echo "Pending </h5><br>";
//    } else {
//        echo "Vaccinated </h5></br>";
//    }
//
//    echo"<h5>Vaccination Date: $fDate</h5><br><br> ";
//    if ($second == 0){
//        echo "<h5>Second Dose: Pending </h5><br>";
//    } else {
//        echo "Second Dose: Vaccinated </h5></br>
//                <h5>Vaccination Date: $sDate</h5><br>
//           </div>
//           <div class='modal-footer'>
//           <button id='postVac' class='btn btn-success p-40' type='submit' style='width: 20%; float: right'>Add Pre Vitals</button>
//    </div>";
//    }

//    echo"<h5>Vaccination Date: $sDate</h5><br>
//           </div>
//           <div class='modal-footer'>
//           <button id='postVac' class='btn btn-success p-40' type='submit' style='width: 20%; float: right'>Add Pre Vitals</button>
//    </div>";

}

if (isset($_POST['passport'])){
    require_once ('../require/getPatientDetails.php');
    require_once ('../require/getPatient.php');

    $passport = $_POST['passport'];

    foreach ($patient_details as $patient){
        if($patient->getPatientDeetPatId() == $passport){
            $group = $patient->getPriorityGroup();
            $age = $patient->getAge();
            $gender = $patient->getGender();
            $contact = $patient->getContact();
        }
    }

    foreach ($patients as $pat){
        if ($pat->getPatientId() == $passport){
            $name = $pat->getPatientFullName();
            $fDate = $pat->getFirstDosageDate();
            $sDate = $pat->getSecondDosageDate();
            $first = $pat->getFirstDosage();
            $second = $pat->getSecondDosage();
        }
    }

    echo "      
                <img style='width:150px;' src='../img/SMIT+.png' alt='Baguio Logo'>
               
                <hr>
                <h2>PATIENT PROFILE</h2>
                <hr><br>
                <h5>Full Name: $name</h5><br>
                <h5>Gender: $gender</h5><br>
                <h5>Age: $age</h5><br>
                <h5>Contact Number: $contact</h5><br>
                
                <hr>
                <h2>VACCINATION SUMMARY</h2>
                <hr><br>
                
                <h5>Priority Group: $group</h5><br>
              
                 
                <h5>First Dose: ";

    if ($first == 0){
        echo "Not Vaccinated </h5><br>";
    } else {
        echo "Vaccinated </h5></br>";
    }

    echo"<h5>First Dose Vaccination Date: $fDate</h5><br><br>
                     <h5>Second Dose: ";
    if ($second == 0){
        echo "Not Vaccinated </h5><br>";
    } else {
        echo "Vaccinated </h5></br>";
    }

    echo"<h5>Second Dose Vaccination Date: $sDate</h5><br>
                     <button id='postVac' class='btn-success' type='submit' style='width: 20%; float: right'>Add Pre Vitals</button>";

}
