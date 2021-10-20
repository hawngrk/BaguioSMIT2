<?php
#API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAA4wnYuAw:APA91bFoXYprkrD3724XRTWKxgVJq3myfGR0Bwr1AahSylx0FEcg6smPbGN3dtrnqQ-vfZOAZfZbcEIcfIZorldnX03dp-l8IYL4x3vswyrOA0UCUpGWQ6A033l3mdzuWArPDm_qFr1g');
$registrationIds = "cLFJPkuRT5OD8ffSAwaQlM:APA91bF_K89vpsHuiaAmFB5-Q573XhC9ZEzNz3CBGEgnXbMeamalTuBctHeAC1uxoXZqWLxmYsrMM8OllTqJ341qJL0851yyHyRnjhiBJVZfbXtTR1eMXY4jLD3y_0V4LlAq7UgZL3vQ";

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

#Echo Result Of FireBase Server
echo $result;