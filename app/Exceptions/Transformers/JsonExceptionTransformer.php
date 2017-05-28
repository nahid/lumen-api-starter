<?php

namespace App\Exceptions\Transformers;

use Exception;

class JsonExceptionTransformer
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
            'message' => 'Internal server error',
            'code' => 500,
            'status_code' => 500,
        ];
    }
}
