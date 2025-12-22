<!-- ### **Stage 2: Abstraction & Inheritance (Blueprints & Extension)**

The hospital doesn't have "General Staff"; everyone has a role.

- **Abstract Class:** Modify `Staff` to be an `abstract class`.
- **Abstract Method:** Add `abstract public function performDuty();`.
- **Inheritance:** Create two child classes:
    1. **Doctor:** Adds a property `$specialty`.
    2. **Nurse:** Adds a property `$shiftTime` (Morning/Night).
- **Requirement:** Each child class must implement `performDuty()` with a unique message. -->

<!-- ### **Stage 3: Encapsulation & Logic (Public, Protected, Private)**

- In the `Doctor` class, try to access the `$id` (protected) directly.
- In the `Nurse` class, try to access the `$salary` (private) directly and observe the error.
- **Task:** Implement a method `getTaxedSalary()` inside the `Staff` class that calculates a 10% tax. This method should be usable by all child classes -->

<?php
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

class Doctor extends Staff
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

$employeeD = new Doctor("mohammed", 101, 5000,"DR");
$employeeN = new Nurse("sammer", 101, 6000,"8");
echo $employeeD->getSalary() . "</br>";
echo $employeeN->getSalary() . "</br>";
?>