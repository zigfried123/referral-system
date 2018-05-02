<?php

/* @var $this yii\web\View */
/* @var $link string */
/* @var $referrals object */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<p><b>Your referral link:</b>
<code><?=$link?></code></p>
<?php
$n=0;
if(!empty($referrals)) {
?>
    <p><b>In current you have these referrals:</b></p>
<?php
    foreach ($referrals as $referral) {
        echo sprintf('%d. <i>%s</i>', ++$n, $referral) . '<br>';
    }
}
?>

