<?php

interface DrawAPI {
    public function drawCircle($radius, $x, $y);
}

class RedCircle implements DrawAPI {
    public function drawCircle($radius, $x, $y)
    {
        echo "Draw red circle, circle center: \{$x, $y\}, radius: $radius" . PHP_EOL;
    }
}

class GreenCircle implements DrawAPI {
    public function drawCircle($radius, $x, $y)
    {
        echo "Draw green circle, circle center: \{$x, $y\}, radius: $radius" . PHP_EOL;
    }
}

abstract class Shape {
    protected DrawAPI $drawAPI;

    public function __construct(DrawAPI $drawAPI)
    {
        $this->drawAPI = $drawAPI;
    }

    public function draw() {}
}

class Circle extends Shape {
    private $x, $y, $radius;

    public function __construct($radius, $x, $y, DrawAPI $api)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->drawAPI = $api;
    }

    public function draw() {
        $this->drawAPI->drawCircle($this->radius, $this->x, $this->y);
    }
}


$shapeRed = new Circle(100, 100, 10, new RedCircle());
$shapeGreen = new Circle(100, 10, 10, new GreenCircle());

$shapeRed->draw();
$shapeGreen->draw();
