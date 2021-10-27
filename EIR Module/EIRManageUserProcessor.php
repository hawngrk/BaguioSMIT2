<?php
include("../includes/database.php");
require_once("../require/getBarangay.php");

if (isset($_POST['barangayName'])) {
    $barangayName = $_POST['barangayName'];
    $query = "SELECT city, province, region FROM barangay WHERE barangay.barangay_id = '$barangayName'";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($city, $province, $region);
    $stmt->fetch();
    $stmt->close();

    echo "
          <div class='col'>
            <label class='label1' for='city'>City/Municipality</label>
            <input type='text3' id='city' class='input' value='$city' readonly>
          </div>
          <div class='col'>
            <label class='label1' for='province'>Province</label>
            <input type='text3' id='province' class='input' value='$province' readonly>
          </div>
          <div class='col'>
            <label class='label1' for='region'>Region</label>
            <input type='text3' id='region' class='input' value='$region' readonly>
          </div>
  
";
}


include("../includes/database.php");

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($search == "") {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id;";
    } else {
        $querySearch = "SELECT patient.patient_id, patient.patient_full_name, patient_details.patient_priority_group, CONCAT(patient_details.patient_house_address, ' ', patient_details.patient_barangay_address, ' ', patient_details.patient_CM_address, ' ', patient_details.patient_province) AS full_address, patient_contact_number FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id WHERE patient.patient_id LIKE '$search%' OR patient.patient_full_name LIKE '$search%';";
    }
    echo "
    <thead>
            <tr>
                <th scope='col'>Patient Id No.</th>
                <th scope='col'>Patient Name</th>
                <th scope='col'>Category</th>
                <th scope='col'>Complete Address</th>
                <th scope='col'>Contact Number</th>
                <th scope='col'>Action</th>
            </tr>
            </thead>";

    $stmt = $database->stmt_init();
    $stmt->prepare($querySearch);
    $stmt->execute();
    $stmt->bind_result($patientId, $patientName, $category, $patientAddress, $contactNum);
    while ($stmt->fetch()) {
        echo "<tr onclick='showPatient(this)'>
                <td>$patientId</td>
                <td>$patientName</td>
                <td>$category</td>
                <td>$patientAddress</td>
                <td>$contactNum</td>
                <td>
                <div style='text-align: left;'>
                                <button class='buttonTransparent' onclick='event.stopPropagation();archive(1, clickArchive, $patientId)'><i class='fa fa-archive'></i></button>
                                <button type='button' class='viewReportBtn buttonTransparent' id='viewButton' onclick='viewPatient($patientId)'><i class='fas fa-eye'></i></button
                            </div>
</td>
                </tr>";
    }
}

