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

// User Route
$router->post('/api/register', 'UserController@register');
$router->post('/api/login', 'UserController@login');
$router->get('/api/profile', ['middleware' => 'auth', 'uses' => 'UserController@profile']);

// Phone Route
$router->get('/api/phone', ['middleware' => 'auth', 'uses' => 'PhoneController@index']);
$router->post('/api/phone', ['middleware' => 'auth', 'uses' => 'PhoneController@store']);
$router->put('/api/phone', ['middleware' => 'auth', 'uses' => 'PhoneController@update']);
$router->delete('/api/phone', ['middleware' => 'auth', 'uses' => 'PhoneController@destroy']);

$router->get('/dokumentasi', function () {
    return redirect('https://afanazmy.docs.apiary.io/#');
});
