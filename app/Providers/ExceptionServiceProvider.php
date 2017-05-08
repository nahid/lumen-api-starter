<?php

namespace App\Providers;

use Dingo\Api\Exception\Handler;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
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
            app(Handler::class)->register(function (Exception $exception) {
                return app(ExceptionHandler::class)->render(app('request'), $exception);
            });
        }
    }
}
