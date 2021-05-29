<?php declare(strict_types = 1);

namespace SimplePi\Http;

use Symfony\Component\HttpFoundation\Request;

/**
 * Http Request class to handle requests
 */
class HttpRequest {

    protected $request;
    /**
     * Constructor function to initialize the config
     */
    public function __construct() {
        $this->request = Request::createFromGlobals();
    }

}