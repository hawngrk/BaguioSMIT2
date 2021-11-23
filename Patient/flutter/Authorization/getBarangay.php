<?php
include("../../../includes/database.php");

$query = 
    "SELECT
        barangay.barangay_id,
        barangay.barangay_name,
        barangay.city,
        barangay.province,
        barangay.region
    FROM
        barangay
    WHERE 
        barangay.barangay_name IS NOT NULL AND barangay.city IS NOT NULL AND barangay.province IS NOT NULL AND barangay.region IS NOT NULL;
";

$barangays = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($barangayID, $barangayName, $city, $province, $region);

while($stmt->fetch()) {
    $barangay = 
    array('ID' => utf8_encode($barangayID),
    'barangayName' => utf8_encode($barangayName), 
    'city' => utf8_encode($city),
    'province' => utf8_encode($province), 
    'region' => utf8_encode($region));

    //echo json_encode($barangay);

    array_push($barangays, json_encode($barangay));
    //array_push($barangays, $barangay);
}

echo json_encode($barangays);