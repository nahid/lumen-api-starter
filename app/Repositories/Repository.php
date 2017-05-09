<?php

namespace App\Repositories;

use App\Presenters\Presenter;
use App\Validators\Validator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

abstract class Repository extends BaseRepository
{
    /**
     * Specify model class.
     *
     * @return string
     */
    public function model()
    {
        $namespace = config('repository.generator.rootNamespace') . config('repository.generator.paths.models');
        $classname = str_replace('Repository', '', class_basename($this));

        return "{$namespace}\\{$classname}";
    }

    /**
     * Bootup the repository by pushing criterias.
     */
    public function boot()
    {
        $this->pushCriteria(RequestCriteria::class);
    }

    /**
     * Specify presenter class.
     *
     * @return string
     */
    public function presenter()
    {
        return Presenter::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return Validator::class;
    }
}
