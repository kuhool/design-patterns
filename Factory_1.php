<?php
/**
 * 设计模式
 * 简单工厂模式
 * 核心逻辑：
 * 1. 定义一个工厂类接口，规定工厂生产什么类型的Class
 * 2. 使用switch case 映射不同的类，也就是标识和类的映射表
 * 1=>ClassA
 * 2=>ClassB
 * 3=>ClassC
 */

/**
 * [定义一个工厂类接口，规定工厂生产什么类型的Class]
 * 接口 - 技能设定
 */
interface IProduct{
    public function Attack();  // 攻击
    public function Defense(); // 防御
}

/**
 * 批量生产的Class
 * 创建 - 步兵
 */
class XPinfantry implements IProduct{
    public function Attack() { echo '步兵进攻，攻击力：10~ <br/>';}
    public function Defense(){ echo '步兵防守，防御力：20~ <br/>';}
}

/**
 * 批量生产的Class
 * 创建 - 骑兵
 */
class XPcavalry implements IProduct{
    public function Attack() { echo '骑兵进攻，攻击力：30~ <br/>';}
    public function Defense(){ echo '骑兵防守，防御力：5~ <br/>';}
}


/**
 * 工厂角色生产类的对象
 */
class ProductFactory{
    public static function GetInstance($style){
        switch ($style){
            case 1: // 创建步兵
                return new XPinfantry();
                break;
            case 2: // 创建骑兵
                return new XPcavalry();
                break;
            default:
                return null;
        }
    }
}

$obj = array();
$obj[] = ProductFactory::GetInstance(1); // 生产一个步兵
$obj[] = ProductFactory::GetInstance(2); // 生产一个骑兵
$obj[] = ProductFactory::GetInstance(3); // 生产错了
$obj[] = ProductFactory::GetInstance(2); // 生产一个骑兵

foreach ($obj as $val) {
    if ($val) {
        $val->Attack();  // 进攻
        $val->Defense(); // 防守
    } else {
        echo '暂无该类兵种！<br/>';
    }
}


