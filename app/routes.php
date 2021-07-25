<?php
/**
 * Write your app routes here. RESTful way
 */

use SimplePi\Framework\Routes; 

Routes::build(function($router) {
    $router->get('/', function() {
        return response()->json(['message'=>'Welcome to '.config('app.name')]);
    });
    $router->get('/testing', function() {
        return response()->json(['message'=>'Welcome to Simpe Pi test']);
    });
    $router->get('/myspace/{id}', 'Demo@mySpace');
    $router->post('/data', 'Demo@display');
});
