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
    private $firstDosageDate;
    private $secondDosageDate;
    private $firstDosage;
    private $secondDosage;
    private $queueNumber;
    private $notification;
    private $firstDoseVaccinator;
    private $secondDoseVaccinator;

    public function __construct($patId, $patFullName, $firstDate, $secondDate, $firstDosage, $secondDosage, $queue, $notif, $firstVaccinator, $secondVaccinator)
    {
        $this->patientId = $patId;
        $this->patientFullName = $patFullName;
        $this->firstDosageDate = $firstDate;
        $this->secondDosageDate = $secondDate;
        $this->firstDosage = $firstDosage;
        $this->secondDosage = $secondDosage;
        $this->queueNumber = $queue;
        $this->notification = $notif;
        $this->firstDoseVaccinator = $firstVaccinator;
        $this->secondDoseVaccinator = $secondVaccinator;
    }


    public function getPatientFullName()
    {
    return $this->patientFullName;
    }

    public function getFirstDosageDate() {
        return $this->firstDosageDate;
    }

    public function getSecondDosageDate() {
        return $this->secondDosageDate;
    }

    public function getFirstDosage() {
        return $this->firstDosage;
    }

    public function getSecondDosage() {
        return $this->secondDosage;
    }

    public function getQueueNumber() {
        return $this->queueNumber;
    }

    public function getNotification() {
        return $this->notification;
    }

    public function getFirstDoseVaccinator() {
        return $this->firstDoseVaccinator;
    }

    public function getSecondDoseVaccinator() {
        return $this->secondDoseVaccinator;
    }

    public function getPatientId() {
        return $this->patientId;
    }
}
?>

<?php
class patientDetails{
    private $patientDeetPatId;
    private $patientFName;
    private $patientLName;
    private $patientMName;
    private $patientSuffix;
    private $priorityGroup;
    private $categoryId;
    private $categoryNum;
    private $houseAdd;
    private $brgy;
    private $city;
    private $province;
    private $region;
    private $birthdate;
    private $age;
    private $gender;
    private $contact;
    private $occupation;


    public function __construct($patientDetailPatientId, $patFirstName, $patLastName, $patMiddleName,$patientSuffix, $priorityGroup, $categoryId, $categoryNumber, $houseAddress, $barangay, $city, $province, $region, $birthdate, $age, $gender, $contact, $occupation)
    {
        $this->patientDeetPatId = $patientDetailPatientId;
        $this->patientFName = $patFirstName;
        $this->patientLName = $patLastName;
        $this->patientMName = $patMiddleName;
        $this->patientSuffix = $patientSuffix;
        $this->priorityGroup = $priorityGroup;
        $this->categoryId = $categoryId;
        $this->categoryNum = $categoryNumber;
        $this->houseAdd = $houseAddress;
        $this->brgy = $barangay;
        $this->city = $city;
        $this->province = $province;
        $this->region = $region;
        $this->birthdate = $birthdate;
        $this->age = $age;
        $this->gender = $gender;
        $this->contact = $contact;
        $this->occupation = $occupation;
    }

    public function getPatientDeetPatId()
    {
        return $this->patientDeetPatId;
    }

    public function getPatientFName()
    {
        return $this->patientFName;
    }

    public function getPatientLName()
    {
        return $this->patientLName;
    }

    public function getPatientMName()
    {
        return $this->patientMName;
    }

    public function getPatientSuffix()
    {
        return $this->patientSuffix;
    }

