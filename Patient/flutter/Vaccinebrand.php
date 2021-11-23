<?php
header("Access-Control-Allow-Origin: *");
include '../../includes/database.php';

$data = array();
$lot = $_POST['lot'];
$result = $database->query("SELECT vaccine_name AS vaccine FROM vaccine JOIN vaccine_lot ON vaccine.vaccine_id = vaccine_lot.vaccine_id WHERE vaccine_lot_id = '$lot';");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "error";
}
