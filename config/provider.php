<?php

return [
//    App\Providers\AppServiceProvider::class                            => ['all'],
//    App\Providers\AuthServiceProvider::class                           => ['all'],
//    App\Providers\EventServiceProvider::class                          => ['all'],
    Tymon\JWTAuth\Providers\LumenServiceProvider::class                => ['all'],
    Barryvdh\Cors\ServiceProvider::class                               => ['all'],
    Dingo\Api\Provider\LumenServiceProvider::class                     => ['all'],
    Prettus\Repository\Providers\LumenRepositoryServiceProvider::class => ['all'],
    Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class        => ['local'],
    Widnyana\LDRoutesList\CommandServiceProvider::class                => ['local'],
];

