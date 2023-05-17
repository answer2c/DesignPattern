<?php

class Singleton {
    private static $instance;
//    private static $instance = new self(); //饿汉式单例，php中不支持这样的操作。
    private function __construct()
    {

    }

    private function __clone(){}

    public static function getInstance() {
        //懒汉式
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}

$s = Singleton::getInstance();


class Par{
    private function __construct()
    {
    }

    public function test() {
        echo "test";
    }
    public function te() {
        $a = new static();
        var_dump(get_class($a));
        $b = new self();
        var_dump(get_class($b));
    }
}

class Child extends Par {
    public function __construct()
    {
    }


}

$child = new Child();
$child->te();