<?php

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