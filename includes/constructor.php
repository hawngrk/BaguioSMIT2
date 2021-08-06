<!--@Author Batac, Jecelito V.
    Date Created: July 7, 2021
    Description: Constructor classes-->
<?php
    class employeeAccounts{
        private $empUsername;
        private $empPassword;
        private $empAccountType;
        private $empPicture;


        public function __construct($empUser, $empPass, $empAccType, $empPic)
        {
            $this->empUsername = $empUser;
            $this->empPassword = $empPass;
            $this->empAccountType = $empAccType;
            $this->empPicture = "data:image;base64," . base64_encode($empPic);
        }

        public function getEmpPassword()
        {
            return $this->empPassword;
        }

        public function getEmpUsername()
        {
            return $this->empUsername;
        }

        public function getEmpAccountType()
        {
            return $this->empAccountType;
        }
    }

    ?>

<?php
class patientAccounts{
    private $patUsername;
    private $patEmail;
    private $patPassword;
    private $patAccountId;
    private $patPicture;

    public function __construct($patUser, $patPass, $patAccId, $email, $patPic)
    {
        $this->patUsername = $patUser;
        $this->patPassword = $patPass;
        $this->patEmail = $email;
        $this->patAccountId = $patAccId;
        $this->patPicture = "data:image;base64," . base64_encode($patPic);
    }

    public function getPatUsername()
    {
        return $this->patUsername;
    }

    public function getPatPassword()
    {
        return $this->patPassword;
    }

    public function getPatEmail()
    {
        return $this->patEmail;
    }

    public function getPatAccountId()
    {
        return $this->patAccountId;
    }

    public function getPatPicture()
    {
        return $this->patPicture;
    }
}

?>

<?php

class employeeInfo{
    private $employeeId;
    private $employeeLastName;
    private $employeeFirstName;
    private $employeeMiddleName;
    private $employeeSuffix;
    private $employeeRole;
    private $employeeContact;

    public function __construct($empId, $empLast, $empFirst, $empMiddle, $empSuffix, $empRole, $empNumber)
    {
        $this->employeeId = $empId;
        $this->employeeLastName = $empLast;
        $this->employeeFirstName = $empFirst;
        $this->employeeMiddleName = $empMiddle;
        $this->employeeSuffix = $empSuffix;
        $this->employeeRole = $empRole;
        $this->employeeContact = $empNumber;
    }

    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    public function getEmployeeLastName()
    {
        return $this->employeeLastName;
    }

    public function getEmployeeFirstName()
    {
        return $this->employeeFirstName;
    }

    public function getEmployeeMiddleName()
    {
        return $this->employeeMiddleName;
    }

    public function getEmployeeContact()
    {
        return $this->employeeContact;
    }

    public function getEmployeeRole()
    {
        return $this->employeeRole;
    }

    public function getEmployeeSuffix()
    {
        return $this->employeeSuffix;
    }
}
?>

<?php
class patientInfo{
    private $patientId;
    private $patientFullName;
    private $firstDosage;
    private $secondDosage;
    private $vaccinationStatus;

    public function __construct($patId, $patFullName, $first, $second, $status)
    {
        $this->patientId = $patId;
        $this->patientFullName = $patFullName;
        $this->firstDosage = $first;
        $this->secondDosage = $second;
        $this->vaccinationStatus = $status;
    }


    public function getPatientFullName()
    {
    return $this->patientFullName;
    }

    public function getFirstDosage()
    {
        return $this->firstDosage;
    }

    public function getSecondDosage()
    {
        return $this->secondDosage;
    }

    public function getVaccinationStatus()
    {
        return $this->vaccinationStatus;
    }

    public function getPatientId()
    {
        return $this->patientId;
    }
}
?>

<?php

class reports{
    private $reportId;
    private $reportPatientId;
    private $reportType;
    private $reportDetails;
    private $vaccineSymptomsReported;
    private $covid19SymptomsReported;
    private $lastOut;
    private $dateReported;
    private $reportStatus;

    public function __construct($repId, $repPatId, $repType, $repDetails, $vaccSymRep, $covSymRep,$dateLastOut, $dateRep, $repStat)
    {
        $this->reportId = $repId;
        $this->reportPatientId = $repPatId;
        $this->reportType = $repType;
        $this->reportDetails = $repDetails;
        $this->vaccineSymptomsReported = $vaccSymRep;
        $this->covid19SymptomsReported = $covSymRep;
        $this->lastOut = $dateLastOut;
        $this->dateReported = $dateRep;
        $this->reportStatus = $repStat;
    }

