<?php

namespace App\Exceptions\Transformers;

use Exception;

class NotFoundTransformer
{
    /**
     * Transform exception message.
     *
     * @param  Exception $exception
     * @return array
     */
    public function transform($exception)
    {
        return [
            'message' => 'Not found',
            'code' => 404,
            'status_code' => 404,
        ];
    }
}
