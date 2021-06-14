<?php
/**
 * return the config object for db and app setup
 */

 return [
    'app' => [
        'name' => env('APP_NAME','SimplePi')
    ],
    'database' => [
        'driver' => env('DB_DRIVER','mysql'),
        'host' => env('DB_HOST','localhost'),
        'username' => env('DB_USERNAME','root'),
        'password' => env('DB_PASSWORD','root'),
    ]
];