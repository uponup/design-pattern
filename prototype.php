<?php
class Company {
    private $company;

    public function setName($name){
        $this->company = $name;
    }

    public function getName() {
        return $this->company;
    }
}

class Resume {
    private $name;
    private $sex;
    private $age;
    private $timeArea;
    private $company;

    function __construct($name)
    {
        $this->name = $name;
        $this->company = new Company();
    }

    public function setPersonalInfo($sex, $age) {
        $this->sex = $sex;
        $this->age = $age;
    }

    public function setWorkExperience($timeArea, $company) {
        $this->company->setName($company);
        $this->timeArea = $timeArea;
    }

    public function display() {
        echo $this->name." ".$this->sex." ".$this->age."\n";
        echo $this->timeArea." ".$this->company->getName()."\n";
    }

    // 克隆的时候，对引用进行深复制
    public function __clone()
    {
        $this->company = clone $this->company;
    }
}

$resume = new Resume('Bob');
$resume->setPersonalInfo('男', 29);
$resume->setWorkExperience('1998-2020', 'xxx 公司');
$resume->display();


$resume2 = clone $resume;
$resume2->setPersonalInfo('男', 30);
$resume2->setWorkExperience('2020-2021', '小牛互联科技有限公司');
$resume2->display();

