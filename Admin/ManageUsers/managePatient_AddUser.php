<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User-Patient</title>
</head>
<body>
<p> Basic Information </p>
<form id='patientForm' method="post" enctype="multipart/form-data">
    <div class="basicInfoForms">
        <label for="lastName"> Last Name </label>
        <input type="text" class="formControl" id="lastName" name="lastName">
    </div>

    <div class="basicInfoForms">
        <label for="firstName"> First Name </label>
        <input type="text" class="formControl" id="firstName" name="firstName">
    </div>

    <div class="basicInfoForms">
        <label for="middleName"> Middle Name </label>
        <input type="text" class="formControl" id="middleName" name="middleName">
    </div>

    <div class="basicInfoForms">
        <label for="suffix"> Suffix Name </label>
        <select class="formControl" id="suffix" name="suffix">
            <option> Sr </option>
            <option> Jr </option>
            <option> I </option>
            <option> II </option>
            <option> III </option>
            <option> None </option>
        </select>
    </div>

    <div class="basicInfoForms">
        <label for="group"> Priority Group </label>
        <select class="formControl" id="group" name="group">
            <option> A1: Health Care Workers </option>
            <option> A2: Senior Citizens </option>
            <option> A3: Adult with Comorbidity </option>
            <option> A4: Frontline Personnel in Essential Sector, including Uniformed Personnel </option>
            <option> A5: Indigent Population </option>
            <option> ROP: Rest of Population </option>
        </select>
    </div>

    <div class="basicInfoForms">
        <label for="category"> Category ID </label>
        <select class="formControl" id="category" name="category">
            <option> Professional Commision Regulation ID </option>
            <option> Office of Senior Citizen Affairs ID </option>
            <option> Facility ID </option>
            <option> Other ID </option>
        </select>
    </div>

    <div class="basicInfoForms">
        <label for="categoryNumber"> Category Number </label>
        <input type="text" class="formControl" id="categoryNumber" name="categoryNumber">
    </div>

    <br>
    <br>
    <p> Address </p>
    <div class="addressForm">
        <label for="house"> House Address </label>
        <input type="text" class="formControl" id="house" name="house">
    </div>

    <div class="addressForm">
        <label for="barangay"> Barangay </label>
        <input type="text" class="formControl" id="barangay" name="barangay">
    </div>

    <div class="addressForm">
        <label for="cityTown"> City/Town </label>
        <input type="text" class="formControl" id="cityTown" name="cityTown">
    </div>

    <div class="addressForm">
        <label for="state"> State/Province </label>
        <input type="text" class="formControl" id="state" name="state">
    </div>

    <div class="addressForm">
        <label for="region"> Region </label>
        <input type="text" class="formControl" id="region" name="region">
    </div>

    <div class="form">
        <label for="birthday"> Birthday </label>
        <input type="date"  id="birthday" name="birthday">
    </div>

    <div class="form">
        <label for="age"> Age </label>
        <input type="text"  class="formControl", id="age" name="age">
    </div>

    <div class="form">
        <label for="gender"> Gender</label>
        <select class="formControl" id="gender" name="gender">
            <option> Female </option>
            <option> Male </option>
        </select>
    </div>

    <div class="form">
        <label for="contactNumber"> Contact Number </label>
        <input type="text" class="formControl" id="contactNumber" name="contactNumber">
    </div>

    <div class="basicInfoForms">
        <label for="occupation"> Occupation </label>
        <input type="text" class="formControl" id="occupation" name="occupation">
    </div>
    <br>
    <!--<button type='button' onclick="window.location.href='#'"> Next </button>-->
    <br>
    <br>
    <p> Medical Background </p>
    <p> <b> Allergy: </b> </p>
    <p> *Check the following allergies if the person has a certain allergy</p>
    <div class="form-check">
        <input type="hidden" name="skin" value="0">
        <input class="skin" type="checkbox" name="skin" value="1" id="skin">
        <label class="optionSkin" for="skin"> Skin </label>

        <input type="hidden" name="food" value="0">
        <input class="food" type="checkbox" name="food"  value="1" id="food">
        <label class="optionFood" for="food"> Food </label>

        <input type="hidden" name="medication" value="0">
        <input class="medication" type="checkbox" name="medication" value="1" id="medication">
        <label class="optionMedication" for="medication"> Medication </label>

        <input type="hidden" name="insect" value="0">
        <input class="insect" type="checkbox"  name="insect" value="1" id="insect">
        <label class="optionInsect" for="insect"> Insect </label>

        <input type="hidden" name="pollen" value="0">
        <input class="pollen" type="checkbox" name="pollen" value="1" id="pollen">
        <label class="optionPollen" for="pollen"> Pollen </label>

        <input type="hidden" name="bite" value="0">
        <input class="bite" type="checkbox" name="bite" value="1" id="bite">
        <label class="optionBite" for="bite"> Bite </label>

        <input type="hidden" name="latex" value="0">
        <input class="latex" type="checkbox" name="latex" value="1" id="latex">
        <label class="optionLatex" for="latex"> Latex </label>

        <input type="hidden" name="mold" value="0">
        <input class="mold" type="checkbox" name="mold" value="1" id="mold">
        <label class="optionMold" for="mold"> Mold </label>

        <input type="hidden" name="pet" value="0">
        <input class="pet" type="checkbox" name="pet" value="1" id="pet">
        <label class="optionPet" for="pet"> Pet </label>
    </div>

    <p> <b> Comorbidities: </b> </p>
    <div>
        <input type="hidden" name="hypertension" value="0">
        <input class="hypertension" type="checkbox" name="hypertension" value="1" id="hypertension">
        <label class="optionHypertension" for="hypertension"> Hypertension </label>

        <input type="hidden" name="heart" value="0">
        <input class="heart" type="checkbox" name="heart" value="1" id="heart">
        <label class="optionHeartDisease" for="heart"> Heart Diseases </label>

        <input type="hidden" name="kidney" value="0">
        <input class="kidney" type="checkbox" name="kidney" value="1" id="kidney">
        <label class="optionKidneyDisease" for="kidney"> Kidney Diseases </label>

        <input type="hidden" name="diabetes" value="0">
        <input class="diabetes" type="checkbox" name="diabetes" value="1" id="diabetes">
        <label class="optionDiabetes" for="diabetes"> Diabetes </label>

        <input type="hidden" name="asthma" value="0">
        <input class="asthma" type="checkbox" name="asthma" value="1" id="asthma">
        <label class="optionAsthma" for="asthma"> Asthma </label>

        <input type="hidden" name="immunodeficiency" value="0">
        <input class="asthma" type="checkbox" name="immunodeficiency" value="1" id="immunodeficiency">
        <label class="optionImmunodeficiency" for="immunodeficiency"> Immunodeficiency </label>

        <input type="hidden" name="cancer" value="0">
        <input class="cancer" type="checkbox" name="cancer" value="1" id="cancer">
        <label class="optionCancer" for="cancer"> Cancer </label>

        <br>
        <label for="others"> Others (Please indicate): </label>
        <input type="text" class="others" name="others" id="others">
    </div>
