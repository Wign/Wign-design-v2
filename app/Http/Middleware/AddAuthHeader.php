<?php

namespace App\Http\Middleware;

use Closure;

class AddAuthHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        if (! $request->bearerToken()) {
            $cookieName = createFreshAccessToken::COOKIE_NAME;
            if ($request->hasCookie($cookieName)) {
                $token = $request->cookie($cookieName);
                $request->headers->add(['Authorization' => 'Bearer '.$token]);
            }
        }

        return $next($request);
    }
}
