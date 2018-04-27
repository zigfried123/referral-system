<?php

namespace frontend\models;

use yii\helpers\Url;

class ReferralSystem
{
    public static function getLink()
    {
        return \Yii::$app->urlManager->createAbsoluteUrl(['register','user'=>123]);
    }
}