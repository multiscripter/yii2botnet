<?php
$params = require __DIR__.'/params.php';
$db = require __DIR__.'/db.php';

$config = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset'
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'dispatcher',
        'log'
    ],
    'components' => [
        'db' => $db,
        'dispatcher' => [
            'class' => 'app\App\Event\Dispatcher'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval' => 1,
            'targets' => [],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // Обрабатывать только URL со слэшем в конце.
            'suffix' => '/'
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'class' => 'app\model\User'
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
}

return $config;