    public function getPriorityGroup()
    {
        return $this->priorityGroup;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getCategoryNum()
    {
        return $this->categoryNum;
    }

    public function getHouseAdd()
    {
        return $this->houseAdd;
    }

    public function getBrgy()
    {
        return $this->brgy;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getOccupation()
    {
        return $this->occupation;
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
    private $dateVaccStored;
    private $source;

    public function __construct($vaccineLotId, $vaccineLotVaccineId, $vaccineEmployeeAccId, $vaccineBatchQty, $dateVaccineStored, $source)
    {
        $this->vaccLotId = $vaccineLotId;
        $this->vaccLotVaccId = $vaccineLotVaccineId;
        $this->vaccEmpAccId = $vaccineEmployeeAccId;
        $this->vaccBatchQty = $vaccineBatchQty;
        $this->dateVaccStored = $dateVaccineStored;
        $this->source = $source;
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

    public function getDateVaccStored()
    {
        return $this->dateVaccStored;
    }

    public function getSource()
    {
        return $this->source;
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
    private $dateManu;
    private $dateExp;

    public function __construct($vaccineBatchId, $vaccineBatchLotId, $vaccineBatchVaccineId, $vaccineQuantity, $dateManufactured, $dateOfExpiration)
    {
        $this->vaccBatchId = $vaccineBatchId;
        $this->vaccBatchLotId = $vaccineBatchLotId;
        $this->vaccBatchVaccId = $vaccineBatchVaccineId;
        $this->vaccQty = $vaccineQuantity;
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

<?php

class vaccinationDrive
{
    private $driveId;
    private $vaccDriveVaccSiteId;
    private $vaccDate;
    private $vaccStubs;
    private $priorityGroup;

    public function __construct($driveId, $siteId, $vaccinationDate, $vaccinationStubs, $group)
    {
        $this->driveId = $driveId;
        $this->vaccDriveVaccSiteId = $siteId;
        $this->vaccDate= $vaccinationDate;
        $this->vaccStubs = $vaccinationStubs;
        $this->priorityGroup = $group;

    }

    public function getDriveId()
    {
        return $this->driveId;
    }

    public function getVaccDriveVaccSiteId()
    {
        return $this->vaccDriveVaccSiteId;
    }

    public function getVaccDate()
    {
        return $this->vaccDate;
    }

    public function getVaccStubs()
    {
        return $this->vaccStubs;
    }

    public function getPriorityGroup()
    {
        return $this->priorityGroup;
    }
}

?>

<?php
class vaccineDeployment
{
    private $deploymentDriveId;
    private $deploymentVaccId;


    public function __construct($deploymentDriveId, $deploymentVaccineId)
    {
        $this->deploymentDriveId = $deploymentDriveId;
        $this->deploymentVaccId = $deploymentVaccineId;


    }

    public function getDeploymentDriveId()
    {
        return $this->deploymentDriveId;
    }

    public function getDeploymentVaccId()
    {
        return $this->deploymentVaccId;
    }
}

?>

<?php
class healthDistrict
{
    private $healthDistrictId;
    private $healthDistrictName;
    private $contact;


    public function __construct($healthDistId, $healthDistName, $number)
    {
        $this->healthDistrictId = $healthDistId;
        $this->healthDistrictName = $healthDistName;
        $this->contact = $number;

    }

    public function getHealthDistrictId()
    {
        return $this->healthDistrictId;
    }

    public function getHealthDistrictName()
    {
        return $this->healthDistrictName;
    }

    public function getContact()
    {
        return $this->contact;
    }
}

?>

<?php
class patientDrive
{
    private $patientDrivePatientId;
    private $patientDriveDriveId;
    private $patientDriveBatchId;

    public function __construct($patient, $drive, $batch)
    {
        $this->patientDrivePatientId = $patient;
        $this->patientDriveDriveId = $drive;
        $this->patientDriveBatchId = $batch;

    }

    public function getPatientDrivePatientId()
    {
        return $this->patientDrivePatientId;
    }

    public function getPatientDriveDriveId()
    {
        return $this->patientDriveDriveId;
    }

    public function getPatientDriveBatchId()
    {
        return $this->patientDriveBatchId;
    }

}

?>



<?php
class barangay
{
    private $barangayId;
    private $barangayHealthDistrictId;
    private $barangayName;

    public function __construct($barangayId, $healthDistId, $name)
    {
        $this->barangayId = $barangayId;
        $this->barangayHealthDistrictId = $healthDistId;
        $this->barangayName = $name;

    }

    public function getBarangayId()
    {
        return $this->barangayId;
    }

    public function getBarangayHealthDistrictId()
    {
        return $this->barangayHealthDistrictId;
    }

    public function getBarangayName()
    {
        return $this->barangayName;
    }
}
?>

<?php
class vaccineSite
{
    private $vaccinationSiteId;
    private $vaccinationSiteLocation;

    public function __construct($vaccSiteId, $vaccSiteLocation)
    {
        $this->vaccinationSiteId = $vaccSiteId;
        $this->vaccinationSiteLocation = $vaccSiteLocation;
    }

    public function getVaccinationSiteId()
    {
        return $this->vaccinationSiteId;
    }

    public function getVaccinationSiteLocation()
    {
        return $this->vaccinationSiteLocation;
    }
}
?>


<?php

class healthDistrictDrive
{
    private $driveId;
    private $districtId;

    public function __construct($bDriveId, $bDistrictId)
    {
        $this->driveId = $bDriveId;
        $this->districtId = $bDistrictId;

    }

    public function getDriveId()
    {
        return $this->driveId;
    }

    public function getDistrictId()
    {
        return $this->districtId;
    }
}
?>




