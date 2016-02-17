<?php
return [
    'language' => 'uk',
    'defaultRoute' => 'main',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
//    'modules' => [
//        'search' => [
//            'class' => 'common\modules\search\Search',
//        ],
//    ],
    'components' => [
        'db' => require(dirname(__DIR__) . '/../common/config/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                'blog/search'=>'blog/search',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'search' => [
            'class' => 'himiklab\yii2\search\Search',
            'models' => [
                'common\models\Articles',
            ],
        ],
    ],
    'aliases' => [
        '@note' => '@frontend/views/common/note',
        '@images' => '@frontend/web/uploads/images/',
    ],
];
