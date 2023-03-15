<?php

/**
 * 工厂方法模式
 * 创建一个抽象工厂来约定创建对象的方法，除了创建对象的方法，可以定义并实现其他共同的行为。
 * 由客户端代码来决定创建哪个工厂
 * 有新定义类别的对象时，客户端直接调用，不用再修改原有创建方法
 * 当对象类别过多时，创建的工厂也变多。
 */
abstract Class AbstractFactory {
    abstract function create();

    public function chat(string $msg) {
        $im = $this->create();
        $im->send($msg);
    }
}

class WechatFactory extends AbstractFactory {

    public function create()
    {
        return new WeChat();
    }

}

class FeishuFactory extends AbstractFactory {

    public function create()
    {
        return new Feishu();
    }

}


interface IM {
    function send($msg);
}

class WeChat implements IM {
    function send($msg)
    {
        echo "Send msg by Wechat: {$msg} \n";
    }
}

class Feishu implements  IM {
    function send($msg)
    {
        echo "Send msg by Feishu: {$msg} \n";
    }
}


$factory = new WechatFactory();
$factory->chat("hello ?");