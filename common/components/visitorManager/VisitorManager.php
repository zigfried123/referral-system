<?php
namespace common\components\visitorManager;

use common\components\visitorManager\subclasses\SignupVisitor;

abstract class VisitorManager
{
    public static function getInstance($event)
    {
        if ($event->action->id === 'signup' && !empty(get('ref'))){
            return new SignupVisitor();
        }

        return false;
    }
}