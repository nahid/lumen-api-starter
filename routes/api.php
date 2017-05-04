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
