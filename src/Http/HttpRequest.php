<?php declare(strict_types = 1);
/**
 * Http Request class to handle requests
 */

namespace SimplePi\Http;

use Symfony\Component\HttpFoundation\Request;

class HttpRequest {

    protected $request;
    /**
     * Constructor function to initialize the config
     */
    public function __construct() {
        $this->request = Request::createFromGlobals();
    }

    /**
     * helper function method()
     */
    public function method() {
        return $this->request->getMethod();
    }

    /**
     * helper function path()
     */
    public function path() {
        return $this->request->getPathInfo();
    }

}