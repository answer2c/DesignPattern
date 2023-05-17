<?php

class AbstractLayer {
    protected $api;
    public function __construct(ApiClass $api)
    {
        $this->api = $api;
    }

    public function doJob() {
        echo $this->api->exec();
    }
}

class ConcreteAbstractLayerA  extends AbstractLayer {
    public function doJob() {
        echo "concrete + ". $this->api->exec();
    }
}

class ApiClass {
    public function exec() :string {
        return "default api class\n";
    }
}

class ConcreteApiClassA extends ApiClass {
    public function exec  () :string
    {
        return "concrete api class A \n";
    }
}

$imple = new ApiClass();
$abstractLayer = new AbstractLayer($imple);
$abstractLayer->doJob();

$conCreteImple = new ConcreteApiClassA();
$concreteLayerA = new ConcreteAbstractLayerA($conCreteImple);
$concreteLayerA->doJob();

