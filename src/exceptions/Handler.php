<?php declare(strict_types = 1);
/**
 * Exception handler class
 */
namespace SimplePi\Exceptions;

error_reporting(E_ALL);

$env = env('APP_ENVIRONMENT');

/**
 * Error handler registration
 */
$handler = new \Whoops\Run;
if($env !== 'production') {
    $handler->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $handler->pushHandler(function($e) {
        echo 'Something went wrong. Please check your email';
    });
}
$handler->register();

throw new \Exception;