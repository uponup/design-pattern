<?php

abstract class Component {
    abstract public function operation();
}

/**
 * ConcreteComponent
 */

class ConcreteComponent extends Component {
    public function operation()
    {
        echo '======具体对象的操作======' . PHP_EOL;
    }
}

/**
 * 装饰器
 */
abstract class Decorator extends Component {
    protected $component;

    public function setComponent($c) {
        $this->component = $c;
    }

    public function operation() {
        if ($this->component != null) {
            $this->component->operation();
        }
    }
}

/**
 * 装饰器类A
 */
class ConcreteDecoratorA extends Decorator {
    private $addedState;

    public function operation() {
        parent::operation();
        $this->addedState = 'ConcreteDecoratorA status';
        echo $this->addedState . PHP_EOL;
        echo "=====具体修饰类A的操作=====" . PHP_EOL;
    }
}

class ConcreteDecoratorB extends Decorator {
    private function addBehavior() {
        echo 'ConcreteDecoratorB status' . PHP_EOL;
    }

    public function operation() {
        parent::operation();
        $this->addBehavior();
        echo "=====具体修饰类B的操作=====" . PHP_EOL;
    }
}

$c = new ConcreteComponent();
$d1 = new ConcreteDecoratorA();
$d2 = new ConcreteDecoratorB();

$d1->setComponent($c);
$d2->setComponent($d1);

$d2->operation();
