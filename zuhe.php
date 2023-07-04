<?php
/**
 * 设计模式-组合模式
 *
 */

/** 抽象一个总组合器类

 *  abstract IComposite

 */

abstract Class IComposite
{
    protected $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    abstract function Add(IComposite $place);
    abstract function Display($level);
}



/** 组合器类 供客户端调用
 *  Composite
 */

Class Composite extends IComposite
{
    private $places = array();
    function __construct($name)
    {
        parent::__construct($name);
    }

    function Add(IComposite $place)
    {
        $this->places[] = $place;
    }

    /** 显示方法
     *  Display
     *  $level 级别 默认江苏省为 1级
     */
    function Display($level = "1")
    {
        $pre = "";
        for ($i=0; $i < $level; $i++) {
            $pre.= "-->";
        }
        $pre.=$this->name.PHP_EOL;
        echo $pre;
        foreach ($this->places as $v) {
            // 往后南京市 级别加1 秦淮区在南京市基础上再加1
            $v->display($level+1);
        }
    }
}




// 先处理江苏省
$jiangsu = new Composite("江苏省");
// 再处理南京市
$nanjing = new Composite("南京市");

// 最后处理秦淮区和建邺区
$qinhuai = new Composite("秦淮区");
$jianye = new Composite("建邺区");



// 把南京添加到江苏省下
$jiangsu->Add($nanjing);
//// 把秦淮区和建邺区添加到南京市下
$nanjing->Add($qinhuai);
//$nanjing->Add($jianye);

$jiangsu->Display(); // 显示