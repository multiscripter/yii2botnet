<?php
$common = require __DIR__.'/common.php';

$configWeb = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MUbEohyFOJje7ZuCW2dyaCQzyg6mvVEH',
            // Включает JsonParser.
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'rules' => [
// ВНИМАНИЕ! Yii2 не понимает слэш в конце имени ключей в массиве rules !!!.
// То есть 'person/' => '. . .' не работает.

// URI вида /person/1/ обрабатывает PeopleController.actionReadById($id);
// regexp пишется между < и >
                'GET person/<id:\d+>' => 'people/read-by-id',

// URI вида /person/ обрабатывает PeopleController.actionRead();
                'GET person' => 'people/read',

// URI вида /person/create/ обрабатывает PeopleController.actionMake();
                'POST person/create' => 'people/make',

// URI вида /person/delete/{id}/ обрабатывает PeopleController.actionRemove();
                'DELETE person/delete/<id:\d+>' => 'people/remove',

// URI вида /person/update/{id}/ обрабатывает PeopleController.actionModify();
                'PUT person/update/<id:\d+>' => 'people/modify',

                [
                    'class' => 'yii\rest\UrlRule',
                    //отключение преобразования во множественную форму
                    //'pluralize' => false,
                    'controller' => 'people'
                ]
            ],
        ],
        'log' => [
            'targets' => [
                [
                    'categories' => ['events'],
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['info', 'warning', 'error'],
                    'logFile' => '@logs/web/events.log',
                    'logVars' => []
                ],
            ],
        ],
    ],
    'id' => 'web-app',
    'name' => 'Web-upyachka'
];

if (YII_ENV_DEV) {
    $config['modules']['debug'] = [
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return array_merge_recursive($common, $configWeb);
