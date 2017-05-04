<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the api routes for an application.
|
*/

$api->get('/', function () {
    return response()->json([
        'message' =>  'Welcome to '.config('api.name'),
    ]);
});

$api->post('/auth', 'AuthController@login');

$api->group(['middleware' => 'api.auth'], function() use ($api) {
    $api->put('/auth', 'AuthController@refresh');
    $api->patch('/auth', 'AuthController@refresh');
    $api->delete('/auth', 'AuthController@logout');
});
