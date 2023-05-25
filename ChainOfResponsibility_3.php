<?php

abstract class Handler
{
    protected $successor;

    //设置继承者
    public function setSuccessor(Handler $successor)
    {
        $this->successor = $successor;
    }

    //处理请求的抽象方法
    abstract function handleRequest(int $request);
}

//如果可以处理请求，就处理之，否者转发给它的后继者
class ConcreteHandler1 extends Handler
{
    public function handleRequest(int $request)
    {
        if ($request >=0 && $request < 10)
        {
            echo "ConcreteHandler1 handle it\n";
        } else if ($this->successor != null) {
            // 转移
            $this->successor->handleRequest($request);
        }
    }
}

class ConcreteHandler2 extends Handler
{
    public function handleRequest(int $request)
    {
        if ($request >=10 && $request < 20)
        {
            echo "ConcreteHandler2 handle it\n";
        } else if ($this->successor != null) {
            $this->successor->handleRequest($request);
        }
    }
}

// client
$h1 = new ConcreteHandler1();
$h2 = new ConcreteHandler2();
//设置职责链上下家
$h1->setSuccessor($h2);
$requests = [1,5,7,16,25];
//循环给最小处理者提交请求，不同的数额，由不同权限处理者处理
foreach ($requests as $value) {
    $h1->handleRequest($value);
}