<?php

namespace App\Exceptions\Handlers;

use App\Exceptions\Handlers\BaseHandler;
use App\Exceptions\Transformers\JsonExceptionTransformer;

class JsonExceptionHandler extends BaseHandler
{
    /**
     * Transformer class name.
     *
     * @var string
     */
    protected $transformer = JsonExceptionTransformer::class;

    /**
     * HTTP status code.
     *
     * @var integer
     */
    protected $statusCode = 500;
}
