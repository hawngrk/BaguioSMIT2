<?php
include_once "../includes/database.php";

if (isset($_POST['adult'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group != 'A7: 12-17 Years Old' AND first_dose_vaccination = 1 AND second_dose_vaccination = 0 AND date_of_first_dosage >= '$startDate' AND date_of_first_dosage <= '$endDate';");
    $dbase->execute();
    $dbase->bind_result($count);
    $dbase->fetch();

    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group != 'A7: 12-17 Years Old' AND first_dose_vaccination = 1 AND second_dose_vaccination = 1 AND date_of_second_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate';");
    $dbase->execute();
    $dbase->bind_result($count2);
    $dbase->fetch();

    $dbase->close();

    echo $count . ',' . $count2;
}

if (isset($_POST['pedia'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = 'A7: 12-17 Years Old' AND first_dose_vaccination = 1 AND second_dose_vaccination = 0 AND date_of_first_dosage >= '$startDate' AND date_of_first_dosage <= '$endDate';");
    $dbase->execute();
    $dbase->bind_result($count);
    $dbase->fetch();

    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = 'A7: 12-17 Years Old' AND first_dose_vaccination = 1 AND second_dose_vaccination = 1 AND date_of_second_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate';");
    $dbase->execute();
    $dbase->bind_result($count2);
    $dbase->fetch();

    $dbase->close();

    echo $count . ',' . $count2;
}

if (isset($_POST['total'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = 'A7: 12-17 Years Old' AND first_dose_vaccination = 1 AND second_dose_vaccination = 0 AND date_of_first_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate';");
    $dbase->execute();
    $dbase->bind_result($count);
    $dbase->fetch();

    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = 'A7: 12-17 Years Old' AND first_dose_vaccination = 1 AND second_dose_vaccination = 1 AND date_of_first_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate';");
    $dbase->execute();
    $dbase->bind_result($count2);
    $dbase->fetch();

    $dbase->close();

    echo $count . ',' . $count2;
}

if (isset($_POST['barAdult'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $groups = ['A1: Health Care Workers', 'A2: Senior Citizens', 'A3: Adult with Comorbidity', 'A4: Frontline Personnel in Essential Sector', 'A5: Indigent Population', 'Rest of Adult Population'];
    $values = [];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND (second_dose_vaccination = 0 OR second_dose_vaccination = 1) AND ((date_of_first_dosage >= '$startDate' AND date_of_first_dosage <= '$endDate') OR (date_of_second_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate'));");

    for ($i = 0; $i < sizeof($groups); $i++) {
        $dbase->bind_param('s', $groups[$i]);
        $dbase->execute();
        $dbase->bind_result($val);
        $dbase->fetch();

        array_push($values, $val);
    }
    $dbase->close();

    echo json_encode($values);
}

if (isset($_POST['barPedia'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $groups = ['A3. Pedia: 12-17 Years Old with Commorbidity', 'Rest of Pedia Population', 'A3: Adult with Comorbidity', 'A4: Frontline Personnel in Essential Sector', 'A5: Indigent Population', 'A6: Rest Of The Population'];
    $values = [];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND (second_dose_vaccination = 0 OR second_dose_vaccination = 1) AND ((date_of_first_dosage >= '$startDate' AND date_of_first_dosage <= '$endDate') OR (date_of_second_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate'));");

    for ($i = 0; $i < sizeof($groups); $i++) {
        $dbase->bind_param('s', $groups[$i]);
        $dbase->execute();
        $dbase->bind_result($val);
        $dbase->fetch();

        array_push($values, $val);
    }
    $dbase->close();

    echo json_encode($values);
}

if (isset($_POST['pie'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $values = [];

    $groups = ['A1: Health Care Workers', 'A2: Senior Citizens', 'A3: Adult with Comorbidity', 'A4: Frontline Personnel in Essential Sector', 'A5: Indigent Population', 'Rest of Adult Population', 'A7: 12-17 Years Old', 'Rest of Pedia Population'];
    $values = [];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND (second_dose_vaccination = 0 OR second_dose_vaccination = 1) AND ((date_of_first_dosage >= '$startDate' AND date_of_first_dosage <= '$endDate') OR (date_of_second_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate'));");

    for ($i = 0; $i < sizeof($groups); $i++) {
        $dbase->bind_param('s', $groups[$i]);
        $dbase->execute();
        $dbase->bind_result($val);
        $dbase->fetch();

        array_push($values, $val);
    }
    $dbase->close();

    echo json_encode($values);
}

if (isset($_POST['table'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $values1 = [];
    $values2 = [];

    $groups = ['A1: Health Care Workers', 'A2: Senior Citizens', 'A3: Adult with Comorbidity', 'A4: Frontline Personnel in Essential Sector', 'A5: Indigent Population', 'Rest of Adult Population', 'A7: 12-17 Years Old', 'Rest of Pedia Population'];

    $dbase = $database->stmt_init();
    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND second_dose_vaccination = 0 AND date_of_first_dosage >= '$startDate' AND date_of_first_dosage <= '$endDate';");

    for ($i = 0; $i < sizeof($groups); $i++) {
        $dbase->bind_param('s', $groups[$i]);
        $dbase->execute();
        $dbase->bind_result($val);
        $dbase->fetch();

        array_push($values1, $val);
    }

    $dbase->prepare("SELECT COUNT(patient.patient_id) AS count FROM patient JOIN patient_details ON patient.patient_id = patient_details.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id WHERE priority_groups.priority_group = ? AND first_dose_vaccination = 1 AND second_dose_vaccination = 1 AND date_of_second_dosage >= '$startDate' AND date_of_second_dosage <= '$endDate';");

    for ($i = 0; $i < sizeof($groups); $i++) {
        $dbase->bind_param('s', $groups[$i]);
        $dbase->execute();
        $dbase->bind_result($val);
        $dbase->fetch();

        array_push($values2, $val);
    }

    $dbase->close();
    echo "
    <thead class=\"text-center thead-dark\">
                        <tr>
                            <th scope=\"col\"> Priority Groups</th>
                            <th scope=\"col\"> With at least One Dose</th>
                            <th scope=\"col\"> Fully Vaccinated</th>
                            <th scope=\"col\"> Total</th>
                        </tr>
                        </thead>
                        <tbody class=\"text-center\">
    ";
    for ($i = 0; $i < sizeof($values1); $i++) {
        $priority = "A" . ($i + 1);
        $total = $values1[$i] + $values2[$i];
        echo "
        <tr>
                            <th scope=\"row\"> $priority</th>
                            <th scope=\"row\"> $values1[$i]</th>
                            <th scope=\"row\"> $values2[$i]</th>
                            <th scope=\"row\"> $total</th>
                        </tr>
        ";
    }
    echo "
    </tbody>
    ";
}

