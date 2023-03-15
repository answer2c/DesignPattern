<?php

/**
 * 简单工厂
 * 定义一个工厂类并实现一个创建对象的方法，根据客户端的传入参数来创建不同类别的对象
 * 当由新定义类别的对象时，必须得修改创建方法。
 */
class Factory {

    static function createIM($type) :IM {
        switch ($type) {
            case "wechat":
                return new WeChat();
            case "feishu":
                return new Feishu();
        }
        throw new Exception("Invalid type");
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

$im = Factory::createIM("wechat");
$im->send("hello ?");