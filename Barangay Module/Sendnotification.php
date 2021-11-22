<?php
include "../includes/database.php";

$type = $_POST['type'];
$barangay_id = $_POST['barangayId'];
$priorityStub = [];
$values = [];

$query = "SELECT drive_id, A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, ROAP, A3_Pedia, ROPP, second_dose FROM barangay_stubs WHERE drive_id =(SELECT drive_id FROM vaccination_drive WHERE vaccination_date = (SELECT min(vaccination_date) FROM vaccination_drive WHERE vaccination_date >= CURDATE())) AND barangay_id = '$barangay_id';";
$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($drive, $A1, $A2, $A3, $A4, $A5, $roap, $A3P, $ROPP, $second);
$stmt->fetch();
$stmt->close();

$availableStubs = [$A1, $A2, $A3, $A4, $A5, $roap, $A3P, $ROPP];

$sum = $A1+ $A2+ $A3+ $A4+ $A5+ $roap+ $A3P+$ROPP;

if ($sum != 0){
    for ($i = 0; $i < sizeof($availableStubs); $i++) {
        if ($availableStubs[$i] != 0) {
            $priorityStub[] = $i + 1;
            $values[] = $availableStubs[$i];
        }
    }
} else{
    $stmt = $database->stmt_init();
    $stmt->prepare("SELECT priority_id FROM priority_drive WHERE drive_id ='$drive'");
    $stmt->execute();
    $stmt->bind_result($priority);
    while ($stmt->fetch()){
        $priorityStub[] = $priority;
    }
    $stmt->close();
}

$vaccines = [];
$stmt = $database->stmt_init();
$stmt->prepare("SELECT location, vaccination_date, vaccine_name  FROM vaccination_drive JOIN vaccination_sites ON vaccination_drive.vaccination_site_id = vaccination_sites.vaccination_site_id JOIN vaccine_drive_1 ON vaccination_drive.drive_id = vaccine_drive_1.drive_id JOIN vaccine ON vaccine_drive_1.vaccine_id = vaccine.vaccine_id WHERE vaccination_drive.drive_id ='$drive'");
$stmt->execute();
$stmt->bind_result($location, $date, $vaccine);
while ($stmt->fetch()) {
    array_push($vaccines, $vaccine);
}

$stmt->close();

$vaccines2 = [];
$stmt = $database->stmt_init();
$stmt->prepare("SELECT vaccine.vaccine_name, first_dose_date FROM vaccine_drive_2 JOIN vaccine ON vaccine_drive_2.vaccine_id = vaccine.vaccine_id WHERE vaccine_drive_2.drive_id= '$drive'");
$stmt->execute();
$stmt->bind_result($vaccine2, $date);
while ($stmt->fetch()) {
    $vaccines2[$vaccine2] = [];
    $vaccines2[$vaccine2] = $date;
}



