<?php

namespace App\Services;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\JWTAuth;

class AuthService extends Service
{
    /**
     * Authentication service.
     *
     * @param \Tymon\JWTAuth\JWTAuth $auth
     */
    private $auth;

    /**
     * AuthService constructor.
     *
     * @param \Tymon\JWTAuth\JWTAuth $auth
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Get the authenticated user.
     *
     * @return \Tymon\JWTAuth\Contracts\JWTSubject
     */
    public function user()
    {
        if (! $user = $this->auth->user()) {
            throw new NotFoundHttpException('User not found');
        }

        return $user;
    }

    /**
     * Authenticate a user against email and password.
     *
     * @param  array $credentials
     * @return string
     */
    public function authenticate(array $credentials)
    {
        if (! $token = $this->auth->attempt($credentials)) {
            throw new UnauthorizedHttpException(401, 'Invalid credentials');
        }

        return $token;
    }

    /**
     * Refresh an expired token.
     *
     * @return string
     */
    public function refresh()
    {
        if (! $refresh = $this->auth->refresh()) {
            throw new HttpException(500, 'Could not refresh token');
        }

        return $refresh;
    }

    /**
     * Invalidate a token.
     *
     * @return boolean
     */
    public function invalidate()
    {
        if (! $this->auth->parseToken()->invalidate(true)) {
            throw new HttpException(500, 'Could not invalidate token');
        }

        return true;
    }
}
