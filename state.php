<?php

interface State
{
    function doAction(Context $context);
}

class Context
{
    private $state;

    public function __construct()
    {
        $state = null;
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}

class StartState implements State
{
    function doAction(Context $context)
    {
        $context->setState($this);
    }

    function toString()
    {
        return 'Start State';
    }
}

class StopState implements State
{
    function doAction(Context $context)
    {
        $context->setState($this);
    }

    function toString()
    {
        return 'Stop State';
    }

    function speak()
    {
        return 'speak method';
    }
}

$context = new Context();

$state = new StartState();
$state->doAction($context);
$str = $context->getState()->toString();
echo "$str" . PHP_EOL;


$state = new StopState();
$state->doAction($context);
$str = $context->getState()->speak();
echo $str;