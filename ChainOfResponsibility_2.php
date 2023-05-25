<?php


abstract class Handler {
    protected $successor;

    public function setSuccessor($successor) {
        $this->successor = $successor;
    }

    abstract public function handleRequest($request);
}

class ConcreteHandler1 extends Handler {
    public function handleRequest($request) {
        if ($request == 'request1') {
            echo "Handled by ConcreteHandler1";
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($request);
        }
    }
}

class ConcreteHandler2 extends Handler {
    public function handleRequest($request) {
        if ($request == 'request2') {
            echo "Handled by ConcreteHandler2";
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($request);
        }
    }
}

$handler1 = new ConcreteHandler1();
$handler2 = new ConcreteHandler2();
$handler1->setSuccessor($handler2);

$handler1->handleRequest('request1');
$handler1->handleRequest('request2');

//$handler1 = new ConcreteHandler1();
//$handler2 = new ConcreteHandler2();
//$handler3 = new ConcreteHandler3();
//$handler1->setSuccessor($handler2);
//$handler2->setSuccessor($handler3);
//
//$handler1->handleRequest('request1');
//$handler1->handleRequest('request2');
//$handler1->handleRequest('request3');
