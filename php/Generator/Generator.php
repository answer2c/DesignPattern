<?php

/**
 * 生成器模式
 * 可以把构造一个复杂对象的过程抽取出来
 * 把一个复杂的构造参数分离成多个步骤
 * 具体创建的调用，可以交给客户端代码去做，也可以封装一个主管类来完成。
 * 不同的构造器可以返回不同抽象的对象
 * 设置完对象的属性后，最终返回对象的方法不放到抽象生成器中，因为不同的生成器不一定返回同一类的对象。
 */


interface Builder {
    function reset();
    function setWheels($num);
    function setSeats($num);
    function setEngine($obj);
}

class CarBuilder implements Builder {

    private $product;

    function __construct()
    {
        $this->reset();

    }

    function reset()
    {
        $this->product = new Car();
    }


    function setWheels($num)
    {
        $this->product->wheel = "{$num} car wheel(s)";
    }

    function setSeats($num)
    {
        $this->product->seat = "{$num} car seat(s)";
    }

    function setEngine($obj)
    {
        $this->product->engine = "car engine is {$obj}";
    }

    function getProduct()
    {
        $product =  $this->product;
        $this->reset();
        return $product;
    }
}

class BicycleBuilder implements Builder {
    private $product;
    function __construct()
    {
        $this->reset();
    }

    function reset()
    {
        $this->product = new Bicycle();
    }

    function setWheels($num)
    {
        $this->product->wheel = "{$num} bicycle wheel(s)";
    }

    function setSeats($num)
    {
        $this->product->seat = "{$num} bicycle seat(s)";
    }

    function setEngine($obj)
    {
        $this->product->engine = "bicycle engine is {$obj}";
    }

    function getProduct()
    {
        $product = $this->product;
        $this->reset();
        return $product;
    }
}

class Car {
    public $engine;
    public $seat;
    public $wheel;
}

class Bicycle {
    public $wheel;
    public $seat;
    public $engine;
}

class Director {
    public static function buildNewCar(Builder $builder) {
        $builder->reset();
        //
        $builder->setWheels(4);
        $builder->setSeats(2);  //maybe more
        $builder->setEngine("v8");
    }

    public static function buildBicycle(Builder $builder) {
        $builder->reset();
        $builder->setWheels(2);
        $builder->setSeats(1); //
        $builder->setEngine("manual");
    }
}

$builder = new CarBuilder();
Director::buildNewCar($builder);
$car = $builder->getProduct();
var_dump($car->wheel);
var_dump($car->seat);
var_dump($car->engine);