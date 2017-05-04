<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\AuthService;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use Helpers;

    /**
     * Auth Service.
     *
     * @var \App\Services\AuthService
     */
    private $auth;

    /**
     * AuthController constructor.
     *
     * @param \App\Services\AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Authenticate a user against email and password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function login(Request $request)
    {
        $token = $this->auth->authenticate($request->only('email', 'password'));

        return $this->response->array(compact('token'));
    }

    /**
     * Refresh an expired token.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function refresh()
    {
        $token = $this->auth->refresh();

        return $this->response->array(compact('token'));
    }

    /**
     * Invalidate a token.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function logout()
    {
        $this->auth->invalidate();

        return $this->response->noContent();
    }
}
