<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=192.168.0.2;port=5432;dbname=oriana_lifescape;',
    'username' => 'postgres',
    'password' => 'w2e3r4',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public'
        ]
    ],
];
