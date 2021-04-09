<?php

/**
 * 「计算机part」接口，让实例有了接收访问者的能力
 */
interface ComputerPart {
    public function accept(ComputerPartVistior $visitor);
}

/**
 * Computer的具体part
 */
class Keyboard implements ComputerPart {
    public function accept(ComputerPartVistior $visitor)
    {
        $visitor->visitKeyboard($this);
    }
}

class Monitor implements ComputerPart {
    public function accept(ComputerPartVistior $visitor) {
        $visitor->visitMonitor($this);
    }
}

class Mouse implements ComputerPart {
    public function accept(ComputerPartVistior $visitor) {
        $visitor->visitMouse($this);
    }
}

class Computer implements ComputerPart {
    public function accept(ComputerPartVistior $visitor) {
        $visitor->visitComputer($this);
    }
}

/**
 * 访问者接口
 */
interface ComputerPartVistior {
    public function visitKeyboard(Keyboard $k);
    public function visitMonitor(Monitor $m);
    public function visitMouse(Mouse $m);
    public function visitComputer(Computer $c);
}

class ComputerPartDisplayVisitor implements ComputerPartVistior {
    public function visitKeyboard(Keyboard $k) {
        echo "Displaying Keyboard." . PHP_EOL;
    }

    public function visitMonitor(Monitor $m) {
        echo "Displaying Monitor." . PHP_EOL;
    }

    public function visitMouse(Mouse $m) {
        echo "Displaying Mouse." . PHP_EOL;
    }

    public function visitComputer(Computer $c) {
        echo "Displaying Computer." . PHP_EOL;
    }
}

$computer = new Computer();
$computer->accept(new ComputerPartDisplayVisitor());
