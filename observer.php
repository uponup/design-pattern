<?php

/**
 * 创建Subject类
 */
class Subject
{
    private $observers = [];
    private $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        $this->notifyAllObservers();
    }

    public function attach(Observer $ob)
    {
        array_push($this->observers, $ob);
    }

    public function notifyAllObservers()
    {
        foreach ($this->observers as $ob) {
            $ob->update();
        }
    }
}

/**
 * 观察者的抽象实现
 */

abstract class Observer
{
    protected $subject;
    public abstract function update();
}

/**
 * 创建实体观察者类
 */
class BinaryObserver extends Observer {
    public function __construct(Subject $sub)
    {
        $this->subject = $sub;
    }

    public function update()
    {
        $state = decbin($this->subject->getState());
        echo "Binary String: $state" . PHP_EOL;
    }
}

class OctalObserver extends Observer {
    public function __construct(Subject $sub)
    {
        $this->subject = $sub;
    }

    public function update()
    {
        $state = $this->subject->getState();
        echo "Octal String: $state" . PHP_EOL;
    }
}

class HexaObserver extends Observer {
    public function __construct(Subject $sub)
    {
        $this->subject = $sub;
    }
    
    public function update()
    {
        $state = dechex($this->subject->getState());
        echo "Hexa String: $state" . PHP_EOL;
    }
}

$subject = new Subject();

$subject->attach(new HexaObserver($subject));
$subject->attach(new OctalObserver($subject));
$subject->attach(new BinaryObserver($subject));

$subject->setState(17);
