<?php

/* @var $this yii\web\View */
/* @var $link string */
/* @var $referrals array */
/* @var $fromUserEmail string */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
    <b>Your referral link:</b>
        <code><?= $link ?></code><br>
<?php if ($fromUserEmail) { ?>
    <?= Yii::t('ref', 'You came from {user}', ['user' => $fromUserEmail]) ?><br>
<?php } ?>
<?php
$num = count($referrals);
$text = "In current you have $num referrals";
if($num>0){
    $text.=':';
}
?>
    <b><?=$text?></b><br>
<?php
if (!empty($referrals)) {
    $n = 0;
    foreach ($referrals as $referral) {
        echo sprintf('%d. <i>%s</i>', ++$n, $referral) . '<br>';
    }
}