if (isset($_POST['patient'])) {

    $patientId = $_POST['patient'];
    $query = "SELECT * FROM patient_details JOIN patient ON patient_details.patient_id = patient.patient_id WHERE patient_details.patient_id = '$patientId'";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patient_id, $patient_first_name, $patient_last_name, $patient_middle_name, $patient_suffix, $patient_priority_group, $patient_category_id, $patient_category_number, $patient_philHealth, $patient_pwd, $patient_house_address, $patient_barangay_address, $patient_CM_address, $patient_province, $patient_region, $patient_birthdate, $patient_age, $patient_gender, $patient_contact_number, $patient_occupation, $archived, $patient_id, $patient_full_name, $date_of_first_dosage, $date_of_second_dosage, $first_dose_vaccination, $second_dose_vaccination, $for_queue, $notification, $first_dose_vaccinator, $second_dose_vaccinator, $token);
    $stmt->fetch();
    $stmt->close();
    echo "
     
                <div class='modal-header'>
                    <h4 class='modal-title'> Vaccine Details - $patient_full_name </h4>
                    <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"viewPatientDetails\")'>
                        <i class='fas fa-window-close'></i>
                    </button>
                </div>
                <div class='modal-body'>
                <div class='patientInfo'>
                <h5 class='ml-3'> Personal Information </h5>
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Complete Name </h7>
                </div>
                <div class='col'>
                <h7> $patient_full_name </h7>
                </div>
                </div>
 
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Gender </h7>
                </div>
                <div class='col'>
                <h7> $patient_gender </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Birthdate </h7>
                </div>
                <div class='col'>
                <h7> $patient_birthdate </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Occupation </h7>
                </div>
                <div class='col'>
                <h7> $patient_occupation </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Contact Number </h7>
                </div>
                <div class='col'>
                <h7> $patient_contact_number </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Email Address </h7>
                </div>
                <div class='col'>
                <h7> </h7>
                </div>
                </div>
                <br>
                <h5 class='ml-3'> Category Information </h5>
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Priority Group </h7>
                </div>
                <div class='col'>
                <h7> $patient_priority_group </h7>
                </div>
                </div>
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Category ID </h7>
                </div>
                <div class='col'>
                <h7> $patient_category_id </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Category ID No. </h7>
                </div>
                <div class='col'>
                <h7> $patient_category_number </h7>
                </div>
                </div>
                
                ";

    if ($patient_philHealth == "") {
        echo "";
    } else {
        echo "<div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> PhilHealth ID No. </h7>
                </div>
                <div class='col'>
                <h7> $patient_philHealth </h7>
                </div>
                </div>";
    }

    if ($patient_pwd == "") {
        echo "";
    } else {
        echo "<div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> PWD ID No. </h7>
                </div>
                <div class='col'>
                <h7>  </h7>
                </div>
                </div>";
    }

    echo "      <br>
                <h5 class='ml-3'> Address Information </h5>
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> House Address</h7>
                </div>
                <div class='col'>
                <h7> $patient_house_address </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> Barangay </h7>
                </div>
                <div class='col'>
                <h7> $patient_barangay_address </h7>
                </div>
                </div>
                
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> City and Region </h7>
                </div> 
                <div class='col'>
                <h7> $patient_CM_address, $patient_region </h7>
                </div>
                </div>
                <br>
                <h5 class='ml-3'> Vaccine Information </h5>
                    ";


    echo "<div class='row'>
                <h6 class='font-weight-bold ml-5'> First Dose </h6>
                </div>
                <div class='row'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> First Dose Date </h7>
                </div>
                ";

    if ($first_dose_vaccination == 1) {
        echo "  <div class='col'>
                <h7> $date_of_first_dosage </h7>
                </div>
            </div>
            </div>
            <div class='row'>
            <div class='col'>
            <h7 class='font-weight-bold ml-5'> Vaccinator </h7>
            </div>
            <div class='col'>
            <h7> $first_dose_vaccinator </h7>
            </div>
            </div>
            <div class='row'>
            <div class='col'>
            <h7 class='font-weight-bold ml-5'> Vaccine Type </h7>
            </div>
            <div class='col'>
            <h7>  </h7>
            </div>
            </div>
            
            <br>
            <div class='row'>
            <h6 class='font-weight-bold ml-5'> Second Dose </h7>
            </div>
            
            <div class='row'>
            <div class='col'>
            <h7 class='font-weight-bold ml-5'> Second Dose Date </h7>
            </div>
            <div class='col'>
            <h7> $date_of_second_dosage </h7>
            </div>
            </div>
            
            <div class='row'>
            <div class='col'>
            <h7 class='font-weight-bold ml-5'> Vaccinator </h7>
            </div>
            <div class='col'>
            <h7> $second_dose_vaccinator </h7>
            </div>
            </div>
            
            <div class='row'>
            <div class='col'>
            <h7 class='font-weight-bold ml-5'> Vaccine Type </h7>
            </div>
            <div class='col'>
            <h7>  </h7>
            </div>
            </div>
             ";
    } else {
        echo "<div class='col'>
          <h7> Not Vaccinated  </h7> 
          </div>
          </div>";
    }
};

?>
