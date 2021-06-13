<?php declare(strict_types = 1);

/**
 * Environment variable helper
 */
if(!function_exists('env')) {
    function env($var) {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        return $_ENV[$var];
    }
}
/**
 * Debug helper
 */
if(!function_exists('dd')) {
    function dd($content) {        
        header('Content-Type: application/json');
        print_r($content);
        exit();
    }
}
/**
 * Request component helper
 */
if(!function_exists('request')) {
    function request() {
        return new \SimplePi\Http\HttpRequest;
    }
}
/**
 * Response component helper
 */
if(!function_exists('response')) {
    function response() {
        return new \SimplePi\Http\HttpResponse;
    }
}
