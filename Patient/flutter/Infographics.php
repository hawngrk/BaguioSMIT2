<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';
ini_set('memory_limit', '-1');

$data = array();
$result = $database->query("SELECT info_image FROM infographic WHERE archived = 0;");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = base64_encode($row['info_image']);
    }

    echo json_encode($data);

} else {
    echo "error";
}