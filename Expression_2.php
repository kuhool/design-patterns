<?php
/**
 * 设计模式-解析器模式
 */


interface AbstractExpression
{
    //解析器，继承类可以定义不同的解析规则
    public function interpret(Context $context);
}

class TerminalExpression implements AbstractExpression
{
    public function interpret(Context $context)
    {
        echo "终端解释器\n";
    }
}

class NonTerminalExpression implements AbstractExpression
{
    public function interpret(Context $context)
    {
        echo "非终端解释器\n";
    }
}

class Context
{
    private $input;

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function getInput()
    {
        return $this->input;
    }

    private $output;

    public function setOutput($output)
    {
        $this->output = $output;
    }

    public function getOutput()
    {
        return $this->output;
    }
}


$context = new Context();
$syntax = [];
array_push($syntax, new TerminalExpression());
array_push($syntax, new NonTerminalExpression());
array_push($syntax, new TerminalExpression());
array_push($syntax, new TerminalExpression());

//多次解析同一份数据

foreach ($syntax as $value) {
    $value->interpret($context);
}