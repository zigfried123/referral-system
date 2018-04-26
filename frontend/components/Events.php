<?php
namespace app\components;

use yii\base\Component;

class Events extends Component
{
    const HELLO = 'hello';

    public function setHello()
    {
        $this->on(self::HELLO,function(){
           echo 123;
            die;
        });
    }
}