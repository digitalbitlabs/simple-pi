<?php declare(strict_types = 1);

namespace SimplePi\Routing;

/**
 * Router wrapper class
 */
use FastRoute;
use FastRoute\RouteCollector;

class Router {

    protected $dispatcher;

    /**
     * Initialize configuration
     */
    public function __construct() {
        $this->dispatcher = simpleDispatcher();    
    }

    /**
     * Route Dispatcher function
     */
    public function dispatchRouting() {
        return $this->dispatcher(function(RouteCollector $r) {
            $r->addRoute('GET','/test', function() {
                echo 'test';
            });
            $r->addRoute('GET','/', function() {
                echo 'index';
            });
        });
    }
}   