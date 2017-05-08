<?php

namespace App\Transformers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class Transformer extends TransformerAbstract
{
    /**
     * Transform format.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return array
     */
    public function transform(Model $model)
    {
        return $model->toArray();
    }
}
