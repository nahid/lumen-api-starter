<?php

return [

    'app' => [
//        App\Http\Middleware\ExampleMiddleware::class,
    ],

    'route' => [
//        'auth' => App\Http\Middleware\Authenticate::class,
        'cors' => Barryvdh\Cors\HandleCors::class,
    ],
];
