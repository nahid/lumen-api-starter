<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\RestApiController;

class ApiController extends Controller
{
    use RestApiController;
    /**
     * Model repository.
     *
     * @var \Prettus\Repository\Eloquent\BaseRepository
     */
    protected $repository;
}
