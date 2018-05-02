<?php
namespace common\components\visitorManager\subclasses;

use yii\web\Session;

class SignupVisitor
{
    public function execute()
    {
        return $this->saveRef();
    }

    private function saveRef()
    {
        return (new Session())->set('ref',get('ref')) ? true : false;
    }
}