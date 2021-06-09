<?php
/**
 * Demo controller for initializing the app
 */

namespace App\Controllers;

class Demo {

    public function display($request) {
        return response()->json(['data'=>$request->params()]);
    }

    public function mySpace($request) {
        echo 'this is my space: '.$request->id;
    }
}