<?php

/**
 * Desc: 命令模式
 * 服务员设置菜单中菜品，并通知执行命令
 * Author: hunianshun
 * DateTime: 2023/5/29 11:21
 */

class Barbecuer
{
    public function bakeMutton()
    {
        echo "烤羊肉串\n";
    }

    public function bakeChickenWing()
    {
        echo "烤鸡翅\n";
    }
}

/**
 * Class Command
 * Desc:抽象命令用户传入一个对象并执行这个对应的统一方法
 * Author: hunianshun
 * DateTime: 2023/5/29 11:20
 */
abstract class  Command
{
    protected $receiver;

    function __construct(Barbecuer $receiver)
    {
        $this->receiver = $receiver;
    }

    abstract public function excuteCommand();
}

//烤羊肉
class BakeMuttonCommand extends Command
{
    public function excuteCommand()
    {
        $this->receiver->bakeMutton();
    }
}

//烤鸡翅
class BakeChickenWingCommand extends Command
{
    public function excuteCommand()
    {
        $this->receiver->bakeChickenWing();
    }
}

//服务员
class Waiter
{
    private $commands = [];

    //设置订单
    public function setOrder(Command $command)
    {
        if ($command instanceof BakeChickenWingCommand) {
            echo "服务员： 鸡翅没有了，请点别的烧烤\n";
        } else {
            echo "增加订单\n";
            array_push($this->commands, $command);
        }
    }

    //取消订单
    public function cancelOrder(Command $command)
    {
    }

    //通知执行
    public function notify()
    {
        foreach ($this->commands as $value) {
            $value->excuteCommand();
        }
    }
}

//客户端代码

//开店前准备
$boy = new Barbecuer();
$bakeMuttonCommand1 = new BakeMuttonCommand($boy);
$bakeMuttonCommand2 = new BakeMuttonCommand($boy);
$bakeChickenWingCommand1 = new BakeChickenWingCommand($boy);
$girl = new Waiter();

//开门营业
$girl->setOrder($bakeMuttonCommand1);
$girl->setOrder($bakeMuttonCommand2);
$girl->setOrder($bakeChickenWingCommand1);
$girl->notify();