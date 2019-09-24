<?php
$common = require __DIR__.'/common.php';

$configTests = [
    'aliases' => [
        '@tests' => '@app/tests'
    ],
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'log' => [
            'targets' => [
                [
                    'categories' => ['events'],
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['info', 'warning', 'error'],
                    'logFile' => '@logs/tests/events.log',
                    'logVars' => []
                ]
            ]
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],
        'urlManager' => [
            'showScriptName' => true,
        ]
    ],
    'id' => 'basic-tests',
    'language' => 'en-US'
];

return array_merge_recursive($common, $configTests);