<?php

$params = require(__DIR__ . '/params.php');

Yii::$classMap['Freedom'] = '@app/libs/Freedom.php';
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pa3_UrE1kQFMUXEMv0L2lfMcQVQeZA9T',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        //发送短信
         'smser' => [
            // 中国云信
            'class' => 'daixianceng\smser\CloudSmser',
            'username' => 'php1402a',
            'password' => 'php1402a',
            'useFileTransport' => false
        ],
        //smarty模板
        'view' => [  
            'renderers' => [  
                'tpl' => [  
                    'class' => 'yii\smarty\ViewRenderer',  
                    //'cachePath' => '@runtime/Smarty/cache',  
                ],  
            ],  
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
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
