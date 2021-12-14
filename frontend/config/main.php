<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Deyaju',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web' => '/frontend/web'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ],
        ],
        'opentok' => [
            'class' => 'abushamleh\opentok\Client',
            'api_key' => '47363131',
            'api_secret' => '79f6e71a64221b91c6f2fc0b7f495a262ab3b61f',
        ],
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => '6LcKBowaAAAAAPeYcmplFJnD5MYh19EPbIre3vSK',
            'secretV2' => '6LcKBowaAAAAAEjUt4kYg-onKlxwM5uWErkl3Gtm',
        ],
        'angularSockets' => [
            'class' => 'common\components\AngularSockets',
            'appId' => '2134563',
            'appKey' => '6da2b955rt62e5ff86ef',
            'appSecret' => '83c7042swe471d5fb095',
            'host' => 'https://socket-chat-deyaju.herokuapp.com', //https://socket-chat-deyaju.herokuapp.com
            'port' => '3018',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions' => ['position' => \yii\web\View::POS_HEAD],
                ],
            ],
        ],
    ],
    'params' => $params,
];
