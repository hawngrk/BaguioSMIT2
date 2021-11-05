<?php
include ('../includes/database.php');

//View Patient
if (isset($_POST['viewPatient'])) {
    $patientId = $_POST['viewPatient'];
    $query = "SELECT * FROM patient_details JOIN patient ON patient_details.patient_id = patient.patient_id WHERE patient_details.patient_id = '$patientId'";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patient_id, $patient_first_name, $patient_last_name, $patient_middle_name, $patient_suffix, $patient_priority_group, $patient_category_id, $patient_category_number, $patient_philHealth, $patient_pwd, $patient_house_address, $patient_barangay_address, $patient_CM_address, $patient_province, $patient_region, $patient_birthdate, $patient_age, $patient_gender, $patient_contact_number, $patient_occupation, $archived, $patient_id, $patient_full_name, $date_of_first_dosage, $date_of_second_dosage, $first_dose_vaccination, $second_dose_vaccination, $for_queue, $notification, $first_dose_vaccinator, $second_dose_vaccinator, $token);
    $stmt->fetch();
    $stmt->close();
    echo "
     
                <div class='modal-header'>
                    <h4 class='modal-title'> Patient Details - $patient_last_name, $patient_first_name $patient_middle_name $patient_suffix </h4>
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
                <h7> $patient_first_name $patient_middle_name $patient_last_name $patient_suffix </h7>
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
}

//View Vaccine
if (isset($_POST['viewVaccine'])) {
    $vacccineId = $_POST['viewVaccine'];
    $query = "SELECT * FROM `vaccine_lot` JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN vaccine_information ON vaccine_information.vaccine_id = vaccine.vaccine_id WHERE vaccine_lot.vaccine_lot_id = $vacccineId";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($vaccine_lot_id, $vaccine_id, $employee_account_id, $date_stored, $source, $total_vaccine_vial_quantity, $vaccine_expiration, $archive, $vaccine_id, $vaccine_name, $vaccine_type, $vaccine_efficacy, $vaccine_lifespan_in_months, $vaccine_id, $vaccine_manufacturer, $vaccine_description, $vaccine_dosage_required, $vaccine_dosage_interval, $vaccine_minimum_temperature, $vaccine_maximum_temperature);
    $stmt->fetch();
    $stmt->close();

    echo "
    <div class='content-modal'>
    <div class='modal-header'>
        <h4 class='modal-title'> Vaccine Details </h4>
        <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"viewVaccineDetails\")'>
            <i class='fas fa-window-close'></i>
        </button>
    </div>";

    echo "
    <div class='modal-body'>
    <div class='vacinneInfo'>
    <div class='row'>
    <div class='col-10'>
    <h3 class='ml-4'> $vaccine_name </h3>
    </div>
    <div class='col'>
    <button type='button' class='btn btn-info ml-4'> <i class='far fa-edit'></i>  Edit</button> 
    </div>
    </div>
    <div class='row'>
    <div class='col b'>
    <h7 class='ml-5 font-weight-bold'> Manufacturer </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_manufacturer style='border: 0;' readonly> 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Vaccine Type </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_type style='border: 0;' readonly> 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Efficacy </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_efficacy% style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Date Stored </h7>
    </div>
    <div class='col'>
    <input type='text' value=$date_stored style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Expiration Date </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_expiration style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Life Span (in months) </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_lifespan_in_months style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Interval (in months) </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_dosage_interval style='border: 0;' readonly>
    </div>
    </div>
    
    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Required </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_dosage_required style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Total Quantity Vial </h7>
    </div>
    <div class='col'>
    <input type='text' value=$total_vaccine_vial_quantity style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Minimum Temperature (°C) </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_minimum_temperature style='border: 0;' readonly>
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Maximum Temperature (°C) </h7>
    </div>
    <div class='col'>
    <input type='text' value=$vaccine_maximum_temperature style='border: 0;' readonly>
    </div>
    </div>
    
    <br>
    
    <div class='row'>
    <div class='text-justify border border-secondary rounded mx-5 p-2 mb-3' style='overflow: auto;'>
    <h7> $vaccine_description </h7>
    </div>
    </div>
    ";
}

?>