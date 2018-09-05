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
        ]
    ],
    'modules' => [
        'debug' => 'yii\debug\Module'
    ]
];
