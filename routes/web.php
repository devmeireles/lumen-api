<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/book', 'BookController@index');
$router->get('/api/book/{id}', 'BookController@show');
$router->post('/api/book', 'BookController@store');
$router->put('/api/book/{id}', 'BookController@update');
$router->delete('/api/book/{id}', 'BookController@destroy');