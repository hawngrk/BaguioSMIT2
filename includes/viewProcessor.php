<?php
include ('../includes/database.php');

//View Patient
if (isset($_POST['viewPatient'])) {
    $patientId = $_POST['viewPatient'];

    $query = "SELECT
        patient.patient_id,
        patient.patient_full_name,
        patient.date_of_first_dosage,
        patient.date_of_second_dosage,
        patient.first_dose_vaccination,
        patient.second_dose_vaccination,
        patient.for_queue,
        patient.notification,
        patient.first_dose_vaccinator,
        patient.second_dose_vaccinator,
        patient.token,
        patient_details.patient_category_id,
        patient_details.patient_category_number,
        patient_details.patient_philhealth,
        patient_details.patient_pwd,
        patient_details.patient_house_address,
        patient_details.patient_birthdate,
        patient_details.patient_age,
        patient_details.patient_gender,
        patient_details.patient_contact_number,
        patient_details.patient_occupation,
        patient_details.archived,
        patient_account.patient_email,
        priority_groups.priority_group,
        barangay.barangay_name, 
        barangay.city, 
        barangay.province, 
        barangay.region
    FROM 
        patient
    JOIN 
        patient_details 
    ON 
        patient_details.patient_id = $patientId
    JOIN
        barangay
    ON 
        barangay.barangay_id = patient_details.barangay_id
    JOIN
        priority_groups
    ON
        priority_groups.priority_group_id = patient_details.priority_group_id
    JOIN
        patient_account
    ON
        patient_account.patient_id = $patientId
    Where
        patient.patient_id = $patientId;
    ";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();

    $stmt->bind_result($patient_id, $patient_full_name, $date_of_first_dosage, $date_of_second_dosage, $first_dose_vaccination, $second_dose_vaccination, $for_queue, $notification, $first_dose_vaccinator, $second_dose_vaccinator, $token, $patient_category_id, $patient_category_number, $patient_philHealth, $patient_pwd, $patient_house_address, $patient_birthdate, $patient_age, $patient_gender, $patient_contact_number, $patient_occupation, $archived, $patient_email, $patient_priority_group, $patient_barangay_address, $patient_CM_address, $patient_province, $patient_region);


    $stmt->fetch();
    $stmt->close();
    echo "
     
                <div class='modal-header'>
                    <h4 class='modal-title'> Patient Details </h4>
                    <button type='button' class='close' data-dismiss='modal' onclick='closeModal(\"viewPatientDetails\")'>
                        <i class='fas fa-window-close'></i>
                    </button>
                </div>
                <div class='modal-body'>
                <div class='patientInfo'>
                <div col-10>
                <h3 class='ml-4'> $patient_full_name </h3>
                </div>
                <div class='border border-dark rounded px-3 py-2 m-1'>
                <div class='col'>
                    <h4 class='ml-2'> Personal Information </h4>
                </div>
                <div class='row ml-5'>
                <div class='col'>
                <h7 class='font-weight-bold'> Complete Name: </h7><br>
                <h7> $patient_full_name </h7>
                </div> 
                <div class='col'>
                <h7 class='font-weight-bold'> Gender: </h7><br>
                <h7> $patient_gender </h7>
                </div>
                <div class='col'>
                <h7 class='font-weight-bold'> Birthdate </h7><br>
                <h7> $patient_birthdate </h7>
                </div>
               
                </div>
                <div class='row ml-5 mt-2'>
                <div class='col'>
                <h7 class='font-weight-bold'> Occupation </h7><br>
                <h7> $patient_occupation </h7>
                </div>
                <div class='col'>
                <h7 class='font-weight-bold'> Contact Number </h7><br>
                <h7 class='ml-2'> $patient_contact_number </h7>
                </div>
                <div class='col'>
                <h7 class='font-weight-bold'> Email Address </h7><br>
                <h7> $patient_email </h7>
                </div>
                </div>
 
                <br>
                <div class='col'>
                <h4 class='ml-2'> Category Information </h4>
                </div>
                <div class='row ml-5'>
                <div class='col'>
                <h7 class='font-weight-bold'> Priority Group: </h7><br>
                <h7> $patient_priority_group </h7>
                </div>
                <div class='col'>
                <h7 class='font-weight-bold'> Category ID: </h7><br>
                <h7> $patient_category_id </h7>
                </div>
                <div class='col'>
                <h7 class='font-weight-bold'> Category ID No.: </h7><br>
                <h7> $patient_category_number </h7>
                </div>
                </div>
                <div class='row ml-5  mt-2'>
                
                
                ";

    if ($patient_philHealth == "") {
        echo "<div class='col-4'>
                <h7 class='font-weight-bold'> PhilHealth ID No.: </h7><br>
                <h7> None </h7>
                </div>";
    } else {
        echo "
                <div class='col-4'>
                <h7 class='font-weight-bold'> PhilHealth ID No.: </h7><br>
                <h7> $patient_philHealth </h7>
                </div>";
    }

    if ($patient_pwd == "") {
        echo "
                <div class='col-4'>
                <h7 class='font-weight-bold'> PWD ID No.: </h7><br>
                <h7> None </h7>
                </div>
                </div>";
    } else {
        echo "
                <div class='col-4'>
                <h7 class='font-weight-bold'> PWD ID No.: </h7><br>
                <h7> $patient_pwd </h7>
                </div>
                </div>";
    }

    echo "      <br>
                <div class='col'>
                <h4 class='ml-2'> Address Information </h4>
                </div>
         
                <div class='row ml-5'>
                <div class='col'>
                <h7 class='font-weight-bold'> House Address</h7><br>
                <h7> $patient_house_address </h7>
                </div>
                <div class='col'>
                <h7 class='font-weight-bold'> Barangay </h7><br>
                <h7> $patient_barangay_address </h7>
                </div>
                <div class='col-5'>
                <h7 class='font-weight-bold'> City and Province</h7><br>
                <h7> $patient_CM_address, $patient_province </h7>
                <h7 class='font-weight-bold'> Region </h7><br>
                <h7> $patient_region </h7>
                </div>
                </div>
                              
                <br>
                <div class='col'>
                <h4 class='ml-2'> Vaccine Information </h4>
                </div>
                    ";


    echo "<div class='row ml-5'>
                <div class='col'>
                <h7 class='font-weight-bold ml-5'> First Dose </h7>
                </div>
                </div>
                <div class='row ml-5'>
                <div class='col-sm-5'>
                <h7 class='font-weight-bold ml-5  '> First Dose Date </h7>
                </div>
                
                
                ";

    if ($first_dose_vaccination == 1) {
        echo "  <div class='col-sm-5'>
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
            <h7> <!--Vaccine Type--> </h7>
            </div>
            </div>
            </div>
             ";
    } else {
        echo "<div class='col'>
          <h7> Not Vaccinated  </h7> 
          </div>
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
    <button type='button' class='btn btn-info ml-4' onclick='editVaccineDetails($vaccine_lot_id)'> <i class='far fa-edit'></i>  Edit</button> 
    </div>
    </div>
    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Manufacturer </h7>
    </div>
    <div class='col'>
    $vaccine_manufacturer
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Vaccine Type </h7>
    </div>
    <div class='col'>
    $vaccine_type
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Efficacy </h7>
    </div>
    <div class='col'>
    $vaccine_efficacy% 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Date Stored </h7>
    </div>
    <div class='col'>
    $date_stored
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Expiration Date </h7>
    </div>
    <div class='col'>
    $vaccine_expiration
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Life Span (in months) </h7>
    </div>
    <div class='col'>
   $vaccine_lifespan_in_months 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Interval (in months) </h7>
    </div>
    <div class='col'>
    $vaccine_dosage_interval 
    </div>
    </div>
    
    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Dosage Required </h7>
    </div>
    <div class='col'>
    $vaccine_dosage_required
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Total Quantity Vial </h7>
    </div>
    <div class='col'>
    $total_vaccine_vial_quantity 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Minimum Temperature (°C) </h7>
    </div>
    <div class='col'>
    $vaccine_minimum_temperature 
    </div>
    </div>

    <div class='row'>
    <div class='col'>
    <h7 class='ml-5 font-weight-bold'> Maximum Temperature (°C) </h7>
    </div>
    <div class='col'>
    $vaccine_maximum_temperature 
    </div>
    </div>
    <br>
    
    <div class='row'>
    
    <h7 class='ml-5 mb-1 font-weight-bold'>Vaccine Description</h7>
    <div class='text-justify border border-secondary rounded mx-5 p-2 mb-3' style='overflow: auto;'>
    <h7> $vaccine_description </h7>
    </div>
    </div>
    ";
}

?>