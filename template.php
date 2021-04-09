<?php

abstract class Game {
    abstract function initialize();
    abstract function startPlay();
    abstract function endPlay();

    public function play() {
        $this->initialize();
        $this->startPlay();
        $this->endPlay();
    }
}

class Football extends Game {
    function initialize() {
        echo 'Football 初始化' . PHP_EOL;
    }

    function startPlay()
    {
        echo '开始踢足球' . PHP_EOL;
    }

    function endPlay()
    {
        echo '结束踢足球' . PHP_EOL;
    }
}

class Criket extends Game {
    function initialize() {
        echo 'Criket 初始化' . PHP_EOL;
    }

    function startPlay()
    {
        echo '开始玩板球' . PHP_EOL;
    }

    function endPlay()
    {
        echo '结束玩板球' . PHP_EOL;
    }
}


$game = new Football();
$game->play();

$game = new Criket();
$game->play();
