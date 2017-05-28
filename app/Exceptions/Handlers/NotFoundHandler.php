<?php

namespace App\Exceptions\Handlers;

use App\Exceptions\Handlers\BaseHandler;
use App\Exceptions\Transformers\NotFoundTransformer;

class NotFoundHandler extends BaseHandler
{
    /**
     * List of exceptions to handle.
     *
     * @var array
     */
    public static $exceptions = [
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
    ];

    /**
     * Transformer class name.
     *
     * @var string
     */
    protected $transformer = NotFoundTransformer::class;

    /**
     * HTTP status code.
     *
     * @var integer
     */
    protected $statusCode = 404;
}