</form>

<?php
echo " <button type='submit' name='addPatient' form='patientForm' >Add Patient</button>";
if (isset($_POST['addPatient'])) {
    include '../../includes/database.php';
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $suffix = $_POST['suffix'];
    if ($suffix == 'None') {
        $suffix = "";
    }
    $group = $_POST['group'];
    $category = $_POST['category'];
    $categoryNumber = $_POST['categoryNumber'];

    $house = $_POST['house'];
    $barangay = $_POST['barangay'];
    $cityTown = $_POST['cityTown'];
    $state = $_POST['state'];
    $region = $_POST['region'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $occupation = $_POST['occupation'];

    $fullName = $lastName." ".$firstName." ".$middleName." ";

    $skin = $_POST['skin'];
    $food = $_POST['food'];
    $medication = $_POST['medication'];
    $insect = $_POST['insect'];
    $pollen = $_POST['pollen'];
    $bite = $_POST['bite'];
    $latex = $_POST['latex'];
    $mold = $_POST['mold'];
    $pet = $_POST['pet'];

    $hypertension = $_POST['hypertension'];
    $heart = $_POST['heart'];
    $kidney = $_POST['kidney'];
    $diabetes = $_POST['diabetes'];
    $asthma = $_POST['asthma'];
    $immunodeficiency = $_POST['immunodeficiency'];
    $cancer = $_POST['cancer'];

    if (empty($_POST['others'])) {
        $others = "";
    } else {
        $others = $_POST['others'];
    }

    $query1 = "INSERT INTO patient (patient_full_name, vaccination_status) VALUE ('$fullName', 'Not Vaccinated');";
    $database->query($query1);

    $getQuery = "SELECT patient_id FROM patient WHERE patient_full_name='$fullName'";
    $dbase= $database->stmt_init();
    $dbase ->prepare($getQuery);
    $dbase ->execute();
    $dbase ->bind_result($patientid);
    $dbase ->fetch();
    $dbase ->close();

    $query2 = "INSERT INTO patient_details (patient_id, patient_first_name, patient_last_name, patient_middle_name, patient_suffix, patient_priority_group, patient_category_id, patient_category_number, patient_house_address, patient_barangay_address, patient_CM_address, patient_province, patient_region, patient_birthdate, patient_age, patient_gender, patient_contact_number, patient_occupation) VALUE ('$patientid', '$firstName', '$lastName', '$middleName', '$suffix', '$group', '$category', '$categoryNumber', '$house', '$barangay', '$cityTown', '$state', '$region', '$birthday', '$age', '$gender', '$contactNumber', '$occupation');";
    $database->query($query2);


    $query3 = "INSERT INTO medical_background (patient_id, skin_allergy, food_allergy, medication_allergy, insect_allergy, pollen_allergy, bite_allergy, latex_allergy, mold_allergy, pet_allergy, hypertension, heart_disease, kidney_disease, diabetes_mellitus, bronchial_asthma, immunodeficiency, cancer, other_commorbidity) VALUE ('$patientid', '$skin', '$food', '$medication', '$insect', '$pollen', '$bite', '$latex', '$mold', '$pet', '$hypertension', '$heart', '$kidney', '$diabetes', '$asthma', '$immunodeficiency', '$cancer', '$others');";
    $database->query($query3);
}
?>
</body>
</html>