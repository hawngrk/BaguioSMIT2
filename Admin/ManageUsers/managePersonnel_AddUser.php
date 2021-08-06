<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User-Personnel</title>
</head>
<body>
<p> Basic Information </p>
<form id='personnelForm' method="post" enctype="multipart/form-data">
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
        <label for="role"> Role </label>
        <select class="formControl" id="role" name="role">
            <option> City Hall Employee </option>
            <option> Vaccination Personnel </option>
        </select>
    </div>
    <div class="basicInfoForms">
        <label for="contactNumber"> Contact Number </label>
        <input type="text" class="formControl" id="contactNumber" name="contactNumber">
    </div>
    <!--<button type="submit" class="formControl"> Add </button>-->
</form>

<?php
echo " <button type='submit' name='addPersonnel' form='personnelForm' >Add Patient</button>";
if (isset($_POST['addPersonnel'])) {
    include '../../includes/database.php';
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $suffix = $_POST['suffix'];
    if ($suffix == 'None') {
        $suffix = "";
    }
    $role = $_POST['role'];
    $contactNumber =$_POST['contactNumber'];

    $query1 = "INSERT INTO employee (employee_first_name, employee_last_name, employee_middle_name, employee_suffix, employee_role, employee_contact_number)  VALUE ('$lastName', '$firstName', '$middleName', '$suffix', '$role', '$contactNumber');";
    $database->query($query1);

    $username = str_replace(' ', '', $firstName);
    $password = str_replace(' ', '', $lastName);

    $getQuery = "SELECT employee_id FROM employee WHERE employee_contact_number='$contactNumber'";
    $dbase= $database->stmt_init();
    $dbase ->prepare($getQuery);
    $dbase ->execute();
    $dbase ->bind_result($employeeid);
    $dbase ->fetch();
    $dbase ->close();

    $query2 = "INSERT INTO employee_account (employee_id, employee_username, employee_password, employee_account_type) VALUE ('$employeeid', '$username', '$password', 'Client');";
    $database->query($query2);
}
?>
<br>
<br>
<p> Here are the patients credentials </p>
<form>
    <div class="credentials">
        <label for="userName"> Username </label>
        <input type="text" readonly class="formControl" id="userName" value="@usernameExample">
    </div>
    <div class="credentials">
        <label for="password"> Password </label>
        <input type="text" readonly class="formControl" id="password" value="passwordExample">
    </div>
    <button type="submit" class="formControl"> Add </button>
</form>
</body>
</html>
