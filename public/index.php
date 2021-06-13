<?php declare(strict_types = 1);

// Bootstrap services and framework configuration
require __DIR__ . '/../src/bootstrap.php';

// Initialize routes
require __DIR__ .'/../routes.php';

// Dispatch all routes registered
$router->dispatchRoutes();