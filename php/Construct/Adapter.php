<?php



class Service {
    public function getMsg() :String {
        return '{"msg":"this is msg from service"}';
    }
}

class OutTimeService {
    public function msg() {
        return ["msg" => "this is  msg from out time service"];
    }
}

/**
 * Class Adapter
 * 适配器， 适配OldService的数据为Service标准
 */
class Adapter extends Service {
    protected $obj;

    public function __construct(OutTimeService $obj)
    {
        $this->obj = $obj;
    }

    public function getMsg() :String {
        return json_encode($this->obj->msg());
    }
}

$a = new Service();
echo $a->getMsg();

$b = new Adapter(new OutTimeService());
echo $b->getMsg();