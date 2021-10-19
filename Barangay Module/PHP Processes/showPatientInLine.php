<?php
require_once '../require/getPatientDetails.php';
require_once '../require/getPatient.php';


foreach ($patient_details as $pd) {
    if ($pd->getBrgy() == 'San Luis Village') {
        $id = $pd->getPatientDeetPatId();
        foreach ($patients as $p) {
            if($p->getPatientId() == $id and $p->getForQueue() == 1) {
                $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
                $contact = $pd->getContact();
                $category = $pd->getPriorityGroup();
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