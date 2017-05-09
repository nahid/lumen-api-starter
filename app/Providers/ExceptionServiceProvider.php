<?php

namespace App\Providers;

use App\Exceptions\Handler as LaravelHandler;
use Dingo\Api\Exception\Handler as DingoHandler;
use Exception;
use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('exception.provider') == 'laravel') {
            app(DingoHandler::class)->register(function (Exception $exception) {
                return app(LaravelHandler::class)->render(app('request'), $exception);
            });
        }
    }
}
