<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Deyaju',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'class' => 'common\components\Request',
            'web' => '/backend/web',
            'adminUrl' => '/admin'

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
                'login/' => 'admin/user/login',
                'signup/' => 'admin/user/login',
                'request-password-reset/' => 'admin/user/request-password-reset',
                'reset-password/' => 'admin/user/reset-password',

                'rbac/assignment/<id:\d+>' => 'admin/assignment/view',
                'rbac/assignment' => 'admin/assignment/index',
                'rbac/assignment/assign/<id:\d+>' => 'admin/assignment/assign',
                'rbac/assignment/revoke/<id:\d+>' => 'admin/assignment/revoke',
                'rbac/route/index' => 'admin/route/index',
                'rbac/route/assign' => 'admin/route/assign',
                'rbac/route/remove' => 'admin/route/remove',
                'rbac/route/create' => 'admin/route/create',
                'rbac/permission/' => 'admin/permission/index',
                'rbac/permission/view/<id:\w+>' => 'admin/permission/view',
                'rbac/permission/update/<id:\w+>' => 'admin/permission/update',
                'rbac/permission/delete/<id:\w+>' => 'admin/permission/delete',
                'rbac/permission/create' => 'admin/permission/create',
                'rbac/role/index' => 'admin/role/index',
                'rbac/role/view/<id:\w+>' => 'admin/role/view',
                'rbac/role/update/<id:\w+>' => 'admin/role/update',
                'rbac/role/delete/<id:\w+>' => 'admin/role/delete',
                'rbac/role/assign/<id:\w+>' => 'admin/role/assign',
                'rbac/role/remove/<id:\w+>' => 'admin/role/remove',
                'rbac/role/create' => 'admin/role/create',

                'rbac/user/index' => 'admin/user/index',
                'rbac/user/<id:\d+>' => 'admin/user/view',
                'rbac/user/activate/<id:\d+>' => 'admin/user/activate',
                'rbac/user/delete/<id:\d+>' => 'admin/user/delete',
                'rbac/user/signup-model' => 'admin/user/signup-model',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller>/<action>/<id>' => '<controller>/<action>',
            ],
        ],
        'angularSockets' => [
            'class' => 'common\components\AngularSockets',
            'appId' => '2134563',
            'appKey' => '6da2b955rt62e5ff86ef',
            'appSecret' => '83c7042swe471d5fb095',
            'host' => 'https://socket-chat-deyaju.herokuapp.com',//
            'port' => '3018',
            
        ],

        'opentok' => [
            'class'      => 'abushamleh\opentok\Client',
            'api_key'    => '47363131',
            'api_secret' => '79f6e71a64221b91c6f2fc0b7f495a262ab3b61f',
        ],
    ],
    'params' => $params,
];
