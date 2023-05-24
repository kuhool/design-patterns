<?php
/**
 * 设计模式
 * 工厂方法模式
 * 和简单设计模式优点：
 * 更好的扩展性：工厂方法模式将每个产品的创建都交给了对应的工厂类，如果需要新增一种产品，只需要新增一个对应的工厂类即可，不需要修改原有的代码，符合开闭原则。
 * 更好的复用性：由于每个产品的创建都交给了对应的工厂类，因此可以将这些工厂类进行组合，实现更加复杂的功能。
 * 更好的解耦性：每个产品的创建都交给了对应的工厂类，产品与工厂之间形成了一种解耦关系，从而降低了系统的耦合度。
 * 总之，工厂方法模式相对于简单工厂模式具有更好的灵活性、可扩展性和可维护性
 *
 * 核心逻辑:x
 * 1.新引入一个生产工厂的类
 * 2.每个产品有对应的工厂生产
 * 抽象的接口：工厂接口，产品接口
 * A工厂生产对应的A产品(A工厂要实现统一工厂接口，A产品也要实现产品接口)
 * B工厂生产对应的B产品
 */


/**
 *
 * 接口 - 工厂
 */
interface IServerFactory{
    public function GetInstance();
}
/**
 * 创建 - 步兵工厂
 */
class ProductInfantry implements IServerFactory{
    public function GetInstance(){ return new XPinfantry();}
}
/**
 * 创建 - 骑兵工厂
 */
class ProductCavalry implements IServerFactory{
    public function GetInstance(){ return new XPCavalry ();}
}




/**
 * 接口 - 士兵
 */
interface IProduct{
    public function Attack();  // 攻击
}
/**
 * 创建 - 步兵
 */
class XPinfantry implements IProduct{
    public function Attack() { echo '步兵进攻，攻击力：10~ <br/>';}
}
/**
 * 创建 - 骑兵
 */
class XPcavalry implements IProduct{
    public function Attack() { echo '骑兵进攻，攻击力：30~ <br/>';}
}



$Infantry = new ProductInfantry();  // 建立步兵工厂
$Cavalry  = new ProductCavalry();   // 建立骑兵工厂

$obj = array();
$obj[] = $Infantry->GetInstance(); // 生产一个步兵
$obj[] = $Cavalry ->GetInstance(); // 生产一个骑兵
$obj[] = $Cavalry ->GetInstance(); // 生产一个骑兵

foreach ($obj as $val) {
    $val->Attack();  // 进攻
}



