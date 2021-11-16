<?php
include("../includes/database.php");
require_once("../require/getBarangay.php");

// show Barangay details
if (isset($_POST['barangayName'])) {
    $barangayName = $_POST['barangayName'];
    $query = "SELECT city, province, region FROM barangay WHERE barangay.barangay_id = '$barangayName'";

    $stmt = $database->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($city, $province, $region);
    $stmt->fetch();
    $stmt->close();

    echo "
          <div class='col'>
            <label class='label1' for='city'>City/Municipality</label>
            <input type='text3' id='city' class='input' value='$city' readonly>
          </div>
          <div class='col'>
            <label class='label1' for='province'>Province</label>
            <input type='text3' id='province' class='input' value='$province' readonly>
          </div>
          <div class='col'>
            <label class='label1' for='region'>Region</label>
            <input type='text3' id='region' class='input' value='$region' readonly>
          </div>
  
";
}


?>
