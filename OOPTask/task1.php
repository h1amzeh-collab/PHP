<!-- ### **Stage 1: The Foundation (Class, Object, Properties, Visibility)**

Create a base class `Staff`.

- **Properties:**
    - `public $name`: Name of the staff member.
    - `protected $id`: Unique ID (accessible only to children).
    - `private $salary`: Monthly salary (strictly hidden). -->

    <?php
     class Staff {
        public $name;
        protected $id;
        private $salary;

      public function __construct($name, $id, $salary) {
            $this->name = $name;
            $this->id = $id;
            $this->salary = $salary;
        }

        public function setSalary($salary) {
            $this->salary = $salary;
        }
        public function getSalary() {
            return $this->salary;
        }

        public function __destruct() {
            echo "Staff member {$this->name} record closed.\n";
        }
    }
    $employee = new Staff("Ahmed", 101, 5000);
    echo $employee->getSalary() . "\n";
    ?>