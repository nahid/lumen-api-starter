<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class WhoopsExceptionHandler
{
    /**
     * Render exception.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     * @return \Illuminate\Http\Response
     */
    public function render(Request $request, \Exception $exception)
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler());

        return new Response(
            $whoops->handleException($exception),
            $exception->getStatusCode(),
            $exception->getHeaders()
        );
    }
}
