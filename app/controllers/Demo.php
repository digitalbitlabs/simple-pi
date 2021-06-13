<?php
/**
 * Demo controller for initializing the app
 */

namespace App\Controllers;

use SimplePi\Http\HttpRequest;
use SimplePi\Http\HttpResponse;


class Demo {

    protected $request;
    protected $response;

    public function __construct() {
    }

    public function display(HttpRequest $request) {
        // $this->response->json(['data'=>$this->request->all()]);
        return response()->json(['data'=>$request->all()]);
    }

    public function mySpace(HttpRequest $request) {
        echo 'this is my space: '.$request->all()['id'];
    }
}