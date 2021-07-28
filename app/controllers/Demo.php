<?php
/**
 * Demo controller for initializing the app
 * @author: Sanket Raut
 */

namespace App\Controllers;

use SimplePi\Http\HttpRequest;
use SimplePi\Http\HttpResponse;

use SimplePi\Framework\DB;

class Demo {

    protected $request;
    protected $response;

    public function __construct() {
        // write your constructor call here
    }

    public function display(HttpRequest $request) {
        return response()->json(['message'=>'this is a demo app']);
    }

}