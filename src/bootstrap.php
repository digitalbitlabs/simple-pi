<?php declare(strict_types = 1);

require __DIR__ ."/../vendor/autoload.php";

// register exception handler for Simple Pi
$handler = new \SimplePi\Exceptions\Handler;
$handler->handleException();


// register dependencies
$dependencies = new \SimplePi\Dependencies;
$request      = $dependencies->injector->make('SimplePi\Http\HttpRequest');
$response     = $dependencies->injector->make('SimplePi\Http\HttpResponse');

// register router object for Simple Pi
$router = new \SimplePi\Routing\Router($request,$response,$dependencies);

