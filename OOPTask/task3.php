<!-- ### **Stage 4: Interfaces (Contracts)**

Some staff members have extra responsibilities like "Emergency Response" or "Surgery."

- **Interface 1:** `SurgeonInterface` with method `performSurgery()`.
- **Interface 2:** `EmergencyInterface` with method `handleEmergency()`.
- **Requirement:**
    - The `Doctor` class should implement `SurgeonInterface`.
    - Some specific types of Nurses should implement `EmergencyInterface`. -->
<?php
interface SurgeonInterface {
    public function performSurgery();
}
interface EmergencyInterface {
    public function handleEmergency();
}
abstract class Staff
{
    public $name;
    protected $id;
    private $salary;

    public function __construct($name, $id, $salary)
    {
        $this->name = $name;
        $this->id = $id;
        $this->salary = $salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
    public function getSalary()
    {
        return $this->salary;
    }

    public function __destruct()
    {
        echo "Staff member {$this->name} record closed." . "</br>";
    }
    protected function getTaxedSalary()
    {
        return $this->salary / 10; // 10% tax
    }


}

class Doctor extends Staff implements SurgeonInterface 
{
    public $specialty;

    public function __construct($name, $id, $salary, $specialty)
    {
        parent::__construct($name, $id, $salary);
        $this->specialty = $specialty;
    }
    public function getIdProtected()
    {
        return $this->id; // Accessing protected property
    }

    public function performDuty()
    {
        return "Dr. {$this->name} is treating patients in the field of {$this->specialty}." . "</br>";
    }
    public function performSurgery(){
        echo "DOCTOR performSurgery()";
    }

}
class Nurse extends Staff
{
    public $shiftTime;

    public function __construct($name, $id, $salary, $shiftTime)
    {
        parent::__construct($name, $id, $salary);
        $this->shiftTime = $shiftTime;
    }

    public function performDuty()
    {
        return "Nurse {$this->name} is working the {$this->shiftTime} shift." . "</br>";
    }
    //    public function getIdProtected() {
    //     return $this->salary; // Not Accessing private property because it's private , only who has access is Staff class
    // }
}
class EmergencyNurse extends Nurse implements EmergencyInterface {
    public function handleEmergency() {
        echo "Nurse {$this->name} is responding to an emergency call!\n";
    }
}
?>