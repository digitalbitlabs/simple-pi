<?php declare(strict_types = 1);

require __DIR__ ."/../vendor/autoload.php";

// register exception handler for Simple Pi
$handler = new \SimplePi\Exceptions\Handler;
$handler->handleException();

// register router object for Simple Pi
$router = new \SimplePi\Routing\Router;

