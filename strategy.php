<?php

abstract class Strategy {
    abstract public function AlgorithmInterface();
}

/**
 * 算法a
 */
class ConcreteStrategyA extends Strategy {
    public function AlgorithmInterface() {
        echo '算法a实现\n';
    }
}

/**
 * 算法b
 */
class ConcreteStrategyB extends Strategy {
    public function AlgorithmInterface() {
        echo '算法b实现\n';
    }
}

/**
 * 算法c
 */
class ConcreteStrategyC extends Strategy {
    public function AlgorithmInterface()
    {
        echo '算法c实现\n';
    }
}

class Context {
    private $stategy;

    function __construct($stategy)
    {
        $this->strategy = $stategy;
    }

    public function contextInterface() {
        return $this->strategy->AlgorithmInterface();
    }
}

$context = new Context(new ConcreteStrategyA());
$context->contextInterface();

$context = new Context(new ConcreteStrategyB());
$context->contextInterface();

$context = new Context(new ConcreteStrategyC());
$context->contextInterface();
