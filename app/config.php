<?php
/**
 * config object for database and app settings
 * @author: Sanket Raut
 */

 return [
        'app' => [
            'name' => env('APP_NAME','Simple Pi')
        ],
        'database' => [
            'driver'   => env('DB_DRIVER','mysql'),
            'host'     => env('DB_HOST','localhost'),
            'database' => env('DB_DATABASE','simplepi'),
            'username' => env('DB_USERNAME','root'),
            'password' => env('DB_PASSWORD',''),
            'charset'  => env('DB_CHARSET','utf8'),
            'collation'=> env('DB_COLLATION','utf8_unicode_ci'),
            'prefix'   => env('DB_PREFIX','')
        ]
    ];