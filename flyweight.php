<?php

interface Shape
{
    public function draw();
}

class Circle implements Shape
{
    private string $color;
    private int $x;
    private int $y;
    private int $radius;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function setX(int $x)
    {
        $this->x = $x;
    }

    public function setY(int $y)
    {
        $this->y = $y;
    }

    public function setRadius(int $radius)
    {
        $this->radius = $radius;
    }

    public function draw()
    {
        echo "Circle: Draw() [Color : $this->color, x: $this->x, y: $this->y, radius: $this->radius" . PHP_EOL;
    }
}

class ShapeFactory
{
    private static $circleMap = [];

    public static function getCircle(string $color): Circle
    {
        if (array_key_exists($color, self::$circleMap)) {
            return self::$circleMap[$color];
        } else {
            $circle = new Circle($color);
            self::$circleMap[$color] = $circle;
            echo "Creating circle, color: $color" . PHP_EOL;
            return $circle;
        }
    }
}

function getRadomRadius()
{
    return rand(10, 100);
}

function getRadomX()
{
    return rand(0, 10);
}

function getRadomY()
{
    return rand(0, 20);
}

function getRadomColor()
{
    $colors = ['Red', 'Green', 'Blue', 'White', 'Black'];
    return $colors[rand(0,4)];
}


for ($i = 0; $i < 20; $i++) {
    $color = getRadomColor();
    $circle = ShapeFactory::getCircle($color);

    $radius = getRadomRadius();
    $x = getRadomX();
    $y = getRadomY();

    $circle->setX($x);
    $circle->setY($y);
    $circle->setRadius($radius);
    $circle->draw();
}