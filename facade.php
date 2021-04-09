<?php

interface Shape {
    public function draw();
}

class Rectangle implements Shape {
    public function draw() {
        echo '画一个长方形' . PHP_EOL;
    }
}

class Square implements Shape {
    public function draw() {
        echo '画一个正方形' . PHP_EOL;
    }
}

class Circle implements Shape {
    public function draw() {
        echo '画一个圆圈圈' . PHP_EOL;
    }
}

/**
 * 创建一个外观类
 */
class ShapeMaker {
    private Shape $circle;
    private Shape $rectangle;
    private Shape $square;

    function __construct()
    {
        $this->circle = new Circle();
        $this->rectangle = new Rectangle();
        $this->square = new Square();
    }

    public function drawCircle() {
        $this->circle->draw();
    }

    public function drawRectangle() {
        $this->rectangle->draw();
    }

    public function drawSquare() {
        $this->square->draw();
    }
}


$shapeMaker = new ShapeMaker();
$shapeMaker->drawCircle();
$shapeMaker->drawRectangle();
$shapeMaker->drawSquare();