<?php

$_ENV = array_merge($_ENV, require(__DIR__ . '/.env'));

$db = require __DIR__ . '/db.php';
$params = require __DIR__ . '/params.php';
$routes = array_merge(require(__DIR__ . '/routes.php'));

$basePath =  dirname(__DIR__);
$webroot = dirname($basePath);

$config = [
    'id' => 'app',
    'name' => "Raffle",
    'basePath' => $basePath,
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'runtimePath' => $webroot . '/runtime',
    'vendorPath' => $webroot . '/vendor',
    'defaultRoute' => '/site/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'dfwefdfk34fdldsf243',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => $routes,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;