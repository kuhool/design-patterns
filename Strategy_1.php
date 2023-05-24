<?php
/**
 * 设计模式-策略模式
 */
/**
 * abstract class
 */
abstract class Strategy
{
    // 算法方法
    abstract public function AlgorithmInterface();
}

/**
 * 算法a
 */
class ConcreteStrategyA extends Strategy
{
    public function AlgorithmInterface()
    {
        echo "算法a实现\n";
    }
}


/**
 * 算法b
 */
class ConcreteStrategyB extends Strategy
{
    public function AlgorithmInterface()
    {
        echo "算法b实现\n";
    }
}

/**
 * 算法c
 */
class ConcreteStrategyC extends Strategy
{
    public function AlgorithmInterface()
    {
        echo "算法c实现\n";
    }
}

/**
 * 上下文context
 */
class Context
{
    private $strategy;

    function __construct($strategy)
    {
        $this->strategy = $strategy;
    }

    public function contextInterface()
    {
        $this->strategy->AlgorithmInterface();
    }
}

$context = new Context(new ConcreteStrategyA());
$context->contextInterface();

$context = new Context(new ConcreteStrategyB());
$context->contextInterface();

$context = new Context(new ConcreteStrategyC());
$context->contextInterface();






