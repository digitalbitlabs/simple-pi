<?php
/**
 * return the config object for db and app setup
 * should return a public property accesible across the app
 */

 return [
        'app' => [
            'name' => env('APP_NAME','Simple Pi')
        ],
        'database' => [
            'driver' => env('DB_DRIVER','mysql'),
            'host' => env('DB_HOST','localhost'),
            'database' => env('DB_DATABASE','simplepi'),
            'username' => env('DB_USERNAME','root'),
            'password' => env('DB_PASSWORD','root'),
        ]
    ];