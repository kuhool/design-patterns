<?php
/**
 * 设计模式:
 * 抽象工厂模式
 *
 */


// 定义抽象工厂类
abstract class AbstractFactory
{
    // 创建产品A的抽象方法
    abstract public function createProductA();

    // 创建产品B的抽象方法
    abstract public function createProductB();
}

// 定义具体工厂类A
class ConcreteFactoryA extends AbstractFactory
{
    public function createProductA()
    {
        return new ConcreteProductA1();
    }

    public function createProductB()
    {
        return new ConcreteProductB1();
    }
}

// 定义具体工厂类B
class ConcreteFactoryB extends AbstractFactory
{
    public function createProductA()
    {
        return new ConcreteProductA2();
    }

    public function createProductB()
    {
        return new ConcreteProductB2();
    }
}

// 定义抽象产品类A
abstract class AbstractProductA
{
    // 具体产品A的公共方法
    abstract public function methodA();
}

// 定义具体产品类A1
class ConcreteProductA1 extends AbstractProductA
{
    public function methodA()
    {
        return "This is ConcreteProductA1";
    }
}

// 定义具体产品类A2
class ConcreteProductA2 extends AbstractProductA
{
    public function methodA()
    {
        return "This is ConcreteProductA2";
    }
}

// 定义抽象产品类B
abstract class AbstractProductB
{
    // 具体产品B的公共方法
    abstract public function methodB();
}

// 定义具体产品类B1
class ConcreteProductB1 extends AbstractProductB
{
    public function methodB()
    {
        return "This is ConcreteProductB1";
    }
}

// 定义具体产品类B2
class ConcreteProductB2 extends AbstractProductB
{
    public function methodB()
    {
        return "This is ConcreteProductB2";
    }
}

/**
 * 工厂接口
 * 工厂A实现了工厂接口中的方法（产品方法A，产品方法B）
 *
 * 产品接口
 * 产品AB类接口实现了产品接口（产品类A，产品类B）
 *
  抽象工厂类的优点主要有以下几点：

1. 提供了一种产品族的概念，可以将一组相关或依赖的产品对象进行组合，从而提供更加高层次的接口。--------------------------------

2. 可以保证产品对象之间的兼容性，因为同一个工厂创建的产品对象都属于同一个产品族，它们之间具有相同的约束条件和接口规范。

3. 可以提高系统的灵活性和可扩展性，因为可以通过增加新的具体工厂类和产品类来扩展系统功能，而不需要修改原有的代码。------------------------

4. 可以降低客户端与具体类之间的耦合度，因为客户端只需要知道抽象工厂类和抽象产品类即可，不需要知道具体的实现细节。这样可以隔离具体类的变化对客户端代码的影响，从而提高系统的稳定性和可维护性。

总之，抽象工厂类可以提供更加高层次的接口，保证产品对象之间的兼容性，提高系统的灵活性和可扩展性，降低客户端与具体类之间的耦合度，从而使得系统更加稳定、灵活、可维护。
 */
// 使用示例
$factoryA = new ConcreteFactoryA();//实例化一个工厂类A(工厂类A实现工厂接口)
$productA = $factoryA->createProductA();//实现接口函数产品A(产品A实现产品接口)
$productB = $factoryA->createProductB();//实现接口函数产品B(产品A实现产品接口)

echo $productA->methodA(); // 输出：This is ConcreteProductA1 //
echo $productB->methodB(); // 输出：This is ConcreteProductB1

$factoryB = new ConcreteFactoryB();
$productA = $factoryB->createProductA();
$productB = $factoryB->createProductB();

echo $productA->methodA(); // 输出：This is ConcreteProductA2
echo $productB->methodB(); // 输出：This is ConcreteProductB2




