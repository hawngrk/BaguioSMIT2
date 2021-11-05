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
    private $forQueue;
    private $notification;
    private $firstDoseVaccinator;
    private $secondDoseVaccinator;
    private $token;

    public function __construct($patId, $patFullName, $firstDate, $secondDate, $firstDosage, $secondDosage, $queue, $notif, $firstVaccinator, $secondVaccinator, $token)
    {
        $this->patientId = $patId;
        $this->patientFullName = $patFullName;
        $this->firstDosageDate = $firstDate;
        $this->secondDosageDate = $secondDate;
        $this->firstDosage = $firstDosage;
        $this->secondDosage = $secondDosage;
        $this->forQueue = $queue;
        $this->notification = $notif;
        $this->firstDoseVaccinator = $firstVaccinator;
        $this->secondDoseVaccinator = $secondVaccinator;
        $this->token = $token;
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

    public function getForQueue() {
        return $this->forQueue;
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

    public function getToken()
    {
        return $this->token;
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
    private $categoryId;
    private $categoryNum;
    private $philHealthID;
    private $pwdID;
    private $houseAdd;
    private $city;
    private $province;
    private $region;
    private $birthdate;
    private $age;
    private $gender;
    private $contact;
    private $occupation;
    private $archived;
    private $priorityGroupId;
    private $barangayId;



    public function __construct($patientDetailPatientId, $patFirstName, $patLastName, $patMiddleName,$patientSuffix, $categoryId, $categoryNumber, $philHealthID, $pwdID, $houseAddress, $city, $province, $region, $birthdate, $age, $gender, $contact, $occupation, $archived, $priorityGroupId, $barangayId)
    {
        $this->patientDeetPatId = $patientDetailPatientId;
        $this->patientFName = $patFirstName;
        $this->patientLName = $patLastName;
        $this->patientMName = $patMiddleName;
        $this->patientSuffix = $patientSuffix;
        $this->categoryId = $categoryId;
        $this->categoryNum = $categoryNumber;
        $this->philHealthID = $philHealthID;
        $this->pwdID = $pwdID;
        $this->houseAdd = $houseAddress;
        $this->city = $city;
        $this->province = $province;
        $this->region = $region;
        $this->birthdate = $birthdate;
        $this->age = $age;
        $this->gender = $gender;
        $this->contact = $contact;
        $this->occupation = $occupation;
        $this->archived = $archived;
        $this->priorityGroupId = $priorityGroupId;
        $this->barangayId = $barangayId;
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


    public function getCategoryId()
    {
        return $this->categoryId;
    }
    
    public function getCategoryNum()
    {
        return $this->categoryNum;
    }
    public function getPhilHealthID() 
    {
        return $this->philHealthID;
    }

    public function getPWDID() 
    {
        return $this->pwdID;
    }
    
    public function getHouseAdd()
    {
        return $this->houseAdd;
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

    public function getArchived()
    {
    return $this->archived;
    }

    public function getPriorityGroupId()
    {
        return $this->priorityGroupId;
    }

    public function getBarangayId()
    {
        return $this->barangayId;
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
    private $archived;

    public function __construct($repId, $repPatId, $repType, $repDetails, $vaccSymRep, $covSymRep,$dateLastOut, $dateRep, $repStat, $archived)
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
        $this->archived = $archived;
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

    public function getArchived()
    {
        return $this->archived;
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
    private $expiration;
    private $archived;

    public function __construct($vaccineLotId, $vaccineLotVaccineId, $vaccineEmployeeAccId, $dateVaccineStored, $source, $vaccineBatchQty, $expiration, $archived)
    {
        $this->vaccLotId = $vaccineLotId;
        $this->vaccLotVaccId = $vaccineLotVaccineId;
        $this->vaccEmpAccId = $vaccineEmployeeAccId;
        $this->vaccBatchQty = $vaccineBatchQty;
        $this->dateVaccStored = $dateVaccineStored;
        $this->source = $source;
        $this->expiration = $expiration;
        $this->archived = $archived;
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

    public function getExpiration()
    {
        return $this->expiration;
    }

    public function getArchived()
    {
        return $this->archived;
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
    private $archived;
    private $notifOpened;
    private $firstDoseStubs;
    private $secondDoseStubs;


    public function __construct($driveId, $siteId, $vaccinationDate, $archived, $notifOpened, $firstDoseStubs, $secondDoseStubs)
    {
        $this->driveId = $driveId;
        $this->vaccDriveVaccSiteId = $siteId;
        $this->vaccDate= $vaccinationDate;
        $this->archived = $archived;
        $this->notifOpened = $notifOpened;
        $this->firstDoseStubs = $firstDoseStubs;
        $this->secondDoseStubs = $secondDoseStubs;

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

    public function getArchived()
    {
        return $this->archived;
    }

    public function getNotifOpened()
    {
        return $this->notifOpened;
    }

    public function getFirstDoseStubs()
    {
        return $this->firstDoseStubs;
    }

    public function getSecondDoseStubs()
    {
        return $this->secondDoseStubs;
    }
}

?>

<?php
class vaccineDrive1
{
    private $driveId;
    private $vaccineId;


    public function __construct($driveId, $vaccineId)
    {
        $this->driveId = $driveId;
        $this->vaccineId = $vaccineId;


    }


    public function getDriveId()
    {
        return $this->driveId;
    }


    public function getVaccineId()
    {
        return $this->vaccineId;
    }
}

?>

<?php
class vaccineDrive2
{
    private $driveId;
    private $vaccineId;
    private $firstDoseDate;


    public function __construct($driveId, $vaccineId, $firstDoseDate)
    {
        $this->driveId = $driveId;
        $this->vaccineId = $vaccineId;
        $this->firstDoseDate = $firstDoseDate;

    }


    public function getDriveId()
    {
        return $this->driveId;
    }


    public function getVaccineId()
    {
        return $this->vaccineId;
    }

    public function getFirstDoseDate()
    {
        return $this->firstDoseDate;
    }
}

?>

<?php
class priorityDrive
{
    private $driveId;
    private $priorityId;


    public function __construct($driveId, $priorityId)
    {
        $this->driveId = $driveId;
        $this->priorityId = $priorityId;

    }


    public function getDriveId()
    {
        return $this->driveId;
    }

    public function getPriorityId()
    {
        return $this->priorityId;
    }
}

?>

<?php
class priorityGroup
{
    private $priorityGroupId;
    private $priorityGroup;


    public function __construct($priorityGroupId, $priorityGroup)
    {
        $this->priorityGroupId = $priorityGroupId;
        $this->priorityGroup = $priorityGroup;

    }

    public function getPriorityGroupId()
    {
        return $this->priorityGroupId;
    }

    public function getPriorityGroup()
    {
        return $this->priorityGroup;
    }
}

?>

<?php
class healthDistrict
{
    private $healthDistrictId;
    private $healthDistrictName;
    private $contact;
    private $archived;


    public function __construct($healthDistId, $healthDistName, $number, $archived)
    {
        $this->healthDistrictId = $healthDistId;
        $this->healthDistrictName = $healthDistName;
        $this->contact = $number;
        $this->archived = $archived;
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

    public function getArchived()
    {
        return $this->archived;
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
    private $city;
    private $province;
    private $region;


    public function __construct($barangayId, $healthDistId, $name, $city, $prov, $region)
    {
        $this->barangayId = $barangayId;
        $this->barangayHealthDistrictId = $healthDistId;
        $this->barangayName = $name;
        $this->city = $city;
        $this->province = $prov;
        $this->region = $region;

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

class activityLogs
{
    private $logId;
    private $logEntryDate;
    private $employeeId;
    private $employeeRole;
    private $logType;
    private $logDescription;

    public function __construct($logId, $logEntryDate, $employeeId, $employeeRole, $logType, $logDescription)
    {
        $this->logId = $logId;
        $this->logEntryDate = $logEntryDate;
        $this->employeeId = $employeeId;
        $this->employeeRole = $employeeRole;
        $this->logType = $logType;
        $this->logDescription = $logDescription;
    }

    public function getLogId()
    {
        return $this->logId;
    }

    public function getLogEntryDate()
    {
        return $this->logEntryDate;
    }

    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    public function getEmployeeRole()
    {
        return $this->employeeRole;
    }

    public function getLogType()
    {
        return $this->logType;
    }

    public function getLogDescription()
    {
        return $this->logDescription;
    }
}
?>