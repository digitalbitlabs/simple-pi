<?php declare(strict_types = 1);

// autoload composer dependencies
require __DIR__ ."/../vendor/autoload.php";

// load routes
require_once __DIR__ .'/../app/routes.php';

// bootstrap services and framework configuration
$app = new \SimplePi\Framework\App;
$app->boot();
