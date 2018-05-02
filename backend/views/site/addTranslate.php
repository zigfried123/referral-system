<?php

/* @var $sourceMessage \app\models\SourceMessage */

$form = \yii\widgets\ActiveForm::begin();
?>

<?=$form->field($sourceMessage,'category')->textInput();?>

<?=$form->field($sourceMessage,'message')->textInput();?>


<?=$form->field($message,'translation')->textInput();?>

<?=$form->field($message,'language')->textInput();?>

<?php
\yii\widgets\ActiveForm::end();