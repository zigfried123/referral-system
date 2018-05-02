<?php
namespace frontend\components;

use frontend\components\visitorManager\VisitorManager;
use yii\base\Behavior;
use yii\web\Controller;

class VisitorObserver extends Behavior
{
    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        $visitor = VisitorManager::getInstance($event);

        return is_callable([$visitor,'execute']) ? $visitor->execute() : false;
    }
}