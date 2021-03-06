<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'layout' => 'admin',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/login',
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => '@frontend/web/uploads/images', //path to origin images
            'imagesCachePath' => '@frontend/web/uploads/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/public/images/no-photo.png',
        ],
    ],
    'components' => [
        'urlManager' => [
            'rules' => [
                '<action:(login|logout|index)>' => 'site/<action>',
                '/' => 'site/index',
                '<controller>' => '<controller>/index',
                '<controller>/<action:create>' => '<controller>/create',
                'articles/<uri:[\w-]+>' => 'articles/index',
                'articles/<uri:[\w-]+>/<action:[\w-]+>/<id:\d+>' => 'articles/<action>',
                '<controller:(pages|comments)>/<action>/<id:\d+>' => '<controller>/<action>',
            ]
        ],
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'defaultRoles'=>array('authenticated', 'admin'),
        ),
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
    ],
    'params' => $params,
];
