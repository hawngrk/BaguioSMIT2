<?php
header("Access-Control-Allow-Origin: *");
include "../includes/database.php";
#API access key from Google API's Console
$priorityStub = [];
$values = [];
$extension = [": Health Care Workers", ": Senior Citizens", ": Adult with Comorbidity", ": Frontline Personnel in Essential Sector", ": Indigent Population", ": Rest of the Population", ": 12-17 Years Old"];

$query = "SELECT A1_stubs, A2_stubs, A3_stubs, A4_stubs, A5_stubs, A6_stubs FROM barangay_stubs WHERE drive_id =(SELECT drive_id FROM vaccination_drive WHERE vaccination_date = (SELECT min(vaccination_date) FROM vaccination_drive WHERE vaccination_date >= CURDATE())) AND barangay_id = '113';";
$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($A1, $A2, $A3, $A4, $A5, $A6);
while ($stmt->fetch()){

    $availableStubs = [$A1, $A2, $A3, $A4, $A5, $A6];
    for ($i = 0; $i < 6; $i++) {
        if ($availableStubs[$i] != 0) {
            $priorityStub[] = "A" . $i + 1 . $extension[$i];
            $values[] = $availableStubs[$i];
        }
    }
}

$stmt->close();



for ($index = 0; $index < sizeof($priorityStub); $index++) {

    $patientQuery = "SELECT patient.token FROM patient JOIN patient_details ON patient_details.patient_id = patient.patient_id JOIN patient_barangay_queue ON patient_barangay_queue.patient_id = patient.patient_id WHERE patient.for_queue = 1 AND patient_details.patient_priority_group = '$priorityStub[$index]' AND patient_details.patient_barangay_address = 'San Luis Village' AND patient.first_dose_vaccination = 0 AND patient.notification = 0 ORDER BY patient_barangay_queue.first_dose_queue LIMIT $values[$index];";

    $stmt = $database->stmt_init();
    $stmt->prepare($patientQuery);
    $stmt->execute();
    $stmt->bind_result($token);

    while ($stmt->fetch()){

        define( 'API_ACCESS_KEY', 'AAAA4wnYuAw:APA91bFoXYprkrD3724XRTWKxgVJq3myfGR0Bwr1AahSylx0FEcg6smPbGN3dtrnqQ-vfZOAZfZbcEIcfIZorldnX03dp-l8IYL4x3vswyrOA0UCUpGWQ6A033l3mdzuWArPDm_qFr1g');
        $registrationIds = $token;

#prep the bundle
        $msg = array
        (
            'body' 	=> 'You have been assigned to a vaccination on October 21, 2021 on Saint Louis University Gym. Do you accept or not? Not accepting means that you will be made the least priority for vaccination.',
            'title'	=> 'Vaccination',
            'icon'	=> 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );

        $fields = array
        (
            'to'		=> $registrationIds,
            'notification'	=> $msg
        );


        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
    }
}

