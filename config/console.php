<?php
$common = require __DIR__.'/common.php';

$configConsole = [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'categories' => ['events'],
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['info', 'warning', 'error'],
                    'logFile' => '@logs/console/events.log',
                    'logVars' => []
                ]
            ]
        ],
        'urlManager' => [
            'hostInfo' => 'http://yii2.bot.net',
            'baseUrl' => '',
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => '',
            // rules не работает.
            /*'rules' => [
                'index/index' => 'default/default'
            ]*/
        ]
    ],
    'controllerNamespace' => 'app\controllers\console',
    'id' => 'console-app'
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $configConsole['bootstrap'][] = 'gii';
    $configConsole['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return array_merge_recursive($common, $configConsole);
