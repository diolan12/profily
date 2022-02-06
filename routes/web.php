<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/v', function () use ($router) {
    $router->app->version();
});
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->get('/', 'Main@index');
$router->get('/product', 'Main@product');
$router->get('/product/{productName}', 'Main@productAt');
$router->get('/commodity/{commodity}', 'Main@productWhereCommodity');
$router->get('/gallery', 'Main@gallery');
$router->get('/cookies-policy', 'Main@cookies_policy');

$router->group(['prefix' => 'J2mV38xHiH4abejTlpY9pXhbGtubTCZi'], function () use ($router) {
    $router->get('/', 'Dashboard@home');
    $router->get('/home', 'Dashboard@home');
    $router->get('/product', 'Main@product');
    $router->get('/product/{productName}', 'Main@productAt');
    $router->get('/about', 'Main@about');
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->get('verify', ['uses' => 'AuthController@verify', 'middleware' => 'auth']);
    $router->post('photo', ['uses' => 'AuthController@uploadPicture', 'middleware' => 'auth']);
    $router->post('password', ['uses' => 'AuthController@changePassword', 'middleware' => 'auth']);
});
$router->group(['prefix' => 'api/{table}'], function () use ($router) {
    // $router->group(['prefix' => 'api/{table}', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/count', ['uses' => 'RestReadController@index']);
    $router->get('', ['uses' => 'RestReadController@get']);
    $router->get('{id}', ['uses' => 'RestReadController@getAt']);
    $router->get('{id}/{column}', ['uses' => 'RestReadController@getAtColumn']);

    $router->post('', ['uses' => 'RestCreateController@insert']);
    // $router->post('/w/{column}/{value}', ['uses' => 'RestController@insertWhere']);

    $router->put('/{id}', ['uses' => 'RestUpdateController@update']);
    $router->post('/{id}/upload/{column}', ['uses' => 'RestUpdateController@uploadAtColumn']);

    $router->delete('/{id}', ['uses' => 'RestDeleteController@delete']);
});
