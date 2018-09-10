<?php

return [
    'id' => 'safronov-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' =>  [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=safronov',
            'username' => 'andrii',
            'password' => '1',
            'charset' => 'utf8',
            'tablePrefix' => 'yii_'
        ],
        ]
];