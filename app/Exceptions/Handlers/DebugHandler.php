<?php

namespace App\Exceptions\Handlers;

use App\Exceptions\Handlers\Handler;
use Illuminate\Http\Response;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class DebugHandler extends Handler
{
    /**
     * Handle exception.
     *
     * @return mixed
     */
    public function handle()
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler());

        return new Response(
            $whoops->handleException($this->exception),
            $this->exception->getStatusCode(),
            $this->exception->getHeaders()
        );
    }
}
