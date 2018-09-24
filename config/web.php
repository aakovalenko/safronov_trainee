<?php

return [
    'id' => 'safronov',
    'basePath' => realpath(__DIR__.'/../'),
    'bootstrap' => ['debug'],


    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false //удаляет index.php из url
        ],
        'request' => [
            'cookieValidationKey' => 'super secret code'
        ],
        'db' => require (__DIR__.'db.php'),
        'user' => [
            'identityClass' => 'app\models\UserIdentity'
        ]

    ],
    'modules' => [
        'debug' => 'yii\debug\Module'
    ]
];
