<?php declare(strict_types = 1);

// bootstrap services and framework configuration
require __DIR__ . '/../bootstrap.php';

// setup the api configuration
require __DIR__ ."/../config.php";

// Initialize routes
require __DIR__ .'/../routes.php';

// setup database config
$database->setup($config['database']);

// Dispatch all routes registered
$router->dispatchRoutes();
