<?php
/**
 * Demo controller for initializing the app
 */

namespace App\Controllers;

use SimplePi\Http\HttpRequest;
use SimplePi\Http\HttpResponse;

use SimplePi\Framework\DB;

class Demo {

    protected $request;
    protected $response;

    public function __construct() {

    }

    public function display(HttpRequest $request) {
        return response()->json(['data'=>$request->all()]);
    }

    public function mySpace(HttpRequest $request) {
        $data = $request->all();
        $data = DB::query("SELECT * FROM demo LIMIT 1")->result();
        return response()->json(['message'=>'this is my space '.$data[0]['name']]);
    }
}