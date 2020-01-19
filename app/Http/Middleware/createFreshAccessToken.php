<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class createFreshAccessToken
{
    /**
     * The authentication guard.
     *
     * @var string
     */
    protected $guard;

    const COOKIE_NAME = '_token';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $this->guard = $guard;

        /** @var Response $response */
        $response = $next($request);

        if ($this->shouldReceiveFreshToken($request, $response)) {
            /** @var \App\User $user */
            $user = $request->user($this->guard);
            $token = $user->createToken('Personal Access Token')->accessToken;
            $cookie = $this->createCookieDetails($token);
            $response->withCookie($cookie);
        }

        return $response;
    }

    private function createCookieDetails($token): \Symfony\Component\HttpFoundation\Cookie
    {
        return Cookie()->make(
            self::COOKIE_NAME,
            $token,
            1440,
            env('COOKIE_SECURE_HTTP', false)
        );
    }

    /**
     * Determine if the given request should receive a fresh token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return bool
     */
    protected function shouldReceiveFreshToken($request, $response)
    {
        return $this->requestShouldReceiveFreshToken($request) &&
               $this->responseShouldReceiveFreshToken($response);
    }

    /**
     * Determine if the request should receive a fresh token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function requestShouldReceiveFreshToken($request)
    {
        return $request->isMethod('GET') && $request->user($this->guard);
    }

    /**
     * Determine if the response should receive a fresh token.
     *
     * @param  \Illuminate\Http\Response  $response
     * @return bool
     */
    protected function responseShouldReceiveFreshToken($response)
    {
        return ($response instanceof Response ||
                $response instanceof JsonResponse) &&
               ! $this->alreadyContainsToken($response);
    }

    /**
     * Determine if the given response already contains an API token.
     *
     * This avoids us overwriting a just "refreshed" token.
     *
     * @param  \Illuminate\Http\Response  $response
     * @return bool
     */
    protected function alreadyContainsToken($response)
    {
        foreach ($response->headers->getCookies() as $cookie) {
            if ($cookie->getName() === self::COOKIE_NAME) {
                return true;
            }
        }

        return false;
    }
}
