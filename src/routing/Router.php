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
    protected $errcodes = [];
    protected $rescode = 0;
    protected $router;
    protected $class;
    protected $method;
    protected $serverMethod;
    protected $routeFn;
    protected $namespace = '\\App\\Controllers\\';
    protected $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Reserved',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Reserved for WebDAV advanced collections expired proposal',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    ];



    /**
     * Initialize configuration with Klein object
     */
    public function __construct() {
        $this->__dispatchRouter();
    }

    /**
     * autoloader function which executes after end of every other function
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
            $this->__httpErrorHandler();
            $this->router->dispatch();
            if(isset($this->errcodes[0]) && $this->rescode !== 200) {
                return response()->json(['message'=>[$this->errcodes[0] .' '. $this->statusTexts[$this->errcodes[0]]]],$this->errcodes[0]);
            } 
            unset($this->router);
        }
        $this->router = new Klein;
    }

    /**
     * request validation
     */
    private function __httpErrorHandler() {
        $this->router->onHttpError(function ($code,$router,$matched,$method_matched,$http_exception) {
            if(array_key_exists($code,$this->statusTexts)) {
                array_push($this->errcodes,$code);
                if($code == 404) {
                    array_shift($this->errcodes);
                }
            }
        });
    }

    private function __setResCode($rescode) {
        $this->rescode = $rescode;
    }

    /**
     * Render the response based on the method and args
     */
    private function __renderResponse($method,$route,$routeFn) {
        if(gettype($routeFn) == 'string') {
            $this->routeFn = explode('@',$routeFn);

            if(count($this->routeFn) > 1) {
                $this->routeFn[0] = class_exists($this->routeFn[0])?$this->routeFn[0]:$this->namespace . $this->routeFn[0];
                $this->class = new $this->routeFn[0];
                $this->method = $this->routeFn[1];
                if(method_exists($this->class,$this->method)) {
                    $this->router->respond($method,$route, function($request,$response) {
                        $this->__setResCode($response->code());
                        return call_user_func_array([$this->class,$this->method],[$request,$response]);
                    });               
                }
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