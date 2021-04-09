<?php

/**
 * 抽象接口
 */
interface Shape {
    public function draw();
}

interface Color {
    public function fill();
}

class Rectangle implements Shape {
    public function draw()
    {
        echo 'Inside Rectangle::draw() method.' . PHP_EOL;
    }
}

class Square implements Shape {
    public function draw()
    {
        echo 'Inside Square::draw() method.' . PHP_EOL;
    }
}

class Circle implements Shape {
    public function draw()
    {
        echo 'Inside Circle::draw() method' . PHP_EOL;
    }
}

class Red implements Color {
    public function fill()
    {
        echo 'Inside Red::fill() method' . PHP_EOL;
    }
}

class Green implements Color {
    public function fill()
    {
        echo 'Inside Green::fill() method' . PHP_EOL;
    }
}

class Blue implements Color {
    public function fill()
    {
        echo 'Inside Blue::fill() method' . PHP_EOL;
    }
}

/**
 * 抽象工厂的关键一步：
 * 为Shape和Color创建抽象类来获取工厂
 */
abstract class AbstractFactory {
    abstract function getColor(String $color);
    abstract function getShape(String $shape);
}

/**
 * 扩展上面抽象工厂类，创建具体的工厂类
 */
class ShapeFactory extends AbstractFactory {
    function getColor(String $color) {
        return null;
    }

    function getShape(String $shape) {
        if ($shape == null) {
            return null;
        }

        if (strtolower($shape) === 'circle') {
            return new Circle();
        }elseif (strtolower($shape) === 'rectangle'){
            return new Rectangle();
        }elseif (strtolower($shape) === 'square'){
            return new Square();
        }
        return null;
    }
}

class ColorFactory extends AbstractFactory {
    function getColor(String $color) {
        if ($color == null) {
            return null;
        }

        if (strtolower($color) === 'red') {
            return new Red();
        }elseif (strtolower($color) === 'green') {
            return new Green();
        }elseif (strtolower($color) === 'square') {
            return new Square();
        }
        return null;
    }

    function getShape(String $shape)
    {
        return null;
    }
}


/**
 * 抽象工厂方法最关键一步：创建工厂生成器
 */
class FactoryProducer {
    static function getFactory(String $choice): AbstractFactory {
        if (strtolower($choice) === 'shape') {
            return new ShapeFactory();
        }else {
            return new ColorFactory();
        }
    }
}

/**
 * 使用FactoryProducer来获取抽象工厂
 * 
 * 通过传具体的类型信息来获取实体类的对象
 */
$shapeFactory = FactoryProducer::getFactory('shape');
$colorFactory = FactoryProducer::getFactory('color');

// 获取形状为Circle的对象
$circle = $shapeFactory->getShape("circle");
$circle->draw();
// 获取形状为Rectangle的对象
$rectangle = $shapeFactory->getShape('rectangle');
$rectangle->draw();
// 获取颜色为red的对象
$red = $colorFactory->getColor('red');
$red->fill();


