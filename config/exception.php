<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Handler provider
    |--------------------------------------------------------------------------
    |
    | Supported handler providers are "laravel", "dingo".
    */

    'provider' => 'laravel',

    /*
    |--------------------------------------------------------------------------
    | Exception Handlers
    |--------------------------------------------------------------------------
    |
    | Here we will register the exception with the exception handlers so that
    | whenever a specific type of exception occurs, we can set which handler
    | will be responsible for handling it.
    |
    */

    'handlers' => [
         App\Exceptions\Handlers\NotFoundHandler::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default handler
    |--------------------------------------------------------------------------
    |
    | The default handlers which will handle any exception when no available
    | match is found in the following handlers order list.
    */

    'default' => App\Exceptions\Handlers\JsonExceptionHandler::class,
];
