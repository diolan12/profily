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

// $router->get('/v', function () use ($router) {
//     $router->app->version();
// });
// $router->get('/key', function() {
//     return \Illuminate\Support\Str::random(32);
// });

$router->get('/', 'Main@index');
$router->get('/product', 'Main@product');
$router->get('/product/{productName}', 'Main@productAt');
$router->get('/commodity/{commodity}', 'Main@productWhereCommodity');
$router->get('/gallery', 'Main@gallery');
$router->get('/cookies-policy', 'Main@cookies_policy');

$router->group(['prefix' => 'J2mV38xHiH4abejTlpY9pXhbGtubTCZi', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'Dashboard@stat');

    $router->get('/commodity', 'DashboardCommodity@commodity');
    $router->post('/commodity', 'DashboardCommodity@commodityNew');
    $router->get('/commodity/{commodityName}', 'DashboardCommodity@commodityAt');
    $router->post('/commodity/{commodityName}', 'DashboardCommodity@commodityUpdateAt');

    $router->get('/product', 'DashboardProduct@product');
    $router->get('/product/{productName}', 'DashboardProduct@productAt');

    $router->get('/testimony', 'DashboardTestimony@testimony');
    $router->post('/testimony', 'DashboardTestimony@testimonyNew');
    $router->get('/testimony/{testimonyID}', 'DashboardTestimony@testimonyAt');
    $router->post('/testimony/{testimonyID}', 'DashboardTestimony@testimonyUpdateAt');
    $router->delete('/testimony/{testimonyID}', 'DashboardTestimony@testimonyDeleteAt');

    $router->get('/gallery', 'DashboardGallery@gallery');
    $router->post('/gallery', 'DashboardGallery@galleryNew');
    $router->get('/gallery/{galleryID}', 'DashboardGallery@galleryAt');
    $router->post('/gallery/{galleryID}', 'DashboardGallery@galleryUpdateAt');

    $router->get('/about', 'Dashboard@about');
    $router->get('/setting', 'Dashboard@setting');
});

$router->group(['prefix' => 'rWVfHZH4ge8vmZAQvre5IaHKToURoEQq'], function () use ($router) {
    $router->get('/', 'Auth@index');
    $router->post('/', ['uses' => 'Auth@login']);
    $router->get('logout', ['uses' => 'Auth@logout']);
    $router->get('verify', ['uses' => 'Auth@verify', 'middleware' => 'auth']);
    $router->post('photo', ['uses' => 'Auth@uploadPicture', 'middleware' => 'auth']);
    $router->post('password', ['uses' => 'Auth@changePassword', 'middleware' => 'auth']);
});
// $router->group(['prefix' => 'api/{table}'], function () use ($router) {
$router->group(['prefix' => 'api/{table}', 'middleware' => 'auth'], function () use ($router) {
    // $router->get('/count', ['uses' => 'RestReadController@index']);
    // $router->get('', ['uses' => 'RestReadController@get']);
    $router->get('{id}', ['uses' => 'RestReadController@getAt']);
    // $router->get('{id}/{column}', ['uses' => 'RestReadController@getAtColumn']);

    // $router->post('', ['uses' => 'RestCreateController@insert']);
    // $router->post('/w/{column}/{value}', ['uses' => 'RestController@insertWhere']);

    // $router->put('/{id}', ['uses' => 'RestUpdateController@update']);
    // $router->post('/{id}/upload/{column}', ['uses' => 'RestUpdateController@uploadAtColumn']);

    $router->delete('/{id}', ['uses' => 'RestDeleteController@delete']);
});
