<?php

return [
    'id' => 'safronov',
    'basePath' => realpath(__DIR__.'/../'),

    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false //удаляет index.php из url
        ]
    ]
];
