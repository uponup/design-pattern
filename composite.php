<?php

class Employee
{
    private $name;
    private $dept;
    private $salary;
    private $subordinates;

    public function __construct($name, $dept, $salary)
    {
        $this->name = $name;
        $this->dept = $dept;
        $this->salary = $salary;
        $this->subordinates = [];
    }

    public function __toString()
    {
        return "Employee: [name: $this->name, dept: $this->dept, salary: $this->salary]" . PHP_EOL;
    }

    public function add(Employee $employee)
    {
        array_push($this->subordinates, $employee);
    }

    public function remove(Employee $employee)
    {
        return array_merge(array_diff($this->subordinates, [$employee]));

        // $key = array_search($tmp, $arr);
        // array_splice($arr, $key, 1);
    }

    public function getSubordinates(): array {
        return $this->subordinates;
    }
}

$ceo = new Employee("Jhon", "CEO", 30000);
$headSales = new Employee("Robert", "Head Sales", 20000);
$headMarketing = new Employee("Michel", "Head Marketing", 20000);

$clerk1 = new Employee("Laura", "Marketing", 10000);
$clerk2 = new Employee("Bob", "Marketing", 10000);

$saleExecutive1 = new Employee("Richard", "Sales", 10000);
$saleExecutive2 = new Employee("Rob", "Sales", 10000);

$ceo->add($headSales);
$ceo->add($headMarketing);

$headSales->add($saleExecutive1);
$headSales->add($saleExecutive2);

$headMarketing->add($clerk1);
$headMarketing->add($clerk2);


foreach($ceo->getSubordinates() as $e_group) {
    echo $e_group;
    foreach($e_group->getSubordinates() as $e) {
        echo $e;
    }
}

