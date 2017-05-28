<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isDebugable($request, $e)) {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            return $whoops->handleException($e);
        }

        // Handle exception with the appropriate handler
        foreach (config('exception.handlers') as $handler) {
            if (in_array(get_class($e), $handler::$exceptions)) {
                $excaptionHandler = new $handler($request, $e);

                return $excaptionHandler->handle();
            }
        }

        if (is_api_request()) {
            $handler = config('exception.default');
            $excaptionHandler = new $handler($request, $e);

            return $excaptionHandler->handle();
        }

        return parent::render($request, $e);
    }

    /**
     *  Check if the errors can be shown in debugable mode
     *  debugable when exception.debug is enabled
     *  and not an ajax request, not an api request
     *  or it is a fatal error
     *
     * @param  mixed   $request
     * @return boolean
     */
    private function isDebugable($request, Exception $e)
    {
        return (config('app.debug') && ! is_api_request()) || $e instanceof FatalThrowableError;
    }
}
