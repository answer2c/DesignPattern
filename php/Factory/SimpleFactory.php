<?php

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