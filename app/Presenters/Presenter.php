<?php

namespace App\Presenters;

use App\Transformers\Transformer;
use Prettus\Repository\Presenter\FractalPresenter;

class Presenter extends FractalPresenter
{
    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return Transformer::class;
    }
}
