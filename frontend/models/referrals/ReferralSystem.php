<?php

namespace frontend\models\referrals;

use \app\models\referrals\Referrals;
use common\models\User;

class ReferralSystem
{
    public static function getLink()
    {
        return \Yii::$app->urlManager->createAbsoluteUrl(['signup','ref'=>User::getUserName()]);
    }

    public static function getReferrals($userId)
    {
        return User::findUserNamesById(Referrals::getReferralsId($userId));
    }

}