<?php
/**
 * Write your app routes here. RESTful way
 */
$router->get('/', function() {
    return response()->json(['message'=>'Welcome to Simple Pi']);
});
$router->get('/testing', function() {
    return response()->json(['message'=>'Welcome to Simpe Pi test']);
});
$router->get('/myspace', '\App\Controllers\Demo@mySpace');
$router->post('/data', '\App\Controllers\Demo@display');