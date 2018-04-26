<?php
namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class MyBehavior extends Behavior
{
    public function events()
    {
        return [
             Events::HELLO => 'hellof',
        ];
    }

    public function hello()
    {
        echo 'hello';

    }
}