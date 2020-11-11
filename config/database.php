<?php

/**
 * Extra configuration added to handle SSL database connections.
 */
return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => env('DB_PREFIX', ''),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => env('DB_PREFIX', ''),
            'strict' => env('DB_STRICT_MODE', true),
            'engine' => env('DB_ENGINE', null),
            'timezone' => env('DB_TIMEZONE', '+00:00'),
            'options' => env('DB_SSL', false) ? [
                // This certificate is Microsoft Azure root cert for managed databases. See
                // https://docs.microsoft.com/en-us/azure/mariadb/howto-configure-ssl for more information. It will be
                // maintained by the hosting provider.
                PDO::MYSQL_ATTR_SSL_KEY => base_path() . '/certs/DigiCertGlobalRootG2.crt.pem',
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
            ] : [],
        ],
    ],
    'migrations' => 'migrations',
];