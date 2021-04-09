<?php

class Operation {
    protected $a = 0;
    protected $b = 0;

    public function setA($a) {
        $this->a = $a;
    }   

    public function setB($b) {
        $this->b = $b;
    }

    public function getResult() {
        $result = 0;
        return $result;
    }
}

/**
 * Add
 */
class OperationAdd extends Operation {
    public function getResult() {
        return $this->a + $this->b;
    }
}

/**
 * Multi
 */
class OperationMulti extends Operation {
    public function getResult() {
        return $this->a * $this->b;
    }
}

/**
 * Sub
 */
class OperationSub extends Operation {
    public function getResult() {
        return $this->a - $this->b;
    }
}

/**
 * Div
 */
class OperationDiv extends Operation {
    public function getResult() {
        return $this->a / $this->b;
    }
}

/**
 * Operation Factory
 */
class OperationFactory {
    public static function createOperation($operation) {
        switch($operation) {
            case '+':
                $oper = new OperationAdd();
                break;
            case '-':
                $oper = new OperationSub();
                break;
            case '*':
                $oper = new OperationMulti();
                break;
            case '/':
                $oper = new OperationDiv();
                break;
        }
        return $oper;
    }
}


$operation = OperationFactory::createOperation('+');
$operation->setA(10);
$operation->setB(2);

echo $operation->getResult() . PHP_EOL;

