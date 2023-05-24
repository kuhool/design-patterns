<?php
/**
 * 设计模式-
 * 策略模式和简单工厂结合
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
// 只需要修改上方的Context类
class Context
{
    private $strategy;

    function __construct($operation)
    {
        switch ($operation) {
            case 'a':
                $this->strategy = new ConcreteStrategyA();
                break;
            case 'b':
                $this->strategy = new ConcreteStrategyB();
                break;
            case 'c':
                $this->strategy = new ConcreteStrategyC();
                break;
        }
    }

    public function contextInterface()
    {
        return $this->strategy->AlgorithmInterface();
    }
}

//客户端代码
$context = new Context('a');
$context->contextInterface();