<?php

class SchoolGirl {
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

interface GiveGift {
    public function GiveDolls();
    public function GiveFlowers();
    public function GiveChocolate();
}

class Pursuit implements GiveGift {
    protected $girl;

    public function __construct(SchoolGirl $girl)
    {
        $this->girl = $girl;
    }

    public function GiveDolls() {
        echo $this->girl->getName() . "送你布偶" . PHP_EOL;
    }

    public function GiveFlowers() {
        echo $this->girl->getName() . "送你花花" . PHP_EOL;
    }

    public function GiveChocolate() {
        echo $this->girl->getName() . "送你巧克力" . PHP_EOL;
    }
}

class Proxy implements GiveGift {
    protected $pursuit;

    public function __construct(SchoolGirl $girl)
    {
        $this->pursuit = new Pursuit($girl);
    }

    public function GiveDolls() {
        $this->pursuit->GiveDolls();
    }

    public function GiveFlowers() {
        $this->pursuit->GiveFlowers();
    }

    public function GiveChocolate() {
        $this->pursuit->GiveChocolate();
    }
}

$girl = new SchoolGirl('Kiki');
$proxy = new Proxy($girl);
$proxy->GiveDolls();
$proxy->GiveFlowers();
$proxy->GiveChocolate();
