<!--@Author Batac, Jecelito V.
    Date Created: July 7, 2021
    Description: Constructor classes-->
<?php
    class employeeAccounts{
        private $empUsername;
        private $empPassword;
        private $empAccountId;
        private $empAccountType;
        private $empPicture;


        public function __construct($empUser, $empPass, $empAccId, $empAccType, $empPic)
        {
            $this->empUsername = $empUser;
            $this->empPassword = $empPass;
            $this->empAccountId = $empAccId;
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

        public function getEmpAccountId()
        {
            return $this->empAccountId;
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





