<?php
return [
    'language' => 'uk',
    'defaultRoute' => 'main',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require(dirname(__DIR__) . '/../common/config/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'aliases' => [
        '@note' => '@frontend/views/common/note',
        '@images' => '@frontend/web/uploads/images/',
    ],
];
