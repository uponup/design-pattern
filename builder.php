<?php

/**
 * 食物item的接口
 */
interface Item {
    public function name(): string;
    public function packing(): Packing;
    public function cost(): float;
}

interface Packing {
    public function pack(): string;
}

class Wrapper implements Packing {
    public function pack(): string
    {
        return "Wrapper";
    }
}

class Bottle implements Packing {
    public function pack(): string
    {
        return "Bottle";
    }
}


/**
 * 食物item的抽象实现
 */
abstract class Burger implements Item {
    public function packing(): Packing
    {
        return new Wrapper();
    }
}

abstract class ColdDrink implements Item {
    public function packing(): Packing
    {
        return new Bottle();
    }
}

/**
 * 食物的具体类
 */
class VegBurger extends Burger {
    public function name(): string
    {
        return "Veg Burger";
    }

    public function cost(): float
    {
        return 25.0;
    }
}

class ChickenBurger extends Burger {
    public function name(): string
    {
        return "Chicken Burger";
    }

    public function cost(): float
    {
        return 50.0;
    }
}

class Coke extends ColdDrink {
    public function name(): string
    {
        return "Coke";
    }

    public function cost(): float
    {
        return 30.0;
    }
}

class Pepsi extends ColdDrink {
    public function name(): string
    {
        return "Pepsi";
    }

    public function cost(): float
    {
        return 35.0;
    }
}

/**
 * 创建Meal类，带有上面自定义的Item
 */
class Meal {
    private $items = [];

    public function addItem(Item $item) {
        array_push($this->items, $item);
    }

    public function getCost() {
        $cost = 0.0;
        foreach($this->items as $item) {
            $cost += $item->cost();
        }
        return $cost;
    }

    public function showItems() {
        foreach($this->items as $item) {
            $name = $item->name();
            $price = $item->cost();
            $package = $item->packing()->pack();

            echo "Item: $name, cost: $price, pack by: $package" . PHP_EOL;
        }
    }
}


/**
 * 创建Builder类，实际上Builder负责创建Meal对象
 */
class MealBuilder {
    public function prepareVegMeal() {
        $meal = new Meal();
        $meal->addItem(new VegBurger());
        $meal->addItem(new Coke());

        return $meal;
    }

    public function prepareNonVegMeal() {
        $meal = new Meal();
        $meal->addItem(new ChickenBurger());
        $meal->addItem(new Pepsi());

        return $meal;
    }
}


$builder = new MealBuilder();
$vegMeal = $builder->prepareVegMeal();
$vegMeal->showItems();
$vegMealCost = $vegMeal->getCost();
echo "VegMeal total cost: $vegMealCost" . PHP_EOL;

$novegMeal = $builder->prepareNonVegMeal();
$novegMeal->showItems();
$novegMealCost = $novegMeal->getCost();
echo "VegMeal total cost: $novegMealCost" . PHP_EOL;



// $a = [];
// array_push($a, 1);