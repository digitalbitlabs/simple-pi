<?php declare(strict_types = 1);
/**
 * Router wrapper class
 * @author - Sanket Raut <sanket@digitalbit.in>
 */
namespace SimplePi\Routing;

use Klein\Klein;

class Router {
    /**
     * Common variables
     */
    protected $router;
    protected $class;
    protected $method;
    protected $routeFn;
    /**
     * Initialize configuration with Klein object
     */
    public function __construct() {
        $this->__dispatchRouter();
    }

    /**
     * autoloader function after end of every other function
     */
    public function __call($method,$arguments) {
        if(method_exists($this, $method)) {
            call_user_func_array(array($this,$method),$arguments);
            $this->__dispatchRouter();
        }
    }

    /**
     * Generate Klein object and dispatch router
     */
    private function __dispatchRouter() {
        if(is_object($this->router)) {
            $this->router->dispatch();
            unset($this->router);
        }
        $this->router = new Klein;
    }

    /**
     * Render the response based on the method and args
     */
    private function __renderResponse($method,$route,$routeFn) {
        if(gettype($routeFn) == 'string') {
            $this->routeFn = explode('@',$routeFn);
            if(count($this->routeFn) > 1) {
                $this->class = new $this->routeFn[0];
                $this->method = $this->routeFn[1];
                $this->router->respond($method,$route, function($request,$response) {
                    return call_user_func_array([$this->class,$this->method],[$request,$response]);
                });
            }
        } else {
            $this->router->respond($method,$route,$routeFn);
        }
    }

    /**
     * GET routes
     */
    protected function get($route, $routeFn) {
        $this->__renderResponse('GET',$route,$routeFn);
    }

    /**
     * POST routes
     */
    protected function post($route, $routeFn) {
        $this->__renderResponse('POST',$route,$routeFn);
    }

    /**
     * PUT routes
     */
    protected function put($route, $routeFn) {
        $this->__renderResponse('PUT',$route,$routeFn);
    }

}   