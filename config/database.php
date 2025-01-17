<?php

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'log_inteligencia' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_LOG_INTELIGENCIA', '127.0.0.1'),
            'port' => env('DB_PORT_LOG_INTELIGENCIA', '3306'),
            'database' => env('DB_DATABASE_LOG_INTELIGENCIA', 'forge'),
            'username' => env('DB_USERNAME_LOG_INTELIGENCIA', 'forge'),
            'password' => env('DB_PASSWORD_LOG_INTELIGENCIA', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'inteligencia' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_INTELIGENCIA', '127.0.0.1'),
            'port' => env('DB_PORT_INTELIGENCIA', '3306'),
            'database' => env('DB_DATABASE_INTELIGENCIA', 'forge'),
            'username' => env('DB_USERNAME_INTELIGENCIA', 'forge'),
            'password' => env('DB_PASSWORD_INTELIGENCIA', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
    ],
    'migrations' => 'migrations',

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
