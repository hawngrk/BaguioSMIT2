<?php
                require_once '../require/getPatientDetails.php';
               
                foreach ($patient_details as $pd) {
                    $id = $pd->getPatientDeetPatId();
                    
                    $fullAddress = $pd->getHouseAdd() . ", " . $pd->getBrgy() . ", " . $pd->getCity() . ", " . $pd->getProvince();
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
                <td>$id</td>
                <td>$name</td>
                <td>$fullAddress</td>
                <td>$contact</td>
                </tr>";
                }
                
?>