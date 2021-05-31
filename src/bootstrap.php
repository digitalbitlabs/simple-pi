<?php declare(strict_types = 1);

require __DIR__ ."/../vendor/autoload.php";

// register exception handler for Simple Pi
$handler = new \SimplePi\Exceptions\Handler();
$handler->handleException();


// $router = new \SimplePi\Routing\Router();
// $router->dispatchRouting();

// Sample demo message to test response object and helper function
// echo response()->json(['message'=>'simple pi is a beautiful micro framework'],400);

$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
    $r->addRoute('GET','/test', function() {
        echo 'test';
    });
    $r->addRoute('GET','/', function() {
        echo 'index';
    });
});

$routeInfo = $dispatcher->dispatch(request()->method(), request()->path());
switch($routeInfo[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        echo response()->json(['message'=>'404'],404);
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo response()->json(['message'=>'405'],405);
        break;
    case \FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

