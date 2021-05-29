<?php declare(strict_types = 1);

namespace SimplePi\Exceptions;

use SimplePi\Http\HttpRequest;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

use Exception;

/**
 * Exception handler class
 */
class Handler {

    protected $handler;
    protected $env;

    /**
     * Initialize exception handler configuration
     */
    public function __construct() {
        error_reporting(E_ALL);
        $this->env = env('APP_ENVIRONMENT');
        $this->handler = new Run();
    }

    /**
     * Exception handler configuration
     */
    public function handleException() {
        if($this->env !== 'production') {
            $this->handler->pushHandler(new PrettyPageHandler);
        } else {
            $this->handler->pushHandler(function($e) {
                return response()->json(['message'=>'Something went wrong.'],400);
            });
        }        
        $this->registerHandler();
    }

    /**
     * Register handler object to throw errors
     */
    private function registerHandler() {
        $this->handler->register();
    }

}