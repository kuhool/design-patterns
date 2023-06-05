<?php
/**
 * 设计模式之建造者模式
 * 将一个负责对象的构建和它的表达分离，使得同样的构建过程可以创建不同的表示
 * 需要的类型
 * 1. 执行者：Director
 * 2. 创建者：CreatePerson
 * 3. 待创建的抽象类及继承者
 */


//画小人
abstract class PersonBuilder
{
    abstract public function BuildHead();

    abstract public function BuildBody();

    abstract public function BuildArmLeft();

    abstract public function BuildArmRight();

    abstract public function BuildLegLeft();

    abstract public function BuildLegRight();
}

class PersonThinBuilder extends PersonBuilder
{
    public function BuildHead()
    {
        echo "小头\n";
    }

    public function BuildBody()
    {
        echo "小身子\n";
    }

    public function BuildArmRight()
    {
        echo "右臂\n";
    }

    public function BuildArmLeft()
    {
        echo "左臂\n";
    }

    public function BuildLegLeft()
    {
        echo "左腿\n";
    }

    public function BuildLegRight()
    {
        echo "右腿\n";
    }
}

class PersonFatBuilder extends PersonBuilder
{
    public function BuildHead()
    {
        echo "大头\n";
    }

    public function BuildBody()
    {
        echo "大身子\n";
    }

    public function BuildArmRight()
    {
        echo "右臂\n";
    }

    public function BuildArmLeft()
    {
        echo "左臂\n";
    }

    public function BuildLegLeft()
    {
        echo "左腿\n";
    }

    public function BuildLegRight()
    {
        echo "右腿\n";
    }
}

class PersonDirector
{
    private $personBuilder;

    function __construct($personBuilder)
    {
        $this->personBuilder = $personBuilder;
    }

    public function CreatePerson()
    {
        $this->personBuilder->BuildHead();
        $this->personBuilder->BuildBody();
        $this->personBuilder->BuildArmRight();
        $this->personBuilder->BuildArmLeft();
        $this->personBuilder->BuildLegLeft();
        $this->personBuilder->BuildLegRight();
    }
}


//客户端代码

echo "苗条的:\n";
$thinDirector = new PersonDirector(new PersonThinBuilder());
$thinDirector->CreatePerson();

echo "\n胖的:\n";
$fatDirector = new PersonDirector(new PersonFatBuilder());
$fatDirector->CreatePerson();