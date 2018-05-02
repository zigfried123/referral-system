<?php
namespace common\components;

use yii\base\Behavior;
use yii\web\Controller;
use yii\web\Session;

class VisitorObserver extends Behavior
{

    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        if ($event->action->id === 'signup' && !empty(get('ref'))){
            (new Session())->set('ref',get('ref'));
        }

    }
}