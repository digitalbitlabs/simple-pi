<?php
/**
 * Demo controller for initializing the app
 */

namespace App\Controllers;

class Demo {
    public function display($request,$response) {
        return response()->json(['data'=>$request->params()]);
    }

    public function mySpace() {
        echo 'this is my space';
    }
}