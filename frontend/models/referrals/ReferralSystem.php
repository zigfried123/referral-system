<?php

namespace frontend\models\referrals;

use \app\models\referrals\Referrals;
use common\models\User;

class ReferralSystem
{
    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function getLink()
    {
        return \Yii::$app->urlManager->createAbsoluteUrl(['signup','ref'=>User::getEmail()]);
    }

    public function getReferrals()
    {
        return User::findRefEmailsById(Referrals::getReferralsId($this->userId));
    }

    public function getFromUserEmail()
    {
        return User::findEmailById(Referrals::getUserId($this->userId));
    }

}