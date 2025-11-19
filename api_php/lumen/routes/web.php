<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return response()->json(['message' => 'API Lumen funcionando!']);
});

$router->post('/users', 'UserController@create');
$router->get('/users', 'UserController@index');
$router->get('/users/{id}', 'UserController@show');
$router->put('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@delete');
