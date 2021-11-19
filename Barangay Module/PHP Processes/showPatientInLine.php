<?php
$accountDetails = $_SESSION['account'];
$barangay_id = $accountDetails['barangay_id'];
require_once '../require/getPatientDetails.php';
require_once '../require/getPatient.php';
require_once '../require/getPriorityGroup.php';


foreach($patients as $p) {
    if ($p->getForQueue() == 1) {
        $id = $p->getPatientId();
        foreach ($patient_details as $pd) {
            if ($pd->getBarangayId() == $barangay_id && $pd->getPatientDeetPatId() == $id) {
                $contact = $pd->getContact();

                if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
                } else if ($pd->getPatientSuffix() == null) {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
                } else if ($pd->getPatientMName() == null) {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
                } else {
                    $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
                }

                echo "<tr>
                <td>$name</td>
                <td>$contact</td>
                </tr>";
            }
        }
    }
}


?>