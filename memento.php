<?php

class Memento {
    private $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }
}

class Originator {
    private $state;

    public function setState($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    public function saveStateToMemento(): Memento {
        return new Memento($this->state);
    }

    public function getStateFromMemento(Memento $memento) {
        $this->state = $memento->getState();
    }
}

class CareTaker {
    private $mementoList = [];

    public function add(Memento $memento) {
        array_push($this->mementoList, $memento);
    }

    public function get(int $index) {
        return $this->mementoList[$index];
    }
}

$originator = new Originator();
$originator->setState("State #1");
$originator->setState("State #2");

$care = new CareTaker();
$care->add($originator->saveStateToMemento());
$originator->setState("State #3");
$care->add($originator->saveStateToMemento());
$originator->setState("State #4");

echo "Current state: " . $originator->getState() . PHP_EOL;
$originator->getStateFromMemento($care->get(0));
echo "First state: " . $originator->getState() . PHP_EOL;

$originator->getStateFromMemento($care->get(1));
echo "Second state: " . $originator->getState() . PHP_EOL;


