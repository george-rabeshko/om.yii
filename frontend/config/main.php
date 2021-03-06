<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'layout' => 'om', // custom
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'uploads/images', //path to origin images
            'imagesCachePath' => 'uploads/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => 'public/images/no-photo.png',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'rules' => [
                'page-<page:\d+>' => 'main/index',
                'category/page-<page:\d+>' => 'blog/index',
                '/' => 'main/index',
                'category' => 'blog/index',
                'category/<uri:[\w-]+>/page-<page:\d+>' => 'blog/category',
                'category/<uri:[\w-]+>' => 'blog/category',
                'category/<uri:[\w-]+>/<id:\d+>/page-<page:\d+>' => 'blog/single',
                'category/<uri:[\w-]+>/<id:\d+>' => 'blog/single',
                '<uri:[\w-]+>' => 'page/index',
            ]
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
