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
$router->get('/', 'Main@index');
$router->get('/product', 'Main@product');
$router->get('/contact', 'Main@contact');
$router->get('/about', 'Main@about');
