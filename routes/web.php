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


$router->group(['prefix' => '/example'], function () use ($router) {
    $router->get('', ['uses' => ExampleController::class . '@getAll']);
    $router->get('/{id:[0-9]+}', ['uses' => ExampleController::class . '@find']);
    $router->post('', ['uses' => ExampleController::class . '@create']);
    $router->put('/{id:[0-9]+}', ['uses' => ExampleController::class . '@update']);
    $router->delete('/{id:[0-9]+}', ['uses' => ExampleController::class . '@delete']);
});
