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
                // app* - ��� ������, ������� ����������, ����� ���������
                // �������������� ����������. � ����� ������, �� ������������ ���, ��� ���������� � app
                '*'=>[
                    'class'=>yii\i18n\DbMessageSource::className(),
                    'sourceLanguage'=>'en-EN',
                ],
            ]
        ],
    ],
];

