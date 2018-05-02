<?php
return [
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations'=>[
                // app* - это шаблон, который определяет, какие категории
                // обрабатываются источником. В нашем случае, мы обрабатываем все, что начинается с app
                '*'=>[
                    'class'=>yii\i18n\DbMessageSource::className(),
                    'sourceLanguage'=>'en-EN',
                ],
            ]
        ],
    ],
];

