<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //    'modules' => [
    //        'admin' => [
    //            'class' => 'mdm\admin\Module',
    //        ]
    //    ],
    'modules' => [
        'admin' => [
            'class' => 'backend\modules\admin\Module',
            //'layout' => 'top-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
            'controllerMap' => [
                'assignment' => [
                    //'class' => 'mdm\admin\controllers\AssignmentController',
                    'class' => 'backend\controllers\mdm\AssignmentController',
                    //'userClassName' => 'app\models\User',
                    'idField' => 'id', //id????

                ],
                //                'default' => [
                //                     'class' => 'backend\controllers\mdm\DefaultController',
                //                    //'userClassName' => 'app\models\User',
                //                    //'idField' => 'id'//id????
                //                ],
                'menu' => [
                    //'class' => 'mdm\admin\controllers\AssignmentController',
                    'class' => 'backend\controllers\mdm\MenuController',
                    //'userClassName' => 'app\models\User',
                    //'idField' => 'id'//id????
                ],

            ],

            'menus' => [
                'assignment' => [
                    'label' => 'Accesos' // change label
                ],
                //'route' => null, // disable menu
            ],

        ]
    ],
    'as access' => [ //comentado para ejecutar "php yii rbac/init"
        //'class' => 'mdm\admin\components\AccessControl',
        'class' => 'backend\modules\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            //'admin/*',
            //'site/error',
            'admin/user/request-password-reset',
            'admin/user/signup',
            'admin/user/rol',
            'admin/user/assignrol'
        ]
    ],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ], 'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'user' => [
            //            'identityClass' => 'mdm\admin\models\User',
            //            'loginUrl' => ['admin/user/login'],
            //            'class' => 'mdm\admin\models\User',
            //'identityClass' => 'mdm\admin\models\User',
            'identityClass' => 'backend\models\mdm\User',
            'loginUrl' => ['admin/user/login'],
        ],
        'i18n' => [

            'translations' => [
    
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => Yii::$app->sourceLanguage,
    
                ],
    
            ],
    
        ],
    ],

    
];
