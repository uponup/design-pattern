<?php

/**
 * 命令的抽象接口
 */
interface Order {
    public function execute();
}

/**
 * 创建一个请求类
 */
class Stock {
    private $name = "ABC";
    private $quantity = 10;

    public function buy() {
        echo "Stock [Name: $this->name, Quantity: $this->quantity] bought" . PHP_EOL;
    }

    public function sell() {
        echo "Stock [Name: $this->name, Quantity: $this->quantity] sold" . PHP_EOL;
    }
}

/**
 * 命令的具体实现
 */
class BuyStock implements Order {
    private Stock $abcStock;

    function __construct(Stock $stock)
    {
        $this->abcStock = $stock;
    }

    public function execute()
    {
        $this->abcStock->buy();
    }
}

class SellStock implements Order {
    private Stock $abcStock;

    function __construct(Stock $stock)
    {
        $this->abcStock = $stock;
    }

    public function execute() {
        $this->abcStock->sell();
    }
}

/**
 * 创建调用命令类
 */
class Broker {
    private $orderList = [];
    
    public function takeOrder(Order $order) {
        array_push($this->orderList, $order);
    }

    public function placeOrder() {
        foreach($this->orderList as $order) {
            $order->execute();
        }
        $this->orderList = [];
    }
}

// 请求类
$stock = new Stock();

// 具体命令command
$buyStockOrder = new BuyStock($stock);
$sellStockOrder = new SellStock($stock);

// 命令调用类receiver
$broker = new Broker();
$broker->takeOrder($buyStockOrder);
$broker->takeOrder($sellStockOrder);

$broker->placeOrder();