if (isset($_POST['first'])) {
    for ($index = 0; $index < sizeof($priorityStub); $index++) {
        $patients = [];
        if($sum == 0){
            echo "no";
            $patientQuery = "SELECT patient.patient_id, patient.token, patient_details.patient_contact_number FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id WHERE patient.for_queue = 1 AND priority_groups.priority_group_id = '$priorityStub[$index]' AND barangay.barangay_id = '$barangay_id' AND patient.first_dose_vaccination = 0 AND patient.notification = 0 ORDER BY patient_barangay_queue.first_dose_queue";
        }else {
            if ($type == "many") {
                $patientQuery = "SELECT patient.patient_id, patient.token, patient_details.patient_contact_number FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id WHERE patient.for_queue = 1 AND priority_groups.priority_group_id = '$priorityStub[$index]' AND barangay.barangay_id = '$barangay_id' AND patient.first_dose_vaccination = 0 AND patient.notification = 0 ORDER BY patient_barangay_queue.first_dose_queue ASC LIMIT $values[$index];";
            } else {
                $patientQuery = "SELECT patient.patient_id, patient.token, patient_details.patient_contact_number FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id JOIN priority_groups ON patient_details.priority_group_id = priority_groups.priority_group_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id WHERE patient.for_queue = 1 AND priority_groups.priority_group_id = '$priorityStub[$index]' AND barangay.barangay_id = '$barangay_id' AND patient.first_dose_vaccination = 0 AND patient.notification = 0 ORDER BY patient_barangay_queue.first_dose_queue ASC LIMIT 1";
            }
        }

        $stmt = $database->stmt_init();
        $stmt->prepare($patientQuery);
        $stmt->execute();
        $stmt->bind_result($patientId, $token, $number);
        while ($stmt->fetch()) {
            if ($token != "") {
                define('API_ACCESS_KEY', 'AAAA4wnYuAw:APA91bFoXYprkrD3724XRTWKxgVJq3myfGR0Bwr1AahSylx0FEcg6smPbGN3dtrnqQ-vfZOAZfZbcEIcfIZorldnX03dp-l8IYL4x3vswyrOA0UCUpGWQ6A033l3mdzuWArPDm_qFr1g');

                $msg = array
                (
                    'body' => 'You have been assigned to a vaccination on ' . $date . ' on ' . $location . '',
                    'title' => 'First Dose Vaccination',
                    'icon' => 'myicon',/*Default Icon*/
                    'sound' => 'mySound'/*Default sound*/
                );

                if($sum == 0){
                    $data = array(
                        'driveId' => $drive,
                        'barangayId' => $barangay_id,
                        'token' => $token,
                        'location' => $location,
                        'date' => $date,
                        'vaccines' => $vaccines,
                        'type' => 'noStubsFirst'
                    );
                }else {

                    $data = array(
                        'driveId' => $drive,
                        'barangayId' => $barangay_id,
                        'token' => $token,
                        'location' => $location,
                        'date' => $date,
                        'vaccines' => $vaccines
                    );
                }

                $fields = array
                (
                    'to' => $token,
                    'notification' => $msg,
                    'data' => $data
                );

                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                curl_close($ch);
                echo $result;

                array_push($patients, $patientId);


                $ch2 = curl_init();
                $parameters = array(
                    'apikey' => '95544f613ef48df7a05012fd0b86b4ff',
                    'number' => $number,
                    'message' => 'You have been assigned to a vaccination on ' . $date . ' on ' . $location . '',
                );
                curl_setopt($ch2, CURLOPT_URL, 'https://api.semaphore.co/api/v4/messages');
                curl_setopt($ch2, CURLOPT_POST, 1);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($parameters));
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
                $output = curl_exec($ch2);
                curl_close($ch2);
                echo $output;

            }
        }
        foreach ($patients as $pat) {
            if ($database->query("UPDATE patient SET notification = 1 WHERE patient_id = '$pat';")) {
                echo "ok";
                echo $pat;
            } else {
                echo "not";
            }
        }
    }
}

