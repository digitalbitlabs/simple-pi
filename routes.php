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
$router->get('/myspace/[:id]', 'Demo@mySpace');
$router->post('/data', 'Demo@display');