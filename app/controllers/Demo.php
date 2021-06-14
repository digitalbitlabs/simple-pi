<?php
/**
 * Demo controller for initializing the app
 */

namespace App\Controllers;

use SimplePi\Http\HttpRequest;
use SimplePi\Http\HttpResponse;

use SimplePi\Models\Demo;

class Demo {

    protected $request;
    protected $response;

    public function __construct() {
    }

    public function display(HttpRequest $request) {
        return response()->json(['data'=>$request->all()]);
    }

    public function mySpace(HttpRequest $request) {
        echo 'this is my space: '.$request->all()['id'];
    }
}