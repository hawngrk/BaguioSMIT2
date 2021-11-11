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
                $fullAddress = $pd->getHouseAdd() . ", " . $accountDetails['barangay'] . ", " . $pd->getCity() . ", " . $pd->getProvince();
                $contact = $pd->getContact();
                foreach ($priorityGroups as $priority) {
                    if ($pd->getPriorityGroupId() == $priority->getPriorityGroupId()) {
                        $category = $pd->getPriorityGroup();
                    }
                }
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

// foreach ($patient_details as $pd) {
//     echo $pd->getBarangayId();
//     if ($pd->getBarangayId() == $barangay_id) {

//         $id = $pd->getPatientDeetPatId();
//         foreach ($patients as $p) {
//             if($p->getPatientId() == $id and $p->getForQueue() == 1) {
//                 $fullAddress = $pd->getHouseAdd() . ", " . $accountDetails['barangay'] . ", " . $pd->getCity() . ", " . $pd->getProvince();
//                 $contact = $pd->getContact();
//                 foreach ($priorityGroups as $priority) {
//                     if ($pd->getPriorityGroupId() == $priority->getPriorityGroupId()) {
//                         $category = $pd->getPriorityGroup();
//                     }
//                 }
//                 if ($pd->getPatientMName() == null && $pd->getPatientSuffix() == null) {
//                     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName();
//                 } else if ($pd->getPatientSuffix() == null) {
//                     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName();
//                 } else if ($pd->getPatientMName() == null) {
//                     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientSuffix();
//                 } else {
//                     $name = $pd->getPatientLName() . ", " . $pd->getPatientFName() . " " . $pd->getPatientMName() . " " . $pd->getPatientSuffix();
//                 }

//                 echo "<tr>
//                 <td>$name</td>
//                 <td>$contact</td>
//                 </tr>";
//             }
//         }
//     }
// }
?>