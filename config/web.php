<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'layout' => 'furniture.php',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'RrqkwnPzuA0n0I0OwRbBbRWyVDsLesd8',
            'enableCsrfValidation' => true,
            'baseUrl' => '',
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
            'transport' => [
                     'class' => 'Swift_SmtpTransport',
                     'host' => env('EMAIL_SMTP_HOST'),  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                     'username' => env('EMAIL_ADDR'),
                     'password' => env('EMAIL_PASS'),
                     'port' => env('EMAIL_PORT'), // Port 25 is a very common port too
                     'encryption' => env('EMAIL_ENC'), // It is often used, check your provider or mail server specs
                     ],

            'useFileTransport' => false,
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
            'rules' => [
                'cart/<id:\d+>'=>'cart/index',
                'addtocart/<id:\d+>'=>'cart/index',
                'chair/<id:\w+>' => 'items/showitem',
                'table/<id:\w+>' => 'items/showitemtable',
                'tables' =>'site/tables',
                'terms' => 'site/terms',
                'news' => 'news/tape', 
                'contacts' => 'site/contact',
                'about' => 'site/about',
            ],

        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
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

return $config;
