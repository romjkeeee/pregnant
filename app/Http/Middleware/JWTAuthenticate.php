<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\Authenticate;

class JWTAuthenticate extends Authenticate
{
    /**
     * Check the request for the presence of a token.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     *
     * @return void
     */
    public function checkForToken(Request $request)
    {
        if (! $this->auth->parser()->setRequest($request)->hasToken()) {
            //
        }
    }

    /**
     * Attempt to authenticate a user via the token in the request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException
     *
     * @return void
     */
    public function authenticate(Request $request)
    {
        $this->checkForToken($request);

        try {
            $this->auth->parseToken()->authenticate();
        } catch (JWTException $e) {
            //
        }
    }
}