if (isset($_POST['second'])) {
    foreach ($vaccines2 as $key => $value) {
        $patients1 = [];
        if($second == 0){
            $patientQuery2 = "SELECT patient.patient_id, patient.token, patient_details.patient_contact_number FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id JOIN patient_drive ON patient_drive.patient_id = patient.patient_id JOIN vaccine_lot ON vaccine_lot.vaccine_lot_id = patient_drive.vaccine_lot_id JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id  WHERE patient.for_queue = 1 AND barangay.barangay_id = '$barangay_id' AND patient.first_dose_vaccination = 1 AND patient.second_dose_vaccination = 0 AND patient.notification = 0 AND patient.date_of_first_dosage = '$value' AND vaccine.vaccine_name = '$key' ORDER BY patient_barangay_queue.second_dose_queue ASC";

        }else {
            if ($type == "many") {
                $patientQuery2 = "SELECT patient.patient_id, patient.token, patient_details.patient_contact_number FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id JOIN patient_drive ON patient_drive.patient_id = patient.patient_id JOIN vaccine_lot ON vaccine_lot.vaccine_lot_id = patient_drive.vaccine_lot_id JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id  WHERE patient.for_queue = 1 AND barangay.barangay_id = '$barangay_id' AND patient.first_dose_vaccination = 1 AND patient.second_dose_vaccination = 0 AND patient.notification = 0 AND patient.date_of_first_dosage = '$value' AND vaccine.vaccine_name = '$key' ORDER BY patient_barangay_queue.second_dose_queue ASC LIMIT $second;";
            } else {
                $patientQuery2 = "SELECT patient.patient_id, patient.token, patient_details.patient_contact_number FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN barangay ON patient_details.barangay_id = barangay.barangay_id JOIN patient_drive ON patient_drive.patient_id = patient.patient_id JOIN vaccine_lot ON vaccine_lot.vaccine_lot_id = patient_drive.vaccine_lot_id JOIN vaccine ON vaccine_lot.vaccine_id = vaccine.vaccine_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id  WHERE patient.for_queue = 1 AND barangay.barangay_id = '$barangay_id' AND patient.first_dose_vaccination = 1 AND patient.second_dose_vaccination = 0 AND patient.notification = 0 AND patient.date_of_first_dosage = '$value' AND vaccine.vaccine_name = '$key' ORDER BY patient_barangay_queue.second_dose_queue ASC LIMIT 1";
            }
        }

        $stmt = $database->stmt_init();
        $stmt->prepare($patientQuery2);
        $stmt->execute();
        $stmt->bind_result($patientId2, $token2, $number2);
        while ($stmt->fetch()) {
            if ($token2 != "") {
                define('API_ACCESS_KEY', 'AAAA4wnYuAw:APA91bFoXYprkrD3724XRTWKxgVJq3myfGR0Bwr1AahSylx0FEcg6smPbGN3dtrnqQ-vfZOAZfZbcEIcfIZorldnX03dp-l8IYL4x3vswyrOA0UCUpGWQ6A033l3mdzuWArPDm_qFr1g');

                $msg = array
                (
                    'body' => 'You have been assigned to your second dose vaccination on ' . $date . ' on ' . $location . '',
                    'title' => 'Second Dose Vaccination',
                    'icon' => 'myicon',/*Default Icon*/
                    'sound' => 'mySound'/*Default sound*/
                );

                if ($second == 0){
                    $data = array(
                        'driveId' => $drive,
                        'barangayId' => $barangay_id,
                        'token' => $token2,
                        'location' => $location,
                        'date' => $date,
                        'vaccines' => $vaccines2,
                        'type'=> 'noStubsSecond'
                    );
                }else {
                    $data = array(
                        'driveId' => $drive,
                        'barangayId' => $barangay_id,
                        'token' => $token2,
                        'location' => $location,
                        'date' => $date,
                        'vaccines' => $vaccines2
                    );
                }

                $fields = array
                (
                    'to' => $token2,
                    'notification' => $msg,
                    'data' => $data
                );

                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                curl_close($ch);
                echo $result;

                array_push($patients1, $patientId2);


                $ch2 = curl_init();
                $parameters = array(
                    'apikey' => '95544f613ef48df7a05012fd0b86b4ff',
                    'number' => $number2,
                    'message' => 'You have been assigned to a vaccination on ' . $date . ' on ' . $location . '',
                );
                curl_setopt($ch2, CURLOPT_URL, 'https://api.semaphore.co/api/v4/messages');
                curl_setopt($ch2, CURLOPT_POST, 1);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($parameters));
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
                $output = curl_exec($ch2);
                curl_close($ch2);
                echo $output;

            }
        }
    }
    foreach ($patients1 as $pat2) {
        if ($database->query("UPDATE patient SET notification = 1 WHERE patient_id = '$pat2';")) {
            echo "ok";
            echo $pat2;
        } else {
            echo "not";
        }
    }
}

