<?php
/**
 * Write your app routes here. RESTful way. Routes file
 * @author: Sanket Raut
 */

use SimplePi\Framework\Routes; 

Routes::build(function($router) {
    $router->get('/', function() {
        return response()->json(['message'=>'Welcome to '.config('app.name')]); // render json data
    });
    $router->get('/demo', 'Demo@display'); // call to a controller function
});
