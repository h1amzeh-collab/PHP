<!-- ### **Stage 5: Polymorphism (Flexibility)**

The Hospital Manager needs to check the work of all staff members at once.

- **Task:** Create a class `HospitalManager`.
- **Method:** `checkWork(Staff $staffMember)`.
- **Logic:** This method should accept any object that is a "Staff" and call its `performDuty()` method.
- **Execution:** Create an array containing 2 Doctors and 2 Nurses, loop through them, and pass each one to `checkWork()`. -->
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
    abstract public function performDuty();

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
class HospitalManager{
    public function checkWork(Staff $staffMember){
        echo $staffMember->performDuty(); //Polymorphism
    }
}
$hospitalManager = new HospitalManager();
$array = [
          new Doctor("mohammedDOCTOR", 101, 5000,"DR"), 
          new Doctor("KhaledDOCTOR", 101, 5000,"DR"),
          new Nurse("mohammedNURSE", 200, 1000,"NR"), 
          new Nurse("KhaledNURSE", 200, 1000,"NR"),
];
foreach ($array as $object){
   $hospitalManager->checkWork($object) ."<br>";
}

/**
     * PROTECTED: Accessible within this class and its children (Doctor, Nurse).
     * Used for $id because sub-classes need to identify themselves.
     */
    // protected $id;

    /**
     * PRIVATE: Strictly accessible ONLY within this class.
     * Used for $salary to encapsulate sensitive financial data, 
     * preventing children or external code from direct access/modification.
     */
    // private $salary;
?>