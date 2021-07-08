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
        </select>
    </div>

    <div class="basicInfoForms">
        <label for="category"> Category </label>
        <select class="formControl" id="category" name="category">
            <option> Health Care Worker </option>
            <option> Senior Citizen </option>
            <option> Indigent </option>
            <option> Uniformed Personnel </option>
            <option> Essential Worker </option>
            <option> Other Citizen </option>
        </select>
    </div>
    <br>
    <br>
    <p> Address </p>
    <div class="addressForm">
        <label for="streetName"> Street Name </label>
        <input type="text" class="formControl" id="streetName" name="streetName">
    </div>

    <div class="addressForm">
        <label for="cityTown"> City/Town </label>
        <input type="text" class="formControl" id="cityTown" name="cityTown">
    </div>

    <div class="addressForm">
        <label for="state"> State/Province </label>
        <input type="text" class="formControl" id="state" name="state">
    </div>

    <div class="form">
        <label for="birthday"> Birthday </label>
        <input type="date"  id="birthday" name="birthday">
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
        <input class="skin" type="checkbox" value="Skin" id="skin">
        <label class="optionSkin" for="skin"> Skin </label>

        <input class="insect" type="checkbox" value="Insect" id="insect">
        <label class="optionInsect" for="insect"> Insect </label>

        <input class="latex" type="checkbox" value="Latex" id="latex">
        <label class="optionLatex" for="latex"> Latex </label>

        <input class="none" type="checkbox" value="None" id="none">
        <label class="optionNone" for="none"> None </label>
    </div>

    <div>
        <input class="food" type="checkbox" value="Food" id="food">
        <label class="optionFood" for="food"> Food </label>

        <input class="pollen" type="checkbox" value="Pollen" id="pollen">
        <label class="optionPollen" for="pollen"> Pollen </label>

        <input class="mold" type="checkbox" value="Mold" id="mold">
        <label class="optionMold" for="mold"> Mold </label>

    </div>
    <div>
        <input class="medication" type="checkbox" value="Medication" id="medication">
        <label class="optionMedication" for="medication"> Medication </label>

        <input class="bite" type="checkbox" value="Bite" id="bite">
        <label class="optionBite" for="bite"> Bite </label>

        <input class="pet" type="checkbox" value="Pet" id="pet">
        <label class="optionPet" for="pet"> Pet </label>
    </div>

    <p> <b> Comorbidities: </b> </p>
    <div>
        <input class="hypertension" type="checkbox" value="Hypertension" id="hypertension">
        <label class="optionHypertension" for="hypertension"> Hypertension </label>

        <input class="diabetes" type="checkbox" value="Diabetes" id="diabetes">
        <label class="optionDiabetes" for="diabetes"> Diabetes </label>

        <input class="none" type="checkbox" value="None" id="none">
        <label class="optionNone" for="none"> None </label>
    </div>

    <div>
        <input class="heart" type="checkbox" value="Heart Diseases" id="heart">
        <label class="optionHeartDisease" for="heart"> Heart Diseases </label>

        <input class="asthma" type="checkbox" value="Asthma" id="asthma">
        <label class="optionAsthma" for="asthma"> Asthma </label>

        <input class="others" type="checkbox" value="others" id="others">
        <label for="others"> Others (Please indicate): </label>
        <input type="text" class="others" id="others">
    </div>

    <div>
        <input class="kidney" type="checkbox" value="Kidney Disease" id="kidney">
        <label class="optionKidneyDisease" for="kidney"> Kidney Diseases </label>

        <input class="cancer" type="checkbox" value="Asthma" id="cancer">
        <label class="optionCancer" for="cancer"> Cancer </label>
    </div>
</form>
<?php
echo " <button type='submit' name='addPatient' form='patientForm' >Add Patient</button>";
if (isset($_POST['addPatient'])) {
    include './includes/database.php';
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $suffix = $_POST['suffix'];
    $category = $_POST['category'];
}
?>

</body>
</html>