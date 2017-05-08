<?php

namespace App\Exceptions\Handlers;

use Illuminate\Http\Request;
use Exception;

abstract class Handler
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected  $request;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * Handler constructor.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     */
    public function __construct(Request $request, Exception $exception)
    {
        $this->request = $request;
        $this->exception = $exception;
    }

    /**
     * Handle exception.
     *
     * @return mixed
     */
    abstract public function handle();
}
