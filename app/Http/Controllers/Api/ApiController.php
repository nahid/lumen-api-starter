<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\RestApiController;
use Dingo\Api\Routing\Helpers;

class ApiController extends Controller
{
    use Helpers, RestApiController;

    /**
     * Model repository.
     *
     * @var \Prettus\Repository\Eloquent\BaseRepository
     */
    protected $repository;

    /**
     * Default rule for pagination.
     *
     * @var bool
     */
    protected $paginate = true;
}
