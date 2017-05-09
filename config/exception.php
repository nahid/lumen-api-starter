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
    | Default handler
    |--------------------------------------------------------------------------
    |
    | The default handlers which will handle any exception when no available
    | match is found in the following handlers order list.
    */

    'default' => \App\Exceptions\JsonExceptionHandler::class,

    /*
    |--------------------------------------------------------------------------
    | Exception Handlers
    |--------------------------------------------------------------------------
    |
    | Here we will register the exception with the exception handlers so that
    | whenever a specific type of exception occurs, we can set which handler
    | will be responsible for handling it. Do not put same exception type under
    | multiple handlers as it may cause unexepted result.
    |
    | Example:
    | HandlerA::class => [
    |     ExceptionA::class,
    |     ExceptionB::class,
    | ],
    | HandlerB::class => [
    |     ExceptionC::class,
    |     ExceptionD::class,
    | ],
    */

    'handlers' => [
         //
    ],
];
