<?php

abstract Class AbstractFactory {
    abstract static function create();

}

class WechatFactory extends AbstractFactory {

    static function create()
    {
        return new WeChat();
    }

}

class FeishuFactory extends AbstractFactory {

    static function create()
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

$im = WechatFactory::create();
$im->send("hello ?");