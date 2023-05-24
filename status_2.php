<?php

// 抽象状态类
abstract class OrderState {
    protected $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    abstract public function ship();
    abstract public function complete();
}

// 具体状态类：待发货状态
class PendingState extends OrderState {
    public function ship() {
        $this->order->setState(new ShippedState($this->order));
    }

    public function complete() {
        throw new Exception("Order is not shipped yet");
    }
}

// 具体状态类：已发货状态
class ShippedState extends OrderState {
    public function ship() {
        throw new Exception("Order is already shipped");
    }

    public function complete() {
        $this->order->setState(new CompletedState($this->order));
    }
}

// 具体状态类：已完成状态
class CompletedState extends OrderState {
    public function ship() {
        throw new Exception("Order is already completed");
    }

    public function complete() {
        throw new Exception("Order is already completed");
    }
}

// 订单类
class Order {
    private $state;

    public function __construct() {
        $this->state = new PendingState($this);
    }

    public function setState(OrderState $state) {
        $this->state = $state;
    }

    public function ship() {
        $this->state->ship();
    }

    public function complete() {
        $this->state->complete();
    }
}

// 使用示例
$order = new Order();
$order->ship(); // 状态变为已发货
$order->complete(); // 抛出异常，订单尚未完成

$order->ship(); // 抛出异常，订单已经发货
$order->complete(); // 状态变为已完成
