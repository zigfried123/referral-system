<?php

function get($name=null){
    return isset($name) ? Yii::$app->request->get($name) : Yii::$app->request->get();
}

function dd($data)
{
    var_dump($data);
    die;
}
function session($name,$value)
{
    return Yii::$app->session[$name] = $value;
}