    public function getReportId()
    {
        return $this->reportId;
    }

    public function getReportPatientId()
    {
        return $this->reportPatientId;
    }

    public function getReportType()
    {
        return $this->reportType;
    }

    public function getReportDetails()
    {
        return $this->reportDetails;
    }

    public function getCovid19SymptomsReported()
    {
        return $this->covid19SymptomsReported;
    }

    public function getDateReported()
    {
        return $this->dateReported;
    }

    public function getReportStatus()
    {
        return $this->reportStatus;
    }

    public function getVaccineSymptomsReported()
    {
        return $this->vaccineSymptomsReported;
    }

    public function getLastOut()
    {
        return $this->lastOut;
    }
}
?>

<?php


class vaccine
{
    private $vaccId;
    private $vaccName;
    private $vaccType;
    private $vaccEfficacy;
    private $vaccLifeSpan;

    public function __construct($vaccineId, $vaccineName, $vaccineType, $vaccineEfficacy, $vaccineLifeSpan)
    {
        $this->vaccId = $vaccineId;
        $this->vaccName = $vaccineName;
        $this->vaccType = $vaccineType;
        $this->vaccEfficacy = $vaccineEfficacy;
        $this->vaccLifeSpan = $vaccineLifeSpan;
    }

    public function getVaccId()
    {
        return $this->vaccId;
    }

    public function getVaccName()
    {
        return $this->vaccName;
    }

    public function getVaccType()
    {
        return $this->vaccType;
    }

    public function getVaccEfficacy()
    {
        return $this->vaccEfficacy;
    }

    public function getVaccLifeSpan()
    {
        return $this->vaccLifeSpan;
    }
}

?>

<?php
class vaccineLot
{
    private $vaccLotId;
    private $vaccLotVaccId;
    private $vaccEmpAccId;
    private $vaccBatchQty;
    private $dateVaccAdded;

    public function __construct($vaccineLotId, $vaccineLotVaccineId, $vaccineEmployeeAccId, $vaccineBatchQty, $dateVaccineAdded)
    {
        $this->vaccLotId = $vaccineLotId;
        $this->vaccLotVaccId = $vaccineLotVaccineId;
        $this->vaccEmpAccId = $vaccineEmployeeAccId;
        $this->vaccBatchQty = $vaccineBatchQty;
        $this->dateVaccAdded = $dateVaccineAdded;
    }


    public function getVaccLotId()
    {
        return $this->vaccLotId;
    }

    public function getVaccLotVaccId()
    {
        return $this->vaccLotVaccId;
    }

    public function getVaccEmpAccId()
    {
        return $this->vaccEmpAccId;
    }

    public function getVaccBatchQty()
    {
        return $this->vaccBatchQty;
    }

    public function getDateVaccAdded()
    {
        return $this->dateVaccAdded;
    }
}
?>

<?php

class vaccineBatch
{
    private $vaccBatchId;
    private $vaccBatchLotId;
    private $vaccBatchVaccId;
    private $vaccQty;
    private $dateStored;
    private $dateManu;
    private $dateExp;

    public function __construct($vaccineBatchId, $vaccineBatchLotId, $vaccineBatchVaccineId, $vaccineQuantity, $dateStored, $dateManufactured, $dateOfExpiration)
    {
        $this->vaccBatchId = $vaccineBatchId;
        $this->vaccBatchLotId = $vaccineBatchLotId;
        $this->vaccBatchVaccId = $vaccineBatchVaccineId;
        $this->vaccQty = $vaccineQuantity;
        $this->dateStored = $dateStored;
        $this->dateManu = $dateManufactured;
        $this->dateExp = $dateOfExpiration;
    }

    public function getVaccBatchId()
    {
        return $this->vaccBatchId;
    }

    public function getVaccBatchLotId()
    {
        return $this->vaccBatchLotId;
    }

    public function getVaccBatchVaccId()
    {
        return $this->vaccBatchVaccId;
    }

    public function getDateStored()
    {
        return $this->dateStored;
    }

    public function getDateManu()
    {
        return $this->dateManu;
    }

    public function getVaccQty()
    {
        return $this->vaccQty;
    }

    public function getDateExp()
    {
        return $this->dateExp;
    }
}
?